<!DOCTYPE html >
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities."/>
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app"/>
    <meta name="author" content="pixelstrap"/>
    <title>Admiro - Premium Admin Template</title>
    <!-- Favicon icon-->
    <link rel="icon" href="<?= base_url();?>/assets/images/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?= base_url();?>/assets/images/favicon.png" type="image/x-icon"/>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet"/>
    <!-- Flag icon css -->
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/vendors/flag-icon.css"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/iconly-icon.css"/>
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/bulk-style.css"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/themify.css"/>
    <!--fontawesome-->
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/fontawesome-min.css"/>
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/vendors/weather-icons/weather-icons.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/vendors/scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/vendors/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/vendors/slick-theme.css"/>
    <!-- App css -->
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/style.css"/>
    <link id="color" rel="stylesheet" href="<?= base_url();?>/assets/css/color-1.css" media="screen"/>
  </head>
  <body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
      <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper"> 
      <header class="page-header row">
        <div class="logo-wrapper d-flex align-items-center col-auto">
            <a href="<?= base_url();?>">
                <img class="light-logo" src="<?= base_url();?>/assets/images/logowhite.png" alt="logo" width="100%" height="50px"/>
                <img class="dark-logo" src="<?= base_url();?>/assets/images/logo-1.png" alt="logo"  width="90%" height="45px"/>
            </a><a class="close-btn toggle-sidebar" href="javascript:void(0)">
            <svg class="svg-color">
              <use href="<?= base_url();?>/assets/svg/iconly-sprite.svg#Category"></use>
            </svg></a></div>
        <div class="page-main-header col">
          <div class="header-left">
            <!-- Bagian pencarian dihapus -->
          </div>
          <div class="nav-right">
            <ul class="header-right"> 
              <li class="search d-lg-none d-flex"> <a href="javascript:void(0)">
                  <svg>
                    <use href="<?= base_url();?>/assets/svg/iconly-sprite.svg#Search"></use>
                  </svg></a></li>
              <li>  <a class="dark-mode" href="javascript:void(0)">
                  <svg>
                    <use href="<?= base_url();?>/assets/svg/iconly-sprite.svg#moondark"></use>
                  </svg></a></li>
              
              <li><a class="full-screen" href="javascript:void(0)"> 
                  <svg>
                    <use href="<?= base_url();?>/assets/svg/iconly-sprite.svg#scanfull"></use>
                  </svg></a></li>
              <li class="profile-nav custom-dropdown">
                <div class="user-wrap">
                  <div class="user-img"><img src="<?= base_url();?>/assets/images/profile.png" alt="user"/></div>
                  <div class="user-content">
                    <h6>Firman Raiwan</h6>
                    <p class="mb-0">Admin<i class="fa-solid fa-chevron-down"></i></p>
                  </div>
                </div>
                <div class="custom-menu overflow-hidden">
                  <ul class="profile-body">
                    <li class="d-flex"> 
                      <svg class="svg-color">
                        <use href="<?= base_url();?>/assets/svg/iconly-sprite.svg#Profile"></use>
                      </svg><a class="ms-2" href="user-profile.html">Account</a>
                    </li>
                    <li class="d-flex"> 
                      <svg class="svg-color">
                        <use href="<?= base_url();?>/assets/svg/iconly-sprite.svg#Login"></use>
                      </svg><a class="ms-2" href="login.html">Log Out</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </header>
      <!-- Page Body Start-->
      <div class="page-body-wrapper"> 
        <!-- Page sidebar start-->
        <aside class="page-sidebar"> 
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
          <div class="main-sidebar" id="main-sidebar">
            <ul class="sidebar-menu" id="simple-bar">
              <li class="pin-title sidebar-main-title">  
                <div> 
                  <h5 class="sidebar-title f-w-700">Pinned</h5>
                </div>
              </li>
              <li class="sidebar-list"> 
                <a class="sidebar-link" href="<?= base_url();?>admin/dashboard">
                    <i class="icon-home fa-lg"> </i>
                    <h6 class="f-w-600">Dashboard  </h6>
                </a>
              </li>
              <li class="sidebar-list"> 
                <i class="fa-solid fa-thumbtack"></i>
                <a class="sidebar-link" href="javascript:void(0)">
                  <i class="icon-user fa-lg"> </i>
                  <h6 class="f-w-600">Users  </h6><i class="iconly-Arrow-Right-2 icli"></i></a>
                <ul class="sidebar-submenu">
                  <li> <a href="general-widget.html">Publisher</a></li>
                  <li><a href="chart-widget.html">Advertiser</a></li>
                </ul>
              </li>
              <li class="sidebar-list"> 
                <i class="fa-solid fa-thumbtack"></i>
                <a class="sidebar-link" href="javascript:void(0)">
                <i class="icon-world fa-lg"> </i>
                  <h6 class="f-w-600">Websites  </h6><i class="iconly-Arrow-Right-2 icli"></i></a>
                <ul class="sidebar-submenu">
                  <li> <a href="general-widget.html">List</a></li>
                  <li><a href="chart-widget.html">Keywords</a></li>
                </ul>
              </li>
              <li class="sidebar-list"> 
                <a class="sidebar-link" href="<?= base_url();?>admin/withdrawals">
                    <i class="icon-announcement fa-lg"> </i>
                    <h6 class="f-w-600">Campaigns  </h6>
                </a>
              </li>
              <li class="sidebar-list"> 
                <a class="sidebar-link" href="<?= base_url();?>admin/withdrawals">
                    <i class="icon-wallet fa-lg"> </i>
                    <h6 class="f-w-600">Withdrawals  </h6>
                </a>
              </li>
              <li class="sidebar-list"> 
                <a class="sidebar-link" href="<?= base_url();?>admin/withdrawals">
                    <i class="icon-credit-card fa-lg"> </i>
                    <h6 class="f-w-600">Deposits  </h6>
                </a>
              </li>
              <li class="sidebar-list"> 
                <a class="sidebar-link" href="#<?= base_url();?>admin/dashboard">
                    <i class="icon-pie-chart fa-lg"> </i>
                    <h6 class="f-w-600">Reports  </h6>
                </a>
              </li>
              <li class="sidebar-list"> 
                <a class="sidebar-link" href="#<?= base_url();?>admin/dashboard">
                <i class="icon-file fa-lg"> </i>
                <h6 class="f-w-600">Pages  </h6>
                </a>
              </li>
              <li class="sidebar-list"> 
                <a class="sidebar-link" href="#<?= base_url();?>admin/dashboard">
                <i class="icon-headphone-alt fa-lg"> </i>
                <h6 class="f-w-600">Support Ticket  </h6>
                </a>
              </li>
              <li class="sidebar-list"> 
                <i class="fa-solid fa-thumbtack"></i>
                <a class="sidebar-link" href="javascript:void(0)">
                <i class="icon-settings fa-lg"> </i>
                <h6 class="f-w-600">Settings  </h6><i class="iconly-Arrow-Right-2 icli"></i></a>
                <ul class="sidebar-submenu">
                  <li> <a href="general-widget.html">General</a></li>
                  <li><a href="chart-widget.html">Payment</a></li>
                  <li><a href="chart-widget.html">Winthdrawal</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </aside>
        <!-- Page sidebar end-->
        <div class="page-body">
