<?php
session_start();

if(!isset($_SESSION["e_username"]) || $_SESSION["e_username"]=="")
{
    ?>
    <script>
        window.location="../index.php";
    </script>
    <?php
}

?>