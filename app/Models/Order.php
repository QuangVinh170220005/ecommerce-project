<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'id_user',
        'name',
        'email',
        'phone',
        'address',
        'price',
    ];
}
