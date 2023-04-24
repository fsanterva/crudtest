<?php $layoutName = 'industries_carousel' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinelayout = $data->headline_layout;
$show = $data->show_on_frontend;
$smalltext = $data->headline_small_text;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$description = $data->headline_description;
$cta = $data->site_button;
$carousel = $data->industries_carousel;

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
  
<div class="row row__full to_animate">
  <div class="industries__slider">
    <?php foreach($carousel as $key=>$slide) : ?>
    <div class="card">
      
      <div class="info">
        <label class="small__text"><?= ($key+1 < 10) ? '0'.$key+1 : $key+1; ?></label>
        <h4 class="name"><?= $slide['name']; ?></h4>
      </div>
      <span class="img_wrap">
        <img <?= acf_responsive_image($slide['image']['id'], '', '450px', $lazyload); ?> alt="<?= $slide['image']['alt']; ?>"/>
      </span>
      <?php if( !empty( $slide['link'] ) ) : ?>
        <a class="link__icon" href="<?= $slide['link']['url']; ?>" target="<?= $slide['link']['target']; ?>"><?= $slide['link']['title']; ?></a>
        <a class="link-to-post" href="<?= $slide['link']['url']; ?>" target="<?= $slide['link']['target']; ?>"></a>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>