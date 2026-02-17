<?php 

include "../connect.php";
session_start();

if (!isset($_SESSION['SESS_FIRST_NAME'])) {
	header("location: sign-in.php");
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>NHFC Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Custom CSS -->
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type="text/css" />
	<!-- //lined-icons -->
	<!-- chart -->
	<script src="js/Chart.js"></script>
	<!-- //chart -->
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!--//end-animate-->
	<!----webfonts--->
	<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<!---//webfonts--->
	<!-- Meters graphs -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- Placed js at the end of the document so the pages load faster -->
	<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
	<script src="../admin/ckeditor/ckeditor.js"></script>
</head>

<body class="sticky-header left-side-collapsed" onload="initMap()">
	<section>
		<!-- left side start-->
		<div class="left-side sticky-left-side">
			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php">NHFC Admin</a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i></a>
			</div>
			<!--logo and iconic logo end-->
			<div class="left-side-inner">
				<!--sidebar nav start-->
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li><a href="index.php"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-list"></i><span>Service & Lessons</span></a>
						<ul class="sub-menu-list">
							<li><a href="compose-news.php">Compose Lessons</a></li>
							<li><a href="all-news.php">All Lessons & Services</a></li>
						</ul>
					</li>
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-calendar-full"></i><span>Manage Events</span></a>
						<ul class="sub-menu-list">
							<li><a href="add-event.php">New Event</a></li>
							<li><a href="all-events.php">All Events</a></li>
						</ul>
					</li>
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-picture"></i><span>Manage Gallery</span></a>
						<ul class="sub-menu-list">
							<li><a href="add-photo.php">New Photo</a></li>
							<li><a href="all-photos.php">All Photos</a></li>
						</ul>
					</li>
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-cog"></i><span>Manage Site</span></a>
						<ul class="sub-menu-list">
							<li><a href="add-welcome.php">Welcome Note</a></li>
							<li><a href="settings.php">Settings</a></li>
						</ul>
					</li>
					<li class="menu-list">
						<a href="#"><i class="lnr lnr-indent-increase"></i><span>Manage Admin</span></a>
						<ul class="sub-menu-list">
							<li><a href="add-admin.php">Add New</a></li>
							<li><a href="adminlist.php">Admin List</a></li>
						</ul>
					</li>
					<li><a href="logout.php"><i class="lnr lnr-edit"></i><span>LogOut</span></a></li>
				</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
				<!--toggle button start-->
				<a class="toggle-btn menu-collapsed"><i class="fa fa-bars"></i></a>
				<!--toggle button end-->
				<!--notification menu start -->
				<div class="menu-right">
					<div class="user-panel-top">
						<div class="profile_details">
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<div class="profile_img">
											<span style="background:url(images/) no-repeat center"></span>
											<div class="user-name">
												<p><span>Administrator</span></p>
											</div>
											<i class="lnr lnr-chevron-down"></i>
											<i class="lnr lnr-chevron-up"></i>
											<div class="clearfix"></div>
										</div>
									</a>
									<ul class="dropdown-menu drp-mnu">
										<li><a href="settings.php"><i class="fa fa-cog"></i> Settings</a></li>
										<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
									</ul>
								</li>
								<div class="clearfix"></div>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!--notification menu end -->
			</div>
			<!-- //header-ends -->
