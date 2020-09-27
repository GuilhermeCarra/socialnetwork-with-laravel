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

    /**
     * Get posts by User id
     * Pagination by default: 5
     * 
     * @param int $id
     * @param int $paginate
     * @return \App\Models\Post
     */
    protected static function getPostByUserId(int $id, int $paginate = 5)
    {
        return self::where('user_id', $id)->orderBy('created_at', 'desc')->paginate($paginate);
    }

    /**
     * Get commets when a post is requested
     * 
     * @return \App\Models\Comment
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    /**
     * Get User (author) when a post is requested
     * 
     * @return \App\Models\User
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
