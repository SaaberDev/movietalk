<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts_images extends Model
{
    public function postImg(){
        return $this->belongsTo(posts::class);
    }
}
