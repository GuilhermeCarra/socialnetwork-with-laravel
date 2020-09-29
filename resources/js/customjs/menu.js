(function () {
    const menu = {
        init: function () {
            this.cacheDom()
            this.bindEvents()
        },
        cacheDom: function () {
            this.menu = $('#menu')
            this.friendsBtn = $('#menu-friends-btn')
            this.newPostBtn = $('#menu-newpost-btn')
            this.friends = $('#friends')
            this.newPost = $('#newpost')
        },
        bindEvents: function () {
            this.menu.on('click', '#menu-btn', this.openMenu.bind(this))
            this.friendsBtn.on('click', this.openFriends.bind(this))
            this.newPostBtn.on('click', this.openNewPost.bind(this))
        },
        openMenu: function (e) {
            this.menu.toggleClass('open')
            if($('#menu-btn i').hasClass('ri-menu-2-fill')){
                $('#menu-btn i').addClass('ri-close-line').removeClass('ri-menu-2-fill')
            }else{
                $('#menu-btn i').addClass('ri-menu-2-fill').removeClass('ri-close-line')
            }

        },
        openNewPost: function () {
            $('#friends.show, #search.show').removeClass('show')
            this.openMenu()
            $('body').toggleClass('stop-scroll')
            this.newPost.toggleClass('show')
            $('#textarea-newpost-content').trigger('focus')
        },
        openFriends: function () {
            this.openMenu()
            $('#newpost.show, #search.show').removeClass('show')
            $('body').toggleClass('stop-scroll')
            this.friends.toggleClass('show')
            $('#friends-input').trigger('focus')
            $.ajax({
                method: "GET",
                url: 'search?username=',
                beforeSend: function(){
                    $('#friends-result').html()
                }
            }).done(function(data){
                $('#friends-result').html(data.html)

            })
        }
    }
    menu.init()
})()
