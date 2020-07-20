<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bonshop | Keranjang</title>
		<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
		<link rel="stylesheet" href="../dist/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-light" style="background-color: #fff;">
			<div class="container">
				<a class="navbar-brand text-success" href="../">Bonshop</a>
				<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
					aria-expanded="false" aria-label="Toggle navigation"></button>
				<div class="collapse navbar-collapse" id="collapsibleNavId">
					<ul class="navbar-nav mr-auto mt-1 mt-lg-0">
						<form class="form-inline my-5 my-lg-0">
							<input class="form-control mr-sm-2" type="text" placeholder="Cari produk">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
					</ul>
					<ul class="navbar-nav ml-auto mt-1 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link text-success" href="#">Keranjang<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="../chat/">Chat</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-success" href="sign/">Masuk atau Daftar <i class="fas fa-sign-in-alt"></i></a>
						</li>
						<!-- <li class="nav-item dropdown">
							<a class="nav-link text-success dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
							<div class="dropdown-menu" aria-labelledby="dropdownId">
								<a class="dropdown-item text-success" href="#">Pengaturan</a>
								<a class="dropdown-item text-success" href="#">Keluar</a>
							</div>
						</li> -->
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
							<table class="table" border="1">
								<tbody>
									<tr>
										<td width="5%">1.</td>
										<td width="55%">Lorem</td>
										<td width="20%">
											<input type="number" value="1" min="1" max="12" name="" id="" >
										</td>
										<td width="20%">Rp. 455.000,00</td>
									</tr>
									<tr>
										<td align="right" colspan="3"><h5>Subtotal :</h5></td>
										<td align=""><h5>Rp. 1230</h4></td>
									</tr>
									<tr>
										<td align="right" colspan="3">Diskon :</td>
										<td align="">Rp. 0</td>
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