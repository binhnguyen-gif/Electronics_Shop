<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    //
    public function index()
    {
        return view('admin.coupon.index');
    }

    public function create() {
        return view('admin.coupon.create_update');
    }
}
