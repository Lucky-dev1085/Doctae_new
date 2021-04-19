<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

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
						<a href="index.php" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="index.php">Home</a>
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
							<li class="has-submenu active">
								<a href="">Pharmacy <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="pharmacy-index.php">Pharmacy</a></li>
									<li><a href="pharmacy-details.php">Pharmacy Details</a></li>
									<li><a href="pharmacy-search.php">Pharmacy Search</a></li>
									<li><a href="product-all.php">Product</a></li>
									<li class="active"><a href="product-description.php">Product Description</a></li>
									<li><a href="cart.php">Cart</a></li>
									<li><a href="product-checkout.php">Product Checkout</a></li>
									<li><a href="payment-success.php">Payment Success</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="voice-call.php">Voice Call</a></li>
									<li><a href="video-call.php">Video Call</a></li>
									<li><a href="search.php">Search Doctors</a></li>
									<li><a href="calendar.php">Calendar</a></li>
									<li><a href="components.php">Components</a></li>
									<li class="has-submenu">
										<a href="invoices.php">Invoices</a>
										<ul class="submenu">
											<li><a href="invoices.php">Invoices</a></li>
											<li><a href="invoice-view.php">Invoice View</a></li>
										</ul>
									</li>
									<li><a href="blank-page.php">Starter Page</a></li>
									<li><a href="login.php">Login</a></li>
									<li><a href="register.php">Register</a></li>
									<li><a href="forgot-password.php">Forgot Password</a></li>
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
							<li class="has-submenu">
								<a href="#" target="_blank">Admin <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="admin/index.php" target="_blank">Admin</a></li>
									<li><a href="pharmacy/index.php" target="_blank">Pharmacy Admin</a></li>
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
						<li class="nav-item">
							<a class="nav-link header-login" href="login.php">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Product Description</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Product Description</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">

						<div class="col-md-7 col-lg-9 col-xl-9">
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body product-description">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img1">
													<img src="assets/img/products/product.jpg" class="img-fluid" alt="User Image">
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name mb-2">Benzaxapine Croplex</h4>
												<p><span class="text-muted">Manufactured By </span> Hamdard (Wakf) Laboratories</p>
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
												<div class="feature-product pt-4">
													<span>Applied for:</span>
													<ul>
														<li>Moisturization & Nourishment</li>
														<li>Blackhead Removal</li>
														<li>Anti-acne & Pimples</li>
														<li>Whitening & Fairness</li>
													</ul>
												</div>
											</div>
										</div>
										
									</div>
									
								</div>
							</div>
							<!-- /Doctor Widget -->
							
							<!-- Doctor Details Tab -->
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
										<h3 class="pt-4">Product Details</h3>
										<hr>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-3">
									
										<!-- Overview Content -->
										<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
											<div class="row">
												<div class="col-md-9">
												
													<!-- About Details -->
													<div class="widget about-widget">
														<h4 class="widget-title">Description</h4>
														<p>Safi syrup is best for purifying the blood. As it contains herbal extracts it can cure indigestion, constipation, nose bleeds and acne boils. It helps in the removal of the toxins from the blood. It improves the complexion and gives you a healthy life</p>
													</div>
													<!-- /About Details -->
												
										
													<!-- Awards Details -->
													<div class="widget awards-widget">
														<h4 class="widget-title">Highlights</h4>
														<div class="experience-box">
															<ul class="experience-list">
																<li>
																	<div class="experience-user">
																		<div class="before-circle"></div>
																	</div>
																	<div class="experience-content">
																		<div class="timeline-content">
																			<p>Safi syrup is known for its best purifying syrup for blood.</p>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="experience-user">
																		<div class="before-circle"></div>
																	</div>
																	<div class="experience-content">
																		<div class="timeline-content">
																			
																			<p>It helps in eliminating the toxins from the bloodstream.</p>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="experience-user">
																		<div class="before-circle"></div>
																	</div>
																	<div class="experience-content">
																		<div class="timeline-content">
																			
																			<p>It improves digestion.</p>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="experience-user">
																		<div class="before-circle"></div>
																	</div>
																	<div class="experience-content">
																		<div class="timeline-content">
																			
																			<p>It also helps in indigestion and constipation.</p>
																		</div>
																	</div>
																</li>
															</ul>
														</div>
													</div>
													<!-- /Awards Details -->

													<!-- About Details -->
													<div class="widget about-widget">
														<h4 class="widget-title">Directions for use</h4>
														<p>Adults: Take 2 tablespoons once a day in a glass full of water.</p>
													</div>
													<!-- /About Details -->
													
													<!-- About Details -->
													<div class="widget about-widget">
														<h4 class="widget-title">Storage</h4>
														<p>Store this syrup at room temperature protected from sunlight, heat, and moisture. Keep away from reaching out of children and pets. Ensure that the unused medicine is disposed of properly.</p>
													</div>
													<!-- /About Details -->
													<!-- About Details -->
													<div class="widget about-widget">
														<h4 class="widget-title">Administration Instructions</h4>
														<p>Shake the bottle before its use. This syrup can be taken with or without food. The quantity consumed should not be lesser or greater than the prescribed one.</p>
													</div>
													<!-- /About Details -->

													<!-- About Details -->
													<div class="widget about-widget">
														<h4 class="widget-title">Warning</h4>
														<p>This is not recommended for the pregnant women and lactating mothers.</p>
													</div>
													<!-- /About Details -->
													<!-- About Details -->
													<div class="widget about-widget mb-3">
														<h4 class="widget-title">Precaution</h4>
														<p class="mb-0">Syrup has to be disposed of properly after 3 years from manufactured date and it is not recommended to use after the date.</p>
													</div>
													<!-- /About Details -->
												</div>
											</div>
										</div>
										<!-- /Overview Content -->
										
									</div>
								</div>
							</div>
							<!-- /Doctor Details Tab -->

						</div>

						<div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">
							
							<!-- Right Details -->
							<div class="card search-filter">
								<div class="card-body">
									<div class="clini-infos mt-0">
										<h2>$19 <b class="text-lg strike">$45</b>  <span class="text-lg text-success"><b>10% off</b></span></h2>
									</div>
									<span class="badge badge-primary">In stock</span>
									<div class="custom-increment pt-4">
	                                    <div class="input-group1">
		                                    <span class="input-group-btn float-left">
		                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
		                                          <span><i class="fas fa-minus"></i></span>
		                                        </button>
		                                    </span>
		                                    <input type="text" id="quantity" name="quantity" class=" input-number" value="10">
		                                    <span class="input-group-btn float-right">
		                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
		                                            <span><i class="fas fa-plus"></i></span>
		                                        </button>
		                                    </span>
	                                	</div>
                        			</div>
									<div class="clinic-details mt-4">
										<div class="clinic-booking">
											<a class="apt-btn" href="cart.php">Add To Cart</a>
										</div>
									</div>
									<div class="card flex-fill mt-4 mb-0">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">SKU	<span class="float-right">201902-0057</span></li>
											<li class="list-group-item">Pack Size	<span class="float-right">100g</span></li>
											<li class="list-group-item">Unit Count	<span class="float-right">200ml</span></li>
											<li class="list-group-item">Country	<span class="float-right">Japan</span></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card search-filter">
								<div class="card-body">
									<div class="card flex-fill mt-0 mb-0">
										<ul class="list-group list-group-flush benifits-col">
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-shipping-fast"></i>
												</div>
												<div>
													Free Shipping<br><span class="text-sm">For orders from $50</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="far fa-question-circle"></i>
												</div>
												<div>
													Support 24/7<br><span class="text-sm">Call us anytime</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-hands"></i>
												</div>
												<div>
													100% Safety<br><span class="text-sm">Only secure payments</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-tag"></i>
												</div>
												<div>
													Hot Offers<br><span class="text-sm">Discounts up to 90%</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Right Details -->
							
						</div>

					</div>

					

				</div>
			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="assets/img/footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.php">Search for Doctors</a></li>
										<li><a href="login.php">Login</a></li>
										<li><a href="register.php">Register</a></li>
										<li><a href="booking.php">Booking</a></li>
										<li><a href="patient-dashboard.php">Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.php">Appointments</a></li>
										<li><a href="chat.php">Chat</a></li>
										<li><a href="login.php">Login</a></li>
										<li><a href="doctor-register.php">Register</a></li>
										<li><a href="doctor-dashboard.php">Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.php">Terms and Conditions</a></li>
											<li><a href="privacy-policy.php">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="assets/img/doctors/doctor-thumb-02.jpg" class="call-avatar">
										<h4>Dr. Darren Elder</h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="voice-call.php" class="btn call-item call-start"><i class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										<h4>Dr. Darren Elder</h4>
										<span>Calling ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="video-call.php" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
		
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Fancybox JS -->
		<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>