<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


	class Login extends CI_Controller {
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

				public function index(){
					$this->load->view('backend/login');	
					}

				function cbt() {
					$this->load->view('backend/login_trainee');
					}


				function check_login() {
					$this->login_model->loginCheck();
					$this->session->set_flashdata('flash_message', 'Login Successful');
					redirect(base_url() . 'login/dashboard', 'refresh');
					}

				function dashboard() {
					$this->login_model->activeStatus();
					if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
					$page_data['page_name'] = 'dashboard';
					$page_data['page_title'] =  'Dashboard';
					$this->load->view('backend/index', $page_data);
					}

					function logout(){
					$this->session->sess_destroy();
					redirect(base_url(), 'refresh');
					}

					function user_changePassword() {
					$this->login_model->userChangePassFunction();
					$this->session->sess_destroy();
					$this->session->set_flashdata('flash_message', 'Login with your new password.');
					$this->load->view('backend/login');
					}

					public function recovery(){
					$this->load->view('backend/recovery');
					}

					public function check_recovery(){
					$this->login_model->recoveryCheckFunction();
					$this->session->set_flashdata('flash_message', 'Sent! Check your mail to complete action.');
					$this->load->view('backend/login');
					}

					function check_token() {
					$this->login_model->recoveryTokenFunction();
					redirect(base_url() . 'login', 'refresh');
					}


				public function new_pass() {
				//destroy session if the user is already logged in to be on a clean slate
				if($this->session->userdata('login_status') == 1){
				$this->session->sess_destroy();
				}
				$this->load->view('backend/newpass');
				}


				function change_pass() {
				$this->login_model->changePassFunction();
				$this->session->set_flashdata('flash_message', 'Successful! Login with your new password.');
				redirect(base_url() . 'login', 'refresh');
				}

			function login_trainee() {
				$this->login_model->activeStatus();
				if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
				$page_data['page_name'] = 'dashboard';
				$page_data['page_title'] =  'Dashboard';
				$this->load->view('backend/index', $page_data);
				}

			function cbt_check_login() {
				$this->login_model->cbtLoginCheck();
				$this->session->set_flashdata('flash_message', 'Login Successful');
				$page_data['page_title'] =  'Welcome';
				$this->load->view('frontend/welcome', $page_data);
				}


	
	

	}
