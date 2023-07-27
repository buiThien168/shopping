<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\order_items;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Product_cartController extends Controller
{
    public function index(Request $request)
    {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();

        $userId = Auth::id(); // Get the ID of the currently authenticated user

        $orderItems = order_items::join('products', 'order_items.product_id', '=', 'products.id')->where('order_items.user_id', $userId)->select('order_items.*', 'products.price as products_price', 'products.feature_image_path as products_img')->get();

        $cart = Session::get('cart', []);
        $total = 0;
        $dem = 0;
        foreach ($orderItems as $item) {
            $total += $item->products_price;
            $dem++;
        }
        return view('user.product.cart.index', compact('categoryLimit', 'orderItems', 'total', 'dem'));
    }
    public function delete($id, Request $request)
    {
        $id = $request->id;
        $order_items = order_items::find($id);
        $order_items->delete();
        return redirect()->route('cart.user');
    }
    public function update(Request $request)
    {
        // order_items::updateOrCreate(
        //     [
        //         'product_id' => $request->id,
        //         'user_id' => Auth()->id(),

        //     ],
        //     [
        //         'name' => $request->name,
        //         'count_product' => $request->count_product
        //     ]
        // );
        return redirect()->route('cart.checkout.user');
    }
    public function checkout()
    {

        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $userId = Auth::id();
        $orderItems = order_items::join('products', 'order_items.product_id', '=', 'products.id')->where('order_items.user_id', $userId)->select('order_items.*', 'products.price as products_price', 'products.feature_image_path as products_img')->get();
        $total = 0;
        $dem = 0;
        foreach ($orderItems as $item) {
            $total += $item->products_price;
            $dem++;
        }

        return view('user.product.cart.thanhtoan', compact('orderItems', 'categoryLimit', 'total'));
    }
}
