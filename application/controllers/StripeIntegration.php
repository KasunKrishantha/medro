<?php

class StripeIntegration extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('stripegateway');
    }

    public function index(){
        $this->load->view('makePayment.php');
    }
}