<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $categoryRepository;
    private $productRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->getSubCategory()->toArray();
        $products = $this->productRepository->getAllProduct();
        if (!is_null($request->input('search'))) {
            $products = $this->productRepository->searchProduct($request->input('search'))->toArray();
        }
        return view('product.index', compact('categories', 'products'));
    }

    public function show()
    {
        return view('cart.index');
    }

    public function addCart($id)
    {
        $product = Product::query()->find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'avatar' => $product->avatar,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'avatar' => $product->avatar,
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

//    public function searchCategory($search = null)
//    {
//        $categories = $this->categoryRepository->getSubCategory()->toArray();
//        $products = $this->productRepository->searchProduct($search)->toArray();
//        return view('product.index', compact('categories', 'products'));
//    }
}
