<?php require_once "./common/header.php"?>
			<!-- Sidebar -->
           
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="active"> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/appointment.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/doctor-list.php"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/reviews.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/transactions-list.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/settings.php"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/invoice-report.php">Invoice Reports</a></li>
								</ul>
							</li>
							<!-- <li class="menu-title"> 
								<span>Pages</span>
							</li> -->
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Blog </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/blog.php"> Blog </a></li>
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/blog-details.php"> Blog Details</a></li>
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/add-blog.php"> Add Blog </a></li>
									<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/edit-blog.php"> Edit Blog </a></li>
								</ul>
							</li>
							<li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/product-list.php"><i class="fe fe-layout"></i> <span>Product List</span></a></li>
							<!-- <li><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/pharmacy-list.php"><i class="fe fe-vector"></i> <span>Pharmacy List</span></a></li> -->
							<!-- <li> 
								<a href="http://<?php// echo $SERVER_IPADDRESS;?>/admin/profile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li> -->
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Invoice Container -->
					<div class="invoice-container">
						
						<div class="row">
							<div class="col-sm-6 m-b-20">
								<img alt="Logo" class="inv-logo img-fluid" src="assets/img/logo.png"">
							</div>
							<div class="col-sm-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">Invoice #INV-0001</h3>
									<ul class="list-unstyled mb-0">
										<li>Date: <span>March 12, 2019</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 m-b-20">
								<ul class="list-unstyled mb-0">
									<li>Doctae Hospital</li>
									<li>3864 Quiet Valley Lane,</li>
									<li>Sherman Oaks, CA, 91403</li>
									<li>GST No:</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
								<h6>Invoice to</h6>
								<ul class="list-unstyled mb-0">
									<li><h5 class="mb-0"><strong>Charlene Reed</strong></h5></li>
									<li>4417 Goosetown Drive</li>
									<li>Taylorsville, NC, 28681</li>
									<li>United States</li>
									<li>8286329170</li>
									<li><a href="#">charlenereed@example.com</a></li>
								</ul>
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
								<h6>Payment Details</h6>
								<ul class="list-unstyled invoice-payment-details mb-0">
									<li><h5>Total Due: <span class="text-right">$200</span></h5></li>
									<li>Bank name: <span>Profit Bank Europe</span></li>
									<li>Country: <span>United Kingdom</span></li>
									<li>City: <span>London E1 8BF</span></li>
									<li>Address: <span>3 Goodman Street</span></li>
									<li>IBAN: <span>KFH37784028476740</span></li>
									<li>SWIFT code: <span>BPT4E</span></li>
								</ul>
							</div>
						</div>
						
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>ITEM</th>
										<th class="d-none d-sm-table-cell">DESCRIPTION</th>
										<th class="text-nowrap">UNIT COST</th>
										<th>QTY</th>
										<th>TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>medicine1</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$10</td>
										<td>2</td>
										<td>$10</td>
									</tr>
									<tr>
										<td>2</td>
										<td>medicine2</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$10</td>
										<td>1</td>
										<td>$10</td>
									</tr>
									<tr>
										<td>3</td>
										<td>medicine3</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$90</td>
										<td>1</td>
										<td>$90</td>
									</tr>
									<tr>
										<td>4</td>
										<td>medicine4</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$70</td>
										<td>1</td>
										<td>$70</td>
									</tr>
									<tr>
										<td>5</td>
										<td>medicine5</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>70</td>
										<td>1</td>
										<td>$70</td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<div>
							<div class="row invoice-payment">
								<div class="col-sm-7">
								</div>
								<div class="col-sm-5">
									<div class="m-b-20">
										<h6>Total due</h6>
										<div class="table-responsive no-border">
											<table class="table mb-0">
												<tbody>
													<tr>
														<th>Subtotal:</th>
														<td class="text-right">$250</td>
													</tr>
													<tr>
														<th>Tax: <span class="text-regular">(25%)</span></th>
														<td class="text-right">$50</td>
													</tr>
													<tr>
														<th>Total:</th>
														<td class="text-right text-primary"><h5>$200</h5></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="invoice-info">
								<h5>Other information</h5>
								<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
							</div>
						</div>
						
					</div>
					<!-- /Invoice Container -->
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
    </body>
</html>