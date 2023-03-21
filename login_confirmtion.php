<?php
    if(!isset($_SESSION['email'])){
        echo "<script>window.location.replace('account.php');</script>";
    }
    else{
        echo "<script>window.location.replace('payment.php');</script>";
    }
?>