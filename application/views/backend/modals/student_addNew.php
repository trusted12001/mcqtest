<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade newStudentProfile" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add New Student</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>students/manage_student/create">
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
                            <input type="text" name="form_no" onkeypress="return isNumber(event)" class="form-control" placeholder="Form Number" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Phone</strong></label>
                            <input type="text" name="phone" onkeypress="return isNumber(event)" class="form-control" maxlength="11" placeholder="Phone Number" required>
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
