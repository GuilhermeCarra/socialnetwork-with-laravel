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
            e.preventDefault();
            var content = $('#textarea-newpost-content').val();
            if (content.replace(/\s/g,'').length > 0) {
                let formData = new FormData($('#newpost-form')[0]);
                $.ajax({
                    url: 'post/',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    type: 'POST',
                    cache : false,
                    processData: false,
                    contentType: false
                }).done(function() {
                    $('#newpost').toggleClass('show');
                });
            } else {
                $('#textarea-newpost-content').after('<p class="text-danger mt-2">Please type a message for your post.</p>');
            }
        },
        closeNewPost: function(e){
            this.form.trigger("reset")
            $('body').removeClass('stop-scroll')
            this.newPost.removeClass('show')
        }
    }
    newPost.init()
})()