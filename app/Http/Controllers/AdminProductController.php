<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Components\Recusive;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits;
use App\Traits\StorageImageTrait;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    public function __construct(Category $category, Product $product, ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
    }
    public function index()
    {
        $product = $this->product->all();
        return view('admin.product.index', compact('product'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentid = '');
        return view('admin.product.add', compact('htmlOption'));
    }
    public function getCategory($parentid)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption =  $recusive->categoryRecusive($parentid);
        return $htmlOption;
    }
    public function store(Request $request)
    {
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'category_id' => $request->parent_id,
        ];
        $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($dataUpload)) {
            $dataProductCreate['feature_image_name'] = $dataUpload['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUpload['file_path'];
        }
        $product = $this->product->create($dataProductCreate);
        //insert data to product image
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                $this->productImage->create([
                    'product_id' => $product->id,
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name']
                ]);
            }
        }
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
