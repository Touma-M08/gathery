<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Place;
use App\Prefecture;

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
            
            $places = $query;
        }
        if ($key_city) {
            $query->where('address', 'LIKE', "%{$key_city}%");
            
            $places = $query;
        }
        if ($key_pref) {
            $query->where('prefecture_id', $key_pref);
            
            $places = $query;
        }
        if ($key_cat) {
            $query->where('category_id', $key_cat);
            
            $places = $query;
        }
        
        return view("places/search", compact('key_name', 'key_city', 'pref', 'cat'))->with([
            "places" => $places->paginate(9),
            "categories" => $category->get(),
            "prefectures" => $prefecture->get(),
            "requests" => $request
            ]);
    }
    
    public function create(Category $category)
    {
        return view("places/create")->with(['categories' => $category->get()]);
    }
    
    public function store(Request $request, Place $place)
    {
        $prefecture = Prefecture::whereName($request->region)->first();
        $place->fill($request['place']);
        $place->prefecture_id = $prefecture->id;
        $place->save();
        return redirect('/');
    }
    
    public function show(Place $place) 
    {
        return view("places/show")->with(['place' => $place]);
    }
}
