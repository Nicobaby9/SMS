<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Like extends Model
{
    protected $guarded = [];

    public function likeable() {
    	return $this->morphTo();
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
