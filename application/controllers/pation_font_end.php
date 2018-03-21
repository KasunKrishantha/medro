<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pation_Font_End extends CI_Controller {
public function __construct(){
		parent:: __construct();
		
		$this->load->model('Pation_Font_End_Model');

	}
	public function index()
	{
		$session_user_id = 1;
		
		$user_details=$this->Pation_Font_End_Model->get_user_information($session_user_id);
		$data['user_details']=$user_details;		
		$data['user_treatements'] =$this->Pation_Font_End_Model->get_treatements_information($user_details['id']);
		$data['user_payments'] =$this->Pation_Font_End_Model->get_payments_information($user_details['id']);
		$data['user_appoinments']=$this->Pation_Font_End_Model->get_appoinment_information($user_details['id']);
		//print_r($data['user_payments']);
		//$appoiment_details = $this->Pation_Font_End_Model->get_appoiment_details($pation_id);
		
		
		$this->load->view('pation_front_end_view',$data);
	}
}
