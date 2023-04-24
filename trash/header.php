<?php ob_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <script><?php require get_template_directory() . '/assets/js/delayjs.js'; ?></script>
  <title><?php wp_title(); ?></title>
  <?php $contentWidth = get_field('content_width', 'option'); ?>
  
	<?php wp_head(); ?>
  
  <style><?php require get_template_directory() . '/assets/css/fonts.css'; ?></style>
  <?php
  //ACCENT AND BUTTON STYLE COLOR VALUES
  $bodyBG = get_field('body_background', 'option');
  $accentColor1 = get_field('accent_color_1', 'option');
  $accentColor2 = get_field('accent_color_2', 'option');
  $accentColor3 = get_field('accent_color_3', 'option');
  $textColor1 = get_field('text_color_1', 'option');
  $textColor2 = get_field('text_color_2', 'option');
  
  $btnSolid = get_field('solid_button', 'option');
  $btnSolidDefBG = ( !empty($btnSolid['default_bg_color']) ) ? $btnSolid['default_bg_color'] : $accentColor1;
  $btnSolidHoverBG = ( !empty($btnSolid['hover_bg_color']) ) ? $btnSolid['hover_bg_color'] : $accentColor1;
  $btnSolidDefText = ( !empty($btnSolid['default_text_color']) ) ? $btnSolid['default_text_color'] : $textColor1;
  $btnSolidHoverText = ( !empty($btnSolid['hover_text_color']) ) ? $btnSolid['hover_text_color'] : $textColor1;
  
  $btnSolidGrad = get_field('solid_gradient_hover', 'option');
  $btnSolidGradDefBG = ( !empty($btnSolidGrad['default_bg_color']) ) ? $btnSolidGrad['default_bg_color'] : $accentColor1;
  $btnSolidGradHover1 = ( !empty($btnSolidGrad['hover_gradient_color_1']) ) ? $btnSolidGrad['hover_gradient_color_1'] : $accentColor1;
  $btnSolidGradHover2 = ( !empty($btnSolidGrad['hover_gradient_color_2']) ) ? $btnSolidGrad['hover_gradient_color_2'] : $accentColor2;
  $btnSolidGradDefText = ( !empty($btnSolidGrad['default_text_color']) ) ? $btnSolidGrad['default_text_color'] : $textColor1;
  $btnSolidGradHoverText = ( !empty($btnSolidGrad['hover_text_color']) ) ? $btnSolidGrad['hover_text_color'] : $textColor1;
  
  $btnGrad = get_field('gradient_button', 'option');
  $btnGrad1 = ( !empty($btnGrad['gradient_color_1']) ) ? $btnGrad['gradient_color_1'] : $accentColor1;
  $btnGrad2 = ( !empty($btnGrad['gradient_color_2']) ) ? $btnGrad['gradient_color_2'] : $accentColor2;
  $btnGradDefText = ( !empty($btnGrad['default_text_color']) ) ? $btnGrad['default_text_color'] : $textColor1;
  $btnGradHoverText = ( !empty($btnGrad['hover_text_color']) ) ? $btnGrad['hover_text_color'] : $textColor1;
  
  $btnOutline = get_field('outline_button', 'option');
  $btnOutlineBorder = ( !empty($btnOutline['border_color']) ) ? $btnOutline['border_color'] : $accentColor1;
  $btnOutlineHoverBG = ( !empty($btnOutline['hover_bg_color']) ) ? $btnOutline['hover_bg_color'] : $accentColor1;
  $btnOutlineDefText = ( !empty($btnOutline['default_text_color']) ) ? $btnOutline['default_text_color'] : $textColor1;
  $btnOutlineHoverText = ( !empty($btnOutline['hover_text_color']) ) ? $btnOutline['hover_text_color'] : $textColor1;
  
  $btnWhite = get_field('white_button', 'option');
  $btnWhiteHoverBG = ( !empty($btnWhite['hover_bg_color']) ) ? $btnWhite['hover_bg_color'] : $accentColor1;
  $btnWhiteDefText = ( !empty($btnWhite['default_text_color']) ) ? $btnWhite['default_text_color'] : $textColor1;
  $btnWhiteHoverText = ( !empty($btnWhite['hover_text_color']) ) ? $btnWhite['hover_text_color'] : $textColor1;
  
  $footerBGColor = ( !empty(get_field('footer_background_color', 'option')) ) ? get_field('footer_background_color', 'option') : $accentColor1;
  $footerDefTextColor = ( !empty(get_field('footer_default_text_color', 'option')) ) ? get_field('footer_default_text_color', 'option') : '#FFFFFF';
  $footerDefLinkColor = ( !empty(get_field('footer_default_link_color', 'option')) ) ? get_field('footer_default_link_color', 'option') : '#FFFFFF';
  $footerNavLinkColor = ( !empty(get_field('footer_navigation_links_color', 'option')) ) ? get_field('footer_navigation_links_color', 'option') : '#FFFFFF';
  $footerSocialBGColor = ( !empty(get_field('footer_socials_button_background_color', 'option')) ) ? get_field('footer_socials_button_background_color', 'option') : '#FFFFFF';
  $footerSocialIconColor = ( !empty(get_field('footer_socials_icon_color_fill', 'option')) ) ? get_field('footer_socials_icon_color_fill', 'option') : $accentColor1;
  ?>
  <style>
  :root {
    --bodycolor: <?= $bodyBG; ?>;
    --color1: <?= $accentColor1; ?>;
    --color2: <?= $accentColor2; ?>;
    --color3: <?= $accentColor3; ?>;
    --color4: <?= $textColor1; ?>;
    --color5: <?= $textColor2; ?>;
    --font1: 'ArticulatCF';
    --fontsize-desktop: <?= get_field('base_font_size_desktop', 'option'); ?>px;
    --fontsize-mobile: <?= get_field('base_font_size_mobile', 'option'); ?>px;
    --content-width: <?= $contentWidth; ?>px;
    --content-width-narrow: <?= get_field('content_width_narrow', 'option'); ?>px;
    --content-width-media: <?= $contentWidth + 60; ?>px;
    --easing: cubic-bezier(.55,.43,.31,.99);
    --btn-solid-default-bg: <?= $btnSolidDefBG  ?>;
    --btn-solid-hover-bg: <?= $btnSolidHoverBG ?>;
    --btn-solid-default-text: <?= $btnSolidDefText ?>;
    --btn-solid-hover-text: <?= $btnSolidHoverText ?>;
    --btn-solidgrad-def-bg: <?= $btnSolidGradDefBG ?>;
    --btn-solidgrad-hover-bg1: <?= $btnSolidGradHover1 ?>;
    --btn-solidgrad-hover-bg2: <?= $btnSolidGradHover2 ?>;
    --btn-solidgrad-def-text: <?= $btnSolidGradDefText ?>;
    --btn-solidgrad-hover-text: <?= $btnSolidGradHoverText ?>;
    --btn-grad-bg1: <?= $btnGrad1 ?>;
    --btn-grad-bg2: <?= $btnGrad2 ?>;
    --btn-grad-def-text: <?= $btnGradDefText ?>;
    --btn-grad-hover-text: <?= $btnGradHoverText ?>;
    --btn-outline-border-bg: <?= $btnOutlineBorder ?>;
    --btn-outline-hover-bg: <?= $btnOutlineHoverBG ?>;
    --btn-outline-def-text: <?= $btnOutlineDefText ?>;
    --btn-outline-hover-text: <?= $btnOutlineHoverText ?>;
    --btn-white-hover-bg: <?= $btnWhiteHoverBG ?>;
    --btn-white-def-text: <?= $btnWhiteDefText ?>;
    --btn-white-hover-text: <?= $btnWhiteHoverText ?>;
    --footer-bg-color: <?= $footerBGColor ?>;
    --footer-def-text: <?= $footerDefTextColor ?>;
    --footer-def-link: <?= $footerDefLinkColor ?>;
    --footer-nav-link: <?= $footerNavLinkColor ?>;
    --footer-social-bg: <?= $footerSocialBGColor ?>;
    --footer-social-icon: <?= $footerSocialIconColor ?>;
  }
  </style>
  <style><?php require get_template_directory() . '/assets/css/critical.css'; ?></style>
  <?php critical_component_layout(); ?>
