<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Prefecture;
use App\Category;
use App\Place;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Prefecture $prefecture, Category $category, Place $place)
    {
        return view('home')->with([
            'prefectures' => $prefecture->get(),
            "foodCategories" => $category->foodCategory(),
            "leisureCategories" => $category->leisureCategory(),
            'places' => $place->ranking(3)
            ]);
    }
    
    public function add(Category $category)
    {
        return view('addCat')->with([
            "foodCategories" => $category->foodCategory(),
            "leisureCategories" => $category->leisureCategory()
        ]);
    }
    
    public function store(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->type = $request->type;
        $category->save();
        
        return redirect('/admin');
    }
    
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $query = Place::query();
        
        if(!empty($keyword)) {
            $query->where('name', "LIKE", "%{$keyword}%");
            $place = $query->limit(10)->get();
        }else {
            $place = null;
        }
        
        return view('searchEdit')->with([
            "places" => $place,
            "keyword" => $keyword
        ]);
    }
    
    public function edit(Place $place, Category $category)
    {
        return view('placeEdit')->with([
            "place" => $place,
            "foodCategories" => $category->foodCategory(),
            "leisureCategories" => $category->leisureCategory()
        ]);
    }
    
    public function update(Place $place, Request $request)
    {
        $input = $request['place'];
        $place->fill($input)->save();
        
        return redirect('/admin/place');
    }
}
