<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modalGrid">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="container">


                  <form method="post" action="<?php echo base_url();?>login/user_changePassword">
                    <div class="mb-3">
                        <label class="mb-1"><strong>Old Password</strong></label>
                        <input type="password" name="old_password" class="form-control" placeholder="********" required>
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>New Password</strong></label>
                        <input type="password" name="new_password" class="form-control" placeholder="********" required>
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Confirm New Password</strong></label>
                        <input type="password" name="confirm_new_password" class="form-control" placeholder="********" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Large modal -->
