<?php
include '../../core/database.php';

$nama = $_POST['nmUser'];
$tgl = $_POST['tanggal'];
$jk = $_POST['jk'];
$telp = $_POST['noTelepon'];
$username = $_POST['username'];
$password = base64_encode($_POST['password']);
$alamat = $_POST['alamat'];

list($nama_depan, $nama_belakang) = explode(" ",$nama);

$query_user = mysqli_query($db, "INSERT INTO user VALUES(DEFAULT, '".$password."', '".$username."')");
$query_data_user = mysqli_query($db, "INSERT INTO data_user VALUES(DEFAULT, '".$nama_depan."','".$nama_belakang."', $jk, '".$alamat."','".$tgl."','".$telp."','user.png') ");

if($query_user && $query_data_user){
    ?>
        <script type="text/javascript">
            alert("Berhasil Input data");
            window.location.href = "../?p=user";
            window.close();
        </script>
    <?php
}