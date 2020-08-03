<?php

include '../../core/database.php';

$id = $_POST['ID'];
$nama = $_POST['nmUser'];
$tgl = $_POST['tanggal'];
$jk = $_POST['jk'];
$telp = $_POST['noTelepon'];
$username = $_POST['username'];
$password = base64_encode($_POST['password']);
$alamat = $_POST['alamat'];

list($nama_depan, $nama_belakang) = explode(" ",$nama);

$upd_user = mysqli_query($db, "UPDATE user SET password = '".$password."', username = '".$username."' WHERE id_user = $id");
$upd_data_user = mysqli_query($db, "UPDATE data_user SET nama_depan = '".$nama_depan."', nama_belakang = '".$nama_belakang."', ID_jk = $jk, alamat = '".$alamat."', tgl_lahir = '".$tgl."', nomor_telp = '".$telp."', url_foto = 'user.png' WHERE ID_data_user = $id");
if($upd_user && $upd_data_user){
    ?>
        <script type="text/javascript">
            alert("Berhasil ubah data!");
            window.location.href = "../?p=user";
            window.close();
        </script>
    <?php
}