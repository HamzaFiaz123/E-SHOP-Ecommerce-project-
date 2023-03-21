<?php
    include "../config/db.php";
    if (isset($_GET['supp_id'])) {
        $supp_id = $_GET["supp_id"];
    }
    $delete_supplier = "delete from supplier where id='$supp_id'";
    $result = mysqli_query($conn, $delete_supplier);
    echo "<script>window.location.replace('suppliers.php');</script>";
?>