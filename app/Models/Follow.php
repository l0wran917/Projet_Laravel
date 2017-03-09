<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Mar 2017 17:46:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Follow
 * 
 * @property int $id
 * @property int $id_follower
 * @property int $id_followed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Follow extends Eloquent
{
	protected $casts = [
		'id_follower' => 'int',
		'id_followed' => 'int'
	];

	protected $fillable = [
		'id_follower',
		'id_followed'
	];

    public function followed(){
        return $this->belongsTo(User::class, 'id_followed');
    }

    public function follower(){
        return $this->belongsTo(User::class, 'id_follower');
    }
}
