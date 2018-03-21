<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stock_Model extends CI_Model {

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
		$this->db->select("first_name,last_name");
		$this->db->from("patient");
		$this->db->where("user_id",$session_user_id);
		$query=$this->db->get();
		return $query->row_array();
		
		
		
	}
	
	public function get_stock_information()
	
	{
		$this->db->select("drug_code,drug_name,brand,category,quantity");
		$query=$this->db->get("stock_view");
		return $query->result_array();
		
		
		
	}
}

?>