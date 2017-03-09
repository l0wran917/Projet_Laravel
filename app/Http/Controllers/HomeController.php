<?php

namespace App\Http\Controllers;

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
        return view('home');
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
}
