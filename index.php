<?php include "header.php"; ?>  
<!-- End Site Header --> 
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
                <header class="listing-header"></header>
                <h3 class="titles" style="font-size: 24px;">NEW HARVEST FELLOWSHIP CHURCH</h3>
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
                <section class="listing-cont"></section>
                <div class="row">
                  <div class="col-md-6">
                  <div class="box" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #f9f9f9;">
                    <h4 style="font-size: 18px; font-weight: bold;">GOD</h4>
                    <p>We believe in one God, Creator of all things, holy, infinitely perfect, and eternally existing in a loving unity of three equally divine Persons: the Father, the Son and the Holy Spirit. Having limitless knowledge and sovereign power, God has graciously purposed from eternity to redeem a people for Himself and to make all things new for His own glory.</p>
                  </div>
                  <div class="box" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #f9f9f9;">
                    <h4 style="font-size: 18px; font-weight: bold;">THE BIBLE</h4>
                    <p>We believe that God has spoken in the Scriptures, both Old and New Testaments, through the words of human authors. As the verbally inspired Word of God, the Bible is without error in the original writings, the complete revelation of His will for salvation, and the ultimate authority by which every realm of human knowledge and endeavor should be judged. Therefore, it is to be believed in all that it teaches, obeyed in all that it requires, and trusted in all that it promises.</p>
                  </div>
                  <div class="box" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #f9f9f9;">
                    <h4 style="font-size: 18px; font-weight: bold;">HUMAN CONDITION</h4>
                    <p>We believe that God created Adam and Eve in His image, but they sinned when tempted by Satan. In union with Adam, human beings are sinners by nature and by choice, alienated from God, and under His wrath. Only through God’s saving work in Jesus Christ can we be rescued, reconciled and renewed.</p>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="box" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #f9f9f9;">
                    <h4 style="font-size: 18px; font-weight: bold;">JESUS CHRIST</h4>
                    <p>We believe that Jesus Christ is God incarnate, fully God and fully man, one Person in two natures. Jesus—Israel's promised Messiah—was conceived through the Holy Spirit and born of the virgin Mary. He lived a sinless life, was crucified under Pontius Pilate, arose bodily from the dead, ascended into heaven and sits at the right hand of God the Father as our High Priest and Advocate.</p>
                  </div>
                  <div class="box" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #f9f9f9;">
                    <h4 style="font-size: 18px; font-weight: bold;">THE WORK OF CHRIST</h4>
                      <p>We believe that Jesus Christ, as our representative and substitute, shed His blood on the cross as the perfect, all-sufficient sacrifice for our sins. His atoning death and victorious resurrection constitute the only ground for salvation.</p>
                    </div>
                    <div class="box" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #f9f9f9;">
                    <h4 style="font-size: 18px; font-weight: bold;">THE HOLY SPIRIT</h4>
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
				$result = $db->prepare("SELECT * FROM news ORDER BY id DESC Limit 3");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){   
               ?> 
                        <div class="post-title">
                          <h2 class=" titles"><a href="news_post.php?id=<?php echo $row['id'];?>"><?php echo $row['news_title']; ?></a></h2>
                          <span class="meta-data"><i class="fa fa-calendar"></i> on <?php echo $row['date']; ?></span>
						 <p><?php echo strip_tags(substr($row['news_detail'],0,180)) ;?>...</p>
						 </div>
						<?php } ?>
                      </div>
                    </div>
					 <center> -- <a href="news-updates.php">All Lessons</a> --</center>
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
            $response = file_get_contents($api_url);
            if ($response !== false) {
          $data = json_decode($response, true);
          if (isset($data['verse']['details']['text']) && isset($data['verse']['details']['reference'])) {
              echo "<p><strong>" . $data['verse']['details']['text'] . "</strong></p>";
              echo "<p style='text-align: right;'><em>— " . $data['verse']['details']['reference'] . "</em></p>";
          } else {
              echo "<p>Unable to fetch the verse of the day at the moment. Please try again later.</p>";
          }
            } else {
          echo "<p>Unable to fetch the verse of the day at the moment. Please try again later.</p>";
            }
            ?>
          </div>
        </div>
        <!-- YouTube Channel -->
        <div class="widget">
          <h3 class="titles">OUR YOUTUBE</h3>
          <div class="youtube-bar" style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
            <iframe width="100%" height="150" src="https://youtu.be/341Hl5Q9EQ4?si=wRHeP6mHq7vQlxkv" frameborder="0" allowfullscreen></iframe>
            <p style="text-align: center; margin-top: 5px;">
              <a href="https://www.youtube.com/@nhfctz" target="_blank" class="btn btn-default btn-sm">Visit Channel</a>
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
               ?> 
        <div class="col-md-3 col-sm-3 post format-image"> <a href="uploads/<?php echo $row['file'];?>" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="uploads/<?php echo $row['file'];?>" alt=""> </a> </div>
        <?php } ?>
		</div>
    </div>
  </div>
  <!-- End Featured Gallery --> 
  <!-- Start Footer -->
  <?php include "footer.php"; ?>