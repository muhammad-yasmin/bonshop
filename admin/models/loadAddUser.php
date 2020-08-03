<iframe src="" frameborder="0" id="iframe_add_produk" style="display:none;"></iframe>
<form enctype="multipart/form-data" method="post" id="formAddProduk" action="models/addProduk.php" target="iframe_add_produk">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nmUser" id="nmUser" class="form-control border-input" placeholder="Nama User">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control border-input" placeholder="" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <?php
                        include '../../core/database.php';
                        $query = mysqli_query($db, "SELECT * FROM jenis_kelamin");
                        while($data = mysqli_fetch_array($query)){
                            ?>
                            <option value="<?= $data['ID_jk'] ?>"><?= $data['jenis_kelamin']; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="noTelp" class="control-label">Nomor Telepon</label>
                <input type="text" name="noTelepon" id="noTelepon" class="form-control" placeholder="08xxxxxx">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="gambar_produk" class="control-label">Username atau Email</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="foo@bar.com">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="helpId">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-success" id="eye" onclick="viewPass();"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Alamat</label>
                <textarea rows="3" name="alamat" id="alamat" class="form-control border-input" placeholder="Street Avenue 4th"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" id="button_submit_add_user">Tambah <i class="fas fa-plus"></i></button>
    </div>
    <div class="clearfix"></div>
</form>
<script type="text/javascript">
    function viewPass(){
        var p = document.getElementById("password");
        if(p.type === "password"){
            p.type = "text";
        } else {
            p.type = "password";
        }
    }
</script>