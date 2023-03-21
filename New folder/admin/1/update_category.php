<?php
include "../config/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../config/db.php";
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET["cat_id"];
    }
    $sql_pro_show = "SELECT * FROM product_category where id = $cat_id";
    $result = mysqli_query($conn, $sql_pro_show);
    if (mysqli_num_rows($result) >= 1) {
        while ($row = mysqli_fetch_array($result)) {
            $cat_id = $row['id'];
            $cat_name = $row['name'];
            $filename = $row["image"];
        }
    }
    ?>
    <style>
        .menu_box ul {
            list-style: none;
            padding: 0%;
        }

        .menu_box ul li {
            list-style: none;
            border-bottom: 1px solid #777;
            padding: 6px 0px;
        }

        .menu_box ul li a {
            color: white;
            font-size: 19px;
        }
    </style>
    <title>Add Products</title>
</head>

<body>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 bg-dark" style="height: 100vh;">
                    <h2 class="text-white mt-3 mb-4 ml-2">Dashboard</h2>
                    <div class="menu_box">
                        <ul>
                            <li><a href="add_products.php" class="py-2 ml-3">Add Products</a></li>
                            <li><a href="add_categories.php" class="py-2 ml-3">Add Categories</a></li>
                            <li><a href="products.php" class="py-2 ml-3">Products</a></li>
                        </ul>
                    </div>
                </div>
                <section>
                    <div class="container">
                        <div class="w-75 m-auto">
                            <h2 class="mt-1 mb-4 text center" style="text-align:center;">?Update Products Form</h2>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <table class="table table-striped">
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
                                <button name="update" class="btn btn-primary">update</button>
                                <?php
                                update_categories();
                                ?>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </section>





</body>

</html>

<?php

?>