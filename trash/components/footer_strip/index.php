<?php $layoutName = 'footer_strip' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$col1 = $data->column_1;
$col2 = $data->column_2;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--narrow">
  <div class="content__wrap">
    
    <?php if( !empty( $col1['small_text'] ) ) : ?>
    <label class="small__text"><?= $col1['small_text']; ?></label>
    <?php endif; ?>
    
    <?php if( $col1['heading_tags'] == 'default' ) : ?>
    <span class="headline__text heading2"><?= formattedHeadline($col1['headline_text']); ?></span>
    <?php else : ?>
    <<?= $col1['heading_tags']; ?> class="headline__text heading2"><?= formattedHeadline($col1['headline_text']); ?></<?= $col1['heading_tags']; ?>>
    <?php endif; ?>
    
    <?php if( !empty( $col1['site_button']['button_link'] ) ) : ?>
    <?php button($col1['site_button']); ?>
    <?php endif; ?>
      
  </div>
  <?php if( !empty( $col2['image'] ) ) : ?>
  <div data-speed="0.3" class="image__wrap to_parallax_scroll to_parallax_left">
    <img <?= acf_responsive_image($col2['image']['id'], '', '1200px', $lazyload); ?> alt="<?= $col2['image']['alt']; ?>"/>
  </div>
  <?php endif; ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>