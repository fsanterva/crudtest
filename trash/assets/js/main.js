(function($) {
  $.fn.is_on_screen = function() {
    var win = $(window);
      var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
      };
      //viewport.right = viewport.left + win.width();
      viewport.bottom = viewport.top + win.height();
      var bounds = this.offset();
      //bounds.right = bounds.left + this.outerWidth();
      bounds.bottom = bounds.top + this.outerHeight();
      return (!(viewport.bottom < (bounds.top + (win.height()/3) ) || viewport.top > (bounds.bottom + (win.height()/3) ) ));
  };
}(jQuery));
(function($) {
  $.fn.is_on_screen2 = function() {
    var win = $(window);
      var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
      };
      //viewport.right = viewport.left + win.width();
      viewport.bottom = viewport.top + win.height();
      var bounds = this.offset();
      //bounds.right = bounds.left + this.outerWidth();
      bounds.bottom = bounds.top + this.outerHeight();
      return (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom ));
  };
}(jQuery));
(function($) {
  $.fn.is_on_screen_parallax = function() {
    var win = $(window);
      var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
      };
      //viewport.right = viewport.left + win.width();
      viewport.bottom = viewport.top + win.height();
      var bounds = this.offset();
      //bounds.right = bounds.left + this.outerWidth();
      bounds.bottom = bounds.top + this.outerHeight();
      return (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom ));
  };
}(jQuery));

(function($) {
	
/* INIT_IS_ON_SCREEN */
  function initIsOnScreen() {

    $('.compSection[data-animate="1"]').each(function() {
      var me = $(this);
      me.find('.to_animate').each(function() {
        if( $(this).is_on_screen() && !( $(this).hasClass('elem_in_viewport') ) ) {
          $(this).addClass('elem_in_viewport');
        }
      });
      me.find('.to_animate_manual').each(function() {
        if( $(this).is_on_screen2() && !( $(this).hasClass('elem_in_viewport') ) ) {
          $(this).addClass('elem_in_viewport');
        }
      });
    });

    $(window).scroll(function() {
      $('.compSection[data-animate="1"]').each(function() {
        var me = $(this);
        me.find('.to_animate').each(function() {
          if( $(this).is_on_screen() && !( $(this).hasClass('elem_in_viewport') ) ) {
            $(this).addClass('elem_in_viewport');
          }
        });
      });
      $('.compSection[data-animate="1"]').each(function() {
        var me = $(this);
        me.find('.to_animate_manual').each(function() {
          if( $(this).is_on_screen2() && !( $(this).hasClass('elem_in_viewport') ) ) {
            $(this).addClass('elem_in_viewport');
          }
        });
      });
    });
  
    /* PARALLAX_SCROLLING */
    $('.compSection[data-animate="1"]').each(function() {
      var me = $(this);
      var el = me.find('.to_parallax_scroll');

        $(window).scroll(function() {

          // Check if the element is in the viewport.
          var visible = me.is_on_screen_parallax();
          if(visible) {
            el.each(function() {
              var that = $(this);
              
              var scrolled = $(window).scrollTop();
              var initY = that.offset().top;
              var height = that.height();
              var endY  = initY + that.height();
              
              var speed = that.data('speed');
              var finalSpeed = (typeof speed !== "undefined") ? speed : 0.5;
                var diff = scrolled - initY;
                var ratio = Math.round((diff / height) * 100);
                if( that.hasClass('to_parallax_left') ) {
                  that.css('transform','translateX('+parseInt(-(ratio * finalSpeed))+'px)');
                }else if( that.hasClass('to_parallax_right') ) {
                  that.css('transform','translateX('+parseInt((ratio * finalSpeed))+'px)');
                }else if( that.hasClass('to_parallax_bottom') ) {
                  that.css('transform','translateY('+parseInt((ratio * finalSpeed))+'px)');
                }else{
                  that.css('transform','translateY('+parseInt(-(ratio * finalSpeed))+'px)');
                }
            });
          }

        });
    });
  
    /* PARALLAX_MOUSEMOVE */
    $('.compSection[data-animate="1"]').each(function() {
      var sect = $(this);
      var el = sect.find('.to_parallax_mousemove');

      $(document).on('mousemove', function(e) {

        el.each(function() {
          var me = $(this);
          var speed = me.data('speed');
          var x = ( $(window).innerWidth() - e.pageX*speed ) / 100;
          var y = ( $(window).innerHeight() - e.pageY*speed ) / 100;

          if( me.hasClass('to_parallax_mousemove--horizontal') ) {
            me.css({
              'transform':`translate3d(${x}px, 0px, 0px)`,
              'transform-style':'preserve-3d',
              'backface-visibility':'hidden'
            });
          }else if( me.hasClass('to_parallax_mousemove--vertical') ) {
            me.css({
              'transform':`translate3d(0px, ${y}px, 0px)`,
              'transform-style':'preserve-3d',
              'backface-visibility':'hidden'
            });
          }else{
            me.css({
              'transform':`translate3d(${x}px, ${y}px, 0px)`,
              'transform-style':'preserve-3d',
              'backface-visibility':'hidden'
            });
          }

        });
      });
    });


    /* PARALLAX_BACKGROUND_IMAGE */
    $('.compSection[data-animate="1"]').each(function() {
      var me = $(this);
      var el = me.find('.section__bgimage, .to_parallax_bg');

      var initscrolled = $(window).scrollTop();
      var initinitY = me.offset().top;
      var initheight = me.height();
      var initendY  = initinitY + me.height();
      var initspeed = 2;

      if( initscrolled > initinitY ) {
        var diff = initscrolled - initinitY;
        var ratio = Math.round((diff / initheight) * 100);
        el.find('img').css('transform','translateY('+parseInt( (ratio * initspeed) )+'px)');
      }else{
        el.find('img').css('transform','translateY(0px)');
      }

      $(window).scroll(function() {
        
        el.each(function() {
          var that = $(this);
          var scrolled = $(window).scrollTop();
          var initY = that.offset().top;
          var height = that.height();
          var endY  = initY + that.height();
          var speed = 2;

          if( scrolled > initY ) {
            var diff = scrolled - initY;
            var ratio = Math.round((diff / height) * 100);
            that.find('img').css('transform','translateY('+parseInt( (ratio * speed) )+'px)');
          }else{
            that.find('img').css('transform','translateY(0px)');
          }
        });

      });

    });

  }
  
  /* STICKY_HEADER */
  function stickyHeader() {
    if( $('header').hasClass('sticky') ) {
      
      var scrolledInit = $(window).scrollTop();
      if( scrolledInit > 0 ) {
        $('header').addClass('sticky__done');
      }else{
        $('header').removeClass('sticky__done');
      }
      
      $(window).scroll(function() {

        var scrolled = $(window).scrollTop();
        if( scrolled > 130 ) {
          $('header').addClass('sticky__done');
        }else{
          $('header').removeClass('sticky__done');
        }

      });
    }
  }
  

  
function videoPlayHandler() {
  $(document).on('click', '.imagevideo__block.media__type_video .play__button', function() {
    var me =$(this);
    var iframe = me.closest('.imagevideo__block').find('iframe');
    var vidsrc = iframe.data('src');
    iframe.attr('src', vidsrc);
    me.closest('.imagevideo__block').addClass('video__loaded');
  });
}
  
function rowHeadingColumnVisibility() {
  $('.compSection .row--heading .column').each(function() {
    var me = $(this);
    if(me.children().length == 0) {
      me.remove();
    }
  });
}
  
function blogPostContentEdit() {
  $('.single .post__body .gallery br').remove();
  $('.single .post__body .gallery').each(function() {
    var me = $(this);
    var imgCount = me.find('.gallery-item').length;
    if(imgCount > 2) {
      me.slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplaySpeed: 5000,
        pauseOnFocus: false,
        pauseOnHover: false,
        arrows: true,
        speed: 500,
        fade: false,
        swipe: true,
        cssEase: 'cubic-bezier(.55,.43,.31,.99)',
        prevArrow: '<button aria-label="slider previous arrow" class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1745.795,827.1l.885.885-3.94,3.939H1755v1.252h-12.26l3.94,3.939-.885.885-5.452-5.45Z" transform="translate(-1740.343 -827.099)"/></svg></button>',
        nextArrow: '<button aria-label="slider next arrow" class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1817.2,827.1l-.885.885,3.94,3.939H1808v1.252h12.26l-3.94,3.939.885.885,5.452-5.45Z" transform="translate(-1808 -827.099)"/></svg></button>',
        customPaging: function (slider, i) {
          var cnt = i + 1;
          var total = slider.slideCount;
          return '<span class="cnt">' + cnt + '</span> of <span class="total">' + total + '</span>';
        }
      });
    }
  });
  $('.single .post__body img').closest('p').addClass('image');
}
  
