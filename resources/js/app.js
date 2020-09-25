require('./bootstrap');
import 'remixicon/fonts/remixicon.css'

var postsPage = 1;
$(window).on('scroll', function(){
    if(Math.ceil($(window).scrollTop()) + Math.ceil($(window).height()) >= $(document).height()) {
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
        console.log(data.html)
        if(data.html.length == 0){
            postsPage = false;
            $('#load-message').text('No more posts to show').removeClass('d-none');
        } else {
            $('#load-message').addClass('d-none');
            $('#container-feed').append(data.html);
        }
    });
}