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

    public function update(Request $request)
    {
        try {
            $id = $request->input('id');
            $quantity = $request->input('quantity');
            $cart = session()->get('cart');
            if ($cart[$id]) {
                $cart[$id]['quantity'] = $quantity;
                session()->put('cart', $cart);
                $data = ['status' => 200, 'message' => 'successful quantity change'];
            }
        } catch (\Exception $e) {
            $data = ['status' => 500, 'message' => 'error change quantity'];
            return response()->json($data);
        }

        return response()->json($data);
    }

    public function remove(Request $request)
    {
        try {
            $id = $request->input('id');
            $quantity = $request->input('quantity');
            $cart = session()->get('cart');
            if ($cart[$id]) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                $data = ['status' => 200, 'message' => 'success delete product'];
            }
        } catch (\Exception $e) {
            $data = ['status' => 500, 'message' => 'error remove product'];
            return response()->json($data);
        }

        return response()->json($data);
    }

    public function infoOrder() {
        return view('cart.info-order');
    }

}
