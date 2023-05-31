<?php
    require('config.php');
?>
<form action="submit.php" method="post">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $PublishableKey ?>"
    data-amount="500" data-name="E-SHOP" data-description="E-SHOP Online Store" data-image="" data-currency="usd"
    ></script>
</form>