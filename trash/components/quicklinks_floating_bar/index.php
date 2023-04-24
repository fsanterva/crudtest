<?php $layoutName = 'quicklinks_floating_bar' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$cta = $data->site_button;
$links = $data->quicklinks;
require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--narrow">
  
  <nav>
    <?php foreach( $links as $a ) : ?>
    <a href="#<?= strtolower( str_replace(' ','-',$a['section_component_target_id']) ); ?>"><?= $a['label']; ?></a>
    <?php endforeach; ?>
  </nav>
  
  <?php if( !empty($cta['button_link']) ) : ?>
  <?php button($cta); ?>
  <?php endif; ?>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>