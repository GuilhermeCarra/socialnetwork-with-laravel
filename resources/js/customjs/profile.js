(function () {
    const followUnfollow = {
        init: function () {
            this.cacheDom()
            this.bindEvents()
        },
        cacheDom: function () {
            this.followForm = $('#follow-form')
        },
        bindEvents: function () {
            this.followForm.on('submit', this.follow.bind(this))
        },
        follow: function (e) {
            e.preventDefault();

            let data = $('#follow-form').serialize();
            let method = this.followForm.attr('data-follow') == 1 ? 'delete' : 'post'
            let param = this.followForm.attr('data-follow') == 1 ? '/unfollow' : '/follow'
            $.ajax({
                url: `${param}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                type: method,
            }).done(function (data) {
                followUnfollow.afterSend(data)
            });
        },
        afterSend: function (data) {
            $('#form-follow-container').html('').append(data);

            this.followForm = $('#follow-form')
            this.followForm.on('submit', this.follow.bind(this))

        }
    }
    if ($('.card.profile').length > 0) followUnfollow.init()
})()
