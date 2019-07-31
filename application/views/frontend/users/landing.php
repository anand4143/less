<?php  $this->view('templates/frontend/header.php');?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">Dashboard</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="index.html">Home</a> </li>
								<li> <a href="#">Dashboard</a> </li>
								
							</ol>
						</div>
					</div>
				</div>
			</section>
<!-- <div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
        <div class="panel-body text-cente">Previous Contests</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
        <div class="panel-body text-cente">Current Contest</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body text-cente">Contests List</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body text-cente"><a href="<?php  base_url();?>/user/profile">Profile</div>
        </div>
    </div>
</div> -->

<section class="dashboardcontainer">
				<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="dashboardboxes apsc-facebook-icon">
						<a href="#">
						<i class="fa fa-users"></i>
							Users Previous Contest
						</a>
					</div>
					</div>
					
					<div class="col-sm-6">
						<div class="dashboardboxes apsc-twitter-icon">
						<a href="#">
						<i class="fa fa-user"></i>
						User Contest
						</a>
					</div>
					</div>
					
					<div class="col-sm-6">
						<div class="dashboardboxes apsc-google-plus-icon">
						<a href="#">
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