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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style/css.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>E-SHOP</title>
</head>

<body>
    


    <section class="head_hero_section">
        <?php
        include "partials/header.php";
        ?>

        <div class="header_info_box slider_cation">
            <h2 class="mb-2">Winter Fashion Trends tf</h2>
            <h3 class=" text-dark text-uppercase mb-2">Get up to 30% off</h3>
            <h4 class="text-dark mb-3">on Jackets</h4>
            <h5 class="text-uppercase text-dark mb-2">Starting at<span class="bg-white px-4 py-3 mb-3 text-dark"><sup>$</sup>199<sup>99</sup></span></h5>
            <a href="demo3-shop.html" class="btn btn-dark mt-4" role="button">Shop Now</a>
        </div>

    </section>





    <section class="my-5">
        <div class="container">
            <h4 class="my-5 text-center font-weight-bold" style="font-family: Poppins,sans-serif;">SHOP BY CATEGORY</h4>
            <div class="container">
                <div class="row">
                    <?php
                show_categories_info();
                ?>
            </div>
            </div>
        </div>
    </section>


    <section class="my-5">
        <div class="container">
            <h4 class="my-5 text-center font-weight-bold" style="font-family: Poppins,sans-serif;">POPULAR PRODUCTS</h4>
            <div class="container">
                <div class="row">
                    <?php
                    show_products_for_customers();
                        if(isset($_GET['successfully_add_to_cart'])){
                            echo "
                            <script>swal('Successfully!', 'Product added successfully ', 'success');</script>
                        ";
                        }
                        if(isset($_GET['successfully_quantity_increase'])){
                            echo "
                            <script>swal('Quantity Increases!', 'As product already in cart, So we updated quantity  ', 'success');</script>
                        ";
                        }
                        
                    ?>
                </div>
            </div>
            <hr style="color: #777" class="my-3">


            <div class="row text-center my-4">
                <div class="col-lg-3">
                    <div class="hf-help_box ">
                        <i class="fa fa-headphones"></i>
                    </div>
                    <div class="hf-help_box-info text-center px-2 my-2">
                        <h5 class="font-weight-bold">CUSTOMER SUPPORT</h5>
                        <h6 class="font-weight-bold mt-1 mb-2">Need Assisstence</h6>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia, perspiciatis! Et excepturi</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hf-help_box ">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="hf-help_box-info text-center px-2 my-2">
                        <h5 class="font-weight-bold">CUSTOMER SUPPORT</h5>
                        <h6 class="font-weight-bold mt-1 mb-2">Need Assisstence</h6>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia, perspiciatis! Et excepturi</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hf-help_box ">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="hf-help_box-info text-center px-2 my-2">
                        <h5 class="font-weight-bold">SECURED PAYMENT</h5>
                        <h6 class="font-weight-bold mt-1 mb-2">Safe & Fast</h6>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia, perspiciatis! Et excepturi</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="hf-help_box ">
                        <i class="fa fa-arrow-right"></i>
                    </div>
                    <div class="hf-help_box-info text-center px-2 my-2">
                        <h5 class="font-weight-bold">RETURNS</h5>
                        <h6 class="font-weight-bold mt-1 mb-2">Easy & Free</h6>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia, perspiciatis! Et excepturi</p>
                    </div>
                </div>
                <hr style="color: #777" class="my-3">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h6 style="font-family: Poppins,sans-serif;">SUBSCRIBE NEWSLETTER</h6>
                    <small>Get all the latest information on Events, Sales and Offers.</small>
                </div>
                <div class="col-lg-5">
                    <div style="background-color: #dddddd;" class="d-flex pl-3 py-1">
                        <input type="email" name="" id="ha_cus_field" class="w-100" placeholder="Email Address..">
                        <button class="btn btn-dark py-2">Subscribe</button>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="cus_icons_box">
                        <i class="fa fa-facebook px-2" style="color: #777;font-size:24px;"></i>
                        <i class="fa fa-whatsapp px-2" style="color: #777;font-size:24px;"></i>
                        <i class="fa fa-twitter px-2" style="color: #777;font-size:24px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section style="background-color: #f4f4f4;" class="py-5 my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div style="position: relative;">
                        <img src="images/home-banner1.jpg" style="background-color: #ccc;" class="img-fluid" alt="Banner">
                        <div class="banner-layer-info-box1">
                            <h3 class="mb-1 font-weight-bold">Sunglasses Sale</h3>
                            <h6 class="mb-1">See all and find yours</h6>
                            <a href="demo3-shop.html" class="btn btn-dark" role="button" style="background-color: #222529;">Shop By Glasses</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div style="position: relative;">
                        <img src="images/home-banner2.jpg" style="background-color: #ccc;" class="img-fluid" alt="Banner">
                        <div class="banner-layer-info-box2">
                            <h3 class="mb-1 font-weight-bold">Cosmetics Trends</h3>
                            <h6 class="mb-1">Browse in all our categories</h6>
                            <a href="demo3-shop.html" class="btn btn-dark" role="button" style="background-color: #222529;">Shop By Glasses</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div style="position: relative;">
                        <img src="images/home-banner3.jpg" style="background-color: #ccc;" class="img-fluid" alt="Banner">
                        <div class="banner-layer-info-box3">
                            <h3 class="mb-1 font-weight-bold text-white">Fashion Summer Sale</h3>
                            <h6 class="mb-1" style="color: #777;">Browse in all our categories</h6>
                            <a href="demo3-shop.html" class="btn btn-dark" role="button" style="background-color: 88898b;">Shop By Glasses</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div style="position: relative;">
                        <img src="images/home-banner4.jpg" style="background-color: #ccc;" class="img-fluid" alt="Banner">
                        <div class="banner-layer-info-box4">
                            <h3 class="mb-1 font-weight-bold">UP TO 70% IN ALL BAGS</h3>
                            <h6 class="mb-1">Starting at $99</h6>
                            <a href="demo3-shop.html" class="btn btn-dark" role="button" style="background-color: #222529;">Shop By Glasses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "partials/footer.php";
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        

<script>
    
    $('.slick_try').slick({
        dots: true,
        slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1200,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>
</body>

</html>