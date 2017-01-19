<div id="video-hero-<?php print $bid; ?>" class="video-hero-unit <?php print $hero_classes; ?>">
  <script src="https://player.vimeo.com/api/player.js"></script>


  <?php if ($content['field_hero_video_overlay'][0]['#markup']): ?>
    <div class="video-hero-overlay"></div>
  <?php endif; ?>

  <div class="hero-unit-video-content-wrapper clearfix">
    <div class="hero-unit-content-wrapper">
      <div class="hero-unit-content element-max-width">
        <div class="hero-unit-content-inner">
          <h2><?php print render($content['field_hero_unit_headline']); ?></h2>
          <?php if(!empty($content['field_hero_unit_text'])): ?>
            <p><?php print render($content['field_hero_unit_text']); ?></p>
          <?php endif; ?>
          <?php if(!empty($content['field_hero_unit_link'])): ?>
            <div class="hero-unit-links clearfix"><?php print render($content['field_hero_unit_link']); ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="video-hero-controls-wrapper">
  	<div class="video-hero-controls">
  		<div class="button-play" title="Play/Pause video"><i class="fa fa-pause"></i></div>
  	</div>
  </div>

</div>

<?php if(!empty($content['field_hero_unit_image'])): ?>
  <style>
    #video-hero-<?php print $bid; ?>.video-hero-static {
      background-image:url(<?php print $image_small; ?>);
    }
    @media all and (min-width: 480px) and (max-width: 959px) {
      #video-hero-<?php print $bid; ?>.video-hero-static {
        background-image:url(<?php print $image_medium; ?>);
      }
    }
    @media all and (min-width: 960px) {
      #video-hero-<?php print $bid; ?>.video-hero-static {
        background-image:url(<?php print $image_large; ?>);
      }
    }
  </style>
<?php endif; ?>
<script type="text/javascript">

  var playerHTML = '<iframe id="video-hero-iframe-<?php print $bid; ?>" class="video-hero-iframe"  frameborder="0" src="https://player.vimeo.com/video/162107022?background=1" width="1600" height="900"></iframe>';

  var agent = getMobileOperatingSystem();
  if (agent != 'iOS' || agent != 'Android' || agent != 'Windows Phone') {
    jQuery('#video-hero-<?php print $bid; ?>').prepend(playerHTML);
    jQuery('#video-hero-<?php print $bid; ?>').addClass('video-hero-processed');
  }
  else {
    jQuery('#video-hero-<?php print $bid; ?>').addClass('video-hero-static');
  }

  // Initialize player
  var iframe = document.querySelector('#video-hero-<?php print $bid; ?>');
  var player<?php print $bid; ?> = new Vimeo.Player(iframe);

  player<?php print $bid; ?>.on('play', function() {
      console.log('played the video!');
  });

  player<?php print $bid; ?>.getVideoTitle().then(function(title) {
      console.log('title:', title);
  });

  // Add custom play/pause button

  // Add custom play/pause button
  jQuery('#video-hero-<?php print $bid; ?> .button-play').on('click', function() { playpause(); } );
  var playpause = function() {
    var playerState = 1;
    player<?php print $bid; ?>.getPaused().then(function(paused) {
      if (paused) {
        player<?php print $bid; ?>.play();
        jQuery('#video-hero-<?php print $bid; ?> .button-play').addClass('paused');
        jQuery('#video-hero-<?php print $bid; ?> .button-play').find('.fa-play').addClass('fa-pause').removeClass('fa-play');
      } else {
        player<?php print $bid; ?>.pause();
        jQuery('#video-hero-<?php print $bid; ?> .button-play').removeClass('paused');
        jQuery('#video-hero-<?php print $bid; ?> .button-play').find('.fa-pause').removeClass('fa-pause').addClass('fa-play');
      }
    });


  };
</script>
