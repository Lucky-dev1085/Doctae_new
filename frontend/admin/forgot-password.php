<?php 
$SERVER_IPADDRESS = $_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doctae - Forgot Password</title>
		
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
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Forgot Password?</h1>
								<p class="account-subtitle">Enter your email to get a password reset link</p>
								
								<!-- Form -->
								<form action="http://<?php echo $SERVER_IPADDRESS;?>/admin/login.php">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Reset Password</button>
									</div>
								</form>
								<!-- /Form -->

								<div class="text-center dont-have">Remember your password? <a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/login.php">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/popper.min.js"></script>
        <script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/script.js"></script>
		
    </body>
</html>