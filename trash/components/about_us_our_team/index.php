<?php $layoutName = 'about_us_our_team' ?>
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

$presentation = $data->presentation;
$team = $data->our_team;

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
  
<div class="row row--narrow row--team to_animate">
  
  <div class="team__wrapper team__wrapper--<?= $presentation; ?>">
    
    <?php foreach( $team as $m ) : ?>
    <div class="member">
      
      <div class="front" style="background-color:<?= (!empty($m['box_color'])) ? $m['box_color'] : '' ?>">
        <div class="img_wrap">
          <?php if( !empty($m['avatar']) ) : ?>
          <img <?= acf_responsive_image($m['avatar']['id'], '', '415px', $lazyload); ?> alt="<?= $m['avatar']['alt']; ?>"/>
          <?php endif; ?>
        </div>
        <div class="info">
          <label class="name"><?= $m['name']; ?></label>
          <?php if( !empty($m['position']) ) : ?>
          <span class="position"><?= $m['position']; ?></span>
          <?php endif; ?>
        </div>
      </div>
      
      <div class="hover" style="background-color:<?= (!empty($m['box_hover_color'])) ? $m['box_hover_color'] : '' ?>">
        <div class="info">
          <label class="name"><?= $m['name']; ?></label>
          <?php if( !empty($m['position']) ) : ?>
          <span class="position"><?= $m['position']; ?></span>
          <?php endif; ?>
        </div>
        <span class="line"></span>
        <div class="bio">
          <?= $m['bio']; ?>
        </div>
      </div>
      
    </div>
    <?php endforeach; ?>
    
  </div>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>