<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function getProfile(){
        $user = Auth::user();
        return view('admin.user.profile', compact('user'));
    }

    function updateProfile(UpdateProfileRequest $req){
        
        $id = Auth::id();
        $user = User::findOrFail($id);
        $data = $req->all();
        $file = $req -> avatar;

        if(!empty($file)){
            $data['avatar'] = $file -> getClientOriginalName();
        }

        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user -> password;
        }

        if ($user->update($data)) {
            if(!empty($file)){
                $file->move('admin/assets/images/users', $file->getClientOriginalName());
            }
            return redirect('/admin/profile')->with('success', __('Update profile success.'));
        } else {
            return redirect('/admin/profile')->withErrors('Update profile error.');
        }
    }
}