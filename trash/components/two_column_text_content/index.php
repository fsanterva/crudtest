<?php $layoutName = 'two_column_text_content' ?>
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

$addImage = $data->add_image;
$image = $data->image;
$column1 = $data->column_1;
$column2 = $data->column_2;
$ctabtn = $data->site_button;

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

<?php if($addImage) : ?>
<div class="row row--narrow row--addonimage">
  <span class="img_wrap to_parallax_bg">
    <img <?= acf_responsive_image($image['id'], '', '1040px', $lazyload); ?> alt="<?= $image['alt']; ?>"/>
  </span>
</div>
<?php endif; ?>
  
<div class="row row--narrow row--content to_animate">
  <div class="columns">
    <?php if( !empty( $column1['headline'] ) || !empty( $column1['content'] ) ) : ?>
    <div class="column column1 column__first">
      <?php if( !empty( $column1['headline'] ) ) : ?>
        <?php if( $tag == 'default' ) : ?>
        <span class="heading heading3"><?= $column1['headline']; ?></span>
        <?php else : ?>
        <<?= $tag; ?> class="heading heading3"><?= $column1['headline']; ?></<?= $tag; ?>>
        <?php endif; ?>
      <?php endif; ?>
          
      <?php if( !empty( $column1['content'] ) ) : ?>
        <div class="content"><?= $column1['content'] ?></div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if( !empty( $column2['headline'] ) || !empty( $column2['content'] ) ) : ?>
    <div class="column column2 column__last">
      <?php if( !empty( $column2['headline'] ) ) : ?>
        <?php if( $tag == 'default' ) : ?>
        <span class="heading heading3"><?= $column2['headline']; ?></span>
        <?php else : ?>
        <<?= $tag; ?> class="heading heading3"><?= $column2['headline']; ?></<?= $tag; ?>>
        <?php endif; ?>
      <?php endif; ?>
          
      <?php if( !empty( $column2['content'] ) ) : ?>
        <div class="content"><?= $column2['content'] ?></div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
  <?php if( !empty( $ctabtn['button_link'] ) ) : ?>
  <?= button($ctabtn); ?>
  <?php endif; ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>