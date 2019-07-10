<?php  include('admin_header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Users List</h4>
						<!-- <button class="btn btn-sm btn-link">view all</button> -->
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
													<th>Created Date</th>
													<th>Updated Date</th>
													<th class="w-20">Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon"></td>
													<td>Branding</td>
													<td>Pineapple Inc</td>
													<td>13 Nov 2018</td>
													<td><span class="badge badge-success">Completed</span></td>
													<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span>0</span></span></td>
													<td>Active</td>
												
												</tr>
												<tr>
													<td><img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo2.jpg" alt="icon"></td>
													<td>Website</td>
													<td>Gooole co.</td>
													<td>30 Nov 2018</td>
													<td><span class="badge badge-primary">In Process</span></td>
													<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span>3</span></span></td>
                          <td>Active</td>
												</tr>
												<tr>
													<td><img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo3.jpg" alt="icon"></td>
													<td>Collaterals</td>
													<td>Big Energy</td>
													<td>12 Nov 2018</td>
													<td><span class="badge badge-danger">Behind</span></td>
													<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span>14</span></span></td>
                          <td>Active</td>
												</tr>
												<tr>
													<td><img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo4.jpg" alt="icon"></td>
													<td>Branding, Print</td>
													<td>Novotel</td>
													<td>10 Nov 2018</td>
													<td><span class="badge badge-primary">In process</span></td>
													<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span>6</span></span></td>
                          <td>Active</td>
												</tr>
												<tr>
													<td><img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo5.jpg" alt="icon"></td>
													<td>Web Application</td>
													<td>Folkswagan</td>
													<td>12 Nov 2018</td>
													<td><span class="badge badge-danger">Behind</span></td>
													<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span>9</span></span></td>
                          <td>Active</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>		
					</div>
                </div>
                <!-- /Row -->



<?php  include('admin_footer.php'); ?>