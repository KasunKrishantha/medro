<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_Controller extends CI_Controller {
public function __construct(){
		parent:: __construct();
		
		$this->load->model('Stock_Model');
		$this->load->model('Pation_Font_End_Model');

	}
	public function index()
	{
		$session_user_id = 1;
		
		$user_details=$this->Pation_Font_End_Model->get_user_information($session_user_id);
		$data['user_details']=$user_details;		
		$data['stock_details'] =$this->Stock_Model->get_stock_information();
		$this->load->view('stock_view',$data);
	}
}
?>
