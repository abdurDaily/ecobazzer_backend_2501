<?php

namespace App\Http\Controllers\Backend\RolePermission;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use SweetAlert2\Laravel\Swal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\View\Components\Alert;

class RolePermissionController extends Controller
{
    //* createUser
    public function createUser()
    {
        return view('backend.rolePermission.createUser');
    }

    //* USER LIST 
    public function listUsers()
    {
        $users = User::latest()->get();
        return view('backend.rolePermission.listUser', compact('users'));
    }

    //* EDIT USER 
    public function editUsers($id)
    {
        $editUser = User::find($id);
        // dd($editUser);
        return view('backend.rolePermission.editUser', compact('editUser'));
    }

    //* UPDATE USER INFO
    public function updateUser(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_password' => 'required|min:6',
        ]);

        if ($request->user_password != $request->user_confirm_password) {
            return back()->with('pass_error', 'confirm password not matched!');
        }

        $userInfo = User::find($id);

        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $uniName = 'user-image-' . time() . '-' . $image->getClientOriginalName();
            $image->storeAs('profileImages/', $uniName, 'public');
            $userInfo->profile_image = $uniName;
        }

        $userInfo->name = $request->user_name;
        $userInfo->email = $request->user_email;
        $userInfo->password = Hash::make($request->user_password);
        $userInfo->save();
        toastr()->success('New user added successfully!.');
        return back();
    }

    //* CREATE ROLE 
    public function createRole()
    {
        return view('backend.rolePermission.createRole');
    }

    // * ROLE STORE 
    public function createRoleStore(Request $request)
    {
        // dd($request->all());
        $role = new Role();
        $role->name = $request->role_name;
        $role->guard_name = 'web';
        $role->save();
        toastr()->success('successfully role created.');
        return back();
    }

    //* DELETE USER
    public function deleteUser($id)
    {
        User::find($id)->delete();
        toastr()->success('user successfully deleted!.');
        return back();
    }

    //* ROLE LIST 
    public function roleList($id){
        $user = User::find($id);
        $roles = Role::latest()->get();
        return view('backend.rolePermission.roleList', compact('roles','user'));
    }

    //* storeUser
    public function storeUser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_image' => 'required|max:2000|mimes:png,jpg,webp',
            'user_name' => 'required',
            'user_email' => 'required',
            'user_password' => 'required|min:6',
        ]);

        if ($request->user_password != $request->user_confirm_password) {
            return back()->with('pass_error', 'confirm password not matched!');
        }

        $userInfo = new User();

        if ($request->hasFile('user_image')) {
            $image = $request->file('user_image');
            $uniName = 'user-image-' . time() . '-' . $image->getClientOriginalName();
            $image->storeAs('profileImages/', $uniName, 'public');
            $userInfo->profile_image = $uniName;
        }

        $userInfo->name = $request->user_name;
        $userInfo->email = $request->user_email;
        $userInfo->password = Hash::make($request->user_password);
        $userInfo->save();
        toastr()->success('New user added successfully!.');
        return back();
    }
}
