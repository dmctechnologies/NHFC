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
                    'title' => "Women's Ministry Leader",
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
                    'name' => 'Evangelist Emmanuel Robert',
                    'title' => 'Mission Director',
                    'contact' => 'evemmanuel@newharvestfellowshipchurch.tz',
                    'image' => 'images/michael_brown.jpg'
                  ],
                  [
                    'name' => 'Lucia Ngasa',
                    'title' => "Women's Ministry Coordinator",
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

                $hierarchy = [
                  'Lead Pastor' => 1,
                  'Assistant Pastor' => 2,
                  'General Secretary' => 3,
                  'Mission Director' => 4,
                  "Women's Ministry Leader" => 5,
                  "Women's Ministry Coordinator" => 6,
                  'Children Ministry Director' => 7,
                  'Head of IT and Community Development' => 8
                ];

                usort($teamMembers, function ($a, $b) use ($hierarchy) {
                  $rankA = $hierarchy[$a['title']] ?? 99;
                  $rankB = $hierarchy[$b['title']] ?? 99;

                  if ($rankA === $rankB) {
                    return strcmp($a['name'], $b['name']);
                  }

                  return $rankA <=> $rankB;
                });
                ?>

              <div class="team-members">
                <?php foreach ($teamMembers as $member): ?>
                  <?php
                  $member_image = $member['image'];
                  if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $member_image)) {
                    $member_image = 'images/pastor.jpg';
                  }
                  ?>
                  <div class="team-member">
                    <div class="member-image">
                      <img src="<?php echo htmlspecialchars($member_image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="member-details">
                      <p><strong><?php echo htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
                      <p><?php echo htmlspecialchars($member['title'], ENT_QUOTES, 'UTF-8'); ?></p>
                      <p><a href="mailto:<?php echo htmlspecialchars($member['contact'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($member['contact'], ENT_QUOTES, 'UTF-8'); ?></a></p>
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
