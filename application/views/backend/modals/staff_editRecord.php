<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade editStaffProfile" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Staff Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>settings/manage_company/updateStaff">
                  <div class="modal-body">

                    <div class="row">
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_emp_id" id="stff_emp_id" class="form-control" onkeypress="return isNumber(event)" placeholder="Employee ID" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_first_name" id="stff_first_name" class="form-control" placeholder="First Name" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_surname" id="stff_surname" class="form-control" placeholder="Surname" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_othername" id="stff_othername" class="form-control" placeholder="Other Name">
                      </div>
                    </div>

                    <div class="row">
                      <div class="mb-3 col-md-3">
                          <input type="email" name="stff_email" id="stff_email" class="form-control" placeholder="Email">
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_phone" id="stff_phone" class="form-control" onkeypress="return isNumber(event)" maxlength="11" placeholder="Phone Number" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <select name="stff_dept" id="stff_dept" class="form-control" required>
                            <option value="">Department </option>
                            <option value="office">Office</option>
                            <option value="field">Field</option>
                          </select>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="date" name="stff_hire_date" id="stff_hire_date" class="form-control" placeholder="Hired Date" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="mb-3 col-md-12">
                          <input type="text" name="stff_address" id="stff_address" class="form-control" placeholder="Staff Address" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_bank_name" id="stff_bank_name" class="form-control" placeholder="Bank Name" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_account_name" id="stff_account_name" class="form-control" placeholder="Account Name" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_account_number" id="stff_account_number" class="form-control" onkeypress="return isNumber(event)" maxlength="10" placeholder="Account Number" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_salary" id="stff_salary" class="form-control" onkeypress="return isNumber(event)" placeholder="Salary" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_nok_name" id="stff_nok_name" class="form-control" placeholder="Next of Kin Name" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_nok_address" id="stff_nok_address" class="form-control" placeholder="Next of Kin Address" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_nok_phone" id="stff_nok_phone" class="form-control" maxlength="11" onkeypress="return isNumber(event)" placeholder="Next of Kin Phone" required>
                      </div>
                      <div class="mb-3 col-md-3">
                          <input type="text" name="stff_nok_relationship" id="stff_nok_relationship" class="form-control" placeholder="Next of Kin Relationship" required>
                          <input type="hidden" name="parameter2" id="parameter2_stff" class="form-control" placeholder="Next of Kin Relationship" required>
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


<script type="text/javascript">
$(document).ready(function(){

    $('.editStaffDataId').click(function(){
       var data_id = $(this).data('id');
       //alert(data_id);
        $.ajax({
            type:'POST',
            url:"<?php echo base_url('settings/get_staffRecord/')?>"+data_id,
            dataType: "json",
            data:{id:data_id},
            success:function(data)
            {
              $('#stff_emp_id').val(data.s_prof_employee_id);
              $('#stff_first_name').val(data.s_prof_first_name);
              $('#stff_surname').val(data.s_prof_surname);
              $('#stff_othername').val(data.s_prof_othername);
              $('#stff_email').val(data.s_prof_staff_email);
              $('#stff_phone').val(data.s_prof_phone);
              $('#stff_dept').val(data.s_prof_dept);
              $('#stff_address').val(data.s_prof_address);
              $('#stff_hire_date').val(data.s_prof_hire_date);
              $('#stff_bank_name').val(data.s_prof_bank);
              $('#stff_account_name').val(data.s_prof_account_name);
              $('#stff_account_number').val(data.s_prof_account_number);
              $('#stff_salary').val(data.s_prof_salary);
              $('#stff_nok_name').val(data.s_prof_nok_name);
              $('#stff_nok_address').val(data.s_prof_nok_address);
              $('#stff_nok_phone').val(data.s_prof_nok_phone);
              $('#stff_nok_relationship').val(data.s_prof_nok_relationship);

              $('#parameter2_stff').val(data_id);
            }
        });
    });
});
</script>
