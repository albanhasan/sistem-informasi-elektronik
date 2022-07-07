<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Electronic extends Model
{
    use SoftDeletes;

    protected $table = 'electronics';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'stock',
        'image_name'
    ];

    protected $hidden = [];


    
}
