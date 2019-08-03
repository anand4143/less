<?php  $this->view('templates/frontend/header.php');?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Dashboard</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="<?php echo base_url();?>">Home</a> </li>
								<li> <a href="<?php echo base_url('user/landing');?>">Dashboard</a> </li>
								
							</ol>
						</div>
					</div>
				</div>
			</section>

			<section class="dashboardcontainer">
				<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="dashboardboxes apsc-facebook-icon">
						<a href="#">
						<i class="fa fa-users"></i>
							Previous Contest
						</a>
					</div>
					</div>
					
					<div class="col-sm-6">
						<div class="dashboardboxes apsc-twitter-icon">
						<a href="<?php echo base_url('contests/current_contests');?>">
						<i class="fa fa-user"></i>
						Current Contest
						</a>
					</div>
					</div>
					
					<div class="col-sm-6">
						<div class="dashboardboxes apsc-google-plus-icon">
						<a href="<?php echo base_url('contests/upcoming_contests');?>">
						<i class="fa fa-level-up"></i>
						All Coming Contest
							</a>
					</div>
					</div>
					
					<div class="col-sm-6">
						<div class="dashboardboxes apsc-instagram-icon">
						<a href="<?php  base_url();?>/user/profile">
						<i class="fa fa-user"></i>
						User Profile
							</a>
					</div>
					</div>
					
				</div>
				</div>
			</section>
<?php  $this->view('templates/frontend/footer.php');?>