<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        session_start();
        include "../config/db.php";
        include "../partials/links.php";
        include "header.php";
        if(!isset($_SESSION['email'])){
            echo "<script>window.location.replace('../login_page.php');</script>";
        }
        ?>
        <link rel="stylesheet" href="../style/css.css">
        <title>Account</title>
    </head>
    <body>
        <?php
            include('../partials/header.php')
        ?>
    <div class="container my-5">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h4 class="mb-2">My Account</h3>
                    <h5 class="mb-2">Dashboard</h4>
                    <ul class="cus_order_detail_ul">
                    <li class="border-bottom"><a href="index.php" class="general_text_clr">Account</a></li>
                        <li class="border-bottom"><a href="my_orders.php" class="general_text_clr">Orders</a></li>
                        <li class="border-bottom"><a href="../cart.php" class="general_text_clr">cart</a></li>
                        <li class="border-bottom"><a href="../index.php" class="general_text_clr">shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <h6 class="ml-3 mb-3">Hello <?php echo $_SESSION['email'] ?> <a href="../logout.php">( logout )</a></h6>
                        <h6 class="ml-3 mb-3">From your account dashboard you can view your orders, manage your account , and  manage your passwords</h6>
                        <div class="col-lg-4 col-md-6">
                            <div class="border d-flex justify-content-center align-items-center cus_order_detail_box">
                                <a href="#">Orders</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="border d-flex justify-content-center align-items-center cus_order_detail_box">
                                <a href="#">Downloads</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="border d-flex justify-content-center align-items-center cus_order_detail_box">
                                <a href="#">Address</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-4">
                            <div class="border d-flex justify-content-center align-items-center cus_order_detail_box">
                                <a href="#">Orders Details</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-4">
                            <div class="border d-flex justify-content-center align-items-center cus_order_detail_box">
                                <a href="#">Account Details</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-4">
                            <div class="border d-flex justify-content-center align-items-center cus_order_detail_box">
                                <a href="#">Shipment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        include "../partials/footer.php";
    ?>
    </body>
</html>
    