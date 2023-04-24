<?php $layoutName = 'our_clients' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$function = $data->data;
$our_clients_auto = get_field('our_clients', 'option');
$our_clients_manual = $data->our_clients_manual;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--narrow to_animate">
  
  <?php if( $function == 'auto' ) : ?>
  
  <div class="logo__wrapper">
    <?php foreach( $our_clients_auto as $logo ) : ?>
    <div class="logo">
      <span class="img_wrap">
        <img <?= acf_responsive_image($logo['id'], '', '200px', $lazyload); ?> alt="<?= $logo['alt']; ?>"/>
      </span>
    </div>
    <?php endforeach; ?>
  </div>
  
  <?php else : ?>
  
  <div class="logo__wrapper <?= ( count($our_clients_manual) > 7 ) ? 'carousel' : '' ?>">
    <?php foreach( $our_clients_manual as $logo ) : ?>
    <div class="logo">
      <span class="img_wrap">
        <img <?= acf_responsive_image($logo['id'], '', '200px', $lazyload); ?> alt="<?= $logo['alt']; ?>"/>
      </span>
    </div>
    <?php endforeach; ?>
  </div>
  
  <?php endif; ?>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>