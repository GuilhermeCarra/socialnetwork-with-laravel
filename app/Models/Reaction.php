<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $primaryKey = ['user_id','post_id'];
    public $incrementing = false;

    protected $fillable = [
        'user_id', 'post_id', 'type'
    ];

    public function getByPostId($postId) {
        $reaction = Reaction::where('user_id',auth()->user()->id)->where('post_id',$postId)->get();
    }
}
