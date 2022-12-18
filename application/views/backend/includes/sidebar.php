  <?php
    $companyRecordSet = $this->settings_model->select_company();
  ?>

<div class="dlabnav">
  <div class="dlabnav-scroll">
    <div class="dropdown header-profile2 ">
      <a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
        <div class="header-info2 d-flex align-items-center">
          <img src="<?php echo base_url();?>user_uploaded_img/settings/<?php echo $companyRecordSet['sch_logo']; ?>" alt=""/>
          <div class="d-flex align-items-center sidebar-info">
            <div>
              <span class="font-w400 d-block"><?php echo $this->session->userdata('name'); ?></span>
              <small class="text-end font-w400"><?php echo $companyRecordSet['sch_name']; ?></small>
            </div>
          </div>


        </div>
      </a>
    </div>
    <ul class="metismenu" id="menu">
      <?php if(($this->session->userdata('access_level') == 1)||($this->session->userdata('access_level')) == 2){ ?>
        <li>
          <a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Settings</span>
          </a>
            <ul aria-expanded="false">
              <li><a href="<?php echo base_url(); ?>settings/load_setupCompany">Setup Institution</a></li>
              <li data-bs-toggle="modal" data-bs-target=".changeTheme"><a href="#">Theme Colour</a></li>
              <li>
                <a href="<?php echo base_url(); ?>users/load_userProfile" aria-expanded="false">
                  <span class="nav-text">User Profile</span>
                </a>
              </li>
            </ul>
        </li>
        <?php } ?>


      <li>
        <a href="<?php echo base_url(); ?>students/load_studentProfile" aria-expanded="false">
          <i class="flaticon-093-waving"></i>
          <span class="nav-text">Student Profile</span>
        </a>
      </li>



        <?php if(($this->session->userdata('access_level') == 1)||($this->session->userdata('access_level')) == 2){ ?>
          <li>
            <a class="has-arrow " href="javascript:void()" aria-expanded="false">
              <i class="flaticon-086-star"></i>
              <span class="nav-text">CBT Management</span>
            </a>
            <ul aria-expanded="false">
              <li><a href="<?php echo base_url(); ?>exams/load_examManage">Setup Examination</a></li>
              <li><a href="<?php echo base_url(); ?>exams/load_queueQuestion">Questions Bank</a></li>
              <li><a href="#" data-bs-toggle="modal" data-bs-target=".newStudentPin">Generate PIN</a></li>
              <li><a href="<?php echo base_url(); ?>students/load_viewPin">Print PIN</a></li>
            </ul>
          </li>
        <?php } ?>


        <?php if(($this->session->userdata('access_level') == 1)||($this->session->userdata('access_level')) == 2){ ?>
          <li>
            <a class="has-arrow " href="javascript:void()" aria-expanded="false">
              <i class="flaticon-072-printer"></i>
              <span class="nav-text">Reports</span>
            </a>
              <ul aria-expanded="false">
                <li><a href="<?php echo base_url(); ?>transactions/load_studentTrainingRecord">Trainees Report</a></li>
                <li><a href="<?php echo base_url(); ?>transactions/load_instructorReports">Instructors Report</a></li>
              </ul>
          </li>
        <?php } ?>


    </ul>
  </div>
</div>
