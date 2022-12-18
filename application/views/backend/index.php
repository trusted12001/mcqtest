<!DOCTYPE html>
<html lang="en">
  <?php include_once('includes/head.php'); ?>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php include_once('includes/preloader.php'); ?>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include_once('includes/nav_header.php'); ?>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <?php include_once('includes/header.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include_once('includes/sidebar.php'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
          <?php include_once('includes/session_messages.php'); ?>
          <?php include_once $page_name.'.php'; ?>
        </div>


        <?php include_once('modals/user_changePassword.php'); ?>
        <?php include_once('modals/user_addNew.php'); ?>
        <?php include_once('modals/user_editRecord.php'); ?>
        <?php include_once('modals/student_addNew.php'); ?>
        <?php include_once('modals/student_editRecord.php'); ?>
        <?php include_once('modals/company_editRecord.php'); ?>
        <?php include_once('modals/theme_change.php'); ?>
        <?php include_once('modals/staff_addNew.php'); ?>
        <?php include_once('modals/staff_editRecord.php'); ?>
        <?php include_once('modals/exam_addNew.php'); ?>
        <?php include_once('modals/exam_editRecord.php'); ?>
        <?php include_once('modals/user_changeStatus.php'); ?>
        <?php include_once('modals/question_editRecord.php'); ?>
        <?php include_once('modals/pin_addNew.php'); ?>
        <?php include_once('modals/pin_addNew2.php'); ?>
        <?php include_once('modals/print_exam_pin.php'); ?>

        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        <?php include_once('includes/footer.php'); ?>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php include_once('includes/scripts.php'); ?>

</body>
</html>
