<?php

include '../../core/database.php';
$id = $_POST['id'];

$del_user = mysqli_query($db, "DELETE FROM user WHERE ID_user = $id");
$del_data = mysqli_query($db, "DELETE FROM data_user WHERE ID_data_user = $id");

if($del_user && $del_data){
    echo "Berhasil menghapus data";
}