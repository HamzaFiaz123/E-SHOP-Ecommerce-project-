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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <?php
    include "partials/header.php";
    ?>


    <section class="my-5">
        <div class="container">
            <h4 class="my-5 text-center font-weight-bold" style="font-family: Poppins,sans-serif;">ALL PRODUCTS</h4>
            <div class="row">
                <?php
                show_products_for_customers();
                ?>


            </div>

            <hr style="color: #777" class="my-3">

    </section>

    <?php
    include "partials/footer.php";
    ?>




</body>

</html>