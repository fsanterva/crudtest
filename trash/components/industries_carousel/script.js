(function($) {
  
  $(document).ready(function($) {
    
    $(".comp_industries_carousel .industries__slider").slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      autoplaySpeed: 5000,
      pauseOnFocus: false,
      pauseOnHover: false,
      arrows: true,
      speed: 500,
      fade: false,
//       draggable: false,
      swipe: true,
      cssEase: 'cubic-bezier(.55,.43,.31,.99)',
      prevArrow: '<button aria-label="slider previous arrow" class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1745.795,827.1l.885.885-3.94,3.939H1755v1.252h-12.26l3.94,3.939-.885.885-5.452-5.45Z" transform="translate(-1740.343 -827.099)"/></svg></button>',
      nextArrow: '<button aria-label="slider next arrow" class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1817.2,827.1l-.885.885,3.94,3.939H1808v1.252h12.26l-3.94,3.939.885.885,5.452-5.45Z" transform="translate(-1808 -827.099)"/></svg></button>',
      customPaging: function (slider, i) {
        var cnt = (slider.slideCount < 10) ? '0' + (i + 1) : (i + 1);
        var total = (slider.slideCount < 10) ? '0' + slider.slideCount : slider.slideCount;
        return '<span class="cnt">' + cnt + '</span> / <span class="total">' + total + '</span>';
      },
      responsive: [
        {
          breakpoint: 979,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
    $(".comp_industries_carousel .industries__slider").each(function() {
      var me = $(this);
      var count = me.find('.slick-slide').length;
      if(count <= 3) {
        me.addClass('no-dots');
      }
    });
    
  });
  
} (window.jQuery || window.$) );