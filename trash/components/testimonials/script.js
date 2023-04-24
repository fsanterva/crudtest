(function($) {
  
  $(document).ready(function($) {
    
    $(".comp_testimonials .testimonial__slider").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      autoplaySpeed: 5000,
      pauseOnFocus: false,
      pauseOnHover: false,
      arrows: true,
      speed: 500,
      fade: true,
//       draggable: false,
      swipe: true,
      asNavFor: '.testimonial__carousel',
      cssEase: 'cubic-bezier(.55,.43,.31,.99)',
      prevArrow: '<button aria-label="slider previous arrow" class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1745.795,827.1l.885.885-3.94,3.939H1755v1.252h-12.26l3.94,3.939-.885.885-5.452-5.45Z" transform="translate(-1740.343 -827.099)"/></svg></button>',
      nextArrow: '<button aria-label="slider next arrow" class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1817.2,827.1l-.885.885,3.94,3.939H1808v1.252h12.26l-3.94,3.939.885.885,5.452-5.45Z" transform="translate(-1808 -827.099)"/></svg></button>',
    });
    
    $(".comp_testimonials .testimonial__carousel").slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      autoplaySpeed: 5000,
      pauseOnFocus: false,
      pauseOnHover: false,
      arrows: true,
      speed: 500,
      fade: false,
      asNavFor: '.testimonial__slider',
//       draggable: false,
      swipe: true,
      cssEase: 'cubic-bezier(.55,.43,.31,.99)',
      prevArrow: '<button aria-label="slider previous arrow" class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1745.795,827.1l.885.885-3.94,3.939H1755v1.252h-12.26l3.94,3.939-.885.885-5.452-5.45Z" transform="translate(-1740.343 -827.099)"/></svg></button>',
      nextArrow: '<button aria-label="slider next arrow" class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1817.2,827.1l-.885.885,3.94,3.939H1808v1.252h12.26l-3.94,3.939.885.885,5.452-5.45Z" transform="translate(-1808 -827.099)"/></svg></button>',
      responsive: [
        {
          breakpoint: 979,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 767,
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
    
  });
  
} (window.jQuery || window.$) );