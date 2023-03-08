<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $productRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
//        $this->middleware('auth');
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::query()->select(['name', 'img'])->get()->toArray();
        $products = Product::query()->orderBy('sale', 'desc')->limit(6)->get()->toArray();
        $selling = Product::query()->orderBy('number_buy', 'desc')->limit(6)->get()->toArray();
        return view('home', compact('sliders', 'products', 'selling'));
    }

    public function detail($id)
    {
        $product = $this->productRepository->getProductById($id);
        return view('product.detail', compact('product'));
    }

    public function show()
    {
        $categories = Category::query()->with('sub')->whereParentId(0)->get()->toArray();
        dd($categories);
        return view('product.index', compact('categories'));
    }


}
