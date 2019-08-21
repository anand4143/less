<?php $this->view('templates/frontend/header.php'); ?>
			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Running Contests</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								<li> <a href="#">Contests</a> </li>
								
							</ol>
						</div>
					</div>
				</div>
			</section>
			<section class="dashboardcontainer">
				<div class="container">
				<div class="row">
				    <?php if($contest_list && count($contest_list)):
					foreach($contest_list as $row):
					?>
					<div class="col-sm-4">
						<div class="contestlistBLog">
							<div class="contestName"><?php echo $row->contestName;?></div>
							<div class="btnView"><a href="<?php echo base_url('votings/contestants/'.$row->id.'/'.$row->levelID);?>" class="btn btn-default">View</a></div>
						</div>
					</div>
					<?php 
					endforeach;
					else:?>
					<div class="col-sm-12">
						<div class="contestlistBLog">
							<div class="contestName">No Running Contest Found</div>
							
						</div>
					</div>
					<?php endif;?>
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