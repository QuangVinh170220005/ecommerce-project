<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\RegisterRequest;
use App\Mail\OrderMail;
use App\Models\Country;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    function checkout()
    {
        $user = Auth::user();
        $country = Country::all();
        $data = session()->get('cart', []);
        return view('user.checkout', compact('data', 'user', 'country'));
    }
    function quickRegister(RegisterRequest $req)
    {
        $auth = new AuthController();
        $data = $req->all();
        $user = $auth->crerateUser($data);
          Auth::login($user);
        return redirect('/shop/checkout')->with('success', 'Quick regiater successfull');
    }

    function order(Request $req){
        $id = Auth::id();
        $data = $req -> all();
        $data['id_user'] = $id;
        $cart = session()->get('cart', []);
        $price = 0;
        foreach($cart as $product){
            $price += $product['price'] * $product['qty'];
        }
        $data['price'] = $price;
        $mailData = [
            'subject' => 'Xác nhận đơn hàng',
            'data' => $data,
            'product' => $cart,
        ];

        try{
            Mail::to($data['email'])-> send(new OrderMail($mailData));

            Order::create($data);
            session()-> forget('cart');
            return redirect('/home');
        }catch(\Exception $e){
              dd($e->getMessage());
        }
    }
}
