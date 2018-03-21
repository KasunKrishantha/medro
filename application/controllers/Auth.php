<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->model('User_model');

    $guest = array('index','login','signup_form','signup','enter_reset_password_email','email_reset_password','change_password','save_new_password');
    if(isset($this->session->userdata['logged_in'])){
      if(in_array($this->router->method, $guest)){
        redirect('dashboard');
      }
    }
  }

  public function index() {
    $this->load->view('landing/landing');
  }

  public function login(){
    $this->form_validation->set_rules('email','Email','trim|required');
    $this->form_validation->set_rules('password','Password','trim|required');

    if($this->form_validation->run()==FALSE) {
			$this->load->view('landing/landing');
		}
    else {
      $data = array (
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
      );

      if($this->User_model->checkEmail($data['email'])){

        if ($this->User_model->checkPass($data)) {
          $userinfo = $this->User_model->getUserData($data['email']);
          $this->session->set_userdata('logged_in',$userinfo);
          redirect('dashboard');
        }
        else {
          $info['error_msg'] = "Password incorrect";
          $this->load->view('landing/landing',$info);
        }
      }
      else {
        $info['error_msg'] = "Email not found";
        $this->load->view('landing/landing',$info);
      }
    }
  }

  public function signup_form() {
    $this->load->view('landing/signup_form');
  }

  public function signup(){
    $this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
    $this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('pass1','Password','trim|required');
    $this->form_validation->set_rules('pass2','Password Confirmation','trim|required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('landing/signup_form');
		}
		else{
      $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
  			'email' => $this->input->post('email'),
        'role_id' => 0
      );
      $pass1 = $this->input->post('pass1');
      $pass2 = $this->input->post('pass2');

      if(!($this->User_model->checkEmail($data['email']))){
        if ($pass1==$pass2) {
          $data['password'] = password_hash($pass1,PASSWORD_BCRYPT);
          $this->User_model->addUser($data);
          $this->load->view('landing/login_after_signup');
        }
        else {
          $info['error_msg'] = "Passwords do not match.";
          $this->load->view('landing/signup_form',$info);
        }
      }
      else {
        $info['error_msg'] = "A user has already been registered with this email.";
        $this->load->view('landing/signup_form',$info);
      }
    }
  }



  public function enter_reset_password_email(){
    $this->load->view('landing/reset_password_email');
  }



  public function email_reset_password() {
    $this->form_validation->set_rules('email','Email','trim|required');

    if($this->form_validation->run()==FALSE){
      $this->load->view('landing/reset_password_email');
    }
    else{
      $email = $this->input->post('email');

      if($this->User_model->inResetPassword($email)){
        $info['error_msg'] = "Password reset link has already been sent by email. Check your inbox.";
        $this->load->view('landing/reset_password_email',$info);
      }
      elseif($this->User_model->checkEmail($email)){
        $token = $this->random_str();
        $this->User_model->addPasswordReset($email,$token);

        $name = $this->User_model->getName($email);

        $name = $name->first_name." ".$name->last_name;
        $to_email = $email;

        $data = array(
          'token' => $token,
          'name' => $name
        );

        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'stuxzero@gmail.com',
          'smtp_pass' => '1aq2sw3de',
          'mailtype'  => 'html',
          'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('stuxzero@gamil.com', 'Medro Dental Surgery');
        $this->email->to($to_email);
        $this->email->subject('Reset password.');
        $body = $this->load->view('email/pass_reset_link',$data,TRUE);
        $this->email->message($body);
        $result = $this->email->send();

        $this->load->view('landing/email_sent');
      }
      else {
        $data = array(
          'error_msg' => "Username not found."
        );
        $this->load->view('auth/reset_password',$data);
      }
    }
  }

  function random_str($length = 10, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
  }

  public function change_password($token){
    $user_info = $this->User_model->getInfoFromResetToken($token);
    if(!isset($user_info)){
      show_404();
      die();
    }
    $email = $user_info->email;
    $timestamp = $user_info->timestamp;

    $this->session->set_flashdata('email',$email);

    $time = new DateTime($timestamp, new DateTimeZone('UTC'));
    $request_time = strtotime($time->format('Y-m-d H:i:s O'));
    $now_time = time();
    if(($now_time-$request_time)<86400){
      $this->load->view('landing/new_password');
    }
    else {
      $info = array(
        'error_msg' => "Reset link has expired. Enter your email to request a new link."
      );
      $this->load->view('landing/reset_password_email',$info);
    }
  }

  public function save_new_password(){
    $this->form_validation->set_rules('pass1','Password','trim|required');
    $this->form_validation->set_rules('pass2','Confirm Password','trim|required');

    if($this->form_validation->run()==FALSE){
      $this->load->view('landing/new_password');
    }
    else{
      $pass1 = $this->input->post('pass1');
      $pass2 = $this->input->post('pass2');

      if($pass1==$pass2){
        $this->User_model->updatePassword(password_hash($pass1,PASSWORD_BCRYPT),$_SESSION['email']);
        $this->session->unset_userdata['email'];
        $this->load->view('landing/password_reset_successful');
      }
      else {
        $info['error_msg'] = "Passwords do not match";
        $this->load->view('landing/new_password');
      }
    }
  }

  public function logout(){
    if(!isset($this->session->userdata['logged_in'])){
      redirect('auth');
    }
    $this->session->unset_userdata('logged_in');
    redirect('auth');
  }
}
