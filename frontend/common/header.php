<?php
$SERVER_IPADDRESS = $_SERVER['HTTP_HOST']."/Doctae_new/frontend";

session_start();
?>
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title class="titleTag"></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link  id="favicon" href="" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/assets/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/assets/plugins/select2/css/select2.min.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/assets/plugins/dropzone/dropzone.min.css">
		<!-- Main CSS -->
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/assets/css/style.css">
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/assets/js/jquery.min.js"></script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
<script>
	$(document).ready(function() {
				var settings = new XMLHttpRequest();
				userEmail = "<?php 
				if (isset($_SESSION["user"])){ echo $_SESSION["user"]; }else{echo "";} ?>";
				// var url = "http://localhost:3000/api/settings/getSettings";
				var url = "http://localhost:3000/api/settings/getSettings";
				settings.open("POST", url, true);
				settings.setRequestHeader("Content-Type", "application/json");
				settings.onreadystatechange = function () {
					if (settings.readyState === 4 && settings.status === 200) {
						var json = JSON.parse(settings.responseText);
						responstring = settings.responseText
						if(responstring.length>150){					
							$('#logobig').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['logoimage']);
							$('#logosmall').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['favicon']);						
							$("#favicon").attr("href","http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['favicon']);			
							$(".titleTag").html(json["sitetitle"]);
						}
					}						
				};
				var data = JSON.stringify({"_id": "all"});
				settings.send(data);				
				//////////////////
				var user = new XMLHttpRequest();
				// var url = "http://localhost:3000/api/user/getUserinfo";
				var url = "http://localhost:3000/api/user/getUserinfo";
				user.open("POST", url, true);
				user.setRequestHeader("Content-Type", "application/json");
				user.onreadystatechange = function () {
					if (user.readyState === 4 && user.status === 200) {
						var json = JSON.parse(user.responseText);
						responstring = user.responseText
						if(responstring.length>100){
							$("#headermenu_userFullname").html(json.items[0].firstname+" "+json.items[0].lastname)
							$("#headermenu_userrole").html(json.items[0].role)
							$("#headermenu_userImage").attr("src", "http://<?php echo $SERVER_IPADDRESS; ?>/resource/images/uploads/"+json.items[0].avatar)
							$("#headermenu_userImage1").attr("src", "http://<?php echo $SERVER_IPADDRESS; ?>/resource/images/uploads/"+json.items[0].avatar)
							$("#userProfileSetting").attr("href","http://<?php echo $SERVER_IPADDRESS;?>/doctor-profile-settings.php")							
						}
					}						
				};
				var data = JSON.stringify({"email": userEmail});
				user.send(data);
				//////////////////
				$(".userlogout").click(function(){
					$.ajax({
						type: "POST",
						url: "http://<?php echo $SERVER_IPADDRESS;?>/admin/common/set_session.php",
						data: { email: userEmail, logout:"" }
					});
					window.location.href="http://<?php echo $SERVER_IPADDRESS;?>";
				});
			})
		</script>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="http://<?php echo $SERVER_IPADDRESS;?>/index.php" class="navbar-brand logo">
							<img  src="assets/img/logo.png"  id="logobig" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="assets/img/logo.png" id="logosmall" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/index.php">Home</a>
							</li>
							<li class="has-submenu">
								<a href="">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="doctor-dashboard.php">Doctor Dashboard</a></li>
									<li><a href="appointments.php">Appointments</a></li>
									<li><a href="schedule-timings.php">Schedule Timing</a></li>
									<li><a href="my-patients.php">Patients List</a></li>
									<li><a href="patient-profile.php">Patients Profile</a></li>
									<li><a href="chat-doctor.php">Chat</a></li>
									<li><a href="invoices.php">Invoices</a></li>
									<li><a href="doctor-profile-settings.php">Profile Settings</a></li>
									<li><a href="reviews.php">Reviews</a></li>
									<li><a href="doctor-register.php">Doctor Register</a></li>
									<li class="has-submenu">
										<a href="doctor-blog.php">Blog</a>
										<ul class="submenu">
											<li><a href="doctor-blog.php">Blog</a></li>
											<li><a href="blog-details.php">Blog view</a></li>
											<li><a href="doctor-add-blog.php">Add Blog</a></li>
										</ul>
									</li>
								</ul>
							</li>	
							<li class="has-submenu">
								<a href="">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu">
										<a href="#">Doctors</a>
										<ul class="submenu">
											<li><a href="map-grid.php">Map Grid</a></li>
											<li><a href="map-list.php">Map List</a></li>
										</ul>
									</li>
									<li><a href="search.php">Search Doctor</a></li>
									<li><a href="doctor-profile.php">Doctor Profile</a></li>
									<li><a href="booking.php">Booking</a></li>
									<li><a href="checkout.php">Checkout</a></li>
									<li><a href="booking-success.php">Booking Success</a></li>
									<li><a href="patient-dashboard.php">Patient Dashboard</a></li>
									<li><a href="favourites.php">Favourites</a></li>
									<li><a href="chat.php">Chat</a></li>
									<li><a href="profile-settings.php">Profile Settings</a></li>
									<li><a href="change-password.php">Change Password</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="">Blog <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="blog-list.php">Blog List</a></li>
									<li><a href="blog-grid.php">Blog Grid</a></li>
									<li><a href="blog-details.php">Blog Details</a></li>
								</ul>
							</li>
							<li class="login-link">
								<a href="login.php">Login / Signup</a>
							</li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>
						<?php
                        if (!isset($_SESSION["user"])) {
                            ?>
						<li class="nav-item">
							<a class="nav-link header-login" href="http://<?php echo $SERVER_IPADDRESS; ?>/login.php">login / Signup </a>
						</li>
						<?php
                        }else{?>
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle"  id="headermenu_userImage" src="assets/img/doctors/doctor-thumb-02.jpg" width="31" alt="Darren Elder">									
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img id="headermenu_userImage1" src="http://<?php echo $SERVER_IPADDRESS; ?>/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6 id="headermenu_userFullname"></h6>
										<p id="headermenu_userrole" class="text-muted mb-0"></p>
									</div>
								</div>
								<a class="dropdown-item" id="userdashboard" href="http://<?php echo $SERVER_IPADDRESS; ?>/doctor-dashboard.php">Dashboard</a>
								<a class="dropdown-item" id="userProfileSetting" href="http://<?php echo $SERVER_IPADDRESS; ?>doctor-profile-settings.php">Profile Settings</a>
								<a class="dropdown-item userlogout" id="userlogout" href="#">Logout</a>
							</div>
						</li>
						<?php }?>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			