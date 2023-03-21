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
                              <h2>Orders</h2>
                           </div>
                        </div>
                     </div>
                     <div class=" m-auto" style="max-width:950%;">
                     <form method="POST" action="" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Ip Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_GET['cus_id'])){
                                    $cus_id=$_GET['cus_id'];
                                }
                                $sql_pro_show = "SELECT * FROM customer_account where id='$cus_id'";
                                $result = mysqli_query($conn, $sql_pro_show);
                                while ($row = mysqli_fetch_array($result)) {
                                    $id = $row['id'];
                                    $customer_email = $row['customer_email'];
                                    $customer_name = $row['customer_name'];
                                    $customer_phone = $row['customer_phone'];                                    
                                    $customer_address = $row['customer_address'];
                                    $customer_image = $row['customer_image'];
                                    $customer_country = $row['customer_country'];
                                    $ip = $row['customer_ip'];
                                    echo '<tr>
                            <td>
                                <p>' . $id . '</p>
                            </td>
                            <td>
                                <img src="../uploaded_images/' . $customer_image . '" alt="">
                            </td>
                            <td>
                                <p>' . $customer_name . '</p>                               
                            </td>
                            <td>
                                <p>' . $customer_email . '</p>
                            </td>
                            <td>
                                <p>' . $customer_phone . '</p>
                            </td>
                            <td>
                                <p>' . $customer_address . '</p>
                            </td>
                            <td>
                                <p>' . $customer_country . '</p>
                            </td>
                            <td>
                            <p>' . $ip . '</p>
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