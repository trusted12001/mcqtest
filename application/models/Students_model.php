<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Students_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }



    function select_students(){
      $this->db->select('*');
      $this->db->from('student_profile_tbl');
      $this->db->where('sp_profile_date BETWEEN DATE_SUB(NOW(), INTERVAL 180 DAY) AND NOW()');
      $this->db->order_by('student_profiletbl_id', 'desc');
      $query = $this->db->get()->result_array();
    return $query;
  }

    function select_studentPin(){
      $this->db->select('*');
      $this->db->from('student_profile_tbl');
      $this->db->join('exam_pin_tbl', 'ept_sp_id = student_profiletbl_id');
      $this->db->join('exam_setup_tbl', 'ept_est_id = est_id');
      $this->db->where('sp_profile_date BETWEEN DATE_SUB(NOW(), INTERVAL 180 DAY) AND NOW()');
      $this->db->order_by('student_profiletbl_id', 'desc');
      $query = $this->db->get()->result_array();
    return $query;
  }

  function deleteStudentRecord($param2){
      $this->db->where('student_profiletbl_id', $param2);
      $this->db->delete('student_profile_tbl');

      //After passing the check, log Activity
      $data_log['action_performed'] = 'Student Profile Deleted';
      $data_log['action_by'] = $this->session->userdata('email');
      $this->db->insert('activity_log', $data_log);
      }

  function newStudentFunction(){
        $query = $this->db->get_where('student_profile_tbl', array('sp_form_no'=>$this->input->post('form_no')));
        if ($query->num_rows() > 0) {
          $this->session->set_flashdata('error_message', 'The form number has already been used, verify and try later!');
          redirect(base_url(). 'students/load_studentProfile', 'refresh');
        } else {

        $data['sp_first_name'] = strtoupper($this->input->post('firstname'));
        $data['sp_surname'] = strtoupper($this->input->post('surname'));
        $data['sp_othername'] = strtoupper($this->input->post('othername'));
        $data['sp_form_no'] = $this->input->post('form_no');
        $data['sp_phone'] = $this->input->post('phone');
        $data['sp_profile_date'] = date('Y-m-d');
        $data['sp_added_by'] = $this->session->userdata('username');
        $this->db->insert('student_profile_tbl', $data);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Created New Student Profile';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Create Successfully';
        $this->db->insert('activity_log', $data_log);
          }
        }


  function newProfile_and_pin(){
        $query = $this->db->get_where('student_profile_tbl', array('sp_phone'=>$this->input->post('phone')));
        if ($query->num_rows() > 0) {
          $this->session->set_flashdata('error_message', 'The phone number has already been used, verify and try later!');
          redirect(base_url(). 'students/load_studentProfile', 'refresh');
        } else {

        $data['sp_first_name'] = strtoupper($this->input->post('firstname'));
        $data['sp_surname'] = strtoupper($this->input->post('surname'));
        $data['sp_othername'] = strtoupper($this->input->post('othername'));
        $data['sp_form_no'] = $this->input->post('form_no');
        $data['sp_phone'] = $this->input->post('phone');
        $data['sp_profile_date'] = date('Y-m-d');
        $data['sp_added_by'] = $this->session->userdata('username');
        $this->db->insert('student_profile_tbl', $data);

        //Random number generator
        $partOne =  substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
        $partTwo =  substr(str_shuffle("0123456789"), 0, 3);
        $partThree =  date('d');
        $pin_number = $partOne.$partThree.$partTwo;

        //expiry time variable
        $expiry_time = date('Y-m-d', strtotime('+7 day', time()));

        $data_2['ept_pin_no'] = $pin_number;
        $data_2['ept_est_id'] = $this->input->post('exam_type');
        $data_2['ept_sp_id'] = $this->db->insert_id();
        $data_2['ept_added_by'] = $this->session->userdata('username');
        $data_2['ept_expiry_date'] = $expiry_time;
        $this->db->insert('exam_pin_tbl', $data_2);



        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Created New Student Profile and PIN';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Create Successfully';
        $this->db->insert('activity_log', $data_log);
          }
        }

  function new_pin(){

        //Random number generator
        $partOne =  substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
        $partTwo =  substr(str_shuffle("0123456789"), 0, 3);
        $partThree =  date('d');
        $pin_number = $partOne.$partThree.$partTwo;

        //expiry time variable
        $expiry_time = date('Y-m-d', strtotime('+7 day', time()));

        $data_2['ept_pin_no'] = $pin_number;
        $data_2['ept_est_id'] = $this->input->post('exam_type');
        $data_2['ept_sp_id'] = $this->input->post('std_id_for_pin');
        $data_2['ept_added_by'] = $this->session->userdata('username');
        $data_2['ept_expiry_date'] = $expiry_time;
        $this->db->insert('exam_pin_tbl', $data_2);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Created New PIN';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Create Successfully';
        $this->db->insert('activity_log', $data_log);
        }


  function updateStudentFunction($param2){
        $data['sp_first_name'] = strtoupper($this->input->post('firstname'));
        $data['sp_surname'] = strtoupper($this->input->post('surname'));
        $data['sp_othername'] = strtoupper($this->input->post('othername'));
        $data['sp_form_no'] = $this->input->post('form_no');
        $data['sp_phone'] = $this->input->post('phone');
        $data['sp_added_by'] = $this->session->userdata('username');

        $this->db->where('student_profiletbl_id', $param2);
        $this->db->update('student_profile_tbl', $data);

        //After passing insertion, log Activity
        $data_log['action_performed'] = 'Updated Student Profile';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Updated Successfully';
        $this->db->insert('activity_log', $data_log);

      }


      function fetch_studentRecord($param1){
        $this->db->select('*');
        $this->db->from('student_profile_tbl');
        $this->db->where('student_profiletbl_id', $param1);
        $query = $this->db->get()->row_array();
      return $query;
    }


      function fetch_pinInfo($param1){
        $this->db->select('*');
        $this->db->from('student_profile_tbl');
        $this->db->join('exam_pin_tbl', 'ept_sp_id = student_profiletbl_id');
        $this->db->join('exam_setup_tbl', 'ept_est_id = est_id');
        $this->db->where('ept_id', $param1);
        $query = $this->db->get()->row_array();
      return $query;
      }


      function select_student_info($param1){
        $this->db->select('*');
        $this->db->from('student_profile_tbl');
        $this->db->where('student_profiletbl_id', $param1);
        $query = $this->db->get()->row_array();
      return $query;
      }



  }
