<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function showUser()
    {
        $users = User::all();
        return view('admin.user.members.list', compact('users'));
    }

    function editUser($id)
    {
        $user = User::findOrFail($id);
        $country = Country::all();
        return view('admin.user.members.edit', compact('user', 'country'));
    }

    function updateUser(UpdateUserRequest $req, $id)
    {
        $user = User::findOrFail($id);
        $data = $req->all();
        $file = $req->avatar;

        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        if ($user->update($data)) {
            if (!empty($file)) {
                $file->move('admin/assets/images/users', $file->getClientOriginalName());
            }
            return redirect('/admin/user/list');
        } else {
            return redirect('/admin/user/edit');
        }
    }

    public function deleteUser(Request $req)
    {
        try {
            $id = $req->id;
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Xóa tài khoản thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi: Không thể xóa tài khoản này'
            ], 500);
        }
    }
}
