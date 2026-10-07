<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart(Request $req)
    {
        $id = $req->id;
        $product = Product::findOrFail($id)->toArray();

        $product['image'] = json_decode($product['image'], true);

        $check = false;
        $count = 0;
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) {
                $cart[$key]['qty'] += 1;
                $check = true;
            }
        }
        if (!$check) {
            $product['qty'] = 1;
            $cart[] = $product;
        }

        $count = 0;
        foreach ($cart as $item) {
            $count += $item['qty'];
        }
        session()->put('cart', $cart);

        return response()->json(['data' => $product, 'count' => $count]);
    }

    function showCart()
    {
        $data = session()->get('cart', []);
        return view('user.cart.list', compact('data'));
    }

    function updateQuantity(Request $req){
        $id = $req -> id;
        $check = $req -> check;
        $cart = session() -> get('cart', []);

        foreach($cart as $key => $item){
            if($item['id'] == $id){
                if($check == 'true'){
                    $cart[$key]['qty'] += 1;
                }else{
                    $cart[$key]['qty'] -= 1;
                }
            }
        }
        session() -> put('cart', $cart);
        return response() -> json([
            'data' => $cart
        ]);
    }

    function deleteCart(Request $req){
        $id = $req -> id;
        $cart = session() ->get('cart', []);
        foreach($cart as $key => $item){
            if($item['id'] == $id){
                unset($cart[$key]);
            }
        }
        session() -> put('cart', $cart);
        return response() -> json([
            'data' => $cart
        ]);
    }
}
