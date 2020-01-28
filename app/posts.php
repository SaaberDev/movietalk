<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    //One to Many Relationship
    public function image(){
        return $this->hasMany(posts_images::class, 'post_id');
    }

    //One to One Relationship
    public function coverImage(){
        return $this->hasOne(cover_PostImage::class, 'post_id');
    }

    //Retrieving Category 'title' by 'category_id' to show category name along with Post
    public function categories(){
        return $this->belongsTo(categories::class, 'category_id');
    }

    //Table Relationship (POSTS & ADMIN)
    public function admins(){
        return $this->belongsTo(admins::class, 'admin_id');
    }
    //Table Relationship (POSTS & USERS)
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
