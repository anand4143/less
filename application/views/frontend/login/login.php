<?php  $this->view('templates/frontend/header.php');?>		
			<section class="signinContainer">
				<div class="container">
				<div class="signupcontainer">
				<?php echo $this->session->flashdata('error'); ?>
                <!-- <form class="contact-form row columns_padding_5" method="post" action="http://webdesign-finder.com/html/thecrowd/"> -->
                    <?php echo form_open('user/dashboard',['class'=>'contact-form row columns_padding_5']);?>
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
										<button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button btn-block color min_width_button">Signin</button>
									</div>
								</div>
								<div class="col-sm-12 text-center">
								Don't Have Account Please <a href="signup.html">Signup</a>
								</div>
							<!-- </form> -->
					</div>
				</div>
			</section>
<?php  $this->view('templates/frontend/footer.php');?>	