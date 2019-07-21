<!DOCTYPE html>
<html>
<head>
    <title>Admin-Less Superstar</title>
    <?php //link_tag("assets/css/bootstrap.min.css");  ?>
    <?php //link_tag('assets/css/style.css'); ?>
    <?= link_tag('assets/dist/css/style.css'); ?>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
   
	<!-- HK Wrapper -->
	<div class="hk-wrapper">
        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
                <a class="d-flex auth-brand" href="#">
                   Participant Less Superstar
                </a>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(<?php echo base_url();?>assets/dist/img/bg2.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Develop a passion for learning. If you do, you will never cease to grow.</h1>
                                        <!-- <p class="text-white">Develop a passion for learning. If you do, you will never cease to grow.</p> -->
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(<?php echo base_url();?>assets/dist/img/bg1.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Knowledge is power. Information is liberating. Education is the premise of progress, in every society, in every family.</h1>
                                        <!-- <p class="text-white">Knowledge is power. Information is liberating. Education is the premise of progress, in every society, in every family.</p> -->
                                    </div>
                                </div>
								<div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                            <?php echo form_open('login/login'); ?>
                                    <h1 class="display-4 mb-10">Welcome Back :)</h1>
                                    <p class="mb-30">Sign in to your account and enjoy.</p>
                                   
                                    <div class="form-group">
                                        <?php echo form_input(['class' => 'form-control', 'name' => 'username', 'type' => 'email', 'placeholder' => 'Email']);?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <?php echo form_input(['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'password', 'name' => 'password', 'type' => 'password']); ?>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="custom-control custom-checkbox mb-25">
                                        <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                        <label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
                                    </div> -->
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    <!-- <p class="font-14 text-center mt-15">Having trouble logging in?</p>
                                    <div class="option-sep">or</div> 
                                    <div class="form-row">
                                        <div class="col-sm-6 mb-20">
                                            <button class="btn btn-indigo btn-block btn-wth-icon"> <span class="icon-label"><i class="fa fa-facebook"></i> </span><span class="btn-text">Login with facebook</span></button>
                                        </div>
                                        <div class="col-sm-6 mb-20">
                                            <button class="btn btn-sky btn-block btn-wth-icon"> <span class="icon-label"><i class="fa fa-twitter"></i> </span><span class="btn-text">Login with Twitter</span></button>
                                        </div>
                                    </div> 
                                     <p class="text-center">Do have an account yet? <a href="#">Sign Up</a></p> -->
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
	<!-- /HK Wrapper -->
    
   

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="<?php echo base_url();?>assets/dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="<?php echo base_url();?>assets/dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Owl JavaScript -->
<script src="<?php echo base_url();?>assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>

<!-- FeatherIcons JavaScript -->
<script src="<?php echo base_url();?>assets/dist/js/feather.min.js"></script>

<!-- Init JavaScript -->
<script src="<?php echo base_url();?>assets/dist/js/init.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/login-data.js"></script>

</body>
</html>

<?php  //include('admin_footer.php'); ?>