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
									<th>Primary ID</th>
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
								if($judgeList):
									foreach($judgeListWithContestLevel as $user):
								?>
								<tr>
									<td>
										<img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon">
									</td>
									<td>
										<?php echo $user->firstName;?>
									</td>
									<td><?php echo $user->lastName;?></td>
									<td><?php echo $user->email;?></td>
									<td>
                                    <select id="contestID" name="contestID" class="form-control contestCls" data-id="<?php echo $user->id?>">
                                        <option value="">Select Contest</option>
                                        <?php if(count($contests)) :
                                            foreach($contests as $row):?>
                                                <option value="<?php echo $row->id;?>"
										<?php if($row->id == $user->contestId){ ?> selected <?php }?>
												><?php echo $row->contestName;?></option>
                                        <?php endforeach;
                                        endif;?>
                                    </select>
                                    
                                    </td>
									<td>
									<?php if($user->contestId){?>
										<span id="levelselect<?php echo $user->id?>"> <?php echo $user->levelname?></span>
									<?php }else{?>
									
										<select id="levelDropdown<?php echo $user->id?>" class="form-control currentLevel">
											<option>Select Level</option> 
										</select>
									<?php }?>
									</td>  
                                    <td class="w-10">
									<?php if($user->contestId){?>
                                        Edit
										<?php }else{?> 
											<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary"  onClick="managePopup(<?php echo $user->id;?>)">Assign Judge</button>
										<?php }?>                     
									</td>
								</tr>
								<?php endforeach;
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


<?php $this->load->view('templates/admin/footer.php');?>

<script>
$('.contestCls').change(function() {    
    var item=$(this);
    var contestID = item.val();
	//alert("contestID"+contestID);
    var judgeID = item.attr("data-id");
	//alert("judgeID"+judgeID);
    $.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/getLevels",
		data: "id="+contestID,
		cache : false,
		success : function(data){
            console.log(data);
            //$("#levelDropdown"+judgeID).html(data);          
            $(".currentLevel").html(data);          
           
		}
    });
    
});

$('.currentLevel').change(function() {    
    var item=$(this);
    var levelId  = item.val();
	//alert(levelId);
    
});


function managePopup(judgeId){    
    let selectedContestId 	= $("#contestID").val();	
    let selectedLevelId 	= $(".currentLevel").val();	
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
			location.reload();
			//alert(data);
            //console.log(data);
            //$("#levelDropdown"+judgeID).html(data);          
            //$(".currentLevel").html(data);          
           
		}
    });
}



</script>