<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade newStaffAdd" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add New Profile</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>settings/manage_company/newstaff">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_emp_id" class="form-control" onkeypress="return isNumber(event)" placeholder="Employee ID" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_first_name" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_surname" class="form-control" placeholder="Surname" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_othername" class="form-control" placeholder="Other Name">
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-3">
                            <input type="email" name="stff_email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_phone" class="form-control" onkeypress="return isNumber(event)" maxlength="11" placeholder="Phone Number" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <select name="stff_dept" class="form-control" required>
                              <option value="">Department </option>
                              <option value="office">Office</option>
                              <option value="field">Field</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="date" name="stff_hire_date" class="form-control" placeholder="Hired Date" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-12">
                            <input type="text" name="stff_address" class="form-control" placeholder="Staff Address" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_bank_name" class="form-control" placeholder="Bank Name" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_account_name" class="form-control" placeholder="Account Name" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_account_number" class="form-control" onkeypress="return isNumber(event)" maxlength="10" placeholder="Account Number" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_salary" class="form-control" onkeypress="return isNumber(event)" placeholder="Salary" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_nok_name" class="form-control" placeholder="Next of Kin Name" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_nok_address" class="form-control" placeholder="Next of Kin Address" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_nok_phone" class="form-control" maxlength="11" onkeypress="return isNumber(event)" placeholder="Next of Kin Phone" required>
                        </div>
                        <div class="mb-3 col-md-3">
                            <input type="text" name="stff_nok_relationship" class="form-control" placeholder="Next of Kin Relationship" required>
                        </div>
                      </div>





                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Profile</button>
                  </div>

                </form>
            </div>
        </div>
    </div>


<!-- Large modal -->
