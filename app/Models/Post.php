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

//   public function comments()
//     {
//         return $this->hasMany('App\Models\Comment');
//     }

//   public function user()
//     {
//         return $this->hasOne('App\Models\User', 'id', 'user_id');
//     }
}
