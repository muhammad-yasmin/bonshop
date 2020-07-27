<?php
if(!isset($_SESSION)){
	session_start();
} else {
	//do nothing
}
include '../core/database.php';
date_default_timezone_set("Asia/Jakarta");
$query = mysqli_query($db,"SELECT produk.*, data_produk.* 
                        FROM produk
                        INNER JOIN data_produk
                        ON produk.ID_produk = data_produk.ID_data_produk");
$data = mysqli_fetch_array($query);
?>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bonshop | Konfirmasi Order</title>
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
							<input class="form-control mr-sm-2" type="text" placeholder="Cari produk">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search <i class="fas fa-search"></i></button>
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
										<a class="dropdown-item text-secondary" href="#">Profil</a>
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
        <div class="container mt-3 animated slideInDown">
			<div class="card text-center border-success mb-2">
				<div class="card-body">
					<h4 class="card-title">Harap Transfer ke <b>salah satu</b> nomor rekening di bawah!</h4>
					<p class="card-text">
						<b>Mandiri</b> : <b>144.12.312.333 </b>a/n M Yasmin N<br>
						<b>BCA</b> : <b>144.12.312.333 </b>a/n M Yasmin N<br>
					</p>
				</div>
			</div>
            <div class="card border-success">
                <div class="card-body">
                    <h4 class="card-title">Konfirmasi Order</h4>
                    <form action="placeConfirmation.php" enctype="multipart/form-data" method="post" class="mt-5" id="form_konfirmasi">
						<div class="form-group row">
							<label for="id_order" class="col-sm-4">ID Order</label>
							<div class="col-sm-8">
								<input type="text" name="id_order" id="id_order" placeholder="Masukkan ID pemesanan anda" autocomplete="off" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="hasil" class="col-sm-4">Jumlah yang harus ditransfer</label>
							<div class="col-sm-8 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp.</span>
								</div>
								<input readonly type="text" name="hasil" id="hasil" autocomplete="off" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="tot_bayar" class="col-sm-4">Total Transfer</label>
							<div class="col-sm-8 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp.</span>
								</div>
								<input type="text" name="tot_bayar" id="tot_bayar" placeholder="Masukkan jumlah yang anda transfer" autocomplete="off" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_bayar" class="col-sm-4">Tanggal</label>
							<div class="col-sm-8">
								<input readonly type="text" name="tgl_bayar" id="tgl_bayar" value="<?= date("Y-m-d"); ?>" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_bayar" class="col-sm-4">Upload Bukti Transfer</label>
							<div class="col-sm-8">
								<input type="file" name="bukti" id="bukti" class="form-control">
								<small id="buktiHelp" class="form-text text-muted mt-3" style="display:none;">Harap masukkan file berupa foto/gambar/screenshot dari bukti transfer.</small>
							</div>
						</div>
						<div class="form-group">
							<button type="button" id="submit_conf" class="btn btn-success btn-block">Submit Konfirmasi <i class="fas fa-sign-in-alt"></i></button>
						</div>
					</form>
                </div>
            </div>
        </div>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		const selectEl = document.getElementById('id_order');
		selectEl.addEventListener('change', function(){
			$.ajax({
				url: 'get_price.php',
				type: 'post',
				data: {
					id: $("#id_order").val()
				},
				success: function(data){
					$("#hasil").val(data);
					$("#tot_bayar").focus();
					// alert(data);
				},
				error: function(xhr){
					alert("gagal ambil data");
				}
			})
		})

		$("#submit_conf").click(function(){
			if($("#bukti").val() == ""){
				$("#bukti").addClass("is-invalid");
				$("#buktiHelp").show('slow');
			} else {
				$("#form_konfirmasi").submit();
			}
		})
		$("#bukti").change(function(){
			if($("#bukti").val() != ""){
				$("#bukti").toggleClass("is-invalid");
				$("#buktiHelp").hide('slow');
			}
		})
	</script>
    </body>
</html>