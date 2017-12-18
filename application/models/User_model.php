<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
  public function addUser($data){
    $this->db->insert('user',$data);
  }

  public function checkEmail($email){
    $this->db->from('user');
    $this->db->where('email',$email);
    $query = $this->db->get();

    if($query->num_rows()>0){
      return true;
    }
    return false;
  }

  public function checkPass($data){
    $this->db->from('user');
    $this->db->where('email',$data['email']);
    $query = $this->db->get();

    $row = $query->row();

    if(password_verify($data['password'],$row->password)){
      return true;
    }
    return false;
  }

  public function getUserData($email){
    $this->db->select('email,first_name,last_name');
    $this->db->from('user');
    $this->db->where('email',$email);
    $query = $this->db->get();

    $row = $query->row();
    return $row;
  }
}
