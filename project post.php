<?php include "header.php"; ?>
<!-- End Site Header -->
<?php
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$result = $db->prepare("SELECT * FROM projects WHERE id = :post_id");
$result->bindParam(':post_id', $id, PDO::PARAM_INT);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
?>
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="project_updates.php">Project Updates</a></li>
          <li class="active"><?php echo $row ? htmlspecialchars($row['project_title'], ENT_QUOTES, 'UTF-8') : 'Project Not Found'; ?></li>
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
      <div class="col-md-8 col-sm-8">
        <h1>Project Post</h1>
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
          <?php if ($row): ?>
            <header class="single-post-header clearfix">
              <h2 class="post-title"><?php echo htmlspecialchars($row['project_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
            </header>
            <article class="post-content">
              <div class="featured-image">
                <img src="uploads/<?php echo htmlspecialchars($row['file'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($row['project_title'], ENT_QUOTES, 'UTF-8'); ?>">
              </div>
              <div><?php echo $row['project_detail']; ?></div>
            </article>
          <?php else: ?>
            <div class="alert alert-warning">No project updates found for the given ID.</div>
          <?php endif; ?>
        </div>

        <!-- Start Sidebar -->
        <?php include "side-bar.php"; ?>
      </div>
    </div>
  </div>
</div>

<!-- Start Footer -->
<?php include "footer.php"; ?>
