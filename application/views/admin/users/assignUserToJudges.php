<?php $this->view('templates/admin/header.php'); ?>

 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Assign Users To Judges</h4>
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
													<th class="w-10">S.No</th>
													<th class="w-10">First Name</th>
													<th class="w-10">Last Name</th>
													<th class="w-10">Email</th>
													<th class="w-10">Contests Name</th>
													<th class="w-10">Levels name</th>
													<th class="w-10">Assigned Judge</th>
													<th class="w-10">Assign</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
                                            //echo "<pre>";print_r($userListWithContestLevel);
											foreach($userListWithContestLevel as $user){
											?>
												<tr>
                                                <td class="w-10">
													<img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon"></td>
													<td class="w-5"><?php echo $user->firstName;?></td>
													<td class="w-5"><?php echo $user->lastName;?></td>
													<td class="w-10"><?php echo $user->email;?></td>
													<td class="w-20"><?php echo $user->contestName?></td>
                                                    <td class="w-20"><?php echo $user->levelname?></td>
                                                    <td class="w-25">
                                                       <?php
                                                            if($user->judgeid ==0){
                                                       ?>
                                                        <select class="form-control custom-select  mt-15" id="judgeDropdown">
                                                            <option selected value="0">Select Judge</option>
                                                            <?php foreach($judgeList as $judge): ?>
                                                            <option value="<?php echo $judge->id;?>"><?php echo $judge->firstName;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                            <?php }else{ echo $user->judgeName;}?>
                                                      
                                                </td>

                                                    <td class="w-10">
                                                    <?php
                                                            if($user->judgeid ==0){
                                                       ?>
                                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary" onClick="managePopup(<?php echo $user->id;?>,<?php echo $user->contestId;?>,<?php echo $user->levelId;?>)" >Assign Judge</button>
                                                            <?php } ?>
													</td>
												</tr>
											<?php } ?>
												
											</tbody>
                                        </table>
                                        <input type="hidden" id="allvalue" />
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
            	<h5 class="modal-title" id="exampleModalLabel">Assign Judge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p><i class="zmdi zmdi-alert-circle-o"></i>
					<span id="judgeMsg"></span>
			</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                
                <button type="button" id="assignJudgeBtn" class="btn btn-primary" onclick="assginUserToJudge();">Assign</button>
            </div>
        </div>
    </div>
</div>

<!-- end Modal -->


<?php  $this->view('templates/admin/footer.php'); ?>


<script type="text/javascript">

function managePopup(userId,contestId,levelId){
    let msg = '';
    let judgeId = $("#judgeDropdown").val();
    $("#allvalue").val(judgeId+'-'+userId+'-'+contestId+'-'+levelId);
    if(judgeId== '0'){
        msg = "Please select any Judge to assign user"
        $("#assignJudgeBtn").css('display','none');
    }else{
        msg = "Are you sure you want to assign this Judge"
        $("#assignJudgeBtn").css('display','block');
    }
    $("#judgeMsg").html(msg)
}

function assginUserToJudge(){
   //alert("allvalue"+$("#allvalue").val());
   let userData = $("#allvalue").val();
//    alert("userId"+userId);
//    alert("contestId"+contestId);
//    alert("levelId"+levelId);
// $('#exampleModal').modal('show');
//    if(judgeId == '0'){
//        $('#exampleModal').modal('show');
//     }
   $.ajax({
       type: "GET",
       url : '<?php echo base_url()?>admin/user/assignJudge',
       data : "userData="+userData,
       cache: false,
       success : function (data){
        //alert(data);
        if(data){
            //alert(data);
            //msg = "Successfully assign Judge" + data['firstName']+' '+data['lastName']+ to user"
            msg = "Successfully assign Judge to user"
            $("#assignJudgeBtn").css('display','none');
            $("#judgeMsg").html(msg);
            $('#exampleModal').modal('show');
            location.reload();
        }
       }
   });
}

$('.judgeDropdown').change(function() {    
    var item=$(this);
    //alert(item.attr("data-id"));
    //alert(item.val());
    var userdata = item.attr("data-id");
    var judgeID = item.val();
    alert('userdata'+userdata);
    alert('judgeID'+judgeID);
    if(judgeID == 0){
        $('#exampleModal').modal('show');
    }
    /*$.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/user/getLevels",
		data: "id="+contestID,
		cache : false,
		success : function(data){
            console.log(data);
            $("#levelDropdown"+userid).html(data);

            // var result = JSON.parse(data);
            //  console.log("result arr===> ",result);
            //  //console.log(result[0]);
            //  var output = '';
            //  if(result == false){
            //     $("#levelDropdown").append(false);
            //     console.log("hiii");
            //  }else{
            //     for(i=0; i < result.length; i++){
            //         console.log("id==>"+i,result[i].id);
            //         output = '<option value="'+result[i].id+'">'+result[i].levelName+'</option>';
            //         $("#levelDropdown").append(output);
            //         //output += result[i].contestName;
            //         // output += "</option>";
            //     }
            //     //console.log("====> ",output);
               
            //     output = '';
            //  }
           
		}
    });*/
    
});

//function getLevels(contestData){
   // console.log('helll',contestData);

    

</script>