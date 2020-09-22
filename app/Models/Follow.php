<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $primaryKey = ['user_1','post_2'];
    protected $fillable = [
        'user_1', 'user_2'
    ];
}
