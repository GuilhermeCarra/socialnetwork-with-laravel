<div class="following-list">
    @foreach ($friends['following'] as $friend)
    <div class="friend-item d-flex flex-nowrap justify-content-between align-items-center">
        <div class="friend-item-data d-flex flex-nowrap flex-start align-items-center">
            <a href="{{url($friend->username)}}">
                <img class="avatar" src="{{$friend->avatar}}" alt="avatar {{$friend->username}}">
            </a>
            <a href="{{url($friend->username)}}">
                <p class="p-0 m-0 line-clamp">{{'@' . $friend->username}}</p>
                <small class="text-muted">follows you</small>
            </a>
        </div>
        {{-- <div class="friend-item-action">
            <div class="btn btn-sm btn-primary">unfollow</div>
        </div> --}}
    </div>
    @endforeach
</div>
<div class="followers-list">
    @foreach ($friends['followers'] as $friend)
    <div class="friend-item d-flex flex-nowrap justify-content-between align-items-center">
        <div class="friend-item-data d-flex flex-nowrap flex-start align-items-center">
            <a href="{{url($friend->username)}}">
                <img class="avatar" src="{{$friend->avatar}}" alt="avatar {{$friend->username}}">
            </a>
            <a href="{{url($friend->username)}}">
                <p class="p-0 m-0 line-clamp">{{'@' . $friend->username}}</p>
            </a>
        </div>
        {{-- <div class="friend-item-action">
            @if(auth()->user()->following['followed'] = $friend->id)
            <div class="btn btn-sm btn-primary">unfollow</div>
            @else
            <div class="btn btn-sm btn-primary">follow</div>
            @endif

        </div> --}}
    </div>
    @endforeach
</div>