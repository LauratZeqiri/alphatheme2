
jQuery(function($) {
    var page = 2;
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };

  //   if (answer.style.display === 'none') {
  //     answer.style.display = 'block';
  //   } else {
  //     answer.style.display = 'none';
  //   }
  // }


  console.log("HEllo");