<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Users extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('login_model');
        $this->load->model('students_model');
        $this->load->model('settings_model');
        $this->load->model('exams_model');
        }


    function load_userProfile() {
        $this->login_model->activeStatus();
		    if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
		    $page_data['page_name'] = 'manage_user';
		    $page_data['page_title'] =  'User Profile';
		    $this->load->view('backend/index', $page_data);
		    }


    function manage_user($param1 = null, $param2 = null, $param3 = null){
      $this->login_model->activeStatus();

    if($param1 == 'create'){
        $this->users_model->newUserFunction();
        $this->session->set_flashdata('flash_message', 'User Profiled Successfully');
        redirect(base_url(). 'users/load_userProfile', 'refresh');
        }


    if($param1 == 'update'){
        $param2 = $this->input->post('parameter2');
        $this->users_model->updateUserFunction($param2);
        $this->session->set_flashdata('flash_message', 'User Profile Updated Successfully');
        redirect(base_url(). 'users/load_userProfile', 'refresh');
        }


    if($param1 == 'delete'){
        $this->users_model->updateUserStatus($param2,$param3);
        $this->session->set_flashdata('flash_message', 'Account Deactivated Successfully');
        redirect(base_url(). 'users/load_userProfile', 'refresh');
          }
      }


      function get_userRecord($param1) {
          $this->login_model->activeStatus();

          if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');
          $data = $this->users_model->fetch_userRecord($param1);
          $this->output->set_content_type('application/json');
          $this->output->set_output(json_encode($data));
          }


          function load_examManage() {
            $this->login_model->activeStatus();
            if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
            $page_data['page_name'] = 'manage_exams';
            $page_data['page_title'] =  'Setup Exams';
            $this->load->view('backend/index', $page_data);
            }
      
        function change_status($param1=null,$param2=null) {
            $param1=$this->input->post('new_accountStatus');
            $param2=$this->input->post('selected_status');
            
            if($this->session->userdata('access_level') != 1){
                $this->session->set_flashdata('error_message', 'You do not have the privilege to change user status!');
                redirect(base_url(). 'users/load_userProfile', 'refresh');
                }
                
            if($this->session->userdata('access_level') == 1){
                $this->users_model->updateUserStatus($param1,$param2);
                redirect(base_url(). 'users/load_userProfile', 'refresh');
                }

                } 
           
            
          
            
    


}
