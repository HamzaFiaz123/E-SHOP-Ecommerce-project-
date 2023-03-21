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
                                    <h2>Net Sale</h2>
                                </div>
                            </div>
                        </div>
                        <div class=" m-auto" style="max-width:950%;">
                            <?php
   
                                $today = date('Y-m-d');
                               $start_date = date('Y-m-d', strtotime('monday this week', strtotime($today)));
                            $end_date = date('Y-m-d', strtotime('sunday this week', strtotime($today)));

                                $select_query ="select * from products";
                                        $query_result = mysqli_query($conn,$select_query);
                                        $count = mysqli_num_rows($query_result);
                                        while($row = mysqli_fetch_array($query_result)){
                                            $id = $row['id'];
                                            $prod_name = $row['prod_name'];
                                            $prod_price = $row['prod_price'];
                                            $added_stock = $row['Stock_added'];
                                            $current_stock = $row['Reamaining_stock'];                                            
                                            $product_sale = $added_stock - $current_stock;
                                            $pro_sale_price = $product_sale * $prod_price;
                                            $date = date('y-m-d');
                                            $Query_select="SELECT * from customer_orders WHERE product_id='$id' AND payment_status='Paid' And order_date BETWEEN '$start_date' AND '$end_date'";
                                            $query_results = mysqli_query($conn,$Query_select);
                                            if($query_results){
                                            echo " <tr>
                                                        <td>$id</td>
                                                        <td>$prod_name</td>
                                                        <td>$product_sale</td>
                                                        <td>$pro_sale_price PKR</td>
                                                    </tr>";
                                            }
                                            // else{
                                            //     echo "<h4 class='text-danger'>Nothing is sale today</h4>";
                                            // }
                                        }

                                // // Query the database for sales between the start and end dates
                                // $query = "SELECT sum(amount) as weekly_sales FROM payments WHERE payment_date BETWEEN '$start_date' AND '$end_date'";
                                // $result = mysqli_query($conn, $query);

                                // Check if the query was successful
                                // if ($result) {
                                //     // Get the total sales for the week
                                //     $row = mysqli_fetch_assoc($result);
                                //     $weekly_sales = $row['weekly_sales'];

                                //     // Output the weekly sales
                                //     echo "Weekly sales: $" . number_format($weekly_sales, 2);
                                // } else {
                                //     // Output an error message if the query failed
                                //     echo "Error: " . mysqli_error($conn);
                                // }
                            ?>
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