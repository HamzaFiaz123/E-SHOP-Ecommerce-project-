<?php
include "../config/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../partials/links.php";
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
                <div class="col-lg-10">
                <div class="w-75 m-auto">
        <h2 class="mt-1 mb-4 text center" style="text-align:center;">Add Products Form</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <table class="table table-striped">
                <tbody>
                    <tr class="form-group">
                        <td>Name</td>
                        <td><input type="text" class="cus_input_style w-75" placeholder="Enter product name" name="pro_name"></td>
                    </tr>
                    <tr class="form-group">
                        <td>Category</td>
                        <td><input type="text" class="cus_input_style w-75" placeholder="Enter product category" name="pro_cat"></td>
                    </tr>
                    <tr class="form-group">
                        <td>Price</td>
                        <td><input type="number" class="cus_input_style w-75" placeholder="Enter product price" name="pro_price"></td>
                    </tr>
                    <tr class="form-group">
                        <td>Description</td>
                        <td><input type="text" class="cus_input_style w-75" placeholder="Enter product description" name="pro_desc"></td>
                    </tr>
                    <tr class="form-group">
                        <td>Image</td>
                        <td><input type="file" class="cus_input_style w-75" placeholder="Select product image" name="pro_image"></td>
                    </tr>
                </tbody>
            </table>
            <button name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        add_products();
        ?>
    </div>
                </div>
            </div>
        </div>
    </section>


    


</body>

</html>

