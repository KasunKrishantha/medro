<?php
    class queries extends CI_Model{
        public function getSchedule(){
              $today = date('Y-m-d');
              $this->db->where('date >=', $today);
              $query = $this->db->get('schedule');
              if($query->num_rows() > 0){
                  return $query->result();
              }
        }

        public function addAppointment($data1, $data2, $id){
            return $this->db->insert('appointments', $data1) && $this->db->insert('patient', $data2) && $this->db->set('next_number', 'next_number+1', FALSE) ->where('id', $id) ->update('schedule');

        }

        public function addAppointmentwoP($data1, $id){
            return $this->db->insert('appointments', $data1) && $this->db->set('next_number', 'next_number+1', FALSE) ->where('id', $id) ->update('schedule');

        }


        public function getAppointments(){
            $today = date('Y-m-d');
            $query = $this->db->query("SELECT * FROM appointments WHERE date > '{$today}'");
            $row_count = $query->num_rows();
            $appointments = array();
            for ($i = 0; $i < $row_count; $i++){
                array_push($appointments, $query->row($i));
            }
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
            $row_count = $query->num_rows();
            if($row_count>0){
//                print_r($query->row());
                return $query->row($row_count -1);
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

        public function patient_exists($nic){
            $this->db->where('nic',$nic);
            $ids = $this->db->get('patient');
            if ($ids->num_rows() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function isMaximum($max, $next){
           if ($max == $next){
               return true;
           }else{
               return false;
           }
        }

        public function addAppointmentMax($data1, $data2, $id){
            $status = "Full";
            return $this->db->insert('appointments', $data1) && $this->db->set('next_number', '-1', FALSE) ->where('id', $id) ->update('schedule') && $this->db->set('status', $status) ->where('id', $id) ->update('schedule');
        }

        public function postponeApp($aid, $sid){
            $query = $this->db->get_where('schedule',array('id' => $sid));
            if($query->num_rows()>0){
                $schedule = $query->row();
            }
//            var_dump($schedule) ;
//            die();

            $data = array('date' => $schedule->date,
                            'time' => $schedule->time,
                            'number' => $schedule->next_number);
            return $this->db->where('id', $aid)
                    ->update('appointments', $data) && $this->db->set('next_number', 'next_number+1', FALSE) ->where('id', $sid) ->update('schedule');

        }


        public function getExpenses(){
            $thisYr = date("Y");
            $thisYrQuery = $this->db->get_where('expenses', array('year' => $thisYr));
            if($thisYrQuery->num_rows() > 0){
                return $thisYrQuery->result();
            }
        }

        public function getSid($date, $time){
            $status = "Available";
            $query = $this->db->query("SELECT DISTINCT schedule.id FROM schedule, appointments WHERE schedule.date='{$date}' && schedule.time='{$time}'");
            if($query->num_rows() > 0){
                $sid = $query->result();
//                var_dump($sid[0]->id);die();
                return $this->db->set('next_number', 'next_number-1', FALSE) ->where('id', $sid[0]->id) ->update('schedule') && $this->db->set('status', $status) ->where('id', $sid[0]->id) ->update('schedule');
            }

        }
    }


?>