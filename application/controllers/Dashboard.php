<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  public function __construct(){
    parent::__construct();
  }

  public function index(){
    $user_info = $this->session->userdata('logged_in');
    redirect('welcome',$user_info);
  }
}
