(function( $ ){
  $(document).ready(function(){
    vhsize();
  });
  $(window).resize(function(){
    vhsize();
  });

  function vhsize() {
    var newH;
    var newW;
    var h = $('.video-hero-unit').outerHeight();
    var w = $('.video-hero-unit').width();
    console.log(w);
    console.log(h);


      newH = (9/16) * w;
      var offset = (h - (newH * 1.33)) / 2;
      //console.log(h);
      //console.log(newH * 1.25);
      //console.log(offset);
      $('.video-hero-unit iframe').css('width', w * 1.33).css('height', newH * 1.33).css('top', offset);
  }
})( jQuery );
