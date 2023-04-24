(function() {
  var getUrl = window.location;
  var giftofspeed = document.createElement('link');
  giftofspeed.rel = 'stylesheet';
  giftofspeed.href = '/wp-content/themes/legaltheme/assets/css/fonts.css';
  giftofspeed.type = 'text/css';
  giftofspeed.media = 'all';
  var godefer = document.getElementsByTagName('link')[0];
  godefer.parentNode.insertBefore(giftofspeed, null);
}());