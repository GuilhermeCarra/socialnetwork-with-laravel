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
            </div>
        </div>
    </div>
</div>
<div id="load-message" class="d-none text-center py-4"><p>Loading more posts...</p></div>
@endsection
