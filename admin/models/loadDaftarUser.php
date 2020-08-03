<table class="table table-striped" style="width:100%" id="tbl_user">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telepon</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include '../../core/database.php';
            $no = 1;
            $query = mysqli_query($db, "SELECT user.*, data_user.* 
                                        FROM user
                                        INNER JOIN data_user
                                        ON user.ID_user = data_user.ID_data_user");
            while($data = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_depan']." ".$data['nama_belakang']; ?></td>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['nomor_telp']; ?></td>
                        <td>
                            <button onclick="edit_user(<?= $data['ID_user']; ?>);" class="btn btn-sm btn-primary">Edit <i class="fas fa-pen"></i></button>
                            <button onclick="del_user(<?= $data['ID_user']; ?>);" class="btn btn-sm btn-danger">Hapus <i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php
            }
            ?>
    </tbody>
</table>