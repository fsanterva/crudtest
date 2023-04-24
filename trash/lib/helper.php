<?php
add_theme_support( 'post-thumbnails' );

/* SET THE TIME TO GMT+8
================================================== */
function update_default_time() {
  update_option( 'gmt_offset', '+8' );
  update_option( 'timezone_string', '' );
} add_action( 'after_switch_theme', 'update_default_time' );


/* PREPARE CUSTOM DASHBOARD
================================================== */
function register_menu() {
  add_dashboard_page( 'Dilate Digital', 'Dilate Digital', 'read', 'custom-dashboard', 'create_dashboard' );
} add_action('admin_menu', 'register_menu' );

function redirect_dashboard() {
  if( is_admin() ) {
    $screen = get_current_screen();
    if( $screen->base == 'dashboard' ) {
      wp_redirect( admin_url( 'index.php?page=custom-dashboard' ) );
    }
  }
} add_action('load-index.php', 'redirect_dashboard' );

function create_dashboard() {
  include_once( get_template_directory() .'/custom_dashboard.php'  );
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/* DELAY JS
================================================== */
add_filter( 'script_loader_tag', 'dilate_delay_overrirde', 10, 2);
function dilate_delay_overrirde($tag, $handle) {
    if (strpos($tag, 'b2b-lazyload') !== false) {
        return delay_script($tag);
    } else if (strpos($tag, 'jquery-core-js') !== false) {
        $tag = str_replace('text/javascript','',$tag);
        return delay_script($tag);
    } else if (strpos($tag, 'jquery-migrate-js') !== false) {
        $tag = str_replace('text/javascript','',$tag);
        $tag = str_replace(' src', ' defer="defer" src', $tag);
        return delay_script($tag);
    } else if (strpos($tag, 'b2b-slick') !== false) {
        $tag = str_replace('text/javascript','',$tag);
        $tag = str_replace(' src', ' defer="defer" src', $tag);
        return delay_script($tag);
    }else if (strpos($tag, 'b2b-main') !== false) {
        $tag = str_replace('text/javascript','',$tag);
        $tag = str_replace(' src', ' defer="defer" src', $tag);
        return delay_script($tag);
    }
  else {
        return delay_script($tag);
    }
}
function delay_script($tag){
  return str_replace('text/javascript','dilatelazyloadscript',$tag);
}

/* FORCE REMOVE SPECIFIC CSS
================================================== */
add_filter( 'style_loader_tag', 'dilate_css_overrirde', 10, 2);
function dilate_css_overrirde($tag, $handle) {
    if (strpos($tag, 'forminator-icons') !== false) {
        return delay_style($tag);
    }else if (strpos($tag, 'forminator-utilities') !== false) {
        return delay_style($tag);
    }else if (strpos($tag, 'forminator-grid-default') !== false) {
        return delay_style($tag);
    }else if (strpos($tag, 'buttons-css') !== false) {
        return delay_style($tag);
    }else{
      return $tag;
    }
}
function delay_style($tag){
  return str_replace('text/css','dilateoverridecss',$tag);
}

function mytheme_register_nav_menus() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'your-text-domain' ),
        'footer' => __( 'Footer Menu', 'your-text-domain' )
    )); 
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menus' );

function add_custom_image_sizes() {
	add_image_size( 'small-a', 300 );
  add_image_size( 'small-b', 450 );
  add_image_size( 'medium-a', 900 );
}
add_action( 'after_setup_theme', 'add_custom_image_sizes' );


add_filter( 'max_srcset_image_width', 'acf_max_srcset_image_width', 10 , 2 );
// set the max image width 
function acf_max_srcset_image_width() {
	return 2200;
}

function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


