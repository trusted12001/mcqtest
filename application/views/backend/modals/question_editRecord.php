<?php
  //$exam_TypeRecordSets = $this->exams_model->fetch_examRecord($exam_id);
  ?>
<!-- Modal -->
<div class="modal fade editQuestion" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Question Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  
                  <form method="post" action="<?php echo base_url();?>exams/manage_questions/create/<?php echo  $exam_id; ?>"  enctype="multipart/form-data">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-6">
                        <label class="mb-2"><strong>Question</strong></label>
                        <textarea name="question"  id="edt_question" style="height:160px;" class="form-control" required> </textarea>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Questionmage</strong></label>
                            <input type="file" name="question_image" id="edt_question_image" class="form-control" onchange="readURLq_edit(this);">
                            <strong>[160 x 160, jpg, 120kb Max]</strong>
                        </div>

                        <img src="<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>" id="edt_preview_q" style="width:160px; height:160px; margin:auto;"/>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-3" class="" >
                        <label class="mb-2"><strong>Option (a) <input type="radio" value="a" class="edt_correct" name="correct_ans" id="correct_ans_aEdit" required /></strong></label>
                            <input type="text" name="option_a" id="edt_option_a" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Option (b) <input type="radio" value="b" class="edt_correct" name="correct_ans" id="correct_ans_bEdit" required /></strong></label>
                            <input type="text" name="option_b" id="edt_option_b" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Option (c) <input type="radio" value="c" class="edt_correct" name="correct_ans" id="correct_ans_cEdit" required /></strong></label>
                            <input type="text" name="option_c" id="edt_option_c" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                        <label class="mb-2"><strong>Option (d) <input type="radio" value="d" class="edt_correct" name="correct_ans" id="correct_ans_dEdit" required /></strong></label>
                            <input type="text" name="option_d" id="edt_option_d" class="form-control" required>
                        </div>
                      </div>

                      

                      <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="mb-2"><strong>Image Option (a)</strong></label>
                            <input type="file" name="image_option_a" id="edt_image_option_a" class="form-control" onchange="readURLa_edit(this);" >
                            <strong>[160 x 160, jpg, 120kb Max]</strong>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="mb-2"><strong>Image Option (b)</strong></label>
                            <input type="file" name="image_option_b" id="edt_image_option_b" class="form-control" onchange="readURLb_edit(this);" >
                            <strong>[160 x 160, jpg, 120kb Max]</strong>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="mb-2"><strong>Image Option (c)</strong></label>
                            <input type="file" name="image_option_c" id="edt_image_option_c" class="form-control" onchange="readURLc_edit(this);" >
                            <strong>[160 x 160, jpg, 120kb Max]</strong>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="mb-2"><strong>Image Option (d)</strong></label>
                            <input type="file" name="image_option_d" id="edt_image_option_d" class="form-control" onchange="readURLd_edit(this);" >
                            <strong>[160 x 160, jpg, 120kb Max]</strong>
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-3">
                            <img id="edt_preview_a" src="<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>" style="height:160px; width:160px; margin:auto;"/>
                        </div>
                        <div class="mb-3 col-md-3">
                            <img id="edt_preview_b" src="<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>" style="height:160px; width:160px; margin:auto;"/>
                        </div>
                        <div class="mb-3 col-md-3">
                            <img id="edt_preview_c" src="<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>" style="height:160px; width:160px; margin:auto;"/>
                        </div>
                        <div class="mb-3 col-md-3">
                            <img id="edt_preview_d" src="<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>" style="height:160px; width:160px; margin:auto;"/>
                            <input type="hidden" name="questionEdit_id" id="questionEdit_id" class="form-control" required>
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



