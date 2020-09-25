<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Follow;
use App\Models\User;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $friendsID = Follow::where('follower',auth()->id())->pluck('followed')->toArray();
        $friends = User::whereIn('id', $friendsID)->get()->keyBy('id');

        $posts = Post::whereIn('user_id', $friendsID)->orderBy('created_at','desc')->paginate(3);
        $postsID = $posts->pluck('id')->toArray();

        $comments = Comment::whereIn('post_id', $postsID)->orderBy('created_at','desc')->get()->unique('post_id');
        $commentingUsersID = $comments->pluck('user_id')->toArray();

        $commentingUsers = User::whereIn('id', $commentingUsersID)->get()->keyBy('id');

        if($request->ajax()) {
            $view = view('includes.feed',compact(['posts','friends','comments','commentingUsers']))->render();
            return response()->json(['html'=>$view]);
        }

        return view('home',compact(['posts', 'friends','comments', 'commentingUsers']));
    }
}
