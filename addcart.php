<?php
include "config/db.php";
include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php

include "links.phpphp";
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
$qty = $row['qty'];
$count = mysqli_num_rows($query_result);
if ( $count > 0) {
    echo "<div class='alert alert-success'>product already in cart</div>
    // <script> window.location.replace('index.php');</script>
    ";
    header('Location: index.php');

}
else{
    $insert_cart = "insert into cart (product_id , ip_add , qty ) values ('$p_id' , '$ip_add' , '1' )";
    $result = mysqli_query($conn, $insert_cart);
    if ($result) {
        echo "<div class='alert alert-success'>Successfully add to cart</div>
        // <script> window.location.replace('index.php');</script>
        ";
        header('Location: index.php');
    } else {
        echo "<div class='alert alert-danger'>Not successfull, try again</div>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>
<div class="container">

<a href="cart.php" class="btn btn-dark">View Cart</a>
</div>


<?php
include "partials/footer.php";


?>



</body>
</html>