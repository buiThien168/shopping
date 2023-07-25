<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{


    public function index()
    {

        return view('admin.permission.add');
    }
    public function create()
    {
        return view('admin.permission.add');
    }
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->module_parent,
            'display_Name' => $request->module_parent,
            'parent_id' => 0
        ]);
        foreach ($request->module_chilrent as $value) {
            Permission::create([
                'name' => $value,
                'display_name' => $value,
                'parent_id' => $permission->id,
                'key_code' => $request->module_parent . '_' . $value
            ]);
        }
    }
    public function delete($id)
    {
    }
    public function edit(Request $request, $id)
    {
    }
    public function update($id, Request $request)
    {
    }
}
