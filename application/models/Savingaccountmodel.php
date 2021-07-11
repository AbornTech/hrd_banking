<?php

    class Savingaccountmodel extends CI_Model
     { 
        
        public function get_schemes(){
            $query  =   $this->db->query("SELECT *FROM scheme where is_deleted = 0 ORDER BY id DESC");
            if($query->num_rows()>0){
                $result =   $query->result();
                return $result;
            }else{
                return 0;
            }
        }
         
        public function scheme_details($id){
            $query  =   $this->db->query("SELECT *FROM scheme where id = ".$id);
            if($query->num_rows()>0){
                $result =   $query->result();
                return $result[0];
            }else{
                return 0;
            }
        } 

        public function get_saving_ac_applications(){
            $query  =   $this->db->query("SELECT app.*,member.membership_no,member.member_name,sc.scheme_name FROM saving_acc_application as app LEFT JOIN members as member ON member.id = app.member_id LEFT JOIN scheme as sc  ON sc.id = app.scheme_id ORDER BY id DESC");
            if($query->num_rows()>0){
                $result =   $query->result();
                return $result;
            }else{
                return 0;
            }
        }


        public function update_application_no($application_id){
            $value2 = $application_id;
            // $value2 = substr($value2, 2, 7);
            $value2 = (int) $value2;
            $value2 = "SA" . sprintf('%05s', $value2);
            $value = $value2;
            $data = [
                "application_no" => $value
            ];
            $this->db->where('id', $application_id);
            $this->db->update('saving_acc_application', $data);
        }
    }
     
  ?>