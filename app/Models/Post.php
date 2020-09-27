<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'image', 'likes_count', 'dislikes_count', 'comments_count'
    ];

    protected static function getPostByUserId($id, $paginate = 5){
        return self::where('user_id', $id)->orderBy('created_at','desc')->paginate($paginate);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
