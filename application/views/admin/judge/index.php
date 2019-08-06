<?php $this->load->view('templates/admin/header.php');?>

<div class="row">
    <div class="col-xl-12">
		<?php echo $this->session->flashdata('Judgemessage')?>
		<?php echo $this->session->flashdata('updateMessage')?>
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Judeg List</h4>
				<!-- <span id="notification"><?php //echo $this->session->flashdata('noJudge'); ?></span> -->
				<a href="<?php echo base_url('admin/judge/add');?>" class="btn btn-sm btn-link">Add New</a>
		</div>
		<div class="card">
			<div class="card-body pa-0">
				<div class="table-wrap">
					<div class="table-responsive">
						<table class="table table-sm table-hover mb-0">
							<thead>
								<tr>
									<th>Primary ID</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Register Date</th>
									<th>Status</th>
									<th >Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								//echo "<pre>";print_r($judgeList);
								if($judgeList):
									foreach($judgeList as $user):
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
									<td><?php echo date('d-m-Y', strtotime($user->createdDate));?></td>
									<td>
                                        <?php if($user->isActive){?>
                                        	<span class="badge badge-success">Active</span>
                                        <?php }else{?>
                                        	<span class="badge badge-danger">inactive</span>
                                        <?php } ?>
                                    <td>
										<a href="<?php echo base_url('admin/judge/edit/'.$user->id);?>" title="Edit Judge"><span class="fa fa-edit"></span></a>
										<!-- <a href="<?php //echo base_url('admin/judge/delete/'.$user->id);?>" id="judge-<?php //echo $user->id;?>" title="Remove Judge" click="deleteJudge(<?php //echo $user->id; ?>)"><span class="fa fa-remove"></span></a> -->
										<a href="javascript:void(0);" id="judge" title="Remove Judge"><span class="fa fa-remove" data-toggle="modal" data-target="#exampleModal" onClick="openPopup(<?php echo $user->id?>,'<?php echo $user->firstName?>');"></span></a>
									</td>
								</tr>
								<?php endforeach;
								else:?>
								<tr><td  align="center" colspan="7">No record found!</td></tr>

							<?php endif;?>
												
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
            	<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<p><i class="zmdi zmdi-alert-circle-o"></i>
					Are you sure you want to delete<input type="hidden" id="uid">
					<span id="uname"></span>
			</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="deleteJudge();">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- end Modal -->


<?php $this->load->view('templates/admin/footer.php');?>

<script>
function openPopup(userId,fname){
	$("#uid").val(userId);
	$("#uname").html(fname);
}
function deleteJudge(){
	var judgeId = $('#uid').val();
	//alert("this is user id "+$('#uid').val());
	$.ajax({
		type: "GET",
		url: "<?php echo base_url()?>admin/judge/delete",
		data: "id="+judgeId,
		cache : false,
		success : function(res){
			//alert("responce modal-open"+res);
			//$('body').removeClass('modal-open');
			$('#exampleModal').modal('hide');
			location.reload();
		}
	});
}

</script>