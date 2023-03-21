<?php
    include "../config/db.php";
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET["cat_id"];
    }
    $delete_product_sql = " delete FROM product_categories where id = '$cat_id'";
    $result = mysqli_query($conn, $delete_product_sql);
    echo "<script>window.location.replace('categories.php');</script>";
?>