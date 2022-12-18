<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


      function newUserFunction(){
        $query = $this->db->get_where('user_profile_tbl', array('up_email'=>$this->input->post('email'),));
        if ($query->num_rows() > 0) {
          $this->session->set_flashdata('error_message', 'Email already exist on this system, verify and try later!');
          redirect(base_url(). 'users/load_userProfile', 'refresh');
        }

        $query = $this->db->get_where('user_profile_tbl', array('up_username'=>$this->input->post('username'),));
        if ($query->num_rows() > 0) {
          $this->session->set_flashdata('error_message', 'Username already exist on this system, verify and try later!');
          redirect(base_url(). 'users/load_userProfile', 'refresh');
        } else {

        $data['up_first_name'] = strtoupper($this->input->post('firstname'));
        $data['up_surname'] = strtoupper($this->input->post('surname'));
        $data['up_othername'] = strtoupper($this->input->post('othername'));
        $data['up_password'] = md5($this->input->post('username').$this->input->post('password'));
        $data['up_gender'] = $this->input->post('gender');
        $data['up_access_level'] = $this->input->post('access_level');
        $data['up_email'] = $this->input->post('email');
        $data['up_phone'] = $this->input->post('phone');
        $data['up_username'] = $this->input->post('username');
        $data['up_nok_name'] = $this->input->post('nok');
        $data['up_nok_phone'] = $this->input->post('nok_phone');
        $data['up_relationship'] = $this->input->post('relationship');
        $data['up_home_address'] = $this->input->post('address');
        $data['up_added_by'] = $this->session->userdata('email');

        if (($this->session->access_level == '1')||($this->session->access_level == '2')) {
          $this->db->insert('user_profile_tbl', $data);
          } else {
            $this->session->set_flashdata('error_message', 'You do not have the priviledge to profile users');
            redirect(base_url(). 'users/load_userProfile', 'refresh');
          }


        //After passing the check, log Activity
        $data_log['action_performed'] = 'Created New User Account';
        $data_log['action_by'] = $this->session->userdata('email');
        $data_log['action_status'] = 'Create Successfully';
        $this->db->insert('activity_log', $data_log);

        }
      }


      function select_users(){
        $this->db->select('*');
        $this->db->from('user_profile_tbl');
          $this->db->order_by('user_profiletbl_id', 'desc');
        $query = $this->db->get()->result_array();
      return $query;
    }


    function fetch_userRecord($param1){
      $this->db->select('*');
      $this->db->from('user_profile_tbl');
      $this->db->where('user_profiletbl_id', $param1);
      $query = $this->db->get()->row_array();
    return $query;
  }


  function updateUserFunction($param2){
    if ($this->session->access_level == '1') {
        $data['up_first_name'] = strtoupper($this->input->post('firstname1'));
        $data['up_surname'] = strtoupper($this->input->post('surname'));
        $data['up_othername'] = strtoupper($this->input->post('othername'));
        //$data['up_password'] = md5($this->input->post('username').$this->input->post('password'));
        $data['up_gender'] = $this->input->post('gender');
        $data['up_access_level'] = $this->input->post('access_level');
        $data['up_email'] = $this->input->post('email');
        $data['up_phone'] = $this->input->post('phone');
        //$data['up_username'] = $this->input->post('username');
        $data['up_nok_name'] = $this->input->post('nok');
        $data['up_nok_phone'] = $this->input->post('nok_phone');
        $data['up_relationship'] = $this->input->post('relationship');
        $data['up_home_address'] = $this->input->post('address');
        $data['up_added_by'] = $this->session->userdata('email');

        $this->db->where('user_profiletbl_id', $param2);
        $this->db->update('user_profile_tbl', $data);

        //After passing the check, log Activity
        $data_log['action_performed'] = 'Updated User Information';
        $data_log['action_by'] = $this->session->userdata('email');
        $data_log['action_status'] = 'Updated Successfully';
        $this->db->insert('activity_log', $data_log);

        } else {
          $this->session->set_flashdata('error_message', 'Contact your Admin Officer for any update please');
          redirect(base_url(). 'login/dashboard', 'refresh');
        }
      }




    function updateUserStatus($param1,$param2){
        $data['up_account_status'] = $param2;
        $this->db->where('user_profiletbl_id', $param1);
        $this->db->update('user_profile_tbl', $data);

        //After passing the check, log Activity
        $data_log['action_performed'] = 'Account Changed';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Changed to =>' .$param2;
        $this->db->insert('activity_log', $data_log);
            }
















































      function newClassTeacher(){
          $credential = array('ct_section'=>$this->input->post('section_id'), 'ct_class'=>$this->input->post('class'), 'ct_division'=>$this->input->post('division'), 'ct_session'=>$this->session->userdata('current_session_session'), 'ct_term'=>$this->session->userdata('current_term_session'));
          $query = $this->db->get_where('class_teacher_tbl', $credential);
          if ($query->num_rows() > 0) {
            $this->session->set_flashdata('error_message', 'Teacher already assigned this term to the same class!');
            redirect(base_url(). 'admin/dashboard', 'refresh');
          } else {
        $data['ct_up_id'] = $this->input->post('class_teacher_id');
        $data['ct_session'] = $this->session->userdata('current_session_session');
        $data['ct_term'] = $this->session->userdata('current_term_session');
        $data['ct_section'] = $this->input->post('section_id');
        $data['ct_class'] = $this->input->post('class');
        $data['ct_division'] = $this->input->post('division');
        $data['ct_added_by'] = $this->session->userdata('email');


        if (($this->session->access_level == '1')) {
          $this->db->insert('class_teacher_tbl', $data);
          } else {
            $this->session->set_flashdata('error_message', 'You do not have the priviledge to assign teacher to a class');
            redirect(base_url(). 'admin/dashboard', 'refresh');
          }


        //After passing the check, log Activity
        $data_log['action_performed'] = 'Assigned New Class Teacher';
        $data_log['action_by'] = $this->session->userdata('email');
        $data_log['action_status'] = 'Assigned Successfully';
        $this->db->insert('activity_log', $data_log);

        }
      }



      function updateClassTeacher($param2){
        if ($this->session->access_level == '1') {

          $credential = array('ct_up_id'=>$this->input->post('class_teacher_id'), 'ct_session'=>$this->session->userdata('current_session_session'), 'ct_term'=>$this->session->userdata('current_term_session'));
          $query = $this->db->get_where('class_teacher_tbl', $credential);
          if ($query->num_rows() > 0) {
            $this->session->set_flashdata('error_message', 'Teacher already assigned this term to the same class!');
            redirect(base_url(). 'admin/dashboard', 'refresh');
          } else {
            $data['ct_up_id'] = $this->input->post('ed_class_teacher_id');
            $data['ct_section'] = $this->input->post('ed_section_id');
            $data['ct_class'] = $this->input->post('ed_class');
            $data['ct_division'] = $this->input->post('ed_division');

        $this->db->where('class_teachertbl_id', $param2);
        $this->db->update('class_teacher_tbl', $data);

        //After passing the check, log Activity
        $data_log['action_performed'] = 'Updated Class Teacher Information';
        $data_log['action_by'] = $this->session->userdata('email');
        $data_log['action_status'] = 'Updated Successfully';
        $this->db->insert('activity_log', $data_log);

        }
        } else {
          $this->session->set_flashdata('error_message', 'Contact your Admin Officer for any update');
          redirect(base_url(). 'admin/dashboard', 'refresh');
        }
      }


      function deleteUserFunction($param2){
        $this->db->where('user_profiletbl_id', $param2);
        $this->db->delete('user_profile_tbl');

        //After passing the check, log Activity
        $data_log['action_performed'] = 'Permanently Deleted User';
        $data_log['action_by'] = $this->session->userdata('email');
        $data_log['action_status'] = 'Successfully Done';
        $this->db->insert('activity_log', $data_log);
      }



      function deleteClassTeacher($param2){
        $this->db->where('class_teachertbl_id', $param2);
        $this->db->delete('class_teacher_tbl');

        //After passing the check, log Activity
        $data_log['action_performed'] = 'Permanently Deleted Class Teacher';
        $data_log['action_by'] = $this->session->userdata('email');
        $data_log['action_status'] = 'Successfully Done';
        $this->db->insert('activity_log', $data_log);
      }




      function select_teacher(){
        $this->db->select('*');
        $this->db->from('user_profile_tbl');
        $this->db->order_by('up_first_name', 'asc');
        $query = $this->db->get()->result_array();
      return $query;
    }


      function select_class_teacher(){
        $this->db->select('*');
        $this->db->from('class_teacher_tbl');
        $this->db->join('user_profile_tbl', 'user_profiletbl_id = ct_up_id');
        $this->db->join('section_tbl', 'sectiontbl_id = ct_section');
        $query = $this->db->get()->result_array();
      return $query;
    }


      function modal_user_details($param2){
        $this->db->select('*');
        $this->db->from('user_profile_tbl');
        $this->db->where('user_profiletbl_id', $param2);
        $query = $this->db->get()->result_array();
      return $query;
    }

      function modal_user_edits($param2){
        $this->db->select('*');
        $this->db->from('user_profile_tbl');
        $this->db->where('user_profiletbl_id', $param2);
        $query = $this->db->get()->result_array();
      return $query;
    }

    function modal_class_teacher_edits($param2){
      $this->db->select('*');
      $this->db->from('class_teacher_tbl');
      $this->db->join('user_profile_tbl', 'user_profiletbl_id = ct_up_id');
      $this->db->join('section_tbl', 'sectiontbl_id = ct_section');
      $this->db->where('class_teachertbl_id', $param2);
      $query = $this->db->get()->result_array();
    return $query;
  }

  function select_staff_by_units($parameter){
    $credential = array('up_unit_id' => $parameter);
      $this->db->select('*');
      $this->db->from('user_profile_tbl');
      $this->db->where($credential);
      $query = count($this->db->get()->result_array());
  return $query;
  }


  function select_count_staff(){
      $this->db->select('*');
      $this->db->from('user_profile_tbl');
      $query = count($this->db->get()->result_array());
  return $query;
  }





  }
