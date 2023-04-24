(function($) {
  
  $(document).ready(function($) {
    
    $('.comp_product_child_faqs .row-faqs .item .question').unbind('click').bind('click', function(e) {
      e.stopImmediatePropagation();
      e.stopPropagation();
      console.log('test');
      var item = $(this).closest('.item');
      item.toggleClass('on');
//       if( item.hasClass('on') ) {
//         item.removeClass('on');
//       }else{
//         item.addClass('on');
//       }
    });
    
  });
  
} (window.jQuery || window.$) );