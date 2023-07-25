<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Traits\DeleteModelTrait;

class AdminRolesController extends Controller
{
    private $role;
    private $permission;
    use DeleteModelTrait;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index()
    {

        $role = $this->role->latest()->paginate(5);
        return view('admin.roles.index', compact('role'));
    }
    public function create()
    {
        $permission = $this->permission->where('parent_id', 0)->get();
        return view('admin.roles.add', compact('permission'));
    }
    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permission()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function delete($id)
    {
        return $this->DeleteModelTrait($id, $this->role);
    }
    public function edit(Request $request, $id)
    {
        $permission = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permission;
        return view('admin.roles.edit', compact('role', 'permission', 'permissionChecked'));
    }
    public function update($id, Request $request)
    {
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role = $this->role->find($id);
        $role->permission()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function createPermission()
    {
    }
}
