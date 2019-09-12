<?php $this->load->view('templates/admin/header.php');?>

<div class="row">
    <div class="col-xl-12">
		<?php //echo $this->session->flashdata('Judgemessage')?>
		<?php //echo $this->session->flashdata('updateMessage')?>
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Map Judge To Contest</h4>
				<!-- <span id="notification"><?php //echo $this->session->flashdata('noJudge'); ?></span> -->
				<!-- <a href="<?php echo base_url('admin/judge/add');?>" class="btn btn-sm btn-link">Add New</a> -->
		</div>
		<div class="card">
			<div class="card-body pa-0">
				<div class="table-wrap">
					<div class="table-responsive">
						<table class="table table-sm table-hover mb-0">
							<thead>
								<tr>
									<th>S No</th>
									<th>Judge First Name</th>
									<th>Judge Last Name</th>
									<th>Judge Email</th>
									<th>Contest</th>
									<th>Lavel</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								//echo "<pre>";print_r($judgeListWithContestLevel);
								$i = 1; 
								if($judgeList):
									foreach($judgeListWithContestLevel as $judge):
								?>
								<tr>
									<td>
										<!-- <img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon"> -->
										<?php echo $i;?>
									</td>
									<td>
										<?php echo $judge->firstName;?>
									</td>
									<td><?php echo $judge->lastName;?></td>
									<td><?php echo $judge->email;?></td>
									<td>
                                    <select id="contestID<?php echo $judge->id?>" name="contestID" class="form-control contestCls" data-id="<?php echo $judge->id?>">
                                        <option value="">Select Contest</option>
                                        <?php if(count($contests)) :
                                            foreach($contests as $row):?>
                                                <option value="<?php echo $row->id;?>"
										<?php if($row->id == $judge->contestId){ ?> selected <?php }?>
												><?php echo $row->contestName;?></option>
                                        <?php endforeach;
                                        endif;?>
                                    </select>
                                    
                                    </td>
									<td>
									<?php if($judge->contestId){?>
										<span id="levelselect<?php echo $judge->id?>"> <?php echo $judge->levelname?></span>
									<?php }else{?>
									
										<select id="levelDropdown<?php echo $judge->id?>" class="form-control currentLevel">
											<option>Select Level</option> 
										</select>
									<?php }?>
									</td>  
                                    <td class="w-10">
									<?php if($judge->contestId){?>
										<button type="button" id="edit<?php echo $judge->id?>" onClick="editJudgefuntion(<?php echo $judge->id;?>,<?php echo $judge->contestId;?>,<?php echo $judge->levelId;?>,'<?php echo $judge->firstName;?>','<?php echo $judge->lastName;?>','<?php echo $judge->email;?>')" data-toggle="modal" data-target="#editModal" class="btn btn-outline-primary" style="min-width:120px;">Edit Judge</button>
										<?php }else{?> 
											<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary"  onClick="managePopup(<?php echo $judge->id;?>)">Assign Judge</button>
										<?php }?>                     
									</td>
								</tr>
								<?php 
								$i++;
								endforeach;
								else:?>
								<tr><td  align="center" colspan="7">No record found!</td></tr>

							<?php endif;?>
												
							</tbody>
						</table><input type="hidden" id="allvalue" />
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
					Are you sure you want to assign<input type="hidden" id="uid">
					<span id="uname"></span>
			</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="assignJudge();">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- end Modal -->


<!-- edti contest and levels Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h5 class="modal-title" id="editModal">Assign Judge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<div class="row" style="text-transform:capitalize;">
				<div class="col-sm-12">Name : <span id="judgeFullName"></span></div>
			</div>
			<br/>

			<div class="row">
				<div class="col-sm-12">Email : <span id="judgeEmail"></span></div>
			</div>
			<br/>
			<div class="row">
				<div class="col-sm-12">
					<span id="contestpopup">
						<select id="selectContestpopup" name="selectContestpopup" class="form-control selectContestpopupCls">
							<option value="">Select Contest</option>
							<?php 
								if(count($contests)) :
									foreach($contests as $row):
							?>
								<option value="<?php echo $row->id;?>"><?php echo $row->contestName;?></option>
							<?php 
								endforeach;
								endif;
							?>
						</select> 
					</span>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-sm-12">
					<select id="levelpopup" class="form-control levelpopupCls">
						<option>Select Level</option> 
					</select> 
				</div>
			</div>		
			<input type="hidden" id="oldJudgeIDContestIDlevelID">
			<input type="hidden" id="newContestID">
			<input type="hidden" id="newlevelID">
			
				
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateJudge();">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- end edti contest and levels Modal -->


