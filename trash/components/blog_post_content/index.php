<?php $layoutName = 'blog_post_content' ?>
<?php if( $row_layout == $layoutName ): ?>
<?php
$data = $sectionObject;
$pid = get_the_ID();
$featImg = getFeaturedImage($pid);
$title = get_the_title($pid);
$perm = get_the_permalink($pid);
$excerpt = get_the_excerpt($pid);
$date = get_the_date('m.d.Y', $pid);
$author_id = get_post_field ('post_author', $pid);
$display_name = get_the_author_meta( 'display_name' , $author_id );
$primary_term_name = yoast_get_primary_term( 'category', $pid );
$prev_post = get_adjacent_post(false, '', true);
$next_post = get_adjacent_post(false, '', false);

$showDate = $data->show_date;
$showAuthor = $data->show_author;
$showParentCat = $data->show_parent_category;
$showShareIcons = $data->show_share_icons;
$postContent = $data->post_content;

$lazyload = $data->lazyload;

require get_template_directory() . '/inc/component-wrapper-top.php';
?>

<div class="row">
  
  <div class="meta__block">
    <h1><?= $title; ?></h1>
    <div class="meta">
      <?php if($showDate) : ?>
      <span class="date"><?= $date; ?></span>
      <?php endif; ?>
      <?php if($showAuthor) : ?>
      <span class="author">By <?= $display_name; ?></span>
      <?php endif; ?>
      <?php if($showParentCat) : ?>
      <span class="cat"><?= $primary_term_name; ?></span>
      <?php endif; ?>
    </div>
  </div>
  
  <?php if(!empty( $featImg )) : ?>
  <div class="featured__image_block">
    <img <?= acf_responsive_image($featImg['id'], '', '', $lazyload); ?> alt="<?= $featImg['alt']; ?>"/>
  </div>
  <?php endif; ?>
  
  <?php if( !empty($postContent) ) : ?>
  <div class="post__body">
    <?= $postContent; ?>
  </div>
  <?php endif; ?>
  
  <div class="bottom__meta">
    <?php if(!empty($prev_post)) : ?>
    <a href="<?= get_permalink($prev_post->ID); ?>" class="prev-post">
      <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="9.88" height="10.835" viewBox="0 0 9.88 10.835"><path d="M1071.419,838.164l.88.88-3.917,3.915h7.5V844.2h-7.5l3.917,3.916-.88.88-5.42-5.418Z" transform="translate(-1066 -838.164)"/></svg></span>
      <span class="text">Previous article</span>
    </a>
    <?php endif; ?>
    
    <?php if( $showShareIcons ) : ?>
    <div class="share__icons">
      <label>Share Article</label>
      <ul>
        <li>
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $perm; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="10.864" height="20.285" viewBox="0 0 10.864 20.285"><path d="M11.762,11.41l.563-3.671H8.8V5.357a1.836,1.836,0,0,1,2.07-1.983h1.6V.248A19.528,19.528,0,0,0,9.631,0c-2.9,0-4.8,1.758-4.8,4.941v2.8H1.609V11.41H4.834v8.875H8.8V11.41Z" transform="translate(-1.609)"/></svg>
          </a>
        </li>
        <li>
          <a href="http://twitter.com/share?text=<?= $title; ?>&url=<?= $perm; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="22.176" height="18.021" viewBox="0 0 22.176 18.021"><path d="M24.746,6.951a9.1,9.1,0,0,1-2.613.716,4.563,4.563,0,0,0,2-2.517,9.108,9.108,0,0,1-2.889,1.1,4.554,4.554,0,0,0-7.753,4.15A12.916,12.916,0,0,1,4.115,5.65a4.554,4.554,0,0,0,1.408,6.074,4.531,4.531,0,0,1-2.061-.569c0,.019,0,.038,0,.057a4.552,4.552,0,0,0,3.649,4.461,4.557,4.557,0,0,1-2.055.078,4.554,4.554,0,0,0,4.25,3.159,9.128,9.128,0,0,1-5.65,1.948,9.227,9.227,0,0,1-1.085-.064,12.877,12.877,0,0,0,6.974,2.044A12.856,12.856,0,0,0,22.489,9.894q0-.3-.013-.589a9.242,9.242,0,0,0,2.27-2.355Z" transform="translate(-2.571 -4.817)" fill="#3a4bd9"/></svg>
          </a>
        </li>
        <li>
          <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $perm; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="15.56" height="13.94" viewBox="0 0 15.56 13.94"><path d="M1533.98,7253.66a1.493,1.493,0,0,0-.55,1.15,1.555,1.555,0,0,0,.56,1.2,1.953,1.953,0,0,0,1.34.5,1.917,1.917,0,0,0,1.31-.49,1.486,1.486,0,0,0,.55-1.17,1.506,1.506,0,0,0-.55-1.18,1.937,1.937,0,0,0-1.33-.49A1.959,1.959,0,0,0,1533.98,7253.66Zm-0.15,13.47h2.95v-9.74h-2.95v9.74Zm4.75,0h2.95v-3.62a9.818,9.818,0,0,1,.13-2.07,2.645,2.645,0,0,1,.88-1.44,2.36,2.36,0,0,1,1.54-.53,2.031,2.031,0,0,1,1.16.32,1.621,1.621,0,0,1,.65.91,9.739,9.739,0,0,1,.19,2.44v3.99H1549v-6.27a3.345,3.345,0,0,0-1.03-2.67,4.336,4.336,0,0,0-2.96-1.06,5.048,5.048,0,0,0-1.67.28,7.332,7.332,0,0,0-1.81,1.03v-1.05h-2.95v9.74Z" transform="translate(-1533.44 -7253.19)"></path></svg>
          </a>
        </li>
        <li>
          <a href="http://pinterest.com/pin/create/bookmarklet/?url=<?= $perm; ?>&is_video=false&description=<?= $excerpt; ?>&media=<?= $featImg; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"></path></svg>
          </a>
        </li>
      </ul>
    </div>
    <?php endif; ?>
    
    <?php if(!empty($next_post)) : ?>
    <a href="<?= get_permalink($next_post->ID); ?>" class="next-post">
      <span class="text">Next article</span>
      <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="9.88" height="10.835" viewBox="0 0 9.88 10.835"><path d="M1070.461,838.164l-.88.88,3.917,3.915H1066V844.2h7.5l-3.917,3.916.88.88,5.42-5.418Z" transform="translate(-1066 -838.164)"/></svg></span>
    </a>
    <?php endif; ?>
  </div>
  
</div>
  
<?php require get_template_directory() . '/inc/component-wrapper-bottom.php'; ?>

<?php endif; ?>