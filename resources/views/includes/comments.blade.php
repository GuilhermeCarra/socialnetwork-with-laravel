@foreach ($comments as $comment)
    <div class="comment">
        <div class="container-fluid d-flex">
            <img src="{{ $users[$comment->user_id]->avatar }}" class="col-1 rounded-circle" alt="avatar">
            <a class="col-10" href="{{ $users[$comment->user_id]->username }}">{{ $users[$comment->user_id]->name }}</a>
        </div>
        <p class="card-text">{{ $comment->content }}</p>
        <p class="card-text"><small class="text-muted">{{ $comment->created_at }}</small></p>
    </div>
@endforeach