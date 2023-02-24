<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create_update');
    }

    public function store(StoreRequest $request)
    {
        dd($request->all());
    }

    public function update()
    {
    }

    public function recyclebin()
    {
    }
}
