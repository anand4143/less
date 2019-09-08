<?php $this->view('templates/frontend/header.php'); ?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-center text-md-left">
				<h2 class="small">Contest Rank</h2>
			</div>
			<div class="col-md-6 text-center text-md-right">
			<?php echo $levelList[0]->contestName; ?> Level List
				<!-- <ol class="breadcrumb">
						<li> <a href="<?php //echo base_url('user/landing');?>">Dashboard</a> </li>
						<li> <a href="#">Current Contests</a> </li>
					</ol> -->
			</div>
		</div>
	</div>
</section>
<section class="dcommoncontainer">
				<div class="container">
					<div class="row">
						<div class="cucontest table-responsive">
							<table width="100%" class="table table-hover" border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<th><strong>Level Name</strong></th>
								<th><strong>Action</strong></th>
                                                <?php 
                                                   //echo "<pre>"; print_r($levelList);
                                                if($levelList):
													foreach($levelList as $row):                                                    
                                                ?>
												<tr>
													<td><?php echo $row->levelName;?></td>
													<td><a href="/userRanking/userLevelRanking/?cId=<?php echo $row->contestID?>&lId=<?php echo $row->id?>" >View Ranking</a></td>
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
			</section>
 <!-- Row -->
 <!-- <div class="row">
        <div class="col-xl-12">
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4><?php //echo $levelList[0]->contestName; ?> Level List</h4>
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
                                                   //echo "<pre>"; print_r($levelList);
                                                //if($levelList):
													//foreach($levelList as $row):                                                    
                                                ?>
												<tr>
													<td><?php //echo $row->levelName;?></td>
													<td><a href="/admin/userRanking/userLevelRanking/?cId=<?php //echo $row->contestID?>&lId=<?php echo $row->id?>" >View Ranking</a></td>
												</tr>
												<?php //endforeach;
												//endif;
												?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>		
					</div>
                </div> -->
                <!-- /Row -->



<?php  $this->view('templates/frontend/footer.php'); ?>


<script>
// jQuery(document).ready(function($) {
//     $('*[data-href]').on('click', function() {
//         window.location = $(this).data("href");
//     });
// });
</script>



