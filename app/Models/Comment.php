<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     public $timestamps = false;
    protected $table = 'comments';
    protected $fillable = [
        'cmt', 'id_blog', 'id_user', 'avt_user', 'name_user', 'level', 'time'
    ];
}
