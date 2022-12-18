
<?php
    $exams_drop_down = $this->settings_model->select_exams();
?>
<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade newStudentPin2" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Generate PIN</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>students/manage_student/create_pin">
                  <div class="modal-body">

                      <div class="row">

                        <div class="mb-12 col-md-12">
                            <label class="mb-2"><strong>Select Exam</strong></label>
                            <select type="text" name="exam_type" class="form-control" required>
                                <option>Select</option>
                                <?php foreach($exams_drop_down as $exam){ 
                                ?>
                                <option value="<?php echo $exam['est_id']; ?>"><?php echo $exam['est_course_title'].' '.$exam['est_course_level']; ?></option>
                               <?php } ?>
                            </select>
                        </div>

                        <input type="hidden" id ="std_id_for_pin" name ="std_id_for_pin" class="form-control" required>

                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Record</button>
                  </div>

                </form>
            </div>
        </div>
    </div>
<!-- Large modal -->
