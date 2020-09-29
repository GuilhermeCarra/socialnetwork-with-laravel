@extends('layouts.app')
@section('title', Auth::user()->username)
@section('content')
    <div class="text-center card-header mb-4">
        <img class="rounded-lg col-sm-3 col-md-6 col-lg-4" src="{{$user->avatar ?? asset('assets/img/ghost-line.svg')}}" alt="">
        <p class="h4 text-center mt-4"><b>{{$user->name}}</b></p>
        <p class="h6 text-center my-4">{{$user->description}}</p>
        @if($user->id != auth()->user()->id)
        <form method="POST" action="{{$following ? route('unfollow') : route('follow')}}">
            @if($user->id != auth()->user()->id && $following)
                    @method('DELETE')
                @endif
                @csrf
                <input type="hidden" name="follower" value="{{auth()->user()->id}}">
                <input type="hidden" name="followed" value="{{$user->id}}">
                <button type="submit" class="btn btn-primary">{{$following ? 'Unfollow' : 'Follow'}}</button>
            </form>
        @endif
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" id="container-feed">
                    @include('includes.feed')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection