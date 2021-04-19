<?php require_once "./common/header.php"?>
<style>
	.imagePreview {
		width: 100%;
		background-position: center center;
		/* background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg); */
		background-color:#fff;
		background-size: cover;
		background-repeat:no-repeat;
		display: inline-block;
		box-shadow: 0px 0px 2px 1px rgb(0 0 0 / 0.12);
	}
	.imgUp .btn-primary
	{
		display:block;
		margin: 0px;
    	padding: 0px;
		background: #fff;
		border-color:#fff;
		border:none;
		
		width: 70%;
		margin: auto;
	}
	
	.imgAdd
	{
		width:30px;
		height:30px;
		border-radius:50%;
		background-color:#4bd7ef;
		color:#fff;
		box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
		text-align:center;
		line-height:30px;
		margin-top:0px;
		cursor:pointer;
		font-size:15px;
	}
</style>
			<script>
				$(document).ready(function() {					
					$("#addSpecialtiesBtn").click((event) => {
						event.preventDefault();
						var oldname = $("#addSpecialtiesBtn").attr("oldname");
						var act = $("#addSpecialtiesBtn").attr("act");
						if(act=="add"){
							addSpecialties();
						}else{
							editSpecialties(oldname);						
						}						
					}); 					
					getSpecialtiesList();
				})

				function addSpecialties(){
					var inputdata = $('#addnewfileForm').serialize();
					var form = $('#addnewfileForm')[0];
					var data = new FormData(form);
					$.ajax({
						type: "POST",
						enctype: 'multipart/form-data',
						url: "http://localhost:3000/api/specialties/addSpecialties",
						data: data, 
						processData: false,
						contentType: false,
						cache: false,
						success: (d) => {
							$("#addSpecialtiesModal_close").trigger( "click" );
							$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
							$("#alert_content").html(d.msg);
							$("#alert-success").show();
							// $("#doctorDatatable").remove();
							getSpecialtiesList();
							setTimeout(function(){ 
								$("#specialties").val("");
								$("#specialtiesImage").val("");
								$("#alert-success").fadeOut( "slow" );
							}, 2000);
						},
						error: (e) => {						
							$("#addSpecialtiesModal_close").trigger( "click" );
							$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
							$("#alert_content").html(e.msg);
							$("#alert-success").show();
							setTimeout(function(){ 
								$("#alert-success").fadeOut( "slow" );
							}, 2000);
						}
					});		
				}				

				function editSpecialties(oldfile){
					var inputdata = $('#addnewfileForm').serialize();
					var form = $('#addnewfileForm')[0];
					var data = new FormData(form);
					var itemid = $("#addSpecialtiesBtn").attr("itemid");
					data.append('oldfile',oldfile);
					data.append('itemid',itemid);
					$.ajax({
						type: "POST",
						enctype: 'multipart/form-data',
						url: "http://localhost:3000/api/specialties/editSpecialties",
						data: data, 
						processData: false,
						contentType: false,
						cache: false,
						success: (d) => {
							console.log("success : " + d.msg);
							$("#addSpecialtiesModal_close").trigger( "click" );
							$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
							$("#alert_content").html(d.msg);
							$("#alert-success").show();
							// $("#doctorDatatable").remove();
							getSpecialtiesList();
							setTimeout(function(){ 
								$("#specialties").val("");
								$("#specialtiesImage").val("");
								$("#alert-success").fadeOut( "slow" );
							}, 2000);
						},
						error: (e) => {
							console.log("error : " + e.msg);							
							$("#addSpecialtiesModal_close").trigger( "click" );
							$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
							$("#alert_content").html(e);
							$("#alert-success").show();
							setTimeout(function(){ 
								$("#alert-success").fadeOut( "slow" );
							}, 2000);
						}
					});		
				}		

				var j;
				function getSpecialtiesList(){
					var specialties = new XMLHttpRequest();
					var url = "http://localhost:3000/api/specialties/getSpecialtiesList";
					specialties.open("POST", url, true);
					specialties.setRequestHeader("Content-Type", "application/json");
					specialties.onreadystatechange = function () {
						if (specialties.readyState === 4 && specialties.status === 200) {
							var json = JSON.parse(specialties.responseText);
							var dataArray ={};
							arraylenght = json.items.length
							doctor_string = ``;
							$('.specialtiesList').html("");
							for (j=0; j<arraylenght; j++){
								doctor_string +=`<tr><td>`+(j+1)+`</td><td><h2 class="table-avatar">
								<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img" src="http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/`+json.items[j].image+`" alt="Speciality"></a>
								<a href="#" specialtyId="`+json.items[j]._id+`">`+json.items[j].specialty+`</a></h2></td>
								<td class="text-right"><div class="actions">
								<a class="btn btn-sm bg-success-light" specialtyId="`+json.items[j]._id+`" id="edit_specialities_modal"   > <i class="fe fe-pencil"></i> Edit </a>
								<a class="btn btn-sm bg-danger-light"  specialtyId="`+json.items[j]._id+`" filename="`+json.items[j].image+`"id="delete_specialities_modal" > <i class="fe fe-trash"></i> Delete </a></div>
								</td></tr>`;
							}
							// document.querySelector('.specialtiesList').insertAdjacentHTML('beforeend',doctor_string);
							$('.specialtiesList').html(doctor_string);
							$('#doctorDatatable').DataTable();
						}		
					};
					var data = JSON.stringify({"_id": "all"});
					specialties.send(data);
				}

				$(document).on('click', '#edit_specialities_modal', function(){ 
					dataid=$(this).attr("specialtyId")
					specialty = new XMLHttpRequest();
					url = "http://localhost:3000/api/specialties/getSpecialtiesList";
					specialty.open("POST", url, true);
					specialty.setRequestHeader("Content-Type", "application/json");
					specialty.onreadystatechange = function () {
						if (specialty.readyState === 4 && specialty.status === 200) {
							json = JSON.parse(specialty.responseText);	
							id=json.items[0]._id
							specialty=json.items[0].specialty
							image=json.items[0].image
							$("#specialties").val(specialty);
							$(".modal-title").html("Edit Specialities");
							$("#addSpecialtiesBtn").html("Change");
							$("#addSpecialtiesBtn").attr("oldname",image);
							$("#addSpecialtiesBtn").attr("act","edit");
							$("#addSpecialtiesBtn").attr("itemid",id);
						
							$('#Add_Specialities_details').modal('toggle');
							$('#Add_Specialities_details').modal('show');
							$('#Add_Specialities_details').modal('hide');

							$('.imagePreview').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+image);
							
						}						
					};
					var data = JSON.stringify({"_id": dataid});
					specialty.send(data);
				});

				$(document).on('click', '#Add_Specialities_detailsbtn', function(){
					$("#specialties").val("");
					$("#specialtiesImage").val("");
					$("#specialties").focus();
					$(".modal-title").html("Add Specialities");
					$("#addSpecialtiesBtn").html("Add");
					$("#addSpecialtiesBtn").attr("act","add");
					$('.imagePreview').attr("src", "http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg");
				});

				$(document).on('click', '#delete_specialities_modal', function(){
					dataid=$(this).attr("specialtyId");
					filename=$(this).attr("filename");
					$("#specialtiesDeletebtn").attr("itemid",dataid);
					$("#specialtiesDeletebtn").attr("filename",filename);
					$(".modal-title").html("Delete");
					$('#delete_modal').modal('toggle');
					$('#delete_modal').modal('show');
					$('#delete_modal').modal('hide');
				});

				$(document).on('click', '#specialtiesDeletebtn', function(){
					filename=$(this).attr("filename");
					dataid=$(this).attr("itemid");
					var specialtiesdelete = new XMLHttpRequest();
					var url = "http://localhost:3000/api/specialties/deleteSpecialties";
					specialtiesdelete.open("POST", url, true);
					specialtiesdelete.setRequestHeader("Content-Type", "application/json");
					specialtiesdelete.onreadystatechange = function () {
						if (specialtiesdelete.readyState === 4 && specialtiesdelete.status === 200) {
							var json = JSON.parse(specialtiesdelete.responseText);
							console.log(json.status)
							if(json.status=="success"){
								$("#specialtiesdeletemodal_close").trigger( "click" );
								$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
								$("#alert_content").html(json.msg);
								$("#alert-success").show();
								// $("a[specialtyId^='"+dataid+"']").parent().parent().parent().remove()
								// $("#doctorDatatable").remove();
								
								getSpecialtiesList();								
								setTimeout(function(){ 
									$("#specialties").val("");
									$("#specialtiesImage").val("");
									$("#alert-success").fadeOut( "slow" );
								}, 2000);
							}
						}						
					};
					var data = JSON.stringify({"_id": dataid, "filename":filename });
					specialtiesdelete.send(data);
				});
				
				$(function() {
					$(document).on("change",".specialtiesImage", function()
					{
						var uploadFile = $(this);
						var files = !!this.files ? this.files : [];
						if (!files.length || !window.FileReader) return;
						if (/^image/.test( files[0].type)){
							var reader = new FileReader(); 
							reader.readAsDataURL(files[0]);
							reader.onloadend = function(){ 
								$("#addSpecialtiesBtn").attr("oldname","null");
								uploadFile.closest(".imgUp").find('.imagePreview').attr("src", this.result);
								
							}
						}
					
					});
				});

			</script>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li > 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/appointment.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li class="active"> 
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
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Specialities</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/">Dashboard</a></li>
									<li class="breadcrumb-item active">Specialities</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" id="Add_Specialities_detailsbtn" data-toggle="modal" class="btn btn-primary float-right mt-2" style="width:140px"> New Specialties </a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0" id="doctorDatatable">
											<thead>
												<tr>
													<th style="width:10%">No</th>
													<th>Specialities</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody class="specialtiesList">
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
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"></h5>
							<button type="button" class="close" id="addSpecialtiesModal_close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="addnewfileForm" method="post" enctype="multipart/form-data">
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Specialities</label>
											<input type="text" id="specialties" name="specialties" class="form-control">
										</div>
										<button type="button" id="addSpecialtiesBtn" itemid="" oldname="null" class="btn btn-primary btn-block" act="add" ></button>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group" style="margin-bottom:0px">
											
											<div class="col-sm-12 imgUp">
												<label class="btn btn-primary">
													<img class="imagePreview" src="">
													<input type="file" class="specialtiesImage" id="specialtiesImage" name="uploadfile"  value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;  position: absolute;">
												</label>
											</div>
										</div>

										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->

			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" id="specialtiesdeletemodal_close" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" id="specialtiesDeletebtn" itemid="" class="btn btn-primary">Delete </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->
		
		<div class="alert alert-success alert-dismissible fade show" id="alert-success" role="alert" style="display:none; position: fixed; top:90px; right:30px; z-index:999">
			<strong>Success! </strong> 
			<span class="alert_content" id="alert_content"></span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<!-- jQuery -->
        <script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/popper.min.js"></script>
        <script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/script.js"></script>

		
		
    </body>
</html>