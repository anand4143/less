<?php $this->view('templates/frontend/header.php'); ?>
			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Voting Open</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								<li> <a href="#">Voting Open</a> </li>
								
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
							<?php if($this->session->userdata('logged_in') && $this->session->userdata('userType') == 3):?>
							<div class="btnView"><a href="<?php echo base_url('votings/contestants/'.$row->id.'/'.$row->levelID);?>" class="btn btn-default">View</a></div>
							<?php else:?>
							<div class="btnView"><a href="#voterLoginModal" data-toggle="modal" class="btn btn-default">View</a></div>
							<?php endif;?>
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

<div id="voterLoginModal" class="modal fade" role="dialog" style="z-index: 9999;">
 <?php echo form_open('login/voter_login',['id'=>'frmVoterLogin', 'class'=>'contact-form row columns_padding_5']);?>
  <div class="modal-dialog" style="max-width: 440px;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Voter Sign In</h5>
      </div>
      <div class="modal-body">  
		<div class="box row">
			<div class="col-sm-12">
				<div class="form-group bottommargin_0">                                    
					<label for="name">Email Id <span class="required">*</span></label>
					<?php 
						echo form_input(['class'=>'form-control','type'=>'text','aria-required'=>'true','name'=>'email','id'=>'email','placeholder'=>'Email Id*']); 
					?>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group bottommargin_0">
					<label for="email">Password<span class="required">*</span></label>
					<?php 
						echo form_password(['class'=>'form-control','size'=>'30','name'=>'password','id'=>'password','aria-required','true','placeholder'=>'Password','type'=>'password']);
					?>
				</div>
			</div>
			<!-- <div class="col-sm-12">
				<div class="row">
					<div class="col-sm-6"><input type="checkbox"/> Keep me signed in</div>
					<div class="col-sm-6 text-right"><a href="#">Forgot Password?</a></div>
				</div>
			</div> -->
			<div class="col-sm-12">
				<div class="contact-form-submit topmargin_10 text-center">
				   <div id="resp_msg" class="text-left"></div>
				</div>
			</div>
		 </div>		
      </div>
      <div class="modal-footer">
            <input type='hidden' id='is_form_valid' value='0'>	  
			<button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button btn-block color min_width_button">Sign In</button>
			<a href="<?php echo base_url('login/google_login');?>" id="googleLogin" class="theme_button btn-block color min_width_button "><span class="btn-sm"><i class="fa fa-google fa-2x" aria-hidden="true"></i></span>Sing In with Google</a>
			<a href="<?php echo base_url('login/fb_login');?>" id="fbLogin" class="theme_button btn-block color min_width_button "><span class="btn-sm"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></span>Sing In with Facebook</a>
			 Don't Have Account Please <a href="#">Signup</a>
      </div>
    </div>
  </div>
   <?php echo form_close();?>
</div>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
function vote(obj){
	var url = $(obj).attr('data-url');
	var paticipant_name = $(obj).attr('data-uname');
	if(confirm('You are about to vote '+paticipant_name)){
		window.location.href = url;
	}
}


$(document).ready(function() {
	$("#frmVoterLogin").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true
			}
		},
		messages: {
			email: {
				required: "Please Enter Email",
				email: "Please enter valid email"
			},
			password: {
				required: "Please Enter Password"
			}
		},
		errorPlacement: function(error, element) {
		// Done in highlight/unhighlight
		 error.insertAfter(element);
		 error.addClass('text-danger');
		},
		submitHandler: function(form)
		{
			$('#is_form_valid').val(1);
			return false;
		}
	});

	$("#frmVoterLogin").on('submit',(function(e) {
		e.preventDefault();
		if($('#is_form_valid').val() == '0' || $('#email').val() == '' || $('#pasword').val() == ''){
			return false;
		}
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
				  document. getElementById("frmVoterLogin").reset();
				  $('#voterLoginModal').modal('hide');
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
					if(response.resp_status == 'success') {
						window.location.reload();
					}
				}, 2000); 
			},
			error: function(e) {
					//$('#btnUpload').attr('disabled', false);
			}          
		});
	}));
});	
</script>