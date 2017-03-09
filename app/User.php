<?php

namespace App;

use App\Models\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'lastname',
		'email',
		'password',
		'remember_token',
		'firstname',
		'picture',
		'pseudo'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const USERNAME_FIELD = 'pseudo';

    public function posts(){
        return $this->hasMany(Post::class, 'id_user');
    }

    public function follower(){
        return $this->hasMany(User::class, 'id_follower');
    }

    public function followed(){
        return $this->hasMany(User::class, 'id_followed');
    }
}
