<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Contests List</h4>
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
												</tr>
											</thead>
											<tbody>
                                                <?php 
                                                   // print_r($contests);
                                                if($contests):
													foreach($contests as $row):
													 $status = $row->status == 1 ? 'Active' : 'Inactive';
													 $class = $row->status == 1 ? 'badge-success' : 'badge-danger';?>
												<tr data-href="levelList/?id=<?php echo $row->id?>" style="cursor:pointer;">
													<td><?php echo $row->contestName;?></td>
													<td><?php echo date('d-m-Y', strtotime($row->startDate));?></td>
													<td><?php echo date('d-m-Y', strtotime($row->endDate));?></td>
													<td><?php echo $row->createdDate;?></td>
													<td><span class="badge <?php echo $class;?>"><?php echo $status;?></span></td>
													
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


<script>
jQuery(document).ready(function($) {
    $('*[data-href]').on('click', function() {
        window.location = $(this).data("href");
    });
});
</script>



