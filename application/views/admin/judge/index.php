<?php $this->load->view('templates/admin/header.php');?>

<div class="row">
    <div class="col-xl-12">
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
									<td><?php echo date('d-m-Y', strtotime($user->createdData));?></td>
									<td>
                                        <?php if($user->isActive){?>
                                        	<span class="badge badge-success">Active</span>
                                        <?php }else{?>
                                        	<span class="badge badge-danger">inactive</span>
                                        <?php } ?>
                                    <td>
										<a href="<?php echo base_url('admin/judge/edit/'.$user->id);?>" title="Edit Judge"><span class="fa fa-edit"></span></a>
										<a href="<?php echo base_url('admin/judge/delete/'.$user->id);?>" title="Remove Judge"><span class="fa fa-remove"></span></a>
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

<?php $this->load->view('templates/admin/footer.php');?>