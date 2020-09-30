
@foreach ($posts as $post)
<div class="card post" data-post="{{$post->id}}">
        <div class="card-header">
            <div class="post__header d-flex flex-nowrap justify-content-between align-items-center">
                <div class="post__header__user">
                <a class=" font-weight-bold" href="{{$post->user->username}}">
                    <img src="{{ $post->user->avatar ?? asset('assets/img/ghost-line.svg') }}" class="rounded-circle avatar" alt="avatar">
                    {{ $post->user->name }}
                </a>
                <small> {{'@'.$post->user->username }}</small>
            </div>
            @auth
                <div class="post__header__menu">
                    <div class="post__header__menu--btn">
                        <i class="ri-more-2-fill"></i>
                        <div class="post-menu d-flex flex-column m-0 p-0">
                            <ul>
                                <li><i class="ri-pencil-line"></i> Edit</li>
                                <li data-post="{{$post->id}}"><i class="ri-delete-bin-6-line"></i> Delete</li>
                                {{-- <form id="delete-post" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    <div class="card-body">
        <div class="post__body">
            <div class="post__body__content">
                <p class="p-0 m-0"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                <p class="card-text line-clamp-3 post-description">{{ $post->description }}</p>
            </div>
            <div class="post__body__image">
                @if($post->image)
                <img src="{{$post->image}}" class="card-img-bottom" loading="lazy" alt="post image">
                @else
                <img src="" class="card-img-bottom d-none" loading="lazy" alt="post image">
                @endif
            </div>
            <div class="post__body__reactions d-flex flex-start flex-nowrap align-items-center">
                <p class="card-text mr-3 mb-0">
                    @if(isset($post->userReaction->type))
                        @if($post->userReaction->type == 'like')
                        <i class="ri-thumb-up-fill like-btn"></i>
                        @else
                        <i class="ri-thumb-up-line like-btn"></i>
                        @endif
                        @else
                        <i class="ri-thumb-up-line like-btn"></i>
                    @endif
                    <small class="text-muted likes-count"> {{ $post->likes_count }}</small>
                </p>
                <p class="mr-3 mb-0">
                    @if(isset($post->userReaction->type))
                        @if ($post->userReaction->tipe == 'dislike')
                        <i class="ri-thumb-down-fill dislike-btn"></i>
                        @else
                        <i class="ri-thumb-down-line dislike-btn"></i>
                        @endif
                        @else
                        <i class="ri-thumb-down-line dislike-btn"></i>
                    @endif
                    <small class="text-muted dislikes-count">{{ $post->dislikes_count }}</small>
                </p>
                <p class="mr-3 mb-0">
                    <i class="ri-chat-3-line"></i>
                    <small class="text-muted comments-count">{{ $post->comments_count }}</small>
                </p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <!-- Comments -->
        <div class="comment preview my-2">
            <div class="d-flex flex-start flex-nowrap align-items-center">
                <div class="comment__avatar__box mb-auto">
                    <a class="" href="{{ auth()->user()->username }}">
                        <img src="{{ auth()->user()->avatar  ?? asset('assets/img/ghost-line.svg') }}" class="rounded-circle avatar" alt="avatar">
                    </a>
                </div>
                <div class="comment__create d-flex flex-column w-100">
                    <div class="d-flex flex-wrap m-0">
                        <a class="mr-2" href="{{ auth()->user()->username }}">
                            {{auth()->user()->name}}
                        </a>
                        <p class="p-0 m-0"><small class="text-muted addComment-btn">Add a comment!</small></p>
                    </div>
                    <div class="comment_create">
                        <div class="form-group d-flex flex-nowrap justify-content-between">
                            <textarea class="form-control comment-textarea" name="newcomment" id="coment" cols="30" rows="1"></textarea>
                            <button class="btn btn-primary mt-auto p-0"><i class="ri-add-circle-line text-white addComment-btn"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @foreach ($post->comments as $comment) --}}
            @if(isset($post->comments[0]))
                <div class="comment preview my-2 comments-container">
                    <div class="d-flex flex-start flex-nowrap align-items-center comment" data-comment="{{ $post->comments[0]->id }}">
                        <div class="comment__avatar__box">
                            <a class="" href="{{ $post->comments[0]->user->username }}">
                                <img src="{{ $post->comments[0]->user->avatar  ?? asset('assets/img/ghost-line.svg')}}" class="rounded-circle avatar" alt="avatar">
                            </a>
                        </div>
                        <div class="comment__content d-flex flex-column">
                            <div class="d-flex flex-wrap m-0">
                                <a class="mr-2" href="{{ $post->comments[0]->user->username }}">
                                    {{$post->comments[0]->user->name }}
                                </a>
                                <p class="p-0 m-0"><small class="text-muted">{{ $post->comments[0]->created_at->diffForHumans() }}</small></p>
                                @if ($post->comments[0]->user->id == Auth::user()->id)
                                <div class="commentDelete-btn delete-comment pointer">🗑️</div>
                                @endif
                            </div>
                            <div class="comment__content--box line-clamp">
                                <p class="card-text">{{ $post->comments[0]->content }}</p>
                            </div>
                        </div>
                    </div>
                    
                    @if ($post->comments_count > 1)
                    <div class="mt-4 mb-2 p-0 btn text-center w-100 bg-light-gray pointer comments-btn comments-guide">
                        See more comments...
                    </div>
                    @endif
                </div>
            @endif
        {{-- @endforeach --}}
    </div>
</div>
@endforeach