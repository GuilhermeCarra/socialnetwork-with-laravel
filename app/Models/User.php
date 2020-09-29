<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Reaction;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username', 'name', 'email', 'password', 'description', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get user by username.
     * 
     * @param string $username
     * @return \App\Models\User
     */
    protected static function getUserByUsername(string $username){
        return self::where('username', $username)->firstOrFail();
    }

    /**
     * Get users who the current user follows
     * 
     * @return \App\Models\Follow
     */
    public function following(){
        return $this->hasMany('App\Models\Follow', 'follower', 'id');
    }

    public function followers(){
        return $this->hasMany('App\Models\Follow', 'followed', 'id');
    }

    public function friendsIds() {
        return $this->following()->pluck('followed')->toArray();
    }

    public function reactions() {
        return $this->hasMany('App\Models\Reaction', 'user_id', 'id');
    }

    public function getReactionType($postId) {
        $reaction = $this->reactions->keyBy('post_id');
        if (!isset($reaction[$postId])) {
            return null;
        } else {
            return $reaction[$postId]->type;
        }
    }
}
