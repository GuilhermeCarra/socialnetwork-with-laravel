@foreach ($comments as $comment)
    <div class="comment preview my-2">
        <div class="d-flex flex-start flex-nowrap align-items-center">
            <div class="comment__avatar__box">
                <a class="" href="{{ $commentingUsers[$comment->user_id]->username }}">
                    <img src="{{ $commentingUsers[$comment->user_id]->avatar }}" class="rounded-circle avatar" alt="avatar">
                </a>
            </div>
            <div class="comment__content d-flex flex-column">
                <div class="d-flex flex-wrap m-0">
                    <a class="mr-2" href="{{ $commentingUsers[$comment->user_id]->username }}">
                        {{$commentingUsers[$comment->user_id]->name }}
                    </a>
                    <p class="p-0 m-0"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                </div>
                <div class="line-clamp">
                    <p class="card-text">{{ $comment->content }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach


{{-- @foreach ($comments as $comment)
    <div class="comment">
        <div class="container-fluid d-flex">
            <img src="{{ $users[$comment->user_id]->avatar }}" class="col-1 rounded-circle" alt="avatar">
            <a class="col-10" href="{{ $users[$comment->user_id]->username }}">{{ $users[$comment->user_id]->name }}</a>
        </div>
        <p class="card-text">{{ $comment->content }}</p>
        <p class="card-text"><small class="text-muted">{{ $comment->created_at }}</small></p>
    </div>
@endforeach --}}