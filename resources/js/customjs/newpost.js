(function(){
    const newPost = {
        init: function () {
            this.cacheDom()
            this.bindEvents()
        },
        cacheDom: function () {
            this.newPost = $('#newpost')
            this.form = $('#newpost-form')
            this.button = $('#menu-newpost-btn')
        },
        bindEvents: function(){
            this.button.on('click', this.showNewPost.bind(this))
            this.newPost.on('click', '.newpost-close', this.closeNewPost.bind(this))
            this.form.on('submit', this.send.bind(this))
        },
        showNewPost: function(){
            $('body').addClass('stop-scroll')
            this.newPost.addClass('show')
            // setTimeout(() => {this.input.focus()}, 500);
        },
        send: function(e){
            e.preventDefault()

        },
        closeNewPost: function(e){
            this.form.trigger("reset")
            $('body').removeClass('stop-scroll')
            this.newPost.removeClass('show')
        }
    }
    newPost.init()
})()