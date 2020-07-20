<?php

include '../../core/database.php';
$id = $_POST['id'];

$del_produk = mysqli_query($db, "DELETE FROM produk WHERE ID_produk = $id");
$del_data = mysqli_query($db, "DELETE FROM data_produk WHERE ID_data_produk = $id");

if($del_produk && $del_data){
    echo "Berhasil menghapus data";
}