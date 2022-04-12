<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'type',
        'description',
        'price',
        'quantity',
        'slug'
    ];

    protected $hidden = [];


    // public function galleries() {
    //     return $this->hasMany(ProductGallery, 'product_id');
    // }

    

}
