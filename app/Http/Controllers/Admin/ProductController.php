<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    function showProduct()
    {
        $products = Product::all();
        $brands = Brand::all();
        $category = Category::all();
        $users = User::all();
        return view('admin.user.product.list', compact('products', 'brands', 'category', 'users'));
    }

    function searchProduct(Request $req)
    {
        $key = $req->input('key');
        $user = User::where('name', 'like', '%' . $key . '%')->where('level', 0)->first();
        $id = $user->id;

        $product = Product::where('id_user', $id)->get();
        return response()->json([
            'products' => $product
        ]);
    }
    function editProduct($id)
    {
        $data = Product::findOrFail(($id));
        $brand = Brand::all();
        $category = Category::all();

        return view('admin.user.product.edit', compact('data', 'brand', 'category'));
    }

    function updateProduct(UpdateProductRequest $req, $id)
    {
        $product = Product::findOrFail($id);
        $data = $req->all();
        $image = json_decode($product->image, true);

        if (empty($data['sale'])) {
            $data['sale'] = $product->sale;
        }

        if (!empty($req->rmImage)) {
            $rmImg = $req->rmImage;
            foreach ($rmImg as $rm) {
                foreach ($image as $key => $img) {
                    if ($rm == $img) {
                        $this->deleteProductImageFiles($img);
                        unset($image[$key]);
                    }
                }
            }
        }
        $image = array_values($image);
        $images = [];

        if ($req->hasFile('image')) {
            $files = $req->image;
            foreach ($files as $img) {
                $anh = Image::read($img);

                $name = $img->getClientOriginalName();
                $name1 = 'hinh50' . $img->getClientOriginalName();
                $name2 = 'hinh200' . $img->getClientOriginalName();

                $path = public_path('/user/images/product-details/' . $name);
                $path1 = public_path('/user/images/product-details/' . $name1);
                $path2 = public_path('/user/images/product-details/' . $name2);

                $anh->save($path);
                $anh->resize(50, 70)->save($path1);
                $anh->resize(200, 300)->save($path2);
                $images[] = $name;
            }
        }

        $newImage = array_merge($image, $images);
        if (count($newImage) > 3) {
            return back()->with('error', 'Tối đa 3 hình');
        } else {
            $data['image'] = json_encode($newImage);
            if ($product->update($data)) {
                return redirect('/admin/product/list');
            } else {
                return redirect('/admin/product/edit');
            }
        }
    }
    function deleteProductImageFiles($image)
    {
        File::delete([
            public_path('/user/images/product-details/' . $image),
            public_path('/user/images/product-details/hinh50' . $image),
            public_path('/user/images/product-details/hinh200' . $image),
        ]);
    }

    function deleteProduct(Request $req){
        $id = $req -> id;
        $product = Product::findOrFail($id);
        $images = json_decode($product -> image, true);
        foreach($images as $img){
            $this -> deleteProductImageFiles($img);
        }
        $product -> delete();
        return response() -> json([
            'success' => true,
            'message' => 'Xóa tài khoản thành công'
        ]);
    }


}
    