<?php $this->load->view('templates/admin/footer.php');?>

<script>
$('.contestCls').change(function() {    
    var item=$(this);
    var contestID = item.val();
	//("contestID===> "+contestID);
    var judgeID = item.attr("data-id");
	//alert("judgeID===> "+judgeID);
    $.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/getLevels",
		data: "id="+contestID,
		cache : false,
		success : function(data){
            console.log(data);
            $("#levelDropdown"+judgeID).html(data);          
            //$(".currentLevel").html(data);          
           
		}
    });
    
});

$('.currentLevel').change(function() {    
    var item=$(this);
    var levelId  = item.val();
	//alert("level change line ===> "+levelId);
    
});


function managePopup(judgeId){    
    let selectedContestId 	= $("#contestID"+judgeId).val();	
    let selectedLevelId 	= $("#levelDropdown"+judgeId).val();	
	//alert("managePopup judgeId "+judgeId);
	//alert("managePopup selectedContestId "+selectedContestId);
	//alert("managePopup selectedLevelId "+selectedLevelId);
	$("#allvalue").val(judgeId+'-'+selectedContestId+'-'+selectedLevelId);
   
}



function assignJudge(){
var allIds = $("#allvalue").val();
//alert(allIds);
$.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/assignJudge",
		data: "ids="+allIds,
		cache : false,
		success : function(data){
			
			//alert(data);
			location.reload();
            //console.log(data);
            //$("#levelDropdown"+judgeID).html(data);          
            //$(".currentLevel").html(data);          
           
		}
    });
}

function editJudgefuntion(judgeID,contestID,levelID,fname,lname,email){
//alert(judgeID);
//alert(contestID);
//alert(levelID);
var allIDs = judgeID+"_"+ contestID + "_" +levelID;
judgeFullName = fname + " "+ lname;
$("#oldJudgeIDContestIDlevelID").val(allIDs);
$("#judgeFullName").text(judgeFullName);
$("#judgeEmail").text(email);

}


$('.selectContestpopupCls').change(function() {    
    var item=$(this);
    var newContestID = item.val();
	$("#newContestID").val(newContestID);
	//alert("newContestID==> "+newContestID);
	//alert($("#oldJudgeIDContestIDlevelID").val());
	//("contestID===> "+contestID);
    // var judgeID = item.attr("data-id");
	// //alert("judgeID===> "+judgeID);
	$("#levelpopup").html();
    $.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/getLevels",
		data: "id="+newContestID,
		cache : false,
		success : function(data){
            console.log(data);
            $("#levelpopup").html(data);          
            //$(".currentLevel").html(data);          
           
		}
    });
    
});

$('.levelpopupCls').change(function() {    
    var item=$(this);
    var newlevelID = item.val();
	$("#newlevelID").val(newlevelID);
	//alert("newlevelID==> "+newlevelID);
	
    
});


function updateJudge(){
	var oldJudgeIDContestIDlevelID = $("#oldJudgeIDContestIDlevelID").val();
	//alert("oldJudgeIDContestIDlevelID===> "+oldJudgeIDContestIDlevelID);

	var newContestID = $("#newContestID").val();
	//alert("newContestID==> "+newContestID);

	var newlevelID = $("#newlevelID").val();
	//alert("newlevelID==> "+newlevelID);

$.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/updateJudge",
		data: "oldJudgeIDContestIDlevelID="+oldJudgeIDContestIDlevelID+"&newContestID="+newContestID+"&newlevelID="+newlevelID,
		cache : false,
		success : function(data){			
			//alert(data);
			location.reload();
            //console.log(data);
            //$("#levelDropdown"+judgeID).html(data);          
            //$(".currentLevel").html(data);          
		}
    });
}



</script>