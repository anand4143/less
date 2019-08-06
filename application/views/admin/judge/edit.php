<?php $this->view('templates/admin/header.php'); ?>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Edit Judge</h4>
			<a href="<?php echo base_url('admin/judge');?>" class="btn btn-sm btn-link">Judge List</a>
		</div>
		 <?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'frmJudge', 'name' => 'frmJudge');
				echo form_open('admin/judge/update/'.$user->id, $attributes);
		 ?>
		<div class="card">
		   <div class="card-header">
			  <strong>Judge</strong>
		   </div>
		   <div class="card-body">
                <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">User Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="userName"  name="userName" value="<?php echo set_value('userName', $user->userName); ?>" maxlength="128" placeholder="Enter user name">
					   <?php echo form_error('userName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
                 </div>
                 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Email</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="email"  name="email" value="<?php echo set_value('email', $user->email); ?>" maxlength="128" placeholder="Enter user email">
					   <?php echo form_error('email', '<span class="help-block text-danger">', '</span'); ?>
					</div>
                 </div>

				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">First Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="firstName"  name="firstName" value="<?php echo set_value('firstName', $user->firstName); ?>" maxlength="128" placeholder="Enter first name">
					   <?php echo form_error('firstName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
                 </div>
                 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Last Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="lastName"  name="lastName" value="<?php echo set_value('lastName', $user->lastName); ?>" maxlength="128" placeholder="Enter last name">
					   <?php echo form_error('lastName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="textarea-input">About Judge</label>
					<div class="col-md-9">
					   <textarea class="form-control" id="aboutJudge" name="aboutJudge" rows="4" placeholder="User Description" maxlength="1024"><?php echo set_value('aboutJudge',$user->aboutJudge); ?></textarea>
					   <?php echo form_error('aboutJudge', '<span class="help-block text-danger">', '</span>'); ?>
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