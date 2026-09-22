<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function getBlog(){
        $data = Blog::orderBy('created_at', 'desc')->paginate(3);
        return view('user.blog.list', compact('data'));
    }

    function getBlogDetail($id){
        $data = Blog::findOrFail($id);
        $prev = Blog::where('id', '<' , $id) 
        -> orderBy('id', 'desc') -> first();

        $next = Blog::where('id', '>', $id)
        -> orderBy('id', 'asc') -> first();
        
        return view('user.blog.detail', compact('data', 'prev', 'next'));
    }
}
