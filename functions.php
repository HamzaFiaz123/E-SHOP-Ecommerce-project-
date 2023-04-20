<?php
include "partials/links.php";
include "config/db.php";
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function show_products_for_customers()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql_pro_show);
    if (mysqli_num_rows($result) >= 1) {
        while ($row = mysqli_fetch_array($result)) {
            $pro_id = $row['id'];
            $pro_name = $row['prod_name'];
            $pro_price = $row['prod_price'];
            $stock = $row['Stock_added'];
            $pro_image = $row['prod_image'];
            echo '<div class="col-lg-3 col-md-4">
                        <div class="product_boxs">
                            <img src="uploaded_images/' . $pro_image . '" alt="">
                            <div class="product_info text-center">
                                 <h5>' . $pro_name . '</h5>
                                 <p>Beutifull watch rado</p>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <div class="d-flex justify-content-between">
                                    <h6>' . $pro_price . '$</h6>
                                    <a href=" addcart.php?pro_id=' . $pro_id . '"><img src="images/shopping-bag.png" style="height: 20px;margin-right:12px;" alt=""></a>';
            // if($stock < 1){
            //     echo "<h6>Availability <small class='ml-1'>Out of stock</small></h6>";
            // }
            // else{
            //     echo "<h6>Availability <small class='ml-3'>In stock</small></h6>";
            // }
            echo '
                                 </div>
                            </div>
                        </div>
                    </div>';
        }
    }
}

function show_products_for_admin()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql_pro_show);
    while ($row = mysqli_fetch_array($result)) {
        $pro_id = $row['id'];
        $pro_name = $row['prod_name'];
        $pro_price = $row['prod_price'];
        $pro_image = $row['prod_image'];
        $pro_cat = $row['prod_category'];
        $pro_supp = $row['prod_supplier'];
        $pro_image = $row['prod_image'];
        $stock_added = $row['Stock_added'];
        $Reamaining_stock = $row['Reamaining_stock'];

        echo '<tr>
                                <td>
                                <p>' . $pro_id . '</p>
                            </td>
                            <td>
                                <img src="../uploaded_images/' . $pro_image . ' "  style="height: 90px;float: left;margin-right: 20px">
                                <p>' . $pro_name . '</p>
                            </td>
                            <td>
                                <p>' . $pro_price . '$</p>
                            </td>
                            <td>
                                <p>' . $stock_added . '</p>
                            </td>
                            <td>
                                <p>' . $Reamaining_stock . '</p>
                            </td>
                            <td>
                                <p>' . $pro_cat . '</p>
                            </td>
                            <td>
                                <p>' . $pro_supp . '</p>
                            </td>
                            <td>
                           <form method="POST">
                                <a href="update_products.php?pro_id=' . $pro_id . '"  class="btn btn-primary" id="cus_btn_clr">EDIT</a><br><br>
                                <a href="delete_products.php?pro_id=' . $pro_id . '"  class="btn btn-danger" id="cus_btn_clr">DELETE</a>
                                </form>
                            </td>
                        </tr>';
    }
}

function products_count()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    echo "<p class='total_no'>$count</p>";

}
function total_cart_item()
{
    include "config/db.php";
    $ip_add = getIPAddress();
    $sql_pro_show = "SELECT * FROM cart where ip_add='$ip_add'";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    echo $count;

}

