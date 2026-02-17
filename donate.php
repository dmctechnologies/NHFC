<?php include "header.php"; ?>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div id="video-popup" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://youtu.be/dIbijhPkISo" allow="autoplay; encrypted-media"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    $('#video-popup').modal('show');
  });
</script>
<!-- End Site Header --> 
<!-- Paypal section -->
<script 
  src="https://www.paypal.com/sdk/js?client-id=BAAGTtH12ZTYRERcHjdmeSkGu8VeNuQVOFiroJO7RuN6u19hwkjpGA05BWUaH2Jgqed-wUvonziQxjJUZ8&components=hosted-buttons&disable-funding=venmo&currency=USD">
</script>
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Projects</li>
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
        <h1>Projects</h1>
      </div>  
      <div class="col-md-2 col-sm-2 col-xs-4">
        <a href="project_updates.php" class="pull-right btn btn-primary">All Projects</a>
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
          <header class="single-post-header clearfix">
            <h2 class="post-title">CHURCH BUILDING </h2>
          </header>
          <article class="post-content cause-item">
            <span class="post-meta meta-data">
              <span><i class="fa fa-calendar"></i> 28th April, 2025</span>
              <span><i class="fa fa-archive"></i> <a href="#">NHFC Tanzania</a>, <a href="#">Chibe-Shinyanga</a></span>
            </span>
            <div class="spacer-20"></div>
            <div class="row">
              <div class="col-md-7">
                <img src="images/b.jpg" class="img-responsive">
              </div>
              <div class="col-md-5">
                <ul class="list-group">
                  <li class="list-group-item">
                    <h4>Progress</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" id="progress-bar-church" style="width: 0%;" data-appear-animation-delay="200"></div>
                    </div>
                  </li>
                  <li class="list-group-item"><span class="badge" id="amount-needed">$40,000</span> Amount Needed</li>
                  <li class="list-group-item"><span class="badge" id="amount-collected">$0</span> Collected</li>
                  <li class="list-group-item"><span class="badge">365</span> Days left to achieve target</li>
                </ul>
                <div id="paypal-container-BHRRX6WHBT7W2"></div>
<script>
  paypal.HostedButtons({
    hostedButtonId: "BHRRX6WHBT7W2",
  }).render("#paypal-container-BHRRX6WHBT7W2")
</script>
              </div>

              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const donationSelect = document.querySelector('select[name="donation-amount"]');
                  const customAmountInput = document.querySelector('input[name="custom-donation-amount"]');
                  const amountCollected = document.getElementById('amount-collected');
                  const progressBar = document.getElementById('progress-bar-church');
                  const totalAmountNeeded = 200000; // Total amount needed in dollars

                  function updateProgress(donation) {
                    const collected = parseFloat(donation) || 0;
                    const percentage = Math.min((collected / totalAmountNeeded) * 100, 100);
                    amountCollected.textContent = `$${collected.toLocaleString()}`;
                    progressBar.style.width = `${percentage}%`;
                  }

                  donationSelect.addEventListener('change', function () {
                    if (this.value === 'Custom') {
                      customAmountInput.parentElement.style.display = 'block';
                      customAmountInput.addEventListener('input', function () {
                        updateProgress(this.value);
                      });
                    } else {
                      customAmountInput.parentElement.style.display = 'none';
                      updateProgress(this.value);
                    }
                  });

                  customAmountInput.parentElement.style.display = 'none'; // Hide custom input by default
                });
              </script>
            </div>
            <div class="spacer-30"></div>
            <p><strong>Church Building Project</strong></p>
            <p><em>Help Us Establish a Permanent Home for Worship and Community Transformation</em></p>
            <p>
            New Harvest Fellowship Church is a growing and vibrant community of believers located in Chibe, Shinyanga, Tanzania. Since our founding during the COVID-19 pandemic in 2020, we have become a beacon of hope in a region deeply affected by poverty, alcoholism, illiteracy, and spiritual darkness.
            </p>
            <p>
            Currently, we gather for worship, discipleship, and community outreach under temporary structures that are vulnerable to weather conditions and offer limited space for the growing number of worshipers—now over 200 believers and counting.
            </p>
            <h4>Why a Church Building Matters</h4>
            <p>
            Having a permanent church structure is not just about shelter. It’s about establishing a house of hope, a center for discipleship, and a safe space where lives are transformed through the Gospel of Jesus Christ. A church building will serve as:
            </p>
            <ul>
              <li>A permanent place for worship, teaching, and prayer</li>
              <li>A training center for church planters, youth, and children's ministries</li>
              <li>A meeting space for women’s fellowships, community support groups, and outreach programs</li>
              <li>A reliable gathering place during the rainy season and harsh weather</li>
            </ul>
            <h4>Our Goal: $40,000</h4>
            <p>
            We are prayerfully seeking a one-time donation of $40,000 to help us construct a modest yet durable church building that will serve our congregation and the wider community for generations to come.
            </p>
            <p>Your support will go toward:</p>
            <ul>
              <li>Purchasing building materials (cement, bricks, roofing sheets, timber)</li>
              <li>Labor costs for skilled and unskilled workers</li>
              <li>Installing doors, windows, and flooring</li>
              <li>Basic furnishings such as benches and a pulpit</li>
            </ul>
            <h4>Be Part of What God is Doing</h4>
            <p>
            We invite you to partner with us in this step of faith. Whether you are an individual, a church, or a missions organization, your one-time gift will help us create a lasting spiritual foundation in Chibe.
            </p>
            <p><strong>Donate Today — Help Us Build the House of the Lord</strong></p>
            <p><em>"Unless the Lord builds the house, the builders labor in vain." – Psalm 127:1</em></p>
            <a href="https://drive.google.com/drive/folders/1IgdCH6In7ii8yXnF8rjVZCGT9dHdRojQ?usp=drive_link" class="btn btn-primary">Read More</a>
          </article>    
        </div>
        <?php include "side-bar.php"; ?>
      </div>
    </div>
  </div>
