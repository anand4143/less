<?php $this->view('templates/admin/header.php'); ?>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Add New Judge</h4>
			<a href="<?php echo base_url('admin/judge');?>" class="btn btn-sm btn-link">Judge List</a>
		</div>
		 <?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'frmJudge', 'name' => 'frmJudge');
				echo form_open('admin/judge/saveJudge', $attributes);
		 ?>
		<div class="card">
		   <div class="card-header">
			  <strong>Judge</strong>
		   </div>
		   <div class="card-body">
                <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">User Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="userName"  name="userName" value="<?php echo set_value('userName'); ?>" maxlength="128" placeholder="Enter judege user name">
					   <?php echo form_error('userName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				</div>
                <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Email</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="email"  name="email" value="<?php echo set_value('email'); ?>" maxlength="128" placeholder="Enter judege email">
					   <?php echo form_error('email', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				</div>       
		   
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">First Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="firstName"  name="firstName" value="<?php echo set_value('firstName'); ?>" maxlength="128" placeholder="Enter judege first name">
					   <?php echo form_error('firstName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Last Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="lastName"  name="lastName" value="<?php echo set_value('lastName'); ?>" maxlength="128" placeholder="Enter judege last name">
					   <?php echo form_error('lastName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Password</label>
					<div class="col-md-9">
					   <input class="form-control" type="password" id="password"  name="password" value="<?php echo set_value('password'); ?>" maxlength="128" placeholder="Enter password">
					   <?php echo form_error('password', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Confirm Password</label>
					<div class="col-md-9">
					   <input class="form-control" type="password" id="confirmPassword"  name="confirmPassword" value="<?php echo set_value('confirmPassword'); ?>" maxlength="128" placeholder="Enter confirm password">
					   <?php echo form_error('confirmPassword', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="textarea-input">About Judge</label>
					<div class="col-md-9">
					   <textarea class="form-control" id="aboutUser" name="aboutUser" rows="4" placeholder="User Description" maxlength="1024"><?php echo set_value('aboutUser'); ?></textarea>
					   <?php echo form_error('aboutUser', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
		   </div>
		   <div class="card-footer ">
			<button type="submit" class="btn btn-primary mr-10">Submit</button>
			<button type="button" class="btn btn-light" onClick="javascript: window.history.go(-1);">Back</button>
			  <!-- <button class="btn btn-sm btn-primary" type="submit">
			  <i class="fa fa-dot-circle-o"></i> Submit</button>
			  <button class="btn btn-sm btn-danger" type="reset">
			  <i class="fa fa-ban"></i> Reset</button> -->
		   </div>
		</div>
		 <?php echo form_close();?>
	</div>
</div>
<!-- /Row -->

<?php  $this->view('templates/admin/footer.php'); ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#frmJudge").validate({
		rules: {
			
			email: {
				required: true
			},
			firstName: {
				required: true
            },
            lastName: {
				required: true
			},
            password: {
				required: true
			},
            confirmPassword: {
				required: true
			}
		},
		messages: {
			email: {
				required: "Please Enter user email"
			},
			firstName: {
				required: "Please Enter user first name"				
			},
			lastName: {
				required: "Please Enter user last name"
			},
			password: {
				required: "Please Enter password"
			},
			confirmPassword: {
				required: "Please Enter confirm password"
			}
		},
		errorPlacement: function(error, element) {
		// Done in highlight/unhighlight
		 error.insertAfter(element);
         error.addClass('text-danger');
		}
	});
});		
</script>