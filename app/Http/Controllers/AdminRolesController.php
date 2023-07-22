<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    private $role;
    private $permission;
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
    }
    public function delete($id)
    {
    }
    public function edit($id)
    {
    }
    public function update($id, Request $request)
    {
    }
}
