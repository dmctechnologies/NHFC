<?php
if (!function_exists('nhfc_social_url')) {
  function nhfc_social_url($value, $prefix) {
    $value = trim((string) $value);
    if ($value === '') {
      return '#';
    }
    if (preg_match('/^https?:\/\//i', $value)) {
      return $value;
    }
    return $prefix . ltrim($value, '@/');
  }
}

$footer_settings = ORM::for_table('settings')->find_one(1);
$facebook_url = nhfc_social_url($footer_settings ? $footer_settings->facebook : '', 'https://www.facebook.com/');
$twitter_url = nhfc_social_url($footer_settings ? $footer_settings->twitter : '', 'https://twitter.com/');
$instagram_url = nhfc_social_url($footer_settings ? $footer_settings->status : '', 'https://instagram.com/');
?>
  <footer class="site-footer">
    <div class="container">
      <div class="row"> 
        <!-- Start Footer Widgets -->
        <div class="col-md-3 col-sm-6 widget footer-widget">
          <h4 class="footer-widget-title">About NHFC Tanzania</h4>
          <img src="images/nhfc.png" alt="Logo" style="width: 150px; height: auto;">
          <p style="text-align: justify;">New Harvest Fellowship Church Tanzania is a vibrant 
            community of believers dedicated to spreading the message of hope and love.
            We are committed to making a positive impact in our local and global 
            communities through various outreach programs and initiatives.</p>	  
				
		</div>
        <div class="col-md-3 col-sm-6 widget footer-widget">
          <h4 class="footer-widget-title">Quick Links</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="events.php">All Events</a></li>
            <li><a href="project_updates.php">Projects</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
		
        <div class="col-md-3 col-sm-6 widget footer-widget">
          <h4 class="footer-widget-title">Contact Information</h4>
        <p style="margin: 0;">NEW HARVEST FELLOWSHIP CHURCH TANZANIA</p>
        <p style="margin: 0;">P.O.BOX 540, CHIBE-SHINYANGA</p>
        <p style="margin: 0;">Mobile Number: 0676444127</p>
        <p style="margin: 0;">Email: <a href="mailto:info@newharvestfellowshipchurch.tz">info@newharvestfellowshipchurch.tz</a></p>
		
      </div>
      <div class="col-md-3 col-sm-6 widget footer-widget">
        <h4 class="footer-widget-title">Newsletter Subscription</h4>
        <form action="subscribe.php" method="post">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            <div class="spacer-10"></div>
            <input type="text" name="country" class="form-control" placeholder="Enter your country" required>
            <div class="spacer-10"></div>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>   </div>
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>
    </div>
  </footer>
  <footer class="site-footer-bottom">
    <div class="container">
      <div class="row">
        <div class="copyrights-col-left col-md-6 col-sm-6">
          <p>&copy; 2025 NHFC Tanzania. All Rights Reserved</p>
        </div>
        <div class="copyrights-col-right col-md-6 col-sm-6">
          <div class="social-icons">
            <a href="<?php echo htmlspecialchars($facebook_url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo htmlspecialchars($twitter_url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="<?php echo htmlspecialchars($instagram_url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
	
  </footer>
  <!-- End Footer --> 
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> 
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/waypoints.js"></script> <!-- Waypoints --> 
<script src="plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements --> 
<script src="js/init.js"></script> <!-- All Scripts --> 
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer --> 
<script src="style-switcher/js/jquery_cookie.js"></script> 
<script src="style-switcher/js/script.js"></script> 

</body>


</html>
