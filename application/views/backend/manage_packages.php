    <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Manage Packages
              <a href="#" data-bs-toggle="modal" data-bs-target=".newProductAdd"  title="Add New Product">
                <button type="button" class="btn btn-rounded btn-primary">
                  <span class="btn-icon-start text-primary">
                    <i class="fa fa-plus"></i>
                  </span>Add Product
                </button>
              </a>
            </h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example2" class="display" style="min-width: 845px">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Package Name</th>
                              <th>Package Duration</th>
                              <th>Log Training</th>
                              <th>Price</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>

                      <?php
                        $productsRecordSet = $this->settings_model->select_packages();
                        foreach($productsRecordSet as $key => $eachProduct):
                      ?>
                          <tr>
                              <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                              <td><?php echo $eachProduct['pp_name']; ?></td>
                              <td><?php echo $eachProduct['pp_duration']; ?></td>
                              <td><?php echo mb_strtoupper($eachProduct['pp_training_required']); ?></td>
                              <td><a href="javascript:void(0);"><strong><?php echo "N ".number_format($eachProduct['pp_price'], 2); ?></strong></a></td>
                              <td>
      													<div class="d-flex">
      														<a href="#" data-id="<?php echo $eachProduct['product_packagestbl_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1 editPackageDataId" data-bs-toggle="modal" data-bs-target=".editPackage"><i class="fas fa-pencil-alt"></i></a>
      														<a href="<?php echo base_url();?>settings/manage_company/deletePackage/<?php echo $eachProduct['product_packagestbl_id']; ?>" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-trash btn btn-danger shadow btn-xs sharp  btn sweet-confirm sweet-success sweet-text sweet-message sweet-wrong"></i></a>
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
