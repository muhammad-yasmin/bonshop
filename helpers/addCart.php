<?php
if(!isset($_SESSION)){
	session_start();
} else {
	//do nothing
}
include '../core/database.php';
$id = $_POST['id'];

$query_SELECT_prod = mysqli_query($db,"SELECT produk.*, data_produk.* 
                                        FROM produk
                                        INNER JOIN data_produk
                                        ON produk.ID_produk = data_produk.ID_data_produk
                                        WHERE produk.ID_produk = $id");
$extract_prod = mysqli_fetch_array($query_SELECT_prod);
$itemArray = array(
    $extract_prod['ID_produk']=>array(
        'nama_produk'=>$extract_prod['nama_produk'],
        'harga'=>$extract_prod['harga'],
        'qty'=>1
    )
);
if(!empty($_SESSION['keranjang'])){
    if(in_array($extract_prod['ID_produk'],array_keys($_SESSION['keranjang']))){
        foreach($_SESSION['keranjang'] as $item => $key){
            if($extract_prod['ID_produk'] == $item){
                if(empty($_SESSION['keranjang'][$item]['qty'])){
                    $_SESSION['keranjang'][$item]['qty'] = 0;
                }
                $_SESSION['keranjang'][$item]['qty'] += 1;
            }
        }
    } else {
        $_SESSION['keranjang'] = array_merge($_SESSION['keranjang'], $itemArray);
    }
} else {
    $_SESSION['keranjang'] = $itemArray;
}

if(!empty($_SESSION['keranjang'])){
    echo "Produk anda telah ditambahkan di keranjang";
} else {
    echo "Keranjang kosong";
}
