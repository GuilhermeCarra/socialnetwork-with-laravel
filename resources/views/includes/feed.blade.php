@foreach ($posts as $post)
    <div class="card">
        <div class="card-body">

            <!-- Post owner avatar and name -->
            <div class="container-fluid d-flex">
                <img src="{{ $friends[$post->user_id]->avatar }}" class="col-2 rounded-circle" alt="avatar">
                <a class="col-10" href="{{ $friends[$post->user_id]->username }}">{{ $friends[$post->user_id]->name }}</a>
            </div>

            <!-- Text content -->
            <p class="card-text">{{ $post->description }}</p>

            <!-- Creation date -->
            <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>

            <!-- Image -->
            @if($post->image)
                <img src="{{$post->image}}" class="card-img-bottom" alt="post image">
            @endif

            <!-- Likes /Dislikes -->
            <p class="card-text"><small class="text-muted">👍 {{ $post->likes_count }} 👎 {{ $post->dislikes_count }}</small></p>

            <!-- Comments -->
            
                @foreach ($comments as $comment)
                    @if($post->id == $comment->post_id)
                    <div class="container-fluid d-flex">
                        <img src="{{ $commentingUsers[$comment->user_id]->avatar }}" class="col-1 rounded-circle" alt="avatar">
                        <a class="col-10" href="{{ $commentingUsers[$comment->user_id]->username }}">{{ $commentingUsers[$comment->user_id]->name }}</a>
                    </div>
                    <p class="card-text">{{ $comment->content }}</p>
                    @endif
                @endforeach
            

        </div>
@endforeach