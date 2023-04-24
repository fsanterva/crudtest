(function($) {
  
  $(document).ready(function($) {
    
    $(".comp_home_hero_1 .banner_slider").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      autoplay: false,
      autoplaySpeed: 5000,
      pauseOnFocus: false,
      pauseOnHover: false,
      arrows: true,
      speed: 500,
      cssEase: 'cubic-bezier(.55,.43,.31,.99)',
      fade: true,
      draggable: false,
      swipe: false,
      prevArrow: '<button aria-label="slider previous arrow" class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1745.795,827.1l.885.885-3.94,3.939H1755v1.252h-12.26l3.94,3.939-.885.885-5.452-5.45Z" transform="translate(-1740.343 -827.099)"/></svg></button>',
      nextArrow: '<button aria-label="slider next arrow" class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14.657" height="10.9" viewBox="0 0 14.657 10.9"><path d="M1817.2,827.1l-.885.885,3.94,3.939H1808v1.252h12.26l-3.94,3.939.885.885,5.452-5.45Z" transform="translate(-1808 -827.099)"/></svg></button>'
    });
    
  });
  
} (window.jQuery || window.$) );