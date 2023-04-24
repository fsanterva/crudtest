<?php $layoutName = 'product_child_content_features' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$showContent = $data->show_content_block;
$col1 = $data->column_1;
$col1_image = $col1['image'];
$col2 = $data->column_2;
$smallText = $col2['small_text'];
$headlineText = $col2['headline_text'];
$tag = $col2['heading_tags'];
$text_summary = $col2['text_summary'];
$button = $col2['site_button'];
$featList = $data->feature_list;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row__full">
  
  <div class="columns">
    
    <div class="column column_1 column__first to_parallax_scroll to_parallax_right">
      <?php if( !empty($col1_image) ) : ?>
      <span class="img__wrap">
        <img <?= acf_responsive_image($col1_image['id'], '', '1100px', $lazyload); ?> alt="<?= $col1_image['alt']; ?>"/>
      </span>
      <?php endif; ?>
    </div>
    
    <div class="column column_2 column__last to_animate">
      <?php if( !empty($smallText) ) : ?>
      <label class="small__text"><?= $smallText; ?></label>
      <?php endif; ?>
      
      <?php if( $tag == 'default' ) : ?>
      <span class="headline__text heading2"><?= formattedHeadline($headlineText); ?></span>
      <?php else : ?>
      <<?= $tag; ?> class="headline__text heading2"><?= formattedHeadline($headlineText); ?></<?= $tag; ?>>
      <?php endif; ?>
        
      <?php if( !empty($text_summary) ) : ?>
      <div class="text__summary">
      <?= $text_summary; ?>
      </div>
      <?php endif; ?>
    
      <?php if( !empty($button['button_link']) ) : ?>
      <?php button($button); ?>
      <?php endif; ?>
    </div>
    
  </div>
  
</div>

<div class="row row--narrow row--feature_list">
  <?php foreach($featList as $feat) : ?>
  <div class="feature to_animate">
    <span class="img_wrap" style="background-color:<?= (!empty($feat['feature_box_color'])) ? $feat['feature_box_color'] : '#FFFFFF' ?>">
      <img <?= acf_responsive_image($feat['feature_icon']['id'], '', '100px', $lazyload); ?> alt="<?= $feat['feature_icon']['alt']; ?>"/>
    </span>
    <?php if( !empty($feat['feature_name']) ) : ?>
    <span class="name"><?= $feat['feature_name']; ?></span>
    <?php endif; ?>
  </div>
  <?php endforeach; ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>