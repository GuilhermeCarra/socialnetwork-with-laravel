@foreach ($comments as $comment)
    <div class="comment my-2" data-comment="{{ $comment->id}}">
        <div class="d-flex flex-start flex-nowrap align-items-center">
            <div class="comment__avatar__box">
                <a class="" href="{{ $comment->user->username }}">
                    <img src="{{ $comment->user->avatar  ?? asset('assets/img/ghost-line.svg')}}" class="rounded-circle avatar" alt="avatar">
                </a>
            </div>
            <div class="comment__content d-flex flex-column">
                <div class="d-flex flex-wrap m-0">
                    <a class="mr-2" href="{{ $comment->user->username }}">
                        {{ $comment->user->name }}
                    </a>
                    <p class="p-0 m-0"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                </div>
                <div class="comment__content--box">
                    <p class="card-text">{{ $comment->content }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach