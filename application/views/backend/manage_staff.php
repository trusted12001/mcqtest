    <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Staff Profile
              <a href="#" data-bs-toggle="modal" data-bs-target=".newStaffAdd"  title="Add Staff Profile">
                <button type="button" class="btn btn-rounded btn-primary">
                  <span class="btn-icon-start text-primary">
                    <i class="fa fa-plus"></i>
                  </span>Add Staff Profile
                </button>
              </a>
            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="display" style="width:100%">
                  <thead>
                      <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Dept</th>
                        <th>Phone</th>
                        <th>Bank</th>
                        <th>Account No</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                    <tbody>
                      <?php
                        $s_prof_RecordSet = $this->settings_model->select_staffProfile();
                        foreach($s_prof_RecordSet as $key => $eachSprof):
                      ?>
                          <tr>
                              <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                              <td><strong><?php echo $eachSprof['s_prof_first_name']; ?></strong></td>
                              <td><strong><?php echo $eachSprof['s_prof_surname']; ?></strong></td>
                              <td><?php echo strtoupper($eachSprof['s_prof_dept']); ?></td>
                              <td><?php echo $eachSprof['s_prof_phone']; ?></td>
                              <td><?php echo $eachSprof['s_prof_bank']; ?></td>
                              <td><?php echo $eachSprof['s_prof_account_number']; ?></td>
                              <td>
                                <span class="badge light <?php if($eachSprof['s_prof_status']=='Available'){ echo "badge-success";}else{ echo "badge-danger";} ?>">
                                  <?php echo $eachSprof['s_prof_status']; ?>
                                </span>
                              </td>

                              <td>
      													<div class="d-flex">
      														<a href="#" data-id="<?php echo $eachSprof['staff_profiletbl_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1 editStaffDataId" data-bs-toggle="modal" data-bs-target=".editStaffProfile"><i class="fas fa-pencil-alt"></i></a>
      														<a href="<?php echo base_url();?>settings/manage_company/deactivateStaff/<?php echo $eachSprof['staff_profiletbl_id']; ?>/<?php echo $eachSprof['s_prof_status']; ?>" onclick="return confirm('Are you sure you want to go on with this action ?');" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"> </i></a>
      													</div>
			                        </td>
                          </tr>

                            <?php
                            endforeach;
                            ?>

                    </tbody>
                    <tfoot>
                        <tr>
                          <th></th>
                          <th>First Name</th>
                          <th>Surname</th>
                          <th>Dept</th>
                          <th>Phone</th>
                          <th>Bank</th>
                          <th>Account No</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
          </div>
      </div>
  </div>

</div>
