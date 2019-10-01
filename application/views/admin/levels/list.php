<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div id="resp_msg" class="text-success"><?php echo $this->session->flashdata('resp_msg'); ?></div>
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Contest Level List</h4>
						<a href="<?php echo base_url('admin/levels/add');?>" class="btn btn-sm btn-link">Add New</a>
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>Level Name</th>
													<th>Contest Name</th>
													<th>Created Date</th>
													<th class="w-5">Current Level</th>
													<th class="w-5">Status</th>
													<th class="w-5">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if($levels):
													foreach($levels as $row):
													 $status = $row->status == 1 ? 'Active' : 'Inactive';
													 $class = $row->status == 1 ? 'badge-success' : 'badge-danger';
													 $isChecked = $row->isEnabled == 1 ? 'checked="checked"' : '';
													 ?>
													 
												<tr>
													<td><?php echo $row->levelName;?></td>
													<td><?php echo $row->contestName;?></td>
													<td><?php echo $row->createdDate;?></td>
													
													<td><button id="btnCurrentLelvelId<?php echo $row->id;?>" class="btn btn-sm btn-primary" type="submit">
			 <label style="margin-bottom: 0px;"><input type="radio" id="isEnabled<?php echo $row->id?>" name="isEnabled<?php echo $row->contestID;?>" value="<?php echo $row->id?>" data-cid="<?php echo $row->contestID;?>" class="current-level" <?php echo $isChecked;?> > Current Level<label></button>
													</td>
													<td><span class="badge <?php echo $class;?>"><?php echo $status;?></span></td>
													<td>
														<a href="<?php echo base_url('admin/levels/edit/'.$row->id);?>" title="Edit Contest"><span class="fa fa-edit"></span></a>
														<!-- <a href="<?php echo base_url('admin/levels/delete/'.$row->id);?>" title="Remove Contest">
															<span class="fa fa-remove"></span>
														</a> -->
														<a href="javascript:void(0);" onClick="deleteLevel(<?php echo $row->id;?>)" title="Remove Contest">
															<span class="fa fa-remove"></span>
														</a>
													</td>
												</tr>
												<?php endforeach;
												else:?>
												  <tr><td  align="center" colspan="5">No record found!</td></tr>
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



<?php  $this->view('templates/admin/footer.php'); ?>

<script type="text/javascript">
$('.current-level').on('click', function() {
	var cId = $(this).attr('data-cid');
	var lId = $(this).val();
	var post_url = '<?php echo base_url();?>admin/levels/change_current_level/'+cId+'/'+lId;
	
	let reqHeader = new Headers();
	reqHeader.append('Content-Type', 'text/json');
	let initObject = {
		method: 'GET', headers: reqHeader,
	};

	fetch(post_url, initObject)
	.then(function (response) {
		return response.json();
	})
	.then(function (data) {		
		/*if(data.resp_status == 'success'){
			$.each(data.levels, function( index, row ) {
				let isChecked = row.isEnabled == 1 ? 'checked="checked"' : '';
				let html = '';
				html += '<label style="margin-bottom: 0px;">';
				html += ' <input type="radio" id="isEnabled'+row.id+'" name="isEnabled" value="'+row.id+'" data-cid="'+row.contestID+'" class="current-level" '+isChecked+'> Current Level';
				html += '</label>';
				$('#btnCurrentLelvelId'+row.id).html(html);
			});
		}*/
		$('#resp_msg').html(data.resp_msg);
		setTimeout(function(){$('#resp_msg').html('');},2000);
		
	})
	.catch(function (err) {
		console.log("Something went wrong!", err);
	});
});



function deleteLevel(id){
	//alert(id);
	var co = confirm("Are you sure want to delete");
	if (co == true) {
		$.ajax({
             url:'<?php echo base_url()?>admin/levels/delete',
             type:"post",
             data: "id="+id,
              success: function(data){
				  //alert(data)
				  //$("#loader").removeClass('imgloader');
				  
				  if(data){
					alert("Updated successfully");

				  }
				location.reload();
           }
         });
	}else{
		return false;
	}
	
			
	
}


</script>