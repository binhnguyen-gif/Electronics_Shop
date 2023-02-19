<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function showLoginForm() {
        return view('admin.auth.login');
    }

    public function login(AdminLogin $request) {
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('users')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'message' => 'Thông tin đăng nhập không chính xác',
        ]);
    }

    public function logout(){
        Auth::guard('users')->logout();
        return redirect()->route('admin.show_login_form');
    }
}
