<?php
$SERVER_IPADDRESS = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doctae - Register</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								<p class="account-subtitle">Access to Admin dashboard</p>
								
								<!-- Form -->
								<form action="http://<?php echo $SERVER_IPADDRESS;?>/admin/login.php">
									<div class="form-group">
										<input class="form-control" id="sign_firstName" type="text" placeholder="First Name">
										<div class="invalid-feedback">
											Please fill out this field
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="sign_lastname" type="text" placeholder="Last Name">
										<div class="invalid-feedback">
											Please fill out this field
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="sign_email" type="email" placeholder="Email">
										<div class="invalid-feedback">
											Please fill out this field
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="sign_password" type="password" placeholder="Password">
										<div class="invalid-feedback">
											Please fill out this field
										</div>
									</div>
									<div class="form-group">
										<input class="form-control" id="sign_confirm_password" type="password" placeholder="Confirm Password">
										<div class="invalid-feedback">
											Password is not matched
										</div>
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" id="register_btn" type="button">Register</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<!-- <div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div> -->
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Already have an account? <a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/login.php">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script>
			$('#register_btn').click(function(){
				var sign_firstName = $("#sign_firstName").val();
				var sign_lastname = $("#sign_lastname").val();
				var sign_email = $("#sign_email").val();
				var sign_password = $("#sign_password").val();
				var sign_confirm_password = $("#sign_confirm_password").val();

				if(sign_confirm_password==""){
					$("#sign_confirm_password").attr("class","form-control is-invalid")					
					$("#sign_confirm_password").focus();
				}else if(sign_confirm_password!=''){
					$("#sign_confirm_password").attr("class","form-control is-valid")
				}
				if(sign_password==''){
					$("#sign_password").attr("class","form-control is-invalid")
					$("#sign_password").focus();
				}else if(sign_password!=''){
					$("#sign_password").attr("class","form-control is-valid")
				}
				if(sign_email==""){
					$("#sign_email").attr("class","form-control is-invalid")					
					$("#sign_email").focus();
				}else if(sign_email!=''){
					$("#sign_email").attr("class","form-control is-valid")
				}
				if(sign_lastname==''){
					$("#sign_lastname").attr("class","form-control is-invalid")
					$("#sign_lastname").focus();
				}else if(sign_lastname!=''){
					$("#sign_lastname").attr("class","form-control is-valid")
				}
				if(sign_firstName==''){
					$("#sign_firstName").attr("class","form-control is-invalid")
					$("#sign_firstName").focus();
				}else if(sign_firstName!=''){
					$("#sign_firstName").attr("class","form-control is-valid")
				}
				if(sign_password != sign_confirm_password){
					$("#sign_confirm_password").attr("class","form-control is-invalid")			
				}
				if(((sign_password!="") && (sign_confirm_password!="") && (sign_email!="") && (sign_lastname!="") && (sign_firstName!=""))&&(sign_password == sign_confirm_password)){
					var xhr = new XMLHttpRequest();
					var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/auth/signup_admin";
					xhr.open("POST", url, true);
					xhr.setRequestHeader("Content-Type", "application/json");
					xhr.onreadystatechange = function () {
						if (xhr.readyState === 4 && xhr.status === 200) {
							var json = JSON.parse(xhr.responseText);
							if(json.status == "success"){
								alert("Successfuly registed");
								window.location.href="http://<?php echo $SERVER_IPADDRESS;?>/admin/login.php"
							}else{
								console.log(json.msg)
							}							
						}						
					};
					var data = JSON.stringify({"sign_email": sign_email, "sign_firstName": sign_firstName, "sign_lastname": sign_lastname, "sign_password": sign_password});
					xhr.send(data);
				}
			});

			$('#sign_confirm_password').change(function(){
				if($('#sign_confirm_password').val()!=""){
					$("#sign_confirm_password").attr("class","form-control is-valid")
				}else{
					$("#sign_confirm_password").attr("class","form-control is-invalid")
				}
			});
			$('#sign_email').change(function(){
				if($('#sign_email').val()!=""){
					$("#sign_email").attr("class","form-control is-valid")
				}else{
					$("#sign_email").attr("class","form-control is-invalid")
				}
			});
			$('#sign_password').change(function(){
				if($('#sign_password').val()!=""){
					$("#sign_password").attr("class","form-control is-valid")
				}else{
					$("#sign_password").attr("class","form-control is-invalid")
				}
			});
			$('#sign_lastname').change(function(){
				if($('#sign_lastname').val()!=""){
					$("#sign_lastname").attr("class","form-control is-valid")
				}else{
					$("#sign_lastname").attr("class","form-control is-invalid")
				}
			});
			$('#sign_firstName').change(function(){
				if($('#sign_firstName').val()!=""){
					$("#sign_firstName").attr("class","form-control is-valid")
				}else{
					$("#sign_firstName").attr("class","form-control is-invalid")
				}
			});
		</script>
    </body>
</html>