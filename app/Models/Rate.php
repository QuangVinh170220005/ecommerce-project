<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public $timestamps = false;
    protected $table = 'rate';
    protected $fillable = [
        'rate', 'id_blog', 'id_user','time'
    ];
}
