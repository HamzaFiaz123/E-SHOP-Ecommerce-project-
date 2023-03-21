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
        <div class="container">
            <div class="w-75 m-auto">
                <h2 class="mt-1 mb-4 text center" style="text-align:center;">Update Categories</h2>
                <form method="POST" action="" enctype="multipart/form-data">
                <table class="table table-striped">
                                    <?php
                                    include "../config/db.php";
                                    if (isset($_GET['cat_id'])) {
                                        $cat_id = $_GET["cat_id"];
                                    }
                                    $sql_pro_show = "SELECT * FROM product_categories where id='$cat_id'";
                                    $result = mysqli_query($conn, $sql_pro_show);
                                    if (mysqli_num_rows($result) >= 1) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $cat_id = $row['id'];
                                            $cat_name = $row['name'];
                                            $filename = $row["image"];
                                        }
                                    }
                                    ?>
                                    <tbody>
                                        <tr class="form-group">
                                            <td>Name</td>
                                            <td><input type="text" class="cus_input_style w-75"
                                                    placeholder="Enter category  name" name="cat_name"
                                                    value="<?php echo $cat_name ?>"></td>
                                        </tr>
                                        <tr class="form-group">
                                            <td>Category</td>
                                            <td><input type="file" class="cus_input_style w-75"
                                                    placeholder="Enter image" name="cat_image"
                                                    value="<?php echo $filename ?>"></td>
                                        </tr>
                                    </tbody>
                                </table>
                    <button name="update" class="btn btn-primary">Update</button>
                </form>
                <?php
                update_categories();
                ?>
            </div>
        </div>
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