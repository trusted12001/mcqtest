    <!-- row -->
<div class="container-fluid">

  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Manage Examinations  <a href="#" data-bs-toggle="modal" data-bs-target=".newExam" title="New Examination"><img style="margin-left: 36px;" src="<?php echo base_url(); ?>assets/images/newUser.png" ></a> </h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table id="example2" class="display" style="min-width: 845px">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Title</th>
                              <th>Level</th>
                              <th>Questions</th>
                              <th>Duration</th>
                              <th>Pass Mark</th>
                              <th>Instructions</th>
                              <th>Action(s)</th>
                          </tr>
                      </thead>
                      <tbody>

                      <?php
                        $examsRecordset = $this->exams_model->select_exams();
                        foreach($examsRecordset as $key => $eachExam):
                      ?>
                          <tr>
                              <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                              <td><?php echo $eachExam['est_course_title']; ?></td>
                              <td><?php if($eachExam['est_course_level'] == 1){ echo "Beginer"; }elseif($eachExam['est_course_level']==2){ echo "Intermediate"; }elseif($eachExam['est_course_level']==3){ echo "Advanced"; } ?></td>
                              <td><?php echo $eachExam['est_no_of_question']; ?></td>
                              <td><?php echo $eachExam['est_duration']; ?></td>
                              <td><a href="javascript:void(0);"><strong><?php echo $eachExam['est_pass_mark']; ?></strong></a></td>
                              <td><?php echo $eachExam['est_instruction']; ?></td>

                              <td>
                                <div class="d-flex">
                                    <a href="#" data-id="<?php echo $eachExam['est_id']; ?>" class="btn btn-primary shadow btn-xs sharp me-1 editExamRecord" data-bs-toggle="modal" data-bs-target=".editExam"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?php echo base_url();?>exams/manage_exam/delete/<?php echo $eachExam['est_id']; ?>" onclick="return confirm('Confirm Permanent Delete?');"><i class="fa fa-trash btn btn-danger shadow btn-xs sharp  btn sweet-text"></i></a>
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
