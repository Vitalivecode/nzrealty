    <?php $logged = $this->session->userdata('logged_in'); ?>
    <main id="content">
      <section>
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-lg-0 pb-3">
              <li class="breadcrumb-item fs-12 letter-spacing-087"> <a href="#">Home</a> </li>
              <li class="breadcrumb-item fs-12 letter-spacing-087"> <a href="#">Listing</a> </li>
              <li class="breadcrumb-item fs-12 letter-spacing-087 active"><?=$properties[0]->title;?></li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid">
          <div class="position-relative" data-animate="zoomIn">
            <div class="position-absolute pos-fixed-top-right z-index-3">
              <ul class="list-inline pt-4 pr-5">
                <li class="list-inline-item mr-2">
                  <a href="#" data-toggle="tooltip" title="Favourite"
                           class="d-flex align-items-center justify-content-center w-40px h-40 bg-white text-heading bg-hover-primary hover-white rounded-circle">
                    <i class="far fa-heart"></i></a>
                </li>
                <li class="list-inline-item mr-2">
                  <button type="button"
                                class="btn btn-white p-0 d-flex align-items-center justify-content-center w-40px h-40 text-heading bg-hover-primary hover-white rounded-circle border-0 shadow-none"
                                data-container="body"
                                data-toggle="popover" data-placement="top" data-html="true" data-content='<ul class="list-inline mb-0">
                    <li class="list-inline-item">
                      <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item ">
                      <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-youtube"></i></a>
                    </li>
                  </ul>
                  '>
                  <i class="far fa-share-alt"></i>
                </button>
              </li>
              <li class="list-inline-item">
                <a href="#" data-toggle="tooltip" title="Print" class="d-flex align-items-center justify-content-center w-40px h-40 bg-white text-heading bg-hover-primary hover-white rounded-circle">
                  <i class="far fa-print"></i>
                </a>
              </li>
            </ul>
          </div>
          <?php if(isset($gallery) && !empty($gallery['normal'])){ $images = $gallery['normal']; ?>
          <div class="row galleries m-n1">
            <div class="col-lg-6 p-1">
                <div class="item item-size-4-3">
                    <div class="card p-0 hover-zoom-in">
                      <a href="<?=base_url('uploads/'.$images[0]);?>" class="card-img" data-gtf-mfp="true" data-gallery-id="01" style="background-image:url('<?=base_url('uploads/'.$images[0]);?>')"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-1">
                <div class="row m-n1">
                    <?php $no = 1; foreach($images as $image){ if($no != 1){ ?>
                        <div class="col-lg-6 p-1 <?=($no > 5)?'d-none':'';?>">
                          <div class="item item-size-4-3">
                            <div class="card p-0 hover-zoom-in">
                              <a href="<?=base_url('uploads/'.$image);?>" class="card-img" data-gtf-mfp="true" data-gallery-id="01" style="background-image:url('<?=base_url('uploads/'.$image);?>')"></a>
                              <?php if($no > 4){ ?>
                                <a href="javascript:void(0);" class="card-img-overlay d-flex flex-column align-items-center justify-content-center hover-image bg-dark-opacity-04">
                                    <p class="fs-48 font-weight-600 text-white lh-1 mb-4">+<?=(count($images)-5);?></p>
                                    <p class="fs-16 font-weight-bold text-white lh-1625 text-uppercase">View more</p>
                                </a>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                    <?php } $no++; } ?>
                </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <div class="primary-content pt-8">
      <div class="container">
        <div class="row">
          <article class="col-lg-<?=(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role']))?12:8;?> pr-xl-7">
            <section class="pb-7 border-bottom">
              <ul class="list-inline d-sm-flex align-items-sm-center mb-2">
                <?php if($properties[0]->featured == 1){ ?>
                <li class="list-inline-item badge badge-orange mr-2">Featured</li>
                <?php } ?>
                <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i><?=time_elapsed_string($properties[0]->created_date);?>
                </li>
                <li class="list-inline-item mt-2 mt-sm-0"><i class="fal fa-eye mr-1"></i><?=($views != false)?count($views):0;?> views</li>
              </ul>
              <div class="d-sm-flex justify-content-sm-between">
                <div>
                  <h2 class="fs-35 font-weight-600 lh-15 text-heading"><?=$properties[0]->title;?></h2>
                  <p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i><?=$properties[0]->address;?></p>
                </div>
                <div class="mt-2 text-lg-right">
                  <p class="fs-22 text-heading font-weight-bold mb-0"><?=currency();?><?=$properties[0]->price;?></p>
                  <p class="mb-0"><?=currency();?><?=round(($properties[0]->price/$properties[0]->sqft),2);?>/SqFt</p>
                </div>
              </div>
              <h4 class="fs-22 text-heading mt-6 mb-2">Description</h4>
              <p class="mb-0 lh-214"><?=$properties[0]->description;?></p>
            </section>
            <section class="pt-6 border-bottom">
              <h4 class="fs-22 text-heading mb-6">Facts and Features</h4>
              <div class="row">
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-family fs-32 text-primary">
                        <use xlink:href="#icon-family"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Type</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading">Single Family</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-year fs-32 text-primary">
                        <use xlink:href="#icon-year"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">year built</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->built_year;?></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-heating fs-32 text-primary">
                        <use xlink:href="#icon-heating"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">heating</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading">Radiant</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-price fs-32 text-primary">
                        <use xlink:href="#icon-price"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">SQFT</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->sqft;?></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-bedroom fs-32 text-primary">
                        <use xlink:href="#icon-bedroom"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Bedrooms</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->bedrooms;?></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-sofa fs-32 text-primary">
                        <use xlink:href="#icon-sofa"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">bathrooms</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->bathrooms;?></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-Garage fs-32 text-primary">
                        <use xlink:href="#icon-Garage"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">GARAGE</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading">1</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-4 mb-6">
                  <div class="media">
                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                      <svg class="icon icon-status fs-32 text-primary">
                        <use xlink:href="#icon-status"></use>
                      </svg>
                    </div>
                    <div class="media-body">
                      <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Status</h5>
                      <p class="mb-0 fs-13 font-weight-bold text-heading">Active</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="pt-6 border-bottom pb-4">
              <h4 class="fs-22 text-heading mb-4">Additional Details</h4>
              <div class="row">
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property ID</dt>
                  <dd>NZ-<?=$properties[0]->accesskey;?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Price</dt>
                  <dd><?=currency();?><?=$properties[0]->price;?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property type</dt>
                  <dd><?=ucwords($properties[0]->p_type);?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property status</dt>
                  <dd>For Sale</dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Rooms</dt>
                  <dd><?=$properties[0]->bedrooms;?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bedrooms</dt>
                  <dd><?=$properties[0]->bedrooms;?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Size</dt>
                  <dd><?=$properties[0]->sqft;?>SqFt</dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bathrooms</dt>
                  <dd><?=$properties[0]->bathrooms;?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Garage</dt>
                  <dd>1</dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bathrooms</dt>
                  <dd>2000 SqFt</dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Garage size</dt>
                  <dd>50 SqFt</dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Year build</dt>
                  <dd><?=$properties[0]->built_year;?></dd>
                </dl>
                <dl class="offset-sm-6 col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Label</dt>
                  <dd>Bestseller</dd>
                </dl>
              </div>
            </section>
            <?php if($amenities != false){ ?>
            <section class="pt-6 border-bottom pb-4">
              <h4 class="fs-22 text-heading mb-4">Offices Amenities</h4>
              <ul class="list-unstyled mb-0 row no-gutters">
                <?php foreach($amenities as $amenity){ ?>
                <li class="col-sm-3 col-6 mb-2"><i class="far <?=(in_array($amenity->sno, explode(',', $properties[0]->aminities)))?'fa-check':'fa-times';?> mr-2 <?=(in_array($amenity->sno, explode(',', $properties[0]->aminities)))?'text-primary':'';?>"></i><?=$amenity->name;?> </li>
                <?php } ?>
              </ul>
            </section>
            <?php } ?>
            <section class="py-6 border-bottom">
              <h4 class="fs-22 text-heading mb-6">Location</h4>
              <div class="position-relative">
                <div id="map"></div>
                <div id="map" class="mapbox-gl map-point-animate"
                             data-mapbox-access-token="pk.eyJ1IjoiZHVvbmdsaCIsImEiOiJjanJnNHQ4czExMzhyNDVwdWo5bW13ZmtnIn0.f1bmXQsS6o4bzFFJc8RCcQ"
                             data-mapbox-options='{"center":[-73.9927227, 40.6741035],"setLngLat":[-73.9927227, 40.6741035]}'
                             data-mapbox-marker='[{"position":[-73.9927227, 40.6741035],"className":"marker","backgroundImage":"<?=base_url('layout/images/googlle-market-01.png');?>","backgroundRepeat":"no-repeat","width":"30px","height":"40px"}]'>
                </div>
                <p class="mb-0 p-3 bg-white shadow rounded-lg position-absolute pos-fixed-bottom mb-4 ml-4 lh-17 z-index-2"><?=$properties[0]->address;?></p>
              </div>
            </section>
            <section class="pt-6 border-bottom chart">
              <div class="card border-0 mb-6">
                <div class="card-body p-0 collapse-tabs">
                  <div class="d-flex align-items-center mb-5">
                    <h2 class="mb-0 text-heading fs-22 lh-15 mr-auto">Page statistics</h2>
                    <ul class="nav nav-pills nav-pills-01 justify-content-end d-none d-sm-flex" role="tablist">
                      <li class="nav-item px-5 py-1">
                        <a class="nav-link active bg-transparent shadow-none p-0 letter-spacing-1" id="hours-tab" data-toggle="tab"
                            href="#hours" role="tab" aria-controls="hours" aria-selected="true">Hours</a>
                      </li>
                      <li class="nav-item px-5 py-1">
                        <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1" id="weekly-tab"
                            data-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly</a>
                      </li>
                      <li class="nav-item px-5 py-1">
                        <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1" id="monthly-tab" 
                            data-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                      </li>
                    </ul>
                  </div>
                  <?php $hours = $hour = $ch = array(); for($i=1;$i<=24;$i++){ $hours[] = $i; } foreach($dayViews as $view){ $h = date('H', strtotime($view->datetime)); $hour[] = $h; } $countHour = array_count_values($hour); foreach($hours as $value){ $ch[] = !empty($countHour[$value])?$countHour[$value]:0; } ?>
                  <div class="tab-content shadow-none p-0">
                    <div id="collapse-tabs-accordion">
                      <div class="tab-pane tab-pane-parent fade show active px-0" id="hours" role="tabpanel" aria-labelledby="hours-tab">
                        <div class="card bg-transparent mb-sm-0 border-0">
                          <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0" id="headingHours">
                            <h5 class="mb-0">
                              <button class="btn collapse-parent font-size-h5 btn-block border shadow-none" data-toggle="collapse"
                                data-target="#hours-collapse" aria-expanded="true" aria-controls="hours-collapse">
                                Hours
                              </button>
                            </h5>
                          </div>
                          <div id="hours-collapse" class="collapse show collapsible" data-parent="#collapse-tabs-accordion">
                            <div class="card-body p-0 py-4">
                              <canvas class="chartjs" data-chart-options="[]"
                                data-chart-labels='["<?=implode('h","',$hours);?>h"]'
                                data-chart-datasets='[{"label":"Clicked","data":[0,7,10,3,15,30,10],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[<?=implode(',',$ch);?>],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                              </canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php $weekly = today_to_lastweek(); $week = $cw = array(); foreach($weekViews as $view){ $w = date('d', strtotime($view->datetime)); $week[] = $w; } $countWeek = array_count_values($week); foreach($weekly as $value){ $cw[] = !empty($countWeek[$value])?$countWeek[$value]:0; } ?>
                      <div class="tab-pane tab-pane-parent fade px-0" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                        <div class="card bg-transparent mb-sm-0 border-0">
                          <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0" id="headingWeekly">
                            <h5 class="mb-0">
                              <button class="btn collapse-parent font-size-h5 btn-block collapsed border shadow-none"
                                data-toggle="collapse" data-target="#weekly-collapse" aria-expanded="true" aria-controls="weekly-collapse">
                                Weekly
                              </button>
                            </h5>
                          </div>
                          <div id="weekly-collapse" class="collapse collapsible" aria-labelledby="headingWeekly"
                            data-parent="#collapse-tabs-accordion">
                            <div class="card-body p-0 py-4">
                              <canvas class="chartjs" data-chart-options="[]"
                                data-chart-labels='["<?=implode('d","',$weekly);?>d"]'
                                data-chart-datasets='[{"label":"Clicked","data":[0,7,10,3,15,30,10],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[<?=implode(',',$cw);?>],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                              </canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php $months = months(); $month = $cm = array(); foreach($monthViews as $view){ $m = date('M', strtotime($view->datetime)); $month[] = $m; } $countMonth = array_count_values($month); foreach($months as $value){ $cm[] = !empty($countMonth[$value])?$countMonth[$value]:0; } ?>
                      <div class="tab-pane tab-pane-parent fade px-0" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                        <div class="card bg-transparent mb-sm-0 border-0">
                          <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0" id="headingMonthly">
                            <h5 class="mb-0">
                              <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                data-toggle="collapse" data-target="#monthly-collapse" aria-expanded="true" aria-controls="monthly-collapse">
                                Monthly
                              </button>
                            </h5>
                          </div>
                          <div id="monthly-collapse" class="collapse collapsible" aria-labelledby="headingMonthly" data-parent="#collapse-tabs-accordion">
                            <div class="card-body p-0 py-4">
                              <canvas class="chartjs" data-chart-options="[]" data-chart-labels='["<?=implode('","',$months);?>"]' data-chart-datasets='[{"label":"Clicked","data":[10,20,18,15,28,33,27,10,20,30,10,0],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[<?=implode(',',$cm);?>],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                              </canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </article>
          <?php if(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role'])){} else{ ?>
          <aside class="col-lg-4 pl-xl-4 primary-sidebar sidebar-sticky" id="sidebar">
            <div class="primary-sidebar-inner">
              <div class="card border-0 widget-request-tour">
                <ul class="nav nav-tabs d-flex" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active px-3" data-toggle="tab" href="#schedule" role="tab" aria-selected="true">Schedule A Tour</a>
                  </li>
                  <?php if($user != false){ ?>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link px-3" data-toggle="tab" href="#request-info" role="tab" aria-selected="false">Request Info</a>
                  </li>
                  <?php } ?>
                </ul>
                <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                  <form>
                    <div class="tab-content pt-1 pb-0 px-0 shadow-none">
                      <div class="tab-pane fade show active" id="schedule" role="tabpanel">
                        <div class="slick-slider calendar arrow-hide-disable mx-n1" data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false}'>
                          <?php $fromdate = date('Y-m-d', strtotime(date('Y-m-d').' +1 day')); $todate = date('Y-m-d', strtotime($fromdate.' +7 day')); $no = 1; for($d = strtotime($fromdate); $d <= strtotime($todate); $d = $d + 86400){ ?>
                          <div class="box px-1 py-4">
                            <div class="card pointer <?=($no == 1)?'active':'';?> border-0 shadow-xxs-1" data-date="<?=date('F d, Y', $d);?>">
                              <div class="card-body p-1 text-center">
                                <p class="day fs-12 text-muted lh-2 mb-0"><?=date('D', $d);?></p>
                                <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold"><?=date('d', $d);?></p>
                                <p class="month fs-13 letter-spacing-087 mb-0"><?=date('M', $d);?></p>
                              </div>
                            </div>
                          </div>
                          <?php $no++; } ?>
                        </div>
                        <input type="hidden" class="date" name="date" value="<?=date('F d, Y', strtotime($fromdate));?>">
                        <div class="form-group mb-2">
                        <!--
                          <div class="input-group input-group-lg bootstrap-timepicker timepicker">
                            <input type="text" id="schedule-time" class="form-control border-0 text-body shadow-none" min="<?=(isset($schedule_from) && !empty($schedule_from[date('l', strtotime($fromdate))]))?$schedule_from[date('l', strtotime($fromdate))]:'';?>" max="<?=(isset($schedule_to) && !empty($schedule_to[date('l', strtotime($fromdate))]))?$schedule_to[date('l', strtotime($fromdate))]:'';?>" placeholder="Choose a time">
                            <div class="input-group-append input-group-addon">
                              <button class="btn bg-input shadow-none fs-18 lh-1" type="button"><i class="fal fa-angle-down"></i></button>
                            </div>
                          </div>
                        -->
                          <input type="time" id="schedule-time" class="form-control border-0 text-body shadow-none" min="<?=(isset($schedule_from) && !empty($schedule_from[date('l', strtotime($fromdate))]))?$schedule_from[date('l', strtotime($fromdate))]:'';?>" max="<?=(isset($schedule_to) && !empty($schedule_to[date('l', strtotime($fromdate))]))?$schedule_to[date('l', strtotime($fromdate))]:'';?>" placeholder="Choose a time">
                        </div>
                        <div class="form-group mb-2">
                          <input type="text" class="form-control form-control-lg border-0" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="First Name, Last Name">
                        </div>
                        <div class="form-group mb-2">
                          <input type="email" class="form-control form-control-lg border-0" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Your Email">
                        </div>
                        <div class="form-group mb-4">
                          <input type="tel" class="form-control form-control-lg border-0" value="" placeholder="Your phone">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Schedule
                          A Tour
                        </button>
                        <div class="form-group form-check mt-2 mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label fs-13" for="exampleCheck1">Egestas fringilla
                            phasellus
                            faucibus
                            scelerisque
                            eleifend donec.</label>
                        </div>
                      </div>
                      <?php if($user != false){ ?>
                      <div class="tab-pane fade pt-5" id="request-info" role="tabpanel">
                        <div class="form-check d-flex align-items-center border-bottom pb-3 mb-3">
                          <input class="form-check-input" type="radio" name="agent" value="option1">
                          <div class="form-check-label ml-2">
                            <div class="d-flex align-items-center">
                              <a href="<?=base_url('agents/single');?>" class="d-block w-60px h-60 mr-3">
                                <img src="<?=profilepic(($user != false)?$user[0]->img:'300x300.png');?>" class="rounded-circle" alt="<?=($user != false)?$user[0]->name:'';?>">
                              </a>
                              <div>
                                <a href="#" class="d-block text-dark font-weight-500 lh-15 hover-primary"><?=($user != false)?$user[0]->name:'';?></a>
                                <p class="mb-0 fs-13 mb-0 lh-17">Sales Excutive</p>
                                <p class="mb-0 fs-13 mb-0 lh-17"><span class="text-heading d-inline-block ml-0"><?=($user != false)?$user[0]->phone:'';?></span> </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group mb-2">
                          <input type="text" class="form-control form-control-lg border-0" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="First Name, Last Name">
                        </div>
                        <div class="form-group mb-2">
                          <input type="email" class="form-control form-control-lg border-0" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Your Email">
                        </div>
                        <div class="form-group mb-2">
                          <input type="tel" class="form-control form-control-lg border-0" placeholder="Your phone">
                        </div>
                        <div class="form-group mb-4">
                          <textarea class="form-control border-0" rows="4">Hello, I'm interested in <?=$properties[0]->title;?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Request Info </button>
                        <div class="form-group form-check mt-2 mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck2">
                          <label class="form-check-label fs-13" for="exampleCheck2">Egestas fringilla phasellus faucibus scelerisque eleifend donec.</label>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </aside>
          <?php } ?>
        </div>
      </div>
    </div>
    <section class="pt-6 pb-8">
      <div class="container">
        <h4 class="fs-22 text-heading mb-6">Similar Homes You May Like</h4>
        <?=properties(array('accesskey !=' => $properties[0]->accesskey));?>
      </div>
    </section>
    <?php if(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role'])){} else{ if($user != false){ ?>
    <section>
      <div class="d-flex bottom-bar-action bottom-bar-action-01 py-2 px-4 bg-gray-01 align-items-center position-fixed fixed-bottom d-sm-none">
        <div class="media align-items-center">
          <img src="<?=profilepic(($user != false)?$user[0]->img:'300x300.png');?>" alt="<?=($user != false)?$user[0]->name:'';?>" class="mr-4 rounded-circle">
          <div class="media-body">
            <a href="#" class="d-block text-dark fs-15 font-weight-500 lh-15"><?=($user != false)?$user[0]->name:'';?></a>
            <span class="fs-13 lh-2">Sales Excutive</span>
          </div>
        </div>
        <div class="ml-auto">
          <button type="button" class="btn btn-primary fs-18 p-2 lh-1 mr-1 mb-1 shadow-none" data-toggle="modal" data-target="#modal-messenger"><i class="fal fa-comment"></i></button>
          <a href="tel:<?=($user != false)?$user[0]->phone:'';?>" class="btn btn-primary fs-18 p-2 lh-1 mb-1 shadow-none" target="_blank">
              <i class="fal fa-phone"></i>
          </a>
        </div>
      </div>
      <div class="modal fade" id="modal-messenger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header border-0 pb-0">
              <h4 class="modal-title text-heading" id="exampleModalLabel">Contact Form</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pb-6">
              <div class="form-group mb-2">
                <input type="text" class="form-control form-control-lg border-0" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="First Name, Last Name">
              </div>
              <div class="form-group mb-2">
                <input type="email" class="form-control form-control-lg border-0" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Your Email">
              </div>
              <div class="form-group mb-2">
                <input type="tel" class="form-control form-control-lg border-0" placeholder="Your phone">
              </div>
              <div class="form-group mb-2">
                <textarea class="form-control border-0" rows="4">Hello, I'm interested in <?=$properties[0]->title;?></textarea>
              </div>
              <div class="form-group form-check mb-4">
                <input type="checkbox" class="form-check-input" id="exampleCheck3">
                <label class="form-check-label fs-13" for="exampleCheck3">Egestas fringilla phasellus faucibus
                  scelerisque eleifend donec.</label>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Request Info</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } } ?>
  </main>
    <?php $schedule_list = array(); $date = new DateTime('2022-08-14'); for($days = 7; $days--;) { $dd = $date->modify('+1 days'); $day = $dd->format('l'); $shortday = $dd->format('D'); $min = (isset($schedule_from) && !empty($schedule_from[$day]))?$schedule_from[$day]:''; $max = (isset($schedule_to) && !empty($schedule_to[$day]))?$schedule_to[$day]:''; $schedule_list[$shortday][] = array('min' => $min, 'max' => $max); } ?>
    <script>
        var schedule = <?=json_encode($schedule_list);?>;
        var lat = -43.3744881;
        var lng = 172.4662705;
    </script>
    