<?php $this->view('templates/frontend/header.php'); ?>


 <!-- Row -->
 <div class="row">
        <div class="col-xl-12">
					<?php echo $this->session->flashdata('resp_msg'); ?>
					<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Contest Info</h4>
								<?php if($c_data){?>
										<div class="form-group row">
											<label class="col-md-3 col-form-label" for="text-input">Contest Name</label>
											<div class="col-md-9">
											   <?php echo $c_data->contestName;?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label" for="text-input">Contest Level</label>
											<div class="col-md-9">
											   <?php echo $c_data->levelName;?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-3 col-form-label" for="text-input">About Contest</label>
											<div class="col-md-9">
											   <?php echo $c_data->description;?>
											</div>
										</div>
								      <?php if(!$is_participated){ ?>
										<div>
											<label class="col-md-3 col-form-label" for="text-input">&nbsp;</label>
											<div class="col-md-9">
												<button type="button" class="btn btn-sm btn-primary" data-url="<?php echo base_url('contests/participate/'.$c_data->id.'/'.$c_data->levelID);?>" onclick="participate_contest(this);">Participation to This Contest</button>
											</div>
									     </div>
										
									 <?php } else { ?>
									   	<div class="form-group row">
											<label class="col-md-3 col-form-label" for="text-input">Upload Song</label>
											<div class="col-md-9">
											   <div class="custom-file">
												<input type="file" class="custom-file-input" id="upload_song_link" name="upload_song_link">
												<label class="custom-file-label" for="customFile">Choose file</label>
											  </div>
											   <?php //echo form_error('upload_song_link', '<span class="help-block text-danger">', '</span>'); ?>
											</div>
										 </div>
										 <div>
											<label class="col-md-3 col-form-label" for="text-input">&nbsp;</label>
											<div class="col-md-9">
											  <button class="btn btn-sm btn-primary" type="submit">
											  <i class="fa fa-dot-circle-o"></i> Upload</button>
											  <button class="btn btn-sm btn-danger" type="reset">
											  <i class="fa fa-ban"></i> Cancel</button>
											</div>
									     </div>
									 <?php } ?>
							    <?php }else {?>
									 Start Soon.........
								<?php }?>
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