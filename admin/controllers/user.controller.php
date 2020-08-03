<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tbl_user").dataTable();
        loadDaftarUser();
    });
    function loadDaftarUser(){
        $.ajax({
            url: 'models/loadDaftarUser.php',
            data: {},
            success: function(data){
                $("#content-user").html(data);
            },
            error: function(xhr){
                alert("Gagal ambil data");
            }
        })
    }
    function loadAddUser(){
        $.ajax({
            url: 'models/loadAddUser.php',
            data: {},
            success: function(data){
                $("#content-add-user").html(data);
            },
            error: function(xhr){
                alert("gagal ambil");
            }
        });
    }
    loadAddUser();

    function edit_user(id){
        $.ajax({
            url: 'models/loadEditUser.php',
            method: 'post',
            data: {
                id: id
            },
            success: function(data){
                $("#content-edit-user").html(data);
                showEditForm();
            },
            error: function(xhr){
                alert("Gagal");
            }
        });
    }

    function del_user(id){
        var konf = confirm("apakah anda yakin");
        alert(konf);
        // if(konf == true){
        //     $.ajax({
        //         url: 'models/deleteProduk.php',
        //         method: 'post',
        //         data: {
        //             id: id
        //         },
        //         success: function(data){
        //             alert(data);
        //             loadDaftarProduk();
        //         },
        //         error: function(xhr){
        //             alert("gagal");
        //         }
        //     })
        // } else {
        //     alert("Penghapusan data dibatalkan");
        // }
    }
    function addNewUser(){
        $("#cardUser").hide('slow', function(){
            $("#cardAdd").show('slow');
        });
    }

    function showEditForm(){
        $("#cardUser").hide('slow', function(){
            $("#cardEdit").show('slow');
        })
    }

    function backToList(){
        $("#cardAdd").hide('slow', function(){
            $("#cardEdit").hide('slow', function(){
                $("#cardUser").show('slow');
            });
        });
    }
</script>