(function($) {
  
  $(document).ready(function($) {
    
    $(document).on('click', '.comp_two_column_image_text .media__wrapper.video .play__button', function() {
      var me = $(this);
      var iframe = me.closest('.media__wrapper').find('iframe');
      var iframesrc = iframe.data('src');
      me.closest('.media__wrapper').addClass('video__triggered');
      iframe.attr('src', iframesrc);
    });
    
  });
  
} (window.jQuery || window.$) );