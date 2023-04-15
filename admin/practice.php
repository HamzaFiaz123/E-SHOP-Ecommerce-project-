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
                                    <h2>Net Sales Report Details</h2>
                                </div>
                            </div>
                        </div>
                        <div class="special_fn_buttons mt-2 mb-4">
                            <button id="pdfButton" class="btn btn-primary  ">Generate PDF</button>
                            <button onclick="window.print()" class="btn btn-primary ml-3">Print</button>
                        </div>
                        <div class="therapist_menu">
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="index.php">Shop</a>
                                </li>
                                <li>
                                    <a href="index.php">products</a>
                                </li>
                                <li>
                                    <a href="index.php">About Us</a>
                                </li>
                                <li>
                                    <a href="index.php">Contact us</a>
                                </li>
                            </ul>
                        </div>
                        <?php
            
                        ?>
                        <div class=" m-auto" style="max-width:950%;" id="generatePdf">
                            <h4 style="float: left;">E-SHOP Sales Report</h4>
                            <h4 style="float: right;">Date : <?php echo $date = date("d-m-y"); ?></h4>
                            <table class="table table-bordered mt-4">
                                <thead class="table-dark">
                                    <tr>
                                        <td>Id</td>
                                        <td>Product</td>
                                        <td>Price</td>
                                        <td>Total Sold</td>
                                        <td>Sale</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_sale=0;
                                    $select_query = "select * from products";
                                    $query_result = mysqli_query($conn, $select_query);
                                    $count = mysqli_num_rows($query_result);
                                    while ($row = mysqli_fetch_array($query_result)) {
                                        $id = $row['id'];
                                        $prod_name = $row['prod_name'];
                                        $prod_price = $row['prod_price'];
                                        $added_stock = $row['Stock_added'];
                                        $current_stock = $row['Reamaining_stock'];
                                        $product_sale = $added_stock - $current_stock;
                                        $pro_sale_price = $product_sale * $prod_price;
                                        $total_sale = $total_sale + ($product_sale * $prod_price);
                                        $Query_select = "SELECT * from orders_details WHERE product_id='$id'";
                                        $query_results = mysqli_query($conn, $Query_select);
                                        if ($query_results) {
                                            echo " <tr>
                                                        <td>$id</td>
                                                        <td>$prod_name</td>
                                                        <td>$prod_price</td>
                                                        <td>$product_sale</td>
                                                        <td>$pro_sale_price PKR</td>
                                                    </tr>";
                                        }
                                    }


                                    ?>
                                    
                                </tbody>
                            </table>

                            <h4 class="text-right">Net Sale : <?php echo $total_sale ?> Pkr</h4>

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