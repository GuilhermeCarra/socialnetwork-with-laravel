<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $primaryKey = ['user_id','post_id'];
    protected $fillable = [
        'user_id', 'post_id', 'is_like', 'is_dislike'
    ];

}
