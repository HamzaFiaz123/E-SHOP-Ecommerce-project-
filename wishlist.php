<?php

include "partials/links.php";
include "config/db.php";
include "partials/header.php";
include "functions.php";

if(isset($_GET['successfully_deleted_from_cart'])){
    echo "
            <script>swal('DELETED!', 'As quantity becomes zero, deleted from cart', 'success');</script>
           
        ";

}

?>

<div class="container my-5">
    <h3 class="text-primary mb-4">Wishlist</h3>
    <div class="row">
        <div class="col-lg-12">
            <?php
            $ip_add = getIPAddress();
            $cart_check = "SELECT * FROM wishlist where customer_ip='$ip_add'";
            $query_result = mysqli_query($conn, $cart_check);
            $count = mysqli_num_rows($query_result);
            if ($count < 1) {
                echo "<div class='alert alert-success'>No products in wishlist to show</div>
                <a href='index.php' class='btn btn-primary'>Back to shopping</a>
                ";
            } else {
                echo '
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>                       
                        ';
                $ip_add = getIPAddress();
                $number = 0;
                $cart_check = "SELECT * FROM wishlist where customer_ip='$ip_add'";
                $query_result = mysqli_query($conn, $cart_check);
                $count = mysqli_num_rows($query_result);
                if ($count < 1) {
                    echo "<div class='alert alert-success'>No products in cart to show</div>";
                } else {
                    while ($row = mysqli_fetch_array($query_result)) {
                        $pro_id = $row['pro_id'];
                        $sql_pro_show = "SELECT * FROM products where id = '$pro_id'";
                        $result = mysqli_query($conn, $sql_pro_show);
                        while ($row = mysqli_fetch_array($result)) {
                            $pro_id = $row['id'];
                            $pro_name = $row['prod_name'];
                            $pro_price = $row['prod_price'];
                            $pro_image = $row['prod_image'];
                            $number = $number + 1;


                            echo '<tr>

                                    <td>
                                        <h5>' . $number . '</h5>
                                    </td>
                                    <td>
                                        <img src="uploaded_images/' . $pro_image . '" style="height: 90px;float: left;margin-right: 20px">
                                        <h5>' . $pro_name . '</h5>
                                    </td>
                                    <td>
                                        <h5>' . $pro_price . '$</h5>
                                    </td>
                                    
                                    
                                    <td>
                                    <form method="POST">
                                        <button type="submit" name="delete_product" class="btn btn-dark">Delete</button>
                                        <a href=" addcart.php?pro_id=' . $pro_id . '" class="btn btn-dark">Add to cart</a>                                
                                    </form>
                                    </td>
                                </tr>';
                        }
                    }
                }
                echo "
                </tbody>
                </table>
                ";



                if (isset($_POST['delete_product'])) {
                    echo  $delete_product_sql = " delete FROM wishlist where pro_id = '$pro_id'";
                    $result = mysqli_query($conn, $delete_product_sql);
                    echo "<script>window.location.replace('wishlist.php');</script>";
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
include "partials/footer.php";
?>

<script>
    $(document).ready(function() {
        $('#myButton').click(function() {
            $.ajax({
                type: 'POST',
                url: 'cart.php',
                success: function(data) {
                    $('#toast').fadeIn().delay(2000).fadeOut();
                }
            });
        });
    });
</script>