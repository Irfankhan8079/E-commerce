<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'meta_title',
        'meta_description',
        'image',
        'meta_keywords',
    ];
}
