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
}
