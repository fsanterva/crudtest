<?php $layoutName = 'product_child_banner' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;

$postTitle = get_the_title(get_the_ID());
$postFeatImg = getFeaturedImage(get_the_ID());
$postShortDesc = get_field('product_short_description', get_the_ID());

$prodName = $data->product_name;
$tag = $data->heading_tags;
$prodImage = $data->product_image;
$prodDesc = $data->product_description;
$boxBG = $data->content_box_background_color;
$cta = $data->site_button;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row" style="background-color:<?= (!empty($boxBG)) ? $boxBG : '' ?>">
  <div class="info to_animate">
    <?php if( $tag == 'default' ) : ?>
    <span class="headline__text"><?= (!empty($prodName)) ? $prodName : $postTitle; ?></span>
    <?php else : ?>
    <<?= $tag; ?> class="headline__text"><?= (!empty($prodName)) ? $prodName : $postTitle; ?></<?= $tag; ?>>
    <?php endif; ?>
    <div class="text__summary"><?= (!empty($prodDesc)) ? $prodDesc : $postShortDesc; ?></div>
    <?php button($cta); ?>
  </div>
  <div data-speed="0.5" class="img_wrap to_parallax_mousemove">
    
    <?php if( !empty($prodImage) ) : ?>
    <img <?= acf_responsive_image($prodImage['id'], '', '1000px', $lazyload); ?> alt="<?= $prodImage['alt']; ?>"/>
    <?php else : ?>
    <img <?= acf_responsive_image($postFeatImg['id'], '', '1000px', $lazyload); ?> alt="<?= $postFeatImg['alt']; ?>"/>
    <?php endif; ?>
    
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>