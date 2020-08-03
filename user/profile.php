<?php
    include "../core/database.php";
    if(!isset($_SESSION)){
        session_start();
    } else {
        //do nothing
    }

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
    <title>Profil | Bonshop</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
	<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../dist/css/dataTables.bootstrap4.min.css">
    <!-- <script src="../https://kit.fontawesome.com/38965a6618.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="../dist/css/style.css">
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
										<a class="dropdown-item text-secondary" href="#"><?= $ext_select_user['nama_depan']." ".$ext_select_user['nama_belakang']; ?></a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item text-secondary" href="logout.php">Keluar</a>
									</div>
								</li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="jumbotron text-center">
			<h2 class="display-4"><b>Akun Saya</b></h2>
			<p class="lead">
				<span><?= $ext_select_user['nama_depan']." ".$ext_select_user['nama_belakang']; ?></span>
				<a class="btn btn-outline-success btn-sm ml-3" href="logout.php" role="button">Keluar</a>
			</p>
		</div>
		<div class="container">
			<ul class="nav justify-content-center nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" id="tentang">Tentang saya</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="order">Pesanan saya</a>
				</li>
			</ul>
			<div id="rincian">
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="card border-success">
							<div class="card-body">
								<h5 class="card-title mb-2"><b>Data diri</b></h5>
								<p class="card-text mb-2">Nama : <?= $ext_select_user['nama_depan']." ".$ext_select_user['nama_belakang']; ?></p>
								<p class="card-text mb-2">Telepon : <?= $ext_select_user['nomor_telp']; ?></p>
								<p class="card-text mb-2">Jenis kelamin : <?= ($ext_select_user['ID_jk'] == 1)?"Perempuan":"Laki-laki"; ?></p>
								<p class="card-text mb-2">Tanggal lahir : <?= $ext_select_user['tgl_lahir']; ?></p>
								<p class="card-text mb-2">Username : <?= $ext_select_user['username']; ?></p>
								<p class="card-text mb-2">Password : <?= base64_decode($ext_select_user['password']); ?></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card border-success">
							<div class="card-body">
								<h5 class="card-title mb-2"><b>Alamat lengkap</b></h5>
								<p class="card-text mb-2"><?= $ext_select_user['alamat']; ?></p>
							</div>
						</div>
						<div class="card border-danger mt-4">
							<div class="card-body">
								<h5 class="card-title mb-2"><b>Hapus akun?</b></h5>
								<p class="card-text mb-2">Menghapus akun akan menghilangkan data akun anda pada sistem ini.</p>
								<button class="btn btn-block btn-danger">Hapus Akun</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="pesanan" style="display:none;">
				<div class="card border-success mt-4 mb-3">
					<div class="card-body">
						<table class="table table-hover" id="tbl_profil">
							<thead class="">
								<tr>
									<th>ID Pesanan</th>
									<th>Tanggal</th>
									<th>Qty(s)</th>
									<th>Status</th>
									<th>Total</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$q = "SELECT * FROM pemesanan WHERE pemesanan.ID_user =".$ext_select_user['ID_user'];
									$q_pemesanan = mysqli_query($db, $q);
									while($data = mysqli_fetch_array($q_pemesanan)){
										?>
										<tr>
											<td><b>ORDER<?= $data['ID_order']; ?></b></td>
											<td><?= $data['tgl_masuk']; ?></td>
											<td><?= $data['jumlah_produk']; ?> pc(s)</td>
											<td>
												<?php if($data['status_order'] == 1){
													echo "Menunggu Konfirmasi";
												} else if($data['status_order'] == 2) {
													echo "Telah di konfirmasi";
												} else if($data['status_order'] == 3) {
													echo "Diproses";
												} else {
													echo "Dibatalkan";
												}
												?>
											</td>
											<td><b>Rp. <?= number_format($data['total_bayar'] / 1000, 3, ".", ""); ?></b></td>
											<td><button class="btn btn-sm btn-secondary">Lihat Selengkapnya</button></td>
										</tr>
										<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </body>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
	<script src="../dist/js/jquery.dataTables.min.js"></script>
	<script src="../dist/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tbl_profil").dataTable();
		});
		$("#tentang").click(function(){
			$("#pesanan").hide('slow', function(){
				$("#rincian").show('slow');
				$("#tentang").addClass('active');
				$("#order").removeClass('active');
			});
		});
		$("#order").click(function(){
			$("#rincian").hide('slow', function(){
				$("#pesanan").show('slow');
				$("#order").addClass('active');
				$("#tentang").removeClass('active');
			});
		});
		function viewPass(){
            var p = document.getElementById("password");
            if(p.type === "password"){
                p.type = "text";
            } else {
                p.type = "password";
            }
        }
	</script>
</html>