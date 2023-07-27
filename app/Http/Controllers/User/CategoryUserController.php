<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryUserController extends Controller
{
    public function index($categoryId)
    {
        $category = Category::where('parent_id', 0)->take(6)->get();
        $products = Product::where('category_id', $categoryId)->paginate(12);
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('user.product.category.list', compact('categoryLimit', 'products', 'category'));
    }
}
