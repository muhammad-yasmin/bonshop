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
		<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
		<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/38965a6618.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../dist/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-light" style="background-color: #fff;">
			<div class="container">
				<a class="navbar-brand text-success" href="../user/">Bonshop</a>
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
								header("Location: ../search/?q=".$var);
							}
						?>
					</ul>
					<ul class="navbar-nav ml-auto mt-1 mt-lg-0">
						<li class="nav-item">
							<a class="nav-link text-success" href="../helpers/confirmation.php">Konfirmasi Order <i class="fas fa-check"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="../shoppingcart/"><i class="fas fa-shopping-cart"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="../chat/"><i class="fas fa-comments"></i></a>
						</li>
						<?php
							if(isset($_SESSION['id_user'])){
								?>
								<li class="nav-item dropdown">
									<a class="nav-link text-success dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownId">
										<a class="dropdown-item text-primary" href="#">Profil</a>
										<a class="dropdown-item text-primary" href="../user/logout.php">Keluar</a>
									</div>
								</li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
		<?php
			include '../core/database.php';
			$var = $_GET['q'];
			$query = mysqli_query($db, "SELECT produk.*, data_produk.* 
										FROM produk
										INNER JOIN data_produk
										ON produk.ID_produk = data_produk.ID_data_produk
										WHERE nama_produk LIKE '%$var%' AND stok <> 0 LIMIT 6");
			$count = mysqli_num_rows($query);
		?>
		<div class="jumbotron">
			<h3 class="display-4">Hasil pencarian untuk <b>"<?= $var; ?>"<b></h3>
			<h4><?= $count; ?> pc(s) produk</h4>
		</div>
		<div class="container">
			<div class="row">
			<?php 
				while($extr = mysqli_fetch_array($query)){
					?>
					<div class="col-md-3">
						<div class="card outline-success">
							<div class="card-body">
								<img src="../assets/img/produk/<?= $extr['url_foto']; ?>" class="rounded img-fluid" alt="">
								<h5 class="card-title"><b><?= $extr['nama_produk']; ?></b></h5>
								<p class="">Rp. <?= $extr['harga']; ?></p>
								<a class="btn btn-block btn-success mt-3 text-white" href="../checkout/?p=<?php echo base64_encode($extr['ID_produk']); ?>">Beli Sekarang</a>
							</div>
						</div>
					</div>
					<?php
				}
			?>
			</div>
		</div>
	</body>
	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
</html>