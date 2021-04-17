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
		pages = pagetitle.split(".");
		pageName = pages[0]
		switch (pageName){
			case "doctor-dashboard":
				$("#middle_pagetitle1").html("Dashboard");
				$("#middle_pagetitle2").html("Dashboard");				
				$("#dashboard").attr("class","active");
				break;
			case "doctor-profile-settings":
				$("#profilesettings").attr("class","active");
				$("#middle_pagetitle1").html("Profile Settings");
				$("#middle_pagetitle2").html("Profile Settings");
				break;
			case "somedia":
				$("#socialmedia").attr("class","active");
				$("#middle_pagetitle1").html("Social Media");
				$("#middle_pagetitle2").html("Social Media");
				break;
			case "appointments":
				$("#appointments").attr("class","active");
				$("#middle_pagetitle1").html("Appointments");
				$("#middle_pagetitle2").html("Appointments");
				break;
			case "my-patients":
				$("#mypatients").attr("class","active");
				$("#middle_pagetitle1").html("My Patients");
				$("#middle_pagetitle2").html("My Patients");
				break;
			case "scheduletiming":
				$("#scheduletiming").attr("class","active");
				$("#middle_pagetitle1").html("Schedule Timing");
				$("#middle_pagetitle2").html("Schedule Timing");
				break;
			case "invoice":
				$("#invoices").attr("class","active");
				$("#middle_pagetitle1").html("Invoices");
				$("#middle_pagetitle2").html("Invoices");
				break;
			case "review":
				$("#reviews").attr("class","active");
				$("#middle_pagetitle1").html("Reviews");
				$("#middle_pagetitle2").html("Reviews");
				break;
			case "changepassword":
				$("#changepassword").attr("class","active");
				$("#middle_pagetitle1").html("Change Password");
				$("#middle_pagetitle2").html("Change Password");
				break;
			case "scheduletiming":
				$("#scheduletiming").attr("class","active");
				$("#middle_pagetitle1").html("Change Password");
				$("#middle_pagetitle2").html("Change Password");
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
			<style>
				a{
					cursor:pointer;
				}
			</style>

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://<?php echo $SERVER_IPADDRESS;?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page" id="middle_pagetitle1"></li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title" id="middle_pagetitle2"></h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img class="userAvatarImage" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3 class="userFullname"> </h3>											
											<div class="patient-details">
												<h5 class="mb-0" id="userSpecialty"></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li id="dashboard">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li id="appointments">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/appointments.php">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li id="mypatients">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/my-patients.php">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											<li id="scheduletiming">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/scheduletiming.php">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li>
											<li id="invoices">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/invoice.php">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li id="reviews">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/review.php">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											<li id="chatdoctor">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/chatdoctor.php">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">23</small>
												</a>
											</li>
											<li id="profilesettings">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/doctor-profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li id="socialmedia">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/somedia.php">
													<i class="fas fa-share-alt"></i>
													<span>Social Media</span>
												</a>
											</li>
											<li id="changepassword">
												<a href="http://<?php echo $SERVER_IPADDRESS;?>/changepassword.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a class="userlogout">
													<i class="fas fa-sign-out-alt userlogout"></i>
													<span class="userlogout">Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->							
						</div>