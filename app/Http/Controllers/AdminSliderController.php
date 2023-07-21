<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;

class AdminSliderController extends Controller
{
    private $slider;
    use StorageImageTrait;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $slider = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('slider'));
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataInsertSlider = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataUploadImg = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataUploadImg)) {
                $dataInsertSlider['image_path'] = $dataUploadImg['file_path'];
                $dataInsertSlider['image_name'] = $dataUploadImg['file_name'];
            }
            $this->slider->create($dataInsertSlider);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage());
        }
    }
    public function delete($id)
    {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success'
            ], 200);
        } catch (Exception $exception) {
            Log::error('Message' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail'
            ], 500);
        }
    }
    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $dataSlideUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataUploadImg = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataUploadImg)) {
                $dataSlideUpdate['image_path'] = $dataUploadImg['file_path'];
                $dataSlideUpdate['image_name'] = $dataUploadImg['file_name'];
            }
            $this->slider->find($id)->update($dataSlideUpdate);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage());
        }
    }
}
