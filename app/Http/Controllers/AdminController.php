<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function loginAdmin()
    {
        // if (auth()->check()) {
        //     return redirect()->to('home');
        // }
        return view('admins.login');
    }
    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        // $checkpass = Hash::check($request->password, $password_data);

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->route('admin.home');
        } else {
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function homeUser()
    {
        return view('admins.home');
    }
}
