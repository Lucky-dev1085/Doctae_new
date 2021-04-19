<?php require_once "./common/doctor-profile_side.php"; ?>
						<script>
								$(document).ready(function(){
									var user = new XMLHttpRequest();
									var url = "http://localhost:3000/api/schedules/getSchedules";
									user.open("POST", url, true);
									user.setRequestHeader("Content-Type", "application/json");
									user.onreadystatechange = function () {
										if (user.readyState === 4 && user.status === 200) {
											var json = JSON.parse(user.responseText);
											if(json.status == "success"){

												sundaySchedule = json.items[0].sunday;
												if(sundaySchedule.length>0){
													document.querySelector("#slot_sunday h4").insertAdjacentHTML('beforeend',`<a class="edit-link edit_time_slot_btn" days="sunday" data-toggle="modal" href="#" >
													<i class="fa fa-edit mr-1"></i> Edit Slot
													</a>`);													
													sundaySchedule = JSON.parse(json.items[0].sunday);
													sundayLength = sundaySchedule.length
													slotStr = `<div class="doc-times">`;
													for (i=0;i< sundayLength; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += sundaySchedule[i]["start"] + " - " + sundaySchedule[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#slot_sunday h4").insertAdjacentHTML('afterend',slotStr);
												}else{ 
													document.querySelector("#slot_sunday h4").insertAdjacentHTML('beforeend',`<a class="edit-link add_time_slot_btn" days="sunday" data-toggle="modal" href="#" >
														<i class="fa fa-plus-circle"></i> Add Slot
													</a>`);													
													document.querySelector("#slot_sunday h4").insertAdjacentHTML('afterend',`<p class="text-muted mb-0">Not Available</p>`);
												}

												mondaySchedule = json.items[0].monday;
												if(mondaySchedule.length>0){
													document.querySelector("#slot_monday h4").insertAdjacentHTML('beforeend',`<a class="edit-link edit_time_slot_btn" days="monday" data-toggle="modal" href="#" >
													<i class="fa fa-edit mr-1"></i> Edit Slot
													</a>`);													
													mondaySchedule = JSON.parse(json.items[0].monday);
													mondayLength = mondaySchedule.length
													slotStr = `<div class="doc-times">`;
													for (i=0;i< mondayLength; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += mondaySchedule[i]["start"] + " - " + mondaySchedule[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#slot_monday h4").insertAdjacentHTML('afterend',slotStr);
												}else{ 
													document.querySelector("#slot_monday h4").insertAdjacentHTML('beforeend',`<a class="edit-link add_time_slot_btn" days="monday" data-toggle="modal" href="#" >
														<i class="fa fa-plus-circle"></i> Add Slot
													</a>`);
													document.querySelector("#slot_monday h4").insertAdjacentHTML('afterend',`<p class="text-muted mb-0">Not Available</p>`);
												}
												
												tuesdaySchedule = json.items[0].tuesday;
												if(tuesdaySchedule.length>0){
													tuesdaySchedule = JSON.parse(json.items[0].tuesday);
													tuesdayLength = tuesdaySchedule.length
													slotStr = `<div class="doc-times">`;
													for (i=0;i< tuesdayLength; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += tuesdaySchedule[i]["start"] + " - " + tuesdaySchedule[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#slot_tuesday h4").insertAdjacentHTML('afterend',slotStr);
													document.querySelector("#slot_tuesday h4").insertAdjacentHTML('beforeend',`<a class="edit-link edit_time_slot_btn" days="tuesday" data-toggle="modal" href="#" >
														<i class="fa fa-edit mr-1"></i> Edit Slot
													</a>`);													
												}else{ 
													document.querySelector("#slot_tuesday h4").insertAdjacentHTML('beforeend',`<a class="edit-link add_time_slot_btn" days="tuesday" data-toggle="modal" href="#" >
														<i class="fa fa-plus-circle"></i> Add Slot
													</a>`);
													document.querySelector("#slot_tuesday h4").insertAdjacentHTML('afterend',`<p class="text-muted mb-0">Not Available</p>`);
												}

												wednesdaySchedule = json.items[0].wednesday;												
												if(wednesdaySchedule.length>0){
													wednesdaySchedule = JSON.parse(wednesdaySchedule);
													document.querySelector("#slot_wednesday h4").insertAdjacentHTML('beforeend',`<a class="edit-link edit_time_slot_btn" days="wednesday" data-toggle="modal" href="#" >
														<i class="fa fa-edit mr-1"></i> Edit Slot
													</a>`);													
													wednesdayLength = wednesdaySchedule.length
													slotStr = `<div class="doc-times">`;
													for (i=0;i< wednesdayLength; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += wednesdaySchedule[i]["start"] + " - " + wednesdaySchedule[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#slot_wednesday h4").insertAdjacentHTML('afterend',slotStr);
												}else{ 
													document.querySelector("#slot_wednesday h4").insertAdjacentHTML('beforeend',`<a class="edit-link add_time_slot_btn" days="wednesday" data-toggle="modal" href="#" >
														<i class="fa fa-plus-circle"></i> Add Slot
													</a>`);													
													document.querySelector("#slot_wednesday h4").insertAdjacentHTML('afterend',`<p class="text-muted mb-0">Not Available</p>`);
												}

												thursdaySchedule = json.items[0].thursday;
												if(thursdaySchedule.length>0){
													thursdaySchedule = JSON.parse(json.items[0].thursday);
													thursdayLength = thursdaySchedule.length
													slotStr = `<div class="doc-times">`;
													for (i=0;i< thursdayLength; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += thursdaySchedule[i]["start"] + " - " + thursdaySchedule[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#slot_thursday h4").insertAdjacentHTML('afterend',slotStr);
													document.querySelector("#slot_thursday h4").insertAdjacentHTML('beforeend',`<a class="edit-link edit_time_slot_btn" days="thursday" data-toggle="modal" href="#" >
														<i class="fa fa-edit mr-1"></i> Edit Slot
													</a>`);													
												}else{ 
													document.querySelector("#slot_thursday h4").insertAdjacentHTML('beforeend',`<a class="edit-link add_time_slot_btn" days="thursday" data-toggle="modal" href="#" >
														<i class="fa fa-plus-circle"></i> Add Slot
													</a>`);													
													document.querySelector("#slot_thursday h4").insertAdjacentHTML('afterend',`<p class="text-muted mb-0">Not Available</p>`);
												}

												fridaySchedule = json.items[0].friday;
												if(fridaySchedule.length>0){
													fridaySchedule = JSON.parse(json.items[0].friday);
													fridayLength = fridaySchedule.length
													slotStr = `<div class="doc-times">`;
													for (i=0;i< fridayLength; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += fridaySchedule[i]["start"] + " - " + fridaySchedule[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#slot_friday h4").insertAdjacentHTML('afterend',slotStr);
													document.querySelector("#slot_friday h4").insertAdjacentHTML('beforeend',`<a class="edit-link edit_time_slot_btn" days="friday" data-toggle="modal" href="#" >
														<i class="fa fa-edit mr-1"></i> Edit Slot
													</a>`);													
												}else{ 
													document.querySelector("#slot_friday h4").insertAdjacentHTML('beforeend',`<a class="edit-link add_time_slot_btn" days="friday" data-toggle="modal" href="#" >
														<i class="fa fa-plus-circle"></i> Add Slot
													</a>`);													
													document.querySelector("#slot_friday h4").insertAdjacentHTML('afterend',`<p class="text-muted mb-0">Not Available</p>`);
												}
												
												saturdaySchedule = json.items[0].saturday;
												if(saturdaySchedule.length>0){
													saturdaySchedule = JSON.parse(json.items[0].saturday);
													saturdayLength = saturdaySchedule.length
													slotStr = `<div class="doc-times">`;
													for (i=0;i< saturdayLength; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += saturdaySchedule[i]["start"] + " - " + saturdaySchedule[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#slot_saturday h4").insertAdjacentHTML('afterend',slotStr);
													document.querySelector("#slot_saturday h4").insertAdjacentHTML('beforeend',`<a class="edit-link edit_time_slot_btn" days="saturday" data-toggle="modal" href="#" >
														<i class="fa fa-edit mr-1"></i> Edit Slot
													</a>`);													
												}else{ 
													document.querySelector("#slot_saturday h4").insertAdjacentHTML('beforeend',`<a class="edit-link add_time_slot_btn" days="saturday" data-toggle="modal" href="#" >
														<i class="fa fa-plus-circle"></i> Add Slot
													</a>`);													
													document.querySelector("#slot_saturday h4").insertAdjacentHTML('afterend',`<p class="text-muted mb-0">Not Available</p>`);
												}
											}
										}
									};
									var data = JSON.stringify({"email": userEmail});
									user.send(data);
								});
								$(document).on("click", ".add_time_slot_btn", function(){
									var dayOfweek = $(this).attr("days")
									$("#time_slot").modal("show");
									$(".modal-title").html("Add Time Slots")
									timeslotval = $("select#timeSlot").val();
									modalContentString = `<div class="row form-row hours-cont">
										<div class="col-12 col-md-10">
											<div class="row form-row itemrow">
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label>Start Time</label>
														<select class="form-control startTimeSelect">
															<option>-</option>
															`;
															for (i = 7; i <= 22 ; i++){
																for(j=0; j< 1 / parseFloat(timeslotval); j++){
																	modalContentString += "<option>"+ i +" : ";
																	
																	if(parseInt(60*parseFloat(timeslotval)*j)==0){
																		modalContentString += "00";
																	}else{
																		modalContentString += parseInt(60*parseFloat(timeslotval)*j);
																	}
																	modalContentString += "</option>";
																}
															}
										modalContentString += `</select>
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label>End Time</label>
														<select class="form-control endTimeSelect">
															<option>-</option>
															`;
															for (i = 7; i <= 22 ; i++){
																for(j=0; j< 1 / parseFloat(timeslotval); j++){
																	modalContentString += "<option>"+ i +" : ";																	
																	if(parseInt(60*parseFloat(timeslotval)*j)==0){
																		modalContentString += "00";
																	}else{
																		modalContentString += parseInt(60*parseFloat(timeslotval)*j);
																	}
																	modalContentString += "</option>";
																}
															}
										modalContentString += `</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
										</div>`

									$(".hours-info").html(modalContentString);
									$(".hours-info").attr("id","addhoursinfoModal")
									$("#savebtn").attr("days", dayOfweek);
									$("#savebtn").html("S a v e");
								});

								$(document).on("click", ".edit_time_slot_btn", function(){
									var dayOfweek = $(this).attr("days")
									$("#time_slot").modal("show");
									$(".modal-title").html("Edit Time Slots")
									timeslotval = $("select#timeSlot").val();
									var user = new XMLHttpRequest();
									var url = "http://localhost:3000/api/schedules/getSchedules";
									user.open("POST", url, true);
									user.setRequestHeader("Content-Type", "application/json");
									user.onreadystatechange = function () {
										if (user.readyState === 4 && user.status === 200) {
											var json = JSON.parse(user.responseText);
											if(json.status == "success"){
												console.log(json.items[0])
											}
										}
									};
									var data = JSON.stringify({"email": userEmail});
									user.send(data);
									///////////////////////////////////////////////////////////////////////////////////////////////

										modalContentString = `<div class="row form-row hours-cont">
										<div class="col-12 col-md-10">
											<div class="row form-row itemrow">
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label>Start Time</label>
														<select class="form-control startTimeSelect">
															<option>-</option>
															`;
															for (i = 7; i <= 22 ; i++){
																for(j=0; j< 1 / parseFloat(timeslotval); j++){
																	modalContentString += "<option>"+ i +" : ";																	
																	if(parseInt(60*parseFloat(timeslotval)*j)==0){
																		modalContentString += "00";
																	}else{
																		modalContentString += parseInt(60*parseFloat(timeslotval)*j);
																	}
																	modalContentString += "</option>";
																}
															}
											modalContentString += `</select>
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label>End Time</label>
														<select class="form-control endTimeSelect">
															<option>-</option>
															`;
															for (i = 7; i <= 22 ; i++){
																for(j=0; j< 1 / parseFloat(timeslotval); j++){
																	modalContentString += "<option>"+ i +" : ";																	
																	if(parseInt(60*parseFloat(timeslotval)*j)==0){
																		modalContentString += "00";
																	}else{
																		modalContentString += parseInt(60*parseFloat(timeslotval)*j);
																	}
																	modalContentString += "</option>";
																}
															}
											modalContentString += `</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
										</div>`
												
									//////////////////////////////////////////////////////////////////////////////////
									$(".hours-info").html(modalContentString);
									$(".hours-info").attr("id","addhoursinfoModal")
									$("#savebtn").attr("days", dayOfweek);
									$("#savebtn").html("S a v e");
								});


								$(document).on("click",".add-hourss", function(){
									timeslotval = $("select#timeSlot").val();
									addnewhourinfoString = `<div class="row form-row hours-cont">
										<div class="col-12 col-md-10">
											<div class="row form-row itemrow">
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label>Start Time</label>
														<select class="form-control startTimeSelect">
															<option>-</option>
															`;
															for (i = 7; i <= 22 ; i++){
																for(j=0; j< 1 / parseFloat(timeslotval); j++){
																	addnewhourinfoString += "<option>"+ i +" : ";
																	
																	if(parseInt(60*parseFloat(timeslotval)*j)==0){
																		addnewhourinfoString += "00";
																	}else{
																		addnewhourinfoString += parseInt(60*parseFloat(timeslotval)*j);
																	}
																	addnewhourinfoString += "</option>";
																}
															}
															addnewhourinfoString += `
														</select>
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="form-group">
														<label>End Time</label>
														<select class="form-control endTimeSelect">
															<option>-</option>`;
															for (i = 7; i <= 22 ; i++){
																for(j=0; j< 1 / parseFloat(timeslotval); j++){
																	addnewhourinfoString += "<option>"+ i +" : ";
																	
																	if(parseInt(60*parseFloat(timeslotval)*j)==0){
																		addnewhourinfoString += "00";
																	}else{
																		addnewhourinfoString += parseInt(60*parseFloat(timeslotval)*j);
																	}
																	addnewhourinfoString += "</option>";
																}
															}
															addnewhourinfoString += `</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
										</div>`;
										document.querySelector('.hours-info').insertAdjacentHTML('beforeend',addnewhourinfoString);
								})
								$(document).on("click", "#savebtn", function(){
									if (($("select.startTimeSelect").val() !="-") && ($("select.endTimeSelect").val()!="-") && ($(".hours-info").html().length>20)){										
										k = 0; hourinfoArray=[];
										$("#addhoursinfoModal .itemrow").each(function(){
											var startTimeSelectObj= $(this).find("select.startTimeSelect");
											var endTimeSelectObj= $(this).find("select.endTimeSelect");
											hourinfoArray[k]={"start":startTimeSelectObj.val(), "end":endTimeSelectObj.val()}
											hourinfo=JSON.stringify(hourinfoArray);
											k+=1
										});
										dayoflistweek = $(this).attr("days")
										days = $("#savebtn").attr("days");
										
										aaa = $("#slot_"+days);
										aaa.find("h4")

										var user = new XMLHttpRequest();
										var url = "http://localhost:3000/api/schedules/addSchedules";
										user.open("POST", url, true);
										user.setRequestHeader("Content-Type", "application/json");
										user.onreadystatechange = function () {
											if (user.readyState === 4 && user.status === 200) {
												var json = JSON.parse(user.responseText);
												if(json.status == "success"){
													$("#time_slot").modal("hide");
													$("#alert-success").attr("class","alert alert-success alert-dismissible fade show");
													$("#alert_content").html(json.msg);
													$("#alert-success").show();
													
													setTimeout(function(){
														$("#alert-success").fadeOut( "slow" );
													}, 2000);

													$("#"+aaa.attr("id") + " div").remove();
													$("#"+aaa.attr("id") + " p").remove();
													slotStr = `<div class="doc-times">`;																	
													for (i=0;i<hourinfoArray.length; i++){
														slotStr += `<div class="doc-slot-list">`;
														slotStr += hourinfoArray[i]["start"] + " - " + hourinfoArray[i]["end"]
														slotStr += `</div>`;
													}
													slotStr += `</div>`;
													document.querySelector("#" + aaa.find("h4").attr("id")).insertAdjacentHTML('afterend',slotStr);
												}
											}
										};
										var data = JSON.stringify({"email": userEmail, "hourinfo":hourinfo, "days":days});
										user.send(data);					
									}else{
										$("#alert-success").attr("class","alert alert-danger alert-dismissible fade show");
										$("#alert_content").html("You have to select the start time and end time.");
										$("#alert-success").show();
										setTimeout(function(){ 
											$("#alert-success").fadeOut( "slow" );
										}, 2000);
									}
								})
						</script>
						<div class="col-md-7 col-lg-8 col-xl-9">						 
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
												<div class="row">

													<div class="col-lg-4">
														<div class="form-group">               
															<label>Timing Slot Duration</label>
															<select class="form-control" id="timeSlot">
																<option>-</option>
																<option value = "0.25">15 mins</option>
																<option value = "0.5" selected="selected">30 mins</option>
																<option value = "1">1 Hour</option>
															</select>
														</div>
													</div>

												</div>     
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
														
															<!-- Schedule Header -->
															<div class="schedule-header">
															
																<!-- Schedule Nav -->
																<div class="schedule-nav">
																	<ul class="nav nav-tabs nav-justified">
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_sunday">Sunday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link active" data-toggle="tab" href="#slot_monday">Monday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_tuesday">Tuesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_wednesday">Wednesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_thursday">Thursday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_friday">Friday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_saturday">Saturday</a>
																		</li>
																	</ul>
																</div>
																<!-- /Schedule Nav -->
																
															</div>
															<!-- /Schedule Header -->
															
															<!-- Schedule Content -->
															<div class="tab-content schedule-cont">
															
																<!-- Sunday Slot -->
																<div id="slot_sunday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between" id="hfour_sunday">
																		<span>Time Slots</span> 
																	</h4>
																</div>
																<!-- /Sunday Slot -->

																<!-- Monday Slot -->
																<div id="slot_monday" class="tab-pane show active">
																	<h4 class="card-title d-flex justify-content-between" id="hfour_monday">
																		<span>Time Slots</span> 
																	</h4>
																</div>
																<!-- /Monday Slot -->

																<!-- Tuesday Slot -->
																<div id="slot_tuesday" class="tab-pane fade" >
																	<h4 class="card-title d-flex justify-content-between" id="hfour_wednesday">
																		<span>Time Slots</span> 
																	</h4>
																</div>
																<!-- /Tuesday Slot -->

																<!-- Wednesday Slot -->
																<div id="slot_wednesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between" id="hfour_wednesday">
																		<span>Time Slots</span> 
																	</h4>
																</div>
																<!-- /Wednesday Slot -->

																<!-- Thursday Slot -->
																<div id="slot_thursday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between" id="hfour_thursday">
																		<span>Time Slots</span> 																		
																	</h4>
																</div>
																<!-- /Thursday Slot -->

																<!-- Friday Slot -->
																<div id="slot_friday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between" id="hfour_friday">
																		<span>Time Slots</span> 
																	</h4>
																</div>
																<!-- /Friday Slot -->

																<!-- Saturday Slot -->
																<div id="slot_saturday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between" id="hfour_saturday">
																		<span>Time Slots</span> 
																	</h4>
																</div>
																<!-- /Saturday Slot -->

															</div>
															<!-- /Schedule Content -->
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->

			<?php require_once "./common/footer.php" ?>		
		
		<!-- Edit Time Slot Modal -->
		<div class="modal fade custom-modal" id="time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="hours-info">
							</div>							
							<div class="add-more mb-3">
								<a href="#" class="add-hourss"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="button" class="btn btn-primary submit-btn" id="savebtn" days="">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal -->
	  
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
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>