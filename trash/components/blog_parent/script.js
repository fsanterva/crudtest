(function($) {
  
  $(document).ready(function($) {
    
    function loadBlogs(page, s, perpage, cat) {
      $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: {
          action: 'getBlogs',
          s: s,
          perpage: perpage,
          cat: cat,
          page: page
        },
        beforeSend: function() {
          $('.ajaxloader').addClass('loading');
        },
        success:function(response) {
          $('#blog_main__results').empty().append(response);
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
      $('#blog_main__results').find('img').each(function() {
        var me = $(this);
        var src = me.data('src');
        me.attr('src', src);
      });
    }
    
    function blogHandlers() {
      $(document).on('click', '.comp_blog_parent .filter__block li a', function() {
        var me = $(this);
        var cat = me.data('val');
        var searchKey = ( $('.comp_blog_parent .searchField').length ) ? $('.comp_blog_parent .searchField').val() : '';
        var displayNum = $('#blog_main__results').data('perpage');
        loadBlogs(0, searchKey, displayNum, cat);
//         console.log(0, searchKey, displayNum, cat);
        
        $('.comp_blog_parent .filter__block li').removeClass('active');
        me.closest('li').addClass('active');
      });
      
      $(document).on('click', '.comp_blog_parent .searchFieldWrap button.searchButton', function() {
        var me = $(this);
        var searchKey = me.closest('.searchFieldWrap').find('.searchField').val();
        var cat = $('.comp_blog_parent .filter__block li.active a').data('val');
        var displayNum = $('#blog_main__results').data('perpage');
        loadBlogs(0, searchKey, displayNum, cat);
//         console.log(0, searchKey, displayNum, cat);
      });
      $(document).on('keypress', '.comp_blog_parent .searchFieldWrap .searchField', function(e) {
        var me = $(this);
        var btn = me.closest('.searchFieldWrap').find('button.searchButton');
        if (e.keyCode == 13) {
          btn.trigger('click');
        }
      });
      
      $(document).on('click', '.comp_blog_parent .pagination .button__group .arrow', function() {
        var me = $(this);
        var page = me.data("page");
        var searchKey = ( $('.comp_blog_parent .searchField').length ) ? $('.comp_blog_parent .searchField').val() : '';
        var cat = $('.comp_blog_parent .filter__block li.active a').data('val');
        var displayNum = $('#blog_main__results').data('perpage');
        loadBlogs(page, searchKey, displayNum, cat);
      });
    }
    
    if( $('.comp_blog_parent #blog_main__results').length ) {
      var displayNum = $('#blog_main__results').data('perpage');
      var searchKey = ( $('.comp_blog_parent .searchField').length ) ? $('.comp_blog_parent .searchField').val() : '';
      var cat = ( $('.comp_blog_parent .filter__block').length ) ? $('.comp_blog_parent .filter__block li.active a').data('val') : '';
      loadBlogs(0, searchKey, displayNum, cat);
      blogHandlers();
    }
    
  });
  
} (window.jQuery || window.$) );