<?php include"header.php"; ?>
  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <?php
               $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$result = $db->prepare("SELECT * FROM events where id= :post_id");
	$result->bindParam(':post_id', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){  
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
        $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/');
        $eventId = (int) $row['id'];
        $eventUrl = $scheme . '://' . $host . $basePath . '/event-detail.php?id=' . $eventId;
        $shareUrl = rawurlencode($eventUrl);
        $shareTitle = rawurlencode($row['title']);
        $shareText = rawurlencode($row['title'] . ' - ' . $eventUrl);
        $shareEmailSubject = rawurlencode('Event: ' . $row['title']);
        $shareEmailBody = rawurlencode("Check out this event: " . $row['title'] . "\n" . $eventUrl);

        $facebookShare = 'https://www.facebook.com/sharer/sharer.php?u=' . $shareUrl;
        $twitterShare = 'https://twitter.com/intent/tweet?url=' . $shareUrl . '&text=' . $shareTitle;
        $whatsappShare = 'https://wa.me/?text=' . $shareText;
        $linkedinShare = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $shareUrl;
        $emailShare = 'mailto:?subject=' . $shareEmailSubject . '&body=' . $shareEmailBody;
?>
  <div class="nav-backed-header parallax">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li class="active"><?php echo $row['title']; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- End Nav Backed Header --> 
  <!-- Start Page Header -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-8">
          <h1>Events</h1>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-4"> <a href="events.php" class="pull-right btn btn-primary">All events</a> </div>
      </div>
    </div>
  </div>
  <!-- End Page Header --> 
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <header class="single-post-header clearfix">
              <nav class="btn-toolbar pull-right">
                <button type="button" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Print" aria-label="Print event"><i class="fa fa-print"></i></button>
                <button type="button" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Contact us" aria-label="Contact us"><i class="fa fa-envelope"></i></button>
                <button type="button" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Share event" aria-label="Share event"><i class="fa fa-location-arrow"></i></button>
              </nav>
              <h2 class="post-title"><?php echo $row['title']; ?></h2>
            </header>
            <article class="post-content">
              <div class="event-description"> 
                <?php if (!empty($row['thumbnail'])): ?>
                  <div class="event-poster">
                    <img src="uploads/<?php echo htmlspecialchars($row['thumbnail'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" class="img-responsive">
                  </div>
                  <div class="spacer-20"></div>
                <?php endif; ?>
                <div class="spacer-20"></div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Event details</h3>
                      </div>
                      <div class="panel-body">
                        <ul class="info-table">
                          <li><i class="fa fa-calendar"></i> <strong><?php echo $row['date']; ?></strong></li>
                          <li><i class="fa fa-clock-o"></i> <?php echo $row['time']; ?></li>
                          <li><i class="fa fa-map-marker"></i> <?php echo $row['venue']; ?></li>
                          <li><i class="fa fa-phone"></i> <?php echo $row['phone']; ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  
                </div>
				 <div class="post-meta"> 
				<h4>Share this Event:</h4>
                <div class="social-icons">
                  <a href="<?php echo htmlspecialchars($facebookShare, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" aria-label="Share on Facebook"><i class="fa fa-facebook"></i></a>
                  <a href="<?php echo htmlspecialchars($twitterShare, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" aria-label="Share on Twitter"><i class="fa fa-twitter"></i></a>
                  <a href="<?php echo htmlspecialchars($whatsappShare, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><i class="fa fa-whatsapp"></i></a>
                  <a href="<?php echo htmlspecialchars($linkedinShare, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><i class="fa fa-linkedin"></i></a>
                  <a href="<?php echo htmlspecialchars($emailShare, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Share via Email"><i class="fa fa-envelope"></i></a>
                </div>
			  </div>
				</div>
				  <div class="fb-comments" data-href="event-detail.php?id=<?php echo $row['id'];?>" data-width="100%" data-numposts="5"></div>
           </article>
          </div>
		  <?php } ?>
          <!-- Start Sidebar -->
         <?php include"side-bar.php"; ?>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Start Footer -->
  <?php include"footer.php"; ?>
