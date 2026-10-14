<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\LoginRequest;
use App\Http\Requests\user\RegisterRequest;
use App\Http\Requests\user\ResetPasswordRequest;
use App\Mail\ResetPassMail;
use App\Models\Country;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    function register()
    {
        $data = Country::all();
        return view('user.auth.register', compact('data'));
    }

    function handleRegister(RegisterRequest $req)
    {
        $data = $req->all();
        $this->crerateUser($data);
        return redirect('shop/login')->with('success', 'Register successfull');
    }

    function login()
    {
        return view('user.auth.login');
    }

    function handleLogin(LoginRequest $req)
    {
        $login = [
            'email' => $req->email,
            'password' => $req->password,
        ];
        $remember = false;
        if ($req->remember_me) {
            $remember = true;
        }
        if (Auth::attempt($login, $remember)) {
            if (Auth::user()->level == 1) {
                return redirect('/admin/dashboard')->with('success', 'Đăng nhập Admin thành công.');
            }
            return redirect('/home')->with('success', 'Đăng nhập thành công.');
        } else {
            return redirect('/shop/login')->with('error', 'Email hoặc mật khẩu không đúng.');
        }

    }

    function logout()
    {
        Auth::logout();
        return redirect('/shop/login');
    }

    public function crerateUser(array $data)
    {
        $data['level'] = 0;
        $file = $data['avatar'];
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
            $file->move('admin/assets/images/users', $file->getClientOriginalName());
        }
        return User::create($data);
    }

    function fogotPass(){
        return view('user.password.forgot-password');
    }

    function resetPass($id){
        $user = User::findOrFail($id);
        return view('user.password.reset-password', compact('user'));
    }

    function sendMail(Request $req){
        $mail = $req -> email;
        $user = User::where('email', $mail)->first();
        if(!$user){
            alert('Email không tồn tại bạn');
        }
        $data=[
            'url' => 'http://127.0.0.1:8000/shop/reset-password/'.$user -> id,
        ];
        try{
            Mail::to($mail)->send(new ResetPassMail($data));
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
    function resetPassword(ResetPasswordRequest $req, $id){
        $password = $req -> password;
        $user = User::findOrFail($id);

        $pass['password'] = bcrypt($password);

        if($user -> update($pass)){
            return redirect('/shop/login');
        }else{
            return redirect('/shop/register');
        }
    }
}
