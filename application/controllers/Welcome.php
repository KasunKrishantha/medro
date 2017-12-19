<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
	    $this->load->model('queries');
	    $schedule = $this->queries->getSchedule();
		$this->load->view('availableTime', ['schedule'=>$schedule]);

	}

	public function makeAppointment($id){
        $this->load->model('queries');
        $schedule = $this->queries->preloadSchedule($id);
        $this->load->view('makeAppointment', ['schedule'=>$schedule]);

    }

    public function book($id){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nic', 'National ID No', 'required');
        $this->form_validation->set_rules('telno', 'Telephone', 'required');

        if ($this->form_validation->run()) {
            $data1 = array(
                'nic' => $this->input->post('nic'),
                'date' => $this->input->post('date'),
                'time' => $this->input->post('time'),
                'number' => $this->input->post('number')
            );
            $data2 = array(
                'name' => $this->input->post('name'),
                'nic' => $this->input->post('nic'),
                'area' => $this->input->post('area'),
                'telno' => $this->input->post('telno'),
                'email' => $this->input->post('email')
            );
            $this->load->model('queries');
            if ($this->queries->isMaximum($this->input->post('max_number'), $this->input->post('number'))){
                if ($this->queries->addAppointmentMax($data1, $data2, $id)) {
                    $this->session->set_flashdata('msg', 'Appointment Made Successfully!');
                } else {
                    $this->session->set_flashdata('msg', 'Failed to make the Appointment!');
                }
            }else{
                if ($this->queries->patient_exists($this->input->post('nic'))) {
                    if ($this->queries->addAppointmentwoP($data1, $id)) {
                        $this->session->set_flashdata('msg', 'Appointment Made Successfully!');
                    } else {
                        $this->session->set_flashdata('msg', 'Failed to make the Appointment!');
                    }
                } else {
                    if ($this->queries->addAppointment($data1, $data2, $id)) {
                        $this->session->set_flashdata('msg', 'Appointment Made Successfully!');
                    } else {
                        $this->session->set_flashdata('msg', 'Failed to make the Appointment!');
                    }
                }
            }

            return redirect('welcome/payment');
        }
        else
        {
            $this->load->model('queries');
            $schedule = $this->queries->preloadSchedule($id);
            $this->load->view('makeAppointment', ['schedule'=>$schedule]);
        }
    }

    public function manageAppointments(){
        $this->load->model('queries');
        $appointments =  $this->queries->getAppointments();
        $data['appointments'] = $appointments;


        $patients = $this->queries->getPatients($appointments);
        $data['patients'] = $patients;

//        print_r($data);
        $this->load->view('manageAppointments', $data);

    }

    public function postpone($nic){
        $this->load->model('queries');
        $schedule = $this->queries->getSchedule();
//        $this->load->view('availableTime', ['schedule'=>$schedule]);
        $appointment =  $this->queries->getRelatedApt($nic);
        $patient = $this->queries->getRelatedPatient($nic);
        $data['appointment'] = $appointment;
        $data['patient'] = $patient;
        $data['schedule'] = $schedule;
        $this->load->view('postponeAppointment', ['data'=>$data]);

    }

    public function cancel(){
        $this->load->view('cancelAppointment');
    }

    public function manageStock(){
        $this->load->view('addStock');
    }

    public function postponeAppointment($aid, $sid, $date, $time){
//        $data = array(
//            'nic' => $this->input->post('nic'),
//            'date' => $this->input->post('date'),
//            'time' => $this->input->post('time'),
//            'number' => $this->input->post('number')
//        );
        $this->load->model('queries');
//        echo $sid;
//        echo $aid;

        if($this->queries->postponeApp($aid, $sid) && $this->queries->getSid($date, $time)){
            $this->session->set_flashdata('msg', 'Appointment Postponed Successfully!');
        }else{
            $this->session->set_flashdata('msg', 'Failed to postpone the Appointment!');
        }
        return redirect('welcome/manageAppointments');


    }

    public function getAppointments(){
//
    }

    public function addStock(){
        $this->load->model('queries');
        $data = $this->input->post();
        unset($data['submit']);
          //print_r($data);
        if($this->queries->addStock($data)){
            $this->session->set_flashdata('msg', 'Stock Added Successfully!');
        }else{
            $this->session->set_flashdata('msg', 'Failed to Add!');
        }
//        return redirect('welcome');
        return redirect('welcome/manageStock');
    }

    public function viewStock(){
        $this->load->model('queries');
        $other = $this->queries->getStock('Other');
        $pain = $this->queries->getStock('Pain Killers');
        $analgesics = $this->queries->getStock('Analgesics');
        $anesthetic = $this->queries->getStock('Anesthetic');
        $antibiotics = $this->queries->getStock('Antibiotics');
        $antifungals = $this->queries->getStock('Antifungals');
        $this->load->view('viewStock', ['other'=>$other, 'pain'=>$pain, 'antifungals'=>$antifungals, 'analgesics'=>$analgesics, 'anesthetic'=>$anesthetic,'antibiotics'=>$antibiotics]);

    }

    public function getPainKillers(){
        $this->load->model('queries');
        $stock = $this->queries->getStock('Pain Killers');
        $this->load->view('viewStock', ['pain'=>$stock]);

    }

    public function loadAddSchedule(){
        $this->load->model('queries');
        $schedule = $this->queries->getSchedule();
        $this->load->view('addSchedule', ['schedule'=>$schedule]);
    }

    public function addSchedule(){
        $this->load->model('queries');
        $data = $this->input->post();
        unset($data['submit']);
        print_r($data);
        if($this->queries->insertSchedule($data)){
            $this->session->set_flashdata('msg', 'Record Added Successfully!');
        }else{
            $this->session->set_flashdata('msg', 'Failed to Add!');
        }
        return redirect('welcome/loadAddSchedule');
    }

    public function viewPatients(){
        $this->load->model('queries');
        $patients = $this->queries->getAllPatients();
        $this->load->view('viewPatients', ['patients'=>$patients]);
    }

    public function thankYou(){
        $this->load->view('thankYou');
    }

    public function addExpenses(){
        $this->load->model('queries');
        $expenses = $this->queries->getExpenses();
        $this->load->view('expenses', ['expenses'=>$expenses]);
    }

    public function expenses(){

    }

    public function checkout(){
        $token = $_POST['stripeToken'];
        try{
            require_once ('vendor/autoload.php');
            Stripe::setApiKey('sk_test_WriOpHhJCy3n2k2gr4BntR4k');



            $charge = Charge::create(
                array(
                    "amount" => 1000,
                    "currency" => "usd",
                    "description" => "Appointment for Medro Medical Center",
                    "source" => $token,
                )
            );
            $this->load->view('thankYou');
        }catch (\Stripe\Error\Card $e){
            $error = $e->getMessage();
            echo $error;
        }

    }

    public function payment(){
        $this->load->view('makePayment');
    }



}