<script>
$(document).ready(function(){
        $(".edt_correct").click(function(){
            var correctEdt = $(this).val();
            if(correctEdt=='a'){
            $("#edt_option_a").css("background-color","#0F0");
            $("#edt_option_b").css("background-color","#ccc");
            $("#edt_option_c").css("background-color","#ccc");
            $("#edt_option_d").css("background-color","#ccc");
        }if(correctEdt=='b'){
            $("#edt_option_a").css("background-color","#ccc");
            $("#edt_option_b").css("background-color","#0F0");
            $("#edt_option_c").css("background-color","#ccc");
            $("#edt_option_d").css("background-color","#ccc");
        }if(correctEdt=='c'){
            $("#edt_option_a").css("background-color","#ccc");
            $("#edt_option_b").css("background-color","#ccc");
            $("#edt_option_c").css("background-color","#0F0");
            $("#edt_option_d").css("background-color","#ccc");
        }if(correctEdt=='d'){
            $("#edt_option_a").css("background-color","#ccc");
            $("#edt_option_b").css("background-color","#ccc");
            $("#edt_option_c").css("background-color","#ccc");
            $("#edt_option_d").css("background-color","#0F0");
            }
        })
})
</script>
<script type="text/javascript">
    function readURLa_edit(input) {
        $('#edt_preview_a').css("display", "block");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#edt_preview_a').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLb_edit(input) {
        $('#edt_preview_b').css("display", "block");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#edt_preview_b').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLc_edit(input) {
        $('#edt_preview_c').css("display", "block");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#edt_preview_c').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLd_edit(input) {
        $('#edt_preview_d').css("display", "block");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#edt_preview_d').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLq_edit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#edt_preview_q').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script type="text/javascript">
$(document).ready(function(){
    $('.editQuestionDataId').click(function(){
       var data_id = $(this).data('id');
        $.ajax({
            type:'POST',
            url:"<?php echo base_url('exams/get_questionRecord/')?>"+data_id,
            dataType: "json",
            data:{id:data_id},
            success:function(data)
            {
              $('textarea#edt_question').val(data.qbt_question);
              $('#edt_option_a').val(data.qbt_option_a);
              $('#edt_option_b').val(data.qbt_option_b);
              $('#edt_option_c').val(data.qbt_option_c);
              $('#edt_option_d').val(data.qbt_option_d);

            if(data.qbt_correct_ans == 'a'){
                $("#correct_ans_aEdit").prop('checked', true);
                $("#edt_option_a").css("background-color","#0F0");
                $("#edt_option_b").css("background-color","#ccc");
                $("#edt_option_c").css("background-color","#ccc");
                $("#edt_option_d").css("background-color","#ccc");
            }else if(data.qbt_correct_ans == 'b'){
                $("#correct_ans_bEdit").prop('checked', true);
                $("#edt_option_a").css("background-color","#ccc");
                $("#edt_option_b").css("background-color","#0F0");
                $("#edt_option_c").css("background-color","#ccc");
                $("#edt_option_d").css("background-color","#ccc");
            }else if(data.qbt_correct_ans == 'c'){
                $("#correct_ans_cEdit").prop('checked', true);
                $("#edt_option_a").css("background-color","#ccc");
                $("#edt_option_b").css("background-color","#ccc");
                $("#edt_option_c").css("background-color","#0F0");
                $("#edt_option_d").css("background-color","#ccc");
            }else if(data.qbt_correct_ans == 'd'){
                $("#correct_ans_dEdit").prop('checked', true);
                $("#edt_option_a").css("background-color","#ccc");
                $("#edt_option_b").css("background-color","#ccc");
                $("#edt_option_c").css("background-color","#ccc");
                $("#edt_option_d").css("background-color","#0F0");
            }

              $('#correct_ans_b').val(data.qbt_option_b);
              $('#correct_ans_c').val(data.qbt_option_c);
              $('#correct_ans_d').val(data.qbt_option_d);

              if (data.qbt_question_image != '') {
                $('#edt_preview_q').attr('src', "<?php echo base_url('user_uploaded_img/question/')?>"+data.qbt_question_image);
              }else{
                $('#edt_preview_q').attr('src', "<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>");
              }

              if (data.qbt_option_a_image != '') {
                $('#edt_preview_a').attr('src', "<?php echo base_url('user_uploaded_img/question/')?>"+data.qbt_option_a_image);
              }else{
                $('#edt_preview_a').attr('src', "<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>");
              }

              if (data.qbt_option_b_image != '') {
                $('#edt_preview_b').attr('src', "<?php echo base_url('user_uploaded_img/question/')?>"+data.qbt_option_b_image);
              }else{
                $('#edt_preview_b').attr('src', "<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>");
              }

              if (data.qbt_option_c_image != '') {
                $('#edt_preview_c').attr('src', "<?php echo base_url('user_uploaded_img/question/')?>"+data.qbt_option_c_image);
              }else{
                $('#edt_preview_c').attr('src', "<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>");
              }

              if (data.qbt_option_d_image != '') {
                $('#edt_preview_d').attr('src', "<?php echo base_url('user_uploaded_img/question/')?>"+data.qbt_option_d_image);
              }else{
                $('#edt_preview_d').attr('src', "<?php echo base_url('user_uploaded_img/settings/no_img.jpg')?>");
              }

             $('#questionEdit_id').val(data_id);
        }
        });
    });
});
</script>
