    <?php
        unset($_SESSION['flash_message']);

        if(($this->session->userdata('catcher') == 1)){
            $this->session->set_flashdata('error_message', 'You have terminated your session by page refresh!');
            redirect(base_url().'login/cbt', 'refresh');
        }else{
            $this->session->set_userdata('catcher', 1);
        }


        $std_id = $this->session->userdata('current_profile_id');
        $exam_id = $this->session->userdata('current_exam_id');
        $expiry = $this->session->userdata('pin_expiry_date');
        $result_parameters = $this->exams_model->get_score($std_id, $exam_id);
        $exam_info = $this->exams_model->select_est($exam_id);
        $student_info = $this->students_model->select_student_info($std_id);
    ?>

    <?php 
        $count = 0; foreach($result_parameters as $result){
                
            if($result['st_choice']==$result['st_correct_ans']){
                $count ++;
            }
        } 
        $number_attempted = count($result_parameters);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprint CBT - Welcome</title>
    <!-- Google-fonts-include -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&family=Oswald:wght@700&display=swap" rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="<?php echo base_url();?>result_assets/css/bootstrap.min.css">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="<?php echo base_url();?>result_assets/css/style.css">
</head>
<body>

    <div id="wrapper">
        <div class="container">
            <div class="row">
            <div class="card">
                <div class="card-header">
                    Welcome! <?php echo $student_info['sp_first_name'].'-'.$student_info['sp_surname'].'-'.$student_info['sp_othername'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Examinations Instructions</h5>
                    <p class="card-text">
                        This CBT exam will test your skills in <?php echo $exam_info['est_course_title'].'- Level '.$exam_info['est_course_level']; ?>. <br />
                        You are expected to answer <?php echo $exam_info['est_no_of_question']; ?> questions within <?php echo $exam_info['est_duration']; ?> minute. <br />
                        Note that your exams will be submitted and you will be automatically logged out when your <?php echo $exam_info['est_duration']; ?> minute elapse. <br />
                        Click on the <b><i>'Start CBT'</i></b> button to begin or <b><i>'Close'</i></b> button to exit and try later before the expiration of your PIN on <?php echo $expiry; ?>.<br />
                        <span style="color:red;">DO NOT REFRESH PAGE THROUGHOUT THIS SESSION TO AVOID DISQUALIFICATION!</span> <br /><br />
                        Good-luck!
                    </p>
                    
                    <a href="<?php echo base_url();?>login/cbt" class="btn btn-danger">Close</a>
                    <a href="<?php echo base_url();?>exams/load_frontPage" class="btn btn-primary">Start CBT</a>
                </div>
                </div>
            </div>    
        </div>
    </div>    
</body>
</html>

