<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $guarded = [];

    public function books() {
    	return $this->hasMany(Book::class);
    }
}
