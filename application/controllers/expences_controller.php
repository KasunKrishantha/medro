<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expences_Controller extends CI_Controller {
public function __construct(){
		parent:: __construct();
		
		$this->load->model('Expences_Model');
		$this->load->model('Pation_Font_End_Model');

	}
	public function index()
	{
		$session_user_id = 1;
		
		$user_details=$this->Pation_Font_End_Model->get_user_information($session_user_id);
		$data['user_details']=$user_details;
		
		$this->load->view('expences_new',$data);	
		
		
	}
	
	
	public function get_relevent_data()
	{
		
			$Month =$this->input->post('month');
			$Year =$this->input->post('year');
			
			$data['expences_year']=$Year;
			$data['expences_month']=$Month; 
			
			$data['expences_details'] =$this->Expences_Model->get_expences_information($Month,$Year);
			
		
			$this->load->view('expences_new2',$data);
	
		
		
	}
	
}
?>
