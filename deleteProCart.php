<?php

include "config/db.php";
    if (isset($_GET['pro_id'])) {
        $p_id = $_GET["pro_id"];
    }
   echo  $delete_product_sql = " delete FROM cart where id = '$p_id'";
    $result = mysqli_query($conn, $delete_product_sql);
    echo "<script>window.location.replace('cart.php');</script>";
?>
