<div class="container-fluid">
  <nav class="navbar navbar-expand-lg">
    <a href="../index.php" class="navbar-brand">
      <img src="images/logo-black.png" class="logo" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav header_ul">
        <li>
          <a href="../index.php">Home</span></a>
        </li>
        <li>
          <a href="../products.php">Shop</span></a>
        </li>
        <li>
          <a href="../contact.php">Contact</a>
        </li>
        <li>
          <a href="../contact.php">About</a>
        </li>
        <li>
        <a href="../search_products.php">Serach Products</a>
        </li>
        <li>
          <?php
            if(!isset($_SESSION['email'])){
            echo "<a href='login_page.php'>Login</a>";
            }
            else{
              echo "<a href='logout.php'>Logout</a>";
            }
          ?>
        </li>
        
      </ul>
      <div class="ml-auto">
      <img src="images/loupe.png" id="icons_height" alt="">
        <a href="customer/index.php"><img src="images/user.png" id="icons_height" alt=""></a>
        <img src="images/love.png" id="icons_height" alt="">
        <a href="cart.php"><img src="images/shopping-bag.png" id="icons_height" alt=""></a>
      </div>
    </div>
  </nav>
</div>


<!-- <script>
  $(document).ready(function () {
    $(window).bind('scroll', function () {
      var gap = 50;
      if ($(window).scrollTop() > 50) {
        $('header').addClass('active');
      } else {
        $('header').removeClass('active');
      }
    });
  });
</script> -->