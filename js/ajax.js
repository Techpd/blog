// load more ajax request for posts home page
    let currentPage = 1;
    $('#load-more').on('click', function (e) {
        e.preventDefault();
        currentPage++; // Do currentPage + 1, because we want to load the next page
        $('#load-more-btn-container a').removeClass();
        $(this).html('<div class="lds-ripple"><div></div><div></div></div>');

        $.ajax({
            type: 'POST',
            url: 'wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'techpd_load_more',
                paged: currentPage,
            },
            success: function (res) {
                $('#load-more-btn-container a').addClass('btn btn-default');
                $('#load-more').text('Load More');
                // console.log(res.length);
                if (currentPage >= res.length) {
                    $('#load-more').text('No More Found').fadeOut(1000);
                }
                $('.posts-list.load-more').append(res);
            }
        });
    }); // load more ajax request for posts end here--------------home page end----->

// load more ajax request for posts category page
var page = 2;
jQuery(function ($) {
    $('body').on('click', '#cat-load-more', function () {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security,
            'cat_id': $(this).data('cat-id')
        };
        $('#cat-load-more-btn-container a').removeClass();
        $(this).html('<div class="lds-ripple"><div></div><div></div></div>');

        $.post(blog.ajaxurl, data, function (response) {
            $('#cat-load-more-btn-container a').addClass('btn btn-default');
            $('#cat-load-more').text('Load More');
            if (response != '' && response != '0' ) {
                $('.cat-post-load-more').append(response);
                $('img').each(function () {
                    var data_src = $(this).attr('data-src')
                    if (data_src) {
                        $(this).attr('src', data_src);
                    }
                });
                page++;
            }
            if(response == 0) {
                $('#cat-load-more').text('No More Found').fadeOut(1000);
            }
        });
    });
});
// load more ajax request for posts end here------------------->

        // // // load more ajax request for posts
        // let cat_currentPage = 2;
        // $('#cat-load-more').on('click', function (e) {
        //     e.preventDefault();
        //     cat_currentPage++; // Do currentPage + 1, because we want to load the next page
        //     $('#cat-load-more-btn-container a').removeClass();
        //     $(this).html('<div class="lds-ripple"><div></div><div></div></div>');
    
        //     $.ajax({
        //         type: 'POST',
        //         url: 'http://localhost/webdev/wp-admin/admin-ajax.php',
        //         dataType: 'html',
        //         data: {
        //             action: 'load_posts_by_ajax',
        //             paged: cat_currentPage,
        //             security: 'blog.security',
        //             cat_id: $(this).data('cat-id')
        //         },
        //         success: function (res) {
        //             $('#cat-load-more-btn-container a').addClass('btn btn-default');
        //             $('#cat-load-more').text('Load More');
        //             // console.log(res.length);
        //             if (cat_currentPage >= res.length) {
        //                 $('#cat-load-more').text('No More Found').fadeOut(1000);
        //             }
        //             $('.cat-post-load-more').append(res);
        //         }
        //     });
        // });