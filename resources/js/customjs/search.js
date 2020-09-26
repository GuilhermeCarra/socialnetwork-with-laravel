(function(){
    const search = {
        init: function () {
            this.cacheDom()
            this.bindEvents()
        },
        cacheDom: function () {
            this.search = $('#search')
            this.form = $('#search-form')
            this.input = $('#search-input')
            this.button = $('#search-button')
        },
        bindEvents: function(){
            this.button.on('click', this.showSearch.bind(this))
            this.input.on('input', this.showResults)
            this.form.on('click', '.search-close', this.closeSearch.bind(this))

        },
        showSearch: function(){
            $('body').addClass('stop-scroll')
            this.search.addClass('show').css('top', window.top.scrollY)
            setTimeout(() => {this.input.focus()}, 500);
        },
        showResults: function(){
            $('#search-result').addClass('searching').fadeIn()
        },
        closeSearch: function(){
            this.input.val("")
            $('#search-result').removeClass('searching')
            $('body').removeClass('stop-scroll')
            this.search.removeClass('show')

        }
    }
    search.init()
})()