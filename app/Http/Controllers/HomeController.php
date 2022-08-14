<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Category;
use App\Place;
use App\Want;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Prefecture $prefecture, Category $category)
    {
        return view('home')->with([
            'prefectures' => $prefecture->get(),
            'categories' => $category->get()
            ]);
    }
    
    public function want(Want $want)
    {
        return view('mypage/want')->with(['wants' => $want->getByWantPlace()]);
    }
}
