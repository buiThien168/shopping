<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\order_items;
use Illuminate\Support\Facades\Auth;

class Product_detailUserController extends Controller
{
    public function index($id)
    {
        $category = Category::where('parent_id', 0)->take(6)->get();
        $product = Product::find($id);
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $productsRecomment = Product::latest('views_count', 'desc')->get();
        // dd($product->productImages);
        return view('user.product.product_detil.list', compact('product', 'category', 'categoryLimit', 'productsRecomment'));
    }
    public function store(Request $request)
    {
        order_items::create([
            'product_id' => $request->id,
            'user_id' => Auth()->id(),
            'name' => $request->name,
            'count_product' => $request->count_product
        ]);
        return redirect()->route('cart.user', ['id' => $request->id]);
    }
}