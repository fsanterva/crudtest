(function($) {
  
  $(document).ready(function($) {
    
    $(document).on('click', '.comp_product_list .filter__list .filter a.name', function() {
      var me = $(this);
      me.closest('.filter').toggleClass('on');
    });
    $(document).on('click', '.comp_product_list .filter__block .toggleFixedFilter', function() {
      var me = $(this);
      me.closest('.filter__block').toggleClass('on');
    });
    
    function loadProducts(page, s, producttype, cats, append) {
//       console.log(page, s, producttype, cats);
      $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: {
          action: 'getproducts',
          page: page,
          s: s,
          producttype: producttype,
          cats: cats
        },
        beforeSend: function() {
          $('.ajaxloader').addClass('loading');
        },
        success:function(response) {
          if( append ) {
            $('#productCategoryListWrap').find('.loadmore, .ajaxloader').remove();
            $('#productCategoryListWrap').append(response);
          }else{
            $('#productCategoryListWrap').empty().append(response);
          }
          imgSwap();
        },
        complete: function() {
          $('.ajaxloader').removeClass('loading');
        },
        error: function(e) {
          console.log(e);
        }
      });
    }
    
    function imgSwap() {
      $('#productCategoryListWrap').find('img').each(function() {
        var me = $(this);
        var src = me.data('src');
        me.attr('src', src);
      });
    }
    
    function productHandlers() {
      $(document).on('change', '.comp_product_list .row--productlist .filter__list .filter input[type="radio"]', function() {
        var s = $('.comp_product_list .filter__block #searchProductFld').val();
        var producttype = $('.comp_product_list .row--productlist').data('productcat');
        var cats = [];
        $('.comp_product_list .row--productlist .filter__list .filter').each(function() {
          var me = $(this);
          var taxName = me.find('a.name').data('val');
          var taxTerm = me.find('input[name="'+taxName+'"]:checked').val();
          if( taxTerm !== '' && (typeof taxTerm !== 'undefined') ) {
            cats.push({
              taxname: taxName,
              taxterm: taxTerm
            });
          }
        });
        loadProducts(0, s, producttype, cats, false);
      });
      
      $(document).on('click', '.comp_product_list .filter__block button.searchProductButton', function() {
        var me = $(this);
        var s = $('.comp_product_list .filter__block #searchProductFld').val();
        var producttype = $('.comp_product_list .row--productlist').data('productcat');
        var cats = [];
        $('.comp_product_list .row--productlist .filter__list .filter').each(function() {
          var me = $(this);
          var taxName = me.find('a.name').data('val');
          var taxTerm = me.find('input[name="'+taxName+'"]:checked').val();
          if( taxTerm !== '' && (typeof taxTerm !== 'undefined') ) {
            cats.push({
              taxname: taxName,
              taxterm: taxTerm
            });
          }
        });
        loadProducts(0, s, producttype, cats, false);
      });
      $(document).on('keypress', '.comp_product_list .filter__block #searchProductFld', function(e) {
        var me = $(this);
        var btn = me.closest('.searchField').find('button.searchProductButton');
        if (e.keyCode == 13) {
          btn.trigger('click');
        }
      });
      $(document).on('click', '.comp_product_list #productCategoryListWrap .loadmore', function() {
        var me = $(this);
        var page = me.data('page');
        var s = $('.comp_product_list .filter__block #searchProductFld').val();
        var producttype = $('.comp_product_list .row--productlist').data('productcat');
        var cats = [];
        $('.comp_product_list .row--productlist .filter__list .filter').each(function() {
          var me = $(this);
          var taxName = me.find('a.name').data('val');
          var taxTerm = me.find('input[name="'+taxName+'"]:checked').val();
          if( taxTerm !== '' && (typeof taxTerm !== 'undefined') ) {
            cats.push({
              taxname: taxName,
              taxterm: taxTerm
            });
          }
        });
        loadProducts(page, s, producttype, cats, true);
      });
    }
    
    if( $('.comp_product_list #productCategoryListWrap').length ) {
      var s = $('.comp_product_list .filter__block #searchProductFld').val();
      var producttype = $('.comp_product_list .row--productlist').data('productcat');
      var cats = [];
      $('.comp_product_list .row--productlist .filter__list .filter').each(function() {
        var me = $(this);
        var taxName = me.find('a.name').data('val');
        var taxTerm = me.find('input[name="'+taxName+'"]:checked').val();
        if( taxTerm !== '' && (typeof taxTerm !== 'undefined') ) {
          cats.push({
            taxname: taxName,
            taxterm: taxTerm
          });
        }
      });
      
      loadProducts(0, s, producttype, cats, false);
      productHandlers();
    }
    
  });
  
} (window.jQuery || window.$) );