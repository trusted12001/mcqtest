<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade newProfile" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add New User</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>users/manage_user/create">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>First Name</strong></label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
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
                            <label class="mb-2"><strong>Gender</strong></label>
                            <select name="gender" class="form-control" required>
                              <option value="">Select Gender </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Phone</strong></label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Username</strong></label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Password</strong></label>
                            <input type="password" name="password" class="form-control" placeholder="******" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Access</strong></label>
                            <select name="access_level" class="form-control" required>
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
                            <input type="text" name="nok" class="form-control" placeholder="Next of Kin Name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Relationship</strong></label>
                            <input type="text" name="relationship" class="form-control" placeholder="Relationship With NOK" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>NOK Phone</strong></label>
                            <input type="text" name="nok_phone" class="form-control" placeholder="NOK Phone Number" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="mb-2"><strong>New User Address</strong></label>
                            <textarea name="address" class="form-control" required>
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


<!-- Large modal -->
