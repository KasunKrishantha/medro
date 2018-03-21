<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pation_Font_End_Model extends CI_Model {

    function __construct() {
        parent::__construct();
		header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
die();
}



       
    }
	
	
	
	public function get_user_information($session_user_id)
	
	{
		$this->db->select("patient_profile.*");
		$this->db->from("patient_profile");
		$this->db->where("user_id",$session_user_id);
		$query=$this->db->get();
		return $query->row_array();
		
		
		
	}
	
	public function get_treatements_information($pation_id)
	
	{
		$this->db->select("treatment.treatment_name");
		$this->db->select("treatment_performed.date , treatment_performed.result");
		$this->db->select("employee.first_name");
		$this->db->from("treatment_performed");
		$this->db->join('treatment','treatment_performed.treatment_id 
=treatment.id','left');
		$this->db->join('employee','treatment_performed.dentist_id =employee.id','');
		$this->db->where("treatment_performed.patient_id",$pation_id);
		$this->db->where("treatment_performed.status ",1);
		$this->db->where("treatment_performed.is_deleted",0);
		$this->db->group_by('treatment_performed.id');
		$query=$this->db->get();
		return $query->result_array();
		
		
		
	}
	
	public function get_payments_information($pation_id)
	
	{
		$this->db->select("pay.date");
		$this->db->select("payment.payment_name , payment.fee");
		$this->db->from("pay");
		$this->db->join('payment','pay.payment_id = payment.id','left');
		$this->db->where("pay.patient_id",$pation_id);
		$this->db->where("pay.status ",1);
		$this->db->where("pay.is_deleted",0);
		$this->db->group_by('pay.id');
		$query=$this->db->get();
		
		return $query->result_array();
		
		
		
	}
	
	public function get_appoinment_information($pation_id){
		$this->db->select("patient_id,date,time,number");
		$this->db->from("appointments");
		$this->db->where("patient_id",$pation_id);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	
	

}

?>