<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function getCategory(){
        $data = Category::all();
        return view('admin.user.category.list', compact('data'));
    }

    function add(){
        return view('admin.user.category.add');
    }

    function store(CategoryRequest $req){
        $data = $req -> all();

        if(Category::create($data)){
            return redirect('/admin/category/list')-> with('success', 'thành công');
        }else{
            return redirect('/admin/category/add')-> with('error', 'thất bại');
        }
    }

    function delete($id){
        Category::where('id', $id)-> delete();
        return redirect('/admin/category/list');
    }
}
