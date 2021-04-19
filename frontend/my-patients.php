<?php require_once "./common/doctor-profile_side.php"; ?>
						<script>
							userEmail = "<?php  if (isset($_SESSION["user"])){ echo $_SESSION["user"]; }else{echo "";} ?>";
							var user = new XMLHttpRequest();
							var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/user/getUserListP";
							user.open("POST", url, true);
							user.setRequestHeader("Content-Type", "application/json");
							user.onreadystatechange = function () {
								if (user.readyState === 4 && user.status === 200) {				
									var users = JSON.parse(user.responseText);
									responstring = user.responseText;				
									if(responstring.length>100){
										mypatientslistString = ``
										for(i=0; i<users.length; i++){
											mypatientslistString += `
												
													<div class="col-md-6 col-lg-4 col-xl-3">
														<div class="card widget-profile pat-widget-profile">
															<div class="card-body">
																<div class="pro-widget-content">
																	<div class="profile-info-widget">
																		<a href="#" class="booking-doc-img">`;
																		if(users[i].avatar!=null && users[i].avatar!=""){
																			mypatientslistString += `<img src="http://<?php echo $SERVER_IPADDRESS; ?>/resource/images/uploads/` + users[i].avatar + `" alt="User Image">`
																		}else{
																			mypatientslistString += `<img src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">`
																		}
																		if(users[i].firstname == null){
																			firstname = ""
																		}else{
																			firstname = users[i].firstname;
																		}

																		if(users[i].firstname == null){
																			lastname = ""
																		}else{
																			lastname = users[i].lastname;
																		}

																		if(users[i].state == null){
																			state = ""
																		}else{
																			state = users[i].state;
																		}
																		if(users[i].country == null){
																			country = ""
																		}else{
																			country = users[i].country;
																		}
																		if(users[i].phone == null){
																			phone = ""
																		}else{
																			phone = users[i].phone;
																		}

																		if(users[i].birth == null){
																			birth = ""
																		}else{
																			birth = users[i].birth;
																		}
																		
																		if(users[i].gender == null){
																			gender = ""
																		}else{
																			gender = users[i].gender;
																		}
																		if(users[i].blood == null){
																			blood = ""
																		}else{
																			blood = users[i].blood;
																		}

																mypatientslistString +=`</a>
																		<div class="profile-det-info">
																			<h3><a href="patient-profile.php">`+ firstname+" "+ lastname+`</a></h3>														
																			<div class="patient-details">
																				<h5><b>Patient ID :</b> P0016</h5>
																				<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>`+ state+" "+ country+`</h5>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="patient-info">
																	<ul>
																		<li>Phone <span>`+ phone+`</span></li>
																		<li>Age <span>`+ birth+" "+ gender+`</span></li>
																		<li>Blood Group <span>`+ blood+`</span></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>`;
										}
										$('#mypatientsList').html(mypatientslistString);
									}
								}
							}
							var data = JSON.stringify({"email": userEmail});
							user.send(data);

							


						</script>

						<div class="col-md-7 col-lg-8 col-xl-9" >
							<div class="row row-grid" id="mypatientsList">

							
							</div>
						</div>
					</div>
				</div>
			</div>		
			<!-- /Page Content -->
		<?php require_once "./common/footer.php" ?>
	   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>