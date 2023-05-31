<?php
    require('config.php');

    if(isset($_POST['stripeToken'])){
        \stripe\stripe::setVerifySslCerts(false);
        $token = $_POST['stripeToken'];
        $data = \Stripe\Charge::create(array(
            "amount" => 500,
            "currency" => "usd",
            "description" => "E-SHOP Online Store",
            "source" => $token,
        ));
    
        echo "<pre>";
        print_r($data);
    }
   
?>
