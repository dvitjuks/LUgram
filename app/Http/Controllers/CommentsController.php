<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create(\App\Post $post)
    {
        $data = request()->validate([
            'comment' => 'required'
        ]);
        $username = Auth::user()->username;
        $post->comments()->create([
            'post_id' => $post->id,
            'username' => $username,
            'text' => $data['comment']
        ]);
        return redirect('/post/' . $post->id);
    }
}
