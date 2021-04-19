<?php require_once "./common/header.php"; ?>
<script>
	<?php 
		if (!isset($_SESSION["user"])){
			echo "window.location.href='http://".$SERVER_IPADDRESS."/login.php';";
		}
	?>
	$(document).ready(function(){	
		var getParam =$(location).attr("href");
		getParam = getParam.trim();
		var splitStr = getParam.split("/");
		urlLen = splitStr.length		
		pagetitle = splitStr[urlLen-1]
		switch (pagetitle){
			case "doctor-dashboard.php":
				$("#middle_pagetitle1").html("Dashboard");
				$("#middle_pagetitle2").html("Dashboard");				
				$("#dashboard").attr("class","active");
				break;
			case "doctor-profile-settings.php":
				$("#profilesettings").attr("class","active");
				$("#middle_pagetitle1").html("Profile Settings");
				$("#middle_pagetitle2").html("Profile Settings");
				break;
			case "somedia.php":
				$("#socialmedia").attr("class","active");
				$("#middle_pagetitle1").html("Social Media");
				$("#middle_pagetitle2").html("Social Media");
				break;
			case "appointments.php":
				$("#appointments").attr("class","active");
				$("#middle_pagetitle1").html("Appointments");
				$("#middle_pagetitle2").html("Appointments");
				break;
			case "my-patients.php":
				$("#mypatients").attr("class","active");
				$("#middle_pagetitle1").html("My Patients");
				$("#middle_pagetitle2").html("My Patients");
				break;
			case "scheduletiming.php":
				$("#scheduletiming").attr("class","active");
				$("#middle_pagetitle1").html("Schedule Timing");
				$("#middle_pagetitle2").html("Schedule Timing");
				break;
			case "invoice.php":
				$("#invoices").attr("class","active");
				$("#middle_pagetitle1").html("Invoices");
				$("#middle_pagetitle2").html("Invoices");
				break;
			case "review.php":
				$("#reviews").attr("class","active");
				$("#middle_pagetitle1").html("Reviews");
				$("#middle_pagetitle2").html("Reviews");
				break;
		}

		userEmail = "<?php  if (isset($_SESSION["user"])){ echo $_SESSION["user"]; }else{echo "";} ?>";
		var user = new XMLHttpRequest();
		var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/user/getUserinfo";
		user.open("POST", url, true);
		user.setRequestHeader("Content-Type", "application/json");
		user.onreadystatechange = function () {
			if (user.readyState === 4 && user.status === 200) {				
				var json = JSON.parse(user.responseText);
				responstring = user.responseText;				
				if(responstring.length>100){
					if(json.items[0].role=="Doctor"){
						$(".userFullname").html("Dr."+" "+json.items[0].firstname+" "+json.items[0].lastname)
					}else{
						$(".userFullname").html(json.items[0].firstname+" "+json.items[0].lastname)
					}
					$("#headermenu_userrole").html(json.items[0].role)
					if(json.items[0].avatar!=null && json.items[0].avatar!=""){
						$(".userAvatarImage").attr("src", "http://<?php echo $SERVER_IPADDRESS; ?>/resource/images/uploads/"+json.items[0].avatar)
					}
				}
			}
		}
		var data = JSON.stringify({"email": userEmail});
		user.send(data);
		
	});
