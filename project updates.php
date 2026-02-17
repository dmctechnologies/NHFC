<?php include "header.php"; ?>
  <!-- End Site Header --> 
  <!-- Start Nav Backed Header -->
  <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Project Updates</li>
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
          <h1>Latest Projects</h1>
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
          <div class="col-md-9 posts-archive">
        <?php
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }

        $tbl_name = "projects"; // your table name
        $adjacents = 3;

        $get_projects = ORM::for_table("$tbl_name")->find_array();
        $total_pages = count($get_projects);

        $targetpage = "pagination.php"; // your file name (the name of this file)
        $limit = 5; // how many items to show per page
        $page = $_GET['page'];
        if ($page) {
            $start = ($page - 1) * $limit; // first item to display on this page
        } else {
            $start = 0; // if no page var is given, set start to 0
        }

        $projects = ORM::for_table("projects")
            ->select('id')
            ->select('project_title')
            ->select('project_detail')
            ->select('file')
            ->limit($limit)
            ->offset($start)
            ->order_by_desc('projects.id')
            ->find_array();

        if ($page == 0) $page = 1;
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total_pages / $limit);
        $lpm1 = $lastpage - 1;

        foreach ($projects as $row):
        ?>
            <article class="post">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <a href="project_post.php?id=<?php echo $row['id']; ?>">
                            <img src="uploads/<?php echo htmlspecialchars($row['file'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row['project_title'], ENT_QUOTES, 'UTF-8'); ?>" class="img-thumbnail img-responsive">
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2>
                            <a href="project_post.php?id=<?php echo $row['id']; ?>">
                                <?php echo htmlspecialchars($row['project_title'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h2>
                        
                        <?php echo isset($row['project_detail']) ? strip_tags(substr($row['project_detail'], 0, 180)) : 'No description available'; ?>...
                        <p>
                            <a href="project_post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                Continue reading <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>

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
                <a class="btn btn-default" href="?page=<?= $prev ?>"><i class="">Page <?= $prev ?> <<</i></a>
            <?php endif; ?>

            <?php if ($lastpage != $next - 1): ?>
                <a class="btn btn-default" href="?page=<?= $next ?>"><i class="">>> Page <?= $next ?></i></a>
            <?php endif; ?>
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
