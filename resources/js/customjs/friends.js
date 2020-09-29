(function () {
    const friends = {
        init: function () {
            this.cacheDom()
            this.bindEvents()
        },
        cacheDom: function () {
            this.friends = $('#friends')
            this.form = $('#friends-form')
            this.input = $('#friends-input')
            this.results = $('#friends-result')
            this.followingBtn = $('.following.btn')
            this.followersBtn = $('.followers.btn')
        },
        bindEvents: function () {
            this.input.on('input', this.showResults.bind(this))
            this.form.on('click', '.friends-close', this.closeFriends.bind(this))
            this.followersBtn.on('click', this.showFollowersList.bind(this))
            this.followingBtn.on('click', this.showFollowingList.bind(this))
        },
        showResults: function () {
            this.results.addClass('searching').fadeIn()
            $.ajax({
                method: "GET",
                url: 'search?username=' + this.input.val(),
                beforeSend: function(){
                    $('#friends-result').html()
                }
            }).done(function(data){
                $('#friends-result').html(data.html)

            })
        },
        showFollowersList: function(){
            this.followersBtn.addClass('active')
            this.followingBtn.removeClass('active')
            $('.friends-list').addClass('followers')
        },
        showFollowingList: function(){
            this.followersBtn.removeClass('active')
            this.followingBtn.addClass('active')
            $('.friends-list').removeClass('followers')
        },
        closeFriends: function () {
            this.input.val("")
            this.results.removeClass('searching')
            $('body').removeClass('stop-scroll')
            this.friends.removeClass('show')
        }
    }
    friends.init()
})()
