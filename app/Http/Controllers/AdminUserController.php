<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\LOG;
use App\Traits\DeleteModelTrait;

class AdminUserController extends Controller
{
    private $role;
    private $user;
    use DeleteModelTrait;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $user = $this->user->latest()->paginate(5);
        return view('admin.users.index', compact('user'));
    }
    public function create()
    {
        $role = $this->role->all();
        return view('admin.users.add', compact('role'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('user.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage());
        }


        // foreach ($roleIds as $roleItem) {
        //     DB::table('role_user')->insert([
        //         'role_id' => $roleItem,
        //         'user_id' => $user->id
        //     ]);
        // }
    }
    public function delete($id)
    {
        return $this->DeleteModelTrait($id, $this->user);
    }
    public function edit($id)
    {
        $role = $this->role->all();
        $user = $this->user->find($id);
        $roleOfUser = $user->roles;
        return view('admin.users.edit', compact('user', 'role', 'roleOfUser'));
    }
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $roleIds = $request->role_id;
            $user->roles()->sync($roleIds);
            DB::commit();
            return redirect()->route('user.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message' . $exception->getMessage());
        }
    }
}
