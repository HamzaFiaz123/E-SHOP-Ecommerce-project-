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
                              <h2>Paymemts</h2>
                           </div>
                        </div>
                     </div>
                     <div class=" m-auto" style="max-width:95%;">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Invoice number</th>
                                    <th>Amount Paid</th>
                                    <th>Payment mode</th>
                                    <th>Reference no</th>
                                    <th>code</th>
                                    <th>Payment date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_pro_show = "SELECT * FROM payments";
                                $result = mysqli_query($conn, $sql_pro_show);
                                while ($row = mysqli_fetch_array($result)) {
                                    $order_id = $row['id'];
                                    $paid_amount = $row['amount'];
                                    $invoice_number = $row['inovoice_num'];
                                    $payment_mode = $row['payment_mode'];
                                    $reference_no = $row['reference_no'];
                                    $code = $row['code'];
                                    $payment_date = $row['payment_date'];
                                    echo '<tr>
                            <td>
                                <p>' . $order_id . '</p>
                            </td>
                            <td>
                                <p>' . $invoice_number . '</p>
                            </td>
                            <td>
                                <p>' . $paid_amount . '$</p>
                            </td>
                            <td>
                            <p>' . $payment_mode . '</p>
                        </td>
                            <td>
                                <p>' . $reference_no . '</p>
                            </td>
                            <td>
                                <p>' . $code . '</p>
                            </td>
                            <td>
                                <p>' . $payment_date . '</p>
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