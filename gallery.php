<?php include "header.php"; ?>

<!-- Nav Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Photo Gallery</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Page Header -->
<div class="page-header">
  <div class="container">
    <h1>Photos</h1>
  </div>
</div>

<!-- Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">

      <div class="row">
        <ul class="isotope-grid" data-sort-id="gallery">

<?php
// Pagination setup
if (!isset($_GET["page"])) {
    $_GET["page"] = 1;
}

$tbl_name = "gallery";
$limit = 16;
$page = (int)$_GET['page'];
$start = ($page - 1) * $limit;

// Get total count
$total_pages = ORM::for_table($tbl_name)->count();

// Fetch gallery items
$news = ORM::for_table($tbl_name)
    ->order_by_desc('id')
    ->limit($limit)
    ->offset($start)
    ->find_array();

// Page calculations
$lastpage = ceil($total_pages / $limit);
$prev = $page - 1;
$next = $page + 1;
?>

<?php foreach ($news as $row): ?>
  <li class="col-md-3 col-sm-3 grid-item post format-image">
    <div class="grid-item-inner">

      <a href="uploads/<?php echo $row['file']; ?>"
         data-rel="prettyPhoto[gallery]"
         title="<?php echo htmlspecialchars($row['caption']); ?>"
         class="media-box">

        <img src="uploads/<?php echo $row['file']; ?>"
             alt="<?php echo htmlspecialchars($row['caption']); ?>">
      </a>

      <!-- Caption BELOW image -->
      <?php if (!empty($row['caption'])): ?>
        <div class="gallery-caption-below">
          <?php echo htmlspecialchars($row['caption']); ?>
        </div>
      <?php endif; ?>

    </div>
  </li>
<?php endforeach; ?>

        </ul>
      </div>

      <!-- Pagination -->
      <div class="text-align-center">
        <span class="text-muted m-r-sm">
          Showing
          <?php echo ($page * $limit > $total_pages) ? $total_pages : $page * $limit; ?>
          of <?php echo $total_pages; ?>
        </span>

        <div class="btn-group">
          <?php if ($page > 1): ?>
            <a class="btn btn-default" href="?page=<?php echo $prev; ?>">
              &laquo; Page <?php echo $prev; ?>
            </a>
          <?php endif; ?>

          <?php if ($page < $lastpage): ?>
            <a class="btn btn-default" href="?page=<?php echo $next; ?>">
              Page <?php echo $next; ?> &raquo;
            </a>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include "footer.php"; ?>
