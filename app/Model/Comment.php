<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Traits\{CommentableTrait, LikeableTrait};

class Comment extends Model
{   
    use CommentableTrait, LikeableTrait;

    protected $fillable = ['body', 'user_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function commentable() {
    	return $this->morphTo();
    }

}
