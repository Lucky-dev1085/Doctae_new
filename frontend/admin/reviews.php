<?php require_once "./common/header.php"?>
			<!-- Sidebar -->
			<script>
				$(document).ready(function() {
					
					var users = new XMLHttpRequest();
					var url = "http://localhost:3000/api/review/getReviewListAll";
					users.open("POST", url, true);
					users.setRequestHeader("Content-Type", "application/json");
					users.onreadystatechange = function () {
						if (users.readyState === 4 && users.status === 200) {
							var json = JSON.parse(users.responseText);
							var review_string=``;
							arraylenght = json.items.length
							for (j=0; j<arraylenght; j++){
								var strss=json.items[arraylenght-1-j].create_at;
								var resCreatedAt = strss == undefined ? [''] : strss.split('T');
								var precreatTime=resCreatedAt[1];
								var createTime = precreatTime == undefined ? [''] : precreatTime.split('.');
								inDBstatus = json.items[arraylenght-1-j].status;

								if(json.items[j].image!="" && json.items[j].image != " " && json.items[j].image != null){
									imageTag = `<a href="#" class="avatar avatar-sm mr-2">
													<img class="avatar-img rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/`+json.items[j].image+`" alt="User Image">
												</a>`;
								}else{
									imageTag ="";
								}
								json.items[arraylenght-1-j].earn
								review_string +=`
								<tr>
									<td>
										<h2 class="table-avatar">
										`+imageTag+`<a href="#">`+json.items[arraylenght-1-j].patient+ `</a>
										</h2>
									</td>
									<td>
										<h2 class="table-avatar">
										`+imageTag+`<a href="#">`+json.items[arraylenght-1-j].doctor+`</a>
										</h2>
									</td>`;
									switch (json.items[arraylenght-1-j].topatient){
												case "1":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "2":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "3":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "4":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "5":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-warning"></i></td>`;
													break;
												default:
												review_string += `<td><i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i>
																	<i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i></td>`;
											}

									review_string += `					
									<td>`+json.items[arraylenght-1-j].topatientcomment+`</td>`;
									switch (json.items[arraylenght-1-j].todoctor){
												case "1":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "2":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "3":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star-o text-secondary"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "4":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-secondary"></i></td>`;
													break;
												case "5":
													review_string += `<td><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i><i class="fe fe-star text-warning"></i>
																	<i class="fe fe-star text-warning"></i><i class="fe fe-star-o text-warning"></i></td>`;
													break;
												default:
												review_string += `<td><i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i>
																	<i class="fe fe-star text-secondary"></i><i class="fe fe-star text-secondary"></i></td>`;
											}

									review_string += `
									<td>`+json.items[arraylenght-1-j].todoctorcomment+`</td>
									<td>`+json.items[arraylenght-1-j].review+`</td>
									<td>`+ resCreatedAt[0] +` `+createTime[0]+`</td>
									<td class="text-right">
										<div class="actions">
											<a class="btn btn-sm bg-danger-light" data-toggle="modal" itemid="`+json.items[arraylenght-1-j]._id+`" href="#delete_modal">
												<i class="fe fe-trash"></i> Delete
											</a>
										</div>
									</td>
								</tr>`;
							}
							document.querySelector('.review_list_tbody').insertAdjacentHTML('beforeend',review_string)
							$("#review_list_datatable").DataTable()
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

					$(document).on('click', '.checktoggle', function(){					

						if($(this).parent().find("input").val()=="on"){	$(this).parent().find("input").val("off")
						}else{	$(this).parent().find("input").val("on") }

						status = $(this).parent().find("input").val()
						itemid = $(this).attr("itemid")

						var userActive = new XMLHttpRequest();
						var url = "http://localhost:3000/api/user/changeUserStatus";
						userActive.open("POST", url, true);
						userActive.setRequestHeader("Content-Type", "application/json");
						userActive.onreadystatechange = function () {
							if (userActive.readyState === 4 && userActive.status === 200) {
								var json = JSON.parse(userActive.responseText);
								console.log(json.status);								
							}
						};
						var data = JSON.stringify({"status":status, "_id" : itemid});
						userActive.send(data);						
					});
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
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li class="active"> 
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
								<h3 class="page-title">Reviews</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/">Dashboard</a></li>
									<li class="breadcrumb-item active">Reviews</li>
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
										<table class="table table-hover table-center mb-0" id="review_list_datatable">
											<thead>
												<tr>
													<th>Patient Name</th>
													<th>Doctor Name</th>
													<th>Patient rating</th>
													<th>Patient Review</th>
													<th>Doctor rating</th>
													<th>Doctor Review</th>
													<th>Description</th>
													<th>Date</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody class="review_list_tbody">
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" class="btn btn-primary">Delete </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
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