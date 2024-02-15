<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'order_id',
        'customer_id',
        'product_id',
        'order_status',
        'order_quantity',
        'order_total',
        'order_date'
    ];
}