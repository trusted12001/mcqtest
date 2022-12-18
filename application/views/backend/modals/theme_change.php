<?php
  $themeRecordSets = $this->settings_model->select_theme();
  ?>


  <div class="modal fade changeTheme" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form method="post" action="<?php echo base_url();?>settings/manage_company/themeManage/">
              <div class="modal-header">
                  <h5 class="modal-title">Change Theme</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal">
                  </button>
              </div>
              <div class="modal-body">

              <div class="form-check">
                  <input class="form-check-input" type="radio" name="theme_title" value="light" <?php if($themeRecordSets['t_title'] == "light"){ echo "checked";} ?>>
                  <label class="form-check-label">
                      Light Theme
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="theme_title" value="dark" <?php if($themeRecordSets['t_title'] == "dark"){ echo "checked";} ?>>
                  <label class="form-check-label">
                      Dark Theme
                  </label>
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
