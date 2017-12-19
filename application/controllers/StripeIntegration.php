<?php

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class StripeIntegration extends CI_Controller{
    public function index(){

    }

    public function checkout(){
        $token = $_POST['stripeToken'];
        try{
            require_once ('.vendor/autoload.php');
            Stripe::setApiKey('sk_test_WriOpHhJCy3n2k2gr4BntR4k');



            $charge = Charge::create(
                array(
                    "amount" => 1000,
                    "currency" => "usd",
                    "description" => "Example charge",
                    "source" => $token,
                )
            );
            echo "<h1>Thank You</h1>";
        }catch (\Stripe\Error\Card $e){
            $error = $e->getMessage();
            echo $error;
        }

    }
}