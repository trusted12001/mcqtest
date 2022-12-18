<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Exams_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

      function newExamFunction(){
        $query = $this->db->get_where('exam_setup_tbl', array('est_course_title'=>$this->input->post('course_title')));
        if ($query->num_rows() > 0) {
          $this->session->set_flashdata('error_message', 'Course Title already exist on this system, verify and try later!');
          redirect(base_url(). 'exams/load_examManage', 'refresh');
        } else {

            $data['est_course_title'] = strtoupper($this->input->post('course_title'));
            $data['est_course_level'] = strtoupper($this->input->post('level'));
            $data['est_no_of_question'] = $this->input->post('no_of_question');
            $data['est_duration'] = $this->input->post('duration');
            $data['est_pass_mark'] = $this->input->post('pass_mark');
            $data['est_instruction'] = $this->input->post('instruction');
            $data['est_review_status'] = $this->input->post('review_option');
            $data['est_added_by'] = $this->session->userdata('username');
      
        if (($this->session->access_level == '1')||($this->session->access_level == '2')) {
          $this->db->insert('exam_setup_tbl', $data);
          } else {
            $this->session->set_flashdata('error_message', 'You do not have the priviledge to create exams');
            redirect(base_url(). 'exams/load_examManage', 'refresh');
          }

        //After passing the check, log Activity
        $data_log['action_performed'] = 'Created New Exam';
        $data_log['action_by'] = $this->session->userdata('username');
        $data_log['action_status'] = 'Create Successfully';
        $this->db->insert('activity_log', $data_log);

        }
      }


        function select_exams(){
            $this->db->select('*');
            $this->db->from('exam_setup_tbl');
            $this->db->order_by('est_id', 'desc');
            $query = $this->db->get()->result_array();
        return $query;
        }

        
        function fetch_examRecord($param1){
            $this->db->select('*');
            $this->db->from('exam_setup_tbl');
            $this->db->where('est_id', $param1);
            $query = $this->db->get()->row_array();
        return $query;
        }
    
        function fetch_questionRecord($param1){
            $this->db->select('*');
            $this->db->from('question_bank_tbl');
            $this->db->where('qbt_id', $param1);
            $query = $this->db->get()->row_array();
        return $query;
        }
    
        function updateExamFunction($param2){
        if (($this->session->access_level == '1')||($this->session->access_level == '2')) {
            $data['est_course_title'] = strtoupper($this->input->post('course_title'));
            $data['est_course_level'] = strtoupper($this->input->post('level'));
            $data['est_no_of_question'] = $this->input->post('no_of_question');
            $data['est_duration'] = $this->input->post('duration');
            $data['est_pass_mark'] = $this->input->post('pass_mark');
            $data['est_instruction'] = $this->input->post('instruction');
            $data['est_review_status'] = $this->input->post('review_option');
            $data['est_added_by'] = $this->session->userdata('username');

            $this->db->where('est_id', $param2);
            $this->db->update('exam_setup_tbl', $data);

            //After passing the check, log Activity
            $data_log['action_performed'] = 'Updated Exam Information';
            $data_log['action_by'] = $this->session->userdata('username');
            $data_log['action_status'] = 'Updated Successfully';
            $this->db->insert('activity_log', $data_log);

            } else {
                $this->session->set_flashdata('error_message', 'Contact your Admin Officer for any update please');
                redirect(base_url(). 'exams/load_examManage', 'refresh');
            }
            }


    function deleteExam($param2){
      $query = $this->db->get_where('question_bank_tbl', array('qbt_est_id'=>$param2));
        if ($query->num_rows() > 0) {
          $this->session->set_flashdata('error_message', 'You need to delete all questions under this exam before you can proceed!');
          redirect(base_url(). 'exams/load_examManage', 'refresh');
        } else {
        if($this->session->access_level == '1'){
        $this->db->where('est_id', $param2);
        $this->db->delete('exam_setup_tbl');

        //After passing the check, log Activity
        $data_log['action_performed'] = 'Account Deleted';
        $data_log['action_by'] = $this->session->userdata('username');
        $this->db->insert('activity_log', $data_log);
        }
      }
    }

    function select_q($exam_id, $num_of_questions){
      $this->db->select('*');
      $this->db->from('question_bank_tbl');
      $this->db->join('exam_setup_tbl', 'est_id = qbt_est_id');
      $this->db->where('qbt_est_id',$exam_id);
      $this->db->where('est_no_of_question',$num_of_questions);
      $this->db->limit($num_of_questions);
      $this->db->order_by('qbt_id', 'RANDOM');
      $query = $this->db->get()->result_array();
  return $query;
  }

    function display_q($exam_id){
      $this->db->select('*');
      $this->db->from('question_bank_tbl');
      $this->db->join('exam_setup_tbl', 'est_id = qbt_est_id');
      $this->db->where('qbt_est_id',$exam_id);
      $this->db->order_by('qbt_id', 'DESC');
      $query = $this->db->get()->result_array();
  return $query;
  }

    function select_est($param1){
      $this->db->select('*');
      $this->db->from('exam_setup_tbl');
      $this->db->where('est_id',$param1);
      $query = $this->db->get()->row_array();
  return $query;
  }


        function newQuestionFunction($param2){
          if (($this->session->access_level == '1')||($this->session->access_level == '2')) {
            } else {
              $this->session->set_flashdata('error_message', 'You do not have the priviledge to add questions');
              redirect(base_url(). 'exams/load_queueQuestion2/'.$param2, 'refresh');
            }
          $config['upload_path']   = 'user_uploaded_img/question/'; 
          $config['allowed_types'] = 'png|jpg'; 
          $config['max_size']      = 120; 
          $config['max_width']     = 160; 
          $config['max_height']    = 160;

          //Custom Object q_image for quention Image
          $this->load->library('upload', $config, 'q_image');
          $this->q_image->initialize($config);

          if (!empty($_FILES['question_image']['tmp_name'])) {
            $this->q_image->do_upload('question_image');
          }
          

          $data['qbt_est_id'] = $param2;
          $data['qbt_question'] = $this->input->post('question');
          $data['qbt_option_a'] = $this->input->post('option_a');
          $data['qbt_option_b'] = $this->input->post('option_b');
          $data['qbt_option_c'] = $this->input->post('option_c');
          $data['qbt_option_d'] = $this->input->post('option_d');
          
          
            $qImage_data = array('upload_data' => $this->q_image->data());
            
            $data['qbt_question_image'] = $qImage_data['upload_data']['file_name'];
            $data['qbt_correct_ans'] = $this->input->post('correct_ans');
            $data['qbt_added_by'] = $this->session->userdata('username'); 

                $this->db->insert('question_bank_tbl', $data);
  

          $error['error_q'] = array('error_q' => $this->q_image->display_errors());
          if (!empty($error['error_q']['error_q'])) {
            $error = $error['error_q']['error_q'];
            $this->session->set_flashdata('error_message', $error);
          }
    
      //After passing the check, log Activity
      $data_log['action_performed'] = 'Added New Question';
      $data_log['action_by'] = $this->session->userdata('username');
      $data_log['action_status'] = 'Added Successfully';
      $this->db->insert('activity_log', $data_log);
  }


  function deleteQuestion($param2, $param3){
      if($this->session->access_level == '1'){
      $this->db->where('qbt_id', $param2);
      $this->db->delete('question_bank_tbl');

      //After passing the check, log Activity
      $data_log['action_performed'] = 'Question Deleted';
      $data_log['action_by'] = $this->session->userdata('username');
      $this->db->insert('activity_log', $data_log);
      }else{
        $this->session->set_flashdata('error_message', 'You do not have the privillege to delete a question!');
        redirect(base_url(). 'exams/load_queueQuestion2/'.$param3, 'refresh');
      }
  }


  function saveCbtSubmit(){
    $select_options_vs_qid_arr = $this->input->post('stp_1_select_option');
    $std_id = $this->input->post('std_id');
    $exam_id = $this->input->post('exam_id');
    $correct = $_SESSION['ans_arr'];

    //number of element in the array
    $arrayCount = count($select_options_vs_qid_arr);
        
      //Check for duplicate attempted questions and delete
        $this->db->where('st_student_profile_id', $this->input->post('std_id'));
        $this->db->where('st_est_id', $exam_id);
        $this->db->delete('score_tbl');
    
    //loop through array
    for ($i=0; $i < $arrayCount; $i++) { 
        $piece = explode('-', $select_options_vs_qid_arr[$i]);
        $current_qid = $piece[0];
        $current_opt = $piece[1];
        $correct_ans = $correct[$i];


        $data['st_student_profile_id'] = strtoupper($this->input->post('std_id'));
        $data['st_est_id'] = strtoupper($this->input->post('exam_id'));
        $data['st_qbt_id'] = $current_qid;
        $data['st_choice'] = $current_opt;
        $data['st_correct_ans'] = $correct_ans;

        $this->db->insert('score_tbl', $data);
    }
    
      //After insertion, log Activity
      $data_log['action_performed'] = 'Scores inserted';
      $data_log['action_by'] = $this->input->post('exam_id');
      $this->db->insert('activity_log', $data_log);
  }


  function get_score($param1, $param2){
    $this->db->select('*');
    $this->db->from('score_tbl');
    $this->db->where('st_student_profile_id',$param1);
    $this->db->where('st_est_id',$param2);
    $query = $this->db->get()->result_array();
return $query;
}

  function make_review($param1, $param2){
    $this->db->select('*');
    $this->db->from('score_tbl');
    $this->db->join('question_bank_tbl', 'qbt_id = st_qbt_id');
    $this->db->where('st_student_profile_id',$param1);
    $this->db->where('st_est_id',$param2);
    $query = $this->db->get()->result_array();
return $query;
}



function use_pin($param1, $param2){
    $data['ept_pin_status'] = 'Used!';

    $this->db->where('ept_pin_no', $param1);
    $this->db->where('ept_sp_id', $param2);
    $this->db->update('exam_pin_tbl', $data);

    //After insertion, log Activity
    $data_log['action_performed'] = 'Used PIN';
    $data_log['action_by'] = $param2;
    $this->db->insert('activity_log', $data_log);
  }


 


}
