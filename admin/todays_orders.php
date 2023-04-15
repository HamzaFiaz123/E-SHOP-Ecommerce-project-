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
                           <h2>Todays Orders</h2>
                        </div>
                     </div>
                  </div>
                  <div class="special_fn_buttons mt-2 mb-4">
                            <button id="pdfButton" class="btn btn-primary  ">Generate PDF</button>
                            <button onclick="window.print()" class="btn btn-primary ml-3">Print</button>
                        </div>
                  <div class=" m-auto" style="max-width:950%;">
                     <form method="POST" action="" enctype="multipart/form-data">
                        <table class="table table-bordered">
                           <thead class="table-dark">
                              <tr>
                                 <th>Id</th>
                                 <th>Invoice_number</th>
                                 <th>Amount Due</th>
                                 <th>Payment status</th>
                                 <th>status</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $date = date('y-m-d');
                              $sql_pro_show = "SELECT * FROM customers_orders where placed_on like '%$date%'";
                              $result = mysqli_query($conn, $sql_pro_show);
                              while ($row = mysqli_fetch_array($result)) {
                                 $order_id = $row['id'];
                                 $due_amount = $row['total_amount'];
                                 $invoice_number = $row['invoice_number'];
                                 $payment_status = $row['payment_status'];
                                 $status = $row['order_status'];

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
                                    <p>' . $payment_status . '</p>
                                 </td>
                                 <td>
                                    <p>' . $status . '</p>
                                 </td>
                                 <td>
                                    <a href="orders_details.php?order_id=' . $order_id . '" class="btn btn-primary">View Details</a>
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