function forgot_pass()
{
    include "config/db.php";
    if (isset($_GET["forgot_pass"])) {
        echo '<div class="form-group">
      <label for="exampleInputEmail1">Enter your email address </label>
      <input type="email" name="check_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <button type="submit" class="btn btn-dark font-weight-bold py-1 my-2 " name="send_btn">Send</button>
        </div>';

        if (isset($_POST["send_btn"])) {
            $check_email = $_POST["check_email"];
            $forgot_sql = " SELECT * FROM customer_account WHERE customer_email = '$check_email'";
            $result = mysqli_query($conn, $forgot_sql);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                
        }

    }
}
