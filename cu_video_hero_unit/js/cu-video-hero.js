(function( $ ){
  $(document).ready(function(){
    // Size video on load
    fullscreenVideoHero();
    videoSize();
  });

  // Full Screen Video Hero
  function fullscreenVideoHero() {
    $('.video-hero-unit-size-full').each(function(){
      // Determine header size by calculating site of header + navigation
      var header = $('#header-wrapper').height() + $('#navigation-wrapper').height();
      $(this).css('min-height', 'calc(100vh - ' + header + 'px)');
    });
  }

  // Resize video hero units
  function videoSize() {
    $('.video-hero-unit').each(function(){
      var $wrapper = $(this);
      var $h = $wrapper.height();
      var $w = $wrapper.width();
      // console.log($w);
      // console.log($h);

      var dimensions = calculateAspectRatioFit(800, 450, $w, $h);
      //console.log(dimensions);
      $('iframe', $wrapper).css('width', dimensions['width']).css('height', dimensions['height']);

      var l = ($w - dimensions['width'])/2;
      var t = ($h - dimensions['height'])/2;
      //console.log(l);
      $('iframe', $wrapper).css('top', t).css('left', l);
    });
  }


  // Calculate aspect ratio/dimensions
  function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {
    var ratio = Math.max(maxWidth / srcWidth, maxHeight / srcHeight);
    return { width: srcWidth*ratio, height: srcHeight*ratio };
 }

  // Size video on window resize
  $( window ).resize(function() {
    fullscreenVideoHero();
    videoSize();
  });
})( jQuery );
