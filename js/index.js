
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
  
  document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('user_rating_input');
    const submitButton = document.getElementById('submit');
    const commentField = document.getElementById('comment');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = parseInt(star.getAttribute('data-rating'));
            ratingInput.value = rating;
            stars.forEach(s => {
                if (parseInt(s.getAttribute('data-rating')) <= rating) {
                    s.innerHTML = '★';
                    s.style.color = 'gold'; 
                } else {
                    s.innerHTML = '☆';
                    s.style.color = 'gray';  
                }
            });

            if (rating > 0) {
                submitButton.removeAttribute('disabled');
                commentField.removeAttribute('disabled');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
                commentField.setAttribute('disabled', 'disabled');
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