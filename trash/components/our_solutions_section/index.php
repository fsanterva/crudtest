<?php $layoutName = 'our_solutions_section' ?>
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
$colnum = $data->number_of_columns;
$blurbs = $data->solutions_list;

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
      
    <?php if( !empty($description) || !empty($cta['button_link']) ) : ?>
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
  
<div class="row row--narrow to_animate">
  <div class="blurbs <?=$colnum;?>__columns">
    <?php foreach($blurbs as $key=>$blurb) : ?>
    <div class="blurb">
      <?php if( !empty( $blurb['icon'] ) ) : ?>
      <span class="blurb__icon">
        <img <?= acf_responsive_image($blurb['icon']['id'], '', '70px', $lazyload); ?> alt="<?= $blurb['icon']['alt']; ?>"/>
      </span>
      <?php endif; ?>
      <h4 class="blurb__name"><?= $blurb['name']; ?></h4>
      <div class="blurb__desc"><?= $blurb['short_description']; ?></div>
      <?php if( !empty( $blurb['site_button']['button_link'] ) ) : ?>
      <?php button($blurb['site_button']); ?>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>