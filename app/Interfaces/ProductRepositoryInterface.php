<?php

namespace App\Interfaces;

interface ProductRepositoryInterface {
    public function getAllProduct();
    public function createProduct(array $params);
    public function getProductById($id);
    public function updateProduct($id, array $params);
    public function deleteProduct($id);
    public function restoreProductById($id);
    public function foreverDeleteProductById($id);
    public function totalTrash();
}
