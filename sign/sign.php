<?php
include "../core/database.php";
session_start();

$uName = $_POST['username'];
$pass = base64_encode($_POST['password']);
$q = "SELECT * FROM admin WHERE nama_admin = '".$uName."' AND password = '".$pass."'";
$query_admin = mysqli_query($db, $q);
$tot = mysqli_num_rows($query_admin);
if($tot == 1){
    $ekstrak = mysqli_fetch_array($query_admin);
    $_SESSION['nama'] = $ekstrak['nama_admin'];
    ?>
        <script type="text/javascript">
        alert("Selamat Datang, <?php echo $ekstrak['nama_admin']; ?>");
            window.location.href = '../admin/';
        </script>
    <?php
} else {
    $query_user = mysqli_query($db, "SELECT * FROM user WHERE username = '".$uName."' AND password = '".$pass."'");
    $ekstrak = mysqli_fetch_array($query_user);
    $_SESSION['id_user'] = $ekstrak['ID_user'];
    ?>
        <script type="text/javascript">
            window.location.href = "../user/";
            alert("Selamat Datang di aplikasi");
        </script>
    <?php
}