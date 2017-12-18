<?php
include ("./vendor/autoload.php");

class Stripegateway{
    public function __construct(){
        $stripe = array(
          "secret_key" => "sk_test_WriOpHhJCy3n2k2gr4BntR4k",
          "public_key" => "pk_test_sEImnUug7zkD3lmAQqpG5rhd"
        );
        \Stripe\Stripe::setApiKey($stripe["secret_key"]);
    }

    public function checkout($data){
        try{
            $mycard = array('number' => $data['number'],
                            'exp_month' => $data['exp_month'],
                            'exp_year' => $data['exp_year']);
            $charge = \Stripe\Charge::create(array('card' => $mycard,
                                                    'amount' => $data['amount'],
                                                    'currency' => 'usd'));
            $message = $charge->status;
        }catch (Exception $e){
            $message = $e->getMessage();
        }
        return $message;
    }
}
?>