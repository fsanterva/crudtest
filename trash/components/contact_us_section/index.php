<?php $layoutName = 'contact_us_section' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$description = $data->text_summary;
$form = $data->forminator_shortcode;
$contactInfo = $data->contact_info;
$map = $data->map;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row">
  
  <div class="columns form__block to_animate">
    
    <div class="column column1 column__first">
      <?php if( $tag == 'default' ) : ?>
      <span class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></span>
      <?php else : ?>
      <<?= $tag; ?> class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></<?= $tag; ?>>
      <?php endif; ?>
        
      <?php if( !empty($description) ) : ?>
        <div class="text__summary"><?= $description; ?></div>
      <?php endif; ?>
    </div>
    
    <div class="column column2 column__last">
      <?= do_shortcode($form); ?>
    </div>
    
  </div>
  
  <?php if( $contactInfo ) : 
  $phone = get_field('phone','option');
  $email = get_field('email','option');
  $address = get_field('address','option');
  $gmap_url = get_field('google_map_url', 'option');
  $mapImg = get_field('google_map_image','option');
  ?>
  <div class="info__block to_animate">
    <?php if( !empty( $phone ) ) : ?>
    <div class="info">
      <span>Give us a call</span>
      <a href="tel:<?= $phone ?>"><?= $phone; ?></a>
    </div>
    <?php endif; ?>
    
    <?php if( !empty( $email ) ) : ?>
    <div class="info">
      <span>Send us an email</span>
      <a href="mailto:<?= $email ?>"><?= $email; ?></a>
    </div>
    <?php endif; ?>
    
    <?php if( !empty( $address ) ) : ?>
    <div class="info">
      <span>VISIT OUR OFFICE</span>
      <a href="<?= (!empty($gmap_url)) ? $gmap_url : '' ?>" target="_blank" rel="noopener noreferrer"><?= $address; ?></a>
    </div>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  
  <?php if( $map ) : ?>
  <div class="map__block to_animate">
    <span class="img__wrap">
      <a href="<?= (!empty($gmap_url)) ? $gmap_url : '' ?>" target="_blank" rel="noopener noreferrer"><img data-src="<?= (!empty($mapImg)) ? $mapImg['url'] : '' ?>"/></a>
    </span>
  </div>
  <?php endif; ?>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>