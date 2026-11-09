<?php include "header.php"; ?>  
<!-- End Site Header --> 

<?php
$site_settings = ORM::for_table('settings')->find_one(1);
$home_ad_enabled = $site_settings ? (int) $site_settings->home_ad_enabled : 0;
$home_ad_title = $site_settings ? trim((string) $site_settings->home_ad_title) : '';
$home_ad_body = $site_settings ? trim((string) $site_settings->home_ad_body) : '';
$home_ad_button_text = $site_settings ? trim((string) $site_settings->home_ad_button_text) : '';
$home_ad_button_url = $site_settings ? trim((string) $site_settings->home_ad_button_url) : '';
$home_ad_image = $site_settings ? trim((string) $site_settings->home_ad_image) : '';
$show_home_ad = ($home_ad_enabled === 1) && ($home_ad_title !== '' || $home_ad_body !== '' || $home_ad_image !== '');
$has_ad_image = $home_ad_image !== '';
if ($home_ad_button_url !== '' && $home_ad_button_text === '') {
  $home_ad_button_text = 'Learn More';
}
?>

<?php if ($show_home_ad): ?>
<style>
  .home-ad-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.65);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    padding: 24px;
  }
  .home-ad-overlay.is-visible {
    display: flex;
  }
  .home-ad-modal {
    background: #ffffff;
    color: #222;
    width: 100%;
    max-width: 760px;
    border-radius: 10px;
    box-shadow: 0 18px 60px rgba(0, 0, 0, 0.35);
    overflow: hidden;
    position: relative;
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 0;
  }
  .home-ad-modal--single {
    grid-template-columns: 1fr;
  }
  .home-ad-content {
    padding: 28px 30px 30px;
  }
  .home-ad-content h3 {
    margin-top: 0;
    font-size: 26px;
  }
  .home-ad-content p {
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 18px;
  }
  .home-ad-media {
    background: #f2f2f2;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .home-ad-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .home-ad-close {
    position: absolute;
    top: 10px;
    right: 12px;
    border: 0;
    background: transparent;
    font-size: 28px;
    line-height: 1;
    cursor: pointer;
    color: #555;
  }
  @media (max-width: 720px) {
    .home-ad-modal {
      grid-template-columns: 1fr;
    }
    .home-ad-media {
      max-height: 220px;
    }
  }
</style>

<div id="home-ad-overlay" class="home-ad-overlay" aria-hidden="true">
  <div class="home-ad-modal<?php echo $has_ad_image ? '' : ' home-ad-modal--single'; ?>" role="dialog" aria-modal="true" aria-labelledby="home-ad-title">
    <button type="button" class="home-ad-close" aria-label="Close ad">&times;</button>
    <div class="home-ad-content">
      <?php if ($home_ad_title !== ''): ?>
      <h3 id="home-ad-title"><?php echo htmlspecialchars($home_ad_title, ENT_QUOTES, 'UTF-8'); ?></h3>
      <?php endif; ?>
      <?php if ($home_ad_body !== ''): ?>
      <p><?php echo nl2br(htmlspecialchars($home_ad_body, ENT_QUOTES, 'UTF-8')); ?></p>
      <?php endif; ?>
      <?php if ($home_ad_button_url !== ''): ?>
      <a class="btn btn-primary" href="<?php echo htmlspecialchars($home_ad_button_url, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($home_ad_button_text, ENT_QUOTES, 'UTF-8'); ?></a>
      <?php endif; ?>
    </div>
    <?php if ($has_ad_image): ?>
    <div class="home-ad-media" aria-hidden="true">
      <img src="<?php echo htmlspecialchars($home_ad_image, ENT_QUOTES, 'UTF-8'); ?>" alt="Homepage announcement">
    </div>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>
  <!-- Start Hero Slider -->
  <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
    <ul class="slides">
      <li class="parallax" style="background-image:url(images/slide1.jpg);"></li>
      <li class="parallax" style="background-image:url(images/slide2.jpg);"></li>
      <li class="parallax" style="background-image:url(images/slide3.jpg);"></li>
      <li class="parallax" style="background-image:url(images/slide4.jpg);"></li>
    </ul>
  </div>
  <!-- End Hero Slider --> 
 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row"> 
          <!-- Start Featured Blocks -->
          
          <!-- End Featured Blocks --> 
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-6"> 
            <!-- Events Listing -->
            <div class="listing events-listing">
              <header class="listing-header">
                <h2 class="titles" style="font-size: 24px;">NEW HARVEST FELLOWSHIP CHURCH</h2>
              </header>
			  <?php
				$result = $db->prepare("SELECT * FROM welcome");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				?>  
        
