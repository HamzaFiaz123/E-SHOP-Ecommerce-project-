<?php

session_start();
include "config/db.php";
include "partials/links.php";
include "functions.php";
?>

<body>

  <?php
  include "partials/header.php";
  ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <h2>Login</h2>
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address *</label>
            <input type="email" name="login_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="login_pass">
          </div>
          <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember be</label>
          </div>
          <div class="form-check mb-2">
            <a href="login_page.php?forgot_pass">Forgot Password</a>
          </div>
          <button type="submit" class="btn btn-dark w-100 font-weight-bold py-2 my-3 " name="login_btn">Login</button>
          <?php
          register_user();
          ?>
        </form>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <h2>Register</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Username or email address *</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember be</label>
          </div>
          <p class="rej-p">
            Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <span><a href="#">privacy policy.</a></span>
          </p>
          <button type="submit" class="btn btn-dark w-100 font-weight-bold py-2 my-3" name="register_btn">Register</button>
          <?php
          login_user();
          ?>
        </form>
      </div>

    </div>
  </div>
  </div>
  <?php
  include "partials/footer.php";
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>