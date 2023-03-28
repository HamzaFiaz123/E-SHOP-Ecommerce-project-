<?php
include("../config/db.php");
include("../functions.php");
// if(!isset($_SESSION['admin_email'])){
//    echo "<script>window.location.replace('admin_login.php');</script>";
// }
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
                           <h2>Dashboard</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row column1">
                     <div class="col-md-6 col-lg-3">
                     <a href="products.php">
                     <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-user yellow_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div class="text-center">
                                 <!-- <p class="total_no">123.50</p> -->
                                 <p class="head_couter" style="font-size:23px ;">Products</p>
                                 <?php
                                 products_count();
                                 ?>
                              </div>
                           </div>
                        </div>
                     </a>                        
                     </div>
                     <div class="col-md-6 col-lg-3">
                     <a href="categories.php">
                     <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-clock-o blue1_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div class="text-center">
                                 <!-- <p class="total_no">123.50</p> -->
                                 <p class="head_couter" style="font-size: 23px;">Categories</p>
                                 <?php
                                 categories_count();
                                 ?>
                              </div>
                           </div>
                        </div>
                     </a>                        
                     </div>
                     <div class="col-md-6 col-lg-3">                        
                        <a href="orders.php">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-cloud-download green_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div class="text-center">
                                 <!-- <p class="total_no">123.50</p> -->

                                 <p class="head_couter" style="font-size:23px ;">Orders</p>
                                 <?php
                                 orders_count_for_admin();
                                 ?>
                              </div>
                           </div>
                        </div>
                        </a>
                     </div>
                     <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                           <div class="couter_icon">
                              <div>
                                 <i class="fa fa-comments-o red_color"></i>
                              </div>
                           </div>
                           <div class="counter_no">
                              <div>
                                 <p class="total_no">54</p>
                                 <p class="head_couter">Orders</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>


                  <h3 class="text-info my-3">Pending Orders</h3>
                  <form method="POST" action="" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Invoice_number</th>
                                    <th>Amount Due</th>
                                    <th>Order status</th>
                                    <th>Payment status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_pro_show = "SELECT * FROM customer_orders";
                                $result = mysqli_query($conn, $sql_pro_show);
                                while ($row = mysqli_fetch_array($result)) {
                                    $order_id = $row['id'];
                                    $due_amount = $row['due_amount'];
                                    $invoice_number = $row['invoice_number'];
                                    $status = $row['payment_status'];
                                    $order_status = $row['order_status'];

                                    echo '<tr>
                            <td>
                                <p>' . $order_id . '</p>
                            </td>
                            <td>
                                <p>' . $invoice_number . '</p>
                            </td>
                            <td>
                                <p>' . $due_amount . '$</p>
                            </td>
                            <td>
                                <p>' . $order_status . '</p>
                            </td>
                            <td>
                                <p>' .   $status. '</p>
                            </td>
                            <td>
                                <a href="orders_details.php?order_id='.$order_id.'" class="btn btn-success">View Details</a>
                            </td>
                        </tr>';
                                }

                                ?>

                            </tbody>
                        </table>
                    </form>

                  <!-- footer -->
                  <?php
                  include("partials/footer.php");
                  ?>
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