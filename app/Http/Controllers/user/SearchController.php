<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function searchProduct(Request $req){
        $key = $req -> input('search');
        $products = Product::where('name', 'like', '%'.$key.'%')-> get();
        return view('user.product.search', compact('products', 'key'));
    }
}
