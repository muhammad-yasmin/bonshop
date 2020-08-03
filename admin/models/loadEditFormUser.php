<?php
    include '../../core/database.php';
    $id = $_POST['id'];
    
    $query = mysqli_query($db, "SELECT user.*, data_user.* 
                                FROM user
                                INNER JOIN data_user
                                ON user.ID_user = data_user.ID_data_user
                                WHERE user.ID_user = $id");
    $ext = mysqli_fetch_array($query);
?>
<iframe src="" frameborder="0" id="iframe_edit_user" style="display:none;"></iframe>
<form enctype="multipart/form-data" method="post" id="formEditUser" action="models/editUser.php" target="iframe_add_user">
    <div class="form-group" style="display: none;">
        <input type="text" class="form-control" name="ID" id="ID" aria-describedby="emailHelpId" value="<?= $id; ?>">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nmUser" id="nmUser" class="form-control border-input" value="<?= $ext['nama_depan']." ".$ext['nama_belakang']; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control border-input" value="<?= $ext['tgl_lahir']; ?>" >
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
                            <option value="<?= $data['ID_jk'] ?>"<?php echo ($ext['ID_jk'] == $data['ID_jk'])?"selected":""; ?>><?= $data['jenis_kelamin']; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="noTelp" class="control-label">Nomor Telepon</label>
                <input type="text" name="noTelepon" id="noTelepon" class="form-control" value="<?= $ext['nomor_telp']; ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="gambar_produk" class="control-label">Username atau Email</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $ext['username']; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" value="<?= base64_decode($ext['password']); ?>" aria-describedby="helpId">
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
                <textarea rows="3" name="alamat" id="alamat" class="form-control border-input" placeholder="Street Avenue 4th"><?= $ext['alamat']; ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" id="button_submit_edit_user">Edit <i class="fas fa-pencil"></i></button>
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