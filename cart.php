<?php

include "partials/links.php";
include "config/db.php";
include "partials/header.php";
include "functions.php";

if (isset($_POST['increase_qty_btn'])) {
    $ip_add = getIPAddress();
    $update_qty_val = $_POST['qty_field'] + 1;
    $pro_id = $_POST['pro_id'];
    $update_qty_query = "UPDATE cart SET qty=$update_qty_val WHERE ip_add='$ip_add' and product_id = '$pro_id'";
    $query_result_update = mysqli_query($conn, $update_qty_query);
}
if (isset($_POST['decrease_qty_btn'])) {
    $ip_add = getIPAddress();
    $pro_id = $_POST['pro_id'];
    $update_qty_val = $_POST['qty_field'] - 1;
    if ($update_qty_val == 0) {
        $update_qty_query = "DELETE from cart WHERE ip_add='$ip_add' and product_id = '$pro_id'";
        $query_result_update = mysqli_query($conn, $update_qty_query);
        header('Location: cart.php?successfully_deleted_from_cart=' . $pro_id . '');
        echo "
            <script>swal('DELETED!', 'As quantity becomes zero, deleted from cart', 'success');</script>
        ";
    } else {
        $update_qty_query = "UPDATE cart SET qty=$update_qty_val WHERE ip_add='$ip_add' and product_id = '$pro_id'";
        $query_result_update = mysqli_query($conn, $update_qty_query);
    }
}
?>

<div class="container my-5">
    <h3 class="text-primary mb-4">Shopping Cart</h3>
    <div class="row">
        <div class="col-lg-12">
            <?php
            $ip_add = getIPAddress();
            $total = 0;
            $cart_check = "SELECT * FROM cart where ip_add='$ip_add'";
            $query_result = mysqli_query($conn, $cart_check);
            $count = mysqli_num_rows($query_result);
            if ($count < 1) {
                echo "<div class='alert alert-success'>No products in cart to show</div>";
            } else {
                echo '
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>total</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>                       
                        ';
                $ip_add = getIPAddress();
                $total = 0;
                $cart_check = "SELECT * FROM cart where ip_add='$ip_add'";
                $query_result = mysqli_query($conn, $cart_check);
                $count = mysqli_num_rows($query_result);
                if ($count < 1) {
                    echo "<div class='alert alert-success'>No products in cart to show</div>";
                } else {
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
                            $_SESSION['amount_due'] = $total;


                            echo '<tr>
                                    <td>
                                        <img src="uploaded_images/' . $pro_image . '" style="height: 90px;float: left;margin-right: 20px">
                                        <h5>' . $pro_name . '</h5>
                                    </td>
                                    <td>
                                        <h5>' . $pro_price . '$</h5>
                                    </td>
                                    <td>
                                    <form method="post">
                                        <input type="hidden" name="pro_id" value="' . $pro_id . '">
                                        <button class="btn btn-primary float-left" name=" increase_qty_btn" id="cus_btn_clr">+</button>
                                        <input type="text" value="' . $qty . '" class="form-control float-left" name="qty_field" style="width: 40px;">
                                        <button class="btn btn-primary float-left" id="cus_btn_clr" name="decrease_qty_btn" >-</button>
                                        </form>
                                    </td>
                                    <td>
                                        <h5>' . $qty * $pro_price . '$</h5>
                                    </td>
                                    <td>
                                    <form method="POST">
                                        <button type="submit" name="delete_product" class="btn btn-dark">Delete</button>
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

                echo '
                <div class="border my-4 py-5 px-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="text" class="form-control" placeholder="Enter your Coupon here" name="">
                    </div>
                    <div>
                        <button type="button" class="btn btn-dark py-2 px-3" style="border-radius: 40px;">Apply
                            Coupon</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-dark py-2 px-3" style="border-radius: 40px;">Update</button>
                    </div>
                    <div>
                        <div class="form-group d-flex">
                            <h4>
                                Total
                            </h4>
                            <p class="ml-auto">                                
                                '.$_SESSION['amount_due'] . "$".'                           
                            </p>
                        </div>

                        <a href="checkout.php" class="btn btn-dark w-100">Proceed to checkout</a>
                    </div>
                </div>
            </div>
                ';


                if (isset($_POST['delete_product'])) {
                    echo  $delete_product_sql = " delete FROM cart where product_id = '$pro_id'";
                    $result = mysqli_query($conn, $delete_product_sql);
                    echo "<script>window.location.replace('cart.php');</script>";
                }
            }
            ?>


         
        </div>
    </div>
</div>
</div>

<?php
include "partials/footer.php";
?>