<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function addProduct(){
        $brand = Brand::all();
        $category = Category::all();

        return view('user.account.add-product', compact('brand', 'category'));
    }

    function store(ProductRequest $req){
        if (!Auth::check()) {
            return redirect('/shop/login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm.');
        }

        $id = Auth::id();
        $data = $req -> all();
        $data['id_user'] = $id;
        if($data['status'] == 0){
            $data['sale'] = 0;
        }
       if( Product::create($data)){
        return redirect('/shop/account/add-product');
       }else{
        return redirect('/shop/account/update');
       }
    }
}
