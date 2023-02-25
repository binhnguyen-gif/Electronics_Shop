<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategory()
    {
        return Category::query()->with('parent')->get();
    }

    public function createCategory(array $params)
    {
        return Category::create($params);
    }

    public function getCategoryById($id)
    {
        $category = Category::query()->where('id', $id)->first();
        return $category;
    }

    public function updateCategory($id, array $params)
    {
        return Category::whereId($id)->update($params);
    }
}
