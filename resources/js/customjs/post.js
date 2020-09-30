const post = {
    init: function () {
        this.cacheDom()
        this.bindEvents()
        // initObserver()
    },
    cacheDom: function () {
        this.postMenu = $('.post-menu')
        this.postMenuBtn = $('.post .post__header__menu--btn')
    },
    bindEvents: function () {
        this.postMenuBtn.each(function () {
            $(this).on('click', '.ri-more-2-fill', function () {
                console.log("hola")
                $(this).next().addClass('open')
                $(this).addClass('ri-close-line').removeClass('ri-more-2-fill')
            })
        })
        this.postMenuBtn.each(function () {
            $(this).on('click', '.ri-close-line', function () {
                console.log("hola")
                $(this).next().removeClass('open')
                $(this).addClass('ri-more-2-fill').removeClass('ri-close-line')
            })
        })
        $('[data-post-delete]').on('click', this, function(){
            let id = this.dataset.postDelete
            $.ajax({
                url: `post/${id}/delete`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: id,
                type: 'DELETE',
                cache : false,
                processData: false,
                contentType: false
            }).done(function() {
                $(`[data-post="${id}"]`).fadeOut();
            });
        })
    }
    
}
post.init()



