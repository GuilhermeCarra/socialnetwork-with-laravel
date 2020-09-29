<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class ReactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLike(Request $request, $id)
    {
        $user = auth()->user();
        $post = Post::find($id);
        $userReaction = $post->userReaction;
        $type = isset($userReaction->type) ? $post->userReaction->type : null;

        if ($type == 'dislike'){
            $reaction = Reaction::where('user_id',$user->id)->where('post_id',$id)->delete();
            $post->dislikes_count--;
            $post->save();
        }

        $like = new Reaction;
        $like->post_id = $id;
        $like->user_id = $user->id;
        $like->type = 'like';
        $like->save();

        $post = Post::find($id);
        $userReaction = $post->userReaction;
        $comments = $post->comments;
        $post->likes_count++;
        $post->save();

        if($request->ajax()) {
            return response()->json(['post'=>$post]);
        }
    }

    public function destroyLike(Request $request, $id)
    {
        $user = auth()->user()->id;
        Reaction::where('user_id',$user)->where('post_id',$id)->delete();

        $post = Post::find($id);
        $comments = $post->comments;
        $reaction = $post->userReaction;
        $post->likes_count--;
        $post->save();

        if($request->ajax()) {
            return response()->json(['post'=>$post]);
        }
    }

    public function createDislike(Request $request, $id)
    {
        $user = auth()->user();
        $post = Post::find($id);
        $userReaction = $post->userReaction;
        $type = isset($userReaction->type) ? $post->userReaction->type : null;

        if ($type == 'like'){
            $reaction = Reaction::where('user_id',auth()->user()->id)->where('post_id',$id)->delete();
            $post->likes_count--;
            $post->save();
        }

        $dislike = new Reaction;
        $dislike->post_id = $id;
        $dislike->user_id = $user->id;
        $dislike->type = 'dislike';
        $dislike->save();

        $post = Post::find($id);
        $userReaction = $post->userReaction;
        $comments = $post->comments;
        $post->dislikes_count++;
        $post->save();

        if($request->ajax()) {
            return response()->json(['post'=>$post]);
        }
    }

    public function destroyDislike(Request $request, $id)
    {
        $user = auth()->user()->id;
        Reaction::where('user_id',$user)->where('post_id',$id)->delete();

        $post = Post::find($id);
        $comments = $post->comments;
        $reaction = $post->userReaction;
        $post->dislikes_count--;
        $post->save();

        if($request->ajax()) {
            return response()->json(['post'=>$post]);
        }
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
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function show(Reaction $reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaction $reaction)
    {
        //
    }
}
