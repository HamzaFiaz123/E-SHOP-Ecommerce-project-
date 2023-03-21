<?php
    include "links.php";
    include "header.php";
?>


    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <img src="images/cat1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 product_details_container ">
			<h1 class="form-group">Men Black Sports Shoes</h1>
			<div class="ratings-container  form-group">
				<i class="fa fa-star mx-1 text-danger"></i>
				<i class="fa fa-star mx-1 text-danger"></i>
				<i class="fa fa-star mx-1 text-danger"></i>
				<i class="fa fa-star mx-1 text-danger"></i>
            </div>
			<h4 class="form-group">$1244</h4>
			<p class="form-group">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat nemo cumque dignissimos explicabo nulla corrupti saepe consequatur. Provident, blanditiis veniam esse, obcaecati nostrum dolores natus, velit sint temporibus excepturi voluptatem.</p>
			<div class="product-filter-container d-flex form-group">
				<div class="mr-3">
					<label for="">Color</label>
				</div>
				<div class="bg-dark px-3 py-2 mr-3"></div>
				<div class="bg-primary px-3 py-2 mr-3"></div>
				<div class="bg-success px-3 py-2 mr-3"></div>
			</div>
			<div class="product-filter-container d-flex form-group">
				<div class="mr-3">
					<label for="" class="mt-1">Size</label>
				</div>
				<div class="border px-3 py-2 mr-3">S</div>
				<div class="border px-3 py-2 mr-3">M</div>
				<div class="border px-3 py-2 mr-3">L</div>
			</div>
			<div class="product-quantity form-group ">
				<button class="btn border">+</button>
				<input type="number" value="1" style="width:30px;">
				<button class="btn border">-</button> 
			</div>
			<button class="btn btn-dark form-group">Add to cart</button>
	    </div>
		<div class="form-group">
			<h2 class="form-group ml-2">Description</h2>
			<p style="color: #777;"  class="px-4 form-group">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat<br><br>

			<i class="fa fa-check text-primary"></i>   Any Product types that You want - Simple, Configurable<br>
			<i class="fa fa-check text-primary"></i>   Downloadable/Digital Products, Virtual Products<br>
			<i class="fa fa-check text-primary"></i>   Inventory Management with Backordered items<br>
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>	
    </div>

<?php
	include "footer.php";
?>