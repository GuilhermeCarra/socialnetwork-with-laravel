@extends('layouts.app')
@section('title', Auth::user()->username)
@section('content')
<div class="card profile">
    <div class="text-center card-header mb-4">
        <div class="profile-image mx-auto shadow" style="background-image: url({{$user->avatar ?? asset('assets/img/ghost-line.svg')}});"></div>
        <p class="h4 text-center mt-4"><b>{{$user->name}}</b></p>
        <p class="description h6 text-center mb-4 mx-auto ">{{$user->description}}</p>
        <div id="form-follow-container">

           @include('includes.followform')
        </div>
    </div>
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