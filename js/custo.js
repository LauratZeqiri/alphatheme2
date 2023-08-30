jQuery(function ($) {
    $(document).on('click', '.pagination a', function (e) {
     
        e.preventDefault();
  
        var $this = $(this);
        var url = $this.attr('href');
  
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                // Show loader or do any pre-request tasks
                // Add a loading spinner or text
            },
            success: function (data) {
                // Replace the content within the blog-posts-container with the response from the AJAX request
                $('#blog-posts-container').html($(data).find('#blog-posts-container').html());
  
                // Update the pagination links
                $('.pagination').html($(data).find('.pagination').html());
  
                // Scroll to the top of the container
                $('html, body').animate({
                    scrollTop: $('#blog-posts-container').offset().top
                }, 'slow');
            },
            error: function () {
                // Handle the error case
                // Display an error message or take appropriate action
            },
            complete: function () {
                // Complete callback
                // Do any post-request tasks or cleanup
            }
        });
    });
  });