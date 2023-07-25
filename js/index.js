
  // function pyetja(question) {
  //   var answer = question.nextElementSibling;

  //   if (answer.style.display === 'none') {
  //     answer.style.display = 'block';
  //   } else {
  //     answer.style.display = 'none';
  //   }
  // }


  jQuery(function($) {
    var page = 2;
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };

        $.post(blog.ajaxurl, data, function(response) {
            if ($.trim(response) != '') {
                $('.blog-posts').append(response);
                page++;
            } else {
                $('.loadmore').hide();
            }
        });
    });
});
  