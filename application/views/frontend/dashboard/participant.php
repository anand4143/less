<?php $this->view('templates/frontend/header.php'); ?>
 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
					<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
						<h4>Paticipant Dashboard</h4>
						<a href="#" class="btn btn-sm btn-link">Participation"</a>
					</div>
						<div class="card">
							<div class="card-body pa-0">
							<div class="row">
								<div class="col-sm-6 col-xs-6">
									<a href="#">
										<div class="panel panel-default text-center" style="margin:10px;border-radius:5px;box-shadow:0px 0px 12px 4px rgba(219,219,219,1);border:1px solid #ccc;">
										  <div class="panel-body" style="padding:50px;">Previous Contests</div>
										</div>
								   </a>
								</div>
								<div class="col-sm-6 col-xs-6">
									<a href="#">
										<div class="panel panel-default text-center" style="margin:10px;border-radius:5px;box-shadow:0px 0px 12px 4px rgba(219,219,219,1);border:1px solid #ccc;">
										  <div class="panel-body" style="padding:50px;">Your Contests</div>
										</div>
								   </a>
								</div>
								<div class="col-sm-6 col-xs-6">
									<a href="<?php echo base_url('participants/upcoming_contests');?>">
										<div class="panel panel-default text-center" style="margin:10px;border-radius:5px;box-shadow:0px 0px 12px 4px rgba(219,219,219,1);border:1px solid #ccc;">
										  <div class="panel-body" style="padding:50px;">Upcoming Contests</div>
										</div>
								   </a>
								</div>
								<div class="col-sm-6 col-xs-6">
									<a href="#">
										<div class="panel panel-default text-center" style="margin:10px;border-radius:5px;box-shadow:0px 0px 12px 4px rgba(219,219,219,1);border:1px solid #ccc;">
										  <div class="panel-body" style="padding:50px;">Profile</div>
										</div>
								   </a>
								</div>
							</div>
							</div>
						</div>		
					</div>
                </div>
                <!-- /Row -->



<?php  $this->view('templates/frontend/footer.php'); ?>