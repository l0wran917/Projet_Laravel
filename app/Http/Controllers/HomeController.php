<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->getFollowedPosts();

        $likes = Auth::user()->likes;
        $likes = Like::formatLikes($likes);

        return view('home', [
            'user' => Auth::user(),
            'posts' => $posts,
            'likes' => $likes
        ]);
    }

    public function newPost(Request $request) {
        $this->validate($request, [
            'content' => 'required|max:141',
        ]);

        $post = new Post();
        $post->content = $request->content;
        $post->id_user = Auth::id();
        $post->save();

        return redirect('home');
    }

    public function getFollowedPosts(){
        $posts = [];

        $followedUsers = Auth::user()->followed;
        $followedIds = [];
        foreach ($followedUsers as $user){
            $followedIds[] = $user->id_followed;
        }
        $followedIds[] = Auth::id();

        $posts = Post::whereIn('id_user', $followedIds)->orderBy('created_at', 'desc')->get();

        return $posts;
    }
}
