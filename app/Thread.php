<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Model\{Comment, Like};

class Thread extends Model
{   
    use Traits\CommentableTrait;

    protected $fillable = ['subject', 'thread', 'type', 'user_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
