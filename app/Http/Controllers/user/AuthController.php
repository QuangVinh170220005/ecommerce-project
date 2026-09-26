<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\LoginRequest;
use App\Http\Requests\user\RegisterRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register(){
        $data = Country::all();
        return view('user.auth.register', compact('data'));
    }
    
    function handleRegister(RegisterRequest $req){
        $data = $req -> all();
        $data['level'] = 0;
        $file = $req -> avatar;
        if(!empty($file)){
            $data['avatar'] = $file -> getClientOriginalName();
            $file->move('admin/assets/images/users', $file->getClientOriginalName());
        }
        if(User::create($data)){
            return redirect('/shop/login')-> with('success', __('Create user success.'));
        }else{
            return redirect('/shop/register')-> with('error', __('Create user error.'));
        }
    }

    function login(){
        return view('user.auth.login');
    }

    function handleLogin(LoginRequest $req){
        $login = [
            'email' => $req -> email,
            'password' => $req -> password,
            'level' => 0
        ];
        $remember = false;
        if($req -> remember_me){
            $remember = true;
        }
        if(Auth::attempt($login, $remember)){
            return redirect('/shop/blog/list')->with('success', 'Đăng nhập thành công.');
        }else{
            return redirect('/shop/login')->with('error', 'Email hoặc mật khẩu không đúng.');
        }
        
    }
}