</script>
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="chat-window">
							
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header">
										<span>Chats</span>
										<a href="javascript:void(0)" class="chat-compose">
											<i class="material-icons">control_point</i>
										</a>
									</div>
									<form class="chat-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fas fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search">
										</div>
									</form>
									<div class="chat-users-list">
										<div class="chat-scroll">
											<a href="javascript:void(0);" class="media">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Richard Wilson</div>
														<div class="user-last-chat">Hey, How are you?</div>
													</div>
													<div>
														<div class="last-chat-time block">2 min</div>
														<div class="badge badge-success badge-pill">15</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat active">
												<div class="media-img-wrap">
													<div class="avatar avatar-online">
														<img src="assets/img/patients/patient1.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Charlene Reed</div>
														<div class="user-last-chat">I'll call you later </div>
													</div>
													<div>
														<div class="last-chat-time block">8:01 PM</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="assets/img/patients/patient2.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Travis Trimble </div>
														<div class="user-last-chat">Give me a full explanation about our project</div>
													</div>
													<div>
														<div class="last-chat-time block">7:30 PM</div>
														<div class="badge badge-success badge-pill">3</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="media-img-wrap">
													<div class="avatar avatar-online">
														<img src="assets/img/patients/patient3.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Carl Kelly</div>
														<div class="user-last-chat">That's very good UI design</div>
													</div>
													<div>
														<div class="last-chat-time block">6:59 PM</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="media-img-wrap">
													<div class="avatar avatar-offline">
														<img src="assets/img/patients/patient4.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Michelle Fairfax</div>
														<div class="user-last-chat">Yesterday i completed the task</div>
													</div>
													<div>
														<div class="last-chat-time block">11:21 AM</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="media-img-wrap">
													<div class="avatar avatar-online">
														<img src="assets/img/patients/patient5.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Gina Moore</div>
														<div class="user-last-chat">What is the major functionality?</div>
													</div>
													<div>
														<div class="last-chat-time block">10:05 AM</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="assets/img/patients/patient6.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Elsie Gilley</div>
														<div class="user-last-chat">This has allowed me to showcase not only my technical skills</div>
													</div>
													<div>
														<div class="last-chat-time block">Yesterday</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="media-img-wrap">
													<div class="avatar avatar-offline">
														<img src="assets/img/patients/patient7.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Joan Gardner</div>
														<div class="user-last-chat">Let's talk briefly in the evening. </div>
													</div>
													<div>
														<div class="last-chat-time block">Sunday</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="media-img-wrap">
													<div class="avatar avatar-online">
														<img src="assets/img/patients/patient8.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Daniel Griffing</div>
														<div class="user-last-chat">Do you have any collections? If so, what of?</div>
													</div>
													<div>
														<div class="last-chat-time block">Saturday</div>
													</div>
												</div>
											</a>
											<a href="javascript:void(0);" class="media read-chat">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="assets/img/patients/patient9.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Walter Roberson</div>
														<div class="user-last-chat">Connect the two modules with in 1 day.</div>
													</div>
													<div>
														<div class="last-chat-time block">Friday</div>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
								
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-online">
													<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">Richard Wilson</div>
												<div class="user-status">online</div>
											</div>
										</div>
										<div class="chat-options">
											<a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
												<i class="material-icons">local_phone</i>
											</a>
											<a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
												<i class="material-icons">videocam</i>
											</a>
											<a href="javascript:void(0)">
												<i class="material-icons">more_vert</i>
											</a>
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll">
											<ul class="list-unstyled">
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Hello. What can I do for you?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:30 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>I'm just looking around.</p>
																<p>Will you tell me something about yourself?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:35 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<p>Are you there? That time!</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:40 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<div class="chat-msg-attachments">
																	<div class="chat-attachment">
																		<img src="assets/img/img-02.jpg" alt="Attachment">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="" class="chat-attach-download">
																			<i class="fas fa-download"></i>
																		</a>
																	</div>
																	<div class="chat-attachment">
																		<img src="assets/img/img-03.jpg" alt="Attachment">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="" class="chat-attach-download">
																			<i class="fas fa-download"></i>
																		</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:41 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Where?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:42 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<p>OK, my name is Limingqiang. I like singing, playing basketballand so on.</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:42 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<div class="chat-msg-attachments">
																	<div class="chat-attachment">
																		<img src="assets/img/img-04.jpg" alt="Attachment">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="" class="chat-attach-download">
																			<i class="fas fa-download"></i>
																		</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:50 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>You wait for notice.</p>
																<p>Consectetuorem ipsum dolor sit?</p>
																<p>Ok?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:55 PM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="chat-date">Today</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>10:17 AM</span>
																		</div>
																	</li>
																	<li><a href="#">Edit</a></li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Lorem ipsum dollar sit</p>
																<div class="chat-msg-actions dropdown">
																	<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		<i class="fe fe-elipsis-v"></i>
																	</a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a class="dropdown-item" href="#">Delete</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>10:19 AM</span>
																		</div>
																	</li>
																	<li><a href="#">Edit</a></li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<div class="msg-typing">
																	<span></span>
																	<span></span>
																	<span></span>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="chat-footer">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="btn-file btn">
													<i class="fa fa-paperclip"></i>
													<input type="file">
												</div>
											</div>
											<input type="text" class="input-msg-send form-control" placeholder="Type something">
											<div class="input-group-append">
												<button type="button" class="btn msg-send-btn"><i class="fab fa-telegram-plane"></i></button>
											</div>
										</div>
									</div>
								</div>
								<!-- /Chat Right -->
								
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="assets/img/footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.html">Search for Doctors</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="booking.html">Booking</a></li>
										<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.html">Appointments</a></li>
										<li><a href="chat.html">Chat</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="doctor-register.html">Register</a></li>
										<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.php">Terms and Conditions</a></li>
											<li><a href="privacy-policy.php">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="assets/img/patients/patient.jpg" class="call-avatar">
										<h4>Richard Wilson</h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="voice-call.php" class="btn call-item call-start"><i class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="assets/img/patients/patient.jpg" alt="User Image">
										<h4>Richard Wilson</h4>
										<span>Calling ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="video-call.php" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>