<?php $this->view('templates/frontend/header.php'); ?>
			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Previous Contests</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								<li> <a href="#">Previous Contests</a> </li>
								
							</ol>
						</div>
					</div>
				</div>
			</section>
			
			<section class="dcommoncontainer">
				<div class="container">
					<div class="row">
						<div class="cucontest table-responsive contestlistBLog" style="padding: 20px; margin-top: 40px;">
							<table width="100%" class="table table-hover" border="0" cellspacing="0" cellpadding="0">
							  <tbody>
								<tr>
								  <th style="width: 30%"><i class="fa fa-trophy"></i><strong> Contest Name</strong></th>
								  <th style="width: 25%"><i class="fa fa-calendar"></i><strong> Start Date</strong></th>
								  <th style="width: 25%"><i class="fa fa-calendar"></i><strong> End Date</strong></th>
								  <th style="width: 20%"><strong></strong></th>
								</tr>
								<?php 
								if($upcoming_contests):
									foreach($upcoming_contests as $row):
								?>	
								<tr>
								  <td><?php echo $row->contestName;?></td>
								  <td><?php echo date('d-m-Y', strtotime($row->startDate));?></td>
								  <td><?php echo date('d-m-Y', strtotime($row->endDate));?></td>
								  <td><a class="theme_button color" href="javascript:void(0);" data-url="" >Closed</a></td>
								</tr>
								<?php endforeach;
								else :?>
								<tr>
								  <td colspan="4" align="center">No previous constest found!</td>
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