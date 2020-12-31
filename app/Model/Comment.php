<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\{Comment, Like};

class Comment extends Model
{   

    protected $fillable = ['body', 'user_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function commentable() {
    	return $this->morphTo();
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }
    
    public function isLiked() {
        return !!$this->likes()->where('user_id', auth()->id())->count();
    }

}
