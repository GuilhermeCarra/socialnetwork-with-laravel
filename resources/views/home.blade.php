@extends('layouts.app')
@section('title', Auth::user()->username)

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="container" id="container-feed">
                    @include('includes.feed')
                </div>
                <p id="load-message" class="d-none">Loading more posts</p>
            </div>
        </div>
    </div>
</div>
@endsection
