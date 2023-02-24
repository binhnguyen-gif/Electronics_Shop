<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface {
    public function getAllCategory();
    public function createCategory(array $params);
    public function getCategoryById($id);
}