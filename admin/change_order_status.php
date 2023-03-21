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
                            <form method="POST" action="" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Invoice number</th>
                                            <th>Customer name</th>
                                            <th>Amount Due</th>
                                            <th>Payment Mode</th>
                                            <th>Order Date</th>
                                            <th>Payment status</th>
                                            <th>Order status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_GET['order_id'])) {
                                            $order_id = $_GET['order_id'];
                                        }
                                        $sql_pro_show = "SELECT * FROM customer_orders where id='$order_id'";
                                        $result = mysqli_query($conn, $sql_pro_show);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $order_id = $row['id'];
                                            $due_amount = $row['due_amount'];
                                            $invoice_number = $row['invoice_number'];
                                            $status = $row['order_status'];
                                            $order_date = $row['order_date'];
                                            $Payment_Mode = $row['Selected_payment_mode'];
                                            $payment_status = $row['payment_status'];
                                            $order_status = $row['order_status'];
                                            $cus_id = $row['customer_id'];
                                            $pro_id = $row['product_id'];
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
                                            <p>' . $due_amount . '$</p>
                                        </td>
                                        <td>
                                            <p>' . $Payment_Mode . '</p>
                                        </td>
                                        <td>
                                            <p>' . $order_date . '</p>
                                        </td>
                                        <td>
                                            <p>' . $payment_status . '</p>
                                        </td>
                                        <td>
                                            <p>' . $order_status . '</p>
                                            <a href="change_order_status.php?order_id=' . $order_id . ' " name="change_order_status" class="btn btn-info">View Details</a>
                                    </tr>';
                                        }
                                        if(isset($_POST['change_order_status'])){
                                            echo "sfdsgf";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </form>
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
                                        $sql_pro_show = "SELECT * FROM products where id = '$pro_id'";
                                        $result = mysqli_query($conn, $sql_pro_show);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $pro_id = $row['id'];
                                            $pro_name = $row['prod_name'];
                                            $pro_price = $row['prod_price'];
                                            $prod_category = $row['prod_category'];
                                            $pro_image = $row['prod_image'];
                                            $pro_desc = $row['prod_description'];
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