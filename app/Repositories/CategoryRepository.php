<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategory()
    {
        return Category::query()->get();
    }

    public function createCategory(array $params)
    {
        return Category::create($params);
    }

    public function getCategoryById($id)
    {
        $category = Category::query()->where('id', $id)->where('trash', 1)->latest()->get();
        return $category;
    }
}