add_action( 'save_post', 'clearCacheOnSave', 10,3 );
function clearCacheOnSave( $post_id, $post, $update ) {
    if ( $update ) {
      $wpurl = get_the_permalink( get_the_ID() );
      $parsed = parse_url($wpurl);
      $urlPath = $parsed['path'];
      $finalURL = ( $urlPath == '/' ) ? '/home/' : $urlPath;
      $file = str_replace("-", "", str_replace("/", "_", $finalURL));
      $cachefile = 'cached'.substr_replace($file,"",-1).'.html';
      $root = $_SERVER['DOCUMENT_ROOT'];
      
      if ( file_exists($root.'/cached/'.$cachefile) ) {
          unlink( $root.'/cached/'.$cachefile );
      }
    }
}

/** AJAX BASED RESOURCES LIST **/
add_action( 'wp_ajax_deleteAllCache', 'deleteAllCache' );
add_action( 'wp_ajax_nopriv_deleteAllCache', 'deleteAllCache' );
function deleteAllCache() {
  $root = $_SERVER['DOCUMENT_ROOT'];
  $folder_path = $root.'/cached/';
  // Folder path to be flushed
//   $folder_path = "myGeeks";
  // List of name of files inside
  // specified folder
  $files = glob($folder_path.'/*'); 
  // Deleting all the files in the list
  foreach($files as $file) {
    if(is_file($file)) 
      // Delete the given file
      unlink($file); 
  }
}


add_action( 'wp_ajax_getBlogs', 'getBlogs' );
add_action( 'wp_ajax_nopriv_getBlogs', 'getBlogs' );
function getBlogs() {
  $page         = $_POST['page'];
  $cat          = $_POST['cat'];
  $s            = $_POST['s'];
  $display_num  = $_POST['perpage'];
  
  $args = array(
    'post_type'       => 'post',
    'posts_per_page'  => -1,
    's'               => $s,
    'post_status '    => array('publish'),
    'category_name'   => $cat
  );

  $result = new WP_Query( $args );
  $listings_found = count($result->posts);
  $totalpage = ceil($listings_found/$display_num);
  $new_search = array_slice($result->posts, ($page*$display_num), $display_num);

  ob_start();

  if( !empty($new_search) ) : ?>
    <span class="ajaxloader"></span>
    <div class="articles__wrapper" data-totalcount=<?=$listings_found?>>
      <?php foreach( $new_search as $post ): 
        $featImg = getFeaturedImage($post);
        $title = get_the_title($post);
        $perm = get_the_permalink($post);
        $excerpt = get_the_excerpt($post);
        $date = get_the_date('m.d.Y', $post);
        ?>

        <div class="article to_animate">
          <a class="link-to-post" href="<?= $perm; ?>"></a>
          <div class="top">
            <span class="date"><?= $date; ?></span>
            <h4 class="title"><?= $title; ?></h4>
          </div>
          <div class="bot">
            <div class="excerpt">
              <?= $excerpt; ?>
            </div>
            <div class="img_wrap">
              <img <?= acf_responsive_image($featImg['id'], '', '500px', true); ?> alt="<?= $featImg['alt']; ?>"/>
            </div>
            <a class="link__icon" href="<?= $perm; ?>">Read more</a>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
    <div class="pagination">
      <div class="button__group">
        <?php if( $page > 0 ) : ?>
        
        <button class="arrow <?= ($page == 0) ? 'disabled' : ''; ?>" data-page=<?=($page == 0) ? 0 : $page-1;?>><svg xmlns="http://www.w3.org/2000/svg" width="41.678" height="20.942" viewBox="0 0 41.678 20.942"><path d="M.275,11.138,9.747,20.61a.947.947,0,1,0,1.336-1.336L3.231,11.422h37.5a.947.947,0,0,0,0-1.894H3.231l7.852-7.862A.947.947,0,1,0,9.747.33L.275,9.8a.947.947,0,0,0,0,1.335" transform="translate(0 0.001)" fill="#183A64"/></svg></button>
        
        <?php endif; ?>
        
        <?php if( $page < $totalpage-1 ) : ?>
        
        <button class="arrow <?= ($page+1 == $totalpage) ? 'disabled' : ''; ?>" data-page=<?=($page+1 == $totalpage) ? $totalpage-1 : $page+1;?>><svg xmlns="http://www.w3.org/2000/svg" width="41.678" height="20.942" viewBox="0 0 41.678 20.942"><path d="M41.4,11.138,31.93,20.61a.947.947,0,1,1-1.336-1.336l7.852-7.852H.947a.947.947,0,0,1,0-1.894h37.5L30.595,1.666A.947.947,0,1,1,31.93.33L41.4,9.8a.947.947,0,0,1,0,1.335" transform="translate(0 0.001)" fill="#183A64"/></svg></button>
        
        <?php endif; ?>
      </div>
    </div>
  <?php else : ?>
    <div class="no-results">
      <h4>No matching articles found</h4>
    </div>
  <?php endif;

  echo ob_get_clean();
  die();
}

