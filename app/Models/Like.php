<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Mar 2017 17:46:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Like
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_post
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Like extends Eloquent
{
	protected $casts = [
		'id_user' => 'int',
		'id_post' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_post'
	];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
