<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){

        $results = [];
        $query = $request->input('query');

        if(!empty($query)){
            $users = User::where(User::USERNAME_FIELD, 'like', '%' . $query . '%')->get();
            if(count($users) > 0){
                $results['users'] = $users;
            }

            $posts = Post::where(Post::CONTENT_FIELD, 'like', '%' . $query . '%')->get();
            if(count($posts) > 0){
                $results['posts'] = $posts;
            }
        }

        return view('search', ['query' => $query, 'results' => $results]);
    }
}
