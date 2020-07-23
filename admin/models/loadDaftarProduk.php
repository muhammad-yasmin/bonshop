<table class="table table-striped table-responsive" style="width:100%" id="tbl_produk">
    <thead>
        <tr>
            <th>#</th>
            <th>Produk</th>
            <th>Harga @</th>
            <th>Qty(s)</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include '../../core/database.php';
            $no = 1;
            $query = mysqli_query($db, "SELECT produk.*, data_produk.* 
                                        FROM produk
                                        INNER JOIN data_produk
                                        ON produk.ID_produk = data_produk.ID_data_produk");
            while($data = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_produk']; ?></td>
                        <td>Rp. <?= $data['harga']; ?></td>
                        <td><?= $data['stok']; ?> pc(s)</td>
                        <td>
                            <button onclick="edit_produk(<?= $data['ID_produk']; ?>);" class="btn btn-sm btn-primary">Edit <i class="fas fa-pen"></i></button>
                            <button onclick="del_produk(<?= $data['ID_produk']; ?>);" class="btn btn-sm btn-danger">Hapus <i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php
            }
            ?>
    </tbody>
</table>