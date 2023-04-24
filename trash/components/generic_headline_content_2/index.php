<?php $layoutName = 'generic_headline_content_2' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$smalltext = $data->small_text;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$textContent1 = $data->text_content_1;
$textContent2 = $data->text_content_2;
$image1 = $data->image_1;
$image2 = $data->image_2;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--heading row--narrow">
  
  <div class="block_1 to_animate">
    <?php if( !empty($smalltext) ) : ?>
    <label class="small__text"><?= $smalltext; ?></label>
    <?php endif; ?>
    <?php if( $tag == 'default' ) : ?>
    <span class="headline__text heading2"><?= formattedHeadline($headlinetext); ?></span>
    <?php else : ?>
    <<?= $tag; ?> class="headline__text heading2"><?= formattedHeadline($headlinetext); ?></<?= $tag; ?>>
    <?php endif; ?>
  </div>
  <div class="block_2 to_animate">
    <?php if( !empty($textContent1) ) : ?>
    <div class="text_1"><?= $textContent1; ?></div>
    <?php endif; ?>
    <?php if( !empty($textContent2) ) : ?>
    <div class="text_2"><?= $textContent2; ?></div>
    <?php endif; ?>
  </div>
  <div class="block_3 to_animate">
    <?php if( !empty($image1) ) : ?>
    <div class="img_1 to_parallax_bg">
      <img <?= acf_responsive_image($image1['id'], '', '850px', $lazyload); ?> alt="<?= $image1['alt']; ?>"/>
    </div>
    <?php endif; ?>
    <?php if( !empty($image2) ) : ?>
    <div class="img_2 to_parallax_bg">
      <img <?= acf_responsive_image($image2['id'], '', '600px', $lazyload); ?> alt="<?= $image2['alt']; ?>"/>
    </div>
    <?php endif; ?>
  </div>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>