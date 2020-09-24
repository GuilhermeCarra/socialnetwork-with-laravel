@extends('layouts.app')
@section('title', Auth::user()->username)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img width="200px" height="200px" src="{{$user->avatar}}" alt="">
                    <p><b>{{$user->name}}</b></p>
                    <p>{{$user->description}}</p>
                    @if($user->id != auth()->user()->id)
                        <form method="POST" action="{{$following ? route('unfollow') : route('follow')}}">
                            @if($user->id != auth()->user()->id && $following) 
                                @method('DELETE')
                            @endif
                            @csrf
                            <input type="hidden" name="follower" value="{{auth()->user()->id}}">
                            <input type="hidden" name="followed" value="{{$user->id}}">
                            <button type="submit">{{$following ? 'Unfollow' : 'Follow'}}</button>
                        </form>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{$user->id}}
                    @if($posts ?? '')
                    @foreach($posts as $post)
                    @if($post->image)
                    <img src="{{$post->image}}" alt="">
                    @endif
                    <p>{{$post->description}}</p>
                    <p>{{$post->likes_count}}</p>
                    <p>{{$post->dislikes_count}}</p>
                    <p>{{$post->comments_count}}</p>
                    @endforeach
                    @else
                    <p>No posts</p>
                    @endif
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection