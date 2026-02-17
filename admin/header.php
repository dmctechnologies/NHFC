<?php 

include "../connect.php";
session_start();

if (!isset($_SESSION['SESS_FIRST_NAME'])) {
	header("location: sign-in.php");
	exit();
}

$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$adminName = trim((string)($_SESSION['SESS_FIRST_NAME'] ?? 'Administrator'));
if ($adminName === '') {
	$adminName = 'Administrator';
}

$menuActive = function (array $pages) use ($currentPage) {
	return in_array($currentPage, $pages, true);
};
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Admin Panel</title>
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
	<link href="css/ui-refresh.css" rel="stylesheet" type="text/css" />
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
	<script src="../admin/ckeditor/ckeditor.js"></script>
</head>

<body class="sticky-header">
	<section>
		<!-- left side start-->
		<div class="left-side sticky-left-side">
			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php" aria-label="Home"></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i></a>
			</div>
			<!--logo and iconic logo end-->
			<div class="left-side-inner">
				<!--sidebar nav start-->
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li class="<?= $currentPage === 'index.php' ? 'active' : ''; ?>">
						<a href="index.php"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a>
					</li>
					<li class="menu-list<?= $menuActive(['compose-news.php', 'all-news.php']) ? ' nav-active' : ''; ?>">
						<a href="#"><i class="lnr lnr-list"></i><span>Service & Lessons</span></a>
						<ul class="sub-menu-list">
							<li class="<?= $currentPage === 'compose-news.php' ? 'active' : ''; ?>"><a href="compose-news.php">Compose Lessons</a></li>
							<li class="<?= $currentPage === 'all-news.php' ? 'active' : ''; ?>"><a href="all-news.php">All Lessons & Services</a></li>
						</ul>
					</li>
					<li class="menu-list<?= $menuActive(['add-exco.php', 'all-excos.php']) ? ' nav-active' : ''; ?>">
						<a href="#"><i class="lnr lnr-users"></i><span>Manage Excos</span></a>
						<ul class="sub-menu-list">
							<li class="<?= $currentPage === 'add-exco.php' ? 'active' : ''; ?>"><a href="add-exco.php">Add New</a></li>
							<li class="<?= $currentPage === 'all-excos.php' ? 'active' : ''; ?>"><a href="all-excos.php">All Excos</a></li>
						</ul>
					</li>
					<li class="menu-list<?= $menuActive(['add-event.php', 'all-events.php']) ? ' nav-active' : ''; ?>">
						<a href="#"><i class="lnr lnr-calendar-full"></i><span>Manage Events</span></a>
						<ul class="sub-menu-list">
							<li class="<?= $currentPage === 'add-event.php' ? 'active' : ''; ?>"><a href="add-event.php">New Event</a></li>
							<li class="<?= $currentPage === 'all-events.php' ? 'active' : ''; ?>"><a href="all-events.php">All Events</a></li>
						</ul>
					</li>
					<li class="menu-list<?= $menuActive(['add-photo.php', 'all-photos.php']) ? ' nav-active' : ''; ?>">
						<a href="#"><i class="lnr lnr-picture"></i><span>Manage Gallery</span></a>
						<ul class="sub-menu-list">
							<li class="<?= $currentPage === 'add-photo.php' ? 'active' : ''; ?>"><a href="add-photo.php">New Photo</a></li>
							<li class="<?= $currentPage === 'all-photos.php' ? 'active' : ''; ?>"><a href="all-photos.php">All Photos</a></li>
						</ul>
					</li>
					<li class="menu-list<?= $menuActive(['add-welcome.php', 'add-about.php', 'settings.php']) ? ' nav-active' : ''; ?>">
						<a href="#"><i class="lnr lnr-cog"></i><span>Manage Site</span></a>
						<ul class="sub-menu-list">
							<li class="<?= $currentPage === 'add-welcome.php' ? 'active' : ''; ?>"><a href="add-welcome.php">Welcome Note</a></li>
							<li class="<?= $currentPage === 'add-about.php' ? 'active' : ''; ?>"><a href="add-about.php">About Us</a></li>
							<li class="<?= $currentPage === 'settings.php' ? 'active' : ''; ?>"><a href="settings.php">Settings</a></li>
						</ul>
					</li>
					<li class="menu-list<?= $menuActive(['add-project.php', 'project-list.php']) ? ' nav-active' : ''; ?>">
						<a href="#"><i class="lnr lnr-briefcase"></i><span>Manage Projects</span></a>
						<ul class="sub-menu-list">
							<li class="<?= $currentPage === 'add-project.php' ? 'active' : ''; ?>"><a href="add-project.php">Add New Project</a></li>
							<li class="<?= $currentPage === 'project-list.php' ? 'active' : ''; ?>"><a href="project-list.php">Project List</a></li>
						</ul>
					</li>
					<li class="menu-list<?= $menuActive(['add-admin.php', 'adminlist.php']) ? ' nav-active' : ''; ?>">
						<a href="#"><i class="lnr lnr-indent-increase"></i><span>Manage Admin</span></a>
						<ul class="sub-menu-list">
							<li class="<?= $currentPage === 'add-admin.php' ? 'active' : ''; ?>"><a href="add-admin.php">Add New</a></li>
							<li class="<?= $currentPage === 'adminlist.php' ? 'active' : ''; ?>"><a href="adminlist.php">Admin List</a></li>
						</ul>
					</li>
					<li><a href="logout.php"><i class="lnr lnr-edit"></i><span>Logout</span></a></li>
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
				<button type="button" class="toggle-btn" aria-label="Toggle sidebar">
					<i class="fa fa-bars"></i>
				</button>
				<!--toggle button end-->
				<!--notification menu start -->
				<div class="menu-right">
					<div class="user-panel-top">
						<div class="profile_details">
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<div class="profile_img">
											<div class="user-name">
												<p><span><?= htmlspecialchars($adminName, ENT_QUOTES, 'UTF-8'); ?></span></p>
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
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!--notification menu end -->
			</div>
			<!-- //header-ends -->
