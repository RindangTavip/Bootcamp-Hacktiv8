<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable = [
        'customer_id',
        'customer_fullname',
        'customer_email',
        'customer_gender',
        'customer_address',
        'customer_phone'
    ];
}