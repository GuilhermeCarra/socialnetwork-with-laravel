<div class="following-list">
    @foreach ($friends['following'] as $friend)
    <div class="friend-item d-flex flex-nowrap justify-content-between align-items-center">
        <div class="friend-item-data d-flex flex-nowrap flex-start align-items-center">
            <a href="{{url($friend->username)}}">
                <img class="avatar" src="{{$friend->avatar}}" alt="avatar {{$friend->username}}">
            </a>
            <a class="line-clamp-2" href="{{url($friend->username)}}">
                <p class="p-0 m-0 ">{{'@' . $friend->username}}</p>
                @if(is_numeric(array_search(auth()->user()->id, array_column($friend['following']->toArray(), 'followed'))))
                    <small class="text-muted">Follows you - 
                @else
                    <small class="text-muted">Doesn't follow you 
                @endif
                @php
                $count = 0;
                foreach ($friends['following'] as $authFollowing){
                    foreach ($friend['following'] as $friendb){
                        if($friendb['followed'] == $authFollowing->id){
                            $count++;
                        }
                    }
                }
                echo $count > 0 ? "- Mutual friends $count" : "";
                @endphp
                </small>
            </a>
        </div>
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
                <small class="text-muted">
                @php
                $count = 0;
                foreach ($friends['following'] as $authFollowing){
                    foreach ($friend['following'] as $friendb){
                        if($friendb['followed'] == $authFollowing->id){
                            $count++;
                        }
                    }
                }
                echo $count > 0 ? "Mutual friends $count" : "";
                @endphp
                </small>
            </a>
        </div>
    </div>
    @endforeach
</div>