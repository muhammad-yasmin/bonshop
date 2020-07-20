<?php

include '../../core/database.php';
$id_order = $_POST['ID_order'];
$id_status_order = $_POST['ID_status'];

$query = mysqli_query($db, "UPDATE pemesanan set status_order = $id_status_order WHERE ID_order = $id_order");
if($query){
    echo "Berhasil memproses pesanan! :D";
}