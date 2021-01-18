<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\{Thread, Tag_Thread};

class Tag extends Model
{
    protected $guarded = [];

    public function threads() {
    	return $this->belongsToMany(Thread::class)->withTimestamps();
    }

    public function getRouteKeyName() {
        return 'name';
    }
}
