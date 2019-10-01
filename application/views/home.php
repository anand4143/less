

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
							<div class="bottom_overlap_logo"> <a href="<?php echo base_url();?>" class="logo">
	                    <img src="<?php echo base_url();?>assets/frontend/images/logo.png" alt="">
	                </a> </div>
							<!-- header toggler --><span class="toggle_menu"><span></span></span>
						</div>
						<div class="col-sm-5 col-sm-pull-2 hidden-xs"> 
							<span class="small-text rightpadding_20 hidden-sm">follow us:</span> 
							<span class="divided-content">
								<span>
									<a class="social-icon socicon-facebook" href="#" title="Facebook"></a>
								</span>
								<span><a class="social-icon socicon-twitter" href="#" title="Twitter"></a></span> 
								<span><a class="social-icon socicon-linkedin" href="#" title="linkedin"></a></span>
							</span>
						</div>
						<div class="col-sm-5 text-left text-sm-right">
							<div class="divided-content small-text greylinks color2">
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
					</div>
				</div>
			</section>
			
			<header class="page_header header_darkgrey header_transparent divided_items with_menu_icon">
				<div class="container">
					<div class="row">
						<div class="col-sm-12" style="z-index: 9999;">
							<nav class="mainmenu_wrapper">
								<ul class="mainmenu nav sf-menu">
								   
									<li class="active"> 
										<a href="#">Services</a>
										<ul>
											<li> <a href="<?php echo base_url()?>services">Audio Production</a> </li>
											<li> <a href="<?php echo base_url()?>services">Video Production</a> </li>
											<li> <a href="<?php echo base_url()?>services">Photography</a> </li>
											
											<li> <a href="<?php echo base_url()?>services">Animation</a> </li>
											<li> <a href="<?php echo base_url()?>services">Launches, Distribution And Market Release</a> </li>
											<li> <a href="<?php echo base_url()?>services">Events And Talent Management​</a> </li>
										</ul>
									</li>
									<li class=""> 
									<a class="nav-link" href="<?php echo site_url('meraganacontest') ?>">Mera Gana Contest</a>
									<!-- <a class="nav-link" href="<?php //echo site_url('userranking/contestList') ?>">Ranking</a> -->
									<!-- <li><a class="" href="<?php //echo site_url('votings/index') ?>">Voting</a></li> -->
										
									</li>
									
									<!-- <li> <a href="#">About</a>
										<ul>
											<li> <a href="#">About Us</a> </li>
											<li> <a href="#">Career</a> </li>
											<li> <a href="#">Gallery</a> </li>
										</ul>
									</li>
									<li class=""> <a href="<?php echo base_url('votings');?>">Voting111111111111</a></li> -->
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<section class="intro_section page_mainslider ds">
				<div class="flexslider" data-dots="true" data-nav="ture">
					<ul class="slides">
						<li>
						<video width="100%" height="100%" loop autoplay muted>
						  <source src="<?php echo base_url();?>assets/frontend/images/promotion-1-final.mp4" type="video/mp4">
						  <source src="<?php echo base_url();?>assets/frontend/images/promotion-1-final.ogg" type="video/ogg">
						Your browser does not support the video tag.
						</video>
						
							<div class="container">
								<div class="row">
									<div class="col-sm-12 text-center">
										<div class="slide_description_wrapper">
											<div class="slide_description">
												<div class="intro-layer" data-animation="fadeInUp">
													<p class="small-text bannertxt"> We Are No Super stars<br> We Are No Less<br>Either!</p>
												</div>
												<!-- <div class="intro-layer" data-animation="fadeInUp">
													<p class="topmargin_30">
														<a href="#0" class="theme_button inverse min_width_button bannerbtn" >
															Become A Lesssuperstar
														</a>
											</p>
												</div> -->
											</div>
											
										</div>
										
									</div>
									
								</div>
								
							</div>
							
						</li>
						
						
					</ul>
				</div>
				<!-- eof flexslider -->
			</section>
			<section id="about" class="ls section_padding_top_40 section_padding_bottom_40 table_section table_section_md columns_margin_bottom_30">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-md-push-5"> <img src="<?php echo base_url();?>assets/frontend/images/about.jpg" alt=""> </div>
						<div class="col-md-5 col-md-pull-7">
							<h2 class="section_header"> <span class="small">Mera Gaana</span> Contest </h2>
							<hr class="header_divider">
							<p> Smule Sing! In association with LessSuperstars has brought a once in a life time opportunity for you. Few simple steps to follow and you’re ready to sore high in the sky. Read more about the contest.</p>
							<div class="content-justify vertical-center content-margins topmargin_25"> <a href="<?php echo base_url('meraganacontest')?>" class="theme_button color min_width_button">CLICK HERE</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section id="players" class="ls">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="section_header">Our Services</h2>
							<hr class="header_divider">
							<div class="owl-carousel topmargin_80" data-responsive-lg="3" data-nav="true" data-dots="false">
								<div class="vertical-item content-absolute hover-entry-content">
									<div class="item-media"> <img src="<?php echo base_url();?>assets/frontend/images/team/01.jpg" alt=""> </div>
									<div class="item-content cs transp_gradient_bg">
										<h4 class="entry-title bottommargin_0"> <a href="team-single.html">Audio Production</a> </h4>
										<div class="entry-content">
											<div class="toppadding_20">
												<p class="content-3lines-ellipsis"> Ever thought of recording a cover version or thought of doing a Karaoke to impress someone? Are you a Singer / Song writer then you must have thought about recording your own </p>
												<p class="topmargin_30"> <a href="team-single.html" class="theme_button inverse min_width_button margin_0">CLICK HERE</a> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="vertical-item content-absolute hover-entry-content">
									<div class="item-media"> <img src="<?php echo base_url();?>assets/frontend/images/team/02.jpg" alt=""> </div>
									<div class="item-content cs transp_gradient_bg">
										<h4 class="entry-title bottommargin_0"> <a href="team-single.html">Video Production / Film making</a> </h4>
										
										<div class="entry-content">
											<div class="toppadding_20">
												<p class="content-3lines-ellipsis">Our services include creation of music videos for individual songs or complete album, shooting of commercial films, ads/commercials or documentary for your video production. With our expert industrial videographers and video editor</p>
												<p class="topmargin_30"> <a href="team-single.html" class="theme_button inverse min_width_button margin_0">CLICK HERE</a> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="vertical-item content-absolute hover-entry-content">
									<div class="item-media"> <img src="<?php echo base_url();?>assets/frontend/images/team/03.jpg" alt=""> </div>
									<div class="item-content cs transp_gradient_bg">
										<h4 class="entry-title bottommargin_0"> <a href="team-single.html">Photography</a> </h4>
										
										<div class="entry-content">
											<div class="toppadding_20">
												<p class="content-3lines-ellipsis">We have a team of professionals who will make sure that the output you get is nothing less than WOW. We specialize in concept based shoots, model portfolios, wedding shoots, cake...</p>
												<p class="topmargin_30"> <a href="team-single.html" class="theme_button inverse min_width_button margin_0">CLICK HERE</a> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="vertical-item content-absolute hover-entry-content">
									<div class="item-media"> <img src="<?php echo base_url();?>assets/frontend/images/team/04.jpg" alt=""> </div>
									<div class="item-content cs transp_gradient_bg">
										<h4 class="entry-title bottommargin_0"> <a href="team-single.html">Animation</a> </h4>
										
										<div class="entry-content">
											<div class="toppadding_20">
												<p class="content-3lines-ellipsis">Science, technology, progress: they bring us great boons. But often, the new is complex and unfamiliar – and very difficult to explain. That idea that might change the world can sometimes...</p>
												<p class="topmargin_30"> <a href="team-single.html" class="theme_button inverse min_width_button margin_0">CLICK HERE</a> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="vertical-item content-absolute hover-entry-content">
									<div class="item-media"> <img src="<?php echo base_url();?>assets/frontend/images/team/05.jpg" alt=""> </div>
									<div class="item-content cs transp_gradient_bg">
										<h4 class="entry-title bottommargin_0"> <a href="team-single.html">Launches, Distribution And Market Release-</a> </h4>
										
										<div class="entry-content">
											<div class="toppadding_20">
												<p class="content-3lines-ellipsis">We have different range of promotional packages for your album/video/film or any audio/video project. We have options of traditional media, which includes newspaper ...</p>
												<p class="topmargin_30"> <a href="team-single.html" class="theme_button inverse min_width_button margin_0">CLICK HERE</a> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="vertical-item content-absolute hover-entry-content">
									<div class="item-media"> <img src="<?php echo base_url();?>assets/frontend/images/team/06.jpg" alt=""> </div>
									<div class="item-content cs transp_gradient_bg">
										<h4 class="entry-title bottommargin_0"> <a href="team-single.html">Events And Talent Management</a> </h4>
										
										<div class="entry-content">
											<div class="toppadding_20">
												<p class="content-3lines-ellipsis">We host many talent hunt events and even gives opportunity to talents to register with us, to perform on events and shows. We hold regular auditions for singers, musicians and actors for different productions and event shows...</p>
												<p class="topmargin_30"> <a href="team-single.html" class="theme_button inverse min_width_button margin_0">CLICK HERE</a> </p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			
			<section id="news" class="ls section_padding_top_100 section_padding_bottom_100">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="section_header">How to Get Started</h2>
							<hr class="header_divider">
							<div class="owith_shadow_items text-left topmargin_60">
								<div class="row">
									<div class="col-lg-4">
										<article class="vertical-item content-padding with_shadow loop-color" style="padding-top: 30px;">
										<div class="item-ico">
										<i class="fa fa-phone"></i>
										</div>
											<div class="item-content text-center">
												<header class="entry-header">
													<h4 class="entry-title">Talk to Us</h4>
												</header>
												<div class="entry-content">
													<p>Just email us or call us- we’ll listen to you share your thoughts an propose a way forward.</p>
												</div>
											</div>
										</article>
									</div>
									
									<div class="col-lg-4">
										<article class="vertical-item content-padding with_shadow loop-color" style="padding-top: 30px;">
										<div class="item-ico">
										<i class="fa fa-coffee"></i>
										</div>
											<div class="item-content text-center">
												<header class="entry-header">
													<h4 class="entry-title">Let’s sit, Make a plan</h4>
												</header>
												<div class="entry-content">
													<p>we’ll sit on a tea/ coffee, make a plan, you give Us the go ahead and well plan everything for you.</p>
												</div>
											</div>
										</article>
									</div>
									
									<div class="col-lg-4">
										<article class="vertical-item content-padding with_shadow loop-color" style="padding-top: 30px;">
										<div class="item-ico">
										<i class="fa fa-gear"></i>
										</div>
											<div class="item-content text-center">
												<header class="entry-header">
													<h4 class="entry-title">We’ll Create and Deliver</h4>
												</header>
												<div class="entry-content">
													<p>We’ll produce, shoot ,edit everything. All delivered ready to launch.</p>
												</div>
											</div>
										</article>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			
			<section id="subscribe" class="ds parallax section_padding_top_100 section_padding_bottom_100">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-8 col-sm-10 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-center">
							<h2 class="section_header">Want To Learn About Film and Media ?</h2>
							<button type="submit" class="theme_button color min_width_button" style="font-size: 24px;">Get Started</button>
						</div>
					</div>
				</div>
			</section>
			
			<section id="testimonila" class="ls section_padding_top_50 section_padding_bottom_100">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="section_header">How to Get Started</h2>
							<hr class="header_divider">
							
							<div class="owl-carousel topmargin_80 with_shadow_items" data-responsive-lg="2" data-nav="true" data-dots="false" auto-play="true" style="overflow: inherit;">
								<article class="vertical-item content-padding with_shadow loop-color  bottompadding_30">
								<div class="userimg"><img src="<?php echo base_url();?>assets/frontend/images/user.png"/></div>
								<div class="toppadding_60"> LessSuperstars created an amazing documentary on Indian Railway. Incredible project. Lost for words.</div>
								
								<h6 class="bottommargin_0">Alok Mishra</h6>
								<i>IRSS, Railway Department</i>
								
									</article>
									
									<article class="vertical-item content-padding with_shadow loop-color  bottompadding_30">
								<div class="userimg"><img src="<?php echo base_url();?>assets/frontend/images/user.png"/></div>
								<div class="toppadding_60"> LessSuperstars created an amazing documentary on Indian Railway. Incredible project. Lost for words.</div>
								
								<h6 class="bottommargin_0">Alok Mishra</h6>
								<i>IRSS, Railway Department</i>
								
									</article>
							</div>
						</div>
						</div>
						</div>
						</section>
						
						
						
						
						<section id="trusted" class="ls section_padding_bottom_100">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">	
						
							<h2 class="section_header">Trusted by</h2>
							<hr class="header_divider">
																		
							<div class="owl-carousel topmargin_80" data-responsive-lg="5" data-nav="true" data-dots="false" auto-play="true" style="overflow: inherit;">
								<div class="item">
								<div class="trustedlogos"><img src="<?php echo base_url();?>assets/frontend/images/l1.jpg"/></div>
								</div>
								<div class="item"><div class="trustedlogos"><img src="<?php echo base_url();?>assets/frontend/images/l2.jpg"/></div></div>
								<div class="item"><div class="trustedlogos"><img src="<?php echo base_url();?>assets/frontend/images/l3.jpg"/></div></div>
								<div class="item"><div class="trustedlogos"><img src="<?php echo base_url();?>assets/frontend/images/l4.jpg"/></div></div>
								<div class="item"><div class="trustedlogos"><img src="<?php echo base_url();?>assets/frontend/images/l5.jpg"/></div></div>
									
							</div>
						</div>
						</div>
						</div>
						</section>

