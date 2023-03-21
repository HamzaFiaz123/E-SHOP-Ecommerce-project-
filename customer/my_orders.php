<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include "../config/db.php";
    include "../partials/links.php";
    include "../partials/header.php";
    if (!isset($_SESSION['email'])) {
        echo "<script>window.location.replace('../login_page.php')</script>";
    }
    ?>
    <link rel="stylesheet" href="../style/css.css">
    <title>Account</title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-2">My Account</h3>
                    <h5 class="mb-2">Dashboard
                </h4>
                <ul class="cus_order_detail_ul">
                    <li class="border-bottom"><a href="index.php" class="general_text_clr">Account</a></li>
                    <li class="border-bottom"><a href="my_orders.php" class="general_text_clr">Orders</a></li>
                    <li class="border-bottom"><a href="../cart.php" class="general_text_clr">cart</a></li>
                    <li class="border-bottom"><a href="../index.php" class="general_text_clr">shopping</a></li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="row">
                    <h2 class="text-primary text-center mb-3">My Orders</h2>
                    <form method="POST" class="w-100" action="" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Invoice_number</th>
                                    <th>Amount Due</th>
                                    <th>Order Date</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $customer_id = $_SESSION['id'];
                                $sql_pro_show = "SELECT * FROM customer_orders where customer_id='$customer_id'";
                                $result = mysqli_query($conn, $sql_pro_show);
                                $count = mysqli_num_rows($result);
                                if($count > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $id = $row['id'];
                                        $due_amount = $row['due_amount'];
                                        $invoice_number = $row['invoice_number'];
                                        $date = $row['order_date'];
                                        $status = $row['payment_status'];
                                        if($status=='unpaid'){
                                            $status = 'Unpaid';
                                        }
                                        else{
                                            $status = 'Paid';
                                        }
    
                                        echo '<tr>
                                <td>
                                    <p>' . $id . '</p>
                                </td>
                                <td>
                                    <p>' . $invoice_number . '</p>
                                </td>
                                <td>
                                    <p>' . $due_amount . '$</p>
                                </td>
                                <td>
                                    <p>' . $date . '</p>
                                </td>
                                <td>
                                    <p>' . $status . '</p>
                                </td>
                                <td>
                                    <a href="confirm_order.php?order_id='.$id.'" class="btn btn-success">Confirm if paid</a>
                                </td>
                            </tr>';
                                }
                                
                                }
                                else{
                                    echo "<div class='Alert alert-danger'>You Dont have any orders</div>";
                                }

                                ?>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "../partials/footer.php";
    ?>
</body>

</html>