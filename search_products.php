<?php
include "config/db.php";
include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/css.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>E-SHOP</title>
</head>

<body>



    <?php
    include "partials/header.php";
    ?>
    <div class="container">
        <h1 class="text-primary text-center" style="font-size: 33px;">Search Products</h1>
        <form action="" method="post" class="w-50 m-auto">
            <div class="form-group">
                <input type="text" class="form-control my-2" name="seach_word" placeholder="Search any product">
                <button class="btn btn-primary" name="Search-btn">Search</button>
            </div>
        </form>
        <?php
        search_products();
        ?>
    </div>


    <?php
    include "partials/footer.php";
    ?>




</body>

</html>