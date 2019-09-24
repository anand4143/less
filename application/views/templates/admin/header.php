<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Dashboard</title>
    <meta name="description" content="Less superstar" />
    <!-- <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="icon" href="favicon.ico" type="image/x-icon">-->

    <!-- <link href="vendors/morris.js/morris.css" rel="stylesheet" type="text/css" /> -->
    <?= link_tag('assets/vendors/morris.js/morris.css'); ?>
    <!-- <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css"> -->
    <?= link_tag('assets/vendors/jquery-toggles/css/toggles.css'); ?>
    <!-- <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css"> -->
    <?= link_tag('assets/vendors/jquery-toggles/css/themes/toggles-light.css'); ?>
	
	<!-- Toastr CSS -->
    <!-- <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css"> -->
    <?= link_tag('assets/vendors/jquery-toast-plugin/dist/jquery.toast.min.css'); ?>

    <!-- Custom CSS -->
    <!-- <link href="dist/css/style.css" rel="stylesheet" type="text/css"> -->
    <?= link_tag('assets/dist/css/style.css'); ?>
    <?= link_tag('assets/css/main.css'); ?>
</head>
<!-- Preloader -->
<div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
	
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-horizontal-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="javascript:void(0);">
                <!-- <img class="brand-img d-inline-block" src="<?php echo base_url();?>assets/dist/img/logo-dark.png" alt="brand" /> -->
                Less Superstar
            </a>
            <ul class="navbar-nav hk-navbar-content">
                <!-- <li class="nav-item">
                    <a id="navbar_search_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="search"></i></span></a>
                </li>
                <li class="nav-item">
                    <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="settings"></i></span></a>
                </li> -->
                <!-- <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge-wrap"><span class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View all</a></h6>
                        <div class="notifications-nicescroll-bar">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src="<?php //echo base_url();?>assets/dist/img/avatar1.jpg" alt="user" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">Anand</span> accepted your invitation to join the team</div>
                                            <div class="notifications-time">12m</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src="<?php //echo base_url();?>assets/dist/img/avatar2.jpg" alt="user" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">New message received from <span class="text-dark text-capitalize">Misuko Heid</span></div>
                                            <div class="notifications-time">1h</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-primary rounded-circle">
													<span class="initial-wrap"><span><i class="zmdi zmdi-account font-18"></i></span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">You have a follow up with<span class="text-dark text-capitalize"> Mintos head</span> on <span class="text-dark text-capitalize">friday, dec 19</span> at <span class="text-dark">10.00 am</span></div>
                                            <div class="notifications-time">2d</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-success rounded-circle">
													<span class="initial-wrap"><span>A</span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">Application of <span class="text-dark text-capitalize">Sarah Williams</span> is waiting for your approval</div>
                                            <div class="notifications-time">1w</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-warning rounded-circle">
													<span class="initial-wrap"><span><i class="zmdi zmdi-notifications font-18"></i></span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">Last 2 days left for the project</div>
                                            <div class="notifications-time">15d</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li> -->
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="<?php echo base_url();?>assets/dist/img/avatar12.jpg" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>Hello <?php echo $this->session->userdata('firstName');?><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-card"></i><span>My balance</span></a>
                        <a class="dropdown-item" href="inbox.html"><i class="dropdown-icon zmdi zmdi-email"></i><span>Inbox</span></a>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Settings</span></a>
                        <div class="dropdown-divider"></div>
                        <div class="sub-dropdown-menu show-on-hover">
                            <a href="#" class="dropdown-toggle dropdown-item no-caret"><i class="zmdi zmdi-check text-success"></i>Online</a>
                            <div class="dropdown-menu open-left-side">
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-check text-success"></i><span>Online</span></a>
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-circle-o text-warning"></i><span>Busy</span></a>
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span>Offline</span></a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('admin/login/logout') ?>">
                        <i class="dropdown-icon zmdi zmdi-power"></i>
                            <span>Log out</span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>


         <!--Horizontal Nav-->
         <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#dash_drp">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                            <ul id="dash_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/user'); ?>">Users</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="<?php echo site_url('admin/judge'); ?>">Judge</a>
                                        </li>										
                                        <li class="nav-item active">
                                            <a class="nav-link" href="<?php echo base_url('admin/contests'); ?>">Contests</a>
                                        </li>										
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-with-indicator" href="<?php echo site_url('admin/user'); ?>" data-toggle="collapse" data-target="#app_drp">
                                <span class="feather-icon"><span class="badge badge-primary badge-indicator badge-indicator-sm badge-pill"></span><i data-feather="package"></i></span>
                                <span class="nav-link-text">Users</span>
                            </a>
                            <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/user'); ?>">User List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/judge/'); ?>">Judge List</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/user/assignUserToJudges'); ?>">Assign Users To Judges</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/judge/assignJudgeToContest'); ?>">Assign Judge To Contest</a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/user_contests/'); ?>">Users Contest Level Move</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('admin/contests') ?>" data-toggle="collapse" data-target="#pages_drp">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Manage Contests</span>
                            </a>
                            <ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/contests') ?>">Contests List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/contests/add') ?>">Create Contest</a>
                                        </li>                                       
                                    </ul>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('admin/contests') ?>" data-toggle="collapse" data-target="#pages_drp">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Manage Contests Level</span>
                            </a>
                            
							<ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/levels') ?>">Contests Level List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/levels/add') ?>">Create Contest Level</a>
                                        </li>                                       
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('admin/contests') ?>" data-toggle="collapse" data-target="#pages_drp">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">User Ranking</span>
                            </a>
                            
							<ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/userranking') ?>">User Score</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/userranking/contestList') ?>">User Ranking</a>
                                        </li>                                      
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('admin/contests') ?>" data-toggle="collapse" data-target="#pages_drp">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Manage Pages</span>
                            </a>
                            
							<ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/adminMeraganaContest') ?>">Mera gana page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('admin/userranking/contestList') ?>">Contest page</a>
                                        </li>                                      
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="documentation.html" >
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Documentation</span>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link link-with-badge" href="#">
                                <span class="feather-icon"><i data-feather="eye"></i></span>
                                <span class="nav-link-text">Changelog</span>
                                <span class="badge badge-success badge-sm badge-pill">v 1.0</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!--/Horizontal Nav-->

<!-- Main Content -->
  <div class="hk-pg-wrapper">
			<!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
     
           