<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Like;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index($username)
    {
        $user = User::where(User::USERNAME_FIELD, $username)->first();

        $posts = $user->posts;

        $likes = Auth::user()->likes;
        $likes = Like::formatLikes($likes);

        $wawaters = $user->follower;
        $wawateds = $user->followed;

        return view('user', [
            'user' => $user,
            'isFollowed' => $this->isFollowed($username),
            'posts' => $posts,
            'likes' => $likes,
            'wawaters' => $wawaters,
            'wawateds' => $wawateds
        ]);
    }

    public function follow($username)
    {
        $user = User::where(User::USERNAME_FIELD, $username)->first();

        if (empty($user)) {
            Session::flash('error', true);
            return back();
        }

        $follow = new Follow();
        $follow->id_follower = Auth::id();
        $follow->id_followed = $user->id;
        $follow->save();

        Session::flash('success', true);
        return back();
    }

    public function unfollow($username)
    {
        $user = User::where(User::USERNAME_FIELD, $username)->first();
        if (empty($user)) {
            Session::flash('error', true);
            return back();
        }

        $follow = Follow::where('id_follower', Auth::id())->where('id_followed', $user->id)->first();
        Follow::destroy($follow->id);

        Session::flash('success', true);
        return back();
    }

    public function isFollowed($username)
    {
        $user = User::where(User::USERNAME_FIELD, $username)->first();
        if (empty($user)) {
            Session::flash('error', true);
            return back();
        }

        $follow = Follow::where('id_follower', Auth::id())->where('id_followed', $user->id)->get();

        return count($follow) > 0;
    }

    public function editForm(){

        return view('user_edit',
            [
                'user' => Auth::user()
            ]);
    }

    public function edit(Request $request){

        $this->validate($request, [
            'pseudo' => 'required|max:255',
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'describe' => 'max:255',
            'link' => 'max:255',
            'email' => 'required|email|max:255',
        ]);


        $file = $request->file('picture');
        $extension = $file->getClientOriginalExtension();
        $filename = uniqid().'.'.$extension;
        $file->move('uploads', $filename);

        $data = $request->all();
        $data['picture'] = 'uploads/' . $filename;

        if(!isset($data['password'])){
            $data['password'] = Auth::user()->getAuthPassword();
        }

        if(!isset($data['picture'])){
            $data['picture'] = Auth::user()->picture;
        }
        unset($data['_token']);

        $user = Auth::user();
        $user->forceFill($data);
        $user->save();

        return back();
    }
}
