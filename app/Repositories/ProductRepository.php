<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProduct()
    {
        // TODO: Implement getAllProduct() method.
        return Product::query()->get();
    }

    public function createProduct(array $params)
    {
        return Product::create($params);
    }

    public function getProductById($id)
    {
        return Product::query()->whereId($id)->first();
    }

    public function updateProduct($id, array $params)
    {
        return Product::whereId($id)->update($params);
    }

    public function deleteProduct($id)
    {
        return Product::destroy($id);
    }

    public function restoreProductById($id)
    {
        return Product::withTrashed()->whereId($id)->restore();
    }

    public function foreverDeleteProductById($id)
    {
        return Product::withTrashed()->whereId($id)->forceDelete();
    }

    public function totalTrash()
    {
        return Product::onlyTrashed()->count();
    }

    public function searchProduct($key_word)
    {
        // TODO: Implement searchProduct() method.
        $products = Product::select(['id', 'name'])->orderBy('id', 'DESC');
        if (!empty($key_word)){
            $products = Product::query()->where(function ($query) use ($key_word) {
                $query->where('name', 'like', '%' . $key_word . '%');
            })->orderBy('id', 'DESC');
        }

        return $products->get();
    }
}
