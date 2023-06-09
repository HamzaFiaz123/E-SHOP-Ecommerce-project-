<?php

include "partials/links.php";
include "config/db.php";
include "partials/header.php";
include "functions.php";

if (isset($_POST['update_qty_btn'])) {
    $ip_add = getIPAddress();
    $update_qty_val = $_POST['qty_field'];
    $pro_id = $_POST['pro_id'];
    $update_qty_query = "UPDATE cart SET qty=$update_qty_val WHERE ip_add='$ip_add' and product_id = '$pro_id'";
    $query_result_update = mysqli_query($conn, $update_qty_query);
 }
?>

<div class="container my-5">
    <h3 class="text-primary mb-4">Shopping Cart</h3>
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $ip_add = getIPAddress();
                $cart_check  = "SELECT * FROM cart where ip_add='$ip_add'";
                $query_result = mysqli_query($conn, $cart_check);
                while($row=mysqli_fetch_array($query_result)){
                    $pro_id = $row['product_id'];
                    $qty = $row['qty'];
                    $sql_pro_show = "SELECT * FROM products where id = '$pro_id'"; 
                    $result = mysqli_query($conn, $sql_pro_show);
                        while ($row = mysqli_fetch_array($result)) {
                            $pro_id = $row['id'];
                            $pro_name = $row['prod_name'];
                            $pro_price = $row['prod_price'];
                            $pro_image = $row['prod_image'];
    
                            echo '<tr>
                            <td>
                                <img src="upload-images/'.$pro_image.'" style="height: 90px;float: left;margin-right: 20px">
                                <h5>'.$pro_name.'</h5>
                            </td>
                            <td>
                                <h5>'.$pro_price.'$</h5>
                            </td>
                            <td>
                            <form method="post">
                            <input type="hidden" name="pro_id" value="'.$pro_id.'">
                                <button class="btn btn-primary float-left" name="update_qty_btn" id="cus_btn_clr">+</button>
                                <input type="text" value="'.$qty.'" class="form-control float-left" name="qty_field" style="width: 40px;">
                                <button class="btn btn-primary float-left" id="cus_btn_clr" name="update_qty_btn" >-</button>
                                </form>
                            </td>
                            <td>
                                <h5>'.$qty*$pro_price.'$</h5>
                            </td>
                        </tr>';
                        
                        }

                }

                
                ?>
                    
                </tbody>
            </table>
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
                </div>
            </div>
        </div>
        <div class="col-lg-3 border p-2">
            <div>
                <h4>Summary</h4>
                <hr>
                <h6>Estimate Shipping and Tax</h6>
                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" class="form-control" placeholder="Pakistan">
                </div>
                <div class="form-group">
                    <label for="">State/Province</label>
                    <input type="text" class="form-control" placeholder="Punjab">
                </div>
                <div class="form-group">
                    <label for="">Zip Code</label>
                    <input type="text" class="form-control" placeholder="484889">
                </div>
                <div class="form-group d-flex">
                    <label for="">Subtotal</label>
                    <p class="ml-auto">67$</p>
                </div>
                <div class="form-group d-flex">
                    <label for="">Tax</label>
                    <p class="ml-auto">0$</p>
                </div>
                <hr>
                <div class="form-group d-flex">
                    <h4>Order total</h4>
                    <p class="ml-auto">0$</p>
                </div>
                <a href="checkout.php" class="btn btn-dark w-100">Proceed to checkout</a>
            </div>
        </div>
    </div>
</div>














<?php
include "partials/footer.php";
?>