<?php  //include('templates/frontend/footer.php'); ?>


<footer class="page_footer ds gradient_bg section_padding_bottom_75">
				<div class="container">
				<h4 class="widget-title text-center toppadding_50"> Our Branches </h4>
				<div class="">
				<div class="row">
					<div class="col-md-3">
						<address class="branches">
							LessSuperstars Khasra No.6, RohillaPur, Sector 132, Noida-201301 Uttar Pradesh
						</address>
					</div>
					<div class="col-md-3">
						<address class="branches">
							A 51, Abul Fazal Enclave, Jamia Nagar, Okhla, New Delhi 110025
						</address>
					</div>
					<div class="col-md-3">
						<address class="branches">
							SS- 1888,1889, LDA Sec H, Aashiyana circle, Aashiyana, Lucknow
						</address>
					</div>
					<div class="col-md-3">
						<address class="branches">
							A-22, Wild Wood Park II, Off yari road, Versova, Andheri (West) Mumbai- 400061 Maharashtra
						</address>
					</div>
				</div>
				</div>
					
					<div class="row">
						<div class="col-md-4 text-center">
							<div class="widget widget_text">
								<h4 class="widget-title"> Discover </h4>
								<ul class="whitelinks list-unstyled">
								<li> <a href="<?php echo base_url()?>feedback">Feedback</a> </li>
									<li> <a href="<?php echo base_url()?>services">Gallery</a> </li>
									<li> <a href="<?php echo base_url()?>services">About</a> </li>
									<li> <a href="<?php echo base_url()?>services">Enquiry</a> </li>
									<li> <a href="<?php echo base_url()?>services">Career</a> </li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="widget widget_text">
								<h4 class="widget-title"> Connect With Us </h4>
								
								<div class="big-icons topmargin_25">
									<a href="#" class="social-icon border-icon socicon-facebook"></a>
									<a href="#" class="social-icon border-icon socicon-twitter"></a>
									<a href="#" class="social-icon border-icon socicon-linkedin"></a>
									
								</div>
								<a href="mailto:lesssuperstar2019@gmail.com">lesssuperstar2019@gmail.com</a>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="widget widget_text">
								<h4 class="widget-title"> </h4>
								<ul class="list-unstyled whitetext" style="color: #fff;">
									<li> Copyright 2019. lesssuperstars</li>
									<li>All Rights Reserved.</li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->
    <script src="<?php echo base_url();?>assets/js/frontend/compressed.js"></script>
    <script src="<?php echo base_url();?>assets/js/frontend/main.js"></script>
	<!-- <script src="js/compressed.js"></script> -->
	<!-- <script src="js/main.js"></script> -->
	<!-- Google Map Script -->
	<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwYSMRGuTsmfl2z_zZDStYqMlKtrybxo"></script> -->
</body>
</html>