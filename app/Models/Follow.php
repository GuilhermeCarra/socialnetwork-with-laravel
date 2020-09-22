<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Follow extends Model
{
    use HasFactory;

    protected $primaryKey = ['user_1','post_2'];
    public $incrementing = false;

    protected $fillable = [
        'user_1', 'user_2'
    ];
}
