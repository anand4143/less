<?php $this->view('templates/admin/header.php'); ?>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Add New Contest</h4>
			<a href="<?php echo base_url('admin/contests');?>" class="btn btn-sm btn-link">Contest List</a>
		</div>
		 <?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'frmContest', 'name' => 'frmContest');
				echo form_open('admin/contests/store', $attributes);
		 ?>
		<div class="card">
		   <div class="card-header">
			  <strong>Contest</strong>
		   </div>
		   <div class="card-body">
		   
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Contest Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="contestName"  name="contestName" value="<?php echo set_value('contestName'); ?>" maxlength="128" placeholder="Enter Contest Name">
					   <?php echo form_error('contestName', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="startDate">Registration Start Date</label>
					<div class="col-md-3">
					   <input class="form-control" type="date" id="regStartDate"  name="regStartDate" value="<?php echo set_value('regStartDate'); ?>"  placeholder="Select Start Date" maxlength="10">
					   <?php echo form_error('regStartDate', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="endDate">Registration End Date</label>
					<div class="col-md-3">
					   <input class="form-control" type="date" id="regEndDate"  name="regEndDate" value="<?php echo set_value('regEndDate'); ?>" placeholder="Select End Date" maxlength="10">
					   <?php echo form_error('regEndDate', '<span class="help-block text-danger">', '</span'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="startDate">Contest Start Date</label>
					<div class="col-md-3">
					   <input class="form-control" type="date" id="startDate"  name="startDate" value="<?php echo set_value('startDate'); ?>"  placeholder="Select Start Date" maxlength="10">
					   <?php echo form_error('startDate', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="endDate">Contest End Date</label>
					<div class="col-md-3">
					   <input class="form-control" type="date" id="endDate"  name="endDate" value="<?php echo set_value('endDate'); ?>" placeholder="Select End Date" maxlength="10">
					   <?php echo form_error('endDate', '<span class="help-block text-danger">', '</span'); ?>
					</div>
				 </div>
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="textarea-input">Contest Description</label>
					<div class="col-md-9">
					   <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Contest Description" maxlength="1024"><?php echo set_value('description'); ?></textarea>
					   <?php echo form_error('description', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
		   </div>
		   <div class="card-footer ">
			  <button class="btn btn-sm btn-primary" type="submit">
			  <i class="fa fa-dot-circle-o"></i> Submit</button>
			  <button type="button" class="btn btn-sm btn-default" onClick="javascript: window.history.go(-1);"><i class="fa fa-arrow-left"></i> Back</button>
		   </div>
		</div>
		 <?php echo form_close();?>
	</div>
</div>
<!-- /Row -->

<?php  $this->view('templates/admin/footer.php'); ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#frmContest").validate({
		rules: {
			contestName: {
				required: true,
				minlength: 2
			},
			regStartDate: {
				required: true,
				date: true
			},
			regEndDate: {
				required: true,
				date: true
			}
			startDate: {
				required: true,
				date: true
			},
			endDate: {
				required: true,
				date: true
			}
		},
		messages: {
			contestName: {
				required: "Please Enter Contest Name",
				minlength: "Contest Minimum Length 2 Required"
			},
			regStartDate: {
				required: "Select Registration Start Date",
				date: "Valid Registration Start Date Required"
			},
			regEndDate: {
				required: "Select Registrion End Date",
				date: "Valid Registration End Date Required"
			},
			startDate: {
				required: "Select Start Date",
				date: "Valid Date Required"
			},
			endDate: {
				required: "Select End Date",
				date: "Valid Date Required"
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