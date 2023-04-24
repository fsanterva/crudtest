(function($) {
  
  function buildSameHeightHeading() {
    
    var tallestHeight = ( $(window).width() > 767 ) ? 250 : 150;
    var labelHeight = $(".comp_product_comparison_table .labels__wrap > label").outerHeight();
    ( labelHeight > tallestHeight ) ? tallestHeight = labelHeight : '';
    
    $(".comp_product_comparison_table .slider__wrap .item .product__item").each(function() {
      var that = $(this);
      var valHeight = that.outerHeight();

      ( valHeight > tallestHeight ) ? tallestHeight = valHeight : '';
      
      var labelHeight = $(".comp_product_comparison_table .labels__wrap > label").css({
        'min-height': tallestHeight
      });
      $(".comp_product_comparison_table .slider__wrap .item .product__item").css({
        'min-height': tallestHeight
      });

    });
    
  }
  function buildSameHeightList() {
    
    $(".comp_product_comparison_table .labels__wrap .labels span").each(function() {
        
        var tallestHeight = ( $(window).width() > 767 ) ? 60 : 45;
        var me = $(this);
        var labelHeight = me.outerHeight();
        var data = me.data('count');
        
        ( labelHeight > tallestHeight ) ? tallestHeight = labelHeight : '';
        
        $(".comp_product_comparison_table .slider__wrap .item .specs__list span[data-count='"+data+"']").each(function() {
          var that = $(this);
          var valHeight = that.outerHeight();
          
          ( valHeight > tallestHeight ) ? tallestHeight = valHeight : '';
          
        });
        
        $(".comp_product_comparison_table .labels__wrap .labels span[data-count='"+data+"']").css({
          'min-height': tallestHeight
        });
        $(".comp_product_comparison_table .slider__wrap .item .specs__list span[data-count='"+data+"']").css({
          'min-height': tallestHeight
        });
        
      });
  }
  
  $(document).ready(function($) {
    
    $(".comp_product_comparison_table .comparisontable__wrap .slider__wrap").on('init', function (event, slick) {
      
      setTimeout(function() {
        buildSameHeightHeading();
        buildSameHeightList();
      }, 1000);
      
    });
    
    $(".comp_product_comparison_table .comparisontable__wrap .slider__wrap").slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      autoplaySpeed: 5000,
      pauseOnFocus: true,
      pauseOnHover: false,
      autoplay: false,
      arrows: true,
      speed: 500,
      fade: false,
      draggable: true,
      swipe: true,
      waitForAnimate: true,
      cssEase: 'cubic-bezier(.55,.43,.31,.99)',
      prevArrow: '<button aria-label="slider previous arrow" class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16.841" height="26.297" viewBox="0 0 16.841 26.297"><path d="M13.121,0,0,13.148,13.121,26.3l3.72-3.677L7.39,13.148l9.451-9.471Z" transform="translate(0 0)"/></svg></button>',
      nextArrow: '<button aria-label="slider next arrow" class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16.841" height="26.296" viewBox="0 0 16.841 26.296"><path d="M3.72,0,16.841,13.148,3.72,26.3,0,22.619l9.451-9.471L0,3.677Z" transform="translate(0 0)"/></svg></button>',
      responsive: [
        {
          breakpoint: 1199,
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
    
    $(window).resize(function() {
      
      buildSameHeightHeading();
      buildSameHeightList();
      
    });
    
  });
  
} (window.jQuery || window.$) );