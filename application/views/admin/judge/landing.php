<?php $this->view('templates/admin/judge/header.php'); ?>

 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Assigned User List</h4>
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
													<th>Contest Name</th>
													<th>Level Name</th>
													<th class="w-20">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
											foreach($userList as $user){
											?>
												<tr>
													<td>
													<img class="img-fluid rounded" src="<?php echo base_url();?>assets/dist/img/logo1.jpg" alt="icon"></td>
													<td><?php echo $user->firstName;?></td>
													<td><?php echo $user->lastName;?></td>
													<td><?php echo $user->email;?></td>
													<td><?php echo $user->contestName;?></td>
													<td><?php echo $user->levelname;?></td>
												  <td> <a href="#">
												  <i class='fa fa-balance-scale' style='font-size:30px;color:red'></i></a></td>
												</tr>
											<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>		
					</div>
                </div>
                <!-- /Row -->


<?php  $this->view('templates/admin/judge/footer.php'); ?>