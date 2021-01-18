<?php 
namespace App\Traits;

use App\Model\Feed;

trait ActivityFeedTrait
{
    public static function bootActivityFeed() {

        static::created(function($model) {
            $thread->activityFeed('created');
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