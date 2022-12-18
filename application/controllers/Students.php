<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Students extends CI_Controller {

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


    function load_studentProfile() {
        $this->login_model->activeStatus();
		    if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
		    $page_data['page_name'] = 'manage_student';
		    $page_data['page_title'] =  'Student Profile';
		    $this->load->view('backend/index', $page_data);
		    }


    function load_viewPin() {
        $this->login_model->activeStatus();
		    if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
		    $page_data['page_name'] = 'view_pin';
		    $page_data['page_title'] =  'View PIN';
		    $this->load->view('backend/index', $page_data);
		    }


    function manage_student($param1 = null, $param2 = null, $param3 = null){
      $this->login_model->activeStatus();

    if($param1 == 'create'){
        $this->students_model->newStudentFunction();
        $this->session->set_flashdata('flash_message', 'Student Profiled Successfully');
        redirect(base_url(). 'students/load_studentProfile', 'refresh');
        }

    if($param1 == 'create_student_and_pin'){
        $this->students_model->newProfile_and_pin();
        $this->session->set_flashdata('flash_message', 'Student Profiled Successfully');
        redirect(base_url(). 'students/load_viewPin', 'refresh');
        }

    if($param1 == 'create_pin'){
        $this->students_model->new_pin();
        $this->session->set_flashdata('flash_message', 'Exam PIN Created Successfully');
        redirect(base_url(). 'students/load_viewPin', 'refresh');
        }

    if($param1 == 'update'){
        $param2 = $this->input->post('parameter2');
        $this->students_model->updateStudentFunction($param2);
        $this->session->set_flashdata('flash_message', 'Student Profile Updated Successfully');
        redirect(base_url(). 'students/load_studentProfile', 'refresh');
        }

    if($param1 == 'delete'){
        $this->students_model->deleteStudentRecord($param2);
        $this->session->set_flashdata('flash_message', 'Student Deleted Successfully');
        redirect(base_url(). 'students/load_studentProfile', 'refresh');
          }
      }

    function get_studentRecord($param1) {
        $this->login_model->activeStatus();
        if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');

        $data = $this->students_model->fetch_studentRecord($param1);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        }

    function get_pinInfo($param1) {
        $this->login_model->activeStatus();
        if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');

        $data = $this->students_model->fetch_pinInfo($param1);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        }










}
