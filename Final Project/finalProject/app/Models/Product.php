<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table='product';

    protected $fillable = [
        'product_id',
        'product_name',
        'product_desc',
        'status',
        'category_name',
        'price',
        'weight',
        'image'
    ];
}
