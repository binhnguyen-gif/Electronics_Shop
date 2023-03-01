<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::query()->select(['name', 'img'])->get()->toArray();
        $products = Product::query()->orderBy('sale', 'desc')->get()->toArray();
        return view('home', compact('sliders', 'products'));
    }

    public function detail() {
        return view('product.detail');
    }
}
