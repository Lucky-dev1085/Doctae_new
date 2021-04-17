<?php
$SERVER_IPADDRESS = $_SERVER['HTTP_HOST'];
session_start();
if (!isset($_SESSION["admin"])){
	header("Location: http://".$SERVER_IPADDRESS."/admin/login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title id="titleTag">Doctae - Administrator</title>
		
		<!-- Favicon -->
        
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/css/font-awesome.min.css">

		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/plugins/fontawesome/css/all.min.css">
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/css/feathericon.min.css">
		
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/plugins/morris/morris.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/css/style.css">
		<link rel="shortcut icon" id="favicon"  type="image/x-icon" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/favicon.png">
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/jquery-3.2.1.min.js"></script>
		

		<script>
			$(document).ready(function() {
				var settings = new XMLHttpRequest();
				var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/settings/getSettings";
				settings.open("POST", url, true);
				settings.setRequestHeader("Content-Type", "application/json");
				settings.onreadystatechange = function () {
					if (settings.readyState === 4 && settings.status === 200) {
						var json = JSON.parse(settings.responseText);
						responstring = settings.responseText
						if(responstring.length>150){					
							$('.logobig').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['logoimage']);
							$('.logosmall').attr("src", "http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['favicon']);						
							$("#favicon").attr("href","http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json['favicon']);			
							$("#titleTag").html(json["sitetitle"]+" - Administrator");
						}
					}						
				};
				var data = JSON.stringify({"_id": "all"});
				settings.send(data);
				
				//////////////////
				var admin = new XMLHttpRequest();
				var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/user/getAdmin";
				admin.open("POST", url, true);
				admin.setRequestHeader("Content-Type", "application/json");
				admin.onreadystatechange = function () {
					if (admin.readyState === 4 && admin.status === 200) {
						var json = JSON.parse(admin.responseText);
						responstring = admin.responseText
						if(responstring.length>100){					
							$("#myprofile_dropmenu").attr("href","http://<?php echo $SERVER_IPADDRESS;?>/admin/profile.php?M="+json.items[0]._id)
						}
					}						
				};
				var data = JSON.stringify({"email": '<?php echo $_SESSION["admin"]?>'});
				admin.send(data);
				//////////////////

				$("#logout").click(function(){
					$.ajax({
						type: "POST",
						url: "http://<?php echo $SERVER_IPADDRESS;?>/admin/common/set_session.php",
						data: { email:"", logout:"" }
					});
					window.location.href="http://<?php echo $SERVER_IPADDRESS;?>/admin";
				});
			})
		</script>
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="http://<?php echo $SERVER_IPADDRESS;?>/admin" class="logo">
						<img class="logobig" alt="Logo">
					</a>
					<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin" class="logo logo-small">
						<img class="logosmall" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fe fe-bell"></i> <span class="badge badge-pill">1</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/doctors/doctor-thumb-01.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>Admin</h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" id="myprofile_dropmenu" href="">My Profile</a>
							<a class="dropdown-item" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/settings.php">Settings</a>
							<a class="dropdown-item" id="logout" href="#">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			