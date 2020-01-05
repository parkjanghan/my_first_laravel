<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $path = "/images/";

    protected $fillable = [
        'post_id',
        'photo',
        'author',
        'email',
        'body',
        'is_active',
    ];



    public function replies()
    {
        return $this->hasMany('App\CommentReply', 'comment_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function getPhotoAttribute($photo)
    {
        return $this->path . $photo;
    }

}
