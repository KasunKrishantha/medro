<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    public function book(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nic', 'National ID No', 'required');
        $this->form_validation->set_rules('telno', 'Telephone', 'required');

        if ($this->form_validation->run())
        {
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
            if($this->queries->addAppointment($data1, $data2)){
                $this->session->set_flashdata('msg', 'Appointment Made Successfully!');
            }else{
                $this->session->set_flashdata('msg', 'Failed to make the Appointment!');
            }
            return redirect('welcome');
        }
        else
        {
            $this->load->view('makeAppointment');
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
        $appointment =  $this->queries->getRelatedApt($nic);
        $patient = $this->queries->getRelatedPatient($nic);
        $data['appointment'] = $appointment;
        $data['patient'] = $patient;
        $this->load->view('postponeAppointment', ['data'=>$data]);

    }

    public function cancel(){
        $this->load->view('cancelAppointment');
    }

    public function manageStock(){
        $this->load->view('addStock');
    }

    public function postponeAppointment(){
        $data = array(
            'nic' => $this->input->post('nic'),
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'number' => $this->input->post('number')
        );
        $this->load->model('queries');


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
//        $this->load->view('viewStock', ['other'=>$other]);
        $pain = $this->queries->getStock('Pain Killers');
//        $this->load->view('viewStock', ['pain'=>$pain]);
        $analgesics = $this->queries->getStock('Analgesics');
//        $this->load->view('viewStock', ['analgesics'=>$analgesics]);
        $anesthetic = $this->queries->getStock('Anesthetic');
//        $this->load->view('viewStock', ['anesthetic'=>$anesthetic]);
        $antibiotics = $this->queries->getStock('Antibiotics');
//        $this->load->view('viewStock', ['antibiotics'=>$antibiotics]);
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
}
