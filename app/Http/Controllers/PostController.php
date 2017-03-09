<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function like($id)
    {
        $post = Post::find($id);
        if(empty($post)){
            Session::flash('error', true);
            return back();
        }

        $like = new Like();
        $like->id_user = Auth::id();
        $like->id_post = $post->id;
        $like->save();

        Session::flash('success', true);
        return back();
    }

    public function unlike($id)
    {
        $like = Like::where('id_user', Auth::id())->where('id_post', $id)->first();
        Like::destroy($like->id);

        Session::flash('success', true);
        return back();
    }
}
