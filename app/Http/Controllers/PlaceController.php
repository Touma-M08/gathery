<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;
use App\Category;
use App\Place;
use App\Prefecture;
use App\Review;
use App\Want;
use Auth;

class PlaceController extends Controller
{
    public function index(Request $request, Place $place, Prefecture $prefecture, Category $category)
    {
        $places = $place;
        $key_name = $request->name;
        $key_city = $request->city;
        $key_pref = $request->prefecture;
        $key_cat = $request->category;
        $query = $place->query();
        
        $pref = $prefecture->find($key_pref);
        $cat = $category->find($key_cat);
        //検索実行
        if ($key_name) {
            $query->where('name', 'LIKE', "%{$key_name}%");
        }
        if ($key_city) {
            $query->where('address', 'LIKE', "%{$key_city}%");
        }
        if ($key_pref) {
            $query->where('prefecture_id', $key_pref);
        }
        if ($key_cat) {
            $query->where('category_id', $key_cat);
        }
        
        $places = $query;
        
        return view("places/search", compact('key_name', 'key_city', 'pref', 'cat'))->with([
            "places" => $places->orderBy('created_at', 'desc')->paginate(20),
            "categories" => $category->get(),
            "prefectures" => $prefecture->get(),
            "requests" => $request
            ]);
    }
    
    public function create(Category $category)
    {
        return view("places/create")->with(['categories' => $category->get()]);
    }
    
    public function store(PlaceRequest $request, Place $place)
    {
        $prefecture = Prefecture::whereName($request->region)->first();
        $place->fill($request['place']);
        
        $tel = $request->tel;
        if ($tel == "undefined") {
            $tel = null;
        }
        $place->tel = $tel;
        
        $place->prefecture_id = $prefecture->id;
        $place->save();
        return redirect('/');
    }
    
    public function show(Place $place, Review $review, Want $want) 
    {
        //行きたい！ボタンの処理分岐のためにログイン有無の確認
        if(empty(Auth::user())) {
            return view("places/show")->with([
                'place' => $place,
                'lat' => $place->lat,
                'lng' => $place->lng,
                'name' => $place->name,
                'reviews' => $review->getPlaceReview($place),
            ]);
        } else {
            return view("places/show")->with([
                'place' => $place,
                'lat' => $place->lat,
                'lng' => $place->lng,
                'name' => $place->name,
                'reviews' => $review->getPlaceReview($place),
                'want' => $want->getWant($place)
            ]);
        }
    }
    
    public function ranking(Place $place, Request $request)
    {
        return view('places/ranking')->with([
            'places' => $place->ranking(30),
            "page" => $request->page
            ]);
    }
}
