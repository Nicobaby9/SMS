<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Model\{Comment, Like};
use App\Traits\CommentableTrait;

class Thread extends Model
{   
    use CommentableTrait;


    protected $fillable = ['subject', 'thread', 'type', 'user_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function comments() {
    	return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function likes() {
    	return $this->morphMany(Like::class, 'likeable');
    }
}
