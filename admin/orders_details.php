<?php
include "../config/db.php";
include "../functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("partials/links.php");
    ?>
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <?php
            include("partials/left_header.php");
            ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <?php
                include("partials/right_header.php");
                ?>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Order Details</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class=" m-auto" style="max-width:950%;">
                           
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Invoice number</th>
                                            <th>Customer name</th>
                                            <th>Payment Mode</th>
                                            <th>Payment status</th>
                                            <th>Order status</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_GET['order_id'])) {
                                            $order_id = $_GET['order_id'];
                                        }
                                        $sql_pro_show1 = "SELECT * FROM customer_orders where id='$order_id'";
                                        $result1 = mysqli_query($conn, $sql_pro_show1);
                                        while($row1=mysqli_fetch_array($result1)){
                                            $payment_status = $row1['payment_status'];
                                        }
                                        $sql_pro_show = "SELECT * FROM orders_details where order_id='$order_id'";
                                        $result = mysqli_query($conn, $sql_pro_show);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $order_id = $row['id'];
                                            // $due_amount = $row['due_amount'];
                                            $invoice_number = $row['inovoice_num'];

                                            // $order_date = $row['order_date'];
                                            $Payment_Mode = $row['selected_payment_mode'];
                                            $cus_id = $row['customer_id'];
                                            $pro_id = $row['product_id'];
                                            $qty = $row['qty'];
                                            $select_customer = "SELECT * FROM customer_account where id='$cus_id'";
                                            $result_query = mysqli_query($conn, $select_customer);
                                            while ($row = mysqli_fetch_array($result_query)) {
                                                $cus_id = $row['id'];
                                                $customer_name = $row['customer_name'];
                                            }
                                            echo '<tr>
                                        <td>
                                            <p>' . $order_id . '</p>
                                        </td>
                                        <td>
                                            <p>' . $invoice_number . '</p>
                                        </td>
                                        <td>
                                            <p>' . $customer_name . '</p>
                                            <a href="customer_details.php?cus_id=' . $cus_id . '" class="btn btn-info">View Details</a>
                                        </td>
                                        <td>
                                            <p>' . $Payment_Mode . '</p>
                                        </td>
                                      
                                        <td>
                                         <p>' . $Payment_Mode . '</p>
                                        </td>
                                        <form method="POST">
                                            <td>
                                                <a href="#?order_id=' . $order_id . '" name="change_order_status" class="btn btn-info">Change Details</a>
                                            </td>
                                        </form>
                                        <td>
                                            <p>' . $qty . '</p>
                                        </td>
                                    </tr>';
                                        }
                                        if(isset($_POST['change_order_status'])){
                                            echo "idj";
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            
                            <div class="row column_title">
                                <div class="col-md-12">
                                    <div class="page_title">
                                        <h2>Product Details</h2>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Descrption</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_GET['order_id'])) {
                                            $order_id = $_GET['order_id'];
                                        }
                                       $sql_pro_show2 = "SELECT * FROM orders_details where order_id='$order_id'";
                                        $result2 = mysqli_query($conn, $sql_pro_show2);
                                        while ($row2 = mysqli_fetch_array($result2)) {
                                            $pro_id = $row2['product_id'];
                                            $sql_pro_show3 = "SELECT * FROM products where id='$pro_id'";
                                            $result3 = mysqli_query($conn, $sql_pro_show3);
                                            while ($row3 = mysqli_fetch_array($result3)) {
                                                $pro_name = $row3['prod_name'];
                                                $pro_price = $row3['prod_price'];
                                                $prod_category = $row3['prod_category'];
                                                $pro_image = $row3['prod_image'];
                                                $pro_desc = $row3['prod_description'];
                                                // $total = $total + ($qty * $pro_price);
                                                // $_SESSION['amount_due'] = $total;


                                                echo '<tr>
                                                            <td>
                                                                <img src="../uploaded_images/' . $pro_image . '" style="height: 150px;">                                    
                                                            </td>
                                                            <td>
                                                            <p>' . $pro_name . '</p>                                    
                                                            </td>
                                                            <td>
                                                            <p>' . $prod_category . '</p>                        
                                                            </td>
                                                            <td>
                                                            <p>' . $pro_price . '$</p>                        
                                                            </td>
                                                            <td>
                                                            <p>' . $pro_desc . '</p>
                                                            </td>
                                                        </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>

                        <!-- footer -->
                        <div class="container-fluid">
                            <?php
                            include("partials/footer.php");
                            ?>
                        </div>
                    </div>
                    <!-- end dashboard inner -->
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- wow animation -->
        <script src="js/animate.js"></script>
        <!-- select country -->
        <script src="js/bootstrap-select.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.js"></script>
        <!-- chart js -->
        <script src="js/Chart.min.js"></script>
        <script src="js/Chart.bundle.min.js"></script>
        <script src="js/utils.js"></script>
        <script src="js/analyser.js"></script>
        <!-- nice scrollbar -->
        <script src="js/perfect-scrollbar.min.js"></script>
        <script>
            var ps = new PerfectScrollbar('#sidebar');
        </script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <script src="js/chart_custom_style1.js"></script>
</body>

</html>