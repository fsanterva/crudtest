<?php $layoutName = 'product_comparison_table' ?>
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

$labelGrp = $data->label_group;
$products = $data->products_to_compare;

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
  
<div class="row row--narrow row--comparisontable to_animate">
  
<!--  NEW  -->
  <div class="comparisontable__wrap">
    
    <div class="labels__wrap">
      <label><?= $labelGrp['top_left_label'] ?></label>
      <div class="labels">
        <?php foreach( $labelGrp['table_labels'] as $key=>$label ) : ?>
        <span data-count="data_<?= $key; ?>"><?= $label['label']; ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    
    <div class="slider__wrap">
      
      <?php foreach( $products as $key=>$prod ) : 
        $productID = $prod['product']->ID;
        $title = get_the_title($productID);
        $perm = get_permalink($productID);
        $img = getFeaturedImage($productID);
        $learnMore = $prod['learn_more_button'];
        $tableData = $prod['table_data'];
        ?>
        <div class="item">
          
          <div class="product__item">
            <span class="img__wrap">
              <img <?= acf_responsive_image($img['id'], '', '140px', $lazyload); ?> alt="<?= $img['alt']; ?>"/>
            </span>
            <span class="title"><?= $title; ?></span>
            <?php if( $learnMore ) : ?>
            <?php button(array(
              'button_style'=>'solidgradient',
              'button_size'=>'default',
              'button_arrow'=>1,
              'button_custom_class'=>'',
              'button_link'=>array(
                'url'=>$perm,
                'title'=>'Learn more',
                'target'=>''
              )
            )); ?>
            <?php endif; ?>
          </div>
          
          <div class="specs__list">
            <?php foreach( $tableData as $key2=>$data ) : ?>
            <span data-count="data_<?= $key2; ?>" class="spec"><?= $data['data']; ?></span>
            <?php endforeach; ?>
          </div>
          
          <div class="foot__cta">
            <?php if( $prod['enable_get_a_quote'] ) : ?>
            <?php button(
                array(
                  'button_style'=>'outline',
                  'button_size'=>'default',
                  'button_arrow'=>1,
                  'button_custom_class'=>'quoteBtn',
                  'button_link'=>array(
                    'url'=>'#',
                    'title'=>'Get a quote',
                    'target'=>''
                  )
                )
              ); ?>
            <?php endif; ?>
          </div>
          
        </div>
        <?php endforeach; ?>
      
    </div>
    
  </div>
  
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>