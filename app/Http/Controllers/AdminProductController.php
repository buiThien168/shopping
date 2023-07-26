<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    public function index()
    {
        // $products = $this->product->latest()->with('category')->paginate(5); //latest lấy cái mới nhất

        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->paginate(5);
        return view('admins.admin.product.index', compact('products'));
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentid = '');
        return view('admins.admin.product.add', compact('htmlOption'));
    }
    public function getCategory($parentid)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption =  $recusive->categoryRecusive($parentid);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->parent_id,
            ];
            $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUpload)) {
                $dataProductCreate['feature_image_path'] = $dataUpload['file_path'];
                $dataProductCreate['feature_image_name'] = $dataUpload['file_name'];
            }
            $product = $this->product->create($dataProductCreate);
            //insert data to product image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            //insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagsID[] = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagsID);
            DB::commit();
            return redirect()->route('product.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage());
        }
    }
    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admins.admin.product.edit', compact('htmlOption', 'product'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->parent_id,
            ];
            $dataUpload = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUpload)) {
                $dataProductUpdate['feature_image_path'] = $dataUpload['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataUpload['file_name'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            //update data to product image
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete(); // kiểm tra nếu tồn tại rồi xóa đi
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            //update tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagsID[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagsID);
            DB::commit();
            return redirect()->route('product.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (Exception $exception) {
            Log::error('Message' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
