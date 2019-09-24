<?php $this->view('templates/frontend/header.php'); ?>
			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Current Contests</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								<li> <a href="#">Current Contests</a> </li>
								
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
								  <th style="width: 25%"><strong> Start Date</strong></th>
								  <th style="width: 25%"><strong> End Date</strong></th>
								  <th style="width: 20%"><strong></strong></th>
								</tr>
								<?php 
								if($contests):
									foreach($contests as $row):
								?>	
								<tr>
								  <td><?php echo $row->contestName;?></td>
								  <td><?php echo date('d-m-Y', strtotime($row->startDate));?></td>
								  <td><?php echo date('d-m-Y', strtotime($row->endDate));?></td>
								  <td>
									<?php if(!empty($row->userID)) :?>
									<a class="theme_button color" href="<?php echo base_url('contests/contest_details/'.$row->id);?>" >View</a>
									
									<?php else :?>
									 <a class="theme_button color" href="javascript:void(0);" data-url="<?php echo base_url('contests/participate/'.$row->id.'/'.$row->levelID);?>" onclick="participate_contest(this);">Participate</a>
									<?php endif;?>
								  </td>
								</tr>
								<?php endforeach;
								else :?>
								<tr>
								  <td colspan="4">No Current constest found!</td>
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
<script type="text/javascript">
function participate_contest(obj){
	var url = $(obj).attr('data-url');
	if(confirm('Are you sure want to participate this contest')){
		window.location.href = url;
	}
}
</script>