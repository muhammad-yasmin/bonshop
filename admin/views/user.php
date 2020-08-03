<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">User(s)</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="?p=dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </div>
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardUser">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-5">Daftar User
            <button onclick="addNewUser();" class="btn btn-md btn-success float-right">Tambah User <i class="fas fa-plus"></i></button>
        </h4>
        <div id="content-user"></div>
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardEdit" style="display: none;">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-4">Edit User
            <button onclick="backToList();" class="btn btn-md btn-warning btn-fill float-right">Kembali <i class="fas fa-sign-out-alt"></i></button>
        </h4>
        <div id="content-edit-user"></div>
        <!-- <button class="btn btn-md btn-success btn-fill" id="btnEditForm">Edit</button> -->
    </div>
</div>
<div class="card m-b-10 m-t-10" id="cardAdd" style="display: none;">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-4">Tambah User
            <button onclick="backToList();" class="btn btn-md btn-warning btn-fill float-right">Kembali <i class="fas fa-sign-out-alt"></i></button>
        </h4>
        <div id="content-add-user"></div>
        <!-- <button class="btn btn-md btn-success btn-fill" id="btnAddForm">Tambah</button> -->
    </div>
</div>

<?php require "controllers/user.controller.php"; ?>
<!-- TODO: Fixing INsert &  UPdate -->