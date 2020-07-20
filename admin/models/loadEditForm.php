<?php
    include '../../core/database.php';
    $id = $_POST['id'];
    
    $query = mysqli_query($db, "SELECT produk.*, data_produk.* 
                                FROM produk
                                INNER JOIN data_produk
                                ON produk.ID_produk = data_produk.ID_data_produk
                                WHERE produk.ID_produk = $id");
    $ext = mysqli_fetch_array($query);
?>
<iframe src="" frameborder="0" id="iframe_edit_produk" style="display:none;"></iframe>
<form enctype="multipart/form-data" method="post" id="formEditProduk" action="models/editProduk.php" target="iframe_edit_produk">
    <div class="form-group" style="display: none;">
        <input type="text" class="form-control" name="ID" id="ID" aria-describedby="emailHelpId" value="<?= $id; ?>">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nmProduk" id="nmProduk" class="form-control border-input" value="<?= $ext['nama_produk']; ?>" placeholder="Nama Produk">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="hargaProduk" id="hargaProduk" class="form-control border-input" value="<?= $ext['harga']; ?>" placeholder="Rp." >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Qty</label>
                <input type="number" name="qtyProduk" id="qtyProduk" class="form-control border-input" value="<?= $ext['stok']; ?>" placeholder="1">
            </div>
        </div>
        <div class="col-md-1">
            <div class="card outline-success">
              <img src="../assets/img/produk/<?= $ext['url_foto']; ?>" alt="<?= $ext['url_foto']; ?>" class="rounded img-fluid card-img-top" width="50">
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="gambar_produk" class="control-label">Foto Produk</label>
                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Kategori</label>
                <textarea rows="3" name="kategProduk" id="kategProduk" class="form-control border-input" placeholder="boneka, rasfur, nilex"><?= $ext['kategori']; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="button_edit_produk">Edit <i class="fas fa-pen"></i></button>
            </div>
        </div>
    </div>
</form>