function fullscreenmenuHandler() {
  $(document).on('click', '.fullscreen__menu .closeToggle', function() {
    $('body').removeClass('fullscreenmenu__open');
  });
  $(document).on('click', '.flyout__menu_togglebtn', function() {
    $('body').addClass('fullscreenmenu__open');
  });
  $('.fullscreen__menu nav li.menu-item-has-children').each(function() {
    var me=$(this);
    var elem = $('<button class="toggleSubmenu"><span class="line1"></span><span class="line2"></span></button');
    me.find('> a').append(elem);
  });
  $(document).on('click', '.fullscreen__menu .toggleSubmenu', function(e) {
    e.preventDefault();
    var me= $(this);
    me.closest('li').toggleClass('on');
  });
}
  
function quoteFormHandler() {
  $(document).on('click', '.quoteForm .closeToggle', function() {
    $('body').removeClass('quoteform__open');
  });
  $(document).on('click', '.quoteBtn', function(e) {
    e.preventDefault();
    $('body').addClass('quoteform__open');
  });
}
  
$(document).ready(function() {
  $('body').on('contextmenu', 'img', function(e){
    return false;
  });
  
  initIsOnScreen();
  stickyHeader();
  videoPlayHandler();
  rowHeadingColumnVisibility();
  blogPostContentEdit();
  fullscreenmenuHandler();
  quoteFormHandler();
  
});
  
} (window.jQuery || window.$) );