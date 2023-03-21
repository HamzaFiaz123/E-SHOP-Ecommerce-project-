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
                              <h2>Update Categories</h2>
                           </div>
                        </div>
                     </div>
                     <div class=" m-auto" style="max-width:950%;">
                     <form method="POST" action="" enctype="multipart/form-data">
                <table class="table table-striped">
                                    <?php
                                    if (isset($_GET['supp_id'])) {
                                        $supp_id = $_GET["supp_id"];
                                    }
                                    $sql_pro_show = "SELECT * FROM supplier where id='$supp_id'";
                                    $result = mysqli_query($conn, $sql_pro_show);
                                    if (mysqli_num_rows($result) >= 1) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id = $row['id'];
                                            $supplier_name = $row['supplier_name'];
                                        }
                                    }
                                    ?>
                                    <tbody>
                                    <tr class="form-group">
                                            <td>Id</td>
                                            <td>Supplier Name</td>
                                        </tr>
                                        <tr class="form-group">
                                            <td><?php echo $id ?></td>
                                            <td><input type="text" class="cus_input_style w-75 form-control"
                                                    placeholder="Enter supplier name" name="supp_name"
                                                    value="<?php echo $supplier_name ?>"></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                    <button name="update" class="btn btn-primary">Update</button>
                </form>
                <?php
                update_suppliers();
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