<?php $this->view('templates/frontend/header.php'); ?>
			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Vote for Your Favorite contestant</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								<li> <a href="#">Contestants</a> </li>
								
							</ol>
						</div>
					</div>
				</div>
			</section>
			
			<section class="dcommoncontainer padding_30">
				<div class="container">
				<div class="row">
				<?php
				 if($contestants):
						$sno = 1;
						foreach($contestants as $row):
						 $checksum = password_hash($row->contestID.'|'.$row->levelID.'|'.$row->userID, PASSWORD_DEFAULT);
						 $vote_url =  base_url('votings/do_vote');
						 $vote_percent = 0;
						 if($row->total_votes>0){
							$vote_percent = ($row->received_votes*100)/$row->total_votes;
							$vote_percent = round($vote_percent);
						 }
					?>	
					<div class="col-sm-4">
						<div class="contestlistBLog">
						<div class="contestedimg"><img src="<?php echo base_url();?>assets/frontend/images/profile.jpg"></div>
						<div class="contestedtxt">
							<div class="contestName"><?php echo $row->name;?></div>
							<div class="contestName"><?php echo $vote_percent;?>%</div>
							<?php if($row->voted == 'Yes') :?>
							   <?php if($row->userID == $your_recored_vote):?>
							   <div class="btnVote"><a><i class="fa fa-check-square-o"></i> Voted</a></div>
							   <?php endif;?>
							<?php else :?>
							<div id="btnVote<?php echo $row->userID;?>" class="btnVote"><a href="javascript:void(0);" data-url="<?php echo $vote_url;?>" data-cId="<?php echo $row->contestID;?>" data-lId="<?php echo $row->levelID;?>" data-pId="<?php echo $row->userID;?>" data-cs="<?php echo $checksum;?>" data-uname="<?php echo $row->name;?>" onclick="vote(this);"><i id="voteLoader<?php echo $row->userID;?>" class="fa fa-thumbs-up"></i> Vote</a></div>
							<?php endif;?>
							</div>
						</div>
					</div>
					<?php 
						endforeach;
					else :?>
					<div class="col-sm-12">
						<div class="contestlistBLog">
						<div class="contestedtxt">
							<div class="contestName text-center">No Contestants Found</div>
						</div>
						</div>
					</div>
					<?php
					endif;?> 
					
				</div>
				</div>
			</section>
			
			
<?php  $this->view('templates/frontend/footer.php'); ?>
<script type="text/javascript">
function vote(obj){
	var post_url = $(obj).attr('data-url');
	var paticipant_name = $(obj).attr('data-uname');
	if(confirm('You are about to vote '+paticipant_name)){
		//window.location.href = url;
	
		var cId = $(obj).attr('data-cId')
		var lId = $(obj).attr('data-lId');
		var pId = $(obj).attr('data-pId');
		var cs = $(obj).attr('data-cs');
		
		/*var formData = new FormData();
		formData.append('cId', cId);
		formData.append('lId', lId);
		formData.append('pId', pId);
		formData.append('cs', cs);*/
		
		let reqHeader = new Headers();
		reqHeader.append('Content-Type', 'text/json');//if use formData commete this text/json line
		reqHeader.append('Authorization', 'Bearer <?php echo $this->auth_token;?>' ); 
		let initObject = {
			method: 'POST',
			headers: reqHeader,
			body: JSON.stringify({
				cId: cId,
				lId: lId,
				pId: pId,
				cs:cs
			}),
			//body: formData,
			credentials: 'same-origin'
		};
		$('#voteLoader'+pId).removeClass('fa fa-thumbs-up');
		$('#voteLoader'+pId).addClass('fa fa-spinner');
		fetch(post_url, initObject)
		.then(function (response) {
			return response.json();
		})
		.then(function (data) {		
			if(data.resp_status == 'success'){
				$('#btnVote'+pId).html('<a><i class="fa fa-check-square-o"></i> Voted</a>');
			} else {
				$('#voteLoader'+pId).removeClass('fa fa-spinner');
				$('#voteLoader'+pId).addClass('fa fa-thumbs-up');
			}
			$('#vote_msg').html(data.resp_msg);
			setTimeout(function(){
				$('#vote_msg').html('');
			},1000);
			
		})
		.catch(function (err) {
			console.log("Something went wrong!", err);
		});
	}
}
</script>