</head>
<?php
$btnLook = get_field('button_look', 'option');
?>
<body <?php body_class($btnLook); ?>>
<?php wp_body_open(); ?>
<?php
$gd_fixedHeader = get_field('sticky_header', 'option'); 
$gd_logoimg = get_field('header_logo', 'option');
$gd_logoimg_light = get_field('header_logo_light', 'option');
$gd_showPhone = get_field('show_phone', 'option');
$gd_phone = get_field('phone', 'option');
 
$fullscreen_menu_name = get_field('fullscreen_menu_name', 'option');
$fsmenuname = str_replace(' ','-',strtolower($fullscreen_menu_name));
$fullscreen_menu_style = get_field('fullscreen_menu_style', 'option');
$fssocials = get_field('social_media', 'option');
$quoteForm = get_field('quote_form_shortcode', 'option');
  
$headerType = get_field('header_type', get_the_ID());
?>
<?php if( !empty($fullscreen_menu_name) ) : ?>
<div class="fullscreen__menu layout__<?=$fullscreen_menu_style?>">
  <div class="inner__wrap">
    <button class="closeToggle">
      <span class="line1"></span>
      <span class="line2"></span>
    </button>
    <nav><?= do_shortcode('[menu name='.$fsmenuname.']'); ?></nav>
    <div class="social__icons">
      <?php foreach( $fssocials as $soc ) : ?>
      <?php socialIcon($soc['platform'], $soc['url']); ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>
  
