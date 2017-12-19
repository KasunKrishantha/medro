<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Make an Appointment</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
</head>
<body>
<div class="container">
    <h5 class="text-success">Your appointment has been made successfully!</h5>
    <br><br><br>
    <h2>Pay Now</h2>
    <form action="checkout" method="POST">
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_sEImnUug7zkD3lmAQqpG5rhd"
                data-amount="1000"
                data-name="Medro"
                data-description="Medical Center"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
        </script>
    </form>
    <hr>
    <h2>Or</h2>
    <a href="welcome" class="btn primary">Return To Site</a>
</div>
