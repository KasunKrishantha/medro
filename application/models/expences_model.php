<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expences_Model extends CI_Model {

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
	
	
	public function get_expences_information($Month,$year)
	
	{
		
		$this->db->select("electricity_bill,water_bill,rental,other");
		$this->db->where("year",$year);
		$this->db->where("month",$Month);
		$query=$this->db->get("expences");
		return $query->row_array();
		
		
		
	}
}

?>