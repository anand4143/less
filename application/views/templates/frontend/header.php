<!DOCTYPE html>
<html class="no-js">
<head>
	<title>Lesssuperstars</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/frontend/images/FAVICON.png"/>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= link_tag('assets/css/frontend/bootstrap.min.css'); ?>
	<?= link_tag('assets/css/frontend/animations.css');?>
	<?= link_tag('assets/css/frontend/fonts.css');?>
	<?= link_tag('assets/css/frontend/cue.css');?>
	<?= link_tag('assets/css/frontend/main.css');?>
	<?= link_tag('assets/css/frontend/shop.css');?>
	<?= link_tag('assets/css/frontend/mediaelementplayer-legacy.css');?>
    <script src="<?php echo base_url();?>assets/js/frontend/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<div class="feedbackcon gradient_bg"><a href="<?php echo base_url()?>feedback"><i class="fa fa-comments-o"></i></a></div>
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>
	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">
		<!-- template sections -->
		<section class="page_toplogo with_bottom_overlap_logo ls with_top_color_border columns_padding_0">
				<div class="container">
					<div class="row flex-wrap v-center paddtb">
						<div class="col-sm-2 col-sm-push-5 text-left text-sm-center">
							<div class="bottom_overlap_logo"> 
								<a href="<?php if($this->session->userdata('logged_in')){ echo base_url('user/landing');}else{echo base_url();}?>" class="logo">
	                    			<img src="<?php echo base_url();?>assets/frontend/images/logo.png" alt="">
								</a> 
							</div>
							<!-- header toggler -->
							<span class="toggle_menu"><span></span></span>
						</div>
						<div class="col-sm-5 col-sm-pull-2 hidden-xs"> 
							<span class="small-text rightpadding_20 hidden-sm">follow us:</span> 
							<span class="divided-content">
								<span>
									<a class="social-icon socicon-facebook" href="#" title="Facebook"></a></span> 
									<span><a class="social-icon socicon-twitter" href="#" title="Twitter"></a></span> 
									<span><a class="social-icon socicon-linkedin" href="#" title="linkedin"></a></span>
								</span>
						</div>

				

						<!-- <div class="col-sm-5 text-left text-sm-right">
							<div class="divided-content small-text greylinks color2">
								<div>
									<div class="dropdown"> -->
									
									<?php 
										//if($this->session->userdata('logged_in') == TRUE){
									?> 
										<!-- <a href="#0" id="account-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											My account<span class="caret"></span>
	                					</a> -->
									<?php //}else{ ?>
										<!-- <a class="active" href="<?php //echo site_url('meraganacontest') ?>">Mera Gana Contest</a>				 -->
									<?php 
										//}
									?>
										<!-- <ul class="dropdown-menu" aria-labelledby="account-dropdown"> -->
										<?php										
											//if($this->session->userdata('logged_in') == TRUE){
												//if($this->session->userdata('userID')){
										?>
											<!-- <li> <a href="<?php echo base_url()?>user/profile">Profile</a> </li>
											<li> <a href="<?php echo base_url()?>login/logout">Logout</a> </li> -->
										<?php
											//}else{
										?>
											<!-- <li> <a href="<?php echo base_url()?>login">SignIn</a> </li>
											<li> <a href="<?php echo base_url()?>login/signUp">SignUp</a> </li> -->
										<?php
											//}
										//}else{
											?>
											<!-- <li> <a href="<?php echo base_url()?>login">SignIn</a> </li>
											<li> <a href="<?php echo base_url();?>registration">SignUp</a> </li> -->
										<?php 
										//}
										?>
										<!-- </ul>
									</div>
								</div>
							</div>
						</div> -->


						<?php 
							if($this->session->userdata('logged_in') == TRUE){
						?>
						<div class="col-sm-5 text-left text-sm-right width60">
							<div class="divided-content small-text greylinks color2 marri20">
								<div>
									<div class="dropdown"> 
										<a href="#0" id="account-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											My account<span class="caret"></span>
	                					</a>
										<ul class="dropdown-menu" aria-labelledby="account-dropdown">
											<li> <a href="<?php echo base_url()?>user/profile">Profile</a> </li>
											<li> <a href="<?php echo base_url()?>login/logout">Logout</a> </li>
										</ul>
									</div>
								</div>
							</div>
						</div> 
						<?php
							}else{					
						?>
						<div class="col-sm-5 text-left text-sm-right width60">
							<div class="divided-content small-text greylinks color2 marri20">
								<div>
									<div class="dropdown"> 
										<a href="#0" id="account-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											My account<span class="caret"></span>
	                					</a>
										<ul class="dropdown-menu" aria-labelledby="account-dropdown">
											<li> <a href="<?php echo base_url()?>login">Sign In</a> </li>
											<li> <a href="<?php echo base_url()?>registration">Sign Up</a> </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<?php
							}				
						?>
					</div>
				</div>
			</section>
			
			<header class="page_header header_darkgrey header_transparent divided_items with_menu_icon">
				<div class="container">
					<div class="row">
						<div class="col-sm-12" style="z-index: 9999;">
							<nav class="mainmenu_wrapper">
								<ul class="mainmenu nav sf-menu">
									<li class=""> <a href="#">Services</a>
										<ul>
											<li> <a href="<?php echo base_url()?>services">Audio Production</a> </li>
											<li> <a href="<?php echo base_url()?>services">Video Production</a> </li>
											<li> <a href="<?php echo base_url()?>services">Photography</a> </li>
											
											<li> <a href="<?php echo base_url()?>services">Animation</a> </li>
											<li> <a href="<?php echo base_url()?>services">Launches, Distribution And Market Release</a> </li>
											<li> <a href="<?php echo base_url()?>services">Events And Talent Management​</a> </li>
										</ul>
									</li>
									<li class="active">
										<a  href="<?php echo site_url('meraganacontest') ?>">Mera Gana Contest</a>
									</li>
									<!-- <li><a class="active" href="<?php //echo site_url('userranking/contestList') ?>">Ranking</a></li>
									<li><a class="" href="<?php //echo site_url('votings/index') ?>">Voting</a></li> -->
									<!-- <li> <a href="#">About</a>
										<ul>
											<li> <a href="#">About Us</a> </li>
											<li> <a href="#">Career</a> </li>
											<li> <a href="#">Gallery</a> </li>
										</ul>
									</li> -->
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>

			