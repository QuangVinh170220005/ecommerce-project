<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\ProductRequest;
use App\Http\Requests\user\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;

use function Laravel\Prompts\alert;

class ProductController extends Controller
{
    function addProduct()
    {
        $brand = Brand::all();
        $category = Category::all();

        return view('user.account.add-product', compact('brand', 'category'));
    }

    function store(ProductRequest $req)
    {
        if (!Auth::check()) {
            return redirect('/shop/login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm.');
        }

        $id = Auth::id();
        $data = $req->all();
        $data['id_user'] = $id;
        if ($data['status'] == 0) {
            $data['sale'] = 0;
        }
        $images = [];
        if ($req->hasFile('image')) {
            foreach ($req->file('image') as $img) {
                $image = Image::read($img);
                $name = $img->getClientOriginalName();
                $name1 = 'hinh50' . $img->getClientOriginalName();
                $name2 = 'hinh200' . $img->getClientOriginalName();

                $path = public_path('/user/images/product-details/' . $name);
                $path1 = public_path('/user/images/product-details/' . $name1);
                $path2 = public_path('/user/images/product-details/' . $name2);

                $image->save($path);
                $image->resize(50, 70)->save($path1);
                $image->resize(200, 300)->save($path2);

                $images[] = $name;
            }
        }

        $data['image'] = json_encode($images);

        if (Product::create($data)) {
            return redirect('/shop/account/add-product');
        } else {
            return redirect('/shop/account/update');
        }
    }

    function getProduct()
    {
        $data = Product::all()->toArray();

        return view('user.account.my-product', compact('data'));
    }

    function edit($id)
    {
        $data = Product::findOrFail(($id));
        $brand = Brand::all();
        $category = Category::all();
        return view('user.account.update-product', compact('data', 'brand', 'category'));
    }

    function update(UpdateProductRequest $req, $id)
    {   
        $prod = Product::findOrFail($id);
        $data = $req->all();
        $oldImage = json_decode($prod->image, true);

        if (empty($data['sale'])) {
            $data['sale'] = $prod->sale;
        }
        if(!empty($req->rmImage)){
            $rmImg = $req->rmImage;
        foreach ($rmImg as $rm) {
            foreach ($oldImage as $key => $img) {
                if ($rm == $img) {
                    unset($oldImage[$key]);
                }
            }
        }
        }
        $oldImage = array_values($oldImage);

        $images = [];
        if ($req->hasFile('image')) {
            foreach ($req->file('image') as $img) {
                $image = Image::read($img);
                $name = $img->getClientOriginalName();
                $name1 = 'hinh50' . $img->getClientOriginalName();
                $name2 = 'hinh200' . $img->getClientOriginalName();

                $path = public_path('/user/images/product-details/' . $name);
                $path1 = public_path('/user/images/product-details/' . $name1);
                $path2 = public_path('/user/images/product-details/' . $name2);

                $image->save($path);
                $image->resize(50, 70)->save($path1);
                $image->resize(200, 300)->save($path2);
                $images[] = $name;
            }
        }
        $newImage = array_merge($oldImage, $images);
        if (count($newImage) > 3) {
              return back()->with('error', 'Tối đa 3 hình');
        } else {
            $data['image'] = json_encode($newImage);
            if ($prod -> update($data)) {
                return redirect('/shop/account/my-product');
            } else {
                return redirect('/shop/account/edit-product');
            }
        }
       
    }
}
