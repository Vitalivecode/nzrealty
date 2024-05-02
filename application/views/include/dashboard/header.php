<!doctype html>
<?php $socialImg = base_url('uploads/'.$site[0]->logo); $img = getimagesize($socialImg); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$site[0]->title;?>">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title><?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?></title>
    <meta name="theme-color" content="#1e1d85">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/fontawesome-pro-5/css/all.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/bootstrap-select/css/bootstrap-select.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/slick/slick.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/magnific-popup/magnific-popup.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/jquery-ui/jquery-ui.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/chartjs/Chart.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/dropzone/css/dropzone.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/animate.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/timepicker/bootstrap-timepicker.min.css');?>">
    <!--
    <link rel="stylesheet" href="<?=base_url('layout/vendors/mapbox-gl/mapbox-gl.min.css');?>">
    -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/dataTables/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/toast-master/css/jquery.toast.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/css/themes.css');?>">
    <link rel="stylesheet" href="<?=base_url('css/custom.css');?>">
    <link rel="stylesheet" href="<?=base_url('css/colors/rentail-listing.css');?>">
    <!-- Favicons -->
    <link rel="icon" href="<?=base_url('uploads/'.$site[0]->favicon);?>">
    <meta itemprop="name" content="<?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?>">
    <meta itemprop="description" content="<?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?>">
    <meta itemprop="image" content="<?=$socialImg;?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@<?=str_replace(' ','_',$site[0]->title);?>">
    <meta name="twitter:creator" content="@<?=str_replace(' ','_',$site[0]->title);?>">
    <meta name="twitter:title" content="<?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?>">
    <meta name="twitter:description" content="<?=$site[0]->title;?>">
    <meta name="twitter:image" content="<?=$socialImg;?>">
    <meta property="og:url" content="<?=str_replace('index.php/','',current_url());?>">
    <meta property="og:title" content="<?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?>">
    <meta property="og:description" content="<?=$site[0]->title;?>">
    <meta property="og:type" content="product">
    <meta property="og:image" content="<?=$socialImg;?>">
    <meta property="og:image:alt" content="<?=(isset($title))?$title:$site[0]->title;?>">
    <meta property="og:updated_time" content="<?=strtotime('2022-12-17');?>">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="<?=$img[0];?>">
    <meta property="og:image:height" content="<?=$img[1];?>">
    <script type="text/javascript">
        var base_url = "<?=base_url();?>";
        var currency = "<?=currency();?>";
        var logged = <?=($logged = $this->session->userdata('logged_in'))?1:0;?>;
        var lnglat = <?=json_encode(lnglat());?>;
        var lat = <?=lnglat()[1];?>;
        var lng = <?=lnglat()[0];?>;
    </script>
  </head>
  <body>
    <div class="wrapper dashboard-wrapper">
      <div class="d-flex flex-wrap flex-xl-nowrap">
        <div class="db-sidebar bg-white">
          <nav class="navbar navbar-expand-xl navbar-light d-block px-0 header-sticky dashboard-nav py-0">
            <div class="sticky-area shadow-xs-1 pt-3">
              <div class="d-flex px-3 px-xl-6 w-100">
                <a class="navbar-brand" href="<?=base_url('myaccount');?>">
                  <img src="<?=base_url('uploads/'.$site[0]->logo);?>" alt="<?=$site[0]->title;?>" width="202px" alt="HomeID">
                </a>
                <div class="ml-auto d-flex align-items-center ">
                  <div class="d-flex align-items-center d-xl-none">
                    <div class="dropdown px-3">
                      <a href="#" class="dropdown-toggle d-flex align-items-center text-heading" data-toggle="dropdown">
                        <div class="w-48px">
                          <img src="<?=profilepic((isset($logged['img']))?$logged['img']:'300x300.png');?>" alt="<?=ucwords($logged['name']);?>" class="rounded-circle">
                        </div>
                        <span class="fs-13 font-weight-500 d-none d-sm-inline ml-2">
                          <?=ucwords($logged['name']);?>
                        </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?=base_url('myaccount/profile');?>">My Profile</a>
                        <a class="dropdown-item" href="<?=base_url('login/logout');?>">Logout</a>
                      </div>
                    </div>
                    <div class="dropdown no-caret py-4 px-3 d-flex align-items-center notice mr-3">
                      <a href="#" class="dropdown-toggle text-heading fs-20 font-weight-500 lh-1" data-toggle="dropdown">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-primary badge-circle badge-absolute font-weight-bold fs-13">1</span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                      </div>
                    </div>
                  </div>
                  <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse"
                        data-target="#primaryMenuSidebar"
                        aria-controls="primaryMenuSidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
              </div>
              <div class="collapse navbar-collapse bg-white" id="primaryMenuSidebar">
                <ul class="list-group list-group-flush w-100">
                  <li class="list-group-item pt-6 pb-4">
                    <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Main</h5>
                    <ul class="list-group list-group-no-border rounded-lg">
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20"><i class="fal fa-cog"></i></span>
                          <span class="sidebar-item-text">Dashboard</span>
                        </a>
                      </li>
                      <?php if($logged['role'] == 'company'){ ?>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/add-agent');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20"><i class="fal fa-user-plus"></i></span>
                          <span class="sidebar-item-text">Add PM/Agent</span>
                        </a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/agents');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20"><i class="fal fa-users"></i></span>
                          <span class="sidebar-item-text">PMs & Agents</span>
                        </a>
                      </li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li class="list-group-item pt-6 pb-4">
                    <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Listings</h5>
                    <ul class="list-group list-group-no-border rounded-lg">
                      <?php if($logged['role'] == 'landlord' || $logged['role'] == 'agents'){ ?>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/add-property');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20 fs-20">
                            <svg class="icon icon-save-search"><use xlink:href="#icon-save-search"></use></svg>
                            </span>
                          <span class="sidebar-item-text">Add New Property</span>
                        </a>
                      </li> 
                      <?php } ?>
                      
                      <?php if($logged['role'] == 'landlord' || $logged['role'] == 'agents' || $logged['role'] == 'company'){ ?>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/properties');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                            <svg class="icon icon-add-new"><use xlink:href="#icon-add-new"></use></svg>
                          </span>
                          <span class="sidebar-item-text">My Properties</span>
                        </a>
                      </li>
                      <?php } ?>
                      
                      
                      <?php if($logged['role'] != 'company' && $logged['role'] != 'agents' && $logged['role'] != 'landlord'){ ?>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/favorites');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                            <svg class="icon icon-my-properties"><use xlink:href="#icon-my-properties"></use></svg>
                          </span>
                          <span class="sidebar-item-text">My Wishlist</span>
                        </a>
                      </li>
                      <?php } ?>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/schedules');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                              <i class="far fa-calendar"></i>
                          </span>
                          <span class="sidebar-item-text">Schedules</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item pt-6 pb-4">
                    <h5 class="fs-13 letter-spacing-087 text-muted mb-3 text-uppercase px-3">Manage Account</h5>
                    <ul class="list-group list-group-no-border rounded-lg">
                      <?php if($logged['role'] != 'user'){ ?>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/invoices');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                            <i class="fal fa-file-invoice"></i>
                          </span>
                          <span class="sidebar-item-text">Invoices</span>
                        </a>
                      </li>
                    <!--
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/package');?>" class="text-heading lh-1 sidebar-link d-flex align-items-center">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                            <svg class="icon icon-my-package"><use xlink:href="#icon-my-package"></use></svg>
                          </span>
                          <span class="sidebar-item-text">My Package</span>
                          <span class="sidebar-item-number ml-auto text-primary fs-15 font-weight-bold">5</span>
                        </a>
                      </li>
                    -->
                      <?php } ?>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('myaccount/profile');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                            <svg class="icon icon-my-profile"><use xlink:href="#icon-my-profile"></use></svg>
                          </span>
                          <span class="sidebar-item-text">My Profile</span>
                        </a>
                      </li>
                      <li class="list-group-item px-3 px-xl-4 py-2 sidebar-item">
                        <a href="<?=base_url('login/logout');?>" class="text-heading lh-1 sidebar-link">
                          <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
                            <svg class="icon icon-log-out"><use xlink:href="#icon-log-out"></use></svg>
                          </span>
                          <span class="sidebar-item-text">Log Out</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  
                <?php $me = me(); if(($logged['role'] != 'user') && ($me != false)){ ?>
                

                <div class="py-2 pl-3">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-2">
                            <a href="<?=(isset($me) && ($me != false) && ($me[0]->facebook != ''))?$me[0]->facebook:'javascript:void(0);';?>" <?=(isset($me) && ($me != false) && ($me[0]->facebook != ''))?'target="_blank"':'';?> class="w-40px h-40 rounded-circle bg-white text-body bg-hover-primary hover-white d-flex align-items-center justify-content-center">
                            <i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item mr-2">
                            <a href="<?=(isset($me) && ($me != false) && ($me[0]->instagram != ''))?$me[0]->instagram:'javascript:void(0);';?>" <?=(isset($me) && ($me != false) && ($me[0]->instagram != ''))?'target="_blank"':'';?> class="w-40px h-40 rounded-circle bg-white text-body bg-hover-primary hover-white d-flex align-items-center justify-content-center">
                            <i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item mr-2">
                            <a href="<?=(isset($me) && ($me != false) && ($me[0]->twitter != ''))?$me[0]->twitter:'javascript:void(0);';?>" <?=(isset($me) && ($me != false) && ($me[0]->twitter != ''))?'target="_blank"':'';?> class="w-40px h-40 rounded-circle bg-white text-body bg-hover-primary hover-white d-flex align-items-center justify-content-center">
                            <i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item mr-2">
                            <a href="<?=(isset($me) && ($me != false) && ($me[0]->linkedin != ''))?$me[0]->linkedin:'javascript:void(0);';?>" <?=(isset($me) && ($me != false) && ($me[0]->linkedin != ''))?'target="_blank"':'';?> class="w-40px h-40 rounded-circle bg-white text-body bg-hover-primary hover-white d-flex align-items-center justify-content-center">
                            <i class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>

                <?php } ?>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="page-content">
          <header class="main-header shadow-none shadow-lg-xs-1 bg-white position-relative d-none d-xl-block">
            <div class="container-fluid">
              <nav class="navbar navbar-light py-0 row no-gutters px-3 px-lg-0">
                <div class="col-md-4 px-0 px-md-6 order-1 order-md-0">
                    <a href="<?=base_url();?>" target="_blank" class="text-heading fs-20 font-weight-500 lh-1">
                        <span data-toggle="tooltip" data-placement="top" title="Goto Website"><i class="far fa-globe"></i></span>
                    </a>
                </div>
                <div class="col-md-6 d-flex flex-wrap justify-content-md-end order-0 order-md-1">
                  <div class="dropdown border-md-right border-0 py-3 text-right">
                    <a href="#"
                       class="dropdown-toggle text-heading pr-3 pr-sm-6 d-flex align-items-center justify-content-end"
                       data-toggle="dropdown">
                      <div class="mr-4 w-48px">
                        <img src="<?=profilepic((isset($logged['img']))?$logged['img']:'300x300.png');?>" alt="<?=ucwords($logged['name']);?>" class="rounded-circle w-48px h-48">
                      </div>
                      <div class="fs-13 font-weight-500 lh-1">
                        <?=ucwords($logged['name']);?>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right w-100">
                      <a class="dropdown-item" href="<?=base_url('myaccount/profile');?>">My Profile</a>
                      <a class="dropdown-item" href="<?=base_url('login/logout');?>">Logout</a>
                    </div>
                  </div>
            <!--
                  <div class="dropdown no-caret py-3 px-3 px-sm-6 d-flex align-items-center justify-content-end notice">
                    <a href="#" class="dropdown-toggle text-heading fs-20 font-weight-500 lh-1"
                       data-toggle="dropdown">
                      <i class="far fa-bell"></i>
                      <span class="badge badge-primary badge-circle badge-absolute font-weight-bold fs-13">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
            -->
                </div>
              </nav>
            </div>
          </header>