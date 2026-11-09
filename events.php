<?php include "header.php"; ?>
<!-- End Site Header -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9969807679459868"
     crossorigin="anonymous"></script>
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Events</li>
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
        <h1>Events</h1>
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
                <div class="col-md-6 col-sm-6">
                  <h2>All events</h2>
                </div>

              </div>
            </header>
            <section class="listing-cont">
              <ul>
                <?php
                if (!isset($_GET["page"])) {
                  $_GET["page"] = 1;
                }

                $tbl_name = "events";    //your table name
                // How many adjacent pages should be shown on each side?
                $adjacents = 3;

                $count_stmt = $db->query("SELECT COUNT(*) AS num FROM $tbl_name");
                $total_pages = (int)($count_stmt ? $count_stmt->fetchColumn() : 0);


                /* Setup vars for query. */
                $targetpage = "pagination.php";   //your file name  (the name of this file)
                $limit = 5;                 //how many items to show per page
                $page = $_GET['page'];
                if ($page)
                  $start = ($page - 1) * $limit;       //first item to display on this page
                else
                  $start = 0;                //if no page var is given, set start to 0

                /* Get data. */

                //$news = $db->prepare("SELECT * FROM posts_tbl  ORDER BY id ASC LIMIT $start, $limit");
                //$news->execute();




                $start = max(0, (int)$start);
                $limit = max(1, (int)$limit);
                $news_stmt = $db->prepare("SELECT * FROM $tbl_name ORDER BY id DESC LIMIT :start, :limit");
                $news_stmt->bindValue(':start', $start, PDO::PARAM_INT);
                $news_stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $news_stmt->execute();
                $news = $news_stmt->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <?php if (count($news) === 0): ?>
                  <li class="item event-item">
                    <div class="event-detail">
                      <h3>No events yet</h3>
                    </div>
                  </li>
                <?php endif; ?>
                <?php foreach ($news as $row): ?>


                  <?php
                  /* Setup page vars for display. */
                  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
                  $prev = $page - 1;              //previous page is page - 1
                  $next = $page + 1;              //next page is page + 1
                  $lastpage = ceil($total_pages / $limit);    //lastpage is = total pages / items per page, rounded up.
                  $lpm1 = $lastpage - 1;            //last page minus 1
                  ?>
                  <li class="item event-item">
                    <div class="event-detail">
                      <?php if (!empty($row['thumbnail'])): ?>
                        <div class="event-thumb">
                          <a href="event-detail.php?id=<?php echo $row['id']; ?>">
                            <img src="uploads/<?php echo htmlspecialchars($row['thumbnail'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>">
                          </a>
                        </div>
                      <?php endif; ?>
                      <h3><a href="event-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
                      <span class="event-dayntime meta-data"><?php echo $row['date']; ?> | <?php echo $row['time']; ?></span>
                    </div>
                  </li>
                <?php endforeach; ?>

                <?php ?>

              </ul>
              <span class="text-muted m-r-sm">

                Showing
                <?php if ($lastpage == $next - 1): ?>
                  <?= $total_pages ?>
                <?php else: ?>
                  <?= $page * $limit ?>
                <?php endif; ?>
                of <?= $total_pages ?>

              </span>
              <div class="btn-group">

                <?php if ($page != 1): ?>
                  <a class="btn btn-default" href="?page=<?= $prev ?>"><i class="">Page <?= $prev ?> &lt;&lt;</i></a>
                <?php endif; ?>

                <?php if ($lastpage == $next - 1): ?>

                <?php else: ?>
                  <a class="btn btn-default" href="?page=<?= $next ?>"><i class="">>>Page <?= $next ?></i></a>
                <?php endif; ?>
              </div>
            </section>
          </div>
        </div>
        <!-- Start Sidebar -->
        <?php include "side-bar.php"; ?>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Start Footer -->
<?php include "footer.php"; ?>
