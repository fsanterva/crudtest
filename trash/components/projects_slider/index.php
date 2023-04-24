<?php $layoutName = 'projects_slider' ?>
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

$sliderData = $data->projects_slider;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<?php if( $show ) : ?>
<div class="row row--heading row--narrow layout_<?=$headlinelayout?> to_animate">
  
  <label class="small__text"><?= $smalltext; ?></label>
  
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
  
<div class="row to_animate">
  <div class="project__slider">
    <?php foreach( $sliderData as $proj ) : ?>
    <div>
      <div class="info__column">
        <div class="block1">
          <h4 class="project__name"><?= $proj['project_name']; ?></h4>
          <?php if( !empty( $proj['project_location'] ) ) : ?>
          <span class="project__location"><?= $proj['project_location']; ?></span>
          <?php endif; ?>
          <?php if( !empty( $proj['project_link'] ) ) : ?>
          <a class="link__icon" href="<?= $proj['project_link']['url']; ?>" target="<?= $proj['project_link']['target']; ?>"><?= $proj['project_link']['title']; ?></a>
          <?php endif; ?>
        </div>
        <div class="block2">
          <div class="info_wrap info_wrap__first">
            <label><?= $proj['label_1']; ?></label>
            <div class="desc"><?= $proj['description_1'] ?></div>
          </div>
          <?php if( !empty( $proj['label_2'] ) || !empty( $proj['links'] ) ) : ?>
          <div class="info_wrap info_wrap__last">
            <?php if( !empty( $proj['label_2'] ) ) : ?>
            <label><?= $proj['label_2']; ?></label>
            <?php endif; ?>
            <?php if( !empty( $proj['links'] ) ) : ?>
            <div class="links">
              <?php foreach( $proj['links'] as $a ) : ?>
                <?php if( !empty( $a['link'] ) ) : ?>
                <a href="<?= $a['link']['url']; ?>" target="<?= $a['link']['target']; ?>"><?= $a['link']['title']; ?></a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="image__column to_parallax_bg">
        <img <?= acf_responsive_image($proj['project_image']['id'], '', '826px', $lazyload); ?> alt="<?= $proj['project_image']['alt']; ?>"/>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>