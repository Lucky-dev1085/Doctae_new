<?php require_once "./common/doctor-profile_side.php"; ?>
<script>
	$(document).on("change","#userAvatarinput", function(){
		var uploadFile = $(this);
		var files = !!this.files ? this.files : [];
		if (!files.length || !window.FileReader) return;
		if (/^image/.test( files[0].type)){
			var reader = new FileReader(); 
			$("#userAvatarinput").attr("oldfile","");
			reader.readAsDataURL(files[0]);
			reader.addEventListener("load", function () {
				$('#userAvatarimage').attr("src", reader.result);	
			}, false);
		}
	});
		
	$(document).ready(function(){		
		userEmail = "<?php  if (isset($_SESSION["user"])){ echo $_SESSION["user"]; }else{echo "";} ?>";
		var user = new XMLHttpRequest();
		var url = "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/user/getUserinfo";
		user.open("POST", url, true);
		user.setRequestHeader("Content-Type", "application/json");
		user.onreadystatechange = function () {
			if (user.readyState === 4 && user.status === 200) {
				var json = JSON.parse(user.responseText);
				responstring = user.responseText;
				if(responstring.length>100){					
					$("#userAvatarinput").attr("oldfile",json.items[0].avatar);
					$("#userAvatarinput").attr("itemid",json.items[0]._id);
					$("#useremail").val(json.items[0].email);
					$("#userfirstname").val(json.items[0].firstname);
					$("#userlastname").val(json.items[0].lastname);
					phoneNumberInput(json.items[0].phone);
					$("#userbirth").val(json.items[0].birth);
					$("#userabout").val(json.items[0].description);
					$("#useraddress").val(json.items[0].address);
					$("#usercity").val(json.items[0].city);
					$("#userstate").val(json.items[0].state);
					$("#usercountry").val(json.items[0].country);
					$("#userzipcode").val(json.items[0].zipcode);
					$("#clinicname").val(json.items[0].clinicname);
					$("#clinicaddress").val(json.items[0].clinicaddress);
					$("#services").tagsinput('add', json.items[0].services);
					$("#specialist").tagsinput('add', json.items[0].specialties);
					////////////////////////////
					educationsVal = JSON.parse(json.items[0].educations)
					$("#educationdegree0").val(educationsVal[0].degree);
					$("#educationcollege0").val(educationsVal[0].college);
					$("#educationyearofcompletion0").val(educationsVal[0].year);
					$("#gender").val(json.items[0].gender);
					$("#blood").val(json.items[0].blood);
					
					educationNumber = 0;
					if (educationsVal.length>1) {
						for(i=1;i<educationsVal.length;i++){ 
							educationsVals = json.items[0].educations.educationNumber;
							education = `<div class="row form-row education-cont">
									<div class="col-12 col-md-10 col-lg-11">
									<div class="row form-row">
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group"><label>Degree</label><input id="educationdegree`+i+`" value="`+educationsVal[i].degree+`" type="text" class="form-control  educationdegree"></div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group"><label>College/Institute</label><input id="educationcollege`+i+`" value="`+educationsVal[i].college+`" type="text" class="form-control educationcollege"></div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group"><label>Year of Completion</label><input id="educationyearofcompletion`+i+`" value="`+educationsVal[i].year+`" type="text" class="form-control educationyearofcompletion"></div>
											</div>
										</div>
									</div>
									<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
							</div>`						
							document.querySelector('.education-info').insertAdjacentHTML('beforeend',education);
						}
					}
					////////////////////////////
					experience = JSON.parse(json.items[0].experiences);
					if (experience.length>0) {
						for(i=0;i<experience.length;i++){ 
							experienceStr = `<div class="row form-row experience-cont">
								<div class="col-12 col-md-10 col-lg-11">
									<div class="row form-row">
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group"><label>Hospital Name</label><input id="experiencehospialname`+i+`" value="`+experience[i].experiencename+`" type="text" class="form-control experiencehospialname"></div>
										</div>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group"><label>From</label><input id="experiencehospiafrom`+i+`" value="`+experience[i].experiencehospitalfrom+`" type="text" class="form-control experiencehospialfrom"></div>
										</div>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group"><label>To</label><input id="experiencehospiato`+i+`" value="`+experience[i].experiencehospitalto+`" type="text" class="form-control experiencehospialto"></div>
										</div>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group"><label>Designation</label><input id="experiencehospialdesignation`+i+`" value="`+experience[i].experiencedesignation+`" type="text" class="form-control experiencehospialdesignation"></div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
							</div>`
							document.querySelector('.experience-info').insertAdjacentHTML('beforeend', experienceStr);
						}
					}
					////////////////////////////
					awardsVal = JSON.parse(json.items[0].awards);
					if (awardsVal.length>0) {
						for(i=0;i<awardsVal.length;i++){ 
							awards = `<div class="row form-row awards-cont">
								<div class="col-12 col-md-5">
									<div class="form-group"><label>Awards </label><input id="awardaward`+i+`" value="`+awardsVal[i].award+`" type="text" class="form-control awardaward"></div>
								</div>
								<div class="col-12 col-md-5">
									<div class="form-group"><label>Year  </label><input id="awardyear`+i+`" value="`+awardsVal[i].year+`" type="text" class="form-control awardyear"></div>
								</div>
								<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
							</div>`
							document.querySelector('.awards-info').insertAdjacentHTML('beforeend', awards);
						}
					}
					////////////////////////////
					membershipsVal = JSON.parse(json.items[0].memberships);
					if (membershipsVal.length>0) {
						for(i=0;i<membershipsVal.length;i++){ 
						membership = `<div class="row form-row membership-cont">
							<div class="col-12 col-md-10 col-lg-5">
								<div class="form-group"><label>Memberships  </label><input id="memberships`+(i)+`" type="text" value="`+membershipsVal[i]+`" class="form-control memberships"></div>
							</div>
							<div class="col-12 col-md-2 col-lg-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
						</div>`
						document.querySelector('.membership-info').insertAdjacentHTML('beforeend', membership);
						}
					}
					////////////////////////////
					registrationsVal = JSON.parse(json.items[0].registrations);
					if (registrationsVal.length>0) {
						for(i=0;i<registrationsVal.length;i++){ 
							registrations=`<div class="row form-row reg-cont">
								<div class="col-12 col-md-5">
									<div class="form-group"><label>Registrations </label><input type="text" id="registrations`+(i)+`"  value="`+registrationsVal[i].registration+`" class="form-control registrations"></div>
								</div>
								<div class="col-12 col-md-5">
									<div class="form-group"><label>Year  </label><input id="registrationsyear`+(i)+`"  value="`+registrationsVal[i].year+`" type="text" class="form-control registrationsyear"></div>
								</div>
								<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
							</div>`
							document.querySelector('.registrations-info').insertAdjacentHTML('beforeend', registrations);
						}
					}
				}
			}						
		};
		var data = JSON.stringify({"email": userEmail});
		user.send(data);
	})

	educationNumber=0
	
	$(document).on("click", "#add-education", function(){
		educationNumber +=1
		education = `<div class="row form-row education-cont">
						<div class="col-12 col-md-10 col-lg-11">
							<div class="row form-row">
									<div class="col-12 col-md-6 col-lg-4">
										<div class="form-group"><label>Degree </label><input id="educationdegree`+educationNumber+`"  type="text" class="form-control  educationdegree"></div>
									</div>
									<div class="col-12 col-md-6 col-lg-4">
										<div class="form-group"><label>College/Institute  </label><input id="educationcollege`+educationNumber+`" type="text" class="form-control educationcollege"></div>
									</div>
									<div class="col-12 col-md-6 col-lg-4">
										<div class="form-group"><label>Year of Completion </label><input id="educationyearofcompletion`+educationNumber+`" type="text" class="form-control educationyearofcompletion"></div>
									</div>
								</div>
							</div>
						<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
					</div>`
		
		document.querySelector('.education-info').insertAdjacentHTML('beforeend',education);
	})
	experienceCount =0
	$(document).on("click", "#add-experience", function(){
		experienceCount +=1
		experience = `<div class="row form-row experience-cont">
			<div class="col-12 col-md-10 col-lg-11">
				<div class="row form-row">
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group"><label>Hospital Name </label><input id="experiencehospialname`+experienceCount+`" type="text" class="form-control experiencehospialname"></div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group"><label>From </label><input id="experiencehospiafrom`+experienceCount+`" type="text" class="form-control experiencehospialfrom"></div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group"><label>To  </label><input id="experiencehospiato`+experienceCount+`" type="text" class="form-control experiencehospialto"></div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group"><label>Designation </label><input id="experiencehospialdesignation`+experienceCount+`"   type="text" class="form-control experiencehospialdesignation"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
		</div>`
		document.querySelector('.experience-info').insertAdjacentHTML('beforeend', experience);
	})
	awardCount =0
	$(document).on("click","#add-award", function(){
		awardCount +=1
		awards = `<div class="row form-row awards-cont">
					<div class="col-12 col-md-5">
						<div class="form-group"><label>Awards </label><input id="awardaward`+awardCount+`"  type="text" class="form-control awardaward"></div>
					</div>
					<div class="col-12 col-md-5">
						<div class="form-group"><label>Year  </label><input id="awardyear`+awardCount+`"  type="text" class="form-control awardyear"></div>
					</div>
					<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
				</div>`
				document.querySelector('.awards-info').insertAdjacentHTML('beforeend', awards);
	})
	membershipCount = 0
	$(document).on("click", "#add-membership", function(){
		membershipCount +=1
		membership = `<div class="row form-row membership-cont">
			<div class="col-12 col-md-10 col-lg-5">
				<div class="form-group"><label>Memberships  </label><input id="memberships`+(membershipCount)+`" type="text" class="form-control memberships"></div>
			</div>
			<div class="col-12 col-md-2 col-lg-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
		</div>`
		document.querySelector('.membership-info').insertAdjacentHTML('beforeend', membership);
	})
	registrationCount = 0
	$(document).on("click","#add-reg", function(){
		registrationCount += 1
		registration=`<div class="row form-row reg-cont">
			<div class="col-12 col-md-5">
				<div class="form-group"><label>Registrations </label><input type="text" id="registrations`+(registrationCount)+`" class="form-control registrations"></div>
			</div>
			<div class="col-12 col-md-5">
				<div class="form-group"><label>Year  </label><input id="registrationsyear`+(registrationCount)+`" type="text" class="form-control registrationsyear"></div>
			</div>
			<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
		</div>`
		document.querySelector('.registrations-info').insertAdjacentHTML('beforeend', registration);
	})
	var price_type=""; price_rating=0;
	$(document).on("click",".custom-control-input", function(){
		$(this).get(0).hasAttribute('checked');
		price_type = $(this).val();
	})

	$(document).on("click", "#saveUserProfile", function(){
		oldfile= $("#userAvatarinput").attr("oldfile");
		itemid= $("#userAvatarinput").attr("itemid");

		services = $("#services").val();
		specialties = $("#specialist").val()

		k = 0; educationinfo=[]; educations="";
		$(".education-info .education-cont").each(function(){
			var degreeObj= $(this).find("input.educationdegree");
			var collegeObj= $(this).find("input.educationcollege");
			var yearObj= $(this).find("input.educationyearofcompletion");
			educationinfo[k]={"degree":degreeObj.val(), "college":collegeObj.val(), "year":yearObj.val()};
			educations=JSON.stringify(educationinfo);
			k += 1;
		});
		k = 0; experiences="", experience=[];
		$(".experience-info .experience-cont").each(function(){
			var experiencenameObj= $(this).find("input.experiencehospialname");
			var hospitalfromObj= $(this).find("input.experiencehospialfrom");
			var hospitaltoObj= $(this).find("input.experiencehospialto");
			var designationObj= $(this).find("input.experiencehospialdesignation");
			experience[k]={"experiencename":experiencenameObj.val(), "experiencehospitalfrom":hospitalfromObj.val(), "experiencehospitalto":hospitaltoObj.val(), "experiencedesignation":designationObj.val()}
			experiences=JSON.stringify(experience)
			k+=1;
		});
		k = 0; award=[]; awards="";
		$(".awards-info .awards-cont").each(function(){
			var awardObj= $(this).find("input.awardaward");
			var yearObj= $(this).find("input.awardyear");
			award[k]={"award":awardObj.val(), "year":yearObj.val()}
			awards=JSON.stringify(award);
			k += 1;
		});
		k = 0; memberships=""; membership=[];
		$(".membership-info .membership-cont").each(function(){
			var membershipsObj= $(this).find("input.memberships");
			membership[k]=membershipsObj.val();
			memberships=JSON.stringify(membership);
			k += 1;
		});
		k = 0; registrations=""; registration=[];
		$(".registrations-info .reg-cont").each(function(){
			var registrationObj= $(this).find("input.registrations");
			var registrationyearObj= $(this).find("input.registrationsyear");
			registration[k]={"registration":registrationObj.val(), "year":registrationyearObj.val()}
			registrations=JSON.stringify(registration);
			k += 1;
		});

						
		var form = $('#user_profile_setting_form')[0];
		var data = new FormData(form);
		data.append('services',services);
		data.append('specialties',specialties);
		data.append('educations',educations);
		data.append('experiences',experiences);
		data.append('awards',awards);
		data.append('memberships',memberships);
		data.append('registrations',registrations);
		data.append('oldfile',oldfile);
		data.append('itemid',itemid);
		data.append('gender',$("#gender").val());
		data.append('blood', $("#blood").val());

		$.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: "http://<?php echo $SERVER_IPADDRESS;?>:3000/api/user/editUserProfile",
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
	})

	function phoneNumberInput(phonenumber){ 
				$(this).on('keydown touchend', function (e) {
					e = e || window.event;
					var key = e.which || e.keyCode;
					var ctrl = e.ctrlKey || e.metaKey || key === 17; 
					// if (key != 9 && e.which != 8 && e.which != 0 && !(e.keyCode >= 96 && e.keyCode <= 105) && !(e.keyCode >= 48 && e.keyCode <= 57)) {
					// 	return false;
					// }
					var curchr = $('#userphone').val().length;
					var curval = $('#userphone').val();
					if (curchr == 1 && e.which != 8 && e.which != 0) {
						$('#userphone').val( curval  + " (");
					} else if (curchr == 6 && e.which != 8 && e.which != 0) {
						$('#userphone').val(curval + ')' + " ");
					} else if (curchr == 11 && e.which != 8 && e.which != 0) {
						$('#userphone').val(curval + "-");
					}
					$('#userphone').attr('maxlength', '16');

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

					$('#userphone').val(inputValue);
					$('#userphone').val('');
					inputValue = inputValue.substring(0, 16);
					$('#userphone').val(inputValue);
				}
			}					
</script>
						<div class="col-md-7 col-lg-8 col-xl-9" id="doctor_profile_setting_rightPanel">
							<form id="user_profile_setting_form"  method="post" enctype="multipart/form-data">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Basic Information</h4>
										<div class="row form-row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img class="userAvatarImage" id="userAvatarimage" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" id="userAvatarinput" name="uploadfile" itemid="" oldfile="" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>First Name <span class="text-danger">*</span></label>
													<input  name="firstname" id="userfirstname" type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Last Name <span class="text-danger">*</span></label>
													<input  name="lastname" id="userlastname" type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Email <span class="text-danger">*</span></label>
													<input name="email" id="useremail" type="email" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone Number</label>
													<input  name="phone" id="userphone" type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control selectpicker" id="gender">
														<option>Male</option>
														<option>Female</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Date of Birth</label>
													<input  name="birth" id="userbirth" type="text" class="form-control" placeholder="12-12-1990">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Blood Group</label>
													<select class="form-control selectpicker" id="blood">
														<option></option>
														<option>A+</option>
														<option>A-</option>
														<option>B+</option>
														<option>B-</option>
														<option>O+</option>
														<option>O-</option>
														<option>AB+</option>
														<option>AB-</option>	
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Basic Information -->
								
								<!-- About Me -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">About Me</h4>
										<div class="form-group mb-0">
											<label>Biography</label>
											<textarea  name="description" id="userabout" class="form-control" rows="5"></textarea>
										</div>
									</div>
								</div>
								<!-- /About Me -->
								
								<!-- Clinic Info -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Clinic Info</h4>
										<div class="row form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Clinic Name</label>
													<input  name="clinicname" id="clinicname" type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Clinic Address</label>
													<input  name="clinicaddress" id="clinicaddress" type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Clinic Info -->
								
								<!-- Contact Details -->
								<div class="card contact-card">
									<div class="card-body">
										<h4 class="card-title">Contact Details</h4>
										<div class="row form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address</label>
													<input  name="address" id="useraddress" type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">City</label>
													<input  name="city" id="usercity" type="text" class="form-control">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">State / Province</label>
													<input  name="state" id="userstate" type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Country</label>
													<input name="country" id="usercountry" type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Postal Code</label>
													<input  name="zipcode" id="userzipcode" type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Contact Details -->
								
								<!-- Pricing -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Pricing</h4>
										
										<div class="form-group mb-0">
											<div id="pricing_select">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="price_free" checked>
													<label class="custom-control-label" for="price_free">Free</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
													<label class="custom-control-label" for="price_custom">Custom Price (per hour)</label>
												</div>
											</div>
										</div>
										
										<div class="row custom_price_cont" id="custom_price_cont" style="display: none;">
											<div class="col-md-4">
												<input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="" placeholder="20">
												<small class="form-text text-muted">Custom price you can add</small>
											</div>
										</div>
										
									</div>
								</div>
								<!-- /Pricing -->
								
								<style>									
									#user_profile_setting_form > div.card.services-card > div > div.form-group.serviceDiv > div > span{
										height:40px;
										margin-bottom:2px;
										border-radius: 4px;
									}
									#user_profile_setting_form > div.card.services-card > div > div.form-group.serviceDiv > div > input[type=text]{
										height:40px;
									}
									#user_profile_setting_form > div.card.services-card > div > div.form-group.mb-0.specialtiesDiv > div > span{
										height:40px;
										margin-bottom:2px;
										border-radius: 4px;
									}		
									#user_profile_setting_form > div.card.services-card > div > div.form-group.mb-0.specialtiesDiv > div > input[type=text]{
										height:40px;
									}				
								</style>
								<!-- Services and Specialization -->
								<div class="card services-card">
									<div class="card-body">
										<h4 class="card-title">Services and Specialization</h4>
										<div class="form-group serviceDiv">
											<label>Services</label>
											<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" value="" id="services">
											<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
										</div> 
										<div class="form-group mb-0 specialtiesDiv">
											<label>Specialization </label>
											<input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" value="" id="specialist">
											<small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>
										</div> 
									</div>              
								</div>
								<!-- /Services and Specialization -->
							
								<!-- Education -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Education</h4>
										<div class="education-info">
											<div class="row form-row education-cont">
												<div class="col-12 col-md-10 col-lg-11">
													<div class="row form-row">
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Degree</label>
																<input  id="educationdegree0"  type="text" class="form-control educationdegree ">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>College/Institute</label>
																<input  id="educationcollege0"  type="text" class="form-control educationcollege">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Year of Completion</label>
																<input  id="educationyearofcompletion0"  type="text" class="form-control educationyearofcompletion">
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="add-more">
											<a id="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<!-- /Education -->
							
								<!-- Experience -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Experience</h4>
										<div class="experience-info">
											
										</div>
										<div class="add-more">
											<a id="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<!-- /Experience -->
								
								<!-- Awards -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Awards</h4>
										<div class="awards-info">
											
										</div>
										<div class="add-more">
											<a id="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<!-- /Awards -->
								
								<!-- Memberships -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Memberships</h4>
										<div class="membership-info">
											
										</div>
										<div class="add-more">
											<a id="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<!-- /Memberships -->
								
								<!-- Registrations -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Registrations</h4>
										<div class="registrations-info">
											
										</div>
										<div class="add-more">
											<a id="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<!-- /Registrations -->								
								<div class="submit-section submit-btn-bottom">
									<button type="button" id="saveUserProfile" class="btn btn-primary submit-btn">Save Changes</button>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<?php require_once "./common/footer.php" ?>
		   
		</div>
		<!-- /Main Wrapper -->
	  
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
		
		<!-- Dropzone JS -->
		<script src="assets/plugins/dropzone/dropzone.min.js"></script>
		
		<!-- Bootstrap Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		
		<!-- Profile Settings JS -->
		<script src="assets/js/profile-settings.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>