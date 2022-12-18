    <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
            <h4 class="card-title">
              List of Generated PIN
            </h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example2" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Full Name</th>
                            <th>Exam & Level</th>
                            <th>Date</th>
                            <th>Expiry</th>
                            <th>Form No.</th>
                            <th>PIN</th>
                            <th>Print</th>
                        </tr>
                    </thead>
                      <tbody>
                        <?php
                          $studentPinRecordSet = $this->students_model->select_studentPin();
                          foreach($studentPinRecordSet as $key => $eachStudent):
                        ?>
                            <tr>
                                <td><img class="rounded-circle" width="16" src="images/profile/small/pic1.jpg" alt=""></td>
                                <td><a href="javascript:void(0);"><strong><?php echo $eachStudent['sp_first_name'].' '.$eachStudent['sp_surname'].' '.$eachStudent['sp_othername']; ?></strong></td>
                                <td><?php echo $eachStudent['est_course_title'].'-'.$eachStudent['est_course_level']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($eachStudent['ept_date_added'])); ?></td>
                                <td><?php echo $eachStudent['ept_expiry_date']; ?></td>
                                <td><?php echo $eachStudent['sp_form_no']; ?></strong></a></td>
                                <td><?php echo $eachStudent['ept_pin_no']; ?></a></td>
                                <td>
                                  <a href="#" data-id="<?php echo $eachStudent['ept_id']; ?>" class="btn shadow btn-xs sharp me-1 loadPinInfo" data-bs-toggle="modal" data-bs-target=".printNewPin"><span class="badge light badge-success"><i class="fa fa-print text-success me-1"></i> Preview</span></a>
                                </td>

                            </tr>

                              <?php
                                endforeach;
                              ?>

                      </tbody>
                      <tfoot>
                          <tr>
                            <th></th>
                            <th>Full Name</th>
                            <th>Exam & Level</th>
                            <th>Date</th>
                            <th>Expiry</th>
                            <th>Form No.</th>
                            <th>PIN</th>
                            <th>Print</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
  </div>

</div>

