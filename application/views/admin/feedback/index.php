<?php $this->view('templates/admin/header.php'); ?>

 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Feedback List</h4>
						<!-- <button class="btn btn-sm btn-link">view all</button> -->
						<!-- <span id="notification"><?php echo $this->session->flashdata('updateMessage'); ?></span> -->
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
									
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>S.No</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile No</th>
													<th>Comment</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if($feedbacks && count($feedbacks)){
												$i = 1;
											foreach($feedbacks as $feedback){
											?>
												<tr>
													<td><?php echo $i;?></td>
													<td><?php echo $feedback->fullname;?></td>
													<td><?php echo $feedback->email;?></td>
													<td><?php echo $feedback->mobileno;?></td>
													<td><?php echo $feedback->comment;?></td>
												 
                                                    
												</tr>
											<?php $i++;}
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