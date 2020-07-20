<?php
    include 'core/database.php';
    $query = mysqli_query($db, "SELECT produk.*, data_produk.* 
                                FROM produk
                                INNER JOIN data_produk
                                ON produk.ID_produk = data_produk.ID_data_produk
                                WHERE stok <> 0 LIMIT 6");
?>

<div class="container">
    <div class="owl-carousel owl-theme">
        <?php
            while($ext = mysqli_fetch_array($query)){
                ?>
                <div class="item">
                    <div class="card outline-success">
                        <div class="card-body">
                            <img src="assets/img/produk/<?= $ext['url_foto']; ?>" class="rounded img-fluid" alt="">
                            <h5 class="card-title"><b><?= $ext['nama_produk']; ?></b></h5>
                            <p class="card-text">Rp. <?= $ext['harga']; ?></p>
                            <a class="btn btn-block btn-success mt-3 text-white" href="checkout/?p=<?php echo base64_encode($ext['ID_produk']); ?>">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        
        ?>
    </div>
</div>