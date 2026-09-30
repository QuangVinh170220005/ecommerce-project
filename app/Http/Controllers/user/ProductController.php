<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;

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
        $images = [];
        if($req ->hasFile('image')){
            foreach($req -> file('image') as $img){
                $image = Image::read($img);
                $name = $img -> getClientOriginalName();
                $name1 = 'hinh50'.$img -> getClientOriginalName();
                $name2 = 'hinh200'.$img -> getClientOriginalName();

                $path = public_path('/user/images/product-details/'.$name);
                $path1 = public_path('/user/images/product-details/'.$name1);
                $path2 = public_path('/user/images/product-details/'.$name2);

                $image -> save($path);
                $image -> resize(50, 70) -> save($path1);
                $image -> resize(200,300) -> save($path2);

                $images[] = $name;
            }
        }

        $data['image'] = json_encode($images);
        
       if( Product::create($data)){
        return redirect('/shop/account/add-product');
       }else{
        return redirect('/shop/account/update');
       }
    }

    function getProduct(){
        $data = Product::all()->toArray();
        
        return view('user.account.my-product', compact('data'));
    }


}
