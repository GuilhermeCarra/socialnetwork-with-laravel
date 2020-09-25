<div class="card post">
    <div class="card-header">
        <div class="post__header d-flex flex-nowrap justify-content-between align-items-center">
            <div class="post__header__user">
                <img src="{{ $friends[$post->user_id]->avatar }}" class="col-2 rounded-circle" alt="avatar">
                <a class=" font-weight-bold" href="{{ $friends[$post->user_id]->username }}">{{ $friends[$post->user_id]->name }}</a>
                <small> {{'@'.$friends[$post->user_id]->username }}</small>
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
                <p class=""><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                <p class="card-text line-clamp-3">{{ $post->description }}</p>
            </div>
            @if($post->image)
            <div class="post__body__image">
                <img width="100%" src="{{$post->image}}" class="card-img-bottom" alt="post image">
            </div>
            @endif
            <div class="post__body__reactions d-flex flex-start flex-nowrap align-items-center">
                <p class="card-text mr-3">
                    <i class="ri-thumb-up-line"></i>
                    <span class="text-muted"> {{ $post->likes_count }}</span> 
                </p>
                <p class="mr-3">
                    <i class="ri-thumb-down-line"></i>
                    <span>{{ $post->dislikes_count }}</span>
                </p>
                <p>
                    <i class="ri-chat-3-line ri-10x"></i>
                    <span>{{ $post->comments_count }}</span>
                </p>
            </div>
        </div>
        </div>
    </div>
</div>