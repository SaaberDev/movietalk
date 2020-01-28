<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cover_PostImage extends Model
{
    public function coverImg(){
        return $this->belongsTo(posts::class, 'post_id');
    }
}
