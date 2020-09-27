(function(){
    const friends = {
        init: function () {
            this.cacheDom()
            this.bindEvents()
        },
        cacheDom: function () {
            this.friends = $('#friends')
            this.form = $('#friends-form')
            this.input = $('#friends-input')
            this.button = $('#menu-friends-btn')
            this.results = $('#friends-result')
        },
        bindEvents: function(){
            this.button.on('click', this.showFriends.bind(this))
            this.input.on('input', this.showResults.bind(this))
            this.form.on('click', '.friends-close', this.closeFriends.bind(this))
        },
        showFriends: function(){
            $('body').addClass('stop-scroll')
            this.friends.addClass('show')
            setTimeout(() => {this.input.focus()}, 500);
        },
        showResults: function(){
            this.results.addClass('searching').fadeIn()
        },
        closeFriends: function(){
            this.input.val("")
            this.results.removeClass('searching')
            $('body').removeClass('stop-scroll')
            this.friends.removeClass('show')
        }
    }
    friends.init()
})()