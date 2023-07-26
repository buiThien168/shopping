<?php

namespace App\Http\Controllers\User;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginUser()
    {
        return view('user.login');
    }
    public function postLoginUser(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        // $checkpass = Hash::check($request->password, $password_data);

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->to('home');
        } else {
            dd('s');
        }
    }
    public function home()
    {
        $category = Category::where('parent_id', 0)->take(6)->get();
        $slider = Slider::latest()->get();
        $products = Product::latest()->take(6)->get();
        $productsRecomment = Product::latest('views_count', 'desc')->get();
        // dd($productsRecomment);
        return view('user.home.home', compact('category', 'slider', 'products', 'productsRecomment'));
    }
}
