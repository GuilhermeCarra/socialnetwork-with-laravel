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
            this.results = $('#friends-result')
        },
        bindEvents: function(){
            this.input.on('input', this.showResults.bind(this))
            this.form.on('click', '.friends-close', this.closeFriends.bind(this))
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