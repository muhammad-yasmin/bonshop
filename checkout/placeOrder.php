<?php

include '../core/database.php';
$id_user = $_POST['ID_user'];
$id_prod = $_POST['ID_prod'];
$qty = $_POST['qty'];
$al = $_POST['alamat'];
$as = $_POST['as'];
$tot_bayar = $_POST['totBayar'];
$tgl = date("Y-m-d");

$query = mysqli_query($db, "INSERT INTO pemesanan VALUES(DEFAULT,
                            $id_prod,
                            $id_user,
                            $qty,
                            '".$tot_bayar."',
                            1,
                            '".$tgl."',
                            '".$al."')");
$select_stok = mysqli_query($db, "SELECT stok FROM data_produk WHERE ID_data_produk = $id_prod");
$parse = mysqli_fetch_array($select_stok);

$get_stok = $parse['stok'];
$update_stok = $get_stok - $qty;
$sql_update = "UPDATE data_produk
               SET stok = $update_stok
               WHERE ID_data_produk = $id_prod";

$exec_update_stok = mysqli_query($db, $sql_update);

if($query && $exec_update_stok){
    ?>
        <script type="text/javascript">
            alert("Berhasil order");
            window.location.href = '../';
        </script>
    <?php
} else {
    echo "Gagal";
}
?>