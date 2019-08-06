<?php $this->view('templates/frontend/header.php'); ?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Profile</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
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
									<a href="#uploadSong" data-toggle="modal" class="theme_button color"><i class="fa fa-music"></i> &nbsp; Upload Song</a>
								</div>
							</div>
						</div>
						</div>
						<div class="dashboardboxes">
							<div class="padding_20">
								<h4>My Songs</h4>
								<div class="table">
									<table width="100%" class="table table-hover" border="0" cellspacing="0" cellpadding="0">
									  <tbody>
										<tr>
										  <th><strong>Songs</strong></th>
										</tr>
										 <?php if(isset($my_songs['song_list']) && count($my_songs['song_list'])):  
											foreach($my_songs['song_list'] as $song): ?>
										<tr>
										  <td> <a target="_blank" href="<?php echo $song['smuleUrl'];?>"><i class="fa fa-music"></i></a></td>
										</tr>
										<?php endforeach;
										  else :
										  ?>
											<tr>
											  <td colspan="4" align="center">No song found! </td>
											</tr>
										<?php 
										endif;?>
									  </tbody>
									</table>
								
								</div>
							</div>
							 <?php if(!empty($others_song_list) && count($others_song_list)): 
									foreach($others_song_list as $row): ?> 
							<div class="padding_20">
								<h4><?php echo $row['fullName'];?></h4>
								<div class="table">
									<table width="100%" class="table table-hover" border="0" cellspacing="0" cellpadding="0">
									  <tbody>
										<tr>
										  <th><strong>Songs</strong></th>
										</tr>
										 <?php if(isset($row['song_list']) && count($row['song_list'])):  
   											 foreach($row['song_list'] as $song): ?>
										<tr>
										  <td> <a target="_blank" href="<?php echo $song['smuleUrl'];?>"><i class="fa fa-music"></i></a></td>
										</tr>
										<?php endforeach;
										  else :
										  ?>
											<tr>
											  <td colspan="4" align="center">No song found! </td>
											</tr>
										<?php 
										endif;?>
									  </tbody>
									</table>
								
								</div>
							</div>
							<?php endforeach;
							endif;?>
						</div>
					</div>
				</div>
				</div>
			</section>


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
				<i class="fa fa-music"></i>&nbsp; Upload
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