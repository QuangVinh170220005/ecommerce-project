<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $avgRate = round(Rate::where('id_blog', $id)-> avg('rate'));
        $comment = Comment::where('id_blog', $id) -> orderBy('id', 'asc')-> get();
        
        return view('user.blog.detail', compact('data',
                                                                        'prev', 
                                                                        'next', 
                                                                        'avgRate', 
                                                                        'comment'));
    }

    function blogRate(Request $req){
        $data = $req -> all();
        $data['id_user'] = Auth::id();

        Rate::updateOrCreate(
            [
                'id_blog' => $data['id_blog'],
                'id_user' => $data['id_user']
            ],
            [
                'rate' => $data['rate'],
                'time' => now()
            ]
        );
    }

    function commentBlog(Request $req){
        $data = $req -> all();
        $user = Auth::user();

        $data['id_user'] = $user -> id;
        $data['avt_user'] = $user -> avatar;
        $data['name_user'] = $user -> name;
        $data['level'] = 0;
        $data['time'] = now();
        Comment::create($data);

        return response() -> json(['data' => $data]);
    }
}
