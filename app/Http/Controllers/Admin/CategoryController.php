<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index() {
        return view('admin.category.index');
    }

    public function create() {
        return view('admin.category.create_update');
    }
}
