<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade editExam" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Exam Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>exams/manage_exam/update">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Course Title</strong></label>
                            <input type="text" name="course_title" id="course_title" class="form-control" placeholder="Course Title" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Level</strong></label>
                            <select name="level" id="level" class="form-control" required>
                              <option value="">Select Level </option>
                              <option value="1">Beginner</option>
                              <option value="2">Intermediate</option>
                              <option value="3">Advanced</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Number of Question(s)</strong></label>
                            <input type="number" name="no_of_question" id="no_of_question" class="form-control" placeholder="Number Of Number">
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Duration</strong></label>
                            <input type="number" name="duration" id="duration" class="form-control" placeholder="Time in Minutes" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Pass Mark</strong></label>
                            <input type="number" name="pass_mark" id="pass_mark" class="form-control" placeholder="Enter Pass Mark" required>
                            <input type="hidden" name="examEdit_id" id="examEdit_id" class="form-control" >
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Review Option</strong></label>
                            <select name="review_option" id="review_option" class="form-control" required>
                              <option value="">Select Option </option>
                              <option value="1">Review Allowed</option>
                              <option value="0">Review Disallowed</option>
                            </select>
                        </div>
                      </div>



                      <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="mb-2"><strong>Instructions</strong></label>
                            <textarea name="instruction" id="instruction" class="form-control" required>
                            </textarea>
                        </div>
                      </div>



                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>

                </form>
            </div>
        </div>
    </div>


<script type="text/javascript">
$(document).ready(function(){
    $('.editExamRecord').click(function(){
       var data_id = $(this).data('id');

        $.ajax({
            type:'POST',
            url:"<?php echo base_url('exams/get_examRecord/')?>"+data_id,
            dataType: "json",
            data:{id:data_id},
            success:function(data)
            {
              $('#course_title').val(data.est_course_title);
              $('#level').val(data.est_course_level);
              $('#no_of_question').val(data.est_no_of_question);

              $('#duration').val(data.est_duration);
              $('#pass_mark').val(data.est_pass_mark);
              $('#instruction').val(data.est_instruction);

              $('#review_option').val(data.est_review_status);
              $('#examEdit_id').val(data_id);
            }
        });
    });
});
</script>

