@foreach ($posts as $post)
    <div class="card">
        <div class="card-body">
            <div class="container-fluid d-flex">
                <img src="{{ $friends[$post->user_id]->avatar }}" class="col-2 rounded-circle" alt="avatar">
                <a class="col-10" href="{{ $friends[$post->user_id]->username }}">{{ $friends[$post->user_id]->name }}</a>
            </div>

            <p class="card-text">{{ $post->description }}</p>

            <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
            @if($post->image)
                <img src="{{$post->image}}" class="card-img-bottom" alt="post image">
            @endif

            <p class="card-text"><small class="text-muted">👍 {{ $post->likes_count }} 👎 {{ $post->dislikes_count }}</small></p>
        </div>
@endforeach