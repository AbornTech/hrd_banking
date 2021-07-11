<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Savingaccount extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->model("savingaccountmodel");
        $this->load->model("frontmodel");
        $this->load->library('ion_auth');
        $this->load->library('encryption');
        $this->lang->load('auth');
        $this->output->delete_cache();
    }
    public function index()
    {
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Saving Account';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->load->view('saving_accounts/index', $this->data);
    }

    public function scheme()
    {
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Saving Account Scheme';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->schemes = $this->savingaccountmodel->get_schemes();
        $this->load->view('saving_accounts/scheme', $this->data);
    }

    public function new_scheme()
    {
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Add Scheme';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->scheme_id = '';
        $this->load->view('saving_accounts/new_scheme', $this->data);
    }

    public function save_scheme(){
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        try {
            $isNew =  $this->input->post("isNew");
            $data = (object) $this->input->post("scheme");
            if($isNew==='true'){
                $scheme = array(
                    "scheme_code" => $data->scheme_code,
                    "interest_payout" => $data->interest_payout,
                    "minimum_balance" => $data->minimum_balance,
                    "scheme_name" => $data->name,
                    "interest_rate" => $data->interest_rate,
                    "is_active" => $data->is_active==='true'?1:0 
                );
                
                $this->db->insert("scheme",$scheme);
                $id = $this->db->insert_id();
                if($id){
                    echo json_encode(array("status"=>true,"message"=>"New Scheme saved successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not save scheme!"));
                }
            }else{
                $scheme = [
                    "scheme_code" => $data->scheme_code,
                    "interest_payout" => $data->interest_payout,
                    "minimum_balance" => $data->minimum_balance,
                    "scheme_name" => $data->name,
                    "interest_rate" => $data->interest_rate,
                    "is_active" => $data->is_active==='true'?1:0 
                ];
                $this->db->where('id', $data->id);
                if($this->db->update('scheme', $scheme)){
                    echo json_encode(array("status"=>true,"message"=>"Scheme Updated successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not update scheme!"));
                }
            
            }
            
        } catch (Throwable $th) {
            echo json_encode(array("status"=>false,"message"=>$th->getMessage()));
        }
        
    }

    
    public function scheme_details($scheme_id){
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Scheme Details';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        if(empty($scheme_id)){
            redirect(base_url());
        }
        $this->scheme_id = $scheme_id;
        $this->scheme_details = $this->savingaccountmodel->scheme_details($scheme_id);
        $this->load->view('saving_accounts/scheme_details', $this->data);
    }


    public function edit_scheme($scheme_id){
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Scheme Details';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->scheme_id = $scheme_id;
        if($scheme_id){
            $this->scheme_details = $this->savingaccountmodel->scheme_details($scheme_id);
        }
        $this->load->view('saving_accounts/new_scheme', $this->data);
    }
    
    public function delete_scheme($id=0){
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        if(empty($id)){
            redirect(base_url());
        }

        $data = [
            "is_deleted" => 1
        ];
        $this->db->where('id', $id);
        if($this->db->update('scheme', $data)){
            $this->session->set_flashdata("session_message", "Scheme deleted succussfully.");
            redirect(base_url().'savingaccount/scheme');
        }else{
            $this->session->set_flashdata("session_message", "Could not deleted scheme.");
            redirect(base_url().'savingaccount/scheme');
        }
    }

    public function saving_account_application(){
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Saving Account Application';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->application  =  $this->savingaccountmodel->get_saving_ac_applications();
        $this->load->view('saving_accounts/saving_account_application', $this->data);
    }


    public function manage_savingapplication(){
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        $pageData = new stdClass();
        $this->data =   array();
        $pageData->page_meta_title       =   'Manage Saving Account Application';
        $pageData->page_meta_keyword     =   '';
        $pageData->page_meta_description =   '';
        $this->data['pageData']     =   $pageData;
        $this->members = $this->frontmodel->get_members();
        $this->schemes = $this->savingaccountmodel->get_schemes();
        $this->load->view('saving_accounts/manage_account_application', $this->data);
    }
    
    public function save_application(){
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->in_group(array(1)))) {
			redirect('front/login', 'refresh');
		}
        try {
            $isNew =  $this->input->post("isNew");
            $data = (object) $this->input->post("scheme");
             
            if($isNew==='true'){
                $scheme = array(
                    "application_date"=>$data->application_date,
                    "member_id"=>$data->member_id,
                    "joint_account"=>$data->joint_account,
                    "minor_id"=>$data->minor_id,
                    "agent_id"=>$data->agent_id,
                    "scheme_id"=>$data->scheme_id,
                    "opening_amount"=>$data->opening_amount,
                    "pay_mode"=>$data->pay_mode,
                    "bank_name"=>$data->bank_name,
                    "cheque_no"=>$data->cheque_no,
                    "cheque_date"=>$data->cheque_date,
                    "bank_account_type"=>$data->bank_account_type,
                    "reference"=>$data->reference,
                );
                
                $this->db->insert("saving_acc_application",$scheme);
                $id = $this->db->insert_id();
                if($id){
                    $this->savingaccountmodel->update_application_no($id);
                    echo json_encode(array("status"=>true,"message"=>"New application saved successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not save application!"));
                }
            }else{
                $scheme = [
                    "id"=>$data->id,
                    "application_date"=>$data->application_date,
                    "member_id"=>$data->member_id,
                     
                    "joint_account"=>$data->joint_account,
                    "minor_id"=>$data->minor_id,
                    "agent_id"=>$data->agent_id,
                    "scheme_id"=>$data->scheme_id,
                     
                    "opening_amount"=>$data->opening_amount,
                    "pay_mode"=>$data->pay_mode,
                    "bank_name"=>$data->bank_name,
                    "cheque_no"=>$data->cheque_no,
                    "cheque_date"=>$data->cheque_date,
                    "bank_account_type"=>$data->bank_account_type,
                    "reference"=>$data->reference,
                ];
                $this->db->where('id', $data->id);
                if($this->db->update('saving_acc_application', $scheme)){
                    echo json_encode(array("status"=>true,"message"=>"application Updated successfully!"));
                }else{
                    echo json_encode(array("status"=>false,"message"=>"Could not update application!"));
                }
            
            }
            
        } catch (Throwable $th) {
            echo json_encode(array("status"=>false,"message"=>$th->getMessage()));
        }
    }
    

    function error_404()
    {
        if (!$this->ion_auth->logged_in()) {
			redirect('front/login', 'refresh');
		}
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
