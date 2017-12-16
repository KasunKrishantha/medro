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

        public function preloadSchedule($id){
            $query = $this->db->get_where('schedule',array('id' => $id));
            if($query->num_rows()>0){
                return $query->row();
            }
        }

        public function getRelatedApt($nic){
            $query = $this->db->get_where('appointments', array('nic' => $nic));
//            print_r($query->num_rows());
            if($query->num_rows()>0){
//                print_r($query->row());
                return $query->row();
            }

//            $query1 = $this->db->get_where('appointments',array('nic' => $nic));
//            $query2= $this->db->get_where('patient',array('nic' => $nic));
//            if($query1->num_rows()>0 && $query2->num_rows()>0){
//                return $query1->row();
//            }
        }

        public function getRelatedPatient($nic){
            $query = $this->db->get_where('patient', array('nic' => $nic));
//            print_r($query->num_rows());
            if($query->num_rows()>0){
                //print_r($query->row());
                return $query->row();
            }
        }

        public function addStock($data){
            return $this->db->insert('stock', $data);
        }

        public function getStock($category){
            $query = $this->db->get_where('stock',array('category'=>$category));
//            $this->db->where('id', $id);
//            $query = $this->db->get('stock');
            if($query->num_rows() > 0){
                return $query->result();
            }
        }

        public function insertSchedule($data){
            return $this->db->insert('schedule', $data);
        }

        public function getAllPatients(){
            $query = $this->db->get('patient');
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
    }


?>