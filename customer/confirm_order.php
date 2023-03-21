<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../partials/links.php";
    include "../partials/header.php";
    include "../config/db.php";
    include "../functions.php";
    ?>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Payment Mode</th>
                        <th><select name="payment_mode" id="" class="form-control">
                                <option value="">Please select</option>
                                <option value="easypiasa">Easypaisa</option>
                                <option value="jazzcash">Jazzcash</option>
                            </select></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Invoice Number</p>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="invoice_num"
                                placeholder="enter invoice number">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Amount</p>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="amount" placeholder="enter invoice number">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Reference Number for Easypaisa/Jazzcash</p>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="reference_code"
                                placeholder="enter refernce number">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Code For Bank Transactions</p>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="bank_code" placeholder="enter code">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Payment date</p>
                        </td>
                        <td>
                            <input type="date" name="payment_date" class="form-control" placeholder="enter date">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button  type="submit" name="confirm_btn" class="btn btn-primary text-center">Confirm</button>
            <a href="my_orders.php" class="btn btn-secondary my-3"> Back to your orders</a>
        </form>
    </div>
</body>

<?php
confirm_payment();

?>