function search_products()
{
    include "config/db.php";
    if (isset($_POST['Search-btn'])) {
        $search_word = $_POST['seach_word'];
        $sql_pro_show = "SELECT * FROM products where prod_name OR prod_description LIKE '%$search_word%'";
        $result = mysqli_query($conn, $sql_pro_show);
        if (mysqli_num_rows($result) >= 1) {
            while ($row = mysqli_fetch_array($result)) {
                $pro_id = $row['id'];
                $pro_name = $row['prod_name'];
                $pro_price = $row['prod_price'];
                $pro_image = $row['prod_image'];
                echo '<div class="col-lg-3 col-md-4">
                <div class="product_boxs">
                    <img src="uploaded_images/' . $pro_image . '" alt="">
                    <div class="product_info text-center">
                         <h5>' . $pro_name . '</h5>
                         <p>Beutifull watch rado</p>
                         <i class="fa fa-star mr-2 checked"></i>
                         <i class="fa fa-star mr-2 checked"></i>
                         <i class="fa fa-star mr-2 checked"></i>
                         <i class="fa fa-star mr-2 checked"></i>
                         <i class="fa fa-star mr-2 checked"></i>
                         <div class="d-flex justify-content-between">
                            <h5>' . $pro_price . '$</h5>
                            <a href=" addcart.php?pro_id=' . $pro_id . '"><img src="images/shopping-bag.png" style="height: 20px;margin-right:12px;" alt=""></a>';
                // if($stock < 1){
                //     echo "<h6>Availability <small class='ml-1'>Out of stock</small></h6>";
                // }
                // else{
                //     echo "<h6>Availability <small class='ml-3'>In stock</small></h6>";
                // }
                echo '
                         </div>
                    </div>
                </div>
            </div>';
            }
        }
    }
}

function categories_count()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM product_categories";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    echo "<p class='total_no'>$count</p>";

}

function show_categories_info()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM product_categories";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $cat_id = $row['id'];
        $cat_name = $row['name'];
        $filename = $row["image"];
        echo '<div class="col-lg-2 col-md-3 col-sm-6 cus_flex">
    <div>
        <div>
            <img src="uploaded_images/' . $filename . ' " class="img-fluid" alt="">
            <div class="text-center mt-1">
                <a href="all_products.php?cat_name=' . $cat_name . '">' . $cat_name . '</a>
            </div>
        </div>
    </div>
</div>';
    }


}
// <h5 class="mb-1">' . $cat_name . '</h5>

function show_suppliers()
{
    include "config/db.php";
    $show_supplier_query = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $show_supplier_query);
    if (mysqli_num_rows($result) >= 1) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $supplier_name = $row['supplier_name'];
            echo '<tr>
            <td>
            <p>' . $id . '</p>
        </td>
        <td>
            <p>' . $supplier_name . '</p>
        </td>
        <td>
       <form method="POST">
            <a href="update_suppliers.php?supp_id=' . $id . '"  class="btn btn-primary ml-2" id="cus_btn_clr">EDIT</a>
            <a href="delete_suppliers.php?supp_id=' . $id . '"  class="btn btn-danger ml-2" id="cus_btn_clr">DELETE</a>
            </form>
        </td>
    </tr>';
        }
    }
}

function show_categories()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM product_categories";
    $result = mysqli_query($conn, $sql_pro_show);
    if (mysqli_num_rows($result) >= 1) {
        while ($row = mysqli_fetch_array($result)) {
            $cat_id = $row['id'];
            $cat_name = $row['name'];
            $filename = $row["image"];
            echo '<tr>
            <td>
            <p>' . $cat_id . '</p>
        </td>
        <td>
            <p>' . $cat_name . '</p>
        </td><td>
        <img src="../uploaded_images/' . $filename . ' "  style="height: 90px;float: left;margin-right: 20px">
    </td>
        <td>
       <form method="POST">
            <a href="update_categories.php?cat_id=' . $cat_id . '"  class="btn btn-primary ml-2" id="cus_btn_clr">EDIT</a>
            <a href="delete_categories.php?cat_id=' . $cat_id . '"  class="btn btn-danger ml-2" id="cus_btn_clr">DELETE</a>
            </form>
        </td>
    </tr>';
        }
    }



}

