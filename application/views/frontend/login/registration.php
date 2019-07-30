<?php  $this->view('templates/frontend/header.php');?>
<section class="signinContainer">
				<div class="container">
				<div class="signupcontainer signupcon">
				<!-- <form class="contact-form row columns_padding_5" method="post" action="http://webdesign-finder.com/html/thecrowd/"> -->
                <?php echo form_open('user/register',['class'=>'contact-form row columns_padding_5']);?>
								<div class="col-sm-12">
									<div class="form-group bottommargin_0">
										<label for="name">Smule Id <span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"smuleId", "id"=>"smuleId","size"=>"30","placeholder"=>"Smule Id *"]);?>
                                        <!-- <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Smule Id *"> -->
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group bottommargin_0">
										<label for="email">First Name<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"firstName", "id"=>"firstName","size"=>"30","placeholder"=>"First Name *"]);?>
                                        <!-- <input type="text" aria-required="true" size="30" value="" class="form-control" placeholder="First Name*"> -->
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group bottommargin_0">
										<label for="email">Last Name</label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"lastName", "id"=>"lastName","size"=>"30","placeholder"=>"Last Name"]);?>
                                       
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group bottommargin_0">
										<label for="name">Email Address <span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"email", "id"=>"email","size"=>"30","placeholder"=>"Email Address *"]);?>
                                        <!-- <input type="text" aria-required="true" size="30" value="" class="form-control" placeholder="Email Address *"> -->
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group bottommargin_0">
										<label for="email">Password<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"password", "id"=>"password","size"=>"30","placeholder"=>"Password *"]);?>                                        
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group bottommargin_0">
										<label for="email">Confirm Password</label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"confirmPassword", "id"=>"confirmPassword","size"=>"30","placeholder"=>"Confirm Password *"]);?> 
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group bottommargin_0">
										<label for="email">Gender<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control', "name"=>"gender", "id"=>"gender","size"=>"30","placeholder"=>"Gender *"]);?>
                                       
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group bottommargin_0">
										<label for="email">Mobile<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control','name'=>'mobileno','id'=>'mobileno','size'=>'30','placeholder'=>'Mobile No. *']);?>
                                        
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group bottommargin_0">
										<label for="email">Address<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control','name'=>'address','id'=>'address','size'=>'30','placeholder'=>'Address *']);?>
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="form-group bottommargin_0">
										<label for="email">City<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control','name'=>'city','id'=>'city','size'=>'30','placeholder'=>'City *']);?>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group bottommargin_0">
										<label for="email">State<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control','name'=>'state','id'=>'state','size'=>'30','placeholder'=>'State *']);?>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group bottommargin_0">
										<label for="email">Pincode<span class="required">*</span></label> 
                                        <?php echo form_input(['class'=>'form-control','name'=>'pincode','id'=>'pincode','size'=>'30','placeholder'=>'Pincode *']);?>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group bottommargin_0"> <label for="message">Describe your singing or talent (if any)</label> 
                                    <?php echo form_textarea(['class'=>'form-control','name'=>'description','id'=>'description','size'=>'30','placeholder'=>'Describe your singing or talent (if any)', "rows"=>"5" ,"cols"=>"45"]);?>
                                    </div>
								</div>					
								
								<div class="col-sm-12">
									<div class="contact-form-submit topmargin_10 text-center">
										<button type="submit" id="contact_form_submit" name="register" class="theme_button btn-block color min_width_button">Signup</button>
									</div>
								</div>
							
					</div>
				</div>
			</section>
			<?php  $this->view('templates/frontend/footer.php');?>	