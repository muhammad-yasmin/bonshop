<?php
include "../core/database.php";

$nDepan = $_POST['nDepan'];
$nBelakang = $_POST['nBelakang'];
$jk = $_POST['jk'];
$tgl = $_POST['tglLahir'];
$telp = $_POST['telp'];
$pass = base64_encode($_POST['password']);

$query = mysqli_query($db, "INSERT INTO user 
                        VALUES(
                            DEFAULT,
                            '".$pass."',
                            '".$telp."')");
$query2 = mysqli_query($db, "INSERT INTO data_user 
                        VALUES(DEFAULT,
                        '".$nDepan."',
                        '".$nBelakang."',
                        $jk,
                        '".$tgl."',
                        '".$telp."',
                        '')");
if ($query && $query2){
    ?>
        <script type='text/javascript'>
            // alert("Berhasil");
            window.location.href = "../sign/";
        </script>
    <?php
}