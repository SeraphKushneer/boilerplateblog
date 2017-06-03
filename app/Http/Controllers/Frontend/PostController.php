<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
 public function  __construct()
{
    $this->middleware('auth')->except(['index','show']);
}



    public function index()
{
    $posts = Post::latest()->get();


    return view('frontend.posts.index',compact('posts'));
}

    public function show($id)
    {
        $post = Post::find($id);
        return view('frontend.posts.show',compact ('post'));
    }

    public function create()
    {
        return view('frontend.posts.create');
    }

    public function store()
    {


        $this->validate(request(),[

            'title'=>'required',
            'body'=> 'required'


                    ]);




        Post::create([
            'title'=>request('title'),
            'body'=>request('body'),
            'user_id'=> auth()->id()

            ]);

        return redirect('/');
       }

}

