<?php $this->view('templates/admin/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4><?php echo $levelList[0]->contestName; ?> Level List</h4>
					</div>
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>Level Name</th>
													<th class="w-5">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php 
                                                   // print_r($contests);
                                                if($levelList):
													foreach($levelList as $row):                                                    
                                                ?>
												<tr>
													<td><?php echo $row->levelName;?></td>
													<td><a href="/userRanking">View Ranking</a></td>
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
// jQuery(document).ready(function($) {
//     $('*[data-href]').on('click', function() {
//         window.location = $(this).data("href");
//     });
// });
</script>



