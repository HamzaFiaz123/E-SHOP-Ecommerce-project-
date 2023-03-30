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
                            <h2>Change order status</h2>
                            <form action="" method="post">
                                <select name="order_status" id="" class="form-control my-3 w-25">
                                    <option value="">Please select</option>
                                    <option value="Progressing">Progressing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                <button name="update_status_btn" class="btn btn-primary">Update status</button>
                            </form>
                            <?php
                            if(isset($_GET['order_id'])){
                                $order_id = $_GET['order_id'];
                            }
                            if (isset($_POST['update_status_btn'])) {
                               echo $status = $_POST['order_status'];
                               echo  $update_status ="UPDATE  customers_orders set order_status='$status' where id='$order_id'";
                                $run_query = mysqli_query($conn,$update_status);
                                if($run_query){
                                    echo "<script>alert('Status Change Successfully');
                                            window.location.replace('orders.php');
                                        </script>";

                                  
                                }
                                else{
                                    echo "<script>alert('Some error occur, Please tyr again')</script>";
                                }
                            
                            }
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