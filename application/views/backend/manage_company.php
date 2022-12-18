    <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">
                Update Institution Information
                <a href="#" data-bs-toggle="modal" data-bs-target=".editCompany"  title="Edit Company Info">
                  <button  data-id="1" type="button" class="btn btn-rounded btn-primary editCompanyDataId">
                    <span class="btn-icon-start text-primary">
                      <i class="fa fa-upload"></i>
                    </span>Update
                  </button>
                </a>
              </h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">

                      <?php
                        //$companyRecordSet = $this->settings_model->select_company();
                        // This recordset has been moved to the sidebar.php for harmonization
                      ?>

                          <div class="col-12">
                  						<div class="text-white bg-default">
                  							<ul class="list-group list-group-flush">
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Institution Name :</span><strong><?php echo $companyRecordSet['sch_name']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Plot Number :</span><strong><?php echo $companyRecordSet['sch_house_num']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Street Name :</span><strong><?php echo $companyRecordSet['sch_street_name']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Local Government Area :</span><strong><?php echo $companyRecordSet['sch_local_govt']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">State of Operation :</span><strong><?php echo $companyRecordSet['sch_state']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Official Website :</span><strong><?php echo $companyRecordSet['sch_website']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Official Email :</span><strong><?php echo $companyRecordSet['sch_email']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Official Telephone Line :</span><strong><?php echo $companyRecordSet['sch_phone1']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Contact Telephone 2 :</span><strong><?php echo $companyRecordSet['sch_phone2']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Contact Telephone 3 :</span><strong><?php echo $companyRecordSet['sch_phone3']; ?></strong></li>
                  								<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Institution Logo :</span><strong><?php echo $companyRecordSet['sch_logo']; ?></strong></li>
                  							</ul>
                  						</div>
                  					</div>

                  <!--- To be used later in the project
                      <button class="btn btn-warning btn sweet-confirm sweet-success sweet-text sweet-message sweet-wrong">Sweet Confirm</button>
                  --->
              </div>
          </div>
      </div>
  </div>

</div>
