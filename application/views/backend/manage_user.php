    <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Manage User Profile  <a href="#" data-bs-toggle="modal" data-bs-target=".newProfile" title="Add New User"><img style="margin-left: 36px;" src="<?php echo base_url(); ?>assets/images/newUser.png" ></a> </h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example2" class="display" style="min-width: 845px">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Name</th>
                              <th>Surname</th>
                              <th>Other Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                      <?php
                        $userRecordSet = $this->users_model->select_users();
                        foreach($userRecordSet as $key => $eachUser):
                      ?>
                          <tr style="color:<?php if($eachUser['up_account_status'] == 0){ echo 'red'; } ?>;">
                              <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                              <td><?php echo $eachUser['up_first_name']; ?></td>
                              <td><?php echo $eachUser['up_surname']; ?></td>
                              <td><?php echo $eachUser['up_othername']; ?></td>
                              <td><?php echo $eachUser['up_username']; ?></td>
                              <td><a href="javascript:void(0);"><strong><?php echo $eachUser['up_email']; ?></strong></a></td>
                              <td><a href="javascript:void(0);"><strong><?php echo $eachUser['up_phone']; ?></strong></a></td>
                              <td><a href="javascript:void(0);" data-id="<?php echo $eachUser['user_profiletbl_id']; ?>" class="account_status" data-bs-toggle="modal" data-bs-target=".account_statusModal"><?php if($eachUser['up_account_status'] == 1){ echo 'Active'; } else { echo 'Inactive'; } ?></a></td>

                              <td>
      													<div class="d-flex">
      														<a href="#" data-id="<?php echo $eachUser['user_profiletbl_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1 editProfileDataId" data-bs-toggle="modal" data-bs-target=".editProfile"><i class="fas fa-pencil-alt"></i></a>
      														<a href="<?php echo base_url();?>users/manage_user/delete/<?php echo $eachUser['user_profiletbl_id']; ?>/<?php echo $eachUser['up_account_status']; ?>"><i class="fa fa-trash btn btn-danger shadow btn-xs sharp  btn sweet-confirm sweet-success sweet-text sweet-message sweet-wrong"></i></a>
      													</div>
			                        </td>
                          </tr>

                            <?php
                            endforeach;
                            ?>

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

</div>
