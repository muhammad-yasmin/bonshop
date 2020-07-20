<iframe src="" frameborder="0" id="iframe_add_produk" style="display:none;"></iframe>
<form enctype="multipart/form-data" method="post" id="formAddProduk" action="models/addProduk.php" target="iframe_add_produk">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nmProduk" id="nmProduk" class="form-control border-input" placeholder="Nama Produk">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="hargaProduk" id="hargaProduk" class="form-control border-input" placeholder="Rp." >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Qty</label>
                <input type="number" name="qtyProduk" id="qtyProduk" class="form-control border-input" placeholder="1 pc(s)">
            </div>
        </div>
        <div class="col-md-8">
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
                <textarea rows="3" name="kategProduk" id="kategProduk" class="form-control border-input" placeholder="boneka, rasfur, nilex"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" id="button_submit_add_produk">Tambah <i class="fas fa-plus"></i></button>
    </div>
    <div class="clearfix"></div>
</form>