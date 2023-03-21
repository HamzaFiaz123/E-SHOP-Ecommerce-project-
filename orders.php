<?php

include "partials/links.php";
include "config/db.php";
include "partials/header.php";
include "functions.php";

?>

<?php
$ip_add = getIPAddress();
$total = 0;
$status = "pending";
$invoice_number = mt_rand(1, 500);
$cart_check = "SELECT * FROM cart where ip_add='$ip_add'";
$query_result = mysqli_query($conn, $cart_check);
$count_products = mysqli_num_rows($query_result);
while ($row = mysqli_fetch_array($query_result)) {
    $pro_id = $row['product_id'];
    $qty = $row['qty'];
    $sql_pro_show = "SELECT * FROM products where id = '$pro_id'";
    $result = mysqli_query($conn, $sql_pro_show);
    while ($row = mysqli_fetch_array($result)) {
        $pro_id = $row['id'];
        $pro_name = $row['prod_name'];
        $pro_price = $row['prod_price'];
        $pro_image = $row['prod_image'];
        $total = $total + ($qty * $pro_price);


    }

}


$customer_id = $_SESSION['id'];

$insert_order = "INSERT INTO `customer_orders`(customer_id, due_amount, invoice_number, total_products, order_date, order_status) VALUES ('$customer_id','$total','$invoice_number','$count_products','$status')";
$run_orders = mysqli_query($conn, $insert_order);
if($run_orders){
    $delte_cart = " delete from cart where ip_add='$ip_add'";
    $delte_orders = mysqli_query($conn, $delte_cart);
}
?>

<?php
include "partials/footer.php";
?>