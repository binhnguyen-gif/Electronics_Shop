<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface {
    public function getAllCategory();
    public function createCategory(array $params);
    public function getCategoryById($id);
    public function updateCategory($id, array $params);
    public function restoreCategoryById($id);
    public function foreverDeleteCategoryById($id);
    public function totalTrash();
    public function getSubCategory();


}
