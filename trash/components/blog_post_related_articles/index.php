<?php $layoutName = 'blog_post_related_articles' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinelayout = $data->heading_tab_headline_layout;
$show = $data->heading_tab_show_on_frontend;
$smalltext = $data->heading_tab_headline_small_text;
$headlinetext = $data->heading_tab_headline_text;
$tag = $data->heading_tab_heading_tags;
$description = $data->heading_tab_headline_description;
$cta = $data->heading_tab_site_button;

$feed = $data->feed;
$pid = get_the_ID();
$primary_term_name = yoast_get_primary_term( 'category', $pid );

$mainCTA = $data->site_button;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<?php if( $show ) : ?>
<div class="row row--heading row--narrow layout_<?=$headlinelayout?> to_animate">
  
  <?php if( !empty($smalltext) ) : ?>
  <label class="small__text"><?= $smalltext; ?></label>
  <?php endif; ?>
  
  <div class="columns">
    <div class="column column1 column__first">
      <?php if( $tag == 'default' ) : ?>
      <span class="headline__text heading2"><?= formattedHeadline($headlinetext); ?></span>
      <?php else : ?>
      <<?= $tag; ?> class="headline__text heading2"><?= formattedHeadline($headlinetext); ?></<?= $tag; ?>>
      <?php endif; ?>
    </div>
      
    <?php if( !empty($description) || !empty($cta) ) : ?>
    <div class="column column2 column__last">
    <?php if( !empty($description) ) : ?>
      <div class="description"><?= $description; ?></div>
    <?php endif; ?>
    <?php if( !empty($cta['button_link']) ) : ?>
      <?php button($cta); ?>
    <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
  
</div>
<?php endif; ?>
  
<div class="row row--narrow row--relatedarticles">
  <div  class="articles__wrapper">
  <?php if( $feed == 'auto' ) : //IF AUTO
    $myargs = array(
      'post_type'       => 'post',
      'posts_per_page'  => -1,
      'post_status '    => array('publish'),
      'category_name'   => $primary_term_name
    );
    $result = new WP_Query( $myargs );
    $new_search = array_slice($result->posts, 0, 3);
  ?>
  
    <?php foreach( $new_search as $obj ) : 
  //   $id = $obj->ID;
    $featImg = getFeaturedImage($obj);
    $title = get_the_title($obj);
    $perm = get_the_permalink($obj);
    $excerpt = get_the_excerpt($obj);
    $date = get_the_date('m.d.Y', $obj);
    ?>
      <div class="article">
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
            <img <?= acf_responsive_image($featImg['id'], '', '430px', $lazyload); ?> alt="<?= $featImg['alt']; ?>"/>
          </div>
          <a class="link__icon" href="<?= $perm; ?>">Read more</a>
        </div>
      </div>
    <?php endforeach; //END FOREACH AUTO ?>
    
  <?php else : // ELSEIF MANUAL
    $manualFeed = $data->manual_feed;
  ?>
    <?php foreach( $manualFeed as $id ) : 
    $featImg2 = getFeaturedImage($id);
    $title2 = get_the_title($id);
    $perm2 = get_the_permalink($id);
    $excerpt2 = get_the_excerpt($id);
    $date2 = get_the_date('m.d.Y', $id);
    ?>
    <div class="article">
      <a class="link-to-post" href="<?= $perm2; ?>"></a>
      <div class="top">
        <span class="date"><?= $date2; ?></span>
        <h4 class="title"><?= $title2; ?></h4>
      </div>
      <div class="bot">
        <div class="excerpt">
          <?= $excerpt2; ?>
        </div>
        <div class="img_wrap">
          <img <?= acf_responsive_image($featImg2['id'], '', '430px', $lazyload); ?> alt="<?= $featImg2['alt']; ?>"/>
        </div>
        <a class="link__icon" href="<?= $perm2; ?>">Read more</a>
      </div>
    </div>
    <?php endforeach; ?>
  
  <?php endif; //END IF FEED TYPE?>
    
  </div>
  <?php if( !empty($mainCTA['button_link']) ) : ?>
  <?php button($mainCTA); ?>
  <?php endif; ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>