<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\{User, Feed};
use App\Traits\{CommentableTrait, LikeableTrait, ActivityFeedTrait};

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

    public static function boot() {
    	parent::boot();

    	static::created(function($thread) {
    		$thread->activityFeed('created');
    	});

    	static::deleted(function($thread) {
    		$thread->activityFeed('deleted');
    	});

    	static::updated(function($thread) {
    		$thread->activityFeed('updated');
    	});
    }

    public function activityFeed($event) {
    	$this->feeds()->create([
    		'user_id' => auth()->id(),
    		'type' => $event.'_'.strToLower(class_basename($this)),
    	]);
    }

    public function feeds() {
    	return $this->morphMany(Feed::class, 'feedable');
    }

}