</div>
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <header class="single-post-header clearfix">
            <h2 class="post-title">EXPANSION OF FAR VISION CHILDREN SCHOOL</h2>
          </header>
          <article class="post-content cause-item">
            <span class="post-meta meta-data">
              <span><i class="fa fa-calendar"></i> 28th April, 2025</span>
              <span><i class="fa fa-archive"></i> <a href="#">NHFC Tanzania</a>, <a href="#">Chibe-Shinyanga</a></span>
            </span>
            <div class="spacer-20"></div>
            <div class="row">
              <div class="col-md-7">
                <img src="images/j.jpg" class="img-responsive">
              </div>
              <div class="col-md-5">
                <ul class="list-group">
                  <li class="list-group-item">
                    <h4>Progress</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" id="progress-bar" style="width: 0%;" data-appear-animation-delay="200"></div>
                    </div>
                  </li>
                  <li class="list-group-item"><span class="badge" id="amount-needed">$200,000</span> Amount Needed</li>
                  <li class="list-group-item"><span class="badge" id="amount-collected">$0</span> Collected</li>
                  <li class="list-group-item"><span class="badge">365</span> Days left to achieve target</li>
                </ul>
                <div id="paypal-container-9RFE2X78Q93FJ"></div>
<script>
  paypal.HostedButtons({
    hostedButtonId: "9RFE2X78Q93FJ",
  }).render("#paypal-container-9RFE2X78Q93FJ")
