<?php $layoutName = 'product_child_split_view' ?>
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

$leftBG = $data->left_background_color;
$rightBG = $data->right_background_color;
$leftImg = $data->left_image;
$rightImg = $data->right_image;

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
  
<div class="row row__full row--splitview">
  <div class="columns">
    <div class="column column_1 column__first" style="background-color:<?=$leftBG?>;">
      <span class="img_wrap to_parallax_scroll to_parallax_bottom">
        <img <?= acf_responsive_image($leftImg['id'], '', '662', $lazyload); ?> alt="<?= $leftImg['alt']; ?>"/>
      </span>
    </div>
    <div class="column column_1 column__last" style="background-color:<?=$rightBG?>;">
      <span data-speed="0.3" class="img_wrap to_parallax_scroll">
        <img <?= acf_responsive_image($rightImg['id'], '', '662', $lazyload); ?> alt="<?= $rightImg['alt']; ?>"/>
      </span>
    </div>
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>