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
                              <h2>Add Products</h2>
                           </div>
                        </div>
                     </div>
                     <div class=" m-auto" style="max-width:950%;">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="form-group">
                                <td>Name</td>
                                <td><input type="text" class="cus_input_style w-75" placeholder="Enter product name"
                                        name="pro_name"></td>
                            </tr>
                            <tr class="form-group">
                                <td>Category</td>
                                <td><select class="form-control w-75" name="pro_cat" >
                                <option>Please Select</option>
                                    <?php
                                $sql_pro_show = "SELECT * FROM product_categories";
                                $result = mysqli_query($conn, $sql_pro_show);
                                if (mysqli_num_rows($result) >= 1) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $cat_id = $row['id'];
                                        $cat_name = $row['name'];
                                        $filename = $row["image"];
                                        echo "<option value='$cat_name'>$cat_name</option>";
                                       
                                    }
                                }
                                   ?>
                                </select></td>
                            </tr>
                            <tr class="form-group">
                                <td>Suppliers</td>
                                <td><select class="form-control w-75" name="supplier" >
                                <option>Please Select</option>
                                    <?php
                                $sql_pro_show = "SELECT * FROM supplier";
                                $result = mysqli_query($conn, $sql_pro_show);
                                if (mysqli_num_rows($result) >= 1) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $supp_d = $row['id'];
                                        $supp_name = $row['supplier_name'];
                                        echo "<option value='$supp_name'>$supp_name</option>";
                                       
                                    }
                                }
                                   ?>
                                </select></td>
                            </tr>
                            <tr class="form-group">
                                <td>Price</td>
                                <td><input type="number" class="cus_input_style w-75" placeholder="Enter product price"
                                        name="pro_price"></td>
                            </tr>
                            <tr class="form-group">
                                <td>Stock</td>
                                <td><input type="number" class="cus_input_style w-75" placeholder="Enter stock"
                                        name="add_pro_stock"></td>
                            </tr>
                            <tr class="form-group">
                                <td>Description</td>
                                <td><input type="text" class="cus_input_style w-75"
                                        placeholder="Enter product description" name="pro_desc"></td>
                            </tr>
                            <tr class="form-group">
                                <td>Image</td>
                                <td><input type="file" class="cus_input_style w-75" placeholder="Select product image"
                                        name="pro_image"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button name="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                add_products();
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