<?php $layoutName = 'home_hero_1' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$scrolldown = $data->scroll_down;
$bannerslider = $data->banner_slider;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row">
  
  <div class="banner_slider">
  <?php foreach( $bannerslider as $key=>$slide ) : ?>
    
    <div>
      
      <div class="block__left">
        <?php if( $key == 0 ) : ?>
        <h1 class="headline__text"><?= formattedHeadline($slide['block_1']['headline_text']); ?></h1>
        <?php else : ?>
        <span class="headline__text"><?= formattedHeadline($slide['block_1']['headline_text']); ?></span>
        <?php endif; ?>
        
        <div class="info">
          <?php if( !empty($slide['block_1']['slide_short_summary']) ) : ?>
          <div class="short__summary"><?= $slide['block_1']['slide_short_summary']; ?></div>
          <?php endif; ?>

          <?php //if( !empty($slide['block_1']['cta_button']) ) : ?>
          <?php //button($slide['block_1']['cta_button'], 1, ''); ?>
          <?php //endif; ?>
          
          <?php if( !empty($slide['block_1']['site_button']['button_link']) ) : ?>
          <?php button($slide['block_1']['site_button']); ?>
          <?php endif; ?>
        </div>
      </div>
      
      <div class="block__right">
        <div class="product__image">
          <img data-speed="0.5" class="to_parallax_mousemove" <?= acf_responsive_image($slide['block_2']['product_image']['id'], '', '750px', $lazyload); ?> alt="<?= $slide['block_2']['product_image']['alt']; ?>"/>
        </div>
        <div class="product__info">
          <label class="product__name"><?= $slide['block_2']['product_name']; ?></label>
          <p class="product__desc"><?= $slide['block_2']['product_description']; ?></p>
          <?php if( !empty($slide['block_2']['product_link']) ): ?>
          <a class="link__icon" href="<?= $slide['block_2']['product_link']['url']; ?>"><?= $slide['block_2']['product_link']['title']; ?></a>
          <?php endif; ?>
          <?php if( !empty($slide['block_2']['all_product_link']) ): ?>
          <a class="all__product" href="<?= $slide['block_2']['all_product_link']['url']; ?>"><?= $slide['block_2']['all_product_link']['title']; ?></a>
          <?php endif; ?>
        </div>
      </div>
      
    </div>
    
  <?php endforeach; ?>
  </div>
  
  <?php if( $scrolldown ) : ?>
  <button class="scrolldown">
    <span class="text">Scroll down</span>
    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20.088" height="24.949" viewBox="0 0 20.088 24.949"><path d="M96.088,837.979l-1.631-1.63L87.2,843.6V823.06H84.89V843.6l-7.259-7.249L76,837.979l10.044,10.03Z" transform="translate(-76 -823.06)"/></svg></span>
  </button>
  <?php endif; ?>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>