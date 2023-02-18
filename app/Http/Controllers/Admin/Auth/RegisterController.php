<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegister;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm() {
        return view('admin.auth.register');
    }

    public function register(AdminRegister $request) {
//        dd($request->all());
//        $cre
    }
}
