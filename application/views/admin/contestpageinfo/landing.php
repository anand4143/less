<?php $this->view('templates/admin/header.php'); ?>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Contest Page Info</h4>
		</div>
		 <?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'frmContest', 'name' => 'frmContest');
				echo form_open('admin/adminContestPageInfo/save', $attributes);
		 ?>
		<div class="card">
		   <div class="card-header">
			  <strong>Information</strong>
		   </div>
		   <div class="card-body">
				 
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="textarea-input">Description</label>
					<div class="col-md-9">
					<?php //print_r($description);?>
					<?php //echo "<li>".$description[0]->description;?>
					   <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Contest Description" maxlength="1024"><?php echo $description[0]->description; ?></textarea>
					   <?php echo form_error('description', '<span class="help-block text-danger">', '</span>'); ?>
					</div>
				 </div>
				 
		   </div>
		   <div class="card-footer ">
			  <button class="btn btn-sm btn-primary" type="submit">
			  <i class="fa fa-dot-circle-o"></i> Save</button>
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