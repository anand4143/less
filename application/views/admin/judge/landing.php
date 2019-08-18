<?php $this->view('templates/admin/judge/header.php'); ?>

 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Assigned User List</h4>
						<!-- <button class="btn btn-sm btn-link">view all</button> -->
						<span id="notification"><?php echo $this->session->flashdata('updateMessage'); ?></span>
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
									
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>S no</th>
													<th>Contest Name</th>
													<th>Contest id</th>
													<th>Level Name</th>
													<th>Level id</th>
													<th>user id</th>
													<th>smule id</th>
													<th>assign Judge id</th>
													<th class="w-20">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$judgeID = $session['id'];
											//echo "<pre>";print_r($allUserSongListOfRunningContests);
											foreach($allUserSongListOfRunningContests as $user){
											?>
												<tr>
													<td>
													<img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon"></td>
													<td><?php echo $user['contestName'];?></td>
													<td><?php echo $user['contestID'];?></td>
													<td><?php echo $user['levelName'];?></td>
													<td><?php echo $user['levelID'];?></td>
													<td><?php echo $user['userID'];?></td>
													<td><?php echo $user['smuleID'];?></td>
													<td><?php echo $user['assginJudge'];?></td>
													<td>												
														<a href="<?php echo $user['smuleUrl'];?>" target="_blank" class="btn btn-info btn-lg">
														<i class="fa fa-music" aria-hidden="true"></i> 
														</a>													
													</td>
												  <td> 
												 <?php 
												 	if($user['assginJudge'] && ($user['assginJudge'] != $judgeID) ){
												 ?>
												 
												 <a href="javascript:void(0);" title="Allready in judging by other judge"  onClick="allreadyJudge();">
												  <i class='fa fa-balance-scale' style='font-size:30px;color:red'></i></a>

													 <?php }else if($user['assginJudge'] && ($user['assginJudge'] == $judgeID)){?>
												  <a href="javascript:void(0);" title="You are judging this song" data-toggle="modal" data-target="#exampleModalForms" onClick="parameterPopup(<?php echo $user['userID']?>,<?php echo $user['contestID']?>,<?php echo $user['levelID']?>,<?php echo $user['smuleID']?>,<?php echo $judgeID ?>);">
												  <i class='fa fa-balance-scale songID<?php echo $user['smuleID']?>' style='font-size:30px;color:orange'></i></a>
												  
												  <?php }else{?>
													<a href="javascript:void(0);" title="You can pic this song" data-toggle="modal" data-target="#exampleModal" onClick="openPopup(<?php echo $user['userID']?>,<?php echo $user['contestID']?>,<?php echo $user['levelID']?>,<?php echo $user['smuleID']?>,<?php echo $judgeID ?>);">
												  <i class='fa fa-balance-scale' style='font-size:30px;color:green'></i></a> 
												  <?php } ?>
												  </td>
												</tr>
											<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>		
					</div>
                </div>
                <!-- /Row -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p><i class="zmdi zmdi-alert-circle-o"></i>
					Are you sure you want to Judge this song<input type="hidden" id="userInfo">
					<span id="uname"></span>
			</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="pickThisSongForJudge();">yes</button>
            </div>
        </div>
    </div>
</div>

<!-- end Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p><i class="zmdi zmdi-alert-circle-o"></i>
					You can't pic this song.Judgement in progression...
					
			</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- end Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<h5 class="modal-title">Judge's Parameter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('judge/saveParameter');?>
			<input type="hidden" id="userData">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Sur</label>
							<?php echo form_input(['id'=>'sur','name'=>'sur','placeholder'=>'Sur','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Taal</label>
							<?php echo form_input(['id'=>'taal','name'=>'taal','placeholder'=>'Taal','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Emotion Feel</label>
							<?php echo form_input(['id'=>'emotionfeel','name'=>'emotionfeel','placeholder'=>'Emotion Feel','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Voice Quality Nasal</label>
							<?php echo form_input(['id'=>'voicequalitynasal','name'=>'voicequalitynasal','placeholder'=>'Voice Quality Nasal','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Soothing Level</label>
							<?php echo form_input(['id'=>'soothinglevel','name'=>'soothinglevel','placeholder'=>'Soothing Level','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Copy Or Originality</label>
							<?php echo form_input(['id'=>'copyororiginality','name'=>'copyororiginality','placeholder'=>'Copy Or Originality','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Variation</label>
							<?php echo form_input(['id'=>'variation','name'=>'variation','placeholder'=>'Variation','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Diction</label>
							<?php echo form_input(['id'=>'diction','name'=>'diction','placeholder'=>'Diction','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Murki Vibratos</label>
							<?php echo form_input(['id'=>'murkivibratos','name'=>'murkivibratos','placeholder'=>'Murki Vibratos','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Alaap</label>
							<?php echo form_input(['id'=>'alaap','name'=>'alaap','placeholder'=>'Alaap','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Sargam</label>
							<?php echo form_input(['id'=>'sargam','name'=>'sargam','placeholder'=>'Sargam','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="param1">Judge Score</label>
							<?php echo form_input(['id'=>'judgescore','name'=>'judgescore','placeholder'=>'Judge Score','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						<label for="param1">Parameter 1</label>
						<?php echo form_input(['id'=>'param1','name'=>'param1','placeholder'=>'parameter1','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						<label for="param1">Parameter 2</label>
                        <?php echo form_input(['id'=>'param2' ,'name'=>'param2','placeholder'=>'parameter2','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						<label for="param1">Parameter 3</label>
                    	<?php echo form_input(['id'=>'param3' ,'name'=>'param3','placeholder'=>'parameter3','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						<label for="param1">Parameter 4</label>
                        <?php echo form_input(['id'=>'param4' ,'name'=>'param4','placeholder'=>'parameter4','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						<label for="param2">Parameter 5</label>
                        <?php echo form_input(['id'=>'param5' ,'name'=>'param5','placeholder'=>'parameter5','class'=>'form-control','onblur'=>' checkBetweenOneToTen(this)']);?>
						</div>														
					</div>					
				</div>
				<div class="modal-footer">
					<button type="button" id="saveResultBtn" class="btn btn-primary" onclick="saveJudgeParameters();">Save Result</button>
					<button type="button" id="updateResultBtn" class="btn btn-primary" onclick="updateJudgeParameters();">Update Result</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            	
            
            </div>
        </div>
    </div>
</div>

<!-- end Modal -->

<!-- Success Modal -->
<div class="modal fade" id="exampleModalsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalsuccess" aria-hidden="true">
    <div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p><i class="zmdi zmdi-alert-circle-o"></i>
					<span id="msg"></span>
					
			</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- end Success Modal -->

<!-- 1 to 10 validation Modal -->
<div class="modal fade" id="exampleModalvalidation" tabindex="-1" role="dialog" aria-labelledby="exampleModalvalidation" aria-hidden="true">
    <div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p><i class="zmdi zmdi-alert-circle-o"></i>
					Please give me marks between 1 to 10.
					
			</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- end1 to 10 validation Modal -->

<?php  $this->view('templates/admin/judge/footer.php'); ?>


<script>
function allreadyJudge(){
alert("This song is already in judging.");
}
function openPopup(userID,contestID,levelID,smuleID,judgeID){
	var allIDs = userID+"-"+contestID+"-"+levelID+"-"+smuleID+"-"+judgeID;
	$("#userInfo").val(allIDs);
}
function pickThisSongForJudge(){
	var userInfo = $('#userInfo').val();
	 var splitData = userInfo.split('-');
	$.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/SongForJudge",
		data: "ids="+userInfo,
		cache : false,
		success : function(res){
			//alert("last insert id===> "+res);
			$('#exampleModal').modal('hide');
			//$('#exampleModal3').modal('show');			
			location.reload();
		}
	});

	
}
function parameterPopup(userID,contestID,levelID,smuleID,judgeID){
	var allIDs = userID+"-"+contestID+"-"+levelID+"-"+smuleID+"-"+judgeID;
	$("#userData").val(allIDs);

	$.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/isJudgementParamExists",
		data: "smuleID="+smuleID,
		cache : false,
		success : function(res){
			var json_obj = $.parseJSON(res);//parse JSON
			//alert(json_obj);
			 if(json_obj != null){
				 $('#saveResultBtn').css('display','none');
				 $('#updateResultBtn').css('display','block');
				$("#sur").val(json_obj[0].sur);
				$("#taal").val(json_obj[0].Taal);
				$("#emotionfeel").val(json_obj[0].Emotion_Feel);
				$("#voicequalitynasal").val(json_obj[0].Voice_Quality_Nasal);
				$("#soothinglevel").val(json_obj[0].Soothing_Level);
				$("#copyororiginality").val(json_obj[0].Copy_Or_Originality);
				$("#variation").val(json_obj[0].Variation);
				$("#diction").val(json_obj[0].Diction);
				$("#murkivibratos").val(json_obj[0].Murki_Vibratos);
				$("#alaap").val(json_obj[0].Alaap);
				$("#sargam").val(json_obj[0].Sargam);
				$("#judgescore").val(json_obj[0].Judge_Score);
				$("#param1").val(json_obj[0].parameter1);
				$("#param2").val(json_obj[0].parameter2);
				$("#param3").val(json_obj[0].parameter3);
				$("#param4").val(json_obj[0].parameter4);
				$("#param5").val(json_obj[0].parameter5);
			 }else{
				$('#updateResultBtn').css('display','none');
				 $('#saveResultBtn').css('display','block');
				$("#sur").val('');
				$("#taal").val('');
				$("#emotionfeel").val('');
				$("#voicequalitynasal").val('');
				$("#soothinglevel").val('');
				$("#copyororiginality").val('');
				$("#variation").val('');
				$("#diction").val('');
				$("#murkivibratos").val('');
				$("#alaap").val('');
				$("#sargam").val('');
				$("#judgescore").val('');
				$("#param1").val('');
				$("#param2").val('');
				$("#param3").val('');
				$("#param4").val('');
				$("#param5").val('');
			 }
				
		}
	});

}

function saveJudgeParameters(){
	var userData = $("#userData").val();
	var splitData = userData.split('-');
	 var sur 				= $("#sur").val();
	 var taal 				= $("#taal").val();
	 var emotionfeel 		= $("#emotionfeel").val();
	 var voicequalitynasal 	= $("#voicequalitynasal").val();
	 var soothinglevel 		= $("#soothinglevel").val();
	 var copyororiginality 	= $("#copyororiginality").val();
	 var variation 			= $("#variation").val();
	 var diction 			= $("#diction").val();
	 var murkivibratos 		= $("#murkivibratos").val();
	 var alaap 				= $("#alaap").val();
	 var sargam 			= $("#sargam").val();
	 var judgescore 		= $("#judgescore").val();
	 var param1 			= $("#param1").val();
	 var param2 			= $("#param2").val();
	 var param3 			= $("#param3").val();
	 var param4 			= $("#param4").val();
	 var param5 			= $("#param5").val();


	 $.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/saveJudgeParameters",
		data: "ids="+userData+"&sur="+sur+"&taal="+taal+"&emotionfeel="+emotionfeel+"&voicequalitynasal="+voicequalitynasal+"&soothinglevel="+soothinglevel+"&copyororiginality="+copyororiginality+"&variation="+variation+"&diction="+diction+"&murkivibratos="+murkivibratos+"&alaap="+alaap+"&sargam="+sargam+"&judgescore="+judgescore+"&param1="+param1+"&param2="+param2+"&param3="+param3+"&param4="+param4+"&param5="+param5,
		cache : false,
		success : function(res){
			//alert("==> "+res);
			// alert(res.indexOf("-"));

			if(res>0){
				$("#songID"+splitData[3]).css("color",'orange');
				$("#msg").text("Your data save successfully");
				$('#exampleModalForms').modal('hide');
				$('#exampleModalsuccess').modal('show');
			}
			// else if(res == 'exist'){
			// 	$("#sur").val(res["sur"]);
			// 	$("#taal").val(res["taal"]);
			// 	$("#emotionfeel").val(res["emotionfeel"]);
			// 	$("#voicequalitynasal").val(res["voicequalitynasal"]);
			// 	$("#soothinglevel").val(res["soothinglevel"]);
			// 	$("#copyororiginality").val(res["copyororiginality"]);
			// 	$("#variation").val(res["variation"]);
			// 	$("#diction").val(res["diction"]);
			// 	$("#murkivibratos").val(res["murkivibratos"]);
			// 	$("#alaap").val(res["alaap"]);
			// 	$("#sargam").val(res["sargam"]);
			// 	$("#judgescore").val(res["judgescore"]);
			// 	$("#param1").val(res["parameter1"]);
			// 	$("#param2").val(res["parameter2"]);
			// 	$("#param3").val(res["parameter3"]);
			// 	$("#param4").val(res["parameter4"]);
			// 	$("#param5").val(res["parameter5"]);
			// }
			else{
				$("#msg").text("Something went wrong.Please try later");
				$('#exampleModalsuccess').modal('show');	
			}		
			//location.reload();
		}
	});
	}

	function updateJudgeParameters(){		
		var userData = $("#userData").val();	
		var sur 				= $("#sur").val();
		var taal 				= $("#taal").val();
		var emotionfeel 		= $("#emotionfeel").val();
		var voicequalitynasal 	= $("#voicequalitynasal").val();
		var soothinglevel 		= $("#soothinglevel").val();
		var copyororiginality 	= $("#copyororiginality").val();
		var variation 			= $("#variation").val();
		var diction 			= $("#diction").val();
		var murkivibratos 		= $("#murkivibratos").val();
		var alaap 				= $("#alaap").val();
		var sargam 				= $("#sargam").val();
		var judgescore 			= $("#judgescore").val();
		var param1 				= $("#param1").val();
		var param2 				= $("#param2").val();
		var param3 				= $("#param3").val();
		var param4 				= $("#param4").val();
		var param5 				= $("#param5").val();


	$.ajax({
	   type: "GET",
	   url: "<?php echo base_url()?>admin/judge/updateJudgeParameters",
	   data: "ids="+userData+"&sur="+sur+"&taal="+taal+"&emotionfeel="+emotionfeel+"&voicequalitynasal="+voicequalitynasal+"&soothinglevel="+soothinglevel+"&copyororiginality="+copyororiginality+"&variation="+variation+"&diction="+diction+"&murkivibratos="+murkivibratos+"&alaap="+alaap+"&sargam="+sargam+"&judgescore="+judgescore+"&param1="+param1+"&param2="+param2+"&param3="+param3+"&param4="+param4+"&param5="+param5,
	   cache : false,
	   success : function(res){
		   alert("==> "+res);
		   if(res>0){
			   $("#msg").text("Your data updated successfully");
			   $('#exampleModalForms').modal('hide');
			   $('#exampleModalsuccess').modal('show');
		   }
		//    else if(res == 'exist'){
		// 	   $("#sur").val(res["sur"]);
		// 	   $("#taal").val(res["taal"]);
		// 	   $("#emotionfeel").val(res["emotionfeel"]);
		// 	   $("#voicequalitynasal").val(res["voicequalitynasal"]);
		// 	   $("#soothinglevel").val(res["soothinglevel"]);
		// 	   $("#copyororiginality").val(res["copyororiginality"]);
		// 	   $("#variation").val(res["variation"]);
		// 	   $("#diction").val(res["diction"]);
		// 	   $("#murkivibratos").val(res["murkivibratos"]);
		// 	   $("#alaap").val(res["alaap"]);
		// 	   $("#sargam").val(res["sargam"]);
		// 	   $("#judgescore").val(res["judgescore"]);
		// 	   $("#param1").val(res["parameter1"]);
		// 	   $("#param2").val(res["parameter2"]);
		// 	   $("#param3").val(res["parameter3"]);
		// 	   $("#param4").val(res["parameter4"]);
		// 	   $("#param5").val(res["parameter5"]);
		//    }
		   else{
			   $("#msg").text("Something went wrong.Please try later");
			   $('#exampleModalsuccess').modal('show');	
		   }		
		   //location.reload();
	   }
   });
	}

	function checkBetweenOneToTen(inputvalue){
		//alert(inputvalue.value);
		var x = inputvalue.value;
		if(x != ''){
		if ( x < 1 ||  x > 10) {
			//alert(x);
				$("#exampleModalvalidation").modal('show');
				
			
		} 
		}
	}
// $(document).ready(function(){
// 	$("input").keypress(function(event) {
//     if (event.which == 13) {
//         event.preventDefault();
//        FoodDispaly();
//     }
// });

// });
	

</script>