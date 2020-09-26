import 'remixicon/fonts/remixicon.css'
require('./bootstrap');

document.onreadystatechange = () => {
    require('./customjs/search');
}

$( document ).ready(function() {
    setLoadCommentsBtn();
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
        $(this).removeClass('.comments-btn');
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
        $(button).text('Close comments...');
    })
}
