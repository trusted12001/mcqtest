<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Settings_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    function fetch_companyRecord($param1){
      $this->db->select('*');
      $this->db->from('sch_info_tbl');
      $this->db->where('sch_info_id', $param1);
      $query = $this->db->get()->row_array();
    return $query;
  }


    function fetch_packageRecord($param1){
      $this->db->select('*');
      $this->db->from('product_packages_tbl');
      $this->db->where('product_packagestbl_id', $param1);
      $query = $this->db->get()->row_array();
    return $query;
  }


    function fetch_vehicleRecord($param1){
      $this->db->select('*');
      $this->db->from('vehicle_tbl');
      $this->db->where('vehicle_tbl_id', $param1);
      $query = $this->db->get()->row_array();
    return $query;
  }


    function fetch_staffRecord($param1){
      $this->db->select('*');
      $this->db->from('staff_profile_tbl');
      $this->db->where('staff_profiletbl_id', $param1);
      $query = $this->db->get()->row_array();
    return $query;
  }


    function fetch_Packages(){
      $this->db->select('*');
      $this->db->from('product_packages_tbl');
      $query = $this->db->get()->result_array();
    return $query;
  }


    function fetch_PackagePrice($param1){
      $this->db->select('*');
      $this->db->from('product_packages_tbl');
      $this->db->where('product_packagestbl_id', $param1);
      $query = $this->db->get()->row_array();
    return $query;
  }


    function select_company(){
      $this->db->select('*');
      $this->db->from('sch_info_tbl');
      $query = $this->db->get()->row_array();
    return $query;
  }

    function select_packages(){
      $this->db->select('*');
      $this->db->from('product_packages_tbl');
      $query = $this->db->get()->result_array();
    return $query;
  }

    function select_staffProfile(){
      $this->db->select('*');
      $this->db->from('staff_profile_tbl');
      $query = $this->db->get()->result_array();
    return $query;
  }

    function select_theme(){
      $this->db->select('*');
      $this->db->from('theme_tbl');
      $this->db->where('theme_tbl_id', '1');
      $query = $this->db->get()->row_array();
    return $query;
  }

    function select_vehicles(){
      $this->db->select('*');
      $this->db->from('vehicle_tbl');
      $this->db->order_by('vehicle_tbl_id', 'desc');
      $query = $this->db->get()->result_array();
    return $query;
  }


  function newPackageFunction(){
        $data['pp_training_required'] = $this->input->post('trainingLogRequired');
        $data['pp_name'] = $this->input->post('package');
        $data['pp_price'] = $this->input->post('price');
        $data['pp_duration'] = $this->input->post('duration');
        $data['pp_added_by'] = $this->session->userdata('username');
        $this->db->insert('product_packages_tbl', $data);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Added New Package';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Successfully Added';
        $this->db->insert('activity_log', $data_log);
      }


  function newVehicleFunction(){
        $data['v_make'] = strtoupper($this->input->post('make'));
        $data['v_model'] = strtoupper($this->input->post('model'));
        $data['v_reg_no'] = strtoupper($this->input->post('plate_number'));
        $data['v_traffik_number'] = $this->input->post('traffik_number');
        $data['v_status'] = "Available";
        $data['v_acquired_date'] = $this->input->post('date_purchased');
        $data['v_added_by'] = $this->session->userdata('username');
        $this->db->insert('vehicle_tbl', $data);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Added New Vehicle';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Successfully Added';
        $this->db->insert('activity_log', $data_log);
      }


  function newStaffFunction(){
        $data['s_prof_employee_id'] = $this->input->post('stff_emp_id');
        $data['s_prof_first_name'] = strtoupper($this->input->post('stff_first_name'));
        $data['s_prof_surname'] = strtoupper($this->input->post('stff_surname'));
        $data['s_prof_othername'] = strtoupper($this->input->post('stff_othername'));
        $data['s_prof_staff_email'] = $this->input->post('stff_email');
        $data['s_prof_phone'] = $this->input->post('stff_phone');
        $data['s_prof_address'] = $this->input->post('stff_address');
        $data['s_prof_dept'] = $this->input->post('stff_dept');
        $data['s_prof_hire_date'] = $this->input->post('stff_hire_date');
        $data['s_prof_bank'] = strtoupper($this->input->post('stff_bank_name'));
        $data['s_prof_account_name'] = strtoupper($this->input->post('stff_account_name'));
        $data['s_prof_account_number'] = $this->input->post('stff_account_number');
        $data['s_prof_salary'] = $this->input->post('stff_salary');
        $data['s_prof_nok_name'] = strtoupper($this->input->post('stff_nok_name'));
        $data['s_prof_nok_address'] = strtoupper($this->input->post('stff_nok_address'));
        $data['s_prof_nok_phone'] = $this->input->post('stff_nok_phone');
        $data['s_prof_nok_relationship'] = strtoupper($this->input->post('stff_nok_relationship'));
        $data['s_prof_status'] = "Available";
        $data['s_prof_added_by'] = $this->session->userdata('username');
        $this->db->insert('staff_profile_tbl', $data);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Added New Staff Profile';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Successfully Added New Profile';
        $this->db->insert('activity_log', $data_log);
      }


  function updateStaffFunction($param2){
        $data['s_prof_employee_id'] = $this->input->post('stff_emp_id');
        $data['s_prof_first_name'] = strtoupper($this->input->post('stff_first_name'));
        $data['s_prof_surname'] = strtoupper($this->input->post('stff_surname'));
        $data['s_prof_othername'] = strtoupper($this->input->post('stff_othername'));
        $data['s_prof_staff_email'] = $this->input->post('stff_email');
        $data['s_prof_phone'] = $this->input->post('stff_phone');
        $data['s_prof_address'] = $this->input->post('stff_address');
        $data['s_prof_dept'] = $this->input->post('stff_dept');
        $data['s_prof_hire_date'] = $this->input->post('stff_hire_date');
        $data['s_prof_bank'] = strtoupper($this->input->post('stff_bank_name'));
        $data['s_prof_account_name'] = strtoupper($this->input->post('stff_account_name'));
        $data['s_prof_account_number'] = $this->input->post('stff_account_number');
        $data['s_prof_salary'] = $this->input->post('stff_salary');
        $data['s_prof_nok_name'] = strtoupper($this->input->post('stff_nok_name'));
        $data['s_prof_nok_address'] = strtoupper($this->input->post('stff_nok_address'));
        $data['s_prof_nok_phone'] = $this->input->post('stff_nok_phone');
        $data['s_prof_nok_relationship'] = strtoupper($this->input->post('stff_nok_relationship'));
        $data['s_prof_added_by'] = $this->session->userdata('username');

        $this->db->where('staff_profiletbl_id', $param2);
        $this->db->update('staff_profile_tbl', $data);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Added New Staff Profile';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Successfully Added New Profile';
        $this->db->insert('activity_log', $data_log);
      }


  function updatePackageFunction($param2){
        $data['pp_training_required'] = $this->input->post('trainingLogRequired');
        $data['pp_name'] = $this->input->post('package');
        $data['pp_price'] = $this->input->post('price');
        $data['pp_duration'] = $this->input->post('duration');
        $data['pp_added_by'] = $this->session->userdata('username');

        $this->db->where('product_packagestbl_id', $param2);
        $this->db->update('product_packages_tbl', $data);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Updated Package';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Successfully Updated';
        $this->db->insert('activity_log', $data_log);
      }


      function updateCompanyFunction($param2){
            $config['upload_path']   = 'user_uploaded_img/settings/'; 
            $config['allowed_types'] = 'png|jpg'; 
            $config['max_size']      = 120; 
            $config['max_width']     = 400; 
            $config['max_height']    = 400;  
            $this->load->library('upload', $config);
         
            if ( ! $this->upload->do_upload('logo')) {
               $error = array('error' => $this->upload->display_errors());
               $this->session->set_flashdata('error_message', $error['error']);
            }else { 
            $upload_data = array('upload_data' => $this->upload->data()); 
            $data['sch_name'] = $this->input->post('company_name');
            $data['sch_house_num'] = $this->input->post('plot_number');
            $data['sch_street_name'] = $this->input->post('street');
            $data['sch_local_govt'] = $this->input->post('lga');
            $data['sch_state'] = $this->input->post('state');
            $data['sch_website'] = $this->input->post('website');
            $data['sch_email'] = $this->input->post('email');
            $data['sch_phone1'] = $this->input->post('phone1');
            $data['sch_phone2'] = $this->input->post('phone2');
            $data['sch_phone3'] = $this->input->post('phone3');
            $data['sch_logo'] = $upload_data['upload_data']['file_name'];
            $data['sch_added_by'] = $this->session->userdata('username');
            $this->db->where('sch_info_id', $param2);
            $this->db->update('sch_info_tbl', $data); 
           
            //After passing insertion, log Activity
            $data_log['action_performed'] = 'Updated Institution Information';
            $data_log['action_by'] = $this->session->userdata('username');
            $data_log['action_status'] = 'Updated Successfully';
            $this->db->insert('activity_log', $data_log);
            } 
            
          }


      function updateVehicleFunction($param2){
            $data['v_make'] = strtoupper($this->input->post('make'));
            $data['v_model'] = strtoupper($this->input->post('model'));
            $data['v_reg_no'] = strtoupper($this->input->post('plate_number'));
            $data['v_traffik_number'] = $this->input->post('traffik_number');
            $data['v_acquired_date'] = $this->input->post('date_purchased');
            $data['v_added_by'] = $this->session->userdata('username');

            $this->db->where('vehicle_tbl_id', $param2);
            $this->db->update('vehicle_tbl', $data);

            //After passing insertion, log Activity
            $data_log['action_performed'] = 'Updated Vehicle Information';
            $data_log['action_by'] = $this->session->userdata('username');
            $data_log['action_status'] = 'Successfully Updated';
            $this->db->insert('activity_log', $data_log);
          }


    function updateThemeFunction($param2){
          $data['t_title'] = $param2;
          $data['t_modified_by'] = $this->session->userdata('username');

          $this->db->where('theme_tbl_id', '1');
          $this->db->update('theme_tbl', $data);

          //After passing insertion, log Activity
          $data_log['action_performed'] = 'Changed Theme';
          $data_log['action_by'] = $this->session->userdata('username');
          $data_log['action_status'] = 'Successfully Changed';
          $this->db->insert('activity_log', $data_log);
        }


    function deletePackageFunction($param2){
          $this->db->where('product_packagestbl_id', $param2);
          $this->db->delete('product_packages_tbl');

          //After passing insertion, log Activity
          $data_log['action_performed'] = 'Deleted Package';
          $data_log['action_by'] = $this->session->userdata('username');
          $data_log['action_status'] = 'Successfully Deleted';
          $this->db->insert('activity_log', $data_log);
        }

        function deactivateVehicleFunction($param2,$param3){
          switch ($param3) {
              case "Available":
              if ($this->session->access_level == '1') {
                $param3 = "Deactivated";
                break;
              }else {
                $this->session->set_flashdata('error_message', 'Contact your Admin Officer for this action');
                redirect(base_url(). 'login/dashboard', 'refresh');
              }

              case "Deactivated":
              if ($this->session->access_level == '1') {
                $param3 = "Available";
              } else {
                $this->session->set_flashdata('error_message', 'Contact your Admin Officer for this action');
                redirect(base_url(). 'login/dashboard', 'refresh');
              }
            }
            $data['v_status'] = $param3;
            $this->db->where('vehicle_tbl_id', $param2);
            $this->db->update('vehicle_tbl', $data);

            //After passing the check, log Activity
            $data_log['action_performed'] = 'Vehicle Status Changed';
            $data_log['action_by'] = $this->session->userdata('email');
            $data_log['action_status'] = 'Changed to =>' .$param3;
            $this->db->insert('activity_log', $data_log);
                }


        function deactivateStaffFunction($param2,$param3){
          switch ($param3) {
              case "Available":
              if ($this->session->access_level == '1') {
                $param3 = "Deactivated";
                break;
              }else {
                $this->session->set_flashdata('error_message', 'Contact your Admin Officer for this action');
                redirect(base_url(). 'login/dashboard', 'refresh');
              }

              case "Deactivated":
              if ($this->session->access_level == '1') {
                $param3 = "Available";
              } else {
                $this->session->set_flashdata('error_message', 'Contact your Admin Officer for this action');
                redirect(base_url(). 'login/dashboard', 'refresh');
              }
            }
            $data['s_prof_status'] = $param3;
            $this->db->where('staff_profiletbl_id', $param2);
            $this->db->update('staff_profile_tbl', $data);

            //After passing the check, log Activity
            $data_log['action_performed'] = 'Staff Profile Status Changed';
            $data_log['action_by'] = $this->session->userdata('email');
            $data_log['action_status'] = 'Changed to =>' .$param3;
            $this->db->insert('activity_log', $data_log);
                }

                function select_exams(){
                  $this->db->select('*');
                  $this->db->from('exam_setup_tbl');
                  $this->db->order_by('est_id', 'desc');
                  $query = $this->db->get()->result_array();
              return $query;
              }
      


  }
