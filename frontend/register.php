<?php require_once "./common/header.php"; ?>
		<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<!-- <div class="login-header">
											<h3>Patient Register <a href="doctor-register.html">Are you a Doctor?</a></h3>
										</div> -->
										
										<!-- Register Form -->
										<form  id="register_user_form" style="margin-bottom:1rem">
											<div class="form-group form-focus">
												<input type="text" id="regist_user_fname" class="form-control floating" required>
												<label class="focus-label">First Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" id="regist_user_lname" class="form-control floating" required>
												<label class="focus-label">Last Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="email" id="regist_user_email"  class="form-control floating" required>
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="phone" id="regist_user_phone"  class="form-control floating" required>
												<label class="focus-label">Mobile Number</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" id="regist_user_password" class="form-control floating" required>
												<label class="focus-label"> Password</label>
											</div>
											<label class="payment-radio credit-card-option">
												<input type="radio" name="radio" checked value="1">
												<span class="checkmark"></span>
												I am a Doctor.
											</label>
											<!-- <label class="payment-radio credit-card-option">
												<input type="radio" name="radio"  value="2">
												<span class="checkmark"></span>
												I am a pharmacy.
											</label> -->
											<label class="payment-radio credit-card-option">
												<input type="radio" name="radio"  value="3">
												<span class="checkmark"></span>
												I am a Patients.
											</label>
											<div class="text-right">
												<a class="forgot-link" href="<?php echo "http://".$SERVER_IPADDRESS."/login.php";?>">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" id="register_user_btn" type="button">Signup</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6"><a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div>
										</form>
										<!-- /Register Form -->
										
									<div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none; position: fixed; top: 90px; right:30px; z-index:999">
										<strong>Fail! </strong> 
										<span class="alert_content">A has been occurred while submitting your data.</span>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none; position: fixed; top:90px; right:30px; z-index:999">
										<strong>Success! </strong> 
										<span class="alert_content"></span>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
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
				$(document).on('keydown touchend',"#regist_user_phone", function (e) {
					e = e || window.event;
					var key = e.which || e.keyCode;
					var ctrl = e.ctrlKey || e.metaKey || key === 17; 
					if (key != 9 && e.which != 8 && e.which != 0 && !(e.keyCode >= 96 && e.keyCode <= 105) && !(e.keyCode >= 48 && e.keyCode <= 57)) {
						return;
					}
					var curchr = $('#regist_user_phone').val().length;
					var curval = $('#regist_user_phone').val();
					if (curchr == 1 && e.which != 8 && e.which != 0) {
						$('#regist_user_phone').val( curval  + " (");
					} else if (curchr == 6 && e.which != 8 && e.which != 0) {
						$('#regist_user_phone').val(curval + ')' + " ");
					} else if (curchr == 11 && e.which != 8 && e.which != 0) {
						$('#regist_user_phone').val(curval + "-");
					}
					$('#regist_user_phone').attr('maxlength', '16');

				});
			function phoneNumberInput(phonenumber){ 
				var inputValue = phonenumber;
				inputValue = inputValue.replace(/\D/g, '');

				if (!$.isNumeric(inputValue)) {
					return false;
				} else {
					if (inputValue.length > 10) {
						inputValue = String(inputValue.replace(/(\d{1})(\d{3})(\d{3})(\d{4})/, "$1 ($2) $3-$4"));
					} else if (inputValue.length > 7) {
						inputValue = String(inputValue.replace(/(\d{1})(\d{3})(\d{3})(?=\d)/g, '$1 ($2) $3-'));
					} else if (inputValue.length > 4) {
						inputValue = String(inputValue.replace(/(\d{1})(\d{3})(?=\d)/g, '$1 ($2) '));
					} else if (inputValue.length > 1) {
						inputValue = String(inputValue.replace(/(\d{1})(\d{3})(?=\d)/g, '$1 '));
					}

					$('#regist_user_phone').val(inputValue);
					$('#regist_user_phone').val('');
					inputValue = inputValue.substring(0, 16);
					$('#regist_user_phone').val(inputValue);
				}
			}

			$('#register_user_btn').click(function(){
				var regist_user_fname = $("#regist_user_fname").val();
				var regist_user_lname = $("#regist_user_lname").val();
				var regist_user_email = $("#regist_user_email").val();
				var regist_user_phone = $("#regist_user_phone").val();				
				var regist_user_password = $("#regist_user_password").val();

			    var uservalue = $('input[name=radio]:checked', '#register_user_form').val(); 
				if(uservalue=="1"){
					role = "Doctor";
				}else{
					role = "Patients";
				}

				if($('#regist_user_fname').val() != "" && $('#regist_user_fname').val()!=" "){
					$("#regist_user_fname").attr("class","form-control is-valid")
				}else{
					$("#regist_user_fname").attr("class","form-control is-invalid")
					$("#regist_user_fname").focus();
					return;
				}

				if($('#regist_user_lname').val() != "" && $('#regist_user_lname').val()!=" "){
					$("#regist_user_lname").attr("class","form-control is-valid")
				}else{
					$("#regist_user_lname").attr("class","form-control is-invalid")
					$("#regist_user_lname").focus();
					return;
				}

				var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if($('#regist_user_email').val() != "" && $('#regist_user_email').val()!=" " && regex.test($('#regist_user_email').val())){
					$("#regist_user_email").attr("class","form-control is-valid")
				}else{
					$("#regist_user_email").attr("class","form-control is-invalid")
					$("#regist_user_email").focus();
					return;
				}


				if($('#regist_user_phone').val() != "" && $('#regist_user_phone').val()!=" " && $('#regist_user_phone').val().length > 7){
					$("#regist_user_phone").attr("class","form-control is-valid")
				}else{
					$("#regist_user_phone").attr("class","form-control is-invalid")
					$("#regist_user_phone").focus();
					return;
				}


				if($('#regist_user_password').val() != "" && $('#regist_user_password').val()!=" " && $('#regist_user_password').val().length>7){
					$("#regist_user_password").attr("class","form-control is-valid")
				}else{
					$("#regist_user_password").attr("class","form-control is-invalid")
					return;
				}			
				
				var xhr = new XMLHttpRequest();
				var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/auth/signup";
				xhr.open("POST", url, true);
				xhr.setRequestHeader("Content-Type", "application/json");
				xhr.onreadystatechange = function () {
					if (xhr.readyState === 4 && xhr.status === 200) {
						var json = JSON.parse(xhr.responseText);
						if(json.status == "success"){
							$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
							$("#alert_content").html("Successfuly registed");
							$("#alert-success").show();
							setTimeout(function(){ 
								$("#alert-success").fadeOut( "slow" );
								window.location.href="http://<?php echo $SERVER_IPADDRESS;?>/login.php";
							}, 2000);							
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
				var data = JSON.stringify({"role" : role, "sign_email": regist_user_email,"sign_phone":regist_user_phone, "sign_firstName": regist_user_fname, "sign_lastname": regist_user_lname, "sign_password": regist_user_password});
				xhr.send(data);				
			});

			$(document).on("keyup", "#regist_user_password", function(){
				if($('#regist_user_password').val() != "" && $('#regist_user_password').val()!=" " && $('#regist_user_password').val().length>7){
					$("#regist_user_password").attr("class","form-control is-valid")
				}else{
					$("#regist_user_password").attr("class","form-control is-invalid")
				}
			})

			$(document).on("keyup", "#regist_user_phone", function(){
				if($('#regist_user_phone').val() != "" && $('#regist_user_phone').val()!=" " && $('#regist_user_phone').val().length==16){
					$("#regist_user_phone").attr("class","form-control is-valid")
				}else{
					$("#regist_user_phone").attr("class","form-control is-invalid")					
				}
			})
			
			$(document).on("keyup", "#regist_user_email", function(){
				var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if($('#regist_user_email').val() != "" && $('#regist_user_email').val()!=" " && regex.test($('#regist_user_email').val())){
					$("#regist_user_email").attr("class","form-control is-valid")
				}else{
					$("#regist_user_email").attr("class","form-control is-invalid")
				}
			})

			$(document).on("keyup", "#regist_user_lname", function(){
				if($('#regist_user_lname').val() != "" && $('#regist_user_lname').val()!=" "){
					$("#regist_user_lname").attr("class","form-control is-valid")
				}else{
					$("#regist_user_lname").attr("class","form-control is-invalid")
				}
			})

			$(document).on("keyup", "#regist_user_fname", function(){
				if($('#regist_user_fname').val() != "" && $('#regist_user_fname').val()!=" "){
					$("#regist_user_fname").attr("class","form-control is-valid")
				}else{
					$("#regist_user_fname").attr("class","form-control is-invalid")
				}
			})
		</script>
		
