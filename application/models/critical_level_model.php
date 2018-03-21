<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Critical_Level_Model extends CI_Model {

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
	
	
	
	public function get_low_stock_information()
	
	{
		$this->db->select("drug_code,drug_name,brand,category,quantity,critical_leval");
		$this->db->from("stock_view");
		$this->db->where("quantity < critical_leval");
		$query=$this->db->get();
		return $query->result_array();
		
		
		
	}
}

?>