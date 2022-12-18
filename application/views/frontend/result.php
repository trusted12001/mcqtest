<?php
  $result_parameters = $this->exams_model->get_score($this->session->userdata('current_profile_id'), $this->session->userdata('current_exam_id'));
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
    <title>Thank-You-2</title>
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
            <div class="row text-center">
                <div class="shap_content position-relative">
                    <img class="w-50" src="<?php echo base_url();?>result_assets/images/rectangle.png" alt="image_not_found">
                    <div class="title">
                        <h2 class="position-relative" style="margin-top:-77px;">You scored <?php echo $count; ?> of <?php echo count($_SESSION['ans_arr']); ?>!</h2>
                    </div>
                </div> 
                
                <div class="container" style="margin-top: 33px;">
                    <div class="row text-center" style="width:50%; margin:auto;">
                        <a href="<?php echo base_url();?>login/cbt" class="button btn-info" style="padding:9px; width:50%; margin:auto;">Close </a>
                        <a class="button btn-success" style="padding:9px; width:50%; margin:auto;" href="<?php echo base_url();?>exams/cbt_review">Review Result </a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
<?php         
        if(($this->session->userdata('catcher3') == 1)){
            $this->session->set_flashdata('error_message', 'You have terminated your session by page refresh!');
            redirect(base_url().'login/cbt', 'refresh');
        }else{
            $this->session->set_userdata('catcher3', 1);
        }
?>