<?php
include "partials/links.php";
include "config/db.php";
include "partials/header.php";
include "functions.php";
?>


<div class="container">
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Payment Mode</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p>Easypaisa</p>
            </td>
            <td>
            <p>Account Number :<span class="ml-5">03482051681</span></p>
                <p>Account Name :<span class="ml-5">Hamza</span></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Jazzcash</p>
                
            </td>
            <td>
            <p>Account Number :<span class="ml-5">03223871803</span></p>
                <p>Account Name :<span class="ml-5">Hamza</span></p>
            </td>
        </tr>
    </tbody>
</table>
<a href="checkout.php">After paying offline, click here to place order</a>
</div>

