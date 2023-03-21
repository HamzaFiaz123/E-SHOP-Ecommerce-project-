
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
                        <h2 class="mt-1 mb-4 text center" style="text-align:center;">Products</h2>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $sql_pro_show = "SELECT * FROM products";
                            $result = mysqli_query($conn, $sql_pro_show);
                            while ($row = mysqli_fetch_array($result)) {
                                $pro_id = $row['id'];
                                $pro_name = $row['prod_name'];
                                $pro_price = $row['prod_price'];
                                $pro_image = $row['prod_image'];

                                echo '<tr>
                                <td>
                                <p>' . $pro_id . '</p>
                            </td>
                            <td>
                                <img src="../uploaded_images/' . $pro_image . ' "  style="height: 90px;float: left;margin-right: 20px">
                                <p>' . $pro_name . '</p>
                            </td>
                            <td>
                                <p>' . $pro_price . '$</p>
                            </td>
                            <td>
                           <form method="POST">
                                <a href="update_product.php?pro_id='.$pro_id.'"  class="btn btn-primary ml-2" id="cus_btn_clr">EDIT</a>
                                <a href="delete_product.php?pro_id='.$pro_id.'"  class="btn btn-danger ml-2" id="cus_btn_clr">DELETE</a>
                                </form>
                            </td>
                        </tr>';
                            }

                        ?>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





</body>

</html>

<?php
// if (isset($_POST['submit'])) {


//     $prod_name = $_POST['pro_name'];
//     $prod_catg = $_POST['pro_cat'];
//     $prod_price = $_POST['pro_price'];
//     $prod_desc = $_POST['pro_desc'];
//     $filename = $_FILES["pro_image"]["name"];
//     $tempname = $_FILES["pro_image"]["tmp_name"];
//     $folder = "../uploaded_images/" . $filename;
//     $image_result = move_uploaded_file($tempname, $folder);
//     $sql = "INSERT INTO products (prod_name, prod_category, prod_description, prod_price,prod_image) VALUES ('$prod_name', '$prod_catg', '$prod_desc','$prod_price','$filename')";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         echo "<div class='alert alert-success'>New record created successfully</div>";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }


// ?>