$(function () {
    function callback(idGenre, page) {
        let showMoreButton = $('#show-more');
        if (showMoreButton) {
            showMoreButton.unbind('click').click(function () {
                fetchMovies(idGenre, page, true);
            }).show();
        }
    }
    function callbackSearch(query, page) {
        let showMoreButton = $('#show-more');
        if (showMoreButton) {
            showMoreButton.unbind('click').click(function () {
                searchMovies(query, page, true);
            }).show();
        }
    }
    function fetchMovies(idGenre, page = 1, append = false) {
        let url = Routing.generate('movies_by_genre', { id: idGenre, page: page });
        $.ajax({
            url: url,
            success: function (response) {
                if (append) {
                    $('#show-more').remove();
                    $('#list-movies').append(response).promise().done(function () {
                        callback(idGenre, page+1);
                    });
                } else {
                    $('#list-movies').html(response).promise().done(function () {
                        callback(idGenre, page+1);
                    });
                }
            },
            dataType: 'html',
            async: true
        });
    }

    function searchMovies(query, page = 1, append = false) {
        if (!append) {
            $('#list-movies').html('<button class="btn btn-primary" type="button" disabled="">\n' +
                '    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>\n' +
                '    <span role="status">Loading...</span>\n' +
                '  </button>');
        }
        let url = Routing.generate('search_movie', { query: query, page: page });
        $.ajax({
            url: url,
            success: function (response) {
                if (append) {
                    $('#show-more').remove();
                    $('#list-movies').append(response).promise().done(function () {
                        callbackSearch(query, page+1);
                    });
                } else {
                    $('#list-movies').html(response).promise().done(function () {
                        callbackSearch(query, page+1);
                    });
                }
            },
            dataType: 'html',
            async: true
        });
    }

    $('.movie-genre').click(function () {
        fetchMovies($(this).val());
    });
    $('#modalMovie').on('show.bs.modal', function(e) {
        let movie = e.relatedTarget.getAttribute('data-movie');
        let modal = $(this);
        let url = Routing.generate('get_movie', { id: movie });
        modal.find('.modal-body').empty();
        $.ajax({
            url: url,
            success: function (response) {
                modal.find('.modal-body').html(response);
            },
            dataType: 'html',
            async: true
        });
    });

    $('#search-movie').keyup(function () {
        let query = $.trim($(this).val());
        searchMovies(query);
    });
});