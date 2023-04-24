(function($) {
  
  $(document).ready(function($) {
    
    function scrollToSmoothly(pos, time) {
      var currentPos = window.pageYOffset;
      var start = null;
      if(time == null) time = 500;
      pos = +pos, time = +time;
      window.requestAnimationFrame(function step(currentTime) {
          start = !start ? currentTime : start;
          var progress = currentTime - start;
          if (currentPos < pos) {
              window.scrollTo(0, ((pos - currentPos) * progress / time) + currentPos);
          } else {
              window.scrollTo(0, currentPos - ((currentPos - pos) * progress / time));
          }
          if (progress < time) {
              window.requestAnimationFrame(step);
          } else {
              window.scrollTo(0, pos);
          }
      });
    }
    
    $(document).on('click', '.comp_quicklinks_floating_bar nav a', function() {
      var id = $(this).attr('href');
      scrollToSmoothly( $(id).offset().top-120, 500);
    });
    
    $('.comp_quicklinks_floating_bar nav a').each(function() {
      var me = $(this);
      var id = me.attr('href');
      $(window).scroll(function() {
        var scrolltop = $(window).scrollTop();
        if( $(id).length && $(id).is_on_screen() ) {
          $('.comp_quicklinks_floating_bar nav a').removeClass('active');
          me.addClass('active');
        }
      });
    });
    
    $(window).scroll(function() {
      var scrolltop = $(window).scrollTop();
      var elem = $('.comp_quicklinks_floating_bar');
      setTimeout(function() {
        if( scrolltop > elem.offset().top - 100 ) {
          elem.addClass('fixed');
        }else{
          elem.removeClass('fixed');
        }
      }, 5);
    });
    
  });
  
} (window.jQuery || window.$) );