<?php
session_start();
if(isset($_SESSION['admin_email'])){
    session_destroy();
    echo "<script>window.location.replace('admin_login.php');</script>";
}

?>
