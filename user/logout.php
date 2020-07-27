<?php
    session_start();
    $_SESSION['id_user'] = " ";
    if($_SESSION['id_user'] == " "){
        ?>
        <script type="text/javascript">
            window.location.href = "../";
        </script>
        <?php
    }
?>
