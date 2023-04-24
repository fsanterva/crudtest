<?php $layoutName = 'testimonials' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinelayout = $data->headline_layout;
$show = $data->show_on_frontend;
$headlineSmalltext = $data->headline_small_text;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$description = $data->headline_description;
$cta = $data->site_button;

$smalltext = $data->small_text;
$opts = $data->options;
$function = $data->data;
$autoTesti = get_field('testimonials', 'option');
$manualTesti = $data->manual_testimonial;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>
<?php if( $show ) : ?>
<div class="row row--heading row--narrow layout_<?=$headlinelayout?> to_animate">
  
  <?php if( !empty($headlineSmalltext) ) : ?>
  <label class="small__text"><?= $headlineSmalltext; ?></label>
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
  
<div class="row row--narrow row--slider <?= $opts ?> to_animate">
  <?php if( !empty( $smalltext ) ) : ?>
  <label class="small__text"><?= $smalltext; ?></label>
  <?php endif; ?>
  
  <?php if( $function == 'auto' ) : ?>
  
    <?php if(!empty( $autoTesti )) : ?>
  
    <div class="testimonial__slider">
      <?php foreach( $autoTesti as $a ) : ?>
      <div>
        <span class="review">"<?= $a['review']; ?>"</span>
        <span class="meta">
          <span class="name"><?= $a['name']; ?></span>
          <span class="company"><?= $a['company']; ?></span>
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  
    <?php endif; ?>
  
  <?php else : ?>
  
    <?php if(!empty( $manualTesti )) : ?>
  
    <div class="testimonial__slider">
      <?php foreach( $manualTesti as $a ) : ?>
      <div>
        <span class="review">"<?= $a['review']; ?>"</span>
        <span class="meta">
          <span class="name"><?= $a['name']; ?></span>
          <span class="company"><?= $a['company']; ?></span>
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  
    <?php endif; ?>
  
  <?php endif; ?>
</div>

<div class="row row--carousel <?= $opts ?> to_animate">
  <?php if( $function == 'auto') : ?>
  
    <?php if(!empty( $autoTesti )) : ?>
  
    <div class="testimonial__carousel">
      <?php foreach( $autoTesti as $a ) : ?>
      <div>
        <div class="stars">
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
        </div>
        <span class="review">"<?= $a['review']; ?>"</span>
        <span class="meta">
          <span class="name"><?= $a['name']; ?></span>
          <span class="company"><?= $a['company']; ?></span>
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  
    <?php endif; ?>
  
  <?php else : ?>
  
    <?php if(!empty( $manualTesti )) : ?>
  
    <div class="testimonial__carousel">
      <?php foreach( $manualTesti as $a ) : ?>
      <div>
        <div class="stars">
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
          <span><svg xmlns="http://www.w3.org/2000/svg" width="21.14" height="20.012" viewBox="0 0 21.14 20.012"><path d="M200.532,8763.988l3.266,6.587,7.3,1.057-5.285,5.127,1.248,7.241-6.533-3.419L194,8784l1.248-7.241-5.285-5.127,7.3-1.057Z" transform="translate(-189.962 -8763.988)"/></svg></span>
        </div>
        <span class="review">"<?= $a['review']; ?>"</span>
        <span class="meta">
          <span class="name"><?= $a['name']; ?></span>
          <span class="company"><?= $a['company']; ?></span>
        </span>
      </div>
      <?php endforeach; ?>
    </div>
  
    <?php endif; ?>
  
  <?php endif; ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>