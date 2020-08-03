<html>
<head>
	<meta charset="UTF-8">
	<style type="text/css">
	.container {
		padding-right: 15px;
		padding-left: 50px;
		margin-right: 115px;
		margin-left: auto;
	}
	body {
		font-family: Arial;
	}
	table {
		padding-top: 10px;
		float: left;
	}
	table > tr {
		text-align: left;
	}
	tr > td {
		height: 30px;

	}
	.row {
		margin-right: -15px;
		margin-left: -15px;
	}
	</style>
</head>
<body>
	<div class="container">
		<table>
			<tr>
				<td>ID Order</td>
				<td>:</td>
				<td><?php echo $_POST['id_order']; ?></td>
			</tr>
			<tr>
				<td>ID Produk</td>
				<td>:</td>
				<td><?php echo $_POST['id_produk']; ?></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>:</td>
				<td><?php echo $_POST['qty']; ?></td>
			</tr>
			<tr>
				<td>Total bayar</td>
				<td>:</td>
				<td><?php echo $_POST['total']; ?></td>
			</tr>
			<tr>
				<td>Tanggal Pemesanan</td>
				<td>:</td>
				<td><?php echo $_POST['tgl']; ?></td>
            </tr>
            <tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $_POST['alamat']; ?></td>
			</tr>
	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			window.print();
		});
	</script>
</body>
</html>
