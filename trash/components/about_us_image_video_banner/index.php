<?php $layoutName = 'about_us_image_video_banner' ?>
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

$mediaType = $data->media_type;
$img = $data->image;
$vid = $data->video_url;
$smlText = $data->small_text;
$mainText = $data->main_text;
$maintag = $data->heading_tags;

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
      <span class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></span>
      <?php else : ?>
      <<?= $tag; ?> class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></<?= $tag; ?>>
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
  
<div class="row row--media">
  <div class="imagevideo__block media__type_<?=$mediaType;?>">
    <span class="img_wrap to_parallax_bg">
      <img <?= acf_responsive_image($img['id'], '', '', $lazyload); ?> alt="<?= $img['alt']; ?>"/>
    </span>
    <div class="info">
      <label class="small__text"><?= $smlText; ?></label>
      <?php if( $maintag == 'default' ) : ?>
      <span class="headline__text heading2"><?= $mainText; ?></span>
      <?php else : ?>
      <<?= $maintag; ?> class="headline__text heading2"><?= $mainText; ?></<?= $maintag; ?>>
      <?php endif; ?>
      <?php if($mediaType == 'video') : ?>
      <button class="play__button">
        <svg xmlns="http://www.w3.org/2000/svg" width="25.348" height="28.912" viewBox="0 0 25.348 28.912"><path d="M587.166,3749.5a2,2,0,0,1,0,3.455l-21.348,12.453a2,2,0,0,1-3.008-1.728v-24.906a2,2,0,0,1,3.008-1.728Z" transform="translate(-562.81 -3736.773)"/></svg>
        <span class="text">Play video</span>
      </button>
      <?php endif; ?>
    </div>
    <?php if($mediaType == 'video') : ?>
    <iframe class="video__frame" data-src="<?=$vid;?>" controls=0 rel=0 modestbranding allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php endif; ?>
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>