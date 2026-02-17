<?php include "header.php"; ?>
  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Leadership Team</li>
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
        <div class="col-md-12">
          <h1>Leadership Team</h1>
        </div>
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
            <!-- Events Listing -->
            <div class="listing events-listing">
              <header class="listing-header">
                <div class="row">
                  
                </div>
              </header>
                <?php
                // Define team members manually
                $teamMembers = [
                [
                  'name' => 'Pastor Jacob Bonny',
                  'title' => 'Lead Pastor',
                  'contact' => 'psjacob@newharvestfellowshipchurch.tz',
                  'image' => 'images/mchungaji.jpg'
                ],
                [
                  'name' => 'Pastor Happy Gabriel',
                  'title' => 'Women’s Ministry Leader',
                  'contact' => 'pshappy@newharvestfellowshipchurch.tz',
                  'image' => 'images/happy.jpg'
                ],
                [
                  'name' => 'Pastor Edward Beatus',
                  'title' => 'Assistant Pastor',
                  'contact' => 'psedward@newharvestfellowshipchurch.tz',
                  'image' => 'images/edward.jpg'
                ],
                [
                  'name' => 'Joseph Shigela',
                  'title' => 'General Secretary',
                  'contact' => 'shigela@newharvestfellowshipchurch.tz',
                  'image' => 'images/shigela.jpg'
                ],
                [
                  'name' => 'Evangelist Emmanuel  Robert',
                  'title' => 'Mission Director',
                  'contact' => 'evemmanuel@newharvestfellowshipchurch.tz',
                  'image' => 'images/michael_brown.jpg'
                ],
                [
                  'name' => 'Lucia Ngasa',
                  'title' => 'Women’s Ministry Coordinator',
                  'contact' => 'lucia@newharvestfellowshipchurch.tz',
                  'image' => 'images/lucia.jpg'
                ],
                [
                  'name' => 'Paulo Kapela',
                  'title' => 'Children Ministry Director',
                  'contact' => 'paulo@newharvestfellowshipchurch.tz',
                  'image' => 'images/paul.jpg'
                ],
                [
                  'name' => 'David Maregesi',
                  'title' => 'Head of IT and Community Development',
                  'contact' => 'maregesi@newharvestfellowshipchurch.tz',
                  'image' => 'images/mare.jpg'
                ]
                ];
                ?>
                <style>
                  .team-member .member-details strong {
                  font-size: 1.5em; /* Increase font size for names */
                  }
                </style>
             
              <div class="team-members">
                <?php foreach ($teamMembers as $member): ?>
                  <div class="team-member" style="display: flex; margin-bottom: 30px; align-items: center;">
                    <div class="member-image" style="flex-shrink: 0; margin-right: 20px;">
                      <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>" style="width: 150px; height: auto; border-radius: 50%; object-fit: contain;">
                    </div>
                    <div class="member-details">
                      <p><strong><?php echo $member['name']; ?></strong></p>
                      <p><?php echo $member['title']; ?></p>
                      <p><a href="mailto:<?php echo $member['contact']; ?>"><?php echo $member['contact']; ?></a></p>
                    </div>
                  </div>
                <?php endforeach; ?>
            </div>
          </div> <!-- Close col-md-9 -->
        </div> <!-- Close row -->
      </div> <!-- Close container -->
    </div> <!-- Close content -->
  </div> <!-- Close main -->
<!-- Start Footer -->
<?php include "footer.php"; ?>
