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

    /**
     * Check if the current user follow the user passed
     * return 0 or 1
     * 
     * @param int $id
     * @retun int
     */
    protected static function isFollowed(int $id){
        return Follow::where('follower', auth()->user()->id)->where('followed', $id)->count();
    }

    /**
     * Check if the current user is followed by the user passed
     * return 0 or 1
     * 
     * @param int $id
     * @retun int
     */
    protected static function isFollower(int $id){
        return Follow::where('follower', $id)->where('followed', auth()->user()->id)->count();
    }

    public function userFollowed()
    {
        return $this->hasOne('App\Models\User', 'id', 'followed');
        // return $this->belongsToMany(Follower::class);
    }

    public function userFollower()
    {
        return $this->hasOne('App\Models\User', 'id', 'follower');
    }

    protected static function searchFriends(string $username){
        $id = auth()->user()->id;
        $friends = [];
        $friends['following'] = User::with('following')->where('username', 'LIKE', '%' . $username . '%')->whereHas('followers', function($q) use ($id) {
            $q->where('follower', $id);
        })->get();
        $friends['followers'] = User::with('followers')->where('username', 'LIKE', '%' . $username . '%')->whereHas('following', function($q) use ($id) {
            $q->where('followed', $id);
        })->get();

        return $friends;
    }

    public function following(){
        return $this->hasMany('App\Models\User', 'id', 'followed');
    }
    public function follower(){
        return $this->hasMany('App\Models\User', 'id', 'follower');
    }



}
