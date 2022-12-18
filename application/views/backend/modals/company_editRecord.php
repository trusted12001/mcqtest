<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade editCompany" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Institution Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>settings/manage_company/update/" enctype="multipart/form-data">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Institution Name</strong></label>
                            <input type="text" name="company_name" id="company_name_cer" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Plot Number</strong></label>
                            <input type="text" name="plot_number" id="plot_number_cer" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Street Name</strong></label>
                            <input type="text" name="street" id="street_cer" class="form-control" required>
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Local Government Area</strong></label>
                            <input type="text" name="lga" id="lga_cer" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>State of Operation</strong></label>
                            <input type="text" name="state" id="state_cer" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Website Address</strong></label>
                            <input type="text" name="website" id="website_cer" class="form-control" >
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Email Address</strong></label>
                            <input type="email" name="email" id="email_cer" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Official Phone Line</strong></label>
                            <input type="text" name="phone1" id="phone1_cer" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Contact Line 1</strong></label>
                            <input type="text" name="phone2" id="phone2_cer" class="form-control" >
                        </div>

                      </div>



                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Contact Line 2</strong></label>
                            <input type="text" name="phone3" id="phone3_cer" class="form-control" >
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Institution Logo</strong></label>
                            <input type="file" name="logo" id="logo_cer" class="form-control" >
                            <strong>[53 x 53, png, Not more than 120kb]</strong>
                            <input type="hidden" name="parameter2" value="1" class="form-control" >
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

    $('.editCompanyDataId').click(function(){
       var data_id_cer = $(this).data('id');

        $.ajax({
            type:'POST',
            url:"<?php echo base_url('settings/get_companyRecord/')?>"+data_id_cer,
            dataType: "json",
            data:{id:data_id_cer},
            success:function(data)
            {
              $('#company_name_cer').val(data.sch_name);
              $('#plot_number_cer').val(data.sch_house_num);
              $('#street_cer').val(data.sch_street_name);

              $('#lga_cer').val(data.sch_local_govt);
              $('#state_cer').val(data.sch_state);
              $('#website_cer').val(data.sch_website);

              $('#email_cer').val(data.sch_email);
              $('#phone1_cer').val(data.sch_phone1);
              $('#phone2_cer').val(data.sch_phone2);

              $('#phone3_cer').val(data.sch_phone3);
              $('#logo_cer').val(data.sch_logo);
            }
        });
    });
});
</script>