<?php if( !empty($quoteForm) ) : ?>
<div class="quoteForm">
  <div class="inner__wrap">
    <button class="closeToggle">
      <span class="line1"></span>
      <span class="line2"></span>
    </button>
    <?= do_shortcode($quoteForm); ?>
  </div>
</div>
<?php endif; ?>

<header id="main-header" class="<?= ($gd_fixedHeader) ? 'sticky' : '' ?> headertype__<?=$headerType?>">
  
  <div class="row">
    
    <div class="site__logo">
      <a href="<?= home_url(); ?>" aria-label="Main logo link to homepage">
        
        <?php if( $headerType == 'default' || $headerType == '' ) : ?>
        
          <?php if( !empty( $gd_logoimg ) ) : ?>
          <img src="<?= $gd_logoimg['url']; ?>" alt="<?= $gd_logoimg['alt']; ?>" width="164" height="31"/>
          <?php endif; ?>
        
        <?php else : ?>
        
          <?php if( !empty( $gd_logoimg ) ) : ?>
          <img src="<?= $gd_logoimg_light['url']; ?>" alt="<?= $gd_logoimg_light['alt']; ?>" width="164" height="31"/>
          <?php endif; ?>
        
        <?php endif; ?>
        
      </a>
    </div>
    
    <nav>
      <?= do_shortcode('[menu name="main-menu"]'); ?>
    </nav>
    
    <div class="header__cta">
      <?php if( $gd_showPhone && !empty($gd_phone) ) : ?>
      <a class="phone" href="tel:<?= $gd_phone; ?>">
        <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="12.391" height="12.472" viewBox="0 0 12.391 12.472"><path d="M1555.576,68.872c-.061-.047-.125-.1-.184-.143-.314-.253-.649-.487-.973-.712l-.2-.141a2.011,2.011,0,0,0-1.139-.433,1.476,1.476,0,0,0-1.229.779.652.652,0,0,1-.561.34,1.11,1.11,0,0,1-.451-.113A5.438,5.438,0,0,1,1548,65.685c-.264-.594-.178-.982.286-1.3a1.313,1.313,0,0,0,.72-1.151,6.574,6.574,0,0,0-2.313-3.156,1.311,1.311,0,0,0-.893,0,2.584,2.584,0,0,0-1.608,1.324,2.461,2.461,0,0,0,.035,1.986,16.017,16.017,0,0,0,3.514,5.352,17.036,17.036,0,0,0,5.331,3.541,2.968,2.968,0,0,0,.527.157l.122.028a.193.193,0,0,0,.052.007h.016a3.024,3.024,0,0,0,2.511-1.912C1556.616,69.667,1556.04,69.227,1555.576,68.872Z" transform="translate(-1544 -60)"/></svg></span>
        <span class="text">CALL US</span>
        <span class="number"><?= $gd_phone; ?></span>
      </a>
      <?php endif; ?>
      
      <button class="flyout__menu_togglebtn" aria-label="Burger Menu Icon">
        <span class="line1"></span>
        <span class="line2"></span>
      </button>
    </div>
    
  </div>
  
</header>