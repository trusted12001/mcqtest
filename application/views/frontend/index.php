<?php
   //Some ImportantParameter   
   $std_id = $this->session->userdata('current_profile_id');
   $exam_id = $this->session->userdata('current_exam_id');
   $current_pin = $this->session->userdata('current_pin');

   $est_record = $this->exams_model->select_est($exam_id);
   $num_of_questions = $est_record['est_no_of_question'];
   $duration = $est_record['est_duration'];

   $question_pool = $this->exams_model->select_q($exam_id, $num_of_questions);
   $use_pin = $this->exams_model->use_pin($current_pin, $std_id);
   $check_pin = $this->exams_model->use_pin($current_pin, $std_id);


   if(($this->session->userdata('catcher2') == 1)){
      $this->session->set_flashdata('error_message', 'You have terminated your session by page refresh!');
      redirect(base_url().'login/cbt', 'refresh');
  }else{
      $this->session->set_userdata('catcher2', 1);
  }



  $_SESSION['fetched_questions'] = $question_pool;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sprint CBT Exams</title>
<!-- FontAwesome-cdn include --> 
<link rel="stylesheet" href="<?php echo base_url();?>frontend_assests/css/all.min.css">
<!-- Google fonts include -->
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
<!-- Bootstrap-css include -->
<link rel="stylesheet" href="<?php echo base_url();?>frontend_assests/css/bootstrap.min.css">
<!-- Animate-css include -->
<link rel="stylesheet" href="<?php echo base_url();?>frontend_assests/css/animate.min.css">
<!-- Main-StyleSheet include -->
<link rel="stylesheet" href="<?php echo base_url();?>frontend_assests/css/style.css">


</head>
<body>
<div class="wrapper">
<!-- Top content -->
<div class="container">
<div class="row">
   <div class="col-md-6">
      <div class="logo_area ps-5 pt-2 d-none d-md-block">
         <a href="index.php">
            <img src="<?php echo base_url();?>user_uploaded_img/settings/logo_png.png" width="99px" alt="image-not-found" title="Yes!">
         </a>
      </div>
   </div>
   <div class="col-6 d-md-block pt-2" id="c_box">
      <div class="count_box pe-3 me-5 rounded-pill d-flex align-items-center justify-content-center" style="float: right;">
         <div class="count_clock ps-2">
            <img  src="<?php echo base_url();?>frontend_assests/images/clock.png" alt="image-not-found">
         </div>
         <div class="count_title">
            <h4 class="ps-1">Count</h4>
            <span class="px-1">Down</span>
         </div>
         <?php
         date_default_timezone_set("Africa/Lagos");
        $date = date('Y/m/d H:i', strtotime("+$duration min"));
         ?>
         <div class="count_number rounded-pill px-3 d-flex justify-content-around align-items-center position-relative overflow-hidden countdown_timer" data-countdown="<?php echo $date; ?>">
         </div>
      </div>
   </div>
</div>
</div>
<div class="container">

<?php 
   $timeup = ($duration * 60 * 1000);
?>

<script type="text/javascript">
   var wait=setTimeout("document.xyz.submit();",<?php echo $timeup; ?>);
</script>


