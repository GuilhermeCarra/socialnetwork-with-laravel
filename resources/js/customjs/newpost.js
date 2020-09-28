(function(){
    const newPost = {
        init: function () {
            this.cacheDom()
            this.bindEvents()
        },
        cacheDom: function () {
            this.newPost = $('#newpost')
            this.form = $('#newpost-form')
        },
        bindEvents: function(){
            this.newPost.on('click', '.newpost-close', this.closeNewPost.bind(this))
            this.form.on('submit', this.send.bind(this))
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