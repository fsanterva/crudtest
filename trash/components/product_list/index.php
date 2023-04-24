<?php $layoutName = 'product_list' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$text_summary = $data->text_summary;

$productTypeID = $data->product_type;
$productTypeObj = get_term( $productTypeID );
$productTypeSlug = $productTypeObj->slug;
$filters = $data->filters;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--narrow row--heading to_animate">
  
  <?php if( $tag == 'default' ) : ?>
  <span class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></span>
  <?php else : ?>
  <<?= $tag; ?> class="headline__text heading1"><?= formattedHeadline($headlinetext); ?></<?= $tag; ?>>
  <?php endif; ?>
    
  <?php if( !empty( $text_summary ) ) : ?>
  <div class="text__summary"><?= $text_summary; ?></div>
  <?php endif; ?>
    
</div>
<div class="row row--narrow row--productlist" data-productcat="<?=$productTypeSlug;?>">
  
  <div class="columns">
    
    <div class="column column1 column__first filter__block">
      <div class="inner__wrap">
        <label>Filters</label>
        <div class="searchField">
          <input type="text" id="searchProductFld" placeholder="Search Product"/>
          <button class="searchProductButton">
            <svg xmlns="http://www.w3.org/2000/svg" width="18.565" height="18.565" viewBox="0 0 18.565 18.565"><path d="M18.291,16.976,15.67,14.365a8.817,8.817,0,1,0-1.306,1.306l2.612,2.621a.926.926,0,0,0,1.31.005l.005-.005a.926.926,0,0,0,.005-1.31l-.005-.005M1.889,8.835a6.946,6.946,0,1,1,6.946,6.946A6.946,6.946,0,0,1,1.889,8.835Z" transform="translate(0 0)"/></svg>
          </button>
        </div>
        <div class="filter__list">
          <?php foreach( $filters as $filter ) : 
          $taxObj = get_taxonomy($filter);
          $taxName = $taxObj->labels->singular_name;

          $terms = get_terms( array(
            'taxonomy' => $filter,
            'hide_empty' => false
          ));
          ?>
          <div class="filter">
            <a class="name" data-val="<?=$filter;?>">
              <span class="text"><?=$taxName;?></span>
              <button class="toggleBtn">
                <span class="line1"></span>
                <span class="line2"></span>
              </button>
            </a>
            <ul>
              <li>
                <label>
                  <input type="radio" name="<?=$filter;?>" value=""/>
                  <span class="label">
                    <span class="toggle"></span>
                    <span class="text">All</span>
                  </span>
                </label>
              </li>
              <?php foreach( $terms as $term ) : ?>
              <li>
                <label>
                  <input type="radio" name="<?=$filter;?>" value="<?=$term->slug?>"/>
                  <span class="label">
                    <span class="toggle"></span>
                    <span class="text"><?=$term->name?></span>
                  </span>
                </label>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <button class="toggleFixedFilter">Filter</button>
    </div>
    <div class="column column2 column__last results__block">
      <div id="productCategoryListWrap">
        
      </div>
    </div>
    
  </div>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>