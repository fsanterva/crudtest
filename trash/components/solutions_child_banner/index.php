<?php $layoutName = 'solutions_child_banner' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$text_summary = $data->text_summary;
$col1 = $data->column_1;
$col2 = $data->column_2;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--narrow row--heading to_animate">
  
  <?php if( $tag == 'default' ) : ?>
  <span class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></span>
  <?php else : ?>
  <<?= $tag; ?> class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></<?= $tag; ?>>
  <?php endif; ?>
    
  <?php if( !empty( $text_summary ) ) : ?>
  <div class="text__summary"><?= $text_summary; ?></div>
  <?php endif; ?>
    
</div>

<div class="row row--content to_animate">
  
  <div class="columns">
    
    <div class="column column1 column__first">
      <?php if( !empty( $col1['small_text'] ) ) : ?>
      <label class="small__text"><?= $col1['small_text']; ?></label>
      <?php endif; ?>
      
      <?php if( $col1['heading_tags'] == 'default' ) : ?>
      <span class="headline__text heading2"><?= $col1['headline_text']; ?></span>
      <?php else : ?>
      <<?= $col1['heading_tags']; ?> class="headline__text heading2"><?= $col1['headline_text']; ?></<?= $col1['heading_tags']; ?>>
      <?php endif; ?>
        
      <?php if( !empty( $col1['text_summary'] ) ) : ?>
        <div class="text__summary"><?= $col1['text_summary']; ?></div>
      <?php endif; ?>
    
      <?php if( !empty( $col1['site_button']['button_link'] ) ) : ?>
      <?php button($col1['site_button']); ?>
      <?php endif; ?>
    </div>
    
    <div class="column column2 column__last">
      <span class="img__wrap to_parallax_bg">
        <img <?= acf_responsive_image($col2['image']['id'], '', '958px', $lazyload); ?> alt="<?= $col2['image']['alt']; ?>"/>
      </span>
    </div>
    
  </div>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>