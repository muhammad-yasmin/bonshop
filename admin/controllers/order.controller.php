<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tbl_order").dataTable();
    });
    function loadDaftarPesanan(){
        $.ajax({
            url: 'models/loadDaftarPesanan.php',
            data: {},
            success: function(data){
                $("#content-order").html(data);
            },
            error: function(xhr){
                alert("Gagal ambil data");
            }
        })
    }
    loadDaftarPesanan();

    function edit_order(id){
        $.ajax({
            url: 'models/loadEditFormOrder.php',
            method: 'post',
            data: {
                id: id
            },
            success: function(data){
                $("#content-edit-order").html(data);
                showEditForm();
            },
            error: function(xhr){
                alert("Gagal");
            }
        });
    }

    function cancel_order(id){
        alert(id);
    }

    function prosesPesanan(){
        $.ajax({
            url: 'models/prosesPesanan.php',
            method: 'post',
            data: {
                ID_order : $("#kodePesanan").val(),
                ID_status: $("#status").val()
            },
            success: function(data){
                alert(data);
                loadDaftarPesanan();
                backToList();
            },
            error: function(xhr){
                alert("Gagal");
            }
        })
    }

    function showEditForm(){
        $("#cardPesanan").hide('slow', function(){
            $("#cardEdit").show('slow');
        })
    }
    function backToList(){
        $("#cardAdd").hide('slow', function(){
            $("#cardEdit").hide('slow', function(){
                $("#cardPesanan").show('slow');
            });
        });
    }
    function addNewOrder(){
        $("#cardPesanan").hide('slow', function(){
            $("#cardAdd").show('slow');
        });
    }

    $("#btnEditForm").click(function(){
        prosesPesanan();
    });
</script>