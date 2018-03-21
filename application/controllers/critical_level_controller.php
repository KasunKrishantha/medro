<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Critical_Level_Controller extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		
		$this->load->model('critical_level_model');
		$this->load->model('Pation_Font_End_Model');

	}
	
	public function index(){
		$session_user_id = 1;
		
		$user_details=$this->Pation_Font_End_Model->get_user_information($session_user_id);
		$data['user_details']=$user_details;
		$data['low_stock_details'] =$this->critical_level_model->get_low_stock_information();
		$this->load->view('critical_new',$data);
	}
}
?>