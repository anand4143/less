<!DOCTYPE html>
<html class="no-js">
<head>
	<title>Lesssuperstare</title>
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
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>
	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">
		<!-- template sections -->
		<section class="page_toplogo with_bottom_overlap_logo ls with_top_color_border columns_padding_0">
				<div class="container">
					<div class="row flex-wrap v-center" style="padding-top: 10px;">
						<div class="col-sm-2 col-sm-push-5 text-left text-sm-center">
							<div class="bottom_overlap_logo"> <a href="index.html" class="logo">
	                    <img src="<?php echo base_url();?>assets/frontend/images/logo.png" alt="">
	                </a> </div>
							<!-- header toggler --><span class="toggle_menu"><span></span></span>
						</div>
						<div class="col-sm-5 col-sm-pull-2 hidden-xs"> <span class="small-text rightpadding_20 hidden-sm">follow us:</span> <span class="divided-content">
					<span><a class="social-icon socicon-facebook" href="#" title="Facebook"></a></span> <span><a class="social-icon socicon-twitter" href="#" title="Twitter"></a></span> <span><a class="social-icon socicon-linkedin" href="#" title="linkedin"></a></span>							 </span>
						</div>
						<div class="col-sm-5 text-left text-sm-right">
							<div class="divided-content small-text greylinks color2">
								<div>
									<div class="dropdown">
									<?php 
										if(isset($sessionData)){
									?> 
										<a href="#0" id="account-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											My account<span class="caret"></span>
	                					</a>
									<?php }else{ ?>
										<a href="#0" id="account-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Running Contests
	                					</a>
										<a href="#0" id="account-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											SIGN IN / SIGN UP<span class="caret"></span>
	                					</a>
									<?php 
										}
									?>
										<ul class="dropdown-menu" aria-labelledby="account-dropdown">
										<?php 
										
											if(isset($sessionData)){
												if($sessionData['userId']){
										?>
											<li> <a href="<?php echo base_url()?>user/profile">Profile</a> </li>
											<li> <a href="<?php echo base_url()?>/login/logout">Logout</a> </li>
										<?php
											}else{
										?>
											<li> <a href="<?php echo base_url()?>login">SignIn</a> </li>
											<li> <a href="<?php echo base_url()?>/login/signUp">SignUp</a> </li>
										<?php
											}
										}else{
											?>
											<li> <a href="<?php echo base_url()?>login">SignIn</a> </li>
											<li> <a href="<?php echo base_url()?>/login/signUp">SignUp</a> </li>
										<?php 
										}
										?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<header class="page_header header_darkgrey header_transparent divided_items with_menu_icon">
				<div class="container">
					<div class="row">
						<div class="col-sm-12" style="z-index: 9999;">
							<nav class="mainmenu_wrapper">
								<ul class="mainmenu nav sf-menu">
									<li class="active"> <a href="index-2.html">Services</a>
										<ul>
											<li> <a href="#">Audio Production</a> </li>
											<li> <a href="#">Video Production</a> </li>
											<li> <a href="#">Photography</a> </li>
											
											<li> <a href="#">Animation</a> </li>
											<li> <a href="#">Launches, Distribution And Market Release</a> </li>
											<li> <a href="#">Events And Talent Management​</a> </li>
										</ul>
									</li>
									
									<li> <a href="index-2.html">About</a>
										<ul>
											<li> <a href="#">About Us</a> </li>
											<li> <a href="#">Career</a> </li>
											<li> <a href="#">Gallery</a> </li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>

			<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Signin</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="index.html">Home</a> </li>
								<li> <a href="#">Home</a> </li>
								<li class="active">Signin</li>
							</ol>
						</div>
					</div>
				</div>
			</section>