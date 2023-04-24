<?php $layoutName = 'landing_page_banner' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$description = $data->text_summary;
$cta = $data->site_button;

$enableCarousel = $data->enable_carousel;
$images = $data->carousel_images;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row__full">
  
  <div class="columns">
    
    <div class="column column_1 column__first">
      <?php if( $tag == 'default' ) : ?>
      <span class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></span>
      <?php else : ?>
      <<?= $tag; ?> class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></<?= $tag; ?>>
      <?php endif; ?>
        
      <?php if( !empty($description) ) : ?>
        <div class="text__summary"><?= $description; ?></div>
      <?php endif; ?>
      <?php if( !empty($cta['button_link']) ) : ?>
        <?php button($cta); ?>
      <?php endif; ?>
    </div>
    
    <div class="column column_2 column__last">
      <?php if( $enableCarousel && count($images) != 0 ) : ?>
      
      <div class="carousel__wrapper">
        <?php foreach( $images as $img ) : ?>
        <div class="item">
          <img <?= acf_responsive_image($img['id'], '', '600px', $lazyload); ?> alt="<?= $img['alt']; ?>"/>
        </div>
        <?php endforeach; ?>
      </div>
      
      <?php endif; ?>
    </div>
    
  </div>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>