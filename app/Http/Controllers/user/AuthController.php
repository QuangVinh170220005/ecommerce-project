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
        $this -> crerateUser($data);
        return redirect('shop/login') -> with('success', 'Register successfull');
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

    function logout(){
        Auth::logout();
        return view('user.auth.login');
    }

    public function crerateUser(array $data){
        $data['level'] = 0;
        $file = $data['avatar']; 
        if(!empty($file)){
            $data['avatar'] = $file -> getClientOriginalName();
            $file->move('admin/assets/images/users', $file->getClientOriginalName());
        }
        return User::create($data);
    }
}
