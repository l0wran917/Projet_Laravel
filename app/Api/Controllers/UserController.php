<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function getByPseudo($pseudo)
    {
        return User::where(User::USERNAME_FIELD, $pseudo)->first();
    }

    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function getAll()
    {
        return User::paginate(25);

    }
}
