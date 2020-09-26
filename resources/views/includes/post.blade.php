
@foreach ($posts as $post)
@if(isset($friends))
    @php 
        $user = $friends[$post->user_id] 
    @endphp
@endif
    <div class="card post">
        <div class="card-header">
            <div class="post__header d-flex flex-nowrap justify-content-between align-items-center">
                <div class="post__header__user">
                <a class=" font-weight-bold" href="{{$user->username}}">
                    <img src="{{ $user->avatar }}" class="rounded-circle avatar" alt="avatar">
                    {{ $user->name }}
                </a>
                <small> {{'@'.$user->username }}</small>
            </div>
            <div class="post__header__menu">
                <div class="post__header__menu--btn">
                    <i class="ri-more-2-fill"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="post__body">
            <div class="post__body__content">
                <p class="p-0 m-0"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                <p class="card-text line-clamp-3">{{ $post->description }}</p>
            </div>
            @if($post->image)
            <div class="post__body__image">
                <img width="100%" src="{{$post->image}}" class="card-img-bottom" loading="lazy" alt="post image">
            </div>
            @endif
            <div class="post__body__reactions d-flex flex-start flex-nowrap align-items-center">
                <p class="card-text mr-3 mb-0">
                    <i class="ri-thumb-up-line"></i>
                    <span class="text-muted"> {{ $post->likes_count }}</span> 
                </p>
                <p class="mr-3 mb-0">
                    <i class="ri-thumb-down-line"></i>
                    <span>{{ $post->dislikes_count }}</span>
                </p>
                <p class="mr-3 mb-0">
                    <i class="ri-chat-3-line ri-10x"></i>
                    <span>{{ $post->comments_count }}</span>
                </p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!-- Comments -->
        <div class="comment preview my-2">
            <div class="d-flex flex-start flex-nowrap align-items-center">
                <div class="comment__avatar__box">
                    <a class="" href="{{ auth()->user()->username }}">
                        <img src="{{ auth()->user()->avatar }}" class="rounded-circle avatar" alt="avatar">
                    </a>
                </div>
                <div class="comment__create d-flex flex-column w-100">
                    <div class="d-flex flex-wrap m-0">
                        <a class="mr-2" href="{{ auth()->user()->username }}">
                            {{auth()->user()->name}}
                        </a>
                        <p class="p-0 m-0"><small class="text-muted">Add a comment!</small></p>
                    </div>
                    <div class="comment_create__add">
                        <div class="form-group d-flex flex-nowrap justify-content-between">
                            <textarea class="form-control" name="newcomment" id="coment" cols="30" rows="1"></textarea>
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($comments as $comment)
            @if($post->id == $comment->post_id)
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
                    <div class="mt-4 mb-2 p-0 btn text-center w-100 bg-light-gray pointer comments-btn" id="post_{{$post->id}}">
                        See more comments...
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endforeach