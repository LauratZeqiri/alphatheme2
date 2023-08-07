

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
  

  
    function showSuccessPopup(message, seconds) {
        var popup = $('#successPopup');
        var popupMessage = $('#successMessage');

     
        popupMessage.html(message);

        
        popup.show();

       
        setTimeout(function () {
            popup.hide();
        }, seconds * 1000); 
    }

