<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['*'];
    protected $hidden = [];
    protected $casts = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
