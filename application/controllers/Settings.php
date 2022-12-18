<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->model('users_model');
        $this->load->model('login_model');
        $this->load->model('students_model');
        $this->load->model('settings_model');
        $this->load->model('exams_model');
        $this->load->helper(array('form', 'url')); 
        }


    function load_setupCompany() {
        $this->login_model->activeStatus();
		    if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
		    $page_data['page_name'] = 'manage_company';
		    $page_data['page_title'] =  'Setup Institution';
		    $this->load->view('backend/index', $page_data);
		    }


    function load_setupPackages() {
        $this->login_model->activeStatus();
		    if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
		    $page_data['page_name'] = 'manage_packages';
		    $page_data['page_title'] =  'Manage Packages';
		    $this->load->view('backend/index', $page_data);
		    }


    function load_setupVehicles() {
        $this->login_model->activeStatus();
		    if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
		    $page_data['page_name'] = 'manage_vehicles';
		    $page_data['page_title'] =  'Manage Vehicles';
		    $this->load->view('backend/index', $page_data);
		    }


    function load_setupStaffProfile() {
        $this->login_model->activeStatus();
		    if($this->session->userdata('login_status') != 1) redirect(base_url(), 'refresh');
		    $page_data['page_name'] = 'manage_staff';
		    $page_data['page_title'] =  'Manage Staff Profile';
		    $this->load->view('backend/index', $page_data);
		    }


    function get_companyRecord($param1) {
        $this->login_model->activeStatus();
        if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');

        $data = $this->settings_model->fetch_companyRecord($param1);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        }


    function get_packageRecord($param1) {
        $this->login_model->activeStatus();
        if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');

        $data = $this->settings_model->fetch_packageRecord($param1);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        }


    function get_vehicleRecord($param1) {
        $this->login_model->activeStatus();
        if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');

        $data = $this->settings_model->fetch_vehicleRecord($param1);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        }


    function get_staffRecord($param1) {
        $this->login_model->activeStatus();
        if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');

        $data = $this->settings_model->fetch_staffRecord($param1);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        }


    function get_packagePrice($param1) {
        $this->login_model->activeStatus();
        if($this->session->userdata('login_status') != 1) redirect(base_url(). 'login', 'refresh');

        $data = $this->settings_model->fetch_PackagePrice($param1);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        }


    function manage_company($param1 = null, $param2 = null, $param3 = null){
      $this->login_model->activeStatus();

    if($param1 == 'update'){
        $param2 = $this->input->post('parameter2');
        $this->settings_model->updateCompanyFunction($param2);
        if(isset($_SESSION['error_message'])){

        }else{
            $this->session->set_flashdata('flash_message', 'Company Information Updated Successfully');
        }
        redirect(base_url(). 'settings/load_setupCompany', 'refresh');
        }

    if($param1 == 'newPackage'){
        $this->settings_model->newPackageFunction();
        $this->session->set_flashdata('flash_message', 'Package Successfully Added');
        redirect(base_url(). 'settings/load_setupPackages', 'refresh');
        }

    if($param1 == 'updateProduct'){
        $param2 = $this->input->post('parameter2');
        $this->settings_model->updatePackageFunction($param2);
        $this->session->set_flashdata('flash_message', 'Package Updated Successfully');
        redirect(base_url(). 'settings/load_setupPackages', 'refresh');
        }

    if($param1 == 'updateVehicle'){
        $param2 = $this->input->post('parameter2');
        $this->settings_model->updateVehicleFunction($param2);
        $this->session->set_flashdata('flash_message', 'Vehicle Updated Successfully');
        redirect(base_url(). 'settings/load_setupVehicles', 'refresh');
        }

    if($param1 == 'deletePackage'){
        $this->settings_model->deletePackageFunction($param2);
        $this->session->set_flashdata('flash_message', 'Package Deleted Successfully');
        redirect(base_url(). 'settings/load_setupPackages', 'refresh');
        }

    if($param1 == 'themeManage'){
        $param2 = $this->input->post('theme_title');
        $this->settings_model->updateThemeFunction($param2);
        $this->session->set_flashdata('flash_message', 'Theme Updated Successfully');
        redirect(base_url(). 'login/dashboard', 'refresh');
        }

    if($param1 == 'newVehicle'){
        $this->settings_model->newVehicleFunction();
        $this->session->set_flashdata('flash_message', 'Vehicle Successfully Added');
        redirect(base_url(). 'settings/load_setupVehicles', 'refresh');
        }

    if($param1 == 'deactivateVehicle'){
        $this->settings_model->deactivateVehicleFunction($param2,$param3);
        $this->session->set_flashdata('flash_message', 'Vehicle Successfully Deactivated');
        redirect(base_url(). 'settings/load_setupVehicles', 'refresh');
        }

    if($param1 == 'newstaff'){
        $this->settings_model->newStaffFunction();
        $this->session->set_flashdata('flash_message', 'Staff Successfully Profiled');
        redirect(base_url(). 'settings/load_setupStaffProfile', 'refresh');
        }

    if($param1 == 'deactivateStaff'){
        $this->settings_model->deactivateStaffFunction($param2,$param3);
        $this->session->set_flashdata('flash_message', 'Staff Successfully Deactivated');
        redirect(base_url(). 'settings/load_setupStaffProfile', 'refresh');
        }

    if($param1 == 'updateStaff'){
        $param2 = $this->input->post('parameter2');
        $this->settings_model->updateStaffFunction($param2);
        $this->session->set_flashdata('flash_message', 'Staff Profile Updated Successfully');
        redirect(base_url(). 'settings/load_setupStaffProfile', 'refresh');
        }





      }



}
