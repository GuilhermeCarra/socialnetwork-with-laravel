import 'remixicon/fonts/remixicon.css'
require('./bootstrap');

document.onreadystatechange = ()=>{
    require('./customjs/search');
}

var postsPage = 1;
$(window).on('scroll', function(){
    if(Math.ceil($(window).scrollTop()) + Math.ceil($(window).height()) >= $(document).height()  && postsPage) {
            postsPage++;
            loadPosts(postsPage);
        }
});

function loadPosts(page) {
    $.ajax({
        url: 'home?page=' + postsPage,
        type: 'GET',
        beforeSend: function() {
            $('#load-message').removeClass('d-none');
        }
    }).done(function(data){
        if(data.html.length == 0){
            postsPage = false;
            $('#load-message').text('No more posts to show').removeClass('d-none');
        } else {
            $('#load-message').addClass('d-none');
            $('#container-feed').append(data.html);
        }
    });
}
