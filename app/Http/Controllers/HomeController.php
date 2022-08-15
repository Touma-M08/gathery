<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'categories' => $category->get(),
            'places' => $place->ranking(3)
            ]);
    }
}
