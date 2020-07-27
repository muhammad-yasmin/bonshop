<table class="table table-striped" style="width:100%" id="tbl_order">
    <thead>
        <tr>
            <th>#</th>
            <th>ID Pesanan</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Status Pesanan</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include '../../core/database.php';
            $no = 1;
            $query = mysqli_query($db, "SELECT pemesanan.ID_order, pemesanan.ID_user, pemesanan.jumlah_produk, pemesanan.total_bayar, pemesanan.tgl_masuk, pemesanan.alamat , data_produk.*, produk.nama_produk, status_order.*
                                        FROM pemesanan
                                        INNER JOIN data_produk
                                        ON data_produk.ID_data_produk = pemesanan.ID_produk
                                        INNER JOIN produk
                                        ON pemesanan.ID_produk = produk.ID_produk
                                        INNER JOIN status_order
                                        ON pemesanan.status_order = status_order.ID_status_order");
            while($data = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>ORDER<?= $data['ID_order'];?></td>
                        <td><?= $data['nama_produk']; ?></td>
                        <td><?= $data['jumlah_produk']; ?> pc(s)</td>
                        <td><?= $data['tgl_masuk']; ?></td>
                        <td>Rp. <?= $data['total_bayar']; ?></td>
                        <td>
                            <?php
                                if($data['ID_status_order'] == 1){
                                    ?>
                                    <span class="badge badge-md badge-warning"><?= $data['status_order']; ?></span>
                                    <?php
                                } else if($data['ID_status_order'] == 2){
                                    ?>
                                    <span class="badge badge-md badge-success"><?= $data['status_order']; ?></span>
                                    <?php
                                } else if($data['ID_status_order'] == 3){
                                    ?>
                                    <span class="badge badge-md badge-success"><?= $data['status_order']; ?></span>
                                    <?php
                                } else if($data['ID_status_order'] == 4){
                                    ?>
                                    <span class="badge badge-md badge-danger"><?= $data['status_order']; ?></span>
                                    <?php
                                }
                            ?>
                            
                        </td>
                        <td>
                            <?php
                                if($data['ID_status_order'] == 2){
                                    ?>
                                    <button onclick="edit_order(<?= $data['ID_order']; ?>);" class="btn btn-sm btn-success">Proses <i class="fas fa-pen"></i></button>
                                    <?php
                                } else if($data['ID_status_order'] == 1){
                                    ?>
                                    <button onclick="edit_order(<?= $data['ID_order']; ?>);" class="btn btn-sm btn-success" title="User harus melakukan proses konfirmasi pembayaran terlebih dahulu" disabled>Menunggu Konfirmasi <i class="fas fa-pen"></i></button>
                                    <?php
                                } else if($data['ID_status_order'] == 3){
                                    ?>
                                    <button onclick="confirm('Apakah anda yakin akan membatalkan pesanan ini?', cancel_order(<?= $data['ID_order']; ?>));" class="btn btn-sm btn-danger">Cancel <i class="fas fa-trash"></i></button>
                                    <?php
                                }
                            ?>
                            
                        </td>
                    </tr>
                <?php
            }
            ?>
    </tbody>
</table>