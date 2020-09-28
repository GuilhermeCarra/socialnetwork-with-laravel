import 'remixicon/fonts/remixicon.css'
require('./bootstrap');

document.onreadystatechange = () => {
    require('./customjs/search');
}

$( document ).ready(function() {
    setLoadCommentsBtn();
    setTextareaHeightAuto()
    setAddCommentBtn();
});


var postsPage = 1;
$(window).on('scroll', function () {
    if (Math.ceil($(window).scrollTop()) + Math.ceil($(window).height()) >= $(document).height() && postsPage) {
        if (postsPage) {
            postsPage++;
            loadPosts(postsPage);
        }
    }
});

function loadPosts(postsPage) {
    $.ajax({
        url: 'home?page=' + postsPage,
        type: 'GET',
        beforeSend: function () {
            $('#load-message').removeClass('d-none');
        }
    }).done(function (data) {
        if (data.html.length == 0) {
            postsPage = false;
            $('#load-message').text('No more posts to show').removeClass('d-none');
        } else {
            $('#load-message').addClass('d-none');
            $('#container-feed').append(data.html);
            setLoadCommentsBtn();
        }
    });
}

function setLoadCommentsBtn() {
    $('.comments-btn').each(function () {
        $(this).on('click', loadMoreComments);
        $(this).removeClass('comments-btn');
    });
}

function loadMoreComments(event) {
    var button = $(event.target);
    var id = $(event.target).attr("id").split('_')[1];
    $(event.target).text('Loading comments...');
    $.ajax({
        url: 'comments/post/' + id,
        type: 'GET',
    }).done(function (data) {
        $(`[data-post="${id}"] .comment__content--box`).removeClass('line-clamp')
        $(button).before(data);
        $(button).text('Close comments...').unbind().on('click',closeComments);
    })
}

function setTextareaHeightAuto(){
    $('.comment-textarea').each(function () {
        this.setAttribute('style', 'overflow-y:auto;');
    }).on('input', function () {
        if(this.scrollHeight <= 200){
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight + 2) + 'px';
        }
    });
}

function closeComments() {
    $(event.target).siblings('.comment').remove();
    $(event.target).text('See more comments...').on('click', loadMoreComments);
}

function setAddCommentBtn() {
    $('.addComment-btn').each(function () {
        $(this).on('click', addComment);
        $(this).removeClass('addComment-btn');
    });
}

function addComment(){
    var id = $(event.target).closest('.post').attr('data-post');
    var comment = $(event.target).siblings('textarea').val();
    $(event.target).siblings('textarea').val('')
    var commentBox = $(event.target).closest('.post').find('.comments-container');
    $.ajax({
        url: 'comments/create/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { content: comment },
        type: 'POST',
    }).done(function(data) {
        $(commentBox).prepend(data);
    });
}
