<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade editProfile" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit User Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>users/manage_user/update/">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>First Name</strong></label>
                            <input type="text" name="firstname1" id="firstname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Surname</strong></label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Other Names</strong></label>
                            <input type="text" name="othername" id="othername" class="form-control" placeholder="Other Name">
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Gender</strong></label>
                            <select name="gender" id="gender" class="form-control" required>
                              <option value="">Select Gender </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Email</strong></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Phone</strong></label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Username</strong></label>
                            <input disabled type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Password</strong></label>
                            <input disabled type="password" name="password" class="form-control" value="******" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Access</strong></label>
                            <select name="access_level" id="access" class="form-control" required>
                              <option value="">Select Access </option>
                              <option value="5">User</option>
                              <option value="4">SuperUser</option>
                              <option value="3">Manager</option>
                              <option value="2">Admin</option>
                              <option value="1">SuperAdmin</option>
                            </select>
                        </div>
                      </div>



                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>NOK Name</strong></label>
                            <input type="text" name="nok"  id="nokname" class="form-control" placeholder="Next of Kin Name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Relationship</strong></label>
                            <input type="text" name="relationship" id="relationship" class="form-control" placeholder="Relationship With NOK" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>NOK Phone</strong></label>
                            <input type="text" name="nok_phone" id="nokphone" class="form-control" placeholder="NOK Phone Number" required>
                            <input type="hidden" name="parameter2" id="parameter2" class="form-control" >
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="mb-2"><strong>New User Address</strong></label>
                            <textarea name="address"  id="address" class="form-control" required>
                            </textarea>
                        </div>
                      </div>



                  </div>
                  <div class="modal-footer">
                      <div id="test"></div>
                      <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>

                </form>
            </div>
        </div>
    </div>
<!-- Large modal -->


<script type="text/javascript">
$(document).ready(function(){

    $('.editProfileDataId').click(function(){
       var data_id = $(this).data('id');

        $.ajax({
            type:'POST',
            url:"<?php echo base_url('users/get_userRecord/')?>"+data_id,
            dataType: "json",
            data:{id:data_id},
            success:function(data)
            {
              $('#firstname').val(data.up_first_name);
              $('#surname').val(data.up_surname);
              $('#othername').val(data.up_othername);

              $('#gender').val(data.up_gender);
              $('#email').val(data.up_email);
              $('#phone').val(data.up_phone);

              $('#username').val(data.up_username);
              $('#password').val(data.up_password);
              $('#access').val(data.up_access_level);

              $('#nokname').val(data.up_nok_name);
              $('#relationship').val(data.up_relationship);
              $('#nokphone').val(data.up_nok_phone);

              $('#address').val(data.up_home_address);
              $('#parameter2').val(data_id);
            }
        });
    });
});
</script>
