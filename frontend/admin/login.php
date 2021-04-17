<?php 

$SERVER_IPADDRESS = $_SERVER['HTTP_HOST'];

session_start();
if (isset($_SESSION["admin"])){
	header("Location: ".$SERVER_IPADDRESS."/admin");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doctae - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/html5shiv.min.js"></script>
			<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right" style="width: 100%;">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to Admin dashboard</p>
								
								<!-- Form -->
								<form action="http://<?php echo $SERVER_IPADDRESS;?>/admin" method="post">
									<div class="form-group">
										<input class="form-control" id="email" type="text" placeholder="Email" required>
										<div class="invalid-feedback">
										    Please fill out this field
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="password" type="password" placeholder="Password" required>
										<div class="invalid-feedback">
											Please fill out this field
										</div>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" id="login_btn" type="button">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="forgot-password.php">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								  
								<!-- Social Login -->
								<!-- <div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div> -->
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Don’t have an account? <a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/register.php">Register</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		<div class="alert alert-success alert-dismissible fade show" id="alert-success" role="alert" style="display:none; position: fixed; top:90px; right:30px; z-index:999">
			<strong>Message  : </strong> 
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
		
		<!-- Custom JS -->
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/script.js"></script>

		<script>
			$('#login_btn').click(function(){
				var login_email = $("#email").val();
				var login_password = $("#password").val();

				if(login_password==""){
					$("#password").attr("class","form-control is-invalid")					
					$("#password").focus();
				}else if(login_password!=''){
					$("#password").attr("class","form-control is-valid")
				}
				if(login_email==''){
					$("#email").attr("class","form-control is-invalid")
					$("#email").focus();
				}else if(login_email!=''){
					$("#email").attr("class","form-control is-valid")
				}
				if((login_email!="") && (login_password!="")){
					var xhr = new XMLHttpRequest();
					var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/auth/signin_admin";
					xhr.open("POST", url, true);
					xhr.setRequestHeader("Content-Type", "application/json");
					xhr.onreadystatechange = function () {
						if (xhr.readyState === 4 && xhr.status === 200) {
							var json = JSON.parse(xhr.responseText);
							
							console.log(json);
							if(json.status=="success"){
								$.ajax({
									type: "POST",
									url: "http://<?php echo $SERVER_IPADDRESS;?>/admin/common/set_session.php",
									data: { email: json.data.email, login:json.data.id }
								});
								$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
								$("#alert_content").html("Login successful!");
								$("#alert-success").show();
								setTimeout(function(){
									$("#alert-success").fadeOut( "slow" );
									window.location.href="http://<?php echo $SERVER_IPADDRESS;?>/admin";
								}, 1000);
							}else if(json.status=="failed"){
								console.log(json);
								$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
								$("#alert_content").html(json.msg);
								$("#alert-success").show();
								setTimeout(function(){ 
									$("#alert-success").fadeOut( "slow" );
								}, 3000);
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
					var data = JSON.stringify({"email": login_email, "password": login_password});
					xhr.send(data);
				}
			});

			$('#email').change(function(){
				if($('#email').val()!=""){
					$("#email").attr("class","form-control is-valid")
				}else{
					$("#email").attr("class","form-control is-invalid")
				}
			});
			$('#password').change(function(){
				if($('#password').val()!=""){
					$("#password").attr("class","form-control is-valid")
				}else{
					$("#password").attr("class","form-control is-invalid")
				}
			});
		</script>		
    </body>
</html>