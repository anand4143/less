<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Contests List</h4>
						<a href="<?php echo base_url('admin/contests/add');?>" class="btn btn-sm btn-link">Add New</a>
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>Contest Name</th>
													<th>Start Date</th>
													<th>End Date</th>
													<th>Created Date</th>
													<th class="w-5">Status</th>
													<th class="w-5">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if($contests):
													foreach($contests as $row):?>
												<tr>
													<td><?php echo $row->contestName;?></td>
													<td><?php echo date('d-m-Y', strtotime($row->startDate));?></td>
													<td><?php echo date('d-m-Y', strtotime($row->endDate));?></td>
													<td><?php echo $row->createdDate;?></td>
													<td><span class="badge badge-success">Active</span></td>
													<td>
														<a href="<?php echo base_url('admin/contests/edit/'.$row->id);?>" title="Edit Contest"><span class="fa fa-edit"></span></a>
														<a href="<?php echo base_url('admin/contests/delete/'.$row->id);?>" title="Remove Contest"><span class="fa fa-remove"></span></a>
													</td>
												</tr>
												<?php endforeach;
												endif;?>
												
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