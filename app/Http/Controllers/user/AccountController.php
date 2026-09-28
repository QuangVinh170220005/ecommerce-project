<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UpdateAccountRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    function getAccount(){
        $user = Auth::user();
        $country = Country::all();
        return view('user.account.account', compact('user', 'country'));
    }

    function update(UpdateAccountRequest $req){
        $id = Auth::id();
        $user = User::findOrFail($id);
        $data = $req -> all();
        $avt = $req -> avatar;
        if(!empty($avt)){
            $data['avatar'] = $avt -> getClientOriginalName();
        }

        if($data['password']){
            $data['password'] = bcrypt($data['password']);
            
        }else{
            $data['password'] = $user -> password;
        }
        if($user -> update($data)){
            if(!empty($avt)){
                $avt -> move('admin/assets/images/users/', $avt -> getClientOriginalName());
            }
            return redirect('/shop/account/update') -> with('success', 'Cập nhập thành công');
        }else{
            return redirect('/shop/account/update') -> with('error', 'Cập nhập không thành công');
        }
    }
}
