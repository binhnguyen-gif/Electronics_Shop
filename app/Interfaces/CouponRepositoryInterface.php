<?php

namespace App\Interfaces;

interface CouponRepositoryInterface {
    public function getAllCoupon();
    public function createCoupon(array $params);
    public function getCouponById($id);
    public function updateCoupon($id, array $params);


}
