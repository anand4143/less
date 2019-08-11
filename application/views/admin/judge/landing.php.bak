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
											echo "<li>login Judge===> ".$judgeID = $session['id'];
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
												 Judgement in progress
													 <?php }else if($user['assginJudge'] && ($user['assginJudge'] == $judgeID)){?>
												  <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalForms" onClick="parameterPopup(<?php echo $user['userID']?>,<?php echo $user['contestID']?>,<?php echo $user['levelID']?>,<?php echo $user['smuleID']?>,<?php echo $judgeID ?>);">
												  <i class='fa fa-balance-scale' style='font-size:30px;color:red'></i></a>
												  
												  <?php }else{?>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" onClick="openPopup(<?php echo $user['userID']?>,<?php echo $user['contestID']?>,<?php echo $user['levelID']?>,<?php echo $user['smuleID']?>,<?php echo $judgeID ?>);">
												  <i class='fa fa-balance-scale' style='font-size:30px;color:red'></i></a> 
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
					<span id="uname"></span>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<h5 class="modal-title">Judge's Parameter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
        			<label for="param1">Parameter 1</label>
                    <input type="text" class="form-control" id="param1" placeholder="param1">
                </div>
                <div class="form-group">
        			<label for="param2">Parameter 2</label>
                    <input type="text" class="form-control" id="param2" placeholder="param2">
                </div>
            	<button type="button" class="btn btn-primary" onclick="saveJudgeParameters();">Save Result</button>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- end Modal -->

<?php  $this->view('templates/admin/judge/footer.php'); ?>


<script>
function parameterPopup(){

}
function openPopup(userID,contestID,levelID,smuleID,judgeID){
	var allIDs = userID+"-"+contestID+"-"+levelID+"-"+smuleID+"-"+judgeID;
	//alert("==> "+allIDs);
	$("#userInfo").val(allIDs);
	//$("#uname").html(fname);
}
function pickThisSongForJudge(){
	var userInfo = $('#userInfo').val();
	 var splitData = userInfo.split('-');
	//  alert("userID"+splitData[0]);
	//  alert("contestID"+splitData[1]);
	//  alert("levelID"+splitData[2]);
	//  alert("smuleID"+splitData[3]);
	//  alert("current judgeID"+splitData[4]);
	$.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/SongForJudge",
		data: "ids="+userInfo,
		cache : false,
		success : function(res){
			alert("last insert id===> "+res);
			$('#exampleModal').modal('hide');
			$('#exampleModal3').modal('show');
			//var an = res.search('-not allow');
			// if( res == "not allow"){				
			// 	$('#exampleModal').modal('hide');
			// 	$('#exampleModal2').modal('show');
				
			// }else{
			// 		$('#exampleModal3').modal('show');
			// }
			//location.reload();
		}
	});

	
}


function saveJudgeParameters(){
		var param1 = $("#param1").val();
		var param2 = $("#param2").val();
		alert(param1);
		alert(param2);
	}
</script>