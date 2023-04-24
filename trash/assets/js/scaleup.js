(function($) {
  
  function bodyResponsiveScaleUp() {
  var baseWidth = 1920;
  var windowWidth = $(window).width();
  var scaleValue = windowWidth/baseWidth;
  
  if( windowWidth > baseWidth ) {
    $('.scalable__elements').css({
      'transform':'scale('+scaleValue+')',
      'transform-origin':'top left'
    });
    
    //FIX FOR INNER FIXED POSITIONED ELEMENTS
    if( $('.comp_quicklinks_floating_bar').length ) {
      var qlinksTop = $('.comp_quicklinks_floating_bar').offset().top;
      var prevSection = $('.comp_quicklinks_floating_bar').prev('section');

      $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();
        if( scrollTop > qlinksTop -100) {
          $('.comp_quicklinks_floating_bar').insertAfter( 'header' );
          $('.comp_quicklinks_floating_bar .row').css({
            'transform':'scale('+scaleValue+')',
            'transform-origin':'top center',
            'top': ''+100*scaleValue+'px'
          });
        }else{
          $('.comp_quicklinks_floating_bar').insertAfter( prevSection );
          $('.comp_quicklinks_floating_bar .row').css({
            'transform':'scale(1)',
            'transform-origin':'top center',
            'top':'0px'
          });
        }
      });
    }
  }
}

  bodyResponsiveScaleUp();
  
} (window.jQuery || window.$) );