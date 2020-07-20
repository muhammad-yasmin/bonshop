<?php
    include '../core/database.php';
    $query_jumlah = mysqli_query($db, "SELECT count(id_produk) AS jml_produk FROM produk");
    $ext_jumlah = mysqli_fetch_array($query_jumlah);

    $query_total_pendapatan = mysqli_query($db, "SELECT SUM(total_bayar) AS total_pdpt FROM pemesanan WHERE status_order = 3");
    $ext_pdpt = mysqli_fetch_array($query_total_pendapatan);

    $query_pending = mysqli_query($db, "SELECT count(status_order) AS pending FROM pemesanan WHERE status_order = 1");
    $ext_pending = mysqli_fetch_array($query_pending);

    $query_success = mysqli_query($db, "SELECT count(status_order) AS berhasil FROM pemesanan WHERE status_order = 3");
    $ext_success = mysqli_fetch_array($query_success);
?>

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Bonshop</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- end page-title -->

<div class="row">

    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-table bg-primary text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Jumlah Produk</h5>
                </div>
                <h3 class="mt-4"><?= $ext_jumlah['jml_produk']; ?> pc(s)</h3>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-dollar-sign bg-success text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Total Pendapatan</h5>
                </div>
                <h3 class="mt-4">Rp. <?= $ext_pdpt['total_pdpt']; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-exclamation-triangle bg-warning text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Transaksi Pending</h5>
                </div>
                <h3 class="mt-4"><?= $ext_pending['pending']; ?> pc(s)</h3>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-check bg-success text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Transaksi Berhasil</h5>
                </div>
                <h3 class="mt-4"><?= $ext_success['berhasil']; ?> pc(s)</h3>
            </div>
        </div>
    </div>

</div>