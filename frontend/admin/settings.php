<?php require_once "./common/header.php"?>
<!-- Sidebar -->

<script>
	$(document).ready(function() {	
		loadSettings();
	})
	function loadSettings(){
		var settings = new XMLHttpRequest();
		var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/getSettings";
		settings.open("POST", url, true);
		settings.setRequestHeader("Content-Type", "application/json");
		settings.onreadystatechange = function () {
			if (settings.readyState === 4 && settings.status === 200) {
				var json = JSON.parse(settings.responseText);
				responstring = settings.responseText
				if(responstring.length>150){					
					$("#websiteNameInput").attr("havetoedit","yes")
					$("#logoimage").attr("havetoedit","yes")
					$("#faviconimage").attr("havetoedit","yes")
					$("#websiteNameInput").attr("itemid",json['itemid'])
					$("#websiteNameInput").val(json['sitetitle'])									
					$("#favitemid").val(json['itemid'])
					$("#logoitemid").val(json['itemid'])
					$('.logoPreview').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['logoimage']);
					$('.favPreview').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['favicon']);		
					$('.logobig').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['logoimage']);
					$('.logosmall').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['favicon']);						
					$("#favicon").attr("href","http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['favicon']);	
				}
			}						
		};
		var data = JSON.stringify({"_id": "all"});
		settings.send(data);
	}

	function addSpecialties(formid, flag){
		
		if(flag!="yes"){ 
			switch (formid){
				case "2":
					var inputdata = $('#logoForm').serialize();
					var form = $('#logoForm')[0];
					posturl = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/createSettings"
					var data = new FormData(form);
					break;
				case "3":
					var inputdata = $('#faviconForm').serialize();
					var form = $('#faviconForm')[0];
					posturl = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/createSettings"
					var data = new FormData(form);
					break;
			}						
		}else{
			switch (formid){
				case "2":
					var inputdata = $('#logoForm').serialize();
					var form = $('#logoForm')[0];
					posturl = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/editSettings"
					var data = new FormData(form);
					break;
				case "3":
					var inputdata = $('#faviconForm').serialize();
					var form = $('#faviconForm')[0];
					posturl = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/editSettings"
					var data = new FormData(form);
					break;
			}
		}
		$.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: posturl,
			data: data, 
			processData: false,
			contentType: false,
			cache: false,
			success: (d) => {
				$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
				$("#alert_content").html(d.msg);
				$("#alert-success").show();
				setTimeout(function(){ 
					$("#alert-success").fadeOut( "slow" );
				}, 2000);
			},
			error: (e) => {	
				$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
				$("#alert_content").html(e.msg);
				$("#alert-success").show();
				setTimeout(function(){ 
					$("#alert-success").fadeOut( "slow" );
				}, 2000);
			}
		});
	}

	$(function() {
		$(document).on("change","#logoimage", function()
		{
			var uploadFile = $(this);
			flag = $(this).attr("havetoedit");
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return;
			if (/^image/.test( files[0].type)){
				var reader = new FileReader(); 
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){ 
					uploadFile.closest(".imgUp").find('.logoPreview').attr("src", this.result);
					addSpecialties("2",flag);										
				}
			}					
		});

		$(document).on("change","#faviconimage", function()
		{
			var uploadFile = $(this);
			flag = $(this).attr("havetoedit");
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return;
			if (/^image/.test( files[0].type)){
				var reader = new FileReader(); 
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){ 
					uploadFile.closest(".imgUp").find('.favPreview').attr("src", this.result);
					addSpecialties("3",flag);	
				}
			}					
		});

		$('#websiteNameInput').keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				if($(this).val()!="" && $(this).val() != " "){	
					flag = $(this).attr("havetoedit");
					if(flag!="yes"){
						console.log("Have  tapid=1"+ $(this).val())
						webtitle = new XMLHttpRequest();
						url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/createSettings";
						webtitle.open("POST", url, true);
						webtitle.setRequestHeader("Content-Type", "application/json");
						webtitle.onreadystatechange = function () {
							if (webtitle.readyState === 4 && webtitle.status === 200) {
								json = JSON.parse(webtitle.responseText);
								if(json["status"]=="success"){
									$("#websiteNameInput").attr("havetoedit","yes")
									$("#logoimage").attr("havetoedit","yes")
									$("#faviconimage").attr("havetoedit","yes")
									$("#websiteNameInput").attr("itemid",json['itemid'])									
									$("#favitemid").val(json['itemid'])
									$("#logoitemid").val(json['itemid'])
									$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");

									$("#alert_content").html(json["msg"]);
									$("#alert-success").show();
									setTimeout(function(){ 
										$("#alert-success").fadeOut( "slow" );
									}, 2000);
								}else{
									$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
									$("#alert_content").html(json.msg);
									$("#alert-success").show();
									setTimeout(function(){ 
										$("#alert-success").fadeOut( "slow" );
									}, 2000);
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
						var data = JSON.stringify({"title": $(this).val(), "tapid":"1"});
						webtitle.send(data);
					}else{
						console.log("Haven't  tapid=1"+ $(this).val())
						webtitle = new XMLHttpRequest();
						url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/editSettings";
						webtitle.open("POST", url, true);
						webtitle.setRequestHeader("Content-Type", "application/json");
						webtitle.onreadystatechange = function () {
							if (webtitle.readyState === 4 && webtitle.status === 200) {
								json = JSON.parse(webtitle.responseText);
								if(json["status"]=="success"){
									$("#websiteNameInput").attr("havetoedit","yes")
									$("#logoimage").attr("havetoedit","yes")
									$("#faviconimage").attr("havetoedit","yes")
									$("#websiteNameInput").attr("itemid",json['itemid'])									
									$("#favitemid").val(json['itemid'])
									$("#logoitemid").val(json['itemid'])

									$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
									$("#alert_content").html(json["msg"]);
									$("#alert-success").show();
									setTimeout(function(){ 
										$("#alert-success").fadeOut( "slow" );
									}, 2000);
								}
							}						
						};
						var data = JSON.stringify({"title": $(this).val(), "tapid":"1"});
						webtitle.send(data);
					}
				}
			}
		});

	});
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
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/reviews.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/transactions-list.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li class="active"> 
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
								<h3 class="page-title">General Settings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
									<li class="breadcrumb-item active">General Settings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						
						<div class="col-12">							
							<!-- General -->							
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">General</h4>
									</div>
									<div class="card-body">
											<div class="form-group">
												<label>Website Name</label>
												<input type="text" class="form-control" class="websiteNameInput" id="websiteNameInput" itemid="" havetoedit="">
											</div>
											<form action="#" name="logoForm" id="logoForm" class="logoForm"  method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label>Website Logo</label>
													<div class="col-sm-12 imgUp">
														<label class="btn btn-light">
															<img class="logoPreview" src="" width="200">
															<input type="hidden" name="tapid" class="form-control" value="2">
															<input type="hidden" name="itemid" id="logoitemid" class="form-control" value="">
															<input type="file" class="inputFileTag" id="logoimage" name="uploadfile" havetoedit="" itemid=""  value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;  position: absolute;">
														</label>
													</div>
													<small class="text-secondary">Recommended image size is <b>200px x 50px</b></small>
												</div>
											</form>
											<form action="#" name="faviconForm" id="faviconForm" class="faviconForm"  method="post" enctype="multipart/form-data">
												<div class="form-group mb-0">
													<label>Favicon</label>
													<div class="col-sm-12 imgUp">
														<label class="btn btn-light">
															<img class="favPreview" src="" width="60">
															<input type="hidden" name="tapid" class="form-control" value="3">
															<input type="hidden" name="itemid"  id="favitemid"  class="form-control" value="3">
															<input type="file" class="inputFileTag" id="faviconimage" name="uploadfile" havetoedit="" itemid="" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;  position: absolute;">
														</label>
													</div>
													<small class="text-secondary">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></small><br>
													<small class="text-secondary">Accepted formats : only png and ico</small>
												</div>
											</form>											
										</form>
									</div>
								</div>							
							<!-- /General -->								
						</div>
					</div>					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
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
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>