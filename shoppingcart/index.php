<?php
if(!isset($_SESSION)){
	session_start();
} else {
	//hello from the other side
}

include '../core/database.php';

if(isset($_SESSION['id_user'])){
	$q_select_user = mysqli_query($db, "SELECT user.*, data_user.* 
										FROM user
										INNER JOIN data_user
										ON user.ID_user = data_user.ID_data_user
										WHERE user.ID_user =".$_SESSION['id_user']);
	$ext_select_user = mysqli_fetch_array($q_select_user);
}

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bonshop | Keranjang</title>
		<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
		<link rel="stylesheet" href="../dist/style.css">
		<link rel="stylesheet" href="../dist/css/all.min.css">
		<link rel="stylesheet" href="../dist/css/fontawesome.min.css">
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
							<input class="form-control form-control-sm mr-sm-2" type="text" name="q" placeholder="Cari produk">
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
										<a class="dropdown-item text-secondary" href="../user/profile.php"><?= $ext_select_user['nama_depan']." ".$ext_select_user['nama_belakang']; ?></a>
										<div class="dropdown-divider"></div>
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
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-12">
					<div class="card border-success">
						<div class="card-body">
							<h4 class="card-title">Keranjang</h4>
							<table class="table" border="0">
								<tbody>
									<?php
										if(isset($_SESSION['keranjang'])){
											$no = 1;
											foreach($_SESSION['keranjang'] as $listCart){
												?>
												<tr>
													<td width="5%"><?= $no++; ?></td>
													<td width="45%"><?= $listCart['nama_produk']; ?></td>
													<td width="20%">
														<input type="number" value="<?= $listCart['qty'] ?>" min="1" max="12" name="" id="" >
													</td>
													<td width="20%">Rp. <?= $listCart['harga']; ?></td>
													<td width="10%"><i class="fas fa-trash"></i></td>
												</tr>
												<?php
											}
										} else {
											echo "Keranjang anda masih kosong!";
										}
									?>
									<tr>
										<td align="right" colspan="3"><h5>Subtotal :</h5></td>
										<td align=""><h5>Rp. 1230</h4></td>
									</tr>
									<tr>
										<td align="right" colspan="3">Total :</td>
										<td align=""><h5>Rp. 1230</h5></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
	<script src="../assets/bootstrap-input-spinner-master/src/bootstrap-input-spinner.js"></script>
	<script type="text/javascript">
		$("input[type='number']").inputSpinner();
	</script>
</html>