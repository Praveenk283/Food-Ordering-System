<?php
session_start();

if(!isset($_SESSION["admin_username"]) || $_SESSION["admin_username"]=="")
{
    ?>
    <script>
        window.location="../index.php";
    </script>
    <?php
}

?>