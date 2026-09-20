<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function getBlog(){
        $data = Blog::all();
        return view('admin.user.blog.list_blog', compact('data'));
    }

    function addBlog(){
        return view('admin.user.blog.add_blog');
    }

    function store(BlogRequest $req){
        $data = $req -> all();
        $file = $req -> image;

        if(!empty($file)){
            $data['image'] = $file -> getClientOriginalName();
        }
        if(Blog::create($data)){
            if(!empty($file)){
                $file-> move('admin/assets/images/blogs', $file -> getClientOriginalName());
            }
            return redirect('/admin/blog/list');
        }else{
            echo 'Erroe';
        }
    }

    function editBlog($id){
        $data = Blog::findOrFail($id);
        return view('admin.user.blog.edit_blog', compact('data'));
    }

    function update(BlogRequest $req, $id){
        $blog = Blog::findOrFail($id);
        $data = $req -> all();
        $file = $req -> image;

        if(!empty($file)){
            $data['image'] = $file -> getClientOriginalName();
        }else{
            $data['image'] = $blog -> image;
        }

        if($blog -> update($data)){
            if(!empty($file)){
                $file -> move('admin/assets/images/blogs', $file -> getClientOriginalName());
            }
            return redirect('/admin/blog/list');
        }else{
            echo 'Error';
        }
    }

    function delete($id){
        Blog::where('id',$id)-> delete();
        return redirect('/admin/blog/list');
    }
}
