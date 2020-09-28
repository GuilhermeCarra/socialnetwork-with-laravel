<div class="friends-box d-flex flex-nowrap justify-content-between mb-3">
    <div class="following btn border w-50 m-1 text-center py-2 text-white">
        Following
    </div>

    <div class="following btn border w-50 m-1 text-center py-2 text-white">
        followers
    </div>
</div>
<div class="following-list">
    
    @foreach (auth()->user()->following as $followed)
    @php $friend = $followed->userFollowed @endphp
    <div class="friend-item d-flex flex-nowrap justify-content-between align-items-center">
        <div class="friend-item-data d-flex flex-nowrap flex-start align-items-center">
            <a href="{{url($friend->username)}}">
                <img class="avatar" src="{{$friend->avatar}}" alt="avatar {{$friend->username}}">
            </a>
            <a href="{{url($friend->username)}}">
                <p class="p-0 m-0">{{'@' . $friend->username}}</p>
                <small class="text-muted">follows you</small>
            </a>
        </div>
        <div class="friend-item-action">
            <div class="btn btn-sm btn-primary">unfollow</div>
        </div>
    </div>
    
    @endforeach
</div>
<div class="followers-list d-none">
    @foreach (auth()->user()->followers as $following)
    @php $friend = $following->userFollower @endphp
    <div class="friend-item d-flex flex-nowrap justify-content-between align-items-center">
        <div class="friend-item-data d-flex flex-nowrap flex-start align-items-center">
            <a href="{{url($friend->username)}}">
                <img class="avatar" src="{{$friend->avatar}}" alt="avatar {{$friend->username}}">
            </a>
            <a href="{{url($friend->username)}}">
                <p class="p-0 m-0">{{'@' . $friend->username}}</p>
            </a>
        </div>
        <div class="friend-item-action">
            @if(auth()->user()->following['followed'] = $friend->id)
            <div class="btn btn-sm btn-primary">unfollow</div>
            @else
            <div class="btn btn-sm btn-primary">follow</div>
            @endif

        </div>
    </div>
    @endforeach
</div>
