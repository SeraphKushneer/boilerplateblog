<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {


        $this->validate(request(),['body'=>'required|min:2']);

        $post->addComment(request('body') );
        return back();
        /*
         Comment::create([
             'body'=>request('body'),
             'post_id'=>$post->id
         ]);
         return back();
*/

    }
}