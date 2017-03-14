<div id="video-hero-<?php print $bid; ?>" class="video-hero-unit <?php print $hero_classes; ?>">
  <script src="https://player.vimeo.com/api/player.js"></script>


  <?php if ($content['field_hero_video_overlay'][0]['#markup']): ?>
    <div class="video-hero-overlay"></div>
  <?php endif; ?>
  <div class="video-hero-poster-frame"></div>
  <div class="video-hero-content-wrapper">
    <div class="video-hero-content">
      <h2><?php print render($content['field_hero_unit_headline']); ?></h2>
      <?php if(!empty($content['field_hero_unit_text'])): ?>
        <p class="video-hero-text"><?php print render($content['field_hero_unit_text']); ?></p>
      <?php endif; ?>
      <?php if(!empty($content['field_hero_unit_link'])): ?>
        <div class="hero-unit-links clearfix"><?php print render($content['field_hero_unit_link']); ?></div>
      <?php endif; ?>
    </div>
  </div>

  <iframe id="video-hero-iframe-<?php print $bid; ?>" class="video-hero-iframe"  frameborder="0" src="<?php print $video_url; ?>?background=1&loop=1" width="" height=""></iframe>

  <div class="video-hero-controls-wrapper">
  	<div class="video-hero-controls">
  		<div class="button-play" title="Play/Pause video"><i class="fa fa-pause"></i></div>
  	</div>
  </div>
</div>

<?php if(!empty($content['field_hero_unit_image'])): ?>
  <style>
    #video-hero-<?php print $bid; ?> .video-hero-poster-frame {
      background-image:url(<?php print $image_small; ?>);
    }
    @media all and (min-width: 768px) and (max-width: 959px) {
      #video-hero-<?php print $bid; ?> .video-hero-poster-frame {
        background-image:url(<?php print $image_medium; ?>);
      }
    }
    @media all and (min-width: 960px) {
      #video-hero-<?php print $bid; ?> .video-hero-poster-frame {
        background-image:url(<?php print $image_large; ?>);
      }
    }
  </style>
<?php endif; ?>


<script type="text/javascript">
  var iframe = jQuery('#video-hero-iframe-<?php print $bid; ?>');
  var player<?php print $bid; ?> = new Vimeo.Player(iframe);


  // Wait for their to be progress and then fade out poster frame
  player<?php print $bid; ?>.on('progress', function(data) {
    jQuery('#video-hero-<?php print $bid; ?> .video-hero-poster-frame').fadeOut();
  });

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
