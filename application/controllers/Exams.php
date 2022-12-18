<?php 

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Exams extends CI_Controller {

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


        function load_examManage() {
          $this->login_model->activeStatus();
          if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
          $page_data['page_name'] = 'manage_exams';
          $page_data['page_title'] =  'Setup Exams';
          $this->load->view('backend/index', $page_data);
          }
    

        function manage_exam($param1 = null, $param2 = null, $param3 = null){
            $this->login_model->activeStatus();
            if($param1 == 'create'){
                $this->exams_model->newExamFunction();
                $this->session->set_flashdata('flash_message', 'Exam Created Successfully');
                redirect(base_url(). 'exams/load_examManage', 'refresh');
                }
            if($param1 == 'update'){
                $param2 = $this->input->post('examEdit_id');
                $this->exams_model->updateExamFunction($param2);
                $this->session->set_flashdata('flash_message', 'Updated Successfully');
                redirect(base_url(). 'exams/load_examManage', 'refresh');
                }
            if($param1 == 'delete'){
                $this->exams_model->deleteExam($param2);
                $this->session->set_flashdata('flash_message', 'Exams Setup Deleted');
                redirect(base_url(). 'exams/load_examManage', 'refresh');
            }
        }

        function manage_questions($param1 = null, $param2 = null, $param3 = null){
            $this->login_model->activeStatus();
            if($param1 == 'create'){
                $this->exams_model->newQuestionFunction($param2);
                $this->session->set_flashdata('flash_message', 'Question Created Successfully');
                redirect(base_url(). 'exams/load_queueQuestion2/'.$param2, 'refresh');
                }
            if($param1 == 'update'){
                $param2 = $this->input->post('examEdit_id');
                $this->exams_model->updateQuestionFunction($param2);
                $this->session->set_flashdata('flash_message', 'Updated Successfully');
                redirect(base_url(). 'exams/load_examManage', 'refresh');
                }
            if($param1 == 'delete'){
                $this->exams_model->deleteQuestion($param2, $param3);
                $this->session->set_flashdata('flash_message', 'Question Deleted');
                redirect(base_url(). 'exams/load_queueQuestion2/'.$param3, 'refresh');
            }
        }


        function get_examRecord($param1) {
            $this->login_model->activeStatus();

            if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');
            $data = $this->exams_model->fetch_examRecord($param1);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($data));
            }
         

            function load_queueQuestion() {
                $this->login_model->activeStatus();
                if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
                $page_data['page_name'] = 'queue_questions';
                $page_data['page_title'] =  'Question Bank';
                $this->load->view('backend/index', $page_data);
                }
              
            function load_queueQuestion2($param1) {
                $this->login_model->activeStatus();
                if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
                $page_data['page_name'] = 'queue_questions2';
                $page_data['page_title'] =  'Question Bank';
                $page_data['exam_id'] =  $param1;
                $this->load->view('backend/index', $page_data);
                }

            function get_questionRecord($param1) {
                $this->login_model->activeStatus();

                if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');
                $data = $this->exams_model->fetch_questionRecord($param1);
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode($data));
                }

            function load_frontPage() {
                if($this->session->userdata('login_status') != 'Yes') redirect(base_url(). 'login/cbt/', 'refresh');
                $page_data['page_name'] = 'index';
                $page_data['page_title'] =  'CBT Exams';
                $this->load->view('frontend/index', $page_data);
                }


            function cbt_submit() {
                if($this->session->userdata('login_status') != 'Yes') redirect(base_url(). 'login/cbt/', 'refresh');
                $this->exams_model->saveCbtSubmit();
                $page_data['page_title'] = 'Manage Scores';
                $this->load->view('frontend/result', $page_data);
                }
            
            
            function cbt_review() {
                $page_data['page_title'] =  'Review Scores';
                $this->load->view('frontend/review', $page_data);
                }

    
                  
                   
                  
}