</script>
              </div>

              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const donationSelect = document.querySelector('select[name="donation amount"]');
                  const customAmountInput = document.querySelector('input[name="Custom Donation Amount"]');
                  const amountCollected = document.querySelector('#amount-collected');
                  const progressBar = document.querySelector('#progress-bar');
                  const totalAmountNeeded = 200000; // Total amount needed in dollars

                  function updateProgress(donation) {
                    const collected = parseFloat(donation) || 0;
                    const percentage = Math.min((collected / totalAmountNeeded) * 100, 100);
                    amountCollected.textContent = `$${collected.toLocaleString()}`;
                    progressBar.style.width = `${percentage}%`;
                  }

                  donationSelect.addEventListener('change', function () {
                    if (this.value === 'Custom') {
                      customAmountInput.parentElement.style.display = 'block';
                      customAmountInput.addEventListener('input', function () {
                        updateProgress(this.value);
                      });
                    } else {
                      customAmountInput.parentElement.style.display = 'none';
                      updateProgress(this.value);
                    }
                  });

                  customAmountInput.parentElement.style.display = 'none'; // Hide custom input by default
                });
              </script>
            </div>
            <div class="spacer-30"></div>
            <p><strong>Far Vision School: Giving Orphans and Vulnerable Children a Brighter Start</strong></p>
            <p>
            Far Vision School is an ongoing and life-changing initiative by New Harvest Fellowship Church, located in Chibe, Shinyanga, Tanzania. Established in response to the urgent educational and social needs of the most vulnerable in our community, Far Vision School provides free preschool education to orphans and vulnerable children aged 3–5 years.
            </p>
            <p>
            In a region where poverty, HIV/AIDS, domestic violence, and illiteracy have devastated families, many young children are left without care or access to early learning opportunities. These children often face neglect, hunger, and a future without hope. Far Vision School was birthed out of a deep burden to offer a new path—one rooted in Christ’s love, educational opportunity, and holistic care.
            </p>

            <h4>What We Do</h4>
            <p>At Far Vision School, we currently serve over 110 children by offering:</p>
            <ul>
              <li>Free early childhood education focused on foundational literacy, numeracy, social skills, and spiritual formation.</li>
              <li>A nurturing environment where children are treated with dignity and taught values that shape character and responsibility.</li>
              <li>Safe shelter during school hours to protect children from the dangers of the streets or abuse at home.</li>
              <li>A Christ-centered approach that emphasizes love, discipline, and purpose.</li>
            </ul>

            <h4>Our Areas of Need</h4>
            <p>As we continue to grow and serve more children, we face several pressing needs that require the generosity and partnership of caring individuals and organizations:</p>
            <ol>
              <li><strong>School Supplies</strong>
                <ul>
                  <li>Exercise books and pencils</li>
                  <li>School bags</li>
                  <li>Drawing and coloring materials</li>
                  <li>Storybooks and educational charts</li>
                  <li>School uniforms</li>
                </ul>
              </li>
              <li><strong>Nutritious Meals</strong>
                <p>Many of the children arrive at school hungry. We provide simple meals and tea daily, but rising food costs and increased enrollment stretch our limited resources. We aim to offer consistent, nutritious meals that support learning and physical development.</p>
              </li>
              <li><strong>Staff Salaries</strong>
                <p>Our committed team of teachers and caregivers play a vital role in shaping these young lives. However, we struggle to provide adequate and consistent support for their salaries. Sustaining our staff is key to maintaining quality education and care.</p>
              </li>
              <li><strong>Learning Toys and Teaching Aids</strong>
                <p>Play-based learning is crucial at the preschool level. We are seeking age-appropriate toys, puzzles, learning games, and other hands-on materials that stimulate creativity and help children learn through play.</p>
              </li>
              <li><strong>School Expansion Project</strong>
                <p>Our long-term vision includes expanding Far Vision School to accommodate more children and eventually offer education up to the primary levels. We are currently using limited classroom space and lack dedicated facilities. To upgrade into a dedicated boarding primary school, we would need additional permanent structures such as:</p>
                <ul>
                  <li>6 classrooms</li>
                  <li>A library and administrative offices</li>
                  <li>Hostels for boarding facilities</li>
                  <li>School vans</li>
                </ul>
                <p>Your support can help us build:</p>
                <ul>
                  <li>Additional classrooms</li>
                  <li>A small kitchen and dining space</li>
                  <li>Sanitation facilities</li>
                  <li>A playground area</li>
                </ul>
                <p>Currently, Far Vision is seeking a one-time donation of $200,000 to upgrade into a fully functioning pre-primary school.</p>
              </li>
            </ol>

            <h4>Get Involved</h4>
            <p>
            We invite you to partner with us in this vital work. Whether through a one-time donation or ongoing sponsorship, your support can make a lasting impact in the lives of children who would otherwise be forgotten. With your help, we can continue to bring hope, education, and transformation to the next generation in Chibe.
            </p>
            <a href="farvision.php" class="btn btn-primary">Sponsor a Child | Contact Us</a>
            <p><em>Together, we can give every child a future with hope.</em></p>
            <a href="https://drive.google.com/drive/folders/1MkbS0_3LJb2qeVo-YQ05g_q66t7n9gEV?usp=drive_link" class="btn btn-primary">Read More</a>
          </article>
          <!-- Payment Modal Window -->       
        </div>
        <?php include "side-bar.php"; ?>
      </div>
    </div>
  </div>
</div>
<!-- Start Footer -->
<?php include "footer.php"; ?>
