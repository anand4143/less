<?php $this->view('templates/admin/header.php'); ?>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Edit Level</h4>
			<a href="<?php echo base_url('admin/levels');?>" class="btn btn-sm btn-link">Content List</a>
		</div>
		 <?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'frmLevel', 'name' => 'frmLevel');
				echo form_open('admin/levels/update/'.$c_data->id, $attributes);
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
								<option value="<?php echo $row->id;?>" <?php echo ( $row->id ==  $c_data->contestID) ? 'selected="selected"' : ''?>><?php echo $row->contestName;?></option>
						  <?php endforeach;
						  endif;?>
					   </select>
					   <?php echo form_error('contestID', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Level Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="levelName"  name="levelName" value="<?php echo set_value('levelName', $c_data->levelName); ?>" maxlength="128" placeholder="Enter Level Name">
					   <?php echo form_error('levelName', '<span class="help-block text-danger">', '</div>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="textarea-input">Level Description</label>
					<div class="col-md-9">
					   <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Level Description" maxlength="1024"><?php echo set_value('description', $c_data->description); ?></textarea>
					   <?php echo form_error('description', '<span class="help-block text-danger">', '</div>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Status</label>
					<div class="col-md-9">
					   <select id="contestID" name="contestID" class="form-control">
						  <option value="">Select Status</option>
								<option value="1" <?php echo $c_data->status == 1 ? 'selected="selected"' : '';?>>Active</option>
								<option value="0" <?php echo $c_data->status == 0 ? 'selected="selected"' : '';?>>In Active</option>
					   </select>
					   <?php echo form_error('contestID', '<span class="help-block text-danger">', '</span>'); ?>
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
				required: true
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
		errorPlacement: function(error, element) {
		// Done in highlight/unhighlight
		 error.insertAfter(element);
		 error.addClass('text-danger');
		}
	});
});		
</script>