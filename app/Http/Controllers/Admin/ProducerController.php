<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProducerController extends Controller
{
    //
    public function index()
    {
        return view('admin.producer.index');
    }
}
