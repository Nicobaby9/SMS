<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Thread;

class Tag extends Model
{
    protected $guarded = [];

    public function threads() {
    	return $this->belongsToMany(Thread::class);
    }
}
