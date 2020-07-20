<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop | Daftar</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="../node_modules/animate.css/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/38965a6618.js" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="animated slideInDown">
                        <div class="card mt-5 border-success">
                            <div class="card-body">
                                <form action="signup.php" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nDepan">Nama Depan</label>
                                                <input type="text" name="nDepan" id="nDepan" class="form-control" placeholder="Masukkan Nama Depan" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nBelakang">Nama Belakang</label>
                                                <input type="text" name="nBelakang" id="nBelakang" class="form-control" placeholder="Masukkan Nama Belakang" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki - laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Tanggal Lahir</label>
                                        <input type="date" name="tglLahir" id="tglLahir" class="form-control" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Nomor Telepon</label>
                                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Masukkan Nomor Telepon/Username" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="helpId">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary" id="eye" onclick="viewPass();">Look Pass</button>
                                            </div>
                                        </div>
                                        <small id="helpId" class="text-muted">Harap masukkan password dengan benar</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success btn-md" id="sign" name="sign">Masuk</button>
                                        <small id="helpId" class="text-muted">Sudah punya akun? Masuk <a href="../sign/">di sini</a></small>
                                    </div>
                                    <!-- <button type="button" class="btn btn-sm btn-info" id="eye" onclick="viewPass();">a</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
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
</html>