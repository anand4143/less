<?php  $this->view('templates/frontend/header.php');?>
<section class="page_breadcrumbs cs gradient section_padding_top_25 section_padding_bottom_25 table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<h2 class="small">User Profile</h2>
						</div>
						<div class="col-md-6 text-center text-md-right">
							<ol class="breadcrumb">
								<li> <a href="index.html">Home</a> </li>
								<li> <a href="#">User Profile</a> </li>
								
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
					<div class="col-sm-6">First Name : 
                        <?php //echo "<pre>";print_r($user );
                        echo $user->firstName
                        ?>
					</div>
					
					<div class="col-sm-6">Last Name : 
						<?php echo $user->lastName?>
					</div>
					
					<div class="col-sm-6">Email : 
                    <?php echo $user->email?>
					</div>
					
					<div class="col-sm-6">
						asdfsdfasd asdf asdfasdfasdfsadf
					</div>
					
				</div>
				</div>
			</section>
<?php  $this->view('templates/frontend/footer.php');?>