<?php
include "../config/db.php";
include "../functions.php";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-SHOP ADMIN SIDE</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body>

     <!-- Left Panel -->
     <aside id="left-panel" class="left-panel">
    <?php
        include "partials/left_panel_header.php";
    ?>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
        include "partials/right_panel_header.php";
    ?>
        <section>
            <div class="container-fluid">
                <div class=" m-auto" style="max-width:90%;">
                    <h2 class="mt-1 mb-4 text center" style="text-align:center;">Customer Details</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <thead>
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
            </div>
        </section>

    </div>
    </div>
    <!-- Right Panel -->
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        (function ($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</body>

</html>