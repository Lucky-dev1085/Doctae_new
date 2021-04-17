<?php require_once "./common/header.php"?>
			<!-- Sidebar -->
			<script>
				$(document).ready(function() {
					
					var users = new XMLHttpRequest();
					var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/user/getUserListAll";
					users.open("POST", url, true);
					users.setRequestHeader("Content-Type", "application/json");
					users.onreadystatechange = function () {
						if (users.readyState === 4 && users.status === 200) {
							var json = JSON.parse(users.responseText);
							var patient_string=``;
							arraylenght = json.items.length
							for (j=0; j<arraylenght; j++){
								var strss=json.items[arraylenght-1-j].create_at;
								var resCreatedAt = strss == undefined ? [''] : strss.split('T');
								var precreatTime=resCreatedAt[1];
								var createTime = precreatTime == undefined ? [''] : precreatTime.split('.');
								if(json.items[j].image!="" && json.items[j].image != " " && json.items[j].image != null){
									imageTag = `<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?P=`+json.items[arraylenght-1-j]._id+`" class="avatar avatar-sm mr-2">
													<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/`+json.items[j].image+`" alt="User Image">
												</a>`;
								}else{
									imageTag ="";
								}
								patient_string +=`
								<tr>
									<td>`+(j+1)+`</td>
									<td>
										<h2 class="table-avatar">
											<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?D=`+json.items[arraylenght-1-j]._id+`" class="avatar avatar-sm mr-2">`
											
											if(json.items[arraylenght-1-j].avatar!=null && json.items[arraylenght-1-j].avatar!=""){
												patient_string += `<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/`+json.items[arraylenght-1-j].avatar+`" alt="User Image">`
											}else{
												patient_string += `<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">`
											}
											patient_string += `</a><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?D=`+json.items[arraylenght-1-j]._id+`"> `+json.items[arraylenght-1-j].firstname+" " +json.items[arraylenght-1-j].lastname+`</a>
										</h2>
									</td>
									<td>29</td>
									<td>4417  Goosetown Drive, Taylorsville, North Carolina, 28681</td>
									<td>`+json.items[arraylenght-1-j].phone+`</td>
									<td>`+ resCreatedAt[0] +` `+createTime[0]+`</td>
									<td class="text-right">$`+json.items[arraylenght-1-j].paid+`</td>
								</tr>`;
							}
							document.querySelector('.patient_list').insertAdjacentHTML('beforeend',patient_string)
							$("#patient_datatable").DataTable()
						}else{
							$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
							$("#alert_content").html("Server is not responding.");
							$("#alert-success").show();
							setTimeout(function(){ 
								$("#alert-success").fadeOut( "slow" );
							}, 3000);
						}						
					};
					var data = JSON.stringify({"role": "Patients"});
					users.send(data);					
				})			
			</script>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li> 
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
							<li class="active"> 
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
								<h3 class="page-title">List of Patient</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
									<li class="breadcrumb-item active">Patient</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<div class="table-responsive">
										<table class="table table-hover table-center mb-0" id="patient_datatable">
											<thead>
												<tr>
													<th>Patient ID</th>
													<th>Patient Name</th>
													<th>Age</th>
													<th>Address</th>
													<th>Phone</th>
													<th>Last Visit</th>
													<th class="text-right">Paid</th>
												</tr>
											</thead>
											<tbody class="patient_list">																								
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>