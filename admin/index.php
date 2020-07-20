<?php
	if(!isset($_SESSION)){
		session_start();
	} else {
		//do nothing
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

	<title>Admin | Bonshop</title>
	<meta content="Halaman admin BONSHOP" name="description" />
	<meta content="Bonshop" name="author" />

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="assets/css/fontawesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
	<link rel="stylesheet" href="../dist/css/dataTables.bootstrap4.min.css">
	<!-- <script src="https://kit.fontawesome.com/38965a6618.js" crossorigin="anonymous"></script> -->
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

</head>
<body>

<div id="wrapper">
	<div class="topbar">
		<div class="topbar-left">
			<a href="?p=dashboard" class="logo">
				<span class="logo-light">
					<i class="fas fa-cart-plus"></i> Bonshop
				</span>
				<span class="logo-sm">
					<i class="fas fa-cart-plus"></i>
				</span>
			</a>
		</div>

		<nav class="navbar-custom">
			<ul class="navbar-right list-inline float-right mb-0">
				<!-- full screen -->
				<li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
					<a class="nav-link waves-effect" href="#" id="btn-fullscreen">
						<i class="fas fa-expand"></i>
					</a>
				</li>

				<!-- notification -->

				<li class="dropdown notification-list list-inline-item">
					<div class="dropdown notification-list nav-pro-img">
						<a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="fas fa-cog"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
							<!-- item-->
							<a class="dropdown-item text-white" href="models/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
						</div>
					</div>
				</li>

			</ul>

			<ul class="list-inline menu-left mb-0">
				<li class="float-left">
					<button class="button-menu-mobile open-left waves-effect">
						<i class="fas fa-bars"></i>
					</button>
				</li>
				<li class="d-none d-md-inline-block">
					<form role="search" class="app-search">
						<div class="form-group mb-0">
							<input type="text" class="form-control" placeholder="Search..">
							<button type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
			</ul>
		</nav>
	</div>
	<div class="left side-menu">
		<div class="slimscroll-menu" id="remove-scroll">
			<div id="sidebar-menu">
				<ul class="metismenu" id="side-menu">
					<li class="menu-title">Menu</li>
					<li>
						<a href="?p=dashboard" class="waves-effect">
							<i class="fas fa-tachometer-alt"></i><span> Dashboard </span>
						</a>
					</li>
					<li>
						<a href="?p=user" class="waves-effect">
							<i class="fas fa-user"></i><span> User </span>
						</a>
					</li>
					<li>
						<a href="?p=pesanan" class="waves-effect">
							<i class="fas fa-cart-plus"></i><span> Pesanan </span>
						</a>
					</li>
					<li>
						<a href="?p=produk" class="waves-effect">
							<i class="fas fa-table"></i><span> Produk </span>
						</a>
					</li>
				</ul>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="main-panel">
		<div class="content-page">
			<div class="content">
				<div class="container-fluid">
					<?php
						if(isset($_GET['p'])){
							$page = $_GET['p'];
							if($page == ""){
								require "views/dashboard.php";
							} else if($page == "dashboard"){
								require "views/dashboard.php";
							} else if($page == "produk"){
								require "views/produk.php";
							} else if($page == "user"){
								require "views/user.php";
							} else if($page == "pesanan"){
								require "views/pesanan.php";
							} else {
								require "views/404.php";
							}
						} else {
							require "views/dashboard.php";
						}
						
					?>
				</div>
			</div>
		</div>
		<footer class="footer">
			&copy; <script>document.write(new Date().getFullYear())</script>, Bonshop <span class="d-none d-sm-inline-block"> - Crafted with <i class="fas fa-heart" style="color:red;"></i> by myJ0urney</span>.
		</footer>

	</div>
</div>
</body>
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>
	<script src="assets/js/raphael.min.js"></script>
	
	<script src="../dist/js/jquery.dataTables.min.js"></script>
	<script src="../dist/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/app.js"></script>
</html>
