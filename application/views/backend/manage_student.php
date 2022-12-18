    <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              Manage Student Profile
              <a href="#" data-bs-toggle="modal" data-bs-target=".newStudentProfile"  title="Add Staff Profile">
                <button type="button" class="btn btn-rounded btn-primary">
                  <span class="btn-icon-start text-primary">
                    <i class="fa fa-plus"></i>
                  </span>Add Student
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
                            <th>Date</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Other Name</th>
                            <th>Form No.</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                      <tbody>
                        <?php
                          $studentRecordSet = $this->students_model->select_students();
                          foreach($studentRecordSet as $key => $eachStudent):
                        ?>
                            <tr>
                                <td><img class="rounded-circle" width="16" src="images/profile/small/pic1.jpg" alt=""></td>
                                <td><?php echo $eachStudent['sp_profile_date']; ?></td>
                                <td><a href="javascript:void(0);"><strong><?php echo $eachStudent['sp_first_name']; ?></strong></td>
                                <td><a href="javascript:void(0);"><strong><?php echo $eachStudent['sp_surname']; ?></strong></td>
                                <td><?php echo $eachStudent['sp_othername']; ?></td>
                                <td><?php echo $eachStudent['sp_form_no']; ?></strong></a></td>
                                <td><?php echo $eachStudent['sp_phone']; ?></a></td>

                                <td>
        													<div class="d-flex">
        														<a href="#" data-id="<?php echo $eachStudent['student_profiletbl_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1 editStudentDataId" data-bs-toggle="modal" data-bs-target=".editStudentProfile"><i class="fas fa-pencil-alt"  title="Edit"></i></a>

                                    
                                        <a href="<?php echo base_url();?>students/manage_student/delete/<?php echo $eachStudent['student_profiletbl_id']; ?>" onclick="return confirm('Are you sure you want to permanently delete <?php echo $eachStudent['sp_first_name']; ?> ?');" class="btn btn-danger  me-1 shadow btn-xs sharp"  title="Delete"><i class="fa fa-trash"> </i></a>

                                    
                                        <a href="#" data-bs-toggle="modal" data-bs-target=".newStudentPin2" class="btn btn-danger shadow btn-xs sharp student_id_for_pin" title="Generate PIN" data-id="<?php echo $eachStudent['student_profiletbl_id']; ?>"><i class="fa fa-key"> </i></a>
                                   
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
                            <th>Date</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Other Name</th>
                            <th>Form No.</th>
                            <th>Phone</th>
                            <th>Action</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
  </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.student_id_for_pin').click(function(){
        var student_id_for_pin = $(this).data('id');

        $('#std_id_for_pin').val(student_id_for_pin);
        });
    });
</script>
