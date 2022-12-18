<?php
  $exam_TypeRecordSets = $this->exams_model->fetch_examRecord($exam_id);
  ?>
 
 <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Set Questions - <?php echo $exam_TypeRecordSets['est_course_title']; ?> <?php if($exam_TypeRecordSets['est_course_level']==1){ echo "Beginer Level"; }elseif($exam_TypeRecordSets['est_course_level']==2){ echo "Intermediate Level"; }elseif($exam_TypeRecordSets['est_course_level']==3){ echo "Advanced Level"; } ?></h4>
            <a href="<?php echo base_url();?>exams/load_queueQuestion"  title="Previous Page" style="float:right">
                <button type="button" class="btn btn-rounded btn-primary">
                  <span class="btn-icon-start text-primary">
                    <i class="fa fa-arrow-left"></i>
                  </span>Back
                </button>
              </a> 
          </div>
          <div class="card-body">
              

          <form method="post" action="<?php echo base_url();?>exams/manage_questions/create/<?php echo  $exam_id; ?>"  enctype="multipart/form-data">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-6">
                        <label class="mb-2"><strong>Question</strong></label>
                        <textarea name="question"  id="question" style="height:160px;" class="form-control" required> </textarea>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Questionmage</strong></label>
                            <input type="file" name="question_image" id="question_image" class="form-control" onchange="readURLq(this);">
                            <strong>[160 x 160, jpg, 120kb Max]</strong>
                        </div>

                        <img src="<?php echo base_url().'assets/images/img_icon.jpg'; ?>" id="preview_q" style="width:160px; height:160px; margin:auto;"/>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-3" class="" >
                        <label class="mb-2"><strong>Option (a) <input type="radio" value="a" class="correct" name="correct_ans" required /></strong></label>
                            <input type="text" name="option_a" id="option_a" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Option (b) <input type="radio" value="b" class="correct" name="correct_ans" required /></strong></label>
                            <input type="text" name="option_b" id="option_b" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Option (c) <input type="radio" value="c" class="correct" name="correct_ans" required /></strong></label>
                            <input type="text" name="option_c" id="option_c" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Option (d) <input type="radio" value="d" class="correct" name="correct_ans" required /></strong></label>
                            <input type="text" name="option_d" id="option_d" class="form-control" required>
                        </div>
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save Question</button>
                  </div>

                </form>


          </div>
      </div>
  </div>


  
  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">All Questions - <?php echo $exam_TypeRecordSets['est_course_title']; ?> <?php if($exam_TypeRecordSets['est_course_level']==1){ echo "Beginer Level"; }elseif($exam_TypeRecordSets['est_course_level']==2){ echo "Intermediate Level"; }elseif($exam_TypeRecordSets['est_course_level']==3){ echo "Advanced Level"; } ?></h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example2" class="display" style="min-width: 845px">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Question</th>
                              <th>Option A</th>
                              <th>Option B</th>
                              <th>Option C</th>
                              <th>Option D</th>
                              <th>Correct Ans</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      <?php
                        $qRecordset = $this->exams_model->display_q($exam_id);
                        foreach($qRecordset as $key => $eachQ):
                      ?>
                          <tr>
                              <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                              <td><?php echo $eachQ['qbt_question']; ?></td>
                              <td><?php echo $eachQ['qbt_option_a']; ?></td>
                              <td><?php echo $eachQ['qbt_option_b']; ?></td>
                              <td><?php echo $eachQ['qbt_option_c']; ?></td>
                              <td><?php echo $eachQ['qbt_option_d']; ?></td>
                              <td><?php echo $eachQ['qbt_correct_ans']; ?></td>

                              <td>
                                <div class="d-flex">
                                    <a href="#" data-id="<?php echo $eachQ['qbt_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1 editQuestionDataId" data-bs-toggle="modal" data-bs-target=".editQuestion"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?php echo base_url();?>exams/manage_questions/delete/<?php echo $eachQ['qbt_id']; ?>/<?php echo $exam_id; ?>" onclick="return confirm('Are you sure you want to permanently delete?');" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"> </i></a>
                                </div>
                              </td>
                          </tr>

                            <?php
                            endforeach;
                            ?>

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

</div>
<script>
$(document).ready(function(){
   
        $(".correct").click(function(){
            var correct = $(this).val();
        if(correct=='a'){
            $("#option_a").css("background-color","#0F0");
            $("#option_b").css("background-color","#ccc");
            $("#option_c").css("background-color","#ccc");
            $("#option_d").css("background-color","#ccc");
        }if(correct=='b'){
            $("#option_a").css("background-color","#ccc");
            $("#option_b").css("background-color","#0F0");
            $("#option_c").css("background-color","#ccc");
            $("#option_d").css("background-color","#ccc");
        }if(correct=='c'){
            $("#option_a").css("background-color","#ccc");
            $("#option_b").css("background-color","#ccc");
            $("#option_c").css("background-color","#0F0");
            $("#option_d").css("background-color","#ccc");
        }if(correct=='d'){
            $("#option_a").css("background-color","#ccc");
            $("#option_b").css("background-color","#ccc");
            $("#option_c").css("background-color","#ccc");
            $("#option_d").css("background-color","#0F0");
        }
        })
   
})
</script>
<script type="text/javascript">
    function readURLq(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview_q').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
