<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Follow extends Model
{
    use HasFactory;

    protected $primaryKey = ['follower','followed'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'follower', 'followed'
    ];
}
