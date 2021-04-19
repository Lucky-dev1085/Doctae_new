<?php require_once "./common/header.php"; ?>
			
			<script>
				$(document).ready(function() {
					
					var users = new XMLHttpRequest();
					// var url = "http://localhost:3000/api/user/getUserListAll";
					var url = "http://localhost:3000/api/user/getUserListAll";
					users.open("POST", url, true);
					users.setRequestHeader("Content-Type", "application/json");
					users.onreadystatechange = function () {
						Pharmacy_counts=0;
						doctor_counts=0;
						Patients_counts=0;
						if (users.readyState === 4 && users.status === 200) {
							var json = JSON.parse(users.responseText);
							for (i=0; i< json.items.length; i++){
								roles=json.items[i].role;
								switch (roles) {
									case "Doctor":
										setTimeout(function(){ 
											doctor_counts += 1;
											$(".doctor_counts").html(doctor_counts)
										}, 10 * i);
										
										break;
									case "Patients":
										setTimeout(function(){ 
											Patients_counts += 1;
											$(".Patients_counts").html(Patients_counts)
										}, 10 * i);
										break;
									default:
										Pharmacy_counts =+ 1;
								}
							}
							var doctor_string="";
							arraylenght = json.items.length
							n1=0;
							n2=0;
							for (j=0; j<arraylenght; j++){
								roles=json.items[arraylenght-1-j].role;
								
								switch (roles) {
									case "Doctor":
										n1+=1;
										if(n1<6){
											doctor_string=`<tr>
												<td>
												<h2 class="table-avatar">
													<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?D=`+json.items[arraylenght-1-j]._id+`" class="avatar avatar-sm mr-2">`
													
													if(json.items[arraylenght-1-j].avatar!=null && json.items[arraylenght-1-j].avatar!=""){
														doctor_string += `<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/`+json.items[arraylenght-1-j].avatar+`" alt="User Image">`
													}else{
														doctor_string += `<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">`
													}
													doctor_string += `</a><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?D=`+json.items[arraylenght-1-j]._id+`"> `+json.items[arraylenght-1-j].firstname+" " +json.items[arraylenght-1-j].lastname+`</a>
												</h2>
												</td>
												<td>Dental</td>
												<td>$`+ json.items[arraylenght-1-j].earn +`</td>
												<td>`;
										
											switch (json.items[arraylenght-1-j].review){
												case "1":
													doctor_string += `<i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td></tr>`;
													break;
												case "2":
													doctor_string += `<i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td></tr>`;
													break;
												case "3":
													doctor_string += `<i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td></tr>`;
													break;
												case "4":
													doctor_string += `<i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i></td></tr>`;
													break;
												case "5":
													doctor_string += `<i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-warning"></i></td></tr>`;
													break;
												default:
													doctor_string += `<i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i>
																	<i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i></td></tr>`;
											}
											document.querySelector('.doctors_list').insertAdjacentHTML('beforeend',doctor_string)
										}
										break;
									case "Patients":
										n2+=1;
										if(n2<6){
											var strss=json.items[arraylenght-1-j].create_at;
											var resCreatedAt = strss == undefined ? [''] : strss.split('T');
											Patients_string=`<tr>
													<td>
													<h2 class="table-avatar">
														<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?D=`+json.items[arraylenght-1-j]._id+`" class="avatar avatar-sm mr-2">`
														
														if(json.items[arraylenght-1-j].avatar!=null && json.items[arraylenght-1-j].avatar!=""){
															Patients_string += `<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/`+json.items[arraylenght-1-j].avatar+`" alt="User Image">`
														}else{
															Patients_string += `<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">`
														}
														Patients_string += `</a><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?D=`+json.items[arraylenght-1-j]._id+`"> `+json.items[arraylenght-1-j].firstname+" " +json.items[arraylenght-1-j].lastname+`</a>
													</h2>
													</td>
													<td>`+json.items[arraylenght-1-j].phone+`</td>
													<td>`+ resCreatedAt[0] +`</td>
													<td class="text-right">$`+json.items[arraylenght-1-j].paid+`</td>
												</tr>`;
												document.querySelector('.Patients_list').insertAdjacentHTML('beforeend',Patients_string)
										}
										
											
										break;
									default:
										Pharmacy_counts =+ 1;
								}
							}
						}else{
							$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
							$("#alert_content").html("Server is not responding.");
							$("#alert-success").show();
							setTimeout(function(){ 
								$("#alert-success").fadeOut( "slow" );
							}, 3000);
						}						
					};
					var data = JSON.stringify({"role": "all"});
					users.send(data);
				})
			</script>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="active"> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/appointment.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/doctor-list.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/reviews.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/transactions-list.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/settings.php"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/invoice-report.php">Invoice Reports</a></li>
								</ul>
							</li>
							<!-- <li class="menu-title"> 
								<span>Pages</span>
							</li> -->
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Blog </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/blog.php"> Blog </a></li>
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/blog-details.php"> Blog Details</a></li>
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/add-blog.php"> Add Blog </a></li>
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/edit-blog.php"> Edit Blog </a></li>
								</ul>
							</li>
							<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/product-list.php"><i class="fe fe-layout"></i> <span>Product List</span></a></li>
							<!-- <li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/pharmacy-list.php"><i class="fe fe-vector"></i> <span>Pharmacy List</span></a></li> -->
							<!-- <li> 
								<a href="http://<?php// echo $SERVER_IPADDRESS;?>/admin/profile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li> -->
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<h3 class="doctor_counts"></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Doctors</h6>
										<!-- <div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3 class="Patients_counts"></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Patients</h6>
										<!-- <div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3>485</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment</h6>
										<!-- <div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<h3>$62523</h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Revenue</h6>
										<!-- <div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Revenue</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
							<!-- /Sales Chart -->
							
						</div>
						<div class="col-md-12 col-lg-6">
						
							<!-- Invoice Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							<!-- /Invoice Chart -->
							
						</div>	
					</div>
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Doctors List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Earned</th>
													<th>Reviews</th>
												</tr>
											</thead>
											<tbody class="doctors_list"></tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card  card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Patients List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead >
												<tr>													
													<th>Patient Name</th>
													<th>Phone</th>
													<th>Last Visit</th>
													<th>Paid</th>													
												</tr>
											</thead>
											<tbody class="Patients_list"></tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Appointment List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Doctor Name</th>
													<th>Speciality</th>
													<th>Patient Name</th>
													<th>Apointment Time</th>
													<th>Status</th>
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image"></a>
															<a href="#">Dr. Ruby Perrin</a>
														</h2>
													</td>
													<td>Dental</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/patients/patient1.jpg" alt="User Image"></a>
															<a href="#">Charlene Reed </a>
														</h2>
													</td>
													<td>9 Nov 2019 <span class="text-primary d-block">11.00 AM - 11.15 AM</span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked>
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-right">
														$200.00
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			<?php require_once "./common/footer.php"?>