<form name="xyz" class="multisteps_form overflow-hidden position-relative" id="wizard" method="POST" action="<?php echo base_url();?>exams/cbt_submit">
   
   <!------------------------- Step-1 ----------------------------->
   <input type="hidden" value="<?php echo $std_id; ?>" name="std_id" >
   <input type="hidden" value="<?php echo $exam_id; ?>" name="exam_id" >
   
   <?php 
      $ans_arr = []; 
      $q = 0; 
      foreach($question_pool as $pool_q){  
         array_push($ans_arr, $pool_q["qbt_correct_ans"]);?>      
   <div class="multisteps_form_panel">

      <div class="question_title">
         <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">
         <?php if((isset($pool_q['qbt_question_image'])) && $pool_q['qbt_question_image']!=''){ ?>
            <center>
            <img src="<?php echo base_url().'user_uploaded_img/question/'.$pool_q["qbt_question_image"]; ?>" alt="" style="height: 200px; width: 400px;">
            </center>
         <?php } else { ?>
            <center>
            <img src="<?php echo base_url().'user_uploaded_img/question/no_img.jpg'; ?>" alt="" >
            </center>
            <?php
            } 
            ?>
         <hr />
         <br />
            <?php echo $pool_q['qbt_question']; ?>
         </h1>
         
      </div>
         <!-- Row 1 -->
         <div class="row pt-3">
            <ul class="text-center">
               <!-- Option A start here -->
               <li class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms storeOpt <?php echo $pool_q['qbt_id']; ?>" data-id="<?php echo $pool_q['qbt_id']; ?>">
                  <input class="opt_1 <?php echo $pool_q['qbt_id']; ?>" type="checkbox" name="stp_1_select_option[]" value="<?php echo $pool_q['qbt_id'].'-a'; ?>">
                  <label for="opt_1"><?php echo $pool_q['qbt_option_a']; ?></label>
                  <span class="position-absolute">A</span>
               </li>
               <!-- Option A Ends here -->

               <!-- Option B start here -->
               
               <li class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms storeOpt <?php echo $pool_q['qbt_id']; ?>" data-id="<?php echo $pool_q['qbt_id']; ?>">
                  <input class="opt_1 <?php echo $pool_q['qbt_id']; ?>" type="checkbox" name="stp_1_select_option[]" value="<?php echo $pool_q['qbt_id'].'-b'; ?>">
                  <label for="opt_2"><?php echo $pool_q['qbt_option_b']; ?></label>
                  <span class="position-absolute">B</span>
               </li>
               <!-- Option B Ends here -->

               <!-- Option C start here -->
               <li class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms storeOpt <?php echo $pool_q['qbt_id']; ?>" data-id="<?php echo $pool_q['qbt_id']; ?>">
                  <input class="opt_1 <?php echo $pool_q['qbt_id']; ?>" type="checkbox" name="stp_1_select_option[]" value="<?php echo $pool_q['qbt_id'].'-c'; ?>">
                  <label for="opt_3"><?php echo $pool_q['qbt_option_c']; ?></label>
                  <span class="position-absolute">C</span>
               </li>
               <!-- Option C Ends here -->

               <!-- Option D start here -->
               <li class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms storeOpt <?php echo $pool_q['qbt_id']; ?>" data-id="<?php echo $pool_q['qbt_id']; ?>">
                  <input class="opt_1 <?php echo $pool_q['qbt_id']; ?>" type="checkbox" name="stp_1_select_option[]" value="<?php echo $pool_q['qbt_id'].'-d'; ?>">
                  <label for="opt_4"><?php echo $pool_q['qbt_option_d']; ?></label>
                  <span class="position-absolute">D</span>
               </li>
               <!-- Option D Ends here -->

               <!-- Placeholder start here -->
                  <input class="placeholder<?php echo $pool_q['qbt_id']; ?>" style="display:none;" type="checkbox" checked name="stp_1_select_option[]" value="<?php echo $pool_q['qbt_id'].'-0'; ?>" >
               <!-- Placeholder D Ends here -->
            </ul>
         </div>

         <!-- Row 2 -->
         <div class="row" style="margin-top: 20px;">
         <ul class="text-center">
            </ul>
            <!-- Progress bar -->
            <div class="step_progress position-absolute text-center step">
               <span class="text-capitalize">question <?php echo ++$q; ?> / <?php echo count($question_pool); ?></span>
               <div class="progress rounded-pill">
                  <div class="progress-bar rounded-pill" role="progressbar" <?php $ttl_q = count($question_pool); $percentage = ($q / $ttl_q)*100; ?> style="width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo number_format($percentage, 2); ?>" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div>
         </div>
      </div>
      <?php 
         } $_SESSION['ans_arr']=$ans_arr;       
      ?>
         <!---------- Form Button ---------->
         <button type="button" class="f_btn prev_btn text-uppercase position-absolute" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
         <button type="button" class="f_btn next_btn text-uppercase position-absolute" id="nextBtn" onclick="nextPrev(1)">Next Question</button>
</form>


   </div>
</div>
<!-- jQuery-js include -->
<script src="<?php echo base_url();?>frontend_assests/js/jquery-3.6.0.min.js"></script>
<!-- jquery-count-down include -->
<script src="<?php echo base_url();?>frontend_assests/js/countdown.js"></script>
<!-- Bootstrap-js include -->
<script src="<?php echo base_url();?>frontend_assests/js/bootstrap.min.js"></script>
<!-- jQuery-validate-js include -->
<script src="<?php echo base_url();?>frontend_assests/js/jquery.validate.min.js"></script>
<!-- Custom-js include -->
<script src="<?php echo base_url();?>frontend_assests/js/script.js"></script>
<!-- <script type="text/javascript">
   $('#getting-started').countdown('2020/07/25', function(event) {
      $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
   });
</script> -->
</body>
</html>