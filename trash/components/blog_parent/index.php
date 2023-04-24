<?php $layoutName = 'blog_parent' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$headlinetext = $data->headline_text;
$tag = $data->heading_tags;
$description = $data->text_summary;

$enableSearch = $data->enable_search_field;
$enableFilter = $data->enable_category_filter;
$postperpage = $data->article_per_page;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row row--narrow">
  
  <div class="columns column__heading to_animate">
    
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
      <?php if( $enableSearch ) : ?>
      <div class="searchFieldWrap">
        <input type="text" class="searchField" placeholder="Search keywords here..."/>
        <button class="searchButton">
          <svg xmlns="http://www.w3.org/2000/svg" width="18.565" height="18.565" viewBox="0 0 18.565 18.565"><path d="M18.291,16.976,15.67,14.365a8.817,8.817,0,1,0-1.306,1.306l2.612,2.621a.926.926,0,0,0,1.31.005l.005-.005a.926.926,0,0,0,.005-1.31l-.005-.005M1.889,8.835a6.946,6.946,0,1,1,6.946,6.946A6.946,6.946,0,0,1,1.889,8.835Z" transform="translate(0 0)"/></svg>
        </button>
      </div>
      <?php endif; ?>
    </div>
    
  </div>

  <?php if( $enableFilter ) : ?>
  <div class="filter__block to_animate">
    <ul>
      <li class="active"><a data-val="">All</a></li>
      <?php
      $cat_terms = get_terms(
        array('category'),
        array(
          'hide_empty'    => true,
        )
      );
      ?>
      <?php foreach( $cat_terms as $cat ) : ?>
      <li><a data-val="<?= $cat->slug ?>"><?= $cat->name ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php endif; ?>

  <div class="results__wrap to_animate">
    <div id="blog_main__results" data-perpage="<?=(!empty($postperpage)) ? $postperpage : 12; ?>">
      <span class="ajaxloader"></span>
    </div>
  </div>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>