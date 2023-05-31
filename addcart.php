<?php
include "config/db.php";
include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php

include "links.php";
?>

</head>
<body>
    

<?php
include "partials/header.php";

$p_id = $_GET['pro_id'];
$ip_add = getIPAddress();
$cart_check = "SELECT * FROM cart where ip_add='$ip_add' AND product_id='$p_id'";
$query_result = mysqli_query($conn, $cart_check);
$row=mysqli_fetch_array($query_result);


$count = mysqli_num_rows($query_result);
if ( $count > 0) {
    $qty = $row['qty'];
$qty_increase = $row['qty'] + 1;
   $update_quantity_query = "UPDATE cart set qty='$qty_increase' where ip_add='$ip_add' AND product_id='$p_id'";
   $run_result = mysqli_query($conn, $update_quantity_query);
   if($run_result){
    header('Location: index.php?successfully_quantity_increase='.$p_id.'');
   }
}
else{
    $insert_cart = "insert into cart (product_id , ip_add , qty ) values ('$p_id' , '$ip_add' , '1' )";
    $result = mysqli_query($conn, $insert_cart);
    if ($result) {
        header('Location: index.php?successfully_add_to_cart='.$p_id.'');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<?php
include "partials/footer.php";


?>



</body>
</html>