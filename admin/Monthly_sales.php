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
                        <div class="special_fn_buttons mt-2 mb-4">
                            <button id="pdfButton" class="btn btn-primary  ">Generate PDF</button>
                            <button onclick="window.print()" class="btn btn-primary ml-3">Print</button>
                        </div>
                        <div class=" m-auto" style="max-width:950%;">
                        <div class="d-flex justify-content-between text-center">
                                <h4 style="float: left;">E-SHOP monthly Sales Report</h4>
                                <h4 style="float: right;">Date : <?php echo $date = date("d-m-y"); ?></h4>
                            </div>
                            <?php
                            $today = date('Y-m-d');
                            $start_date = date('Y-m-d', strtotime('1st this month', strtotime($today)));
                            $end_date = date('Y-m-d', strtotime('31st this month', strtotime($today)));
                            echo "<h5 style='word-spacing: 7px;' class='text-info text-center my-3'>Weekly Report From $start_date  To  $end_date </h5>";
                            ?>
                            <table class="table table-bordered mt-4">
                                <thead class="table-dark">
                                    <tr>
                                        <td>Id</td>
                                        <td>Product</td>
                                        <td>Total Sold</td>
                                        <td>Sale</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $total_sale = 0;
                                    $date = date('y-m-d');
                                    $Query_select = "SELECT * from customer_orders WHERE order_date  BETWEEN '$start_date' AND '$end_date'";
                                    $query_results = mysqli_query($conn, $Query_select);
                                    while ($row = mysqli_fetch_array($query_results)) {
                                        $order_id = $row['id'];
                                        $Query_select2 = "SELECT * from orders_details WHERE  order_id='$order_id'";
                                        $query_results2 = mysqli_query($conn, $Query_select2);
                                        while ($row2 = mysqli_fetch_array($query_results2)) {
                                            $pro_id = $row2['product_id'];
                                            $qty = $row2['qty'];
                                            $select_query = "select * from products where id='$pro_id'";
                                            $query_result = mysqli_query($conn, $select_query);
                                            $count = mysqli_num_rows($query_result);
                                            while ($row3 = mysqli_fetch_array($query_result)) {
                                                $id = $row3['id'];
                                                $prod_name = $row3['prod_name'];
                                                $prod_price = $row3['prod_price'];
                                                $added_stock = $row3['Stock_added'];
                                                $current_stock = $row3['Reamaining_stock'];
                                                $pro_sale_price = $qty * $prod_price;
                                                $total_sale = $total_sale + $pro_sale_price;
                                                echo " <tr>
                                                     <td>$id</td>
                                                     <td>$prod_name</td> 
                                                     <td>$qty</td> 
                                                     <td>$pro_sale_price PKR</td>
                                                 </tr>";
                                            }
                                        }
                                    }

                                    ?>
                                    
                                    <tr>
                                        <td colspan="5" style="text-align:right;">
                                        <?php
                                                    if($count > 0){
                                                        echo "$total_sale PKR";
                                                    }
                                                    else{
                                                        echo " ";
                                                    }
                                            ?>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
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
        <script>
            var button = document.getElementById("pdfButton");
                button.addEventListener("click", function () {
                var doc = new jsPDF("p", "mm", [300, 300]);
                var makePDF = document.querySelector("#generatePdf");
                // fromHTML Method
                doc.fromHTML(makePDF);
                doc.save("output.pdf");
            });
            function printWindow(){
                window.print();
            }

   </script>
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