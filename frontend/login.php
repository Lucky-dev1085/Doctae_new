<?php require_once "./common/header.php"; ?>

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span class="titleTag"></span></h3>
										</div>
										<form >
											<div class="form-group form-focus">
												<input type="email" id="loginEmail" name="loginEmail" class="form-control floating">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" id="loginPass" name="loginPass" class="form-control floating">
												<label class="focus-label">Password</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="<?php echo "http://".$SERVER_IPADDRESS."/forgot-password.php";?>">Forgot Password ?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" id="loginButton" type="button">Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div>
											<div class="text-center dont-have">Don’t have an account? <a href="<?php echo "http://".$SERVER_IPADDRESS."/register.php";?>">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->   
<?php require_once "./common/footer.php" ?>

		<!-- jQuery -->
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/assets/js/popper.min.js"></script>
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/assets/js/slick.js"></script>
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/assets/js/script.js"></script>

		</body>
</html>

<script>
	$('#loginButton').click(function(){
		var loginPassword = $("#loginPass").val();
		var loginEmail = $("#loginEmail").val();

		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if($('#loginEmail').val() != "" && $('#loginEmail').val()!=" " && regex.test($('#loginEmail').val())){
			$("#loginEmail").attr("class","form-control is-valid")
		}else{
			$("#loginEmail").attr("class","form-control is-invalid")
			$("#loginEmail").focus();
			return;
		}

		if($('#loginPass').val() != "" && $('#loginPass').val()!=" " && $('#loginPass').val().length>7){
			$("#loginPass").attr("class","form-control is-valid")
		}else{
			$("#loginPass").attr("class","form-control is-invalid")
			$("#loginPass").focus();
			return;
		}

		var xhr = new XMLHttpRequest();
		var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/auth/signin";
		xhr.open("POST", url, true);
		xhr.setRequestHeader("Content-Type", "application/json");
		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				var json = JSON.parse(xhr.responseText);
				if(json.status == "success"){
					$.ajax({
						type: "POST",
						url: "http://<?php echo $SERVER_IPADDRESS;?>/common/set_session.php",
						data: { email: json.data.email, login:json.data.id }
					});
					$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
					$("#alert_content").html("Successfuly logined");
					$("#alert-success").show();
					setTimeout(function(){
						$("#alert-success").fadeOut( "slow" );
						window.location.href="http://<?php echo $SERVER_IPADDRESS;?>";
					}, 1000);				
				}else{
					$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
					$("#alert_content").html(json.msg);
					$("#alert-success").show();
					setTimeout(function(){ 
						$(".alert-danger").fadeOut( "slow" );
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
		var data = JSON.stringify({"email":loginEmail, "password":loginPassword});
		xhr.send(data);				
	});

	$(document).on("keyup", "#loginEmail", function(){
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if($('#loginEmail').val() != "" && $('#loginEmail').val()!=" " && regex.test($('#loginEmail').val())){
			$("#loginEmail").attr("class","form-control is-valid")
		}else{
			$("#loginEmail").attr("class","form-control is-invalid")
		}
	})

	$(document).on("keyup", "#loginPass", function(){
		if($('#loginPass').val() != "" && $('#loginPass').val()!=" " && $('#loginPass').val().length>7){
			$("#loginPass").attr("class","form-control is-valid")
		}else{
			$("#loginPass").attr("class","form-control is-invalid")
		}
	})
</script>