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
        $friendsID = auth()->user()->friendsIds();

        $posts = Post::whereIn('user_id', $friendsID)->orderBy('created_at','desc')->paginate(3);

        if($request->ajax()) {
            $view = view('includes.feed',compact(['posts']))->render();
            return response()->json(['html'=>$view]);
        }

        return view('home',compact(['posts']));
    }
}
