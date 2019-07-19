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
								Paticipant Dashboard
							</div>
						</div>		
					</div>
                </div>
                <!-- /Row -->



<?php  $this->view('templates/frontend/footer.php'); ?>