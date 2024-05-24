<!doctype html>
<?php $socialImg = (isset($gallery) && $gallery != false)?base_url('uploads/'.$gallery['thumbnail'][0]):base_url('uploads/'.$site[0]->logo); $img = getimagesize($socialImg); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=(isset($properties) && $properties != false)?$properties[0]->description:$site[0]->title;?>">
    <meta name="author" content="ps4works_in">
    <meta name="generator" content="">
    <title><?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?></title>
    <meta name="theme-color" content="#1e1d85">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/fontawesome-pro-5/css/all.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/bootstrap-select/css/bootstrap-select.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/fontawesome-pro-5/css/all.css');?>">
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
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" type="text/css">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/dataTables/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/vendors/toast-master/css/jquery.toast.css');?>">
    <link rel="stylesheet" href="<?=base_url('layout/css/themes.css');?>">
    <link rel="stylesheet" href="<?=base_url('css/custom.css');?>">
    <link rel="stylesheet" href="<?=base_url('css/colors/rentail-listing.css');?>">
    <link rel="icon" href="<?=base_url('uploads/'.$site[0]->favicon);?>">
    <meta itemprop="name" content="<?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?>">
    <meta itemprop="description" content="<?=(isset($properties) && $properties != false)?$properties[0]->description:$site[0]->title;?>">
    <meta itemprop="image" content="<?=$socialImg;?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@<?=str_replace(' ','_',$site[0]->title);?>">
    <meta name="twitter:creator" content="@ps4works_in">
    <meta name="twitter:title" content="<?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?>">
    <meta name="twitter:description" content="<?=(isset($properties) && $properties != false)?$properties[0]->description:$site[0]->title;?>">
    <meta name="twitter:image" content="<?=$socialImg;?>">
    <meta property="og:url" content="<?=str_replace('index.php/','',current_url());?>">
    <meta property="og:title" content="<?=(isset($title))?$title.' | ':'';?><?=$site[0]->title;?>">
    <meta property="og:description" content="<?=(isset($properties) && $properties != false)?$properties[0]->description:$site[0]->title;?>">
    <meta property="og:type" content="product">
    <meta property="og:image" content="<?=$socialImg;?>">
    <meta property="og:image:alt" content="<?=(isset($title))?$title:$site[0]->title;?>">
    <meta property="og:updated_time" content="<?=(isset($properties) && $properties != false)?strtotime($properties[0]->created_date):strtotime('2022-12-17');?>">
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
    <header class="main-header navbar-light header-sticky header-sticky-smart header-mobile-lg">
      <div class="sticky-area">
        <div class="container container-xxl">
          <div class="d-flex align-items-center">
            <nav class="navbar navbar-expand-xl bg-transparent px-0 w-100 w-xl-auto">
              <a class="navbar-brand mr-8" href="<?=base_url();?>">
                <img src="<?=base_url('uploads/'.$site[0]->logo);?>" alt="<?=$site[0]->title;?>" width="180px" class="normal-logo">
                <img src="<?=base_url('uploads/'.$site[0]->logo);?>" alt="<?=$site[0]->title;?>" width="180px" class="sticky-logo">
              </a>
              <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } else{ ?>
              <a class="d-block d-xl-none ml-auto mr-4 position-relative text-primary p-2" href="<?=($logged)?base_url('myaccount/favorites'):'#';?>">
                <i class="fal fa-heart fs-large-4"></i>
                <?php if($logged){ $favorite = get('wishlist', array('role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)); ?>
                <span id="favorite" class="favorite badge badge-primary badge-circle badge-absolute"><?=($favorite != false)?count($favorite):'';?></span>
                <?php } ?>
              </a>
              <?php } ?>
              <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse" data-target="#primaryMenu02" aria-controls="primaryMenu02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="text-primary fs-24"><i class="fal fa-bars"></i></span>
              </button>
              <div class="collapse navbar-collapse mt-3 mt-xl-0" id="primaryMenu02">
                <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                  <li id="navbar-item-home" class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                    <a class="nav-link p-0" href="<?=base_url();?>">Home</a>
                  </li>
                  <li id="navbar-item-home" class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                    <a class="nav-link p-0" href="<?=base_url('properties?type=residential');?>">Residentials</a>
                  </li>
                  <li id="navbar-item-home" class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                    <a class="nav-link p-0" href="<?=base_url('properties?type=commercial');?>">Commercials</a>
                  </li>
                  <li id="navbar-item-home" class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                    <a class="nav-link p-0" href="<?=base_url('agencies');?>">Companies</a>
                  </li>
                  <li id="navbar-item-home" class="nav-item py-2 py-xl-5 px-0 px-xl-4">
                    <a class="nav-link p-0" href="<?=base_url('agents');?>">PMs & Agents</a>
                  </li>
                </ul>
                <div class="d-block d-xl-none">
                  <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                    <li class="nav-item ">
                        <?php if($logged){ $role = $logged['role']; ?>
                            <a class="nav-link pr-2" href="<?=($role == 'superadmin' || $role == 'admin' || $role == 'manager')?admin_url('home'):base_url('myaccount');?>">My Account</a>
                        <?php } else{ ?>
                            <a class="nav-link pr-2" data-toggle="modal" href="#user-register-modal">Login</a>
                        <?php } ?>
                    </li>
                    <?php if($logged && ($role = $logged['role'])){ if($role != 'user' && $role != 'company'){ ?>
                    <li class="nav-item ml-auto w-100 w-sm-auto">
                      <a class="btn btn-primary btn-lg" <?=($logged)?'href="'.base_url('myaccount/add-property').'"':'data-toggle="modal" href="#login-register-modal"';?>>
                        Add Listing
                      </a>
                    </li>
                    <?php } } else{ ?>
                    <li class="nav-item ml-auto w-100 w-sm-auto">
                      <a class="btn btn-primary btn-lg" <?=($logged)?'href="'.base_url('myaccount/add-property').'"':'data-toggle="modal" href="#login-register-modal"';?>>
                        Add Listing
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="ml-auto d-none d-xl-block">
              <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">
                <li class="nav-item pr-2">
                    <?php if($logged){ $role = $logged['role']; ?>
                        <a class="btn btn-warning btn-lg text-white" href="<?=($role == 'superadmin' || $role == 'admin' || $role == 'manager')?admin_url('home'):base_url('myaccount');?>">My Account</a>
                    <?php } else{ ?>
                        <a class="btn btn-warning btn-lg text-white" data-toggle="modal" href="#user-register-modal">User Login</a>
                    <?php } ?>
                </li>
                <?php if(isset($logged) && (($logged['role'] == 'user'))){ ?>
                <li class="nav-item mr-auto mr-lg-6">
                  <a class="nav-link px-2 position-relative" href="<?=($logged)?base_url('myaccount/favorites'):'#';?>">
                    <i class="fal fa-heart fs-large-4"></i>
                    <?php if($logged){ $favorite = get('wishlist', array('role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)); ?>
                    <span id="favorite" class="favorite badge badge-primary badge-circle badge-absolute"><?=($favorite != false)?count($favorite):'';?></span>
                    <?php } ?>
                  </a>
                </li>
                <?php } ?>
                <?php if($logged && ($role = $logged['role'])){ if($role != 'user' && $role != 'company'){ ?>
                <li class="nav-item">
                  <a class="btn btn-primary btn-lg text-white rounded-lg bg-hover-primary border-hover-primary hover-white d-none d-lg-block" <?=($logged)?'href="'.base_url('myaccount/add-property').'"':'data-toggle="modal" href="#login-register-modal"';?>>
                    Add Listing
                  </a>
                  <a class="btn btn-primary btn-lg d-block d-lg-none" <?=($logged)?'href="'.base_url('myaccount/add-property').'"':'data-toggle="modal" href="#login-register-modal"';?>>
                    Add Listing
                  </a>
                </li>
                <?php } } else{ ?>
                <li class="nav-item">
                  <a class="btn btn-primary btn-lg text-white rounded-lg bg-hover-primary border-hover-primary hover-white d-none d-lg-block" <?=($logged)?'href="'.base_url('myaccount/add-property').'"':'data-toggle="modal" href="#login-register-modal"';?>>
                    Add Listing
                  </a>
                  <a class="btn btn-primary btn-lg d-block d-lg-none" <?=($logged)?'href="'.base_url('myaccount/add-property').'"':'data-toggle="modal" href="#login-register-modal"';?>>
                    Add Listing
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>