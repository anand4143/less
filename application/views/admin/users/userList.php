<?php $this->view('templates/admin/header.php'); ?>

 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Users List</h4>
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
													<th>Primary ID</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Register Date</th>
													<th>Status</th>
													<th class="w-20">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if($userList && count($userList)){
											foreach($userList as $user){
											?>
												<tr>
													<td>
													<img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon"></td>
													<td><?php echo $user->firstName;?></td>
													<td><?php echo $user->lastName;?></td>
													<td><?php echo $user->email;?></td>
													<td><?php echo $user->createdDate;?></td>
												  <td>
                                                  <?php if($user->isActive){?>
                                                    <span class="badge badge-success">Active</span>
                                                  <?php }else{?>
                                                    <span class="badge badge-danger">inactive</span>
                                                  <?php } ?>
                                                    <td>
														<a href="<?php echo base_url('admin/user/edit/'.$user->id);?>" title="Edit Contest">
															<span class="fa fa-edit"></span>
														</a>
														<!-- <a href="<?php echo base_url('admin/user/delete/'.$user->id);?>" title="Remove Contest">
															<span class="fa fa-remove"></span>
														</a> -->

														<a href="#" onClick="deleteUser(<?php echo $user->id;?>)" title="Remove Contest">
															<span class="fa fa-remove"></span>
														</a>
													</td>
												</tr>
											<?php }
											}else{?>
												<tr>
													<td colspan="7" align="center">No record found!</td>
												</tr>	
											<?php }?>
												
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


<script>
function deleteUser(id){
	//alert(id);
	var co = confirm("Are you sure want to delete");
	if (co == true) {
		$.ajax({
             url:'<?php echo base_url()?>admin/user/delete',
             type:"post",
             data: "id="+id,
              success: function(data){
				  //alert(data)
				  //$("#loader").removeClass('imgloader');
				  
				  if(data){
					alert("Dpdated successfully");

				  }
				location.reload();
           }
         });
	}else{
		return false;
	}
	
			
	
}
</script>