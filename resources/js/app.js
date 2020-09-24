require('./bootstrap');
//import 'remixicon/fonts/remixicon.css'

var postsPage = 1;
$(window).on('scroll', function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            postsPage++;
            loadPosts(postsPage);
        }
});

function loadPosts(page) {
    $.ajax({
        url: 'home?page=' + page,
        type: 'GET',
        beforeSend: function() {
            $('#load-message').removeClass('d-none');
        }
    }).done(function(data){
        if(data.html == " "){
            $('#load-message').text('No more posts to show');
        } else {
            $('#load-message').addClass('d-none');
            $('#container-feed').append(data.html);
        }
    });
}