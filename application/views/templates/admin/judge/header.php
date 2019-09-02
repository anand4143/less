<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Dashboard</title>
    <meta name="description" content="Less superstar" />
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <?= link_tag('assets/vendors/morris.js/morris.css'); ?>
    <?= link_tag('assets/vendors/jquery-toggles/css/toggles.css'); ?>
    <?= link_tag('assets/vendors/jquery-toggles/css/themes/toggles-light.css'); ?>
    <?= link_tag('assets/vendors/jquery-toast-plugin/dist/jquery.toast.min.css'); ?>
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
            <!-- <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a> -->
            <a class="navbar-brand" href="javascript:void(0);">
                <!-- <img class="brand-img d-inline-block" src="<?php echo base_url();?>assets/dist/img/logo-dark.png" alt="brand" /> -->
                Less Superstar
            </a>
            <ul class="navbar-nav hk-navbar-content">
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
         <!-- <nav class="hk-nav hk-nav-light">
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
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav> -->
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!--/Horizontal Nav-->

<!-- Main Content -->
  <div class="hk-pg-wrapper">
			<!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
     
           