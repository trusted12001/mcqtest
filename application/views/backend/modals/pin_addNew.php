
<?php
    $exams_drop_down = $this->settings_model->select_exams();
?>
<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade newStudentPin" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Generate PIN</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>students/manage_student/create_student_and_pin">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>First Name</strong></label>
                            <input type="text" autofocus name="firstname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Surname</strong></label>
                            <input type="text" name="surname" class="form-control" placeholder="Surname" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Other Names</strong></label>
                            <input type="text" name="othername" class="form-control" placeholder="Other Name">
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Form Number</strong></label>
                            <input type="text" name="form_no" class="form-control" placeholder="Form Number" value="0" readonly required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Phone</strong></label>
                            <input type="text" name="phone" onkeypress="return isNumber(event)" class="form-control" maxlength="11" placeholder="Phone Number" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Select Exam</strong></label>
                            <select type="text" name="exam_type" class="form-control" required>
                                <option>Select</option>
                                <?php foreach($exams_drop_down as $exam){ 
                                ?>
                                <option value="<?php echo $exam['est_id']; ?>"><?php echo $exam['est_course_title'].' '.$exam['est_course_level']; ?></option>
                               <?php } ?>
                            </select>
                        </div>
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
