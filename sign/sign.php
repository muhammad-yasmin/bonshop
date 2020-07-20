<?php
include "../core/database.php";
session_start();

$uName = $_POST['username'];
$pass = base64_encode($_POST['password']);

$query_admin = mysqli_query($db, "SELECT * FROM admin WHERE nama_admin = '".$uName."' && password = '".$pass."'");
if($query_admin){
    $ekstrak = mysqli_fetch_array($query_admin);
    $_SESSION['nama'] = $ekstrak['nama_admin'];
    ?>
        <script type="text/javascript">
            window.location.href = '../admin/';
        </script>
    <?php
} else {
    $query_user = mysqli_query($db, "SELECT * FROM user WHERE username = '".$uName."' && password = '".$pass."'");
    $ekstrak = mysqli_fetch_array($query_user);
    $_SESSION['id'] = $ekstrak['ID_user'];
    ?>
        <script type="text/javascript">
            window.location.href = "../";
        </script>
    <?php
}