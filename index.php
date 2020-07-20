<?php
	if(!isset($_SESSION)){
		session_start();
	} else {
		//do nothing
	}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bonshop | Home</title>
		<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
		<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
		<!-- <script src="https://kit.fontawesome.com/38965a6618.js" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="dist/css/style.css">
		<link rel="stylesheet" href="dist/css/all.min.css">
		<link rel="stylesheet" href="dist/css/fontawesome.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-light" style="background-color: #fff;">
			<div class="container">
				<a class="navbar-brand text-success" href="0">Bonshop</a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
					aria-expanded="false" aria-label="Toggle navigation"></button>
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-1 mt-lg-0">
						<form class="form-inline my-5 my-lg-0" method="POST">
							<input class="form-control mr-sm-2" type="text" name="q" placeholder="Cari produk">
							<button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit" name="btnSearch">Cari <i class="fas fa-search"></i></button>
						</form>
						<?php
							if(isset($_POST['q'])){
								$var = $_POST['q'];
								header("Location: search/?q=".$var);
							}
						?>
					</ul>
					<ul class="navbar-nav ml-auto mt-1 mt-lg-0">
						<li class="nav-item">
							<a class="nav-link text-success" href="helpers/confirmation.php">Konfirmasi Order <i class="fas fa-check"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="shoppingcart/"><i class="fas fa-shopping-cart"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="chat/"><i class="fas fa-comments"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="sign/">Masuk atau Daftar <i class="fas fa-sign-in-alt"></i></a>
						</li>
						<?php
							if(isset($_SESSION['id'])){
								?>
								<li class="nav-item dropdown">
									<a class="nav-link text-success dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownId">
										<a class="dropdown-item text-success" href="#">Pengaturan</a>
										<a class="dropdown-item text-success" href="#">Keluar</a>
									</div>
								</li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
		
		<div id="carouselId" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselId" data-slide-to="0" class="active"></li>
				<li data-target="#carouselId" data-slide-to="1"></li>
				<li data-target="#carouselId" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<img src="assets/img/carousel.png" width="100%" alt="First slide">
					
				</div>
				<div class="carousel-item">
					<img src="assets/img/carousel.png" width="100%" alt="Second slide">
					
				</div>
				<div class="carousel-item">
					<img src="assets/img/carousel.png" width="100%" alt="Third slide">
					
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div class="container">
			<div id="section-dua" class="mt-5">
				<h3 class="text-center">Produk Unggulan</h3>
			</div>
		</div>
		<?php
			require 'helpers/produkUnggulan.php';
		?>
		
		<div class="container">
			<div id="section-dua" class="mt-5">
				<h3 class="text-center">Promo Terbaru</h3>
			</div>
		</div>
		<div id="carouselId" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselId" data-slide-to="0" class="active"></li>
				<li data-target="#carouselId" data-slide-to="1"></li>
				<li data-target="#carouselId" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<img src="assets/img/carousel.png" width="100%" alt="First slide">
					
				</div>
				<div class="carousel-item">
					<img src="assets/img/carousel.png" width="100%" alt="Second slide">
					
				</div>
				<div class="carousel-item">
					<img src="assets/img/carousel.png" width="100%" alt="Third slide">
					
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div id="section-tiga">
			<div class="row align-items-center text-white text-center">
				<div class="col mt-5">
					<i class="fas fa-4x fa-lock"></i>
					<h3 class="mt-3">Aman</h3>
				</div>
				<div class="col mt-5">
					<i class="fas fa-4x fa-bolt"></i>
					<h3 class="mt-3">Cepat</h3>
				</div>
				<div class="col mt-5">
					<i class="fas fa-4x fa-asterisk"></i>
					<h3 class="mt-3">Kualitas Unggul</h3>
				</div>
				<div class="col mt-5">
					<i class="fas fa-4x fa-percent"></i>
					<h3 class="mt-3">Harga Terjangkau</h3>
				</div>
			</div>
		</div>
		<div class="text-white text-center" id="footer">
			&copy; <script>document.write(new Date().getFullYear())</script>, Bonshop <span class="d-none d-sm-inline-block"> - Crafted with <i class="fas fa-heart" style="color:red;"></i> by myJ0urney</span>.
		</div>
	</body>
	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
	<script type="text/javascript">
		$('.owl-carousel').owlCarousel({
			loop:true,
			margin:35,
			autoplay:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:4
				}
			}
		})
	</script>
</html>