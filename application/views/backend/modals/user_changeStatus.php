<!-- Button trigger modal -->

  <div class="modal fade account_statusModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form method="post" action="<?php echo base_url();?>users/change_status/">
              <div class="modal-header">
                  <h5 class="modal-title">Change Account Status</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
              </div>
              <div class="modal-body">

              <div class="form-check">
                  <input class="form-check-input" type="radio" name="selected_status" value="0" >
                  <label class="form-check-label">
                      Deactivate
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="selected_status" value="1" >
                  <label class="form-check-label">
                      Activate
                  </label>
                  <input type="hidden" id="new_accountStatus" name="new_accountStatus">
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

    $('.account_status').click(function(){
       var accountId = $(this).data('id');
       $('#new_accountStatus').val(accountId);
    });
});
</script>
