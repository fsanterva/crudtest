<?php $layoutName = 'about_us_values' ?>
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

$btn = $data->site_button;
$blurbs = $data->blurbs;

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
  
<div class="row row--narrow row--blurbs">
  <div class="blurbs">
    
    <div class="blurb__row">
    <?php $i = 0; ?>
    <?php foreach( $blurbs as $key=>$blurb ) : ?>

      <div class="blurb">
        <span class="icon to_animate" style="background-color:<?= (!empty($blurb['blurb_icon_box_color'])) ? $blurb['blurb_icon_box_color'] : '' ?>">
          <img <?= acf_responsive_image($blurb['blurb_icon']['id'], '', '', $lazyload); ?> alt="<?= $blurb['blurb_icon']['alt']; ?>"/>
        </span>
        <div class="info to_animate">
          <div class="name"><?= $blurb['blurb_label']; ?></div>
          <div class="description">
            <?= $blurb['blurb_description']; ?>
          </div>
        </div>
      </div>
      
      <?php
      $i++;
      if ( $i % 2 == 0 && $i != count($blurbs) ) { 
        echo "</div><div class='blurb__row'>";
      }
      ?>
    
    <?php endforeach; ?>
    </div>
    
  </div>
  <?php if( !empty($btn['button_link']) ) : ?>
  <?php button($btn); ?>
  <?php endif; ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>