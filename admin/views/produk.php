<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Produk</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="?p=dashboard">Dasboard</a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>
        </div>
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardProduk">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-5">Daftar Produk
            <button onclick="addNewProduct();" class="btn btn-md btn-success float-right">Tambah Produk <i class="fas fa-plus"></i></button>
        </h4>
        <div id="content-product"></div>
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardEdit" style="display: none;">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-4">Edit Produk
            <button onclick="backToList();" class="btn btn-md btn-warning btn-fill float-right">Kembali <i class="fas fa-sign-out-alt"></i></button>
        </h4>
        <div id="content-edit-product"></div>
        <!-- <button class="btn btn-md btn-success btn-fill" id="btnEditForm">Edit</button> -->
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardAdd" style="display: none;">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-4">Tambah Produk
            <button onclick="backToList();" class="btn btn-md btn-warning btn-fill float-right">Kembali <i class="fas fa-sign-out-alt"></i></button>
        </h4>
        <div id="content-add-product"></div>
        <!-- <button class="btn btn-md btn-success btn-fill" id="btnAddForm">Tambah</button> -->
    </div>
</div>

<?php require "controllers/produk.controller.php"; ?>
<!-- TODO: Fixing INsert &  UPdate -->