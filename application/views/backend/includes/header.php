

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
      <div class="header-left">
      <div class="dashboard_bar">
            <?php echo $page_title; ?>
      </div>

    <form id="dash_search" method="post" action="<?php echo base_url();?>login/check_login">
      <div class="nav-item d-flex align-items-center">
        <div class="input-group search-area" title="Search!">
            <input type="text" class="form-control" placeholder="Search Student">
          <span class="input-group-text"><a id="dash_btn" href="#"><i class="flaticon-381-search-2"></i></a></span>
        </div>
        <div class="plus-icon" title="Add New Student">
          <a href="#" data-bs-toggle="modal" data-bs-target=".newStudentProfile"><i class="fas fa-plus"></i></a>
        </div>
      </div>
    </form>

    </div>

    <script>
    var form = document.getElementById("dash_search");
    document.getElementById("dash_btn").addEventListener("click", function () {
      form.submit();
    });
    </script>

    <?php
      // Recordset to get expired prticulars
      // $got_expiredMaintenance = $this->transactions_model->get_expiredMaintenance();
      // $got_expiredParticulars = $this->transactions_model->get_expiredParticulars();
    ?>

    <ul class="navbar-nav header-right">
      <li class="nav-item dropdown notification_dropdown">
        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <g  data-name="Layer 2" transform="translate(-2 -2)">
            <path id="Path_20" data-name="Path 20" d="M22.571,15.8V13.066a8.5,8.5,0,0,0-7.714-8.455V2.857a.857.857,0,0,0-1.714,0V4.611a8.5,8.5,0,0,0-7.714,8.455V15.8A4.293,4.293,0,0,0,2,20a2.574,2.574,0,0,0,2.571,2.571H9.8a4.286,4.286,0,0,0,8.4,0h5.23A2.574,2.574,0,0,0,26,20,4.293,4.293,0,0,0,22.571,15.8ZM7.143,13.066a6.789,6.789,0,0,1,6.78-6.78h.154a6.789,6.789,0,0,1,6.78,6.78v2.649H7.143ZM14,24.286a2.567,2.567,0,0,1-2.413-1.714h4.827A2.567,2.567,0,0,1,14,24.286Zm9.429-3.429H4.571A.858.858,0,0,1,3.714,20a2.574,2.574,0,0,1,2.571-2.571H21.714A2.574,2.574,0,0,1,24.286,20a.858.858,0,0,1-.857.857Z"/>
            </g>
          </svg>
          <span class="badge light text-white bg-primary rounded-circle">
            <?php
              // echo count($got_expiredMaintenance)+count($got_expiredParticulars);
             ?>
          </span>
          </a>
      <div class="dropdown-menu dropdown-menu-end">
          <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
            <ul class="timeline">

              <?php
                // foreach($got_expiredMaintenance as $key => $eachMaintenance):
              ?>
              <li>
                <div class="timeline-panel">
                  <div class="media me-2 media-primary">
                    <i class="fa fa-home"></i>
                  </div>
                  <div class="media-body">
                    <a href="<?php echo base_url();?>transactions/load_maintenanceLogAlert/<?php //echo $eachMaintenance['vehicle_tbl_id'];?>">
                      <h6 class="mb-1">Maintenance : <?php //echo $eachMaintenance['v_make'].' '.$eachMaintenance['v_model'].' '.$eachMaintenance['v_traffik_number']; ?></h6>
                      <small class="d-block"><?php //echo $eachMaintenance['mlt_service_date'].' - '.$eachMaintenance['mlt_next_service_date']; ?></small>
                    </a>
                  </div>
                </div>
              </li>
              <?php
              // endforeach;
              ?>



              <?php
                //foreach($got_expiredParticulars as $key => $eachParticular):
              ?>
              <li>
                <div class="timeline-panel">
                  <div class="media me-2 media-primary">
                    <i class="fa fa-home"></i>
                  </div>
                  <div class="media-body">
                    <a href="<?php echo base_url();?>transactions/load_particularsLogAlert/<?php //echo $eachParticular['vehicle_tbl_id'];?>">  
                      <h6 class="mb-1">Papers : <?php //echo $eachParticular['v_make'].' '.$eachParticular['v_model'].' '.$eachParticular['v_traffik_number']; ?></h6>
                      <small class="d-block"><?php //echo $eachParticular['plt_licence_date'].' - '.$eachParticular['plt_licence_expiry']; ?></small>
                    </a>
                  </div>
                </div>
              </li>
              <?php
              //endforeach;
              ?>

            </ul>

          </div>
          <a class="all-notification" href="javascript:void(0);">Scroll to see more! <i class="ti-arrow-end"></i></a>
      </div>
  </li>



      <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="<?php echo base_url();?>assets/images/profile/user.jpg" width="20" alt=""/>
                        </a>
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                          <i class="fas fa-chevron-down"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">

                            <a href="#" class="dropdown-item ai-icon">
                                <svg id="icon-inbox1" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 46c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span class="ms-2" data-bs-toggle="modal" data-bs-target="#modalGrid">Change Password </span>
                            </a>
                            <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item ai-icon" onclick="return confirm('Are you sure you want to log out?');" >
                                <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ms-2">Logout </span>
                            </a>


                        </div>
                    </li>
                </ul>
            </div>
</nav>
</div>
</div>
