<?php $this->view('templates/frontend/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
					<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contest Success</h4>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 390px;"><div id="activity" style="overflow: hidden; width: auto; height: 390px;">
                                    
									<?php 
									echo $resp_status ? 'You have Successfully participate' : 'Please try again!';
									?>
                                </div>
								<div class="slimScrollBar" style="background: transparent; width: 5px; position: absolute; top: 108px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 268.728px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </div>
                        </div>
						
					</div>
                </div>
                <!-- /Row -->



<?php  $this->view('templates/frontend/footer.php'); ?>



<script type="text/javascript">
function participate_contest(obj){
	var url = $(obj).attr('data-url');
	if(confirm('Are you sure want to participate this contest')){
		window.location.href = url;
	}
}
</script>