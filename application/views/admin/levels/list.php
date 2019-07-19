<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
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
													<th class="w-5">Status</th>
													<th class="w-5">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if($levels):
													foreach($levels as $row):
													 $status = $row->status == 1 ? 'Active' : 'Inactive';
													 $class = $row->status == 1 ? 'badge-success' : 'badge-danger';?>
												<tr>
													<td><?php echo $row->levelName;?></td>
													<td><?php echo $row->contestName;?></td>
													<td><?php echo $row->createdDate;?></td>
													<td><span class="badge <?php echo $class;?>"><?php echo $status;?></span></td>
													<td>
														<a href="<?php echo base_url('admin/levels/edit/'.$row->id);?>" title="Edit Contest"><span class="fa fa-edit"></span></a>
														<a href="<?php echo base_url('admin/levels/delete/'.$row->id);?>" title="Remove Contest"><span class="fa fa-remove"></span></a>
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