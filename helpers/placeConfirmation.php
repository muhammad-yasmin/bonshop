<?php
include '../core/database.php';

$get_id = $_POST['id_order'];
$panjang = strlen($get_id);
$getID = $panjang - 5;
$id = substr($get_id,5,$getID);

$tot_bayar = $_POST['tot_bayar'];
$tgl_bayar = $_POST['tgl_bayar'];
$file_bukti = $_FILES['bukti']['name'];
$tmp_file = $_FILES['bukti']['tmp_name'];

$q_place_confirmation = mysqli_query($db, "INSERT INTO pembayaran 
                                            VALUES(DEFAULT, $id, 
                                            '".$tot_bayar."', 
                                            '".$tgl_bayar."',
                                            '".$file_bukti."')");
$u_status_order = mysqli_query($db, "UPDATE pemesanan SET status_order = 2
                                    WHERE id_order = $id");
if($q_place_confirmation && $u_status_order){
    if(!empty($file_bukti)){
        $loc = "../assets/img/bukti_tf/";
        move_uploaded_file($tmp_file, $loc.$file_bukti);
        ?>
            <script type="text/javascript">
                alert("Terima Kasih, Konfirmasi pembayaran anda akan kami proses!");
                window.location.href = "../";
            </script>
        <?php
    }
    
}