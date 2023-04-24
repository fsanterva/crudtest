<?php
$footerBGType = get_field('footer_background_type', 'option');
$footerBGImage = get_field('footer_background_image', 'option');
$footer_logo = get_field('footer_logo', 'option');
$footer_navs = get_field('footer_navigation_row', 'option');
$footer_form = get_field('footer_form_row', 'option');
$footer_copyright = get_field('footer_copyright_row', 'option');

$phone = get_field('phone','option');
$email = get_field('email','option');
$addr = get_field('address','option');
$gmaplink = get_field('google_map_url','option');
$socials = get_field('social_media', 'option');
?>
<footer class="<?= ( $footerBGType == 'image' && !empty($footerBGImage) ) ? 'bg__type--image' : '' ?>">
  <?php if( $footerBGType == 'image' && !empty($footerBGImage) ) : ?>
  <img class="bg__image" <?= acf_responsive_image($footerBGImage['id'], '', '', true); ?> alt="<?= $footerBGImage['alt']; ?>"/>
  <?php endif; ?>
  <?php if( count( $footer_navs ) > 0 ) : ?>
  <div class="row row--narrow row--navlinks">
    <div class="columns">
      <?php foreach( $footer_navs as $key=>$nav ) : 
      $name = str_replace(' ','-',strtolower($nav['menu_name']));
      ?>
      <div class="column column<?=$key+1;?> <?= ($key == 0) ? 'column__first' : '' ?><?= ($key+1 == count( $footer_navs)) ? 'column__last' : '' ?>">
        <label><?= $nav['label']; ?></label>
        <nav><?= do_shortcode('[menu name='.$name.']'); ?></nav>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
  
  <div class="row row--narrow row--newsletter">
    <div class="columns <?= ($footer_form['reverse_form']) ? 'reverse' : '' ?>">
      <div class="column column1 column__first">
        
        <?php if( !empty( $footer_logo ) ) : ?>
        <a href="<?= home_url(); ?>" class="site__logo" aria-label="Site logo">
          <img <?= acf_responsive_image($footer_logo['id'], '', '500px', true); ?> alt="<?= $footer_logo['alt']; ?>"/>
        </a>
        <?php endif; ?>
        
        <?php if( $footer_form['show_phone'] && !empty($phone) ) : ?>
        <div class="contact__info contact__info--phone">
          <label>Phone:</label><a class="link" href="tel:<?= $phone; ?>"><?= $phone; ?></a>
        </div>
        <?php endif; ?>
        
        <?php if( $footer_form['show_email'] && !empty($email) ) : ?>
        <div class="contact__info contact__info--email">
          <label>Email:</label><a class="link" href="mailto:<?= $email; ?>"><?= $email; ?></a>
        </div>
        <?php endif; ?>
        
        <?php if( $footer_form['show_address'] && !empty($addr) ) : ?>
        <div class="contact__info contact__info--addr">
          <label>Address:</label><a class="link" href="<?= $gmaplink; ?>" target="_blank" rel="noreferrer noopener"><?= $addr; ?></a>
        </div>
        <?php endif; ?>
        
      </div>
      <div class="column column2 column__last">
        <?php if( !empty( $footer_form['form_shortcode'] ) ) : ?>
        <div class="newsletter__form">
          <?= do_shortcode($footer_form['form_shortcode']); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
  <div class="row row--narrow row-copyright">
    <div class="columns  <?= ($footer_copyright['reverse_copyright']) ? 'reverse' : '' ?>">
      <div class="column column1 column__first">
        <?php if( is_front_page() ) : ?>
        <div class="copyright">
          <?= $footer_copyright['copyright_text_homepage']; ?>
        </div>
        <?php else : ?>
        <div class="copyright">
          <?= $footer_copyright['copyright_text_default']; ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="column column2 column__last">
        <?php if( $footer_copyright['show_social_media_links'] && !empty( $socials ) ) : ?>
        <label><?= $footer_copyright['socials_text_label']; ?></label>
        <div class="social__icons">
          <?php foreach( $socials as $soc ) : ?>
          <?php socialIcon($soc['platform'], $soc['url']); ?>
          <?php endforeach; ?>
        </div>
        
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
</div>
  <style> <?php require get_template_directory() . '/assets/css/footer.css'; ?> </style>
	<?php wp_footer(); ?>
</body>
</html>