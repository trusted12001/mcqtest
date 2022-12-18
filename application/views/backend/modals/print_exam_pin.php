
  <div class="modal fade printNewPin" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
            <form method="post">
              <div class="modal-header">
                  <button type="button" onClick="printdiv('newReceipt');" class="btn btn-primary">Print Receipt</button>
                  <button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div id="newReceipt" style="margin:auto; width:400px; background:#FFF;">
                  <div>
                      <img src="<?php echo base_url();?>assets/images/receipt_logo.jpg">
                  </div>
                  <div style="font-size: 21pt; text-align:center; color:black;">
                      <b><?php echo strtoupper($this->session->userdata('school_name')); ?></b>
                      <div style="font-size: medium;">
                        <?php echo strtoupper($this->session->userdata('school_num')).', '; ?><br />
                        <?php echo strtoupper($this->session->userdata('school_street')).', '.strtoupper($this->session->userdata('school_state')).'.'; ?><br />
                        <?php echo strtoupper($this->session->userdata('school_phone1')).', '.strtoupper($this->session->userdata('school_phone2')).', '.strtoupper($this->session->userdata('school_phone3')); ?><br />
                      </div>
                      <hr style="border:2px solid #000000; width:100%;" />
                  </div>

                  <div >
                    <table width="400px;" style="font-size:11pt; color:black; margin-left:11px;">
                      <tr>
                        <td>Date Issued:</td>
                        <td style="font-weight:bold;"><?php echo date('Y-m-d'); ?></td>
                      </tr>
                      <tr>
                        <td>Exam Title:</td>
                        <td id="exam_title" style="font-weight:bold;"></td>
                      </tr>
                      <tr>
                        <td>First Name:</td>
                        <td id="firstname_pin" style="font-weight:bold;"></td>
                      </tr>
                      <tr>
                        <td>Surname:</td>
                        <td id="surname_pin" style="font-weight:bold;"></td>
                      </tr>
                      <tr>
                        <td>Other Names:</td>
                        <td id="othername_pin" style="font-weight:bold;"></td>
                      </tr>
                      <tr>
                        <td>Expiry Date:</td>
                        <td id="pin_expiry" style="font-weight:bold;"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><hr style="border:2px solid #000000; width:98%;" /></td>
                      </tr>
                      <tr>
                        <td>PIN Number:</td>
                        <td id="pin_no" style="font-weight:bold; font-size:xx-large;"></td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Printed By: <div id="printed_by" style="font-weight:bold;"></div></td>
                        <td>_____________________</td>
                      </tr>

                      <tr>
                        <td></td>
                        <td style="text-align:center;">http://www.traffik.com.ng</td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>.</td>
                        <td></td>
                      </tr>


                    </table>
                  </div>

                </div>



              </div>
              <div class="modal-footer"></div>
            </form>
          </div>
      </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.loadPinInfo').click(function(){
         var data_id_for_pin = $(this).data('id');
         //alert(data_id);
          $.ajax({
              type:'POST',
              url:"<?php echo base_url('students/get_pinInfo/')?>"+data_id_for_pin,
              dataType: "json",
              data:{id:data_id_for_pin},
              success:function(data)
              {
                $('#exam_title').html(data.est_course_title+'-'+data.est_course_level);
                $('#firstname_pin').html(data.sp_first_name);
                $('#surname_pin').html(data.sp_surname);
                $('#othername_pin').html(data.sp_othername);
                $('#pin_no').html(data.ept_pin_no);
                $('#pin_expiry').html(data.ept_expiry_date);

                $('#printed_by').html(data.ept_added_by);
              }
          });
      });
  });
  </script>

  <script language="javascript">
      function printdiv(newReceipt) {
          var headstr = "<html><head><title></title></head><body>";
          var footstr = "</body>";
          var newstr = document.all.item(newReceipt).innerHTML;
          var oldstr = document.body.innerHTML;
          document.body.innerHTML = headstr + newstr + footstr;
          window.print();
          document.body.innerHTML = oldstr;
          return false;
      }
  </script>
