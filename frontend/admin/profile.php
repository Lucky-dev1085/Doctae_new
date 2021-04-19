<?php require_once "./common/header.php"?>

			<!-- Sidebar -->
			<script>
				var userCategory="";
				var itemid="";
				$(document).ready(function() {	
					$("#avatarimagebutton").css("pointer-events","none")
					if(window.location.search.substr(1)){ 
						function phoneNumberInput(phonenumber){ 
							$(this).on('keydown touchend', function (e) {
								e = e || window.event;
								var key = e.which || e.keyCode;
								var ctrl = e.ctrlKey || e.metaKey || key === 17; 
								// if (key != 9 && e.which != 8 && e.which != 0 && !(e.keyCode >= 96 && e.keyCode <= 105) && !(e.keyCode >= 48 && e.keyCode <= 57)) {
								// 	return false;
								// }
								var curchr = $('#persionaldetails_mobile').val().length;
								var curval = $('#persionaldetails_mobile').val();
								if (curchr == 1 && e.which != 8 && e.which != 0) {
									$('#persionaldetails_mobile').val( curval  + " (");
								} else if (curchr == 6 && e.which != 8 && e.which != 0) {
									$('#persionaldetails_mobile').val(curval + ')' + " ");
								} else if (curchr == 11 && e.which != 8 && e.which != 0) {
									$('#persionaldetails_mobile').val(curval + "-");
								}
								$('#persionaldetails_mobile').attr('maxlength', '16');

							});

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

								$('#persionaldetails_mobile').val(inputValue);
								$('#persionaldetails_mobile').val('');
								inputValue = inputValue.substring(0, 16);
								$('#persionaldetails_mobile').val(inputValue);
							}
						}

					var getParam = window.location.search.substr(1);
        			getParam = getParam.trim();
					var splitStr = getParam.split("=");

					userCategory = splitStr[0];
					itemid=splitStr[1];
					itemid=itemid.trim();
					userCategory = userCategory.trim();
					if(userCategory=="D"){
						userCategory="Doctor";
						var url = "http://localhost:3000/api/user/getUserListProfile";
					}else if(userCategory=="P"){
						userCategory="Patients"
						var url = "http://localhost:3000/api/user/getUserListProfile";
					}else if(userCategory=="M"){
						userCategory="Admin"
						var url = "http://localhost:3000/api/user/getAdminProfile";
					}

					var users = new XMLHttpRequest();
					
					users.open("POST", url, true);
					users.setRequestHeader("Content-Type", "application/json");
					users.onreadystatechange = function () {
						if (users.readyState === 4 && users.status === 200) {
							var json = JSON.parse(users.responseText);
							var doctor_string=``;
							arraylenght = json.items.length
							$(".user-name").html(json.items[0].firstname + " " + json.items[0].lastname);
							$("#genEmail").html(json.items[0].email);
							$(".avatarOldfileFlag").attr("itemid",json.items[0]._id);
							$(".avatarOldfileFlag").attr("oldfilename",json.items[0].avatar);
							if(json.items[0].avatar!=null && json.items[0].avatar!=""){
								$("#imagePreview").attr("src","http://<?php echo $SERVER_IPADDRESS;?>/resource/images/uploads/"+json.items[0].avatar)
							}
							if(json.items[0].description!=null && json.items[0].description!=""){
								$(".about-text").val(json.items[0].description)
							}

							//             edit modal data               //
							const e = $.Event('paste');
							$("#persionaldetails_firstname").val(json.items[0].firstname);
							$("#persionaldetails_lastname").val(json.items[0].lastname);
							$("#persionaldetails_email").val(json.items[0].email);
							$("#persionaldetails_save_btn").attr("itemid",json.items[0]._id);
							$("#persionaldetails_save_btn").attr("itemtype",json.items[0]._id);
							$("#persionaldetails_birth").val(json.items[0].birth);	
							$("#persionaldetails_address").val(json.items[0].address);	
							$("#persionaldetails_city").val(json.items[0].city);	
							$("#persionaldetails_state").val(json.items[0].state);	
							$("#persionaldetails_zipcode").val(json.items[0].zipcode);	
							$("#persionaldetails_country").val(json.items[0].country);
							if((json.items[0].state!=null)&&(json.items[0].country!=null)){
								$(".user-Location").html(`<i class="fa fa-map-marker"></i> `+json.items[0].state+", "+json.items[0].country)
							}	
							$("#profile_details_username").html(json.items[0].firstname+" "+json.items[0].firstname);
							$("#profile_details_birth").html(json.items[0].birth);
							$("#profile_details_email").html(json.items[0].email);
							$("#profile_details_mobile").html(json.items[0].phone);
							string="";
							if( json.items[0].address!=null){
								string=json.items[0].address + ", <br/>";
							}else{
								string="<br/>";
							}
							if( json.items[0].city!=null){
								string += json.items[0].city+", <br/>";
							}else{
								string += "<br/>";
							}
							if( (json.items[0].state!=null)&&(json.items[0].zipcode!=null)){
								string += json.items[0].state+" - "+json.items[0].zipcode+", <br/>";
							}else{
								string += "<br/>";
							}
							if( (json.items[0].state!=null)&&(json.items[0].zipcode!=null)){
								string += json.items[0].country+"<br/>";
							}else{
								string += "<br/>";
							}
							$("#profile_details_fulladdress").html(string);
							phoneNumberInput(json.items[0].phone);
						}
					};
					var data = JSON.stringify({"role" : userCategory, "itemid" : itemid});

					users.send(data);

					}	
				});

				$(document).on("focusin","#editProfiledetails input",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");
						$(".avatarimage").css("border","none");
					}
				});		
				$(document).on("focusout","#editProfiledetails input",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");
					}
				});	
				$(document).on("keyup","#editProfiledetails input",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});
				$(document).on("click","#edit_personal_details_modal_close_btn", function(){
					window.location.reload()
				})

				$(document).on("click", "#persionaldetails_save_btn", function(){
					if($("#persionaldetails_firstname").val()=="" || $("#persionaldetails_firstname").val()==" "){
						$("#persionaldetails_firstname").val("");
						document.getElementById("persionaldetails_firstname").focus(); 
					}else if($("#persionaldetails_lastname").val()=="" || $("#persionaldetails_lastname").val()==" "){
						$("#persionaldetails_lastname").val("");
						document.getElementById("persionaldetails_lastname").focus(); 
					}else if($("#persionaldetails_birth").val()=="" || $("#persionaldetails_birth").val()==" "){
						$("#persionaldetails_birth").val("");
						document.getElementById("persionaldetails_birth").focus(); 
					}else if($("#persionaldetails_email").val()=="" || $("#persionaldetails_email").val()==" "){
						$("#persionaldetails_email").val("");
						document.getElementById("persionaldetails_email").focus(); 
					}else if($("#persionaldetails_mobile").val()=="" || $("#persionaldetails_mobile").val()==" "){
						$("#persionaldetails_mobile").val("");
						document.getElementById("persionaldetails_mobile").focus(); 
					}else if($("#persionaldetails_address").val()=="" || $("#persionaldetails_address").val()==" "){
						$("#persionaldetails_address").val("");
						document.getElementById("persionaldetails_address").focus(); 
					}else if($("#persionaldetails_city").val()=="" || $("#persionaldetails_city").val()==" "){
						$("#persionaldetails_city").val("");
						document.getElementById("persionaldetails_city").focus(); 
					}else if($("#persionaldetails_state").val()=="" || $("#persionaldetails_state").val()==" "){
						$("#persionaldetails_state").val("");
						document.getElementById("persionaldetails_state").focus(); 
					}else if($("#persionaldetails_zipcode").val()=="" || $("#persionaldetails_zipcode").val()==" "){
						$("#persionaldetails_zipcode").val("");
						document.getElementById("persionaldetails_zipcode").focus(); 
					}else if($("#persionaldetails_country").val()=="" || $("#persionaldetails_country").val()==" "){
						$("#persionaldetails_country").val("");
						document.getElementById("persionaldetails_country").focus(); 
					}else{
						var user = new XMLHttpRequest();
						if(userCategory!="Admin"){
							var url = "http://localhost:3000/api/user/saveMember";
						}else{
							var url = "http://localhost:3000/api/user/saveadmin";
						}
						user.open("POST", url, true);
						user.setRequestHeader("Content-Type", "application/json");
						user.onreadystatechange = function () {
							if (user.readyState === 4 && user.status === 200) {
								var json = JSON.parse(user.responseText);
									
								if(json["status"]=="success"){
									$("#edit_personal_details_modal_close_btn").trigger( "click" );
									$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
									$("#alert_content").html(json["msg"]);
									$("#alert-success").show();
									setTimeout(function(){ 
										$("#alert-success").fadeOut( "slow" );
										window.location.reload()
									}, 2000);
								}
							}
						};
						var data = JSON.stringify({
							"_id" :$(this).attr("itemid"),
							"first_name" :$("#persionaldetails_firstname").val(),
							"last_name" : $("#persionaldetails_lastname").val(),
							"email" : $("#persionaldetails_email").val(),
							"birth" : $("#persionaldetails_birth").val(),
							"mobile" : $("#persionaldetails_mobile").val(),
							"address" : $("#persionaldetails_address").val(),
							"city" : $("#persionaldetails_city").val(),
							"state" : $("#persionaldetails_state").val(),
							"zipcode" : $("#persionaldetails_zipcode").val(),
							"country" : $("#persionaldetails_country").val()
						});

						user.send(data);
					}
				});

				$(document).on("change",".avatarimage", function()
				{
					var uploadFile = $(this);
					var files = !!this.files ? this.files : [];
					if (!files.length || !window.FileReader) return;
					if (/^image/.test( files[0].type)){
						var reader = new FileReader(); 
						reader.readAsDataURL(files[0]);
						reader.onloadend = function(){ 							
							uploadFile.closest(".imgUp").find('#imagePreview').attr("src", this.result);
							$(".avatarOldfileFlag").attr("ischange","yes");								
						}
					}				
				});
				
				

				$(document).on("click","#avatar_description_editbtn", function(){
					if($(this).html()=="Edit"){
						$("#avatarimagebutton").css("pointer-events","auto")	
						$(".about-text").removeAttr("readonly")
						$(".about-text").css("border-top","solid")	
						$(".about-text").css("border-left","solid")	
						$(".about-text").css("border-right","solid")	
						$(".about-text").css("border-width","1px")	
						$(".about-text").css("border-color","#999")	
						$(this).html("Save")
					}else{
						$("#avatarimagebutton").css("pointer-events","none	")							
						$(".about-text").attr("readonly","enable");
						$(".about-text").css("border","none")	
						$(this).html("Edit")

						if(userCategory!="Admin"){
							var posturl = "http://localhost:3000/api/user/editUserAvatar";
						}else{
							var posturl = "http://localhost:3000/api/user/editAdminAvatar";
						}
						console.log(userCategory)
						
						oldfile= $(".avatarOldfileFlag").attr("oldfilename");
						itemid= $(".avatarOldfileFlag").attr("itemid");
						ischange= $(".avatarOldfileFlag").attr("isChange");
						description = $(".about-text").val()

						var form = $('#avatarAnddescriptionform')[0];
						var data = new FormData(form);
						data.append('oldfile',oldfile);
						data.append('itemid',itemid);
						data.append('ischange',ischange);
						data.append('description',description);
						$.ajax({
							type: "POST",
							enctype: 'multipart/form-data',
							url: posturl,
							data: data, 
							processData: false,
							contentType: false,
							cache: false,
							success: (d) => {								
								$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
								$("#alert_content").html(d.msg);
								$("#alert-success").show();
								setTimeout(function(){
									$("#alert-success").fadeOut( "slow" );
								}, 2000);
							},
							error: (e) => {						
								$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
								$("#alert_content").html(e);
								$("#alert-success").show();
								setTimeout(function(){ 
									$("#alert-success").fadeOut( "slow" );
								}, 2000);
							}
						});
					}
				})

				$(document).on("focusout","#persionaldetails_oldpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});

				$(document).on("focusin","#persionaldetails_oldpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});

				$(document).on("keyup","#persionaldetails_oldpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});

				$(document).on("keyup","#persionaldetails_newpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($(this).val().length<8){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});
				$(document).on("focusout","#persionaldetails_newpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($(this).val().length<8){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});

				$(document).on("focusin","#persionaldetails_newpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($(this).val().length<8){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});
				$(document).on("keyup","#persionaldetails_confirmpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($(this).val().length<8){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($("#persionaldetails_newpassword").val()!=$("#persionaldetails_confirmpassword").val()){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");
                    }else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});
				$(document).on("focusout","#persionaldetails_confirmpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($(this).val().length<8){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($("#persionaldetails_newpassword").val()!=$("#persionaldetails_confirmpassword").val()){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");
                    }else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});

				$(document).on("focusin","#persionaldetails_confirmpassword",function() {
					if(($(this).val()=="") || ($(this).val()==" ")){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($(this).val().length<8){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");				
					}else if($("#persionaldetails_newpassword").val()!=$("#persionaldetails_confirmpassword").val()){
						$(this).css("border-color","red");
						$(this).css("border-style","dashed");    	
						$(".avatarimage").css("border","none");
                    }else{
						$(this).css("border-color","#dad5d5");
						$(this).css("border-style","solid");  
						$(".avatarimage").css("border","none");  					
					}
				});

				$(document).on("click", "#persionaldetails_changepassword_btn", function(){
					oldPass = $("#persionaldetails_oldpassword").val()
					newpass = $("#persionaldetails_newpassword").val()
					confirmPass = $("#persionaldetails_confirmpassword").val()
				 	if($("#persionaldetails_oldpassword").val()=="" || $("#persionaldetails_oldpassword").val()==" "){
						$("#persionaldetails_oldpassword").val("");
						document.getElementById("persionaldetails_oldpassword").focus(); 
					}else if($("#persionaldetails_newpassword").val()=="" || $("#persionaldetails_newpassword").val()==" "){
						$("#persionaldetails_newpassword").val("");
						document.getElementById("persionaldetails_newpassword").focus(); 						
					}else if($("#persionaldetails_newpassword").val().length<8){						
						document.getElementById("persionaldetails_newpassword").focus();
						$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
						$(".alerttype").html("Wrong! ")
						$("#alert_content").html("New Password minimum length is 8 characters.");
						$("#alert-success").show();
						setTimeout(function(){ 
							$("#alert-success").fadeOut( "slow" );
						}, 3000);				
					}else if($("#persionaldetails_confirmpassword").val()=="" || $("#persionaldetails_confirmpassword").val()==" "){
						$("#persionaldetails_confirmpassword").val("");
						document.getElementById("persionaldetails_confirmpassword").focus(); 
					}else if(newpass!=confirmPass){
						$("#persionaldetails_confirmpassword").val("");
						$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
						$(".alerttype").html("Wrong! ")
						$("#alert_content").html("Confirmpassword does not match with Password");
						$("#alert-success").show();
						setTimeout(function(){ 
							$("#alert-success").fadeOut( "slow" );
						}, 3000);
					}else{
						var user = new XMLHttpRequest();
						if(userCategory!="Admin"){
							var url = "http://localhost:3000/api/user/changeUserPwd";
						}else{
							var url = "http://localhost:3000/api/user/changePwd";
						}
						user.open("POST", url, true);
						user.setRequestHeader("Content-Type", "application/json");
						user.onreadystatechange = function () {
							if (user.readyState === 4 && user.status === 200) {
								var json = JSON.parse(user.responseText);									
								if(json["status"]=="success"){
									$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
									$(".alerttype").html("Success! ")
									$("#alert_content").html(json["msg"]);
									$("#alert-success").show();
									setTimeout(function(){ 
										$("#alert-success").fadeOut( "slow" );
									}, 2000);
								}else{
									$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
									$(".alerttype").html("Warning! ")
									$("#alert_content").html(json["msg"]);
									$("#alert-success").show();
									setTimeout(function(){ 
										$("#alert-success").fadeOut( "slow" );
									}, 2000);
								}
							}
						};
						var data = JSON.stringify({
							"oldpassword":oldPass,
							"newpassword":newpass,
							"itemid":itemid
						});

						user.send(data);
					}					
				})
			</script>
           
            <div class="sidebar" id="sidebar" >
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li> 
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
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://<?php echo $SERVER_IPADDRESS;?>/admin/">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<form id="avatarAnddescriptionform"  method="post" enctype="multipart/form-data">
											<div class="col-sm-12 imgUp">
												<label class="btn" id="avatarimagebutton">
													<img class="rounded-circle" id="imagePreview" src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/img/doctors/doctor-thumb-01.jpg" style="width: 120px; height:120px">
													<input type="file" class="avatarimage" id="avatarimage" name="uploadfile"  value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;  position: absolute;">
												</label>
												<input type="hidden" value="" class="avatarOldfileFlag" isChange="no" oldfilename="" itemid="">
											</div>
										</form>
									</div>
									
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"></h4>
										<h6 class="text-muted" id="genEmail"></h6>
										<div class="user-Location"></div>
										<textarea readonly class="about-text" style="display: inline-table; margin-top: 0px; margin-bottom: 0px; width: 100%; border: none; resize: none; overflow: auto; outline: none; box-shadow: none;"></textarea >
									</div>
									<div class="col-auto profile-btn">
										 
										<a class="btn btn-primary" id="avatar_description_editbtn" style="cursor: pointer;">Edit</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link edit_personal_details" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10" id="profile_details_username"></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10" id="profile_details_birth"></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10" id="profile_details_email"></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10" id="profile_details_mobile"></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-10 mb-0" id="profile_details_fulladdress"></p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true" id="edit_personal_details_modal_close_btn">&times;</span>
															</button>
														</div>
														
														<div class="modal-body">
															<form id="editProfiledetails" method="post" enctype="multipart/form-data">
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text" id="persionaldetails_firstname" name="first_name" class="form-control" value="" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text" id="persionaldetails_lastname" name="last_name" class="form-control" value="" required>
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																			<label>Date of Birth</label>
																			<div class="cal-icon">
																				<input type="text" class="form-control" name="birth" id="persionaldetails_birth" value="" placeholder="12-12-1990" required>																				
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" name="email" id="persionaldetails_email" value="" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="mobile" value=""  id="persionaldetails_mobile" name="mobile" class="form-control" placeholder="1 (989) 543-1431" required>
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" class="form-control"  id="persionaldetails_address" name="address" value="" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>City</label>
																			<input type="text" class="form-control" name="city" id="persionaldetails_city" value="" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>State</label>
																			<input type="text" class="form-control" name="state"  id="persionaldetails_state" value="" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Zip Code</label>
																			<input type="text" class="form-control" name="zipcode" id="persionaldetails_zipcode" value="" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Country</label>
																			<input type="text" class="form-control" name="country" id="persionaldetails_country" value="" required>
																		</div>
																	</div>
																</div>
																<button type="button" class="btn btn-primary btn-block" itemid="" itemtype="" id="persionaldetails_save_btn" >Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form>
														<div class="form-group">
															<label>Old Password</label>
															<input type="password"  id="persionaldetails_oldpassword" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password"  id="persionaldetails_newpassword" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password"  id="persionaldetails_confirmpassword" class="form-control">
														</div>
														<button class="btn btn-primary"  id="persionaldetails_changepassword_btn" type="button">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->

			<div class="alert alert-success alert-dismissible fade show" id="alert-success" role="alert" style="display:none; position: fixed; top:90px; right:30px; z-index:999">
				<strong class="alerttype">Success! </strong> 
				<span class="alert_content" id="alert_content"></span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/jquery-3.2.1.min.js"></script>
		
			<!-- Bootstrap Core JS -->
			<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/popper.min.js"></script>
			<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/bootstrap.min.js"></script>
			
			<!-- Slimscroll JS -->
			<script src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
			
			<!-- Custom JS -->
			<script  src="http://<?php echo $SERVER_IPADDRESS;?>/admin/assets/js/script.js"></script>
		
    	</body>
</html>