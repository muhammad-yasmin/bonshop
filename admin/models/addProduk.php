<?php

include '../../core/database.php';

$nama = $_POST['nmProduk'];
$harga = $_POST['hargaProduk'];
$jml = $_POST['qtyProduk'];
$kat = $_POST['kategProduk'];
$file = $_FILES['gambar_produk']['name'];
$tmp_file = $_FILES['gambar_produk']['tmp_name'];

$ins_produk = mysqli_query($db, "INSERT INTO produk VALUES(DEFAULT, '".$nama."')");
$ins_data = mysqli_query($db, "INSERT INTO data_produk VALUES(DEFAULT, '".$harga."', $jml, '".$file."', '".$kat."')");

if($ins_produk && $ins_data){
    if(!empty($file)){
        $loc = "../../assets/img/produk/";
        move_uploaded_file($tmp_file, $loc.$file);
        ?>
            <script type="text/javascript">
                alert("Berhasil Input data");
                window.location.href = "../?p=produk";
            </script>
        <?php
    }
    
}