<?php
    class queries extends CI_Model{
        public function getSchedule()
        {
              $today = date('Y-m-d');
              $this->db->where('date >=', $today);
              $query = $this->db->get('schedule');
              if($query->num_rows() > 0){
                  return $query->result();
              }
        }

        public function addAppointment($data1, $data2){
            return $this->db->insert('appointments', $data1) && $this->db->insert('patient', $data2);

        }

        public function getAppointments(){
            $query = $this->db->get('appointments');
            $row_count = $query->num_rows();
            $appointments = array();
            for ($i = 0; $i < $row_count; $i++){
                array_push($appointments, $query->row($i));
            }
//            print_r($query->row($row_count-1));
//            echo "row count ".$row_count;
            return $appointments;
        }

        public function getPatients($appointments){

            $nics = array();

            foreach ($appointments as $appointment){
                array_push($nics, $appointment->nic);
            }

//            print_r($nics);
            $this->db->where_in('nic', $nics);
            $query = $this->db->get('patient');
//            print_r($query);

            $patients = [];
            $row_count = $query->num_rows();
            for ($i = 0; $i < $row_count; $i++){
                array_push($patients, $query->row($i));
            }

            return $patients;
        }
    }
?>