<?php echo $row['body']; ?>             
			  <?php } ?>
            </div>
            <!-- End Events Listing -->
            <div class="spacer-30"></div>
            <div class="listing custom-section">
              <header class="listing-header">
                <h3 class="titles">STATEMENT OF FAITH / OUR BELIEF</h3>
              </header>
                <section class="listing-cont">
                <div class="row statement-faith-row">
                  <div class="col-md-6 col-sm-6 statement-faith-item">
                    <div class="box statement-faith-card">
                      <h4>GOD</h4>
                      <p>We believe in one God, Creator of all things, holy, infinitely perfect, and eternally existing in a loving unity of three equally divine Persons: the Father, the Son and the Holy Spirit. Having limitless knowledge and sovereign power, God has graciously purposed from eternity to redeem a people for Himself and to make all things new for His own glory.</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 statement-faith-item">
                    <div class="box statement-faith-card">
                      <h4>JESUS CHRIST</h4>
                      <p>We believe that Jesus, Israel's promised Messiah, was conceived through the Holy Spirit and born of the virgin Mary. He lived a sinless life, was crucified under Pontius Pilate, arose bodily from the dead, ascended into heaven and sits at the right hand of God the Father as our High Priest and Advocate.</p>
                    </div>
                  </div>
                </div>
                <div class="row statement-faith-row">
                  <div class="col-md-6 col-sm-6 statement-faith-item">
                    <div class="box statement-faith-card">
                      <h4>THE BIBLE</h4>
                      <p>We believe that God has spoken in the Scriptures, both Old and New Testaments, through the words of human authors. As the verbally inspired Word of God, the Bible is without error in the original writings, the complete revelation of His will for salvation, and the ultimate authority by which every realm of human knowledge and endeavor should be judged. Therefore, it is to be believed in all that it teaches, obeyed in all that it requires, and trusted in all that it promises.</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 statement-faith-item">
                    <div class="box statement-faith-card">
                      <h4>THE WORK OF CHRIST</h4>
                      <p>We believe that Jesus Christ, as our representative and substitute, shed His blood on the cross as the perfect, all-sufficient sacrifice for our sins. His atoning death and victorious resurrection constitute the only ground for salvation.</p>
                    </div>
                  </div>
                </div>
                <div class="row statement-faith-row">
                  <div class="col-md-6 col-sm-6 statement-faith-item">
                    <div class="box statement-faith-card">
                      <h4>HUMAN CONDITION</h4>
                      <p>We believe that God created Adam and Eve in His image, but they sinned when tempted by Satan. In union with Adam, human beings are sinners by nature and by choice, alienated from God, and under His wrath. Only through God's saving work in Jesus Christ can we be rescued, reconciled and renewed.</p>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 statement-faith-item">
                    <div class="box statement-faith-card">
                      <h4>THE HOLY SPIRIT</h4>
                      <p>We believe that the Holy Spirit, in all that He does, glorifies the Lord Jesus Christ. He convicts the world of its guilt. He regenerates sinners, and in Him they are baptized into union with Christ and adopted as heirs in the family of God. He also indwells, illuminates, guides, equips and empowers believers for Christ-like living and service.</p>
                    </div>
                  </div>
                </div>
              </section>
            </div>

            <!-- Latest News -->
            <div class="listing post-listing">
              <header class="listing-header">
                <h3 class="titles">CHURCH SERVICES & LESSONS</h3></header>
              <section class="listing-cont">
                <ul>
				<li class="item post">
                    <div class="row">
                      <div class="col-md-12">
					  <?php
				$result = $db->prepare("SELECT * FROM news ORDER BY id DESC Limit 1");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){   
               ?> 
                        <div class="post-title">
                          <h2 class=" titles"><a href="news_post.php?id=<?php echo (int) $row['id']; ?>"><?php echo htmlspecialchars($row['news_title'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                          <span class="meta-data"><i class="fa fa-calendar"></i> on <?php echo htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8'); ?></span>
						 <p><?php echo htmlspecialchars(strip_tags(substr($row['news_detail'], 0, 180)), ENT_QUOTES, 'UTF-8'); ?>...</p>
						 </div>
						<?php } ?>
                      </div>
                    </div>
					 <p class="text-center">-- <a href="news-updates.php">All Lessons</a> --</p>
                  </li>
                </ul>
              </section>
			 </div>
       </div>
    <!-- Start Sidebar -->
    <div class="col-md-4 col-sm-6">
      <!-- Sidebar -->
      <aside class="sidebar">
        <!-- Bible Verse Updates -->
        <div class="widget">
            <h3 class="titles"><?php echo _("VERSE OF THE DAY"); ?></h3>
          <div id="bible-verse" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; background-color: #f9f9f9;">
            <?php
            // Fetch Verse of the Day from an external API
            $api_url = "https://beta.ourmanna.com/api/v1/get/?format=json";
            $http_context = stream_context_create(
              array(
                'http' => array(
                  'timeout' => 3
                )
              )
            );
            $response = @file_get_contents($api_url, false, $http_context);
            $fallback_message = "<p>Unable to fetch the verse of the day at the moment. Please try again later.</p>";
            if ($response !== false) {
              $data = json_decode($response, true);
              if (isset($data['verse']['details']['text']) && isset($data['verse']['details']['reference'])) {
                  $verse_text = htmlspecialchars($data['verse']['details']['text'], ENT_QUOTES, 'UTF-8');
                  $verse_reference = htmlspecialchars($data['verse']['details']['reference'], ENT_QUOTES, 'UTF-8');
                  echo "<p><strong>" . $verse_text . "</strong></p>";
                  echo "<p style='text-align: right;'><em>&mdash; " . $verse_reference . "</em></p>";
              } else {
                  echo $fallback_message;
              }
            } else {
              echo $fallback_message;
            }
            ?>
          </div>
        </div>
        <!-- YouTube Channel -->
        <div class="widget">
          <h3 class="titles">OUR YOUTUBE</h3>
          <div class="youtube-bar" style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
            <iframe width="100%" height="150" title="NHFC YouTube Channel" src="https://www.youtube.com/embed/341Hl5Q9EQ4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p style="text-align: center; margin-top: 5px;">
              <a href="https://www.youtube.com/channel/UCIFm_llUrwwrdsYW_QzHlxA" target="_blank" rel="noopener noreferrer" class="btn btn-default btn-sm">Visit Channel</a>
            </p>
          </div>
        </div>
      </aside>
    </div>
    <!-- End Sidebar -->
          
        </div>
      </div>
    </div>
  </div>
  <!-- Start Featured Gallery -->
  <div class="featured-gallery">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <h4>Updates from our gallery</h4>
          <a href="gallery.php" class="btn btn-default btn-lg">Gallery</a> </div>
		  <?php
				$result = $db->prepare("SELECT * FROM gallery ORDER BY id DESC Limit 3");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){   
                $gallery_file = htmlspecialchars($row['file'], ENT_QUOTES, 'UTF-8');
               ?> 
        <div class="col-md-3 col-sm-3 post format-image"> <a href="uploads/<?php echo $gallery_file; ?>" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="uploads/<?php echo $gallery_file; ?>" alt="NHFC gallery photo"> </a> </div>
        <?php } ?>
		</div>
    </div>
  </div>
  <!-- End Featured Gallery --> 
  <!-- Start Footer -->
  <?php if ($show_home_ad): ?>
  <script>
    (function () {
      var overlay = document.getElementById('home-ad-overlay');
      if (!overlay) {
        return;
      }

      function closeAd() {
        overlay.classList.remove('is-visible');
        overlay.setAttribute('aria-hidden', 'true');
      }

      function openAd() {
        overlay.classList.add('is-visible');
        overlay.setAttribute('aria-hidden', 'false');
      }

      document.addEventListener('click', function (event) {
        if (event.target.classList.contains('home-ad-close')) {
          closeAd();
        }
        if (event.target === overlay) {
          closeAd();
        }
      });

      document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
          closeAd();
        }
      });

      window.addEventListener('load', function () {
        openAd();
      });
    })();
  </script>
  <?php endif; ?>
  <?php include "footer.php"; ?>
