<?php
session_start();
include "partials/links.php";
include "config/db.php";
include "partials/header.php";
include "functions.php";

if (!isset($_SESSION['email'])) {
    echo "<script>window.location.replace('login_page.php')</script>;";
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-7 border py-3 px-3">
            <form action="" method="post" enctype="multipart/form-data">
                <h2 class="text-primary mb-3">Billing Info</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Name</label>
                        <input type="text" name="cus_name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="col-lg-6">
                        <label for="">Phone</label>
                        <input type="number" name="cus_phone" class="form-control" placeholder="Enter your phone">
                    </div>
                </div>
                <div class="my-3">
                    <label for="">Your Picture</label><br>
                    <input type="file" name="cus_image" class="cus_input_style w-75" placeholder="Select Your Picture" name="cus_image">
                </div>
                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" name="cus_country" class="form-control" placeholder="Enter your country">
                </div>
                <div class="form-group">
                    <label for="">Billing Address</label>
                    <input type="text" name="cus_address" class="form-control" placeholder="Enter your billing address">
                </div>
                <div class="form-group">
                    <label for="">Postal code</label>
                    <input type="number" name="postal_code" class="form-control" placeholder="Enter your post code">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="submit_customer_btn">Saved your information</button>
                </div>
                <div class="form-group">
                    <a href="login_page.php">Don't have an account. Lets create it</a>
                </div>
                <?php
                if (isset($_POST['submit_customer_btn'])) {
                    $cus_id = $_SESSION['id'];
                    $cus_name = $_POST['cus_name'];
                    $filename = $_FILES["cus_image"]["name"];
                    $tempname = $_FILES["cus_image"]["tmp_name"];
                    $folder = "uploaded_images/" . $filename;
                    $image_result = move_uploaded_file($tempname, $folder);
                    $cus_phone = $_POST['cus_phone'];
                    $cus_country = $_POST['cus_country'];
                    $cus_address = $_POST['cus_address'];
                    $postal_code = $_POST['postal_code'];
                    $update_customer = "UPDATE customer_account SET customer_name='$cus_name',customer_phone='$cus_phone',customer_address='$cus_address',customer_country='$cus_country',postal_code='$postal_code',customer_image='$filename' WHERE id='$cus_id'";
                    $customer_result = mysqli_query($conn, $update_customer);
                    if ($customer_result) {
                        echo "<div class='alert alert-success'>Successfully saved your information</div>";
                    }
                }
                ?>
            </form>
        </div>
        <div class=" col-lg-4 border py-3 px-3 ml-5" style="background-color: #f2f2f2;">
            <form method="post" action="">
                <h3 class="mb-3">Your Order</h3>
                <h5 class="mb-3">Products</h5>
                <hr>
                <?php
                $ip_add = getIPAddress();
                $total = 0;
                $cart_check = "SELECT * FROM cart where ip_add='$ip_add'";
                $query_result = mysqli_query($conn, $cart_check);
                while ($row = mysqli_fetch_array($query_result)) {
                    $pro_id = $row['product_id'];
                    $qty = $row['qty'];
                    $sql_pro_show = "SELECT * FROM products where id = '$pro_id'";
                    $result = mysqli_query($conn, $sql_pro_show);
                    while ($row = mysqli_fetch_array($result)) {
                        // echo $pro_id = implode(array($row['id']));
                        $pro_id = $row['id'];
                        $pro_name = $row['prod_name'];
                        $pro_price = $row['prod_price'];
                        $pro_image = $row['prod_image'];
                        $total = $total + ($qty * $pro_price);

                        echo '
                            <div class="mb-2 d-flex">
                        <label for="">' . $pro_name . '</label>
                        <p class="ml-auto">' . $pro_price . '$</p>
                    </div><hr>';
                    }
                }


                ?>

                <div class="mb-3 d-flex">
                    <?php
                    $ip_add = getIPAddress();
                    $total = 0;
                    $cart_check = "SELECT * FROM cart where ip_add='$ip_add'";
                    $query_result = mysqli_query($conn, $cart_check);
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
                            $_SESSION['due_amount'] = $total;
                            $due_amount = $_SESSION['due_amount'];
                        }
                    }
                    ?>
                    <label for="">Subtotal</label>
                    <p class="ml-auto">
                        <?php
                        echo $total;

                        ?>
                        $
                    </p>
                </div>
                <h5 class="mb-3">Shipping</h5>
                <input type="radio">
                <label for="">Local</label><br>
                <input type="radio">
                <label for="">Flat Rate</label>
                <hr>
                <div class="mb-3 d-flex">
                    <label for="">Total</label>
                    <p class="ml-auto">
                        <?php
                        echo $total;

                        ?>
                        $
                    </p>
                </div>
                <h5 class="mb-3">Payments Method</h5>
                    <input type="radio" value="stripe" name="payment_method"><a href="stripe/index.php" style="    margin-left: 14px;
    color: black;">Pay by stripe</a><br>
                    <input type="radio" value="pay offline" name="payment_method"><a href="Offline_back_details.php"  style="    margin-left: 14px;
    color: black;">Pay offline</a><br>    

                <!-- <a href="Offline_back_details.php" class="form-group">If you want to pay offline, then click here</a><br><br> -->
                <button type="submit" name="place-order-btn" class="btn btn-dark">Place Order</button>
            </form>

            <?php
                order_placement();
            ?>
        </div>
    </div>
</div>





<?php
include "partials/footer.php";
?>