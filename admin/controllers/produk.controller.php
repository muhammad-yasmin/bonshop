<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tbl_produk").dataTable();
    });
    function loadDaftarProduk(){
        $.ajax({
            url: 'models/loadDaftarProduk.php',
            data: {},
            success: function(data){
                $("#content-product").html(data);
            },
            error: function(xhr){
                alert("Gagal ambil data");
            }
        })
    }
    loadDaftarProduk();

    function loadAddProduk(){
        $.ajax({
            url: 'models/loadAddProduk.php',
            data: {},
            success: function(data){
                $("#content-add-product").html(data);
            },
            error: function(xhr){
                alert("gagal ambil");
            }
        });
    }
    loadAddProduk();

    function addProduk(){
        $.ajax({
            url: 'models/addProduk.php',
            method: 'post',
            data: {
                nama: $("#nmProduk").val(),
                harga: $("#hargaProduk").val(),
                jml: $("#qtyProduk").val(),
                kat: $("#kategProduk").val()
            },
            success: function(data){
                alert(data);
                loadDaftarProduk();
                backToList();
                clearAdd();
            },
            error: function(xhr){
                alert("Gagal");
            }
        });
    }

    function edit_produk(id){
        $.ajax({
            url: 'models/loadEditForm.php',
            method: 'post',
            data: {
                id: id
            },
            success: function(data){
                $("#content-edit-product").html(data);
                showEditForm();
            },
            error: function(xhr){
                alert("Gagal");
            }
        });
    }

    function editProduk(){
        $.ajax({
            url: 'models/editProduk.php',
            method: 'post',
            data: {
                ID: $("#ID").val(),
                nama: $("#nmProduk").val(),
                harga: $("#hargaProduk").val(),
                jml: $("#qtyProduk").val(),
                kat: $("#kategProduk").val()
            },
            success: function(data){
                alert(data);
                loadDaftarProduk();
                backToList();
            },
            error: function(xhr){
                alert("gagal");
            }
        })
    }

    function del_produk(id){
        var konf = confirm("apakah anda yakin");
        if(konf == true){
            $.ajax({
                url: 'models/deleteProduk.php',
                method: 'post',
                data: {
                    id: id
                },
                success: function(data){
                    alert(data);
                    loadDaftarProduk();
                },
                error: function(xhr){
                    alert("gagal");
                }
            })
        } else {
            alert("Penghapusan data dibatalkan");
        }
    }

    $("#btnAddForm").click(function(){
        addProduk();
    });

    $("#btnEditForm").click(function(){
        editProduk();
    })

    function clearAdd(){
        $("#nmProduk").val("");
        $("#hargaProduk").val("");
        $("#qtyProduk").val("");
        $("#kategProduk").val("");
    }

    function addNewProduct(){
        $("#cardProduk").hide('slow', function(){
            $("#cardAdd").show('slow');
        });
    }

    function showEditForm(){
        $("#cardProduk").hide('slow', function(){
            $("#cardEdit").show('slow');
        })
    }

    function backToList(){
        $("#cardAdd").hide('slow', function(){
            $("#cardEdit").hide('slow', function(){
                $("#cardProduk").show('slow');
            });
        });
    }
</script>