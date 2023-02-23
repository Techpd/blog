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
            if (response != '' && response != '0') {
                $('.cat-post-load-more').append(response);
                $('img').each(function () {
                    var data_src = $(this).attr('data-src')
                    if (data_src) {
                        $(this).attr('src', data_src);
                    }
                });
                page++;
            }
            if (response == 0) {
                $('#cat-load-more').text('No More Found').fadeOut(1000);
            }
        });
    });
});
// load more ajax request for posts end here------------------->

// Ajax js for load more comments
// jQuery(document).ready(function ($) {
//     var page = 1;
//     var post_id = $('input[name=post_id]').val();
//     var loading = false;
//     var load_more_button = $('#load-more-comments');
//     var original_text = load_more_button.text();

//     load_more_button.click(function () {
//         if (!loading) {
//             loading = true;
//             load_more_button.addClass('loading-comments');
//             load_more_button.text('Loading...');

//             var comment_data = {
//                 action: 'load_comments',
//                 page: page + 1,
//                 post_id: post_id,
//                 'security': blog.security,
//             };

//             $.post(blog.ajaxurl, comment_data,  function (response) {
//                 if (response.success) {
//                     page++;
//                     $('.commentlist').append(response.data.html);
//                     if (response.data.last_page) {
//                         load_more_button.hide();
//                     }
//                 }
//                 loading = false;
//                 load_more_button.text(original_text);
//             });
//         }
//     });
// });
// Ajax js for load more comments end here

jQuery(document).ready(function($) {
    var page = 0;
    var per_page = 3;
    $('#load-more-comments').click(function(e) {
        var post_id = $(this).data('comment-post-id');
        console.log(post_id);
        e.preventDefault();
        page++;
        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'my_custom_load_comments',
                post_id: post_id,
                page: page,
                per_page: per_page
            },
            beforeSend: function() {
                $('.load-more-comments').text('Loading...');
            },
            success: function(response) {
                $('.load-more-comments').text('Load More');
                $('.commentlist').append(response.data);
                if (response.data == '' || response.data == null || response.data.length < 0) {
                    $('.load-more-comments').hide();
                }
            }
        });
    });
});
