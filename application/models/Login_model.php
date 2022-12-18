<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Login_model extends CI_Model {

	function __construct(){
        parent::__construct();
    	}

	//To get current driving school info
   function get_sch_info(){
       $this->db->select('*');
       $this->db->from('sch_info_tbl');
	   $this->db->where('sch_status = ', 'Active');
       $query = $this->db->get()->row_array();
        return $query;
        }

	//To check if the username and password match
    function loginCheck(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $credential = array('up_username' => $username, 'up_password' => md5($username.$password), 'up_account_status'=>'1');
        $query = $this->db->get_where('user_profile_tbl', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

						//Set sessions from above recordset
						$this->session->set_userdata('access_level', $row->up_access_level);
						$this->session->set_userdata('login_status', '1');
						$this->session->set_userdata('current_user_id', $row->user_profiletbl_id);
						$this->session->set_userdata('name', $row->up_first_name);
						$this->session->set_userdata('username', $row->up_username);
						$this->session->set_userdata('email', $row->up_email);

					//Recordset to get driving school info into session
						$credential2 = array('sch_info_id' => 1);
						$query2 = $this->db->get_where('sch_info_tbl', $credential2);
						if ($query2->num_rows() > 0) {
						$row2 = $query2->row();

						//Set sessions from above recordset
						$this->session->set_userdata('school_name', $row2->sch_name);
						$this->session->set_userdata('school_num', $row2->sch_house_num);
						$this->session->set_userdata('school_street', $row2->sch_street_name);
						$this->session->set_userdata('school_lg', $row2->sch_local_govt);
						$this->session->set_userdata('school_state', $row2->sch_state);
						$this->session->set_userdata('school_website', $row2->sch_website);
						$this->session->set_userdata('school_mail', $row2->sch_email);
						$this->session->set_userdata('school_phone1', $row2->sch_phone1);
						$this->session->set_userdata('school_phone2', $row2->sch_phone2);
						$this->session->set_userdata('school_phone3', $row2->sch_phone3);
						}

						//After passing the check, log Activity
						$data['action_performed'] = 'Successfully Logged In';
		        $data['action_by'] = $this->session->userdata('username');
		        $data['action_status'] = 'Success';
		        $this->db->insert('activity_log', $data);

				//If username and password doen't match then send user back to login
					}elseif ($query->num_rows() == 0) {
			    $this->session->set_flashdata('error_message', 'Invalid Login Detail');

						//After failing the check, log Activity
						$data['action_performed'] = 'Attempted Loging In';
						$data['action_by'] = $this->input->post('username');
						$data['action_status'] = 'Failed Attempt';
						$this->db->insert('activity_log', $data);
			      redirect(base_url() , 'refresh');
        }
			}


function userChangePassFunction(){
						$old_password_supplied 			= md5($this->session->userdata('username').$this->input->post('old_password'));
						$new_password 							= md5($this->session->userdata('username').$this->input->post('new_password'));
		        $confirm_new_password				= md5($this->session->userdata('username').$this->input->post('confirm_new_password'));

						$username 				= $this->session->userdata('username');
						$credential 			= array('up_username' => $username);
						$query = $this->db->get_where('user_profile_tbl', $credential);
						if ($query->num_rows() > 0) {
								$profile_id = $query->row()->user_profiletbl_id;
								$existing_password = $query->row()->up_password;
								}

						if(($new_password == $confirm_new_password) && ($old_password_supplied == $existing_password)){
									$page_data['up_password'] = $new_password;
									$this->db->where('user_profiletbl_id', $profile_id);
									$this->db->update('user_profile_tbl', $page_data);

									//After passing the check, log Activity
									$data_log['action_performed'] = 'User Changed Password';
									$data_log['action_by'] = $username;
									$data_log['action_status'] = 'Changed Successfully';
									$this->db->insert('activity_log', $data_log);

								}else{
							// Password do not
						//	$this->session->sess_destroy();
							$this->session->set_flashdata('error_message', 'Passwords Do Not Match!');

							//After failing the check, log Activity
							$data_log['action_performed'] = 'Attempted Changing, Password Not Unmatched';
							$data_log['action_by'] = $username;
							$data_log['action_status'] = 'Password Do Not Match';
							$this->db->insert('activity_log', $data_log);

							redirect(base_url(), 'refresh');
							}
						}



						function recoveryCheckFunction(){
								        $email 					= $this->input->post('email');
												$company_name 	= $this->input->post('company_name');
												$company_email 	= $this->input->post('company_email');
												$token_expires 	= date("Y-m-d h:i:s", strtotime('+20 minutes'));
								        $credential 		= array('up_email' => $email);

								        $query = $this->db->get_where('user_profile_tbl', $credential);
								        if ($query->num_rows() > 0) {
								            $row = $query->row();

														$token = md5($email.$token_expires);
														$data['up_token'] = md5($email.$token_expires);
														$data['up_token_expires'] = $token_expires;

										        $this->db->where('up_email', $this->input->post('email'));
										        $this->db->update('user_profile_tbl', $data);

														//Sending mail starts here.
														$from = "'$company_name' <$company_email>";
														$subject = 'RESET YOUR PASSWORD';
														$message = '<!DOCTYPE html>
																				<html>
																				<head>

																				  <meta charset="utf-8">
																				  <meta http-equiv="x-ua-compatible" content="ie=edge">
																				  <title>Sprint Password Reset</title>
																				  <meta name="viewport" content="width=device-width, initial-scale=1">
																				  <style type="text/css">
																				  /**
																				   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
																				   */
																				  @media screen {
																				    @font-face {
																				      font-family: \'Source Sans Pro\';
																				      font-style: normal;
																				      font-weight: 400;
																				      src: local(\'Source Sans Pro Regular\'), local(\'SourceSansPro-Regular\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format(\'woff\');
																				    }

																				    @font-face {
																				      font-family: \'Source Sans Pro\';
																				      font-style: normal;
																				      font-weight: 700;
																				      src: local(\'Source Sans Pro Bold\'), local(\'SourceSansPro-Bold\'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format(\'woff\');
																				    }
																				  }

																				  /**
																				   * Avoid browser level font resizing.
																				   * 1. Windows Mobile
																				   * 2. iOS / OSX
																				   */
																				  body,
																				  table,
																				  td,
																				  a {
																				    -ms-text-size-adjust: 100%; /* 1 */
																				    -webkit-text-size-adjust: 100%; /* 2 */
																				  }

																				  /**
																				   * Remove extra space added to tables and cells in Outlook.
																				   */
																				  table,
																				  td {
																				    mso-table-rspace: 0pt;
																				    mso-table-lspace: 0pt;
																				  }

																				  /**
																				   * Better fluid images in Internet Explorer.
																				   */
																				  img {
																				    -ms-interpolation-mode: bicubic;
																				  }

																				  /**
																				   * Remove blue links for iOS devices.
																				   */
																				  a[x-apple-data-detectors] {
																				    font-family: inherit !important;
																				    font-size: inherit !important;
																				    font-weight: inherit !important;
																				    line-height: inherit !important;
																				    color: inherit !important;
																				    text-decoration: none !important;
																				  }

																				  /**
																				   * Fix centering issues in Android 4.4.
																				   */
																				  div[style*="margin: 16px 0;"] {
																				    margin: 0 !important;
																				  }

																				  body {
																				    width: 100% !important;
																				    height: 100% !important;
																				    padding: 0 !important;
																				    margin: 0 !important;
																				  }

																				  /**
																				   * Collapse table borders to avoid space between cells.
																				   */
																				  table {
																				    border-collapse: collapse !important;
																				  }

																				  a {
																				    color: #1a82e2;
																				  }

																				  img {
																				    height: auto;
																				    line-height: 100%;
																				    text-decoration: none;
																				    border: 0;
																				    outline: none;
																				  }
																				  </style>

																				</head>
																					<body style="background-color: #e9ecef;">
																						<!-- start preheader -->
																						<div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
																							We hope that you find this email a useful tool in your password recovery quest.
																						</div>
																						<!-- end preheader -->

																						<!-- start body -->
																						<table border="0" cellpadding="0" cellspacing="0" width="100%">
																						<!-- start logo -->
																							<tr>
																								<td align="center" bgcolor="#e9ecef">
																								</td>
																							</tr>
																						<!-- end logo -->
																						<!-- start hero -->
																							<tr>
																								<td align="center" bgcolor="#e9ecef">
																									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
																										<tr>
																											<td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
																												<div align="center" valign="top"> </div>
																												<h1 align="center" style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Reset Your Password</h1>
																											</td>
																										</tr>
																									</table>
																								</td>
																							</tr>
																						<!-- end hero -->
																						<!-- start copy block -->
																							<tr>
																								<td align="center" bgcolor="#e9ecef">
																									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
																									<!-- start copy -->
																										<tr>
																											<td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																												<p style="margin: 0;">Tap the button below to reset your user account password. If you didn\'t send a request, you can safely delete this email.</p>
																											</td>
																										</tr>
																									<!-- end copy -->
																									<!-- start button -->
																									<tr>
																										<td align="left" bgcolor="#ffffff">
																											<table border="0" cellpadding="0" cellspacing="0" width="100%">
																												<tr>
																													<td align="center" bgcolor="#ffffff" style="padding: 12px;">
																														<table border="0" cellpadding="0" cellspacing="0">
																															<tr>
																																<td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
																																	<a href="'.base_url().'login/check_token/?key='.$token.'&email='.$email.'" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Change Password</a>
																																</td>
																															</tr>
																														</table>
																													</td>
																												</tr>
																											</table>
																										</td>
																									</tr>
																									<!-- end button -->
																									<!-- start copy -->
																									<tr>
																										<td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
																											<p style="margin: 0;">If the above button doesn\'t work, copy and paste the following link in your browser url:</p>
																											<p style="margin: 0;"><a href="'.base_url().'login/check_token/?key='.$token.'&email='.$email.'" target="_blank">'.base_url().'login/check_token/?key='.$token.'&email='.$email.'</a></p>
																										</td>
																									</tr>
																									<!-- end copy -->
																									<!-- start copy -->
																									<tr>
																										<td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
																											<p style="margin: 0;">Cheers,<br> ADMIN OFFICE </p>
																										</td>
																									</tr>
																									<!-- end copy -->
																									</table>
																								</td>
																							</tr>
																						<!-- end copy block -->
																						<!-- start footer -->
																							<tr>
																								<td align="center" bgcolor="#e9ecef" style="padding: 24px;">
																									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
																									<!-- start permission -->
																										<tr>
																											<td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
																												<p style="margin: 0;">You received this email because we received a request for password recovery for your account. If you didn not request to reset your password, you can safely delete this email.</p>
																											</td>
																										</tr>
																									<!-- end permission -->
																									<!-- start unsubscribe -->
																									<tr>
																										<td align="center" bgcolor="#e9ecef" style="padding: 12px 24px; font-family: \'Source Sans Pro\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
																											<p style="margin: 0;">To stop receiving these emails, you can <a href="'.base_url().'stop" target="_blank">unsubscribe</a> at any time.</p>
																											<p style="margin: 0;">Ahmadu Bello Way, Kaduna-Nigeria</p>
																										</td>
																									</tr>
																									<!-- end unsubscribe -->
																									</table>
																								</td>
																							</tr>
																				<!-- end footer -->
																				</table>
																				<!-- end body -->
																					</body>
																				</html>';
														$headers = "From: $from\n";
														$headers .= "MIME-Version: 1.0\n";
														$headers .= "Content-type: text/html; charset=iso-8859-1\n";
														//$headers .= "Bcc: $email";
														$to = $email;

														// Query to send mail
														mail($to, $subject, $message, $headers);

														//After passing the check, log Activity
														$data_log['action_performed'] = 'Attempted Password Recovery';
														$data_log['action_by'] = $this->input->post('email');
														$data_log['action_status'] = 'Recovery Link Sent';
														$this->db->insert('activity_log', $data_log);
								        }

								        elseif ($query->num_rows() == 0) {
								        $this->session->set_flashdata('error_message', 'Email not associated');

												//After failing the check, log Activity
												$data_log['action_performed'] = 'Attempted Password Recovery';
												$data_log['action_by'] = $this->input->post('email');
												$data_log['action_status'] = 'Failed Email Test';
												$this->db->insert('activity_log', $data_log);

								        redirect(base_url() . 'login/recovery', 'refresh');
								        }

											}


		function recoveryTokenFunction(){
								$token = $_GET['key'];
								$email = $_GET['email'];

								$credential 		= array('up_email' => $email);
				        $query = $this->db->get_where('user_profile_tbl', $credential);
				        if ($query->num_rows() > 0) {
				            $row = $query->row();

									if(($row->up_email == $email) && ($token == $row->up_token) && (date('Y-m-d h:i:s') < $row->up_token_expires)){
										$this->session->set_userdata('email', $row->up_email);
										$this->session->set_userdata('username', $row->up_username);

										//After passing the check, log Activity
										$data_log['action_performed'] = 'Used The Password Recovery Link';
										$data_log['action_by'] = $this->session->userdata('email');
										$data_log['action_status'] = 'Given Access To Create Password';
										$this->db->insert('activity_log', $data_log);

										redirect(base_url() . 'login/new_pass', 'refresh');
										}else {

										//After Faling the check, log Activity
										$data_log['action_performed'] = 'Attempted To Use An Expired Recovery Link';
										$data_log['action_by'] = $row->up_email;
										$data_log['action_status'] = 'Failed Second Degree Check';
										$this->db->insert('activity_log', $data_log);

						        $this->session->set_flashdata('error_message', 'Time up! Try Again');
						        redirect(base_url() . 'login/recovery', 'refresh');
						        }
					        }
					        else {
									//After failing the check, log Activity
									$data_log['action_performed'] = 'Attempted To Use An Expired Recovery Link';
									$data_log['action_by'] = $email;
									$data_log['action_status'] = 'Password Recovery Link Expired';
									$this->db->insert('activity_log', $data_log);

					        $this->session->set_flashdata('error_message', 'Time up! Try Again');
					        redirect(base_url() . 'login/recovery', 'refresh');
								        }
									}


			function changePassFunction(){
									$password 				= $this->input->post('password');
					        $confirm_password	= $this->input->post('confirm_password');

									if($password == $confirm_password){
										$email 						= $_SESSION['email'];
										$username 				= $_SESSION['username'];
										$credential 			= array('up_email' => $email);
										$query = $this->db->get_where('user_profile_tbl', $credential);
										if ($query->num_rows() > 0) {
												$profile_id = $query->row()->user_profiletbl_id;

												$page_data['up_password'] = md5(html_escape($username.$this->input->post('password')));
												$page_data['up_token'] = "";
												$this->db->where('user_profiletbl_id', $profile_id);
												$this->db->update('user_profile_tbl', $page_data);

											//After passing the check, log Activity
											$data_log['action_performed'] = 'Attempted To Change Password';
											$data_log['action_by'] = $email;
											$data_log['action_status'] = 'Changed Successfully';
											$this->db->insert('activity_log', $data_log);
											}
										}else {
										// Password do not
										$this->session->set_flashdata('error_message', 'Passwords Do Not Match!');

										//After failing the check, log Activity
										$data_log['action_performed'] = 'Attempted Changing Password';
										$data_log['action_by'] = $_SESSION['email'];
										$data_log['action_status'] = 'Password Do Not Match';
										$this->db->insert('activity_log', $data_log);

										redirect(base_url() . 'login/new_pass', 'refresh');
										}
									}



							function activeStatus(){
									$query = $this->db->get_where('user_profile_tbl', array('user_profiletbl_id'=>$this->session->userdata('current_user_id'), 'up_account_status'=> '0'));
									if ($query->num_rows() > 0) {				          
									$this->session->set_flashdata('error_message', 'Your account has been deleted, see your admin!');
									redirect(base_url(), 'refresh');
					        }
					      }


	//To check if the username and password match
    function cbtLoginCheck(){
        $pin_number = $this->input->post('pin_number');
        $credential = array('ept_pin_no' => $pin_number);
        $query = $this->db->get_where('exam_pin_tbl', $credential);
        if ($query->num_rows() > 0){
            $row = $query->row();

			if($row->ept_pin_status == 'Used!'){
				$this->session->set_flashdata('error_message', 'This PIN has been used, contact admin please!');
				redirect(base_url().'login/cbt', 'refresh');
			}

			$today = date('Y-m-d');
			if($today > $row->ept_pin_no){
				//After failing the check, log Activity
				$data['action_performed'] = 'Attempted Loging In';
				$data['action_by'] = $pin_number;
				$data['action_status'] = 'Failed CBT Attempt';
				$this->db->insert('activity_log', $data);
				redirect(base_url() . 'login/cbt', 'refresh');
			}

		//Set sessions from above recordset
		$this->session->set_userdata('login_status', 'Yes');
		$this->session->set_userdata('current_profile_id', $row->ept_sp_id);
		$this->session->set_userdata('current_cbt_id', $row->ept_id);
		$this->session->set_userdata('current_exam_id', $row->ept_est_id);
		$this->session->set_userdata('pin_expiry_date', $row->ept_expiry_date);
		$this->session->set_userdata('current_pin', $this->input->post('pin_number'));
		$this->session->set_userdata('dont_go_back', 1);

	//Recordset to get driving school info into session
		$credential2 = array('sch_info_id' => 1);
		$query2 = $this->db->get_where('sch_info_tbl', $credential2);
		if ($query2->num_rows() > 0) {
		$row2 = $query2->row();

		//Set sessions from above recordset
		$this->session->set_userdata('school_name', $row2->sch_name);
		$this->session->set_userdata('school_num', $row2->sch_house_num);
		$this->session->set_userdata('school_street', $row2->sch_street_name);
		$this->session->set_userdata('school_lg', $row2->sch_local_govt);
		$this->session->set_userdata('school_state', $row2->sch_state);
		$this->session->set_userdata('school_website', $row2->sch_website);
		$this->session->set_userdata('school_mail', $row2->sch_email);
		$this->session->set_userdata('school_phone1', $row2->sch_phone1);
		$this->session->set_userdata('school_phone2', $row2->sch_phone2);
		$this->session->set_userdata('school_phone3', $row2->sch_phone3);
		}

		//After passing the check, log Activity
		$data['action_performed'] = 'Successfully Logged In';
		$data['action_by'] = $this->input->post('pin_number');
		$data['action_status'] = 'Success';
		$this->db->insert('activity_log', $data);

		//If pin number doen not match then send user back to login
			}elseif ($query->num_rows() == 0) {
		$this->session->set_flashdata('error_message', 'Invalid or Expired Detail');

		//After failing the check, log Activity
		$data['action_performed'] = 'Attempted Login';
		$data['action_by'] = $pin_number;
		$data['action_status'] = 'Failed Attempt';
		$this->db->insert('activity_log', $data);
		redirect(base_url() . 'login/cbt', 'refresh');
		}
		}

	}
