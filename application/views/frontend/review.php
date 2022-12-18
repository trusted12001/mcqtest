<?php
  $review_qs = $this->exams_model->make_review($this->session->userdata('current_profile_id'), $this->session->userdata('current_exam_id'));
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

    <style>
        tbody td{
        padding: 6px;
        }

        tbody tr:nth-child(odd){
        background-color: #cccccc;
        color: #fff;
        }
    </style>

</head>
<body>
    <div id="wrapper">
        <div class="container">
            <div class="row text-center">
                <h1>SCORE REVIEW</h1>
                <div class="shap_content position-relative">
                    <table align="center">
                        <tr style="background-color: #000;">
                        <th>No.</th>
                        <th>Question</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Chosen Option</th>
                        <th>Correct Option</th>
                        </tr>


                        <?php 
                            $counter = 0;
                            foreach($review_qs as $fetched_q){                                    
                                $counter ++;
                        ?>
                                <tr>
                                    <td style="background-color: #CCC">
                                        <?php echo $counter; ?>
                                    </td>
                                    <td>
                                        <?php echo $fetched_q['qbt_question']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fetched_q['qbt_option_a']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fetched_q['qbt_option_b']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fetched_q['qbt_option_c']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fetched_q['qbt_option_d']; ?>
                                    </td>
                                    <td style="background-color: <?php if($fetched_q['st_choice']==$fetched_q['qbt_correct_ans']){ echo "green"; }else{ echo "red";} ?>;" >
                                        <?php if ($fetched_q['st_choice'] == '0') { }else { echo strtoupper($fetched_q['st_choice']); } ?>
                                    </td>
                                    <td style="background-color: green">
                                        <?php echo strtoupper($fetched_q['qbt_correct_ans']); ?>
                                    </td>
                                </tr>

                        <?php   
                            } 
                        ?>

                        
                    </table>
                </div>

                <div class="container" style="margin-top: 33px;">
                    <div class="row text-center" style="width:50%; margin:auto;">
                        <a href="<?php echo base_url();?>login/cbt" class="button btn-info" style="padding:9px; width:50%; margin:auto;">Close </a>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
       
    
</body>
</html>

<?php
    if(($this->session->userdata('catcher4') == 1)){
        $this->session->set_flashdata('error_message', 'You have terminated your session by page refresh!');
        redirect(base_url().'login/cbt', 'refresh');
    }else{
        $this->session->set_userdata('catcher4', 1);
    }
?>