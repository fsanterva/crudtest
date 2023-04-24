<?php
/*
@params
array - ACF link field
int
  1 - big button
  2 - outline button
*/
function button($btnObj) {
  ob_start();
  
  $btnStyle = $btnObj['button_style'];
  $btnSize= $btnObj['button_size'];
  $btnArrow = $btnObj['button_arrow'];
  $btnLink = $btnObj['button_link'];
  $btnTitle = ( !empty($btnLink['title']) ) ? $btnLink['title'] : 'Edit this Text';
  $btnURL = ( !empty($btnLink['url']) ) ? $btnLink['url'] : '#';
  $btnTarget = ( !empty($btnLink['target']) ) ? $btnLink['target'] : '';
  $btnClass = $btnObj['button_custom_class'];
  
  $btnStyleVal;
  switch($btnStyle) {
    case 'solid':
      $btnStyleVal = 'site__button_style--solid';
      break;
    case 'solidgradient':
      $btnStyleVal = 'site__button_style--solidgradient';
      break;
    case 'gradient':
      $btnStyleVal = 'site__button_style--gradient';
      break;
    case 'outline':
      $btnStyleVal = 'site__button_style--outline';
      break;
    case 'white':
      $btnStyleVal = 'site__button_style--white';
      break;
    default:
      $btnStyleVal = 'site__button_style--solid';
  }
  
  $btnSizeVal;
  switch($btnSize) {
    case 'default':
      $btnSizeVal = 'site__button_size--default';
      break;
    case 'big':
      $btnSizeVal = 'site__button_size--big';
      break;
    default:
      $btnSizeVal = 'site__button_size--default';
  }
?>
  
  <a class="site__button <?= $btnStyleVal; ?> <?= $btnSizeVal; ?> <?= ($btnArrow) ? 'site__button--arrow' : ''; ?> <?= ( !empty($btnClass) ) ? $btnClass : ''; ?>" href="<?= $btnURL; ?>" target="<?= $btnTarget; ?>">
    <span class="text"><?= $btnTitle; ?></span>
    <?php if( $btnArrow ) : ?>
    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="14.679" height="12.549" viewBox="0 0 14.679 12.549"><path d="M1071.608,838.164l-1.02,1.019,4.536,4.535h-11.92v1.441h11.92l-4.536,4.536,1.02,1.019,6.277-6.275Z" transform="translate(-1063.206 -838.164)" fill="#fff"/></svg></span>
    <?php endif; ?>
  </a>

  <?php echo ob_get_clean();
}

