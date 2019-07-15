<?php $this->view('templates/admin/header.php'); ?>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Add New Level</h4>
			<a href="<?php echo base_url('admin/levels');?>" class="btn btn-sm btn-link">Content List</a>
		</div>
		 <?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'frmLevel', 'name' => 'frmLevel');
				echo form_open('admin/levels/store', $attributes);
		 ?>
		<div class="card">
		   <div class="card-header">
			  <strong>Level</strong>
		   </div>
		   <div class="card-body">
		   
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Contest</label>
					<div class="col-md-9">
					   <select id="contestID" name="contestID" class="form-control">
						  <option value="">Select Contest</option>
						  <?php if(count($contests)) :
						    foreach($contests as $row):?>
								<option value="<?php echo $row->id;?>"><?php echo $row->contestName;?></option>
						  <?php endforeach;
						  endif;?>
					   </select>
					   <?php echo form_error('contestID', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Level Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="levelName"  name="levelName" value="<?php echo set_value('levelName'); ?>" maxlength="128" placeholder="Enter Level Name">
					   <?php echo form_error('levelName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="textarea-input">Level Description</label>
					<div class="col-md-9">
					   <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Level Description" maxlength="1024"><?php echo set_value('description'); ?></textarea>
					   <?php echo form_error('description', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
		   </div>
		   <div class="card-footer ">
			  <button class="btn btn-sm btn-primary" type="submit">
			  <i class="fa fa-dot-circle-o"></i> Submit</button>
			  <button class="btn btn-sm btn-danger" type="reset">
			  <i class="fa fa-ban"></i> Reset</button>
		   </div>
		</div>
		 <?php echo form_close();?>
	</div>
</div>
<!-- /Row -->

<?php  $this->view('templates/admin/footer.php'); ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#frmLevel").validate({
		rules: {
			contestID: {
				required: true,
				digits: true,
			},
			levelName: {
				required: true,
				minlength: 2
			}
		},
		messages: {
			contestID: {
				required: "Please Select Contest"
			},
			levelName: {
				required: "Please Enter Level Name",
				minlength: "Level Minimum Length 2 Required"
			}
		},
		errorClass: 'invalid',
		validClass: 'valid',
		/*highlight: function(element, errorClass, validClass) {
			$(element).removeClass(validClass).addClass(errorClass).
			next('label').removeAttr('data-success').attr('data-error', 'Incorrect!');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass(errorClass).addClass(validClass).
			next('label').removeAttr('data-error').attr('data-success', 'Correct!');
		},*/
		errorPlacement: function(error, element) {
		// Done in highlight/unhighlight
		 error.insertAfter(element);
		 error.addClass('text-danger');
		}
	});
});		
</script>