<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionRole;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::where('isdelete', 0)->get();
        $permissions = Permission::all();
        return view('backend.role.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $obj = Role::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->input('name')
            ]
        );

        return redirect(route('backend.role.index', $request->query()));
    }

    public function updatePermissions(Request $request)
    {
        $data = $request->input('data');

        $grouped = collect($data)->groupBy('role_id');

        foreach ($grouped as $roleId => $permissions) {
            $role = Role::find($roleId);
            if (!$role || $role->id == 1 || $role->id == 2) continue;

            $permissionIds = collect($permissions)
                        ->filter(function ($item) {
                            return $item['checked'];
                        })
                        ->pluck('permission_id')
                        ->toArray();


            $role->permissions()->sync($permissionIds);
        }

        return response()->json(['success' => true]);
    }

    public function edit(Request $request)
    {
        $role = Role::find($request->id);
        return response()->json([
            'role' => $role
        ]);
    }

    public function delete(Request $request)
    {
        $role = Role::find($request->id);
        if ($role) {
            $role->isdelete = 1;
            $role->save();
        }
        return redirect(route('backend.role.index', $request->query()));
    }
}
