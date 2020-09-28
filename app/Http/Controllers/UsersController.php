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
            $posts = Post::getPostByUserId($user->id);

            if($request->ajax()) {
                $view = view('includes.feed',compact(['posts']))->render();
                return response()->json(['html'=>$view]);
            }

            return view('profile', compact('user', 'posts'));

        } else {
            $user = User::getUserByUsername($username);
            $posts = Post::getPostByUserId($user->id);;
            $following = Follow::isFollowed($user->id);
            $followed = Follow::isFollower($user->id);

            if($request->ajax()) {
                $view = view('includes.feed',compact(['posts']))->render();
                return response()->json(['html'=>$view]);
            }

            return view('profile', compact('user', 'posts', 'following', 'followed'));
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
