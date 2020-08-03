<?php
if(!isset($_SESSION)){
	session_start();
} else {
	//do nothing
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
$ID = base64_decode($_GET['p']);
$query = mysqli_query($db,"SELECT produk.*, data_produk.*
						FROM produk
						INNER JOIN data_produk
						ON produk.ID_produk = data_produk.ID_data_produk
						WHERE produk.ID_produk = $ID");
$data = mysqli_fetch_array($query);
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bonshop | Checkout</title>
		<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
		<link rel="stylesheet" href="../dist/css/style.css">
		<link rel="stylesheet" href="../dist/css/all.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-light" style="background-color: #fff;">
			<div class="container">
				<a class="navbar-brand text-success" href="../user/">Bonshop</a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
					aria-expanded="false" aria-label="Toggle navigation"></button>
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-1 mt-lg-0">
						<form class="form-inline my-5 my-lg-0">
							<input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Cari produk">
							<button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Search <i class="fas fa-search"></i></button>
						</form>
					</ul>
					<ul class="navbar-nav ml-auto mt-1 mt-lg-0">
						<li class="nav-item">
							<a class="nav-link text-success" href="../helpers/confirmation.php">Konfirmasi Order <i class="fas fa-check"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="#"><i class="fas fa-shopping-cart"></i></a>
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
										<a class="dropdown-item text-secondary" href="../user/logout.php">Keluar</a>
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
							<table class="table table-responsive" border="0">
								<tbody>
								<?php
									$no = 1;
										?>
										<tr>
											<td width="5%"><?= $no++."."; ?></td>
											<td width="35%"><?= $data['nama_produk']; ?></td>
											<td width="25%">@Rp. <span id="price"><?= $data['harga']; ?></span></td>
											<td width="20%">
												<input type="number" value="1" min="1" max="12" name="" id="qty" onchange="ubahHarga();">
											</td>
											<td width="20%"><h4>Rp. <span id="totalxharga"><?= $data['harga']; ?></span></h4></td>
										</tr>
										<tr>
											<td align="right" colspan="4"><h5>Subtotal :</h5></td>
											<td align=""><h5>Rp. <span id="subs"><?= $data['harga']; ?></span></h4></td>
										</tr>
										<tr>
											<td align="right" colspan="4">Diskon :</td>
											<td align="">Rp. 0</td>
										</tr>
										<tr>
											<td align="right" colspan="4">Total :</td>
											<td align=""><h5>Rp. <span id="total"><?= $data['harga']; ?></span></h5></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal fade" id="modelAlamat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Lengkapi alamat anda</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label for="alamat">Alamat</label>
											<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat lengkap" autocomplete="off">
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" id="simpanAlamat" data-dismiss="modal">Save</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card text-left" style="display:none;">
						<div class="card-body">
							<form id="formOrder" action="placeOrder.php" method="post">
								<?php
									$query_alamat = mysqli_query($db, "SELECT alamat FROM data_user WHERE ID_data_user =".$_SESSION['id_user']);
									$extrac_alamat = mysqli_fetch_array($query_alamat);
								?>
								<div class="form-group">
									<label for="">id user</label>
									<input type="text" class="form-control" name="ID_user" value="<?= $_SESSION['id_user']; ?>">
								</div>
								<div class="form-group">
									<label for="">id produk</label>
									<input type="text" class="form-control" name="ID_prod" value="<?= $data['ID_produk']; ?>">
								</div>
								<div class="form-group">
									<label for="">qty</label>
									<input type="text" class="form-control" name="qty" id="hasilQTY" value="1">
								</div>
								<div class="form-group">
									<label for="">totalBayar</label>
									<input type="text" class="form-control" name="totBayar" id="totBayar" value="<?= $data['harga']; ?>">
								</div>
								<div class="form-group">
									<label for="">alamat</label>
									<input type="text" class="form-control" name="alamat" id="alamatHasil">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-3 mb-5">
			<button class="btn btn-block btn-success btn-lg" id="order">Beli</button>
		</div>
	</body>
	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
	<script src="../assets/bootstrap-input-spinner-master/src/bootstrap-input-spinner.js"></script>
	<script type="text/javascript">
		$("input[type='number']").inputSpinner();
		function ubahHarga(){
			var qty = $("#qty").val();
			var price = $("#price").text();
			var subs = 0;

			subs = qty * price;
			$("#subs").text(subs).toString();
			$("#total").text(subs).toString();
			$("#totalxharga").text(subs).toString();
			$("#totBayar").val(subs).toString();
			$("#hasilQTY").val(qty).toString();
		}

		$("#simpanAlamat").click(function(){
			var alamat = $("#alamat").val().toString();
			$("#alamatHasil").val(alamat);
		})

		$("#order").click(function(){
			var isiAlamat = $("#alamat").val();
			if(isiAlamat == ""){
				$("#modelAlamat").modal('show');
			} else {
				$("#formOrder").submit();
			}
		})
	</script>
</html>