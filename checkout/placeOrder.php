<?php
include '../core/database.php';
$id_user = $_POST['ID_user'];
$id_prod = $_POST['ID_prod'];
$qty = $_POST['qty'];
$al = $_POST['alamat'];
$tot_bayar = $_POST['totBayar'];
$tgl = date("Y-m-d");

$query_SELECT_ORDER = mysqli_query($db, "SELECT COUNT(ID_order) as urutan FROM pemesanan");
$getTotalORDER = mysqli_fetch_array($query_SELECT_ORDER);
$next_order = $getTotalORDER['urutan']+1;


$query = mysqli_query($db, "INSERT INTO pemesanan VALUES($next_order,
                            $id_prod,
                            $id_user,
                            $qty,
                            '".$tot_bayar."',
                            1,
                            '".$tgl."',
                            '".$al."')");
$select_stok = mysqli_query($db, "SELECT stok FROM data_produk WHERE ID_data_produk = $id_prod");
$parse = mysqli_fetch_array($select_stok);

$get_stok = $parse['stok'];
$update_stok = $get_stok - $qty;
$sql_update = "UPDATE data_produk
               SET stok = $update_stok
               WHERE ID_data_produk = $id_prod";

$exec_update_stok = mysqli_query($db, $sql_update);

if($query && $exec_update_stok){
    
    ?>
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../dist/css/all.min.css">
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                        <iframe src="" frameborder="0" id="iframe_print" style="display:none;"></iframe>
                            <form action="printOrder.php" method="post" target="iframe_print">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ID Order</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_order" id="id_order" value="ORDER<?= $next_order; ?>" class="form-control-plaintext" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ID Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_produk" id="id_produk" value="<?= $id_prod; ?>" class="form-control-plaintext" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="qty" id="qty" value="<?= $qty; ?> pc(s)" class="form-control-plaintext" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Harus anda bayar</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="total" id="total" value="Rp. <?= $tot_bayar; ?>" class="form-control-plaintext" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tgl" id="tgl" value="<?= $tgl; ?>" class="form-control-plaintext" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" id="alamat" value="<?= $al; ?>" class="form-control-plaintext" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" id="close" class="btn btn-secondary float-right ml-3" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success float-right">Print <i class="fas fa-print"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            // alert("Berhasil melakukan pemesanan, harap segera melakukan pembayaran dan konfirmasi");
            $("#modelId").modal("show");
            $("#close").click(function(){
                window.location.href = '../user/';
            })
            
        </script>
    <?php
} else {
    echo "Gagal";
}
?>