<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\Comment;
use App\User;

class Thread extends Model
{
    protected $fillable = ['subject', 'thread', 'type', 'user_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function comments() {
    	return $this->morphMany(Comment::class, 'commentable');
    }
}
