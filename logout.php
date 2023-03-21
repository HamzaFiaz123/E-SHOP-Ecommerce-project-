<?php
session_start();
if(isset($_SESSION['email'])){
    session_destroy();
    echo "<script>window.location.replace('login_page.php');</script>";
}

?>