add_action( 'wp_ajax_getproducts', 'getproducts' );
add_action( 'wp_ajax_nopriv_getproducts', 'getproducts' );
function getproducts() {
  
  $page         = $_POST['page'];
  $s            = $_POST['s'];
  $producttype  = $_POST['producttype'];
  $cats         = $_POST['cats'];
  $display_num  = 12;
  
  $tax_q = array('relation'=>'AND');
  
  $args = array(
    'post_type'       => 'product',
    'posts_per_page'  => -1,
    's'               => $s,
    'post_status '    => array('publish')
  );
  
  array_push($tax_q, array(
    'taxonomy' => 'product_type',
    'field' => 'slug',
    'terms' => $producttype
  ));
  
  if( !empty($cats) ) {
    foreach( $cats as $cat ) {
      array_push($tax_q, array(
        'taxonomy' => $cat['taxname'],
        'field' => 'slug',
        'terms' => $cat['taxterm']
      ));
    }
  }
  
  $args['tax_query'] = $tax_q;
  
  $result = new WP_Query( $args );
  $listings_found = count($result->posts);
  $totalpage = ceil($listings_found/$display_num);
  $new_search = array_slice($result->posts, ($page*$display_num), $display_num);
  
  ob_start();
    if( !empty($new_search) ) : ?>

      <?php foreach( $new_search as $obj ) : 
      $pid = $obj->ID;
      $title = get_the_title($obj);
      $perm = get_the_permalink($obj);
      $img = getFeaturedImage($obj);
      $pcode = get_field('product_code', $pid);
      ?>
      <div class="product__card">
        <?php if( !empty( $pcode ) ) : ?>
        <span class="small__text"><?= $pcode; ?></span>
        <?php endif; ?>
        <h4 class="product__name"><?= $title; ?></h4>
        <span class="img_wrap">
          <img <?= acf_responsive_image($img['id'], '', '300px', true); ?> alt="<?= $img['alt']; ?>"/>
        </span>
        <div class="bot__wrap">
          <?php
          button(
            array(
            'button_style'=>'solidgradient',
            'button_size'=>'default',
            'button_arrow'=>1,
            'button_custom_class'=>'',
            'button_link'=>
              array(
                'url'=>$perm,
                'title'=>'learn more',
                'target'=>''
              )
            )
          );
          button(
            array(
            'button_style'=>'outline',
            'button_size'=>'default',
            'button_arrow'=>1,
            'button_custom_class'=>'quoteBtn',
            'button_link'=>
              array(
                'url'=>'#',
                'title'=>'Get a quote',
                'target'=>''
              )
            )
          );  
          ?>
        </div>
      </div>
      <?php endforeach; ?>
    <span class="ajaxloader"></span>
    <?php if( $page+1 < $totalpage ) : ?>
    <a class="loadmore" data-page="<?=$page+1?>">Load more</a>
    <?php endif; ?>

  <?php else : ?>
  <div class="no-results">
    <h4>No matching products found</h4>
  </div>
  <?php endif; ?>

  <?php echo ob_get_clean();
  die();
}

