<!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade editStudentProfile" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Student Record</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal">
                      </button>
                  </div>
                  <form method="post" action="<?php echo base_url();?>students/manage_student/update">
                  <div class="modal-body">

                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>First Name</strong></label>
                            <input type="text" name="firstname" id="firstname_ser" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Surname</strong></label>
                            <input type="text" name="surname" id="surname_ser" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Other Names</strong></label>
                            <input type="text" name="othername" id="othername_ser" class="form-control">
                        </div>
                      </div>


                      <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Form Number</strong></label>
                            <input type="text" name="form_no" id="form_no_ser" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2"><strong>Phone</strong></label>
                            <input type="text" name="phone" id="phone_ser" class="form-control" required>
                            <input type="hidden" name="parameter2" id="parameter2_ser" class="form-control" >
                        </div>
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Record</button>
                  </div>

                </form>
            </div>
        </div>
    </div>
<!-- Large modal -->


<script type="text/javascript">
$(document).ready(function(){

    $('.editStudentDataId').click(function(){
       var data_id = $(this).data('id');

        $.ajax({
          //alert(data_id);
            type:'POST',
            url:"<?php echo base_url('students/get_studentRecord/')?>"+data_id,
            dataType: "json",
            data:{id:data_id},
            success:function(data)
            {
              $('#firstname_ser').val(data.sp_first_name);
              $('#surname_ser').val(data.sp_surname);
              $('#othername_ser').val(data.sp_othername);
              $('#form_no_ser').val(data.sp_form_no);
              $('#phone_ser').val(data.sp_phone);
              $('#parameter2_ser').val(data_id);
            }
        });
    });
});
</script>
