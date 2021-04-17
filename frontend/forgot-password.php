<?php require_once "./common/header.php"; ?>
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Forgot Password?</h3>
											<p class="small text-muted">Enter your email to get a password reset link</p>
										</div>
										
										<!-- Forgot Password Form -->
										<form>
											<div class="form-group form-focus">
												<input type="email" class="form-control floating">
												<label class="focus-label">Email</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="<?php echo "http://".$SERVER_IPADDRESS."/login.php";?>">Remember your password?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Reset Password</button>
										</form>
										<!-- /Forgot Password Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
							
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