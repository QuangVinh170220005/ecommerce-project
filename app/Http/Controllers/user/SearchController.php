<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function searchName(Request $req){
        $key = $req -> input('search');
        $products = Product::where('name', 'like', '%'.$key.'%')-> get();
        return view('user.product.search-name', compact('products', 'key'));
    }

    function showAdvanced(){    
        $category = Category::all() -> toArray();
        $brand = Brand::all() -> toArray();
        return view('user.product.search-advanced', compact('category', 'brand'));
    }

    function handleSearch(Request $req){
       $query = Product::query();
       if($req -> filled('name')){
        $query -> where('name', 'like', '%'.$req->name.'%');
       }
       if($req -> filled('category')){
        $query -> where('id_category', $req -> category);
       }
       if($req -> filled('status')){
        $query -> where('status', $req -> status);
       }
       if($req -> filled('price')){
            if($req -> price == '0-200000'){
                $query -> whereBetween('price', [0, 200000]);
            }elseif($req -> price == '200000'){
                $query -> where('price', '>', 200000);
            }
       }
       if($req -> filled('brand')){
        $query -> where('id_brand', $req -> brand);
       }

       $products = $query -> orderBy('created_at', 'desc')-> paginate(6);
       return response() -> json([
          'data' => $products
       ]);
    }   

    function searchPrice(Request $req){
        $min = $req -> minPrice;
        $max = $req -> maxPrice;

        $products = Product::whereBetween('price', [$min, $max])-> get();
        $html = view('user.product.search-price', compact('products'))->render();

        return response()->json([
            'status' => 'success',
            'html'   => $html
        ]);
    }
}
