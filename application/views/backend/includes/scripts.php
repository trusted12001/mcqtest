<!-- Required vendors -->
<script src="<?php echo base_url();?>assets/vendor/global/global.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins-init/sweetalert.init.js"></script>

<script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
<!-- Chart piety plugin files -->
<script src="<?php echo base_url();?>assets/vendor/peity/jquery.peity.min.js"></script>
<!-- Dashboard 1 -->
<script src="<?php echo base_url();?>assets/js/dashboard/dashboard-1.js"></script>
<script src="<?php echo base_url();?>assets/vendor/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url();?>assets/js/dashboard/statistics-page.js"></script>
<!-- Apex Chart -->
<script src="<?php echo base_url();?>assets/vendor/apexchart/apexchart.js"></script>
<!-- Datatable -->
<script src="<?php echo base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins-init/datatables.init.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/vendor/toastr/js/toastr.min.js"></script>
<!-- All init script -->
<script src="<?php echo base_url();?>assets/js/plugins-init/toastr-init.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<script src="<?php echo base_url();?>assets/vendor/pickadate/picker.js"></script>
<script src="<?php echo base_url();?>assets/vendor/pickadate/picker.time.js"></script>
<script src="<?php echo base_url();?>assets/vendor/pickadate/picker.date.js"></script>






<script src="<?php echo base_url();?>assets/vendor/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Daterangepicker -->
<script src="<?php echo base_url();?>assets/js/plugins-init/bs-daterange-picker-init.js"></script>

<script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dlabnav-init.js"></script>


<script>
jQuery(document).ready(function(){
  setTimeout(function(){
    dlabSettingsOptions.version = '<?php if($themeRecordSets['t_title']=='dark'){echo "dark";} ?>';
    new dlabSettings(dlabSettingsOptions);
  },1500)
});
function JobickCarousel()
  {

    /*  testimonial one function by = owl.carousel.js */
    jQuery('.front-view-slider').owlCarousel({
      loop:false,
      margin:30,
      nav:true,
      autoplaySpeed: 3000,
      navSpeed: 3000,
      autoWidth:true,
      paginationSpeed: 3000,
      slideSpeed: 3000,
      smartSpeed: 3000,
      autoplay: false,
      animateOut: 'fadeOut',
      dots:true,
      navText: ['', ''],
      responsive:{
        0:{
          items:1
        },

        480:{
          items:1
        },

        767:{
          items:3
        },
        1750:{
          items:3
        }
      }
    })
  }

  jQuery(window).on('load',function(){
    setTimeout(function(){
      JobickCarousel();
    }, 1000);
  });
</script>


<script>
function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }
</script>


<script>
  $(document).ready(function() {

    var counters = $(".count");
    var countersQuantity = counters.length;
    var counter = [];

    for (i = 0; i < countersQuantity; i++) {
    counter[i] = parseInt(counters[i].innerHTML);
    }

    var count = function(start, value, id) {
    var localStart = start;
    setInterval(function() {
      if (localStart < value) {
      localStart++;
      counters[id].innerHTML = localStart;
      }
    }, 40);
    }

    for (j = 0; j < countersQuantity; j++) {
    count(0, counter[j], j);
    }
  });
</script>
