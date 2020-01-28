<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    public $timestamps = false;
    protected $guarded = array();

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
