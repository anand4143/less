<?php $this->view('templates/admin/header.php'); ?>

<!-- Row -->
<div class="row">
	<div class="col-xl-12">
		<div class="d-flex align-items-center justify-content-between mt-40 mb-20">
			<h4>Add New Contest</h4>
			<a href="<?php echo base_url('admin/contests');?>" class="btn btn-sm btn-link">Content List</a>
		</div>
		
		<div class="card">
		   <div class="card-header">
			  <strong>Contest</strong>
		   </div>
		   <div class="card-body">
			  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				 <div class="form-group row">
					<label class="col-md-3 col-form-label">Static</label>
					<div class="col-md-9">
					   <p class="form-control-static">Username</p>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="text-input">Contest Name</label>
					<div class="col-md-9">
					   <input class="form-control" type="text" id="contestName"  name="contestName" placeholder="Contest Name">
					   <span class="help-block"></span>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="email-input">Content Description</label>
					<div class="col-md-9">
					   <tex class="form-control" id="email-input" type="email" name="desc" placeholder="Enter Email" autocomplete="email">
					   <span class="help-block">Please enter your email</span>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="password-input">Password</label>
					<div class="col-md-9">
					   <input class="form-control" id="password-input" type="password" name="password-input" placeholder="Password" autocomplete="new-password">
					   <span class="help-block">Please enter a complex password</span>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="date-input">Date Input</label>
					<div class="col-md-9">
					   <input class="form-control" id="date-input" type="date" name="date-input" placeholder="date">
					   <span class="help-block">Please enter a valid date</span>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="disabled-input">Disabled Input</label>
					<div class="col-md-9">
					   <input class="form-control" id="disabled-input" type="text" name="disabled-input" placeholder="Disabled" disabled="">
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="textarea-input">Textarea</label>
					<div class="col-md-9">
					   <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9" placeholder="Content.."></textarea>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="select1">Select</label>
					<div class="col-md-9">
					   <select class="form-control" id="select1" name="select1">
						  <option value="0">Please select</option>
						  <option value="1">Option #1</option>
						  <option value="2">Option #2</option>
						  <option value="3">Option #3</option>
					   </select>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="select2">Select Large</label>
					<div class="col-md-9">
					   <select class="form-control form-control-lg" id="select2" name="select2">
						  <option value="0">Please select</option>
						  <option value="1">Option #1</option>
						  <option value="2">Option #2</option>
						  <option value="3">Option #3</option>
					   </select>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="select3">Select Small</label>
					<div class="col-md-9">
					   <select class="form-control form-control-sm" id="select3" name="select3">
						  <option value="0">Please select</option>
						  <option value="1">Option #1</option>
						  <option value="2">Option #2</option>
						  <option value="3">Option #3</option>
					   </select>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="disabledSelect">Disabled Select</label>
					<div class="col-md-9">
					   <select class="form-control" id="disabledSelect" disabled="">
						  <option value="0">Please select</option>
						  <option value="1">Option #1</option>
						  <option value="2">Option #2</option>
						  <option value="3">Option #3</option>
					   </select>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="multiple-select">Multiple select</label>
					<div class="col-md-9">
					   <select class="form-control" id="multiple-select" name="multiple-select" size="5" multiple="">
						  <option value="1">Option #1</option>
						  <option value="2">Option #2</option>
						  <option value="3">Option #3</option>
						  <option value="4">Option #4</option>
						  <option value="5">Option #5</option>
						  <option value="6">Option #6</option>
						  <option value="7">Option #7</option>
						  <option value="8">Option #8</option>
						  <option value="9">Option #9</option>
						  <option value="10">Option #10</option>
					   </select>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label">Radios</label>
					<div class="col-md-9 col-form-label">
					   <div class="form-check">
						  <input class="form-check-input" id="radio1" type="radio" value="radio1" name="radios">
						  <label class="form-check-label" for="radio1">Option 1</label>
					   </div>
					   <div class="form-check">
						  <input class="form-check-input" id="radio2" type="radio" value="radio2" name="radios">
						  <label class="form-check-label" for="radio2">Option 2</label>
					   </div>
					   <div class="form-check">
						  <input class="form-check-input" id="radio3" type="radio" value="radio2" name="radios">
						  <label class="form-check-label" for="radio3">Option 3</label>
					   </div>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label">Inline Radios</label>
					<div class="col-md-9 col-form-label">
					   <div class="form-check form-check-inline mr-1">
						  <input class="form-check-input" id="inline-radio1" type="radio" value="option1" name="inline-radios">
						  <label class="form-check-label" for="inline-radio1">One</label>
					   </div>
					   <div class="form-check form-check-inline mr-1">
						  <input class="form-check-input" id="inline-radio2" type="radio" value="option2" name="inline-radios">
						  <label class="form-check-label" for="inline-radio2">Two</label>
					   </div>
					   <div class="form-check form-check-inline mr-1">
						  <input class="form-check-input" id="inline-radio3" type="radio" value="option3" name="inline-radios">
						  <label class="form-check-label" for="inline-radio3">Three</label>
					   </div>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label">Checkboxes</label>
					<div class="col-md-9 col-form-label">
					   <div class="form-check checkbox">
						  <input class="form-check-input" id="check1" type="checkbox" value="">
						  <label class="form-check-label" for="check1">Option 1</label>
					   </div>
					   <div class="form-check checkbox">
						  <input class="form-check-input" id="check2" type="checkbox" value="">
						  <label class="form-check-label" for="check2">Option 2</label>
					   </div>
					   <div class="form-check checkbox">
						  <input class="form-check-input" id="check3" type="checkbox" value="">
						  <label class="form-check-label" for="check3">Option 3</label>
					   </div>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label">Inline Checkboxes</label>
					<div class="col-md-9 col-form-label">
					   <div class="form-check form-check-inline mr-1">
						  <input class="form-check-input" id="inline-checkbox1" type="checkbox" value="check1">
						  <label class="form-check-label" for="inline-checkbox1">One</label>
					   </div>
					   <div class="form-check form-check-inline mr-1">
						  <input class="form-check-input" id="inline-checkbox2" type="checkbox" value="check2">
						  <label class="form-check-label" for="inline-checkbox2">Two</label>
					   </div>
					   <div class="form-check form-check-inline mr-1">
						  <input class="form-check-input" id="inline-checkbox3" type="checkbox" value="check3">
						  <label class="form-check-label" for="inline-checkbox3">Three</label>
					   </div>
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="file-input">File input</label>
					<div class="col-md-9">
					   <input id="file-input" type="file" name="file-input">
					</div>
				 </div>
				 <div class="form-group row">
					<label class="col-md-3 col-form-label" for="file-multiple-input">Multiple File input</label>
					<div class="col-md-9">
					   <input id="file-multiple-input" type="file" name="file-multiple-input" multiple="">
					</div>
				 </div>
			  </form>
		   </div>
		   <div class="card-footer">
			  <button class="btn btn-sm btn-primary" type="submit">
			  <i class="fa fa-dot-circle-o"></i> Submit</button>
			  <button class="btn btn-sm btn-danger" type="reset">
			  <i class="fa fa-ban"></i> Reset</button>
		   </div>
		</div>
		
	</div>
</div>
<!-- /Row -->



<?php  $this->view('templates/admin/footer.php'); ?>