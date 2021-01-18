<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function category() {
    	return $this->belongsTo(BookCategory::class);
    }
}
