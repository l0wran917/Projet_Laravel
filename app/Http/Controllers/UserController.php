<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index($username){

		$user = User::where(User::USERNAME_FIELD, $username)->first();

		return view('user', ['user' => $user]);
	}
}
