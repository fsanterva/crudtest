<?php $layoutName = 'featured_products_grid' ?>
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

$auto_data = $data->data;
$ctabtn = $data->browse_all_button;
$btnLayout = $data->button_layout;
$getaquotetext = ( !empty($data->get_a_quote_text) ) ? $data->get_a_quote_text : 'Get a quote';

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
  
<div class="row row--narrow to_animate">
  <div class="featured__products_grid">
    <?php if( $auto_data ) : 
    $enableFeaturedBlock = $data->enable_featured_block;
    $featProductsAuto = $data->featured_products_auto;
    ?>

      <?php foreach( $featProductsAuto as $key=>$prod ) : 
        $pid = $prod->ID;
        $title = $prod->post_title;
        $image = getFeaturedImage($pid);
        $perm = get_the_permalink($pid);
        $pcode = get_field('product_code', $pid);
        $ptagline = get_field('product_tagline', $pid);
        $pdesc = get_field('product_short_description', $pid);
        $pcat = get_the_terms( $pid, 'product_type' );
//         $primary_term_name = yoast_get_primary_term( 'product_type', $pid );
        $primary_term_ID = get_post_meta( $pid, 'rank_math_primary_product_type', true );
        $primary_term_obj = get_term_by( 'id', $primary_term_ID, 'product_type');
        $primary_term_name = $primary_term_obj->name;
      ?>

        <?php if($key == 0) : ?>
        
          <?php if( $enableFeaturedBlock ) : ?>
          <div class="product__card product__card--featured to_animate">
            <div class="left">
              <?php if( !empty( $pcode ) ) : ?>
              <span class="small__text"><?= $pcode; ?></span>
              <?php endif; ?>
              <h4 class="product__name"><?= $title; ?></h4>
              <?php if( !empty( $ptagline ) ) : ?>
              <span class="product__tagline"><?= $ptagline; ?></span>
              <?php endif; ?>
              <?php if( !empty( $primary_term_name ) ) : ?>
              <span class="cat"><?= $primary_term_name; ?></span>
              <?php endif; ?>
            </div>
            <div class="mid">
              <img <?= acf_responsive_image($image['id'], '', '700px', $lazyload); ?> alt="<?= $image['alt']; ?>"/>
            </div>
            <div class="right">
              <?php if( !empty( $pdesc ) ) : ?>
              <div class="product__shortdesc">
                <?= $pdesc; ?>
              </div>
              <?php endif; ?>
              <?php button(
                      array(
                        'button_style'=>'solidgradient',
                        'button_size'=>'default',
                        'button_arrow'=>1,
                        'button_custom_class'=>'',
                        'button_link'=>
                          array(
                            'url'=>$perm,
                            'title'=>'learn more',
                            'target'=>''
                          )
                        )); ?>
              <span class="cat"><?= $primary_term_name ?></span>
            </div>
          </div>
          <?php else : ?>
          <div class="product__card">
            <?php if( !empty( $pcode ) ) : ?>
            <span class="small__text"><?= $pcode; ?></span>
            <?php endif; ?>
            <h4 class="product__name"><?= $title; ?></h4>
            <span class="img_wrap">
              <img <?= acf_responsive_image($image['id'], '', '400px', $lazyload); ?> alt="<?= $image['alt']; ?>"/>
            </span>
            <div class="bot__wrap <?= ($btnLayout == 'default') ? '' : 'doubleBtn' ?>">
              <?php if( $btnLayout == 'default' ) : ?><span class="cat"><?= $primary_term_name; ?></span><?php endif; ?>
              <?php button(
                array(
                  'button_style'=>'solidgradient',
                  'button_size'=>'default',
                  'button_arrow'=>1,
                  'button_custom_class'=>'',
                  'button_link'=>
                    array(
                      'url'=>$perm,
                      'title'=>'learn more',
                      'target'=>''
                    )
                  )); ?>
              <?php if( $btnLayout == 'twobuttons' ) :
              button(
                array(
                  'button_style'=>'outline',
                  'button_size'=>'default',
                  'button_arrow'=>1,
                  'button_custom_class'=>'quoteBtn',
                  'button_link'=>
                    array(
                      'url'=>'#',
                      'title'=>$getaquotetext,
                      'target'=>''
                    )
                  ));
              endif; ?>
            </div>
          </div>
          <?php endif; ?>

        <?php else : ?>

        <div class="product__card">
          <?php if( !empty( $pcode ) ) : ?>
          <span class="small__text"><?= $pcode; ?></span>
          <?php endif; ?>
          <h4 class="product__name"><?= $title; ?></h4>
          <span class="img_wrap">
            <img <?= acf_responsive_image($image['id'], '', '400px', $lazyload); ?> alt="<?= $image['alt']; ?>"/>
          </span>
          <div class="bot__wrap <?= ($btnLayout == 'default') ? '' : 'doubleBtn' ?>">
            <?php if( $btnLayout == 'default' ) : ?><span class="cat"><?= $primary_term_name; ?></span><?php endif; ?>
            <?php button(
                array(
                  'button_style'=>'solidgradient',
                  'button_size'=>'default',
                  'button_arrow'=>1,
                  'button_custom_class'=>'',
                  'button_link'=>
                    array(
                      'url'=>$perm,
                      'title'=>'learn more',
                      'target'=>''
                    )
                  )); ?>
            <?php if( $btnLayout == 'twobuttons' ) :
            button(
                array(
                  'button_style'=>'outline',
                  'button_size'=>'default',
                  'button_arrow'=>1,
                  'button_custom_class'=>'quoteBtn',
                  'button_link'=>
                    array(
                      'url'=>'#',
                      'title'=>$getaquotetext,
                      'target'=>''
                    )
                  ));
            endif; ?>
          </div>
        </div>

        <?php endif; ?>

      <?php endforeach; ?>
    
    <?php else : ?>
      <?php
      $mainFeatProductsManual = $data->main_featured_products_manual;
      $gridFeatProductsManual = $data->grid_featured_products_manual;

      if( $mainFeatProductsManual['show_in_frontend'] ) : ?>
      <div class="product__card product__card--featured to_animate">
        <div class="left">
          <?php if( !empty( $mainFeatProductsManual['product_code'] ) ) : ?>
          <span class="small__text"><?= $mainFeatProductsManual['product_code']; ?></span>
          <?php endif; ?>
          <h4 class="product__name"><?= $mainFeatProductsManual['product_name']; ?></h4>
          <?php if( !empty( $mainFeatProductsManual['product_tagline'] ) ) : ?>
          <span class="product__tagline"><?= $mainFeatProductsManual['product_tagline']; ?></span>
          <?php endif; ?>
          <?php if( !empty( $mainFeatProductsManual['product_type'] ) ) : ?>
          <span class="cat"><?= $mainFeatProductsManual['product_type']; ?></span>
          <?php endif; ?>
        </div>
        <div class="mid">
          <img <?= acf_responsive_image($mainFeatProductsManual['product_image']['id'], '', '700px', $lazyload); ?> alt="<?= $mainFeatProductsManual['product_image']['alt']; ?>"/>
        </div>
        <div class="right">
          <?php if( !empty( $mainFeatProductsManual['product_description'] ) ) : ?>
          <div class="product__shortdesc">
            <?= $mainFeatProductsManual['product_description']; ?>
          </div>
          <?php endif; ?>
          <?php button($mainFeatProductsManual['site_button']); ?>
          <span class="cat"><?= $primary_term_name ?></span>
        </div>
      </div>
      <?php endif; ?>
      <?php foreach($gridFeatProductsManual as $gridProd) : ?>
      <div class="product__card">
        <?php if( !empty( $gridProd['product_code'] ) ) : ?>
        <span class="small__text"><?= $gridProd['product_code']; ?></span>
        <?php endif; ?>
        <h4 class="product__name"><?= $gridProd['product_name']; ?></h4>
        <span class="img_wrap">
          <img <?= acf_responsive_image($gridProd['product_image']['id'], '', '400px', $lazyload); ?> alt="<?= $gridProd['product_image']['alt']; ?>"/>
        </span>
        <div class="bot__wrap <?= ($btnLayout == 'default') ? '' : 'doubleBtn' ?>">
          <?php if( $btnLayout == 'default' ) : ?><span class="cat"><?= $gridProd['product_type']; ?></span><?php endif; ?>
          <?php button($gridProd['site_button']); ?>
          <?php if( $btnLayout == 'twobuttons' ) :
          button(
              array(
                'button_style'=>'outline',
                'button_size'=>'default',
                'button_arrow'=>1,
                'button_custom_class'=>'quoteBtn',
                'button_link'=>
                  array(
                    'url'=>'#',
                    'title'=>$getaquotetext,
                    'target'=>''
                  )
                ));
          endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    
    <?php endif; ?>
  </div>
  <?php if( !empty( $ctabtn ) ) : ?>
  <a class="loadmore" href="<?= $ctabtn['url'] ?>" target="<?= $ctabtn['target'] ?>"><?= $ctabtn['title']; ?></a>
  <?php endif; ?>
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>