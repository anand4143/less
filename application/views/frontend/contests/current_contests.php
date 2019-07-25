<?php $this->view('templates/frontend/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
					<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Currently Running Contests</h4>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 390px;"><div id="activity" style="overflow: hidden; width: auto; height: 390px;">
                                    <?php if($contests):
											foreach($contests as $row):
									?>	
									<a href="<?php echo base_url('contests/contest_details/'.$row->id);?>">
									<div class="media border-bottom-1 pt-3 pb-3">
                                        <img width="35" src="<?php echo base_url('assets/dist/img/3videoicon.png');?>" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h5><?php echo $row->contestName;?></h5>
                                            <p class="mb-0"><?php echo $row->description;?></p>
                                        </div>
										<span class="text-muted "><?php echo date('d M, Y', strtotime($row->startDate));?></span>
                                    </div>
									</a>
									<?php endforeach;
									  endif;?>
                                   
                                </div><div class="slimScrollBar" style="background: transparent; width: 5px; position: absolute; top: 108px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 268.728px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </div>
                        </div>
						
					</div>
                </div>
                <!-- /Row -->



<?php  $this->view('templates/frontend/footer.php'); ?>



<script type="">

</script>