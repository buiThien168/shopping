<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $category = $this->category->latest()->paginate(5);
        return view('category.index', compact('category'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($category = '');
        return view('category.add', compact('htmlOption'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name) //Str::slug chuyển dổi n doạn thành 1 chuỗi
        ]);
        return redirect()->route('categories.index');
    }
    public function getCategory($parentid)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption =  $recusive->categoryRecusive($parentid);
        return $htmlOption;
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('category.edit', compact('category', 'htmlOption'));
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name) //Str::slug chuyển dổi n doạn thành 1 chuỗi
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id)
    {
    }
}