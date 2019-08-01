<?php $this->view('templates/frontend/header.php'); ?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Profile</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="dashboard.html">Dashboard</a> </li>
								<li class="active">Profile</li>
							</ol>
						</div>
					</div>
				</div>
			</section>

			<section class="dcommoncontainer">
				<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="dashboardboxes">
						<div class="padding_30">
							<div class="row">
								<div class="col-sm-6">
								<div class="userproimg"><img src="<?php echo base_url('assets/frontend/images/profile.jpg');?>"/></div>
								<div class="userpro">
									<div><strong>Name :</strong> <?php echo $user->userName;?> </div>									
									<div><strong>Email :</strong> <?php echo $user->email;?></div>
									<div><strong>Contest :</strong> <?php echo $c_data->contestName?> </div>
									<div><strong>Lavel :</strong> <?php echo $c_data->levelName?> </div>
									</div>
								</div>
								<div class="col-sm-6 text-right">
									<a href="#uploadSong" data-toggle="modal" class="theme_button color"><i class="fa fa-external-link"></i> Upload Song</a>
								</div>
							</div>
						</div>
						</div>
						<div class="dashboardboxes">
						<div class="padding_20">
							<h4>List of Participants</h4>
							<div class="table">
								<table width="100%" class="table table-hover" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <th><strong>Name</strong></th>
									  <th><strong>Lavel</strong></th>
									  <th><strong>Email Id</strong></th>
									  <th><strong>Song</strong></th>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
									<tr>
									  <td>Jhon Smit</td>
									  <td>Xyz123</td>
									  <td>XYZ@gmail.com</td>
									  <td>Lorem Ipsum is simply dummy text of...</td>
									</tr>
								  </tbody>
								</table>
							<div class="text-right">
								<ul class="pagination">
								<li><a href="#"><span class="sr-only">Prev</span><i class="fa  fa-angle-left"></i></a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#"><span class="sr-only">Next</span><i class="fa fa-angle-right"></i></a></li>
							</ul>
							</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
			</section>



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
									   	 <div>
											<label class="col-md-3 col-form-label" for="text-input">&nbsp;</label>
											<div class="col-md-9">
											  <a href="#"  data-toggle="modal" data-target="#uploadSongModal" class="btn btn-sm btn-primary" type="button">
											  <i class="fa fa-music"></i> &nbsp;Upload Song</a>											  
											</div>
									     </div>
										 
										 <br>
										 <!--user song list-->
										 <div class="card">
										   <div class="card-header">
											My Songs
										   </div>
										   <div class="card-body">
											  <ul class="list-group">
											    <?php if(count($my_songs['song_list'])):  
   												     foreach($my_songs['song_list'] as $song): ?>
												 <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
												     <?php echo $song['smuleUrl'];?>
													 <span class="badge badge-primary badge-pill">2</span>
												 </li>
												 <?php endforeach;
												endif;?>
												
											  </ul>
										   </div>
										</div>
										 <!--user song list-->
										 
										  <!--Other user song list-->
										  <?php 
										  if(count($others_song_list)): 
										    foreach($others_song_list as $row): ?>
										 <div class="card">
										   <div class="card-header">
											<?php echo $row['userName'];?>
										   </div>
										   <div class="card-body">
											  <ul class="list-group">
											     <?php if(count($row['song_list'])):  
   												     foreach($row['song_list'] as $song): ?>
												 <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
												    <?php echo $song['smuleUrl'];?>
												 </li>
												<?php endforeach;
												endif;?>
											  </ul>
										   </div>
										</div>
										<?php endforeach;
										endif;?>
										 <!--Other user song list-->
									 <?php } ?>
							    <?php } else {?>
									 Start Soon.........
								<?php }?>
                                </div>
						
                        </div>
						
					</div>
                </div>
                <!-- /Row -->



<?php  $this->view('templates/frontend/footer.php'); ?>

<div id="uploadSong" class="modal fade" role="dialog">
<?php 
	$attributes = array('class' => 'form-horizontal', 'id' => 'frmUploadSong', 'name' => 'frmUploadSong');
	echo form_open('contests/upload_song/'.$c_data->id.'/'.$c_data->levelID, $attributes);
?>
  <div class="modal-dialog" style="max-width: 440px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Upload Your Song</h5>
      </div>
      <div class="modal-body">
        <div class="box">
		 <input type="text"  id="smule_url"  name="smule_url" class="form-control" placeholder="Upload Your Song">
		</div>
     <i class="red">Only 5 Song you can upload</i>
      </div>
      <div class="modal-footer">
	       <div id="resp_msg" class="text-left"></div>
			<button class="theme_button color btn-block" type="submit">
				<i class="fa fa-music"></i> Upload
			</button>
      </div>
    </div>
  </div>
   <?php echo form_close();?>
</div>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
function participate_contest(obj){
	var url = $(obj).attr('data-url');
	if(confirm('Are you sure want to participate this contest')){
		window.location.href = url;
	}
}

$(document).ready(function() {
	$("#frmUploadSong").validate({
		rules: {
			smule_url: {
				required: true,
				url: true
			}
		},
		messages: {
			smule_url: {
				required: "Please Upload Song",
				url: "Please enter valid song url"
			}
		},
		errorPlacement: function(error, element) {
		// Done in highlight/unhighlight
		 error.insertAfter(element);
		 error.addClass('text-danger');
		},
		submitHandler: function(form)
		{
			return false;
		}
	});

	$("#frmUploadSong").on('submit',(function(e) {
		e.preventDefault();
		var obj = $(this);
		var postUrl = $(this).attr('action'); 
		$.ajax({
			url: postUrl,
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			dataType: "json",
			beforeSend : function() {
					//$("#preview").fadeOut();
				   // $("#filesLoader").fadeOut();
			},
			success: function(response) {
				$("#resp_msg").html(response.resp_msg);
				if(response.resp_status == 'success') {
				  $("#resp_msg").removeClass('text-danger');
				  $("#resp_msg").addClass('text-success');
				  document. getElementById("frmUploadSong").reset();
				  $('#uploadSongModal').modal('hide');
				} else if ( response.resp_status == 'errors'){
				   $.each(response.messages, function(key,value) {
							var element = $('#'+key);
							element.closest('div.form-group')
							.removeClass('has-error')
							.addClass(value.length > 0 ? 'has-error' : 'has-success')
							.find('.text-danger').remove()
							.nextAll('.text-danger').remove();
							element.siblings('em.text-danger').remove();
							element.after(value);
					});
				}else {
					 $("#resp_msg").addClass('text-danger');
					 $("#resp_msg").removeClass('text-success');
				}								
				setTimeout(function(){
					$("#btnSubmit").attr("disabled", false); 
					$("#resp_msg").html("");
				}, 2000); 
			},
			error: function(e) {
					//$('#btnUpload').attr('disabled', false);
			}          
		});
	}));
});	
</script>