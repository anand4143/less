<?php $this->view('templates/frontend/header.php'); ?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Contest Rank</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('userranking/contestList');?>">Ranking</a> </li>
								<li> <a href="<?php echo base_url('userranking/contestList');?>">Contests</a> </li>
								
							</ol>
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
									<tr>
									  <th><strong>S No</strong></th>
									  <th><strong>Contest Name</strong></th>
									  <th><strong>Start Date</strong></th>
									  <th><strong>End Date</strong></th>
									  <th><strong>Created Date</strong></th>
									  <th><strong>Rank</strong></th>
									</tr>
									<?php 
												   // print_r($contests);
												   $i = 1;
                                                if($contests):
													foreach($contests as $row):
													 $status = $row->status == 1 ? 'Active' : 'Inactive';
													 $class = $row->status == 1 ? 'badge-success' : 'badge-danger';?>

									<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $row->contestName;?></td>
									<td><?php echo date('d-m-Y', strtotime($row->startDate));?></td>
									<td><?php echo date('d-m-Y', strtotime($row->endDate));?></td>
									<td><?php echo $row->createdDate;?></td>
									<!-- <td><span class="badge <?php //echo $class;?>"><?php echo $status;?></span></td> -->
									<td><a href="<?php echo base_url('userranking/levelList');?>/?id=<?php echo $row->id?>" >Click here</a></td>
									</tr>
									<?php 
										$i++;
										endforeach;
										else :
									?>
								<tr>
								  <td colspan="4">Data not found!</td>
								</tr>
								<?php
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


 <!-- 
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
                                                //if($contests):
													//foreach($contests as $row):
													 //$status = $row->status == 1 ? 'Active' : 'Inactive';
													// $class = $row->status == 1 ? 'badge-success' : 'badge-danger';?>
												<tr data-href="levelList/?id=<?php echo $row->id?>" style="cursor:pointer;">
													<td><?php //echo $row->contestName;?></td>
													<td><?php //echo date('d-m-Y', strtotime($row->startDate));?></td>
													<td><?php //echo date('d-m-Y', strtotime($row->endDate));?></td>
													<td><?php //echo $row->createdDate;?></td>
													<td><span class="badge <?php //echo $class;?>"><?php //echo $status;?></span></td>
													
												</tr>
												<?php //endforeach;
												//endif;?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>		
					</div>
                </div>
                 -->



<?php  $this->view('templates/frontend/footer.php'); ?>


<script>
jQuery(document).ready(function($) {
    $('*[data-href]').on('click', function() {
        window.location = $(this).data("href");
    });
});
</script>



