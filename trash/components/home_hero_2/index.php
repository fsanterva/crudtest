<?php $layoutName = 'home_hero_2' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$scrolldown = $data->scroll_down;
$headlinetext = $data->headline_text;
$shortSummary = $data->short_summary;
$button = $data->site_button;
$bg = $data->background;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row">
  
  <div class="banner_slider">
    <div class="block__left">
      <h1 class="headline__text"><?= formattedHeadline($headlinetext); ?></h1>

      <div class="info">
        <?php if( !empty($shortSummary) ) : ?>
        <div class="short__summary"><?= $shortSummary; ?></div>
        <?php endif; ?>

        <?php if( !empty($button['button_link']) ) : ?>
        <?php button($button); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
  <?php if( $scrolldown ) : ?>
  <button class="scrolldown">
    <span class="text">Scroll down</span>
    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20.088" height="24.949" viewBox="0 0 20.088 24.949"><path d="M96.088,837.979l-1.631-1.63L87.2,843.6V823.06H84.89V843.6l-7.259-7.249L76,837.979l10.044,10.03Z" transform="translate(-76 -823.06)"/></svg></span>
  </button>
  <?php endif; ?>
  
</div>
<div class="row row--bg">
  <div class="background__slider">
    <?php if( !empty($bg) ) : ?>
    <?php foreach( $bg as $a ) : ?>
    <span class="img__wrap">
      <img <?= acf_responsive_image($a['id'], '', '', $lazyload); ?> alt="<?= $a['alt']; ?>"/>
    </span>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>