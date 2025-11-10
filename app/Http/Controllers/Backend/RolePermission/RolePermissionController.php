<?php

namespace App\Http\Controllers\Backend\RolePermission;

use App\Models\User;
use Illuminate\Http\Request;
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
