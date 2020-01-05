<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $path = "/images/";

    protected $fillable = [
        'comment_id',
        'photo',
        'author',
        'email',
        'body',
        'is_active'
    ];


    public function comment()
    {
        return $this->belongsTo('App\Comment', 'comment_id');
    }

    public function getPhotoAttribute($photo)
    {
        return $this->path . $photo;
    }

}
