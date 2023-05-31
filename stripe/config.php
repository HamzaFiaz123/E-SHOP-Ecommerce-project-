<?php
    require('stripe-php-master/init.php');

    $PublishableKey = "pk_test_51NCxoyHo9tKBGODMefyW0LNXBisSyuGUb5N4QiAQWnIT220Y7NsoaFSUf2qBogBwtmTmCh7gdpc8hgvW9716mfI500zjc7DMAQ";
    $SecretKey = "sk_test_51NCxoyHo9tKBGODMKspjiDlKF8FMIeHIN7tjX4fLkQq6YZeZMPirzZJ5DLIhZjHXCznT3JorlstHqCzSZJpNjQbT00jHTECYjE";

    \stripe\stripe::setApiKey($SecretKey);
?>