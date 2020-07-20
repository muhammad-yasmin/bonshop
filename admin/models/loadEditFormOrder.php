<?php
    include '../../core/database.php';
    $id = $_POST['id'];
    
    $query = mysqli_query($db, "SELECT pemesanan.*, data_produk.*, produk.*, status_order.status_order
                                FROM pemesanan
                                INNER JOIN data_produk
                                ON data_produk.ID_data_produk = pemesanan.ID_produk
                                INNER JOIN produk
                                ON pemesanan.ID_produk = produk.ID_produk
                                INNER JOIN status_order
                                ON pemesanan.status_order = status_order.ID_status_order
                                WHERE pemesanan.ID_order = $id");
    $ext = mysqli_fetch_array($query);
    // var_dump($ext);
?>
<form>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kodePesanan">Kode Pesanan</label>
            <input type="text" name="kodePesanan" id="kodePesanan" class="form-control" value="<?= $ext['ID_order']; ?>" placeholder="Kode Pemesanan">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Produk</label>
            <input type="text" name="produkPesanan" id="produkPesanan" class="form-control" value="<?= $ext['nama_produk']; ?>" placeholder="Nama Produk">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Jumlah Pesan</label>
            <input type="text" name="jmlPesananan" id="jmlPesananan" class="form-control" value="<?= $ext['jumlah_produk']; ?>" placeholder="Jumlah Produk">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $ext['alamat']; ?>" placeholder="Alamat Tujuan">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Status Order</label>
            <select name="status" id="status" class="form-control">
                <option value="">-- Pilih Status Order --</option>
                <?php
                    $query_status_pesanan = mysqli_query($db, "SELECT pemesanan.status_order
                    FROM pemesanan WHERE ID_order = $id");
                    $ext_status_pesanan = mysqli_fetch_array($query_status_pesanan);
                    $query_status = mysqli_query($db, "SELECT * FROM status_order");
                    while($ext_status = mysqli_fetch_array($query_status)){
                        ?>
                            <option value="<?= $ext_status['ID_status_order']; ?>" <?= ($ext_status['ID_status_order'] == $ext_status_pesanan['status_order'])? 'selected' : ''; ?>><?= $ext_status['status_order']; ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
    </div>
</form>