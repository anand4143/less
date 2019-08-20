<?php $this->view('templates/frontend/header.php'); ?>
			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Vote for Your Favorite Profile</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								<li> <a href="#">Running Contests Profile</a> </li>
								
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
								  <th style="width: 2%"><strong>#</strong></th>
								  <th style="width: 15%"><strong>Profile Pic</strong></th>
								  <th style="width: 20%"><strong>Name</strong></th>
								  <th style="width: 20%"><strong>Contest Name</strong></th>
								  <th style="width: 15%"><strong>Contest Level</strong></th>
								  <th style="width: 10%"><strong> Received Vote %</strong></th>
								  <th style="width: 10%"><strong> Vote Now</strong></th>
								</tr>
								<?php 
								if($profile_list):
								    $sno = 1;
									foreach($profile_list as $row):
									 $vote_url =  base_url('votings/do_vote/'.$row->contestID.'/'.$row->levelID.'/'.$row->userID);
									 $vote_percent = 0;
									 if($row->total_votes>0){
										$vote_percent = ($row->received_votes*100)/$row->total_votes;
										$vote_percent = round($vote_percent ,2);
									 }
								?>	
								<tr>
								  <td><?php echo $sno++;?></td>
								   <td><div><img src="<?php echo base_url();?>assets/frontend/images/profile.jpg"></div></td>
								  <td><?php echo $row->name;?></td>
								  <td><?php echo $row->contestName;?></td>
								  <td><?php echo $row->levelName;?></td>
								  <td><?php echo $vote_percent;?></td>
								  <td>
									<?php if($row->voted == 'Yes') :?>
									  Voted
									<?php else :?>
									 <a class="theme_button color" href="javascript:void(0);" data-url="<?php echo $vote_url;?>" data-uname="<?php echo $row->name;?>" onclick="vote(this);">Vote Now</a>
									<?php endif;?>
								  </td>
								</tr>
								<?php endforeach;
								else :?>
								<tr>
								  <td colspan="7" align="center">No Current constest found!</td>
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
function vote(obj){
	var url = $(obj).attr('data-url');
	var paticipant_name = $(obj).attr('data-uname');
	if(confirm('You are about to vote '+paticipant_name)){
		window.location.href = url;
	}
}
</script>