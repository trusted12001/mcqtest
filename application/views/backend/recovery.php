<?php
  $institution_name = $this->login_model->get_sch_info();
  ?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Sprint CBT - Recovery</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">


</head>

<body class="vh-100" style="background-color:black;">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="<?php echo base_url();?>assets/images/logo-full.png" alt=""></a>
									</div>
                  <hr />
                  <h3 class="text-center mb-4">LICENSED TO <?php echo strtoupper($institution_name['sch_name']); ?></h3>



                            <?php
                              if(isset($_SESSION['error_message']))
                              {
                              ?>
                              <div class="alert alert-danger solid alert-dismissible fade show">
                									<svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                									<strong>Error!</strong> <?php echo $_SESSION['error_message']; ?>
                									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                  </button>
                                </div>
                                <?php
                                }

                                if(isset($_SESSION['flash_message'])){
                                ?>
                                <div class="alert alert-success solid alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <strong>Success!</strong> <?php echo $_SESSION['flash_message']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>

                                <?php
                                }
                                ?>


                              <form method="post" action="<?php echo base_url();?>login/check_recovery">
                                  <div class="mb-3">
                                      <label class="mb-1"><strong style="color:red">Registered Email</strong></label>
                                      <input type="email" name="email" class="form-control" autofocus required>
                                      <input type="hidden" name="company_email" value="<?php echo strtoupper($institution_name['sch_email']); ?>" class="form-control" >
                                      <input type="hidden" name="company_name" value="<?php echo strtoupper($institution_name['sch_name']); ?>" class="form-control" >
                                  </div>
                                  <div class="row d-flex justify-content-between mt-4 mb-2">
                                      <div class="mb-3">
                                         <div class="form-check custom-checkbox ms-1">
              													     <label class="form-check-label" for="basic_checkbox_1"><b>Note:</b> Username problem? Contact Amin.</label>
              												    </div>
                                      </div>
                                  </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Recover Password</button>
                                    </div>
                                </form>
                                <div class="mt-3">
                                  <a href="<?php echo base_url();?>">Back To Login</a>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url();?>assets/vendor/global/global.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dlabnav-init.js"></script>


</body>
</html>
