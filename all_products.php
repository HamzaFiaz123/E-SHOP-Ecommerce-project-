<?php
session_start();
include "partials/links.php";
include "config/db.php";
include "partials/header.php";
include "functions.php";
?>

<?php
if (isset($_GET['cat_name'])) {
    $cat_name = $_GET['cat_name'];
}
    $sql_pro_show = "SELECT * FROM products where prod_category='$cat_name'";
    $result = mysqli_query($conn, $sql_pro_show);
    $count = mysqli_num_rows($result);
    if($count > 0){
        while ($row = mysqli_fetch_array($result)) {
            $pro_id = $row['id'];
            $pro_name = $row['prod_name'];
            $pro_price = $row['prod_price'];
            $pro_image = $row['prod_image'];
            echo '<div class="col-lg-3 col-md-4">
                        <div class="product_boxs">
                            <img src="uploaded_images/' . $pro_image . '" alt="">
                            <div class="product_info text-center">
                                 <h5>' . $pro_name . '</h5>
                                 <p>Beutifull watch rado</p>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <i class="fa fa-star mr-2 checked"></i>
                                 <div class="d-flex justify-content-between">
                                    <h6>' . $pro_price . '$</h6>
                                    <a href=" addcart.php?pro_id=' . $pro_id . '"><img src="images/shopping-bag.png" style="height: 20px;margin-right:12px;" alt=""></a>';
            // if($stock < 1){
            //     echo "<h6>Availability <small class='ml-1'>Out of stock</small></h6>";
            // }
            // else{
            //     echo "<h6>Availability <small class='ml-3'>In stock</small></h6>";
            // }
            echo '
                                 </div>
                            </div>
                        </div>
                    </div>';
        }
    }
    else{
        echo "No products in this category";
    }
    
?>


<?php
include "partials/footer.php";
?>