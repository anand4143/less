<?php $this->view('templates/frontend/header.php'); ?>
			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Upcoming Contests</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								<li> <a href="#">Upcoming Contests</a> </li>
								
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
								  <th style="width: 30%"><strong>Contest Name</strong></th>
								  <th style="width: 25%"><strong>Registration Start Date</strong></th>
								  <th style="width: 25%"><strong>Registration End Date</strong></th>
								  <th style="width: 20%"><strong></strong></th>
								</tr>
								<?php 
								if($upcoming_contests):
									foreach($upcoming_contests as $row):
								?>	
								<tr>
								  <td><?php echo $row->contestName;?></td>
								  <td><?php echo date('d-m-Y', strtotime($row->regStartDate));?></td>
								  <td><?php echo date('d-m-Y', strtotime($row->regEndDate));?></td>
								  <td><a class="theme_button color" href="javascript:void(0);" data-url="" >Comming Soon...</a></td>
								</tr>
								<?php endforeach;
								else :?>
								<tr>
								  <td colspan="4">No upcoming constest found!</td>
								</tr>
								<?php
								endif;?> 
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
			
<?php  $this->view('templates/frontend/footer.php'); ?>