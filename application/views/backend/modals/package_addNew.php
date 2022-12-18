<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade newProductAdd" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add New Package</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>settings/manage_company/newPackage">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Package Title</strong></label>
                            <input type="text" name="package" class="form-control" placeholder="Package Title" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Package Duration</strong></label>
                            <input type="text" name="duration" class="form-control" placeholder="Duration in Week(s)" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Price</strong></label>
                            <input type="text" name="price" class="form-control" onkeypress="return isNumber(event)" placeholder="Price" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="mb-3 mb-0 form-check">
                            <label class="radio-inline me-3"><input type="radio" value="yes" name="trainingLogRequired" required> Required Training Log</label>
                            <label class="radio-inline me-3"><input type="radio" value="no" name="trainingLogRequired" required> No Training Log</label>
                        </div>
                      </div>


                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Package</button>
                  </div>

                </form>
            </div>
        </div>
    </div>


<!-- Large modal -->
