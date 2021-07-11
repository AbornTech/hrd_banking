<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->model("frontmodel");
        $this->load->library('ion_auth');
        $this->load->library('encryption');
        $this->lang->load('auth');
        $this->output->delete_cache();
    }
    public function index()
    {
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'HRDNL';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->load->view('front/index', $this->data);
    }
    
    public function member_group(){
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Member Group';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->groups = $this->frontmodel->get_member_groups();
        $this->load->view('front/member_group', $this->data);
    }

    public function manage_member_group(){
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Manage Member Group';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->member_groups = $this->frontmodel->get_member_groups();
        $this->load->view('front/manage_member_group', $this->data);
    }

    public function edit_member_group($id){
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Edit Member Group';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        if(empty($id)){
            redirect(base_url());
        }
        $this->group_details = $this->frontmodel->member_groups_details($id);
        $this->member_groups = $this->frontmodel->get_member_groups($id);
        $this->load->view('front/manage_member_group', $this->data);
    }

    public function save_member_group(){
        try {
            $isNew =  $this->input->post("isNew"); 
            $data = (object) $this->input->post("group");
             
            if($isNew==='true'){
                $scheme = array(
                    "group_name" => $data->group_name,
                    "under_group_id" => $data->under_group_id,
                    "remark" => $data->remark
                );
                
                $this->db->insert("member_groups",$scheme);
                $id = $this->db->insert_id();
                if($id){
                    echo json_encode(array("status"=>true,"message"=>"New Group saved successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not save Group!"));
                }
            }else{
                $scheme = [
                    "group_name" => $data->group_name,
                    "under_group_id" => $data->under_group_id,
                    "remark" => $data->remark
                ];
                $this->db->where('id', $data->id);
                if($this->db->update('member_groups', $scheme)){
                    echo json_encode(array("status"=>true,"message"=>"Group Updated successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not update Group!"));
                }
            
            }
            
        } catch (Throwable $th) {
            echo json_encode(array("status"=>false,"message"=>$th->getMessage()));
        }
    }

    public function members(){
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Members';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->groups = $this->frontmodel->get_member_groups();
        $this->members = $this->frontmodel->get_members();
        $this->load->view('front/members', $this->data);
    }

    public function manage_members(){
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Manage Members';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->groups = $this->frontmodel->get_member_groups();
        $this->members = $this->frontmodel->get_members();
        $this->load->view('front/manage_members', $this->data);
    }

    public function save_member(){
        try {
            $isNew =  $this->input->post("isNew");
            $data = (object) $this->input->post("new_member");
            if($isNew==='true'){
                $scheme = array(
                        "enroll_date"=>$data->enroll_date,
                        "gender"=>$data->gender,
                        "marital_status"=>$data->marital_status,
                        "alternate_number"=>$data->alternate_number,
                        "relative_type"=>$data->relative_type,
                        "relative_name"=>$data->relative_name,
                        "religion"=>$data->religion,
                        "member_group"=>$data->member_group,
                        "member_title"=>$data->member_title,
                        "member_name"=>$data->member_name,
                        "dob"=>$data->dob,
                        "primary_mobile_number"=>$data->primary_mobile_number,
                        "email"=>$data->email,
                        "mother_name"=>$data->mother_name,
                        "cast"=>$data->cast,
                        "introducer_member"=>$data->introducer_member,
                        "latitude"=>$data->latitude,
                        "longitude"=>$data->longitude,
                        "aadhar_no"=>$data->aadhar_no,
                        "pan_no"=>$data->pan_no,
                        "voter_id"=>$data->voter_id,
                        "ration_card"=>$data->ration_card,
                        "driving_license"=>$data->driving_license,
                        "passport_no"=>$data->passport_no
                );
                
                $this->db->insert("members",$scheme);
                $id = $this->db->insert_id();
                if($id){
                    $this->frontmodel->update_membership_no($id);
                    echo json_encode(array("status"=>true,"message"=>"New Member saved successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not save Member!"));
                }
            }else{
                $members = [
                    "id"=>$data->id,
                    "enroll_date"=>$data->enroll_date,
                    "gender"=>$data->gender,
                    "marital_status"=>$data->marital_status,
                    "alternate_number"=>$data->alternate_number,
                    "relative_type"=>$data->relative_type,
                    "relative_name"=>$data->relative_name,
                    "religion"=>$data->religion,
                    "member_group"=>$data->member_group,
                    "member_title"=>$data->member_title,
                    "member_name"=>$data->member_name,
                    "dob"=>$data->dob,
                    "primary_mobile_number"=>$data->primary_mobile_number,
                    "email"=>$data->email,
                    "mother_name"=>$data->mother_name,
                    "cast"=>$data->cast,
                    "introducer_member"=>$data->introducer_member,
                    "latitude"=>$data->latitude,
                    "longitude"=>$data->longitude,
                    "aadhar_no"=>$data->aadhar_no,
                    "pan_no"=>$data->pan_no,
                    "voter_id"=>$data->voter_id,
                    "ration_card"=>$data->ration_card,
                    "driving_license"=>$data->driving_license,
                    "passport_no"=>$data->passport_no
                ];
                $this->db->where('id', $data->id);
                if($this->db->update('members', $members)){
                    echo json_encode(array("status"=>true,"message"=>"Member Updated successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not update Member!"));
                }
            
            }
            
        } catch (Throwable $th) {
            echo json_encode(array("status"=>false,"message"=>$th->getMessage()));
        }
    }

    function error_404()
    {
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_alias = "error_404";
        $pageData->page_meta_title       =   'errors';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->load->view("front/error_404", $this->data);
    }  
 
     
}
