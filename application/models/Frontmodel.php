<?php

    class Frontmodel extends CI_Model
     { 
        public function get_member_groups($exclude_id = 0){
            
            if($exclude_id!==0){
                $query  =   $this->db->query("SELECT m.*,um.group_name as under_group_name FROM member_groups as m LEFT JOIN member_groups as um ON m.id = um.under_group_id where m.id!=".$exclude_id. " ORDER BY m.id DESC");
            }else{
                $query  =   $this->db->query("SELECT m.*,um.group_name as under_group_name FROM member_groups as m LEFT JOIN member_groups as um ON m.id = um.under_group_id ORDER BY m.id DESC");
            }
            if($query->num_rows()>0){
                $result =   $query->result();
                return $result;
            }else{
                return 0;
            }
        }
         
        public function member_groups_details($id){
            $query  =   $this->db->query("SELECT *FROM member_groups where id = ".$id);
            if($query->num_rows()>0){
                $result =   $query->result();
                return $result[0];
            }else{
                return 0;
            }
        } 
        
        public function get_members(){
            $query  =   $this->db->query("SELECT *FROM members ORDER BY id DESC");
            if($query->num_rows()>0){
                $result =   $query->result();
                return $result;
            }else{
                return 0;
            }
        }

        public function update_membership_no($row_id){
            $value2 = $row_id;
            // $value2 = substr($value2, 2, 7);
            $value2 = (int) $value2;
            $value2 = "HR" . sprintf('%07s', $value2);
            $value = $value2;
            $data = [
                "membership_no" => $value
            ];
            $this->db->where('id', $row_id);
            $this->db->update('members', $data);
        }
         
    }
     
  ?>