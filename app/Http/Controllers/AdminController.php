<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function loginAdmin()
    {
        // if (auth()->check()) {
        //     return redirect()->to('home');
        // }
        return view('login');
    }
    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        // $checkpass = Hash::check($request->password, $password_data);

        if (auth()->attempt([
            'email' => 'admin@gmail.com',
            'password' => '12345'
        ], $remember)) {

            return redirect()->to('home');
        } else {
            dd('sd0');
        }
    }
    // public function logout()
    // {
    //     Auth::logout();
    //     // $this->loginAdmin();
    // }
}
