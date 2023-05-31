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
$cart_check = "SELECT * FROM wishlist where customer_ip='$ip_add' AND pro_id='$p_id'";
$query_result = mysqli_query($conn, $cart_check);
$row=mysqli_fetch_array($query_result);
$count = mysqli_num_rows($query_result);
if ( $count > 0) {
   if($run_result){
    header('Location: index.php?product_alraedy_in_wishlist='.$p_id.'');
   }
}
else{
    $insert_cart = "insert into wishlist (pro_id , customer_ip ) values ('$p_id' , '$ip_add' )";
    $result = mysqli_query($conn, $insert_cart);
    if ($result) {
        header('Location: index.php?successfully_add_to_wishlist='.$p_id.'');
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