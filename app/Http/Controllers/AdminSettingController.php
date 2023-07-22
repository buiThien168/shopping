<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class AdminSettingController extends Controller
{
    private $setting;
    use DeleteModelTrait;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $setting = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('setting'));
    }
    public function create()
    {
        return view('admin.setting.add');
    }
    public function store(AddSettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);
        return redirect()->route('settings.index');
    }
    public function delete($id)
    {
        return $this->DeleteModelTrait($id, $this->setting);
    }
    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }
    public function update($id, Request $request)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect()->route('settings.index');
    }
}
