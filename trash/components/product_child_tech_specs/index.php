<?php $layoutName = 'product_child_tech_specs' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinelayout = $data->heading_tab_headline_layout;
$show = $data->heading_tab_show_on_frontend;
$smalltext = $data->heading_tab_headline_small_text;
$headlinetext = $data->heading_tab_headline_text;
$tag = $data->heading_tab_heading_tags;
$description = $data->heading_tab_headline_description;
$cta = $data->heading_tab_site_button;

$specs = $data->tech_specs;
$bottomCTA = $data->site_button;

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
  
<div class="row row--narrow row-specslist">
  <?php foreach( $specs as $spec ) : ?>
  <div class="spec__category to_animate">
    <label class="name"><?= $spec['spec_name']; ?></label>
    <div class="spec__list">
      <?php foreach( $spec['spec_list'] as $item ) : ?>
      <div class="item">
        <span class="label"><?= $item['label']; ?></span>
        <span class="value"><?= $item['value']; ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endforeach; ?>
  <?php button($bottomCTA); ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>