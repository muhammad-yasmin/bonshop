<?php

include '../../core/database.php';
$id = $_POST['ID'];
$nama = $_POST['nmProduk'];
$harga = $_POST['hargaProduk'];
$jml = $_POST['qtyProduk'];
$kat = $_POST['kategProduk'];

$file = $_FILES['gambar_produk']['name'];
$tmp_file = $_FILES['gambar_produk']['tmp_name'];

$upd_produk = mysqli_query($db, "UPDATE produk SET nama_produk = '".$nama."' WHERE ID_produk = $id");
$upd_data = mysqli_query($db, "UPDATE data_produk SET harga = '".$harga."', stok = $jml, url_foto = '".$file."', kategori = '".$kat."' WHERE ID_data_produk = $id");

if($upd_produk && $upd_data){
    if(!empty($file)){
        $loc = "../../assets/img/produk/";
        move_uploaded_file($tmp_file, $loc.$file);
        ?>
            <script type="text/javascript">
                alert("Berhasil ubah data!");
                window.location.href = "../?p=produk";
            </script>
        <?php
    } else {
        ?>
            <script type="text/javascript">
                alert("Maaf, gambar tidak boleh kosong!");
                window.location.href = "../?p=produk";
            </script>
        <?php
    }
}