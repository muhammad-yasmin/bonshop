<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Pesanan</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="?p=dashboard">Dasboard</a></li>
                <li class="breadcrumb-item active">Pesanan</li>
            </ol>
        </div>
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardPesanan">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-5">Daftar Pesanan
            <button onclick="addNewOrder();" class="btn btn-md btn-success float-right">Tambah Pesanan <i class="fas fa-plus"></i></button>
        </h4>
        <div id="content-order"></div> 
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardEdit" style="display: none;">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-4">Proses Pesanan
            <button onclick="backToList();" class="btn btn-md btn-danger btn-fill float-right"><i class="fas fa-sign-out-alt"></i> Kembali</button>
        </h4>
    </div>
    <div id="content-edit-order"></div>
    <div class="col-md-6 m-b-30">
        <button class="btn btn-md btn-success btn-block" id="btnEditForm">Proses <i class="fas fa-pen"></i></button>
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardAdd" style="display: none;">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-4">Tambah Pesanan
            <button onclick="backToList();" class="btn btn-md btn-danger btn-fill float-right"><i class="fas fa-sign-out-alt"></i> Kembali</button>
        </h4>
    </div>
    <div id="content-add-product"></div>
    <div class="col-md-6 m-b-40">
        <button class="btn btn-md btn-success btn-block" id="btnAddForm">Tambah <i class="fas fa-plus"></i></button>
    </div>
</div>
<!-- </div> -->
<?php require "controllers/order.controller.php"; ?>
<!-- TODO: Fixing INsert &  UPdate -->