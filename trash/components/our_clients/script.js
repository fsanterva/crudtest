(function($) {
  
  $(document).ready(function($) {
    
    $(".comp_our_clients .logo__wrapper").slick({
      infinite: true,
      slidesToShow: 7,
      slidesToScroll: 1,
      dots: false,
      autoplay: true,
      autoplaySpeed: 5000,
      pauseOnFocus: false,
      pauseOnHover: false,
      arrows: false,
      speed: 500,
      fade: false,
//       draggable: false,
      swipe: true,
      cssEase: 'cubic-bezier(.55,.43,.31,.99)',
      responsive: [
        {
          breakpoint: 1599,
          settings: {
            slidesToShow: 6
          }
        },
        {
          breakpoint: 1299,
          settings: {
            slidesToShow: 5
          }
        },
        {
          breakpoint: 979,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3
          }
        }
      ]
//       prevArrow: '<button aria-label="slider previous arrow" class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1745.795,827.1l.885.885-3.94,3.939H1755v1.252h-12.26l3.94,3.939-.885.885-5.452-5.45Z" transform="translate(-1740.343 -827.099)"/></svg></button>',
//       nextArrow: '<button aria-label="slider next arrow" class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1817.2,827.1l-.885.885,3.94,3.939H1808v1.252h12.26l-3.94,3.939.885.885,5.452-5.45Z" transform="translate(-1808 -827.099)"/></svg></button>',
    });
    
  });
  
} (window.jQuery || window.$) );