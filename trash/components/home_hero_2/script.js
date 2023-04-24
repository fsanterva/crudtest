(function($) {
  
  $(document).ready(function($) {
    
    $(".comp_home_hero_2 .background__slider").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      autoplay: true,
      autoplaySpeed: 5000,
      pauseOnFocus: false,
      pauseOnHover: false,
      arrows: false,
      speed: 500,
      cssEase: 'cubic-bezier(.55,.43,.31,.99)',
      fade: true,
      draggable: false,
      swipe: false,
    });
    
  });
  
} (window.jQuery || window.$) );