/*
@params
string - social media abbr. (fb,ig,in,tw,pin)
string - url
*/
function socialIcon($type, $url) {
  ob_start();
  switch($type) {
    case 'fb':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="8.979" height="16.993" viewBox="0 0 8.979 16.993"><path d="M1251.012,10945.171v-3.245h2.57v-1.631a4.315,4.315,0,0,1,1.128-3.012,3.556,3.556,0,0,1,2.729-1.237h2.552v3.245h-2.552a.563.563,0,0,0-.45.281,1.152,1.152,0,0,0-.2.688v1.665h3.2v3.245h-3.205v7.868h-3.2v-7.868Z" transform="translate(-1251.012 -10936.046)"/></svg>';
      break;
    case 'ig':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="15.018" height="14.988" viewBox="0 0 15.018 14.988"><path d="M1378.5,10937.04c-2.04,0-2.3.01-3.1.044a5.562,5.562,0,0,0-1.823.35,3.866,3.866,0,0,0-2.2,2.194,5.5,5.5,0,0,0-.347,1.816c-.037.8-.044,1.053-.044,3.089s.01,2.291.044,3.09a5.519,5.519,0,0,0,.349,1.818,3.863,3.863,0,0,0,2.2,2.2,5.534,5.534,0,0,0,1.822.348c.8.038,1.056.044,3.1.044s2.295-.009,3.1-.044a5.56,5.56,0,0,0,1.823-.348,3.832,3.832,0,0,0,2.2-2.191,5.526,5.526,0,0,0,.349-1.819c.038-.8.045-1.054.045-3.089s-.01-2.291-.045-3.09a5.539,5.539,0,0,0-.349-1.819,3.867,3.867,0,0,0-2.2-2.194,5.524,5.524,0,0,0-1.82-.35C1380.792,10937.048,1380.538,10937.04,1378.5,10937.04Zm0,1.349c2,0,2.243.01,3.034.044a4.166,4.166,0,0,1,1.394.259,2.469,2.469,0,0,1,1.423,1.423,4.124,4.124,0,0,1,.259,1.391c.036.79.043,1.027.043,3.028s-.01,2.238-.047,3.029a4.2,4.2,0,0,1-.264,1.39,2.38,2.38,0,0,1-.562.868,2.346,2.346,0,0,1-.869.559,4.147,4.147,0,0,1-1.4.258c-.8.037-1.032.044-3.041.044s-2.244-.01-3.041-.047a4.283,4.283,0,0,1-1.387-.261,2.333,2.333,0,0,1-.862-.562,2.278,2.278,0,0,1-.564-.867,4.256,4.256,0,0,1-.263-1.39c-.028-.787-.038-1.03-.038-3.025s.01-2.239.038-3.035a4.236,4.236,0,0,1,.267-1.4,2.494,2.494,0,0,1,1.422-1.428,4.149,4.149,0,0,1,1.39-.264c.8-.028,1.033-.038,3.041-.038l.028.019Zm0,2.3a3.848,3.848,0,1,0,3.856,3.848,3.852,3.852,0,0,0-3.856-3.848Zm0,6.347a2.493,2.493,0,1,1,2.5-2.493,2.5,2.5,0,0,1-2.5,2.493Zm4.909-6.5a.9.9,0,1,1-.9-.9h0a.9.9,0,0,1,.9.9h0Z" transform="translate(-1370.989 -10937.04)"/></svg>';
      break;
    case 'tw':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16.131" height="13.051" viewBox="0 0 16.131 13.051"><path d="M1326.1,10939.539a6.773,6.773,0,0,1-1.9.518,3.318,3.318,0,0,0,1.453-1.818,6.836,6.836,0,0,1-2.1.792,3.316,3.316,0,0,0-4.668-.176,3.28,3.28,0,0,0-1.057,2.421,3.364,3.364,0,0,0,.086.752,9.387,9.387,0,0,1-6.814-3.43,3.211,3.211,0,0,0-.446,1.655,3.279,3.279,0,0,0,1.471,2.737,3.314,3.314,0,0,1-1.5-.411v.04a3.3,3.3,0,0,0,2.652,3.228,3.351,3.351,0,0,1-1.486.057,3.318,3.318,0,0,0,3.095,2.285,6.656,6.656,0,0,1-4.1,1.407,7.052,7.052,0,0,1-.786-.044,9.44,9.44,0,0,0,5.08,1.478,9.319,9.319,0,0,0,9.409-9.226q0-.063,0-.126c0-.141,0-.281-.01-.422a6.664,6.664,0,0,0,1.651-1.7l-.032-.013Z" transform="translate(-1310.001 -10937.979)"/></svg>';
      break;
    case 'in':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="14.464" height="14.457" viewBox="0 0 14.464 14.457"><path d="M1435.413,10950.873h-2.994v-9.652h2.994Zm-1.5-10.969a1.744,1.744,0,1,1,1.73-1.757v.006A1.749,1.749,0,0,1,1433.915,10939.9Zm12.7,10.969h-2.986v-4.7c0-1.12-.022-2.556-1.557-2.556-1.557,0-1.8,1.217-1.8,2.475v4.779h-2.991v-9.652h2.87v1.317h.042a3.148,3.148,0,0,1,2.835-1.559c3.031,0,3.587,2,3.587,4.592v5.3Z" transform="translate(-1432.16 -10936.416)"/></svg>';
      break;
    case 'pin':
      $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"></path></svg>';
      break;
    default:
      $svg = '';
  }
  ?>

  <a class="social__icon" href="<?= $url ?>" target="_blank" rel="noreferrer noopener" aria-label="social media link"><?= $svg; ?></a>

  <?php echo ob_get_clean();
}

function getACFComponentData($postID, $componentName = null, $fieldName = null, $index = null) {
  
  $ACFSections = get_field('sections', $postID);
  $idx = ( empty($index) || $index == NULL ) ? 0 : $index;
  $componentsArray = array();
  
  // GETS ALL SIMILAR COMPONENTS AND STORE IN A ARRAY. (IF MULTIPLE SIMILAR COMPONENT HAS BEEN ADDED TO THE PAGE)
  foreach( $ACFSections as $s ) {
    
    $sectionName = $s['acf_fc_layout'];
    
    if( $sectionName == $componentName ) {

      array_push( $componentsArray, $s );

    }
    
  }
  
  // IF $index IS EMPTY THEN $index IS SET TO 0.
  // IF COMPONENT ARRAY HAS ONLY 1 ITEM (YOU'VE ADDED THE COMPONENT IN THE PAGE ONLY ONCE) THEN $index IS ALWAYS SET TO 0
  // IF COMPONENT ARRAY HAS MULTIPLE ITEM (YOU'VE ADDED THE SAME COMPONENT IN THE PAGE MORE THAN ONCE) YOU CAN QUERY WHAT TO QUERY BY DEFINING THE INDEX
  $finalIndex = ( count($componentsArray) <= 1 ) ? 0 : $idx;
  
  return $componentsArray[$finalIndex][$componentName][$fieldName];
  
}

/**
 * Custom Featured Image Data
 *
 * @param string $post_id ID of the post where the featured image is attached
 */
function getFeaturedImage( $post_id ) {
  
  $imgURL = get_the_post_thumbnail_url($post_id);
  $imgID = get_post_thumbnail_id($post_id);
  $imgAlt = get_post_meta( $imgID, '_wp_attachment_image_alt', true );
  
  if( !$imgURL ) {
    return '';
  }
  return array('url'=>$imgURL, 'alt'=>$imgAlt, 'id'=>$imgID);
  
}


/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */

function acf_responsive_image($image_id,$image_size,$max_width, $lazyload = ''){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

    $isLazyload = ($lazyload) ? 'data-' : '';
		// generate the markup for the responsive image
		echo $isLazyload.'src="'.$image_src.'" '.$isLazyload.'srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}

function formattedHeadline($headline = '') {
  
  $strippedMainText = str_replace('{', '<span>', $headline);
  $finalMainText = str_replace('}', '</span>', $strippedMainText);
  
  echo $finalMainText;
  
}
?>