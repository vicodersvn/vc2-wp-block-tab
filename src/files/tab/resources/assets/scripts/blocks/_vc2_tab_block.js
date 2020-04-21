(function ($) {
  'use strict';
  $(document).ready(function () {
    'use strict';
    const tab_titles = document.querySelectorAll('.tab-titles .title');
    Array.from(tab_titles).forEach(function (tab_title) {

      var id = $(tab_title).attr('id');
      
      $('#'+id).on('click',function(e){
        e.preventDefault();
        $('.tab-titles .title').removeClass('active');
        $('.tab-content .tab-desc').removeClass('active').hide().animate({ opacity: "0" }, 200);
        if($(this).hasClass('active')) {
          $(this).removeClass('active');
          const tab_content = document.querySelectorAll('.tab-content .tab-desc');
          Array.from(tab_content).forEach(function (content) {
            var data = $(content).attr('id');
            if(data == id) {
              $('.tab-desc#'+data).removeClass('active').hide().animate({ opacity: "0" }, 200);
            }
          });
        }
        else {
          $(this).addClass('active');
          const tab_content = document.querySelectorAll('.tab-content .tab-desc');
          Array.from(tab_content).forEach(function (content) {
            var data = $(content).attr('id');
            if(data == id) {
              $('.tab-desc#'+data).addClass('active').show().animate({ opacity: "1" }, 200)
            }
          });
        }
      });
      
    });
    
  });
})(jQuery);
