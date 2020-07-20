<?php
    session_start();
    $_SESSION['nama'] = " ";
    if($_SESSION['nama'] == " "){
        ?>
        <script type="text/javascript">
            window.location.href = "../../";
        </script>
        <?php
    }
?>
