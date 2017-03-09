<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        /**
         * Get posts from DB who the current user is following these
         */
        $posts = DB::table('posts')
        ->leftJoin('follows', 'id_followed', '=', 'id_user')
        ->where('follows.id_follower', Auth::id())
        ->get();
        return view('news', ['posts' => $posts]);
    }

}
