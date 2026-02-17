<?php include "header.php"; ?>
    <!-- End Site Header --> 
    <!-- Start Nav Backed Header -->
    <?php
        // Initialize database connection
?>
<?php
        $id=$_GET['id'];
$result = $db->prepare("SELECT * FROM projects WHERE id= :post_id"); // Ensure the table name matches your database schema
$result->bindParam(':post_id', $id);
$result->execute();
if ($result->rowCount() > 0) {
    for($i=0; $row = $result->fetch(); $i++){                        
?>
    <div class="nav-backed-header parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="project_updates.php">Project Updates</a></li>
                        <li class="active"><?php echo $row['project_title']; ?></li>
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
                        <header class="single-post-header clearfix">
                            <h2 class="post-title"><?php echo $row['project_title']; ?></h2>
                        </header>
                       
                            <div class="featured-image"> <img src="uploads/<?php echo $row['file'];?>" alt=""> </div>
<div><?php echo $row['project_detail']; ?></div>
<div class="post-meta"> 
    <!--<h5>Share this post:</h5>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://yourwebsite.com/project_post.php?id=' . $id); ?>" target="_blank">
        <img src="images/facebook.png" alt="Share on Facebook" style="width:24px;height:24px;">
    </a>
    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('http://yourwebsite.com/project_post.php?id=' . $id); ?>" target="_blank">
        <img src="images/twitter.png" alt="Share on X (Twitter)" style="width:24px;height:24px;">
    </a>
    <a href="mailto:?subject=Check out this project&body=Check out this project: <?php echo urlencode('http://yourwebsite.com/project_post.php?id=' . $id); ?>" target="_blank">
        <img src="images/gmail.jpeg" alt="Share via Email" style="width:24px;height:24px;">
    </a>
</div>
<div class="addthis_sharing_toolbox"></div>
                </div>-->
                 
            <?php } } else { ?>
                <div class="alert alert-warning">No project updates found for the given ID.</div>
            <?php } ?>
        <?php  ?>
                    <!-- Start Sidebar -->
                    <?php include"side-bar.php"; ?>
    <!-- Start Footer -->
    <?php include "footer.php"; ?>