function add_supplier()
{
    include "config/db.php";
    if (isset($_POST['submit'])) {
        $supplier_name = $_POST['supplier_name'];
        $sql_pro_show = "SELECT * FROM supplier where supplier_name='$supplier_name'";
        $result = mysqli_query($conn, $sql_pro_show);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "<div class='alert alert-success my-3'>This supplier already entered</div>    
            ";
        } else {
            $sql_supplier = "INSERT INTO supplier(supplier_name) VALUES ('$supplier_name')";
            $result = mysqli_query($conn, $sql_supplier);
            if ($result) {
                echo "<div class='alert alert-success my-3'>New supplier added successfully</div>    
                ";

            } else {
                echo "Error: " . $sql_supplier . "<br>" . mysqli_error($conn);
            }
        }
    }

}

function add_categories()
{
    include "config/db.php";
    if (isset($_POST['submit'])) {
        $cat_name = strtolower($_POST['cat_name']);
        $filename = $_FILES["cat_image"]["name"];
        $tempname = $_FILES["cat_image"]["tmp_name"];
        $folder = "../uploaded_images/" . $filename;
        $image_result = move_uploaded_file($tempname, $folder);
        $check_catg = "SELECT * FROM product_categories where name='$cat_name'";
        $result = mysqli_query($conn, $check_catg);
        $count = mysqli_num_rows($result);
        $count;
        if ($count > 0) {
            echo "<div class='alert alert-success my-3'>This category already entered</div>    
            ";
        } else {
            $sql = "INSERT INTO product_categories (name, image) VALUES ('$cat_name', '$filename')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<div class='alert alert-success my-3'>New category added successfully</div>    
                ";

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

}

function update_suppliers()
{
    if (isset($_POST['update'])) {
        include "config/db.php";
        $supp_id = $_GET["supp_id"];
        $supp_name = $_POST['supp_name'];
        $sql = "UPDATE supplier SET supplier_name='$supp_name' where id=$supp_id ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert alert-success'>Updated  successfully</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function update_products()
{
    if (isset($_POST['update'])) {
        include "config/db.php";
        $pro_id = $_GET["pro_id"];
        $prod_name = $_POST['pro_name'];
        $prod_catg = $_POST['pro_cat'];
        $add_prod_stock = $_POST['pro_stock'];
        $prod_supp = $_POST['supplier'];
        $prod_price = $_POST['pro_price'];
        $prod_desc = $_POST['pro_desc'];
        $filename = $_FILES["pro_image"]["name"];
        $tempname = $_FILES["pro_image"]["tmp_name"];
        $folder = "../uploaded_images/" . $filename;
        $image_result = move_uploaded_file($tempname, $folder);
        $sql = "UPDATE products SET prod_name='$prod_name' , prod_category='$prod_catg', prod_supplier='$prod_supp', prod_description='$prod_desc' , prod_price='$prod_price' , prod_image='$filename' , Stock_added='$add_prod_stock' where id=$pro_id ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert alert-success'>Updated  successfully</div>
            <script> 
                window.location.replace('products.php');
               </script>";
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function add_products()
{
    if (isset($_POST['submit'])) {
        include "config/db.php";
        $prod_name = $_POST['pro_name'];
        $add_prod_stock = $_POST['add_pro_stock'];
        $prod_catg = $_POST['pro_cat'];
        $prod_supp = $_POST['supplier'];
        $prod_price = $_POST['pro_price'];
        $prod_desc = $_POST['pro_desc'];
        $filename = $_FILES["pro_image"]["name"];
        $tempname = $_FILES["pro_image"]["tmp_name"];
        $folder = "../uploaded_images/" . $filename;
        $image_result = move_uploaded_file($tempname, $folder);
        $sql_product = "SELECT * FROM products where prod_name='$prod_name'";
        $product_result = mysqli_query($conn, $sql_product);
        $count = mysqli_num_rows($product_result);
        if ($count > 0) {
           echo "<div class='alert alert-success'>Already entered</div>";
        } else {
            $sql = "INSERT INTO products (prod_name, prod_category,prod_supplier, prod_description, prod_price,prod_image,Stock_added,Reamaining_stock) VALUES ('$prod_name', '$prod_catg','$prod_supp', '$prod_desc','$prod_price','$filename','$add_prod_stock','$add_prod_stock')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<div class='alert alert-success'>Successfully enter product</div>";
            } else {
                echo "<div class='alert alert-success'>Product not added Try again</div>";
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}

function order_placement()
{
    if (isset($_POST['place-order-btn'])) {
        include "config/db.php";
        $ip = getIPAddress();
        $cus_id = $_SESSION['id'];
        $payment_method = $_POST['payment_method'];
        $invoice = mt_rand(1, 10000);
        $order_status = "pending";
        $due_amount = $_SESSION['due_amount'];
        $payment_status = "unpaid";
        $cart_check = "SELECT * FROM cart where ip_add='$ip'";
        $query_result = mysqli_query($conn, $cart_check);
        $sql = "INSERT INTO customers_orders (invoice_number, total_amount, placed_on, selected_payment_mode, customer_id, order_status, payment_status) VALUES('$invoice','$due_amount', Now(), '$payment_method', '$cus_id', '$order_status', '$payment_status')";
        $result = mysqli_query($conn, $sql);
        $order_id = mysqli_insert_id($conn);
        if ($result) {
            while ($row = mysqli_fetch_array($query_result)) {
                $pro_id = $row['product_id'];
                $qty = $row['qty'];
                $sql_pro_show = "SELECT * FROM products where id = '$pro_id'";
                $result2 = mysqli_query($conn, $sql_pro_show);
                while ($row2 = mysqli_fetch_array($result2)) {
                    $pro_id = $row2['id'];
                    $pro_price = $row2['prod_price'];
                    $stock = $row2['Reamaining_stock'] - $qty;
                    $update_stock_query = "UPDATE products SET Reamaining_stock='$stock' WHERE id='$pro_id'";
                    $resul = mysqli_query($conn, $update_stock_query);
                    $sql2 = "INSERT INTO orders_details(order_id,inovoice_num, product_id, qty,poduct_price) VALUES( $order_id,'$invoice','$pro_id','$qty','$pro_price')";
                    $result3 = mysqli_query($conn, $sql2);
                }
            }
            $delte_cart = "delete from cart where ip_add='$ip'";
            $result_delete = mysqli_query($conn, $delte_cart);
            echo "
            <script>window.location.replace('customer/my_orders.php?successfully_order_placed=$order_id');</script>
        ";
        } else {
            echo "
            <script>swal('Order not placed!', 'Please try again', 'error');</script>
        ";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


}
function cart_count()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM customer_orders";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    echo "<p style='font-size:20px;color:brown;margin-left:-11px;    display: inline-block;'>$count</p>";
}

function orders_count()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM customer_orders";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    echo "<p style='font-size:20px;color:white;'>$count</p>";
}
function orders_count_for_admin()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM customers_orders where order_status='Pending'";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    echo "<p class='total_no'>$count</p>";
}

function general_orders_count_for_admin()
{
    include "config/db.php";
    $sql_pro_show = "SELECT * FROM customers_orders ";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    if($count<1){
        echo "<p class='total_no'>0</p>";
    }
    else{
        echo "<p class='total_no'>$count</p>";
    }
}



function update_categories()
{
    include "config/db.php";
    $cat_id = $_GET["cat_id"];
    if (isset($_POST['update'])) {
        $cat_name = $_POST['cat_name'];
        $filename = $_FILES["cat_image"]["name"];
        $tempname = $_FILES["cat_image"]["tmp_name"];
        $folder = "../uploaded_images/" . $filename;
        $image_result = move_uploaded_file($tempname, $folder);
        $check_catg = "select * from product_categories where name='$cat_name'";
        $result = mysqli_query($conn, $check_catg);
        $count = mysqli_num_rows($result);
        $count;
        if ($count > 1) {
            echo "<div class='alert alert-success my-3'>This category already entered</div>    
            ";
        } else {
            $sql = "UPDATE product_categories SET name='$cat_name' , image='$filename'where id='$cat_id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<div class='alert alert-success'>Updated  successfully</div>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}


function admin_login()
{
    include "config/db.php";
    if (isset($_POST["admin_submit_btn"])) {
        $admin_email = $_POST["admin_email"];
        $admin_password = $_POST["admin_password"];
        $regt_sql = " SELECT * FROM admin_account WHERE admin_email = '$admin_email' AND admin_password = '$admin_password'";
        $_SESSION['admin_email'] = $admin_email;
        $result = mysqli_query($conn, $regt_sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            echo
                "
                <script> 
                alert('login');
                window.location.replace('admin.php');
               </script>";
        } else {
            echo
                "<div class='alert alert-danger'>Wrong credientials</div>";
        }
    }
}


function login_user()
{
    include "config/db.php";
    if (isset($_POST["login_btn"])) {
        $login_email = $_POST["login_email"];
        $login_pass = $_POST["login_pass"];
        $regt_sql = " SELECT * FROM customer_account WHERE customer_email = '$login_email' AND customer_password = '$login_pass'";
        $_SESSION['email'] = $login_email;
        $result = mysqli_query($conn, $regt_sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        if (mysqli_num_rows($result) > 0) {
            echo '<script>
            window.location.replace("checkout.php");
        </script>';
        } else {            
            echo'
            <script>
            swal("Login Failed", "User Not Registered!", "error");
            </script>';
        }
    }
}


function confirm_payment()
{
    include "config/db.php";
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
    }
    if (isset($_POST['confirm_btn'])) {
        $payment_mode = $_POST['payment_mode'];
        $invoice_num = $_POST['invoice_num'];
        $amount = $_POST['amount'];
        $reference_code = $_POST['reference_code'];
        $bank_code = $_POST['bank_code'];
        $payment_date = $_POST['payment_date'];
        $insert_payment = "insert into payments(order_id,inovoice_num, amount, payment_mode, reference_no, code, payment_date)values('$order_id','$invoice_num','$amount','$payment_mode','$reference_code','$bank_code','$payment_date')";
        $run_query = mysqli_query($conn, $insert_payment);
        if ($run_query) {
            $update_query = "UPDATE customers_orders SET payment_status='Paid' WHERE id='$order_id'";
            $run_query2 = mysqli_query($conn, $update_query);
            echo '<div class="alert alert-info">Thanks for payment, your order will be completed within 24 hours</div>';
        } else {    
            echo '<div class="alert alert-info">Some error occured, please try again</div>';
        }
    }
}


function register_user()
{
    include "config/db.php";
    $_SESSION['ip_add'] = getIPAddress();
    $ip = $_SESSION['ip_add'];
    if (isset($_POST['register_btn'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $reg_sql = "insert into customer_account (customer_email, customer_password, customer_ip,customer_name,customer_phone, customer_address, customer_country, postal_code) VALUES ('$email', '$pass', '$ip',' ',' ',' ',' ','0')";
        $result = mysqli_query($conn, $reg_sql);
        if ($result) {
            echo "<div class='alert alert-success'>Successfully register</div>";
        } else {
            echo "<div class='alert alert-danger'>Not successfull, try again</div>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function addtocart()
{
    include "config/db.php";
    $p_id = $_GET['pro_id'];
    $ip_add = getIPAddress();
    $cart_check = "SELECT * FROM cart where ip_add='$ip_add' AND product_id='$p_id'";
    $query_result = mysqli_query($conn, $cart_check);
    $row = mysqli_fetch_array($query_result);
    $qty = $row['qty'];
    $count = mysqli_num_rows($query_result);
    if ($count > 0) {
        echo '<script>
        swal("Good job!", "You clicked the button!", "success");
    </script>';
    } else {
        $insert_cart = "insert into cart (product_id , ip_add , qty ) values ('$p_id' , '$ip_add' , '1' )";
        $result = mysqli_query($conn, $insert_cart);
        if ($result) {
            echo '<script>
        swal("Good job!", "You clicked the button!", "success");
    </script>';
        } else {
            echo "<div class='alert alert-danger'>Not successfull, try again</div>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}



?>

