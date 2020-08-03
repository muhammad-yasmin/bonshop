<?php
    session_start();
    $_SESSION['id_user'] = "";
    $_SESSION['keranjang'] = "";
    if($_SESSION['id_user'] == "" && $_SESSION['keranjang'] == ""){
        ?>
        <script type="text/javascript">
            window.location.href = "../";
        </script>
        <?php
    }
?>
