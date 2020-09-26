<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Comment;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $username)
    {
        if ($username == auth()->user()->username) {
            $user = auth()->user();

            $posts = Post::where('user_id', $user->id)->orderBy('created_at','desc')->get();
            $postsID = $posts->pluck('id')->toArray();

            $comments = Comment::whereIn('post_id', $postsID)->orderBy('created_at', 'desc')->get()->unique('post_id');
            $commentingUsersID = $comments->pluck('user_id')->toArray();
            
            $commentingUsers = User::whereIn('id', $commentingUsersID)->get()->keyBy('id');
            return view('profile', compact('user', 'posts', 'comments', 'commentingUsers'));
        } else {
            $user = User::where('username', $username)->firstOrFail();

            $posts = Post::where('user_id', $user->id)->get();
            $postsID = $posts->pluck('id')->toArray();

            $comments = Comment::whereIn('post_id', $postsID)->orderBy('created_at', 'desc')->get()->unique('post_id');
            $commentingUsersID = $comments->pluck('user_id')->toArray();
            $commentingUsers = User::whereIn('id', $commentingUsersID)->get()->keyBy('id');

            $following = Follow::where('follower', auth()->user()->id)->where('followed', $user->id)->count();

            return view('profile', compact('user', 'posts', 'comments', 'commentingUsers', 'following'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Auth::logout();
        return redirect('/login')->with('success', 'User Deleted!');
    }
}
