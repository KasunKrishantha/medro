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
    $this->db->select('email,first_name,last_name,role_id');
    $this->db->from('user');
    $this->db->where('email',$email);
    $query = $this->db->get();

    $row = $query->row();
    return $row;
  }

  public function getName($email){
    $this->db->select('first_name,last_name');
    $this->db->from('user');
    $this->db->where('email',$email);
    $query = $this->db->get();

    $row = $query->row();
    return $row;
  }

  public function inResetPassword($email){
		$this->db->from('password_resets');
		$this->db->where('email',$email);
		$query = $this->db->get();

		if($query->num_rows()==0){
			return false;
		}
		return true;
	}

  public function addPasswordReset($email,$token){
    $data = array(
			'email' => $email,
			'token' => $token
		);
		$this->db->insert('password_resets',$data);
  }

  public function getInfoFromResetToken($token){
    $this->db->select('email,timestamp');
    $this->db->from('password_resets');
    $this->db->where('token',$token);
    $query = $this->db->get();

    return $query->row();
  }

  public function updatePassword($password,$email){
		$this->db->where('email',$email);
		$this->db->update('user', array('password' => $password));

		$this->db->delete('password_resets', array('email' => $email));
	}
}
