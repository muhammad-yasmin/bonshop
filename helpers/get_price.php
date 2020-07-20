<?php
include '../core/database.php';
$get_id = $_POST['id'];
$panjang = strlen($get_id);
$getID = $panjang - 5;
$id = substr($get_id,5,$getID);

$query = mysqli_query($db, "SELECT * FROM pemesanan WHERE id_order = $id");
$ext = mysqli_fetch_assoc($query);
echo $ext['total_bayar'];