<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'user_id', 'user_post'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->orderBy('created_at', 'desc');
    }

    public function post()
    {
        return $this->hasOne('App\Models\Post', 'id', 'post_id');
    }

    public function samePostComments() {
        return self::where('post_id', $this->post_id)->orderBy('created_at', 'desc')->get();
    }
}
