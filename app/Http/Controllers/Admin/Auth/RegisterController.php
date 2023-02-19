<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegister;
use App\Mail\SendAccountInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm() {
        return view('admin.auth.register');
    }

    public function register(AdminRegister $request) {

//        $user = $request->only(['name', 'email','password']);
        $users = User::where('email', $request->email)->get()->toArray();
        if (!empty($users)) {
            return back()->with('message', 'Email này đã được đăng ký');
        }
//        $account = new User();
//        $account->name = $request->name;
//        $account->email = $request->email;
//        $account->password =  Hash::make($request->password);
//        $account->save();
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $account = User::create($user);

        Mail::to($account['email'])->send(new SendAccountInformation($account));

        return redirect()->route('admin.show_login_form');
    }
}
