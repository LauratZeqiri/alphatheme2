
jQuery(function($) {
  var page = 2;
  $('body').on('click', '.loadmore', function() {
    const postDivs = document.querySelectorAll('.post');
    var businessIds = document.getElementById('business_ids').value;
        const dataIds = [];
            postDivs.forEach((div) => {
            const dataId = div.getAttribute('data-id');
            if (dataId) {
                dataIds.push(dataId);
            }
            });

        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'displayed_businesses' : dataIds.join(','),
            'allowedIds' : businessIds,
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