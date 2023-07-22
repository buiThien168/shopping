<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\LOG;
use App\Traits\DeleteModelTrait;

class AdminSliderController extends Controller
{
    private $slider;
    use StorageImageTrait;
    use DeleteModelTrait;
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
        return $this->DeleteModelTrait($id, $this->slider);
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
