<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function getBrand(){
        $data = Brand::all();
        return view('admin.user.brand.list', compact('data'));
    }

    function add(){
        return view('admin.user.brand.add');
    }
    
    function store(BrandRequest $req){
        $data = $req -> all();
        if(Brand::create($data)){
            return redirect('/admin/brand/list') -> with('success', 'Thành công');
        }else{
            return redirect('/admin/brand/add')-> with('error', 'thất bại');
        }
    }

    function delete($id){
        Brand::where('id', $id) -> delete();
        return redirect('admin/brand/list');
    }
}
