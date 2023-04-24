<?php $layoutName = 'two_column_image_text' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$reverse = $data->reverse_rtl;
$col1 = $data->column_1;
$col2 = $data->column_2;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--narrow">
  <div class="columns <?= ($reverse) ? 'reverse' : '' ?>">
    <div class="column column1 column__first">
      <div class="media__wrapper <?= ($col1['media_type']) ? 'image' : 'video' ?> to_parallax_scroll">
        <?php if($col1['media_type']) : ?>
        <img <?= acf_responsive_image($col1['image']['id'], '', '853px', $lazyload); ?> alt="<?= $col1['image']['alt']; ?>"/>
        <?php else : ?>
        <img <?= acf_responsive_image($col1['video_poster']['id'], '', '853px', $lazyload); ?> alt="<?= $col1['video_poster']['alt']; ?>"/>
        <iframe class="video__frame" data-src="<?= $col1['video_link']; ?>"></iframe>
        <button class="play__button" aria-label="Video Play Button">
          <svg xmlns="http://www.w3.org/2000/svg" width="25.348" height="28.912" viewBox="0 0 25.348 28.912"><path d="M587.166,3749.5a2,2,0,0,1,0,3.455l-21.348,12.453a2,2,0,0,1-3.008-1.728v-24.906a2,2,0,0,1,3.008-1.728Z" transform="translate(-562.81 -3736.773)"/></svg>
        </button>
        <?php endif ?>
      </div>
    </div>
    <div class="column column2 column__last to_animate">
      <?php if( !empty($col2['headline_small_text']) ) : ?>
      <label class="small__text"><?= $col2['headline_small_text']; ?></label>
      <?php endif; ?>
      <h2 class="headline__text"><?= formattedHeadline($col2['headline_text']); ?></h2>
      <div class="text__summary">
        <?= $col2['text_summary']; ?>
      </div>
      <?php if( !empty($col2['site_button']['button_link']) ) : ?>
      <?php button($col2['site_button']); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>