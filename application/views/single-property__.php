<?php $logged = $this->session->userdata('logged_in'); ?>
<main id="content">
    <div class="primary-content pt-8">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-lg-0 pb-3">
              <li class="breadcrumb-item fs-12 letter-spacing-093"> <a href="<?=base_url();?>">Home</a> </li>
              <li class="breadcrumb-item fs-12 letter-spacing-093"> <a href="<?=base_url('properties');?>">Listing</a> </li>
              <li class="breadcrumb-item fs-12 letter-spacing-093 active"><?=$properties[0]->title;?></li>
            </ol>
          </nav>
        </div>
	<div class="container">
		<div class="row">
			<article id="single-property" class="col-lg-8 pr-xl-4">
				<section class="pb-7 border-bottom">
					<div class="galleries position-relative">
							<div class="position-absolute pos-fixed-top-right z-index-3">
								<ul class="list-inline pt-4 pr-5">
									<li class="list-inline-item mr-2">
									    <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role'])){ } else{ ?>
										<a href="javascript:void(0);" id="<?=$properties[0]->accesskey;?>" data-toggle="tooltip" title="Favourite" class="wishlist d-flex align-items-center justify-content-center w-40px h-40 bg-white text-heading bg-hover-primary hover-white rounded-circle">
											<i class="fa<?=$wishlist?'s':'r';?> fa-heart"></i>
										</a>
										<?php } ?>
									</li>
									<li class="list-inline-item mr-2">
										<button type="button" class="btn btn-white p-0 d-flex align-items-center justify-content-center w-40px h-40 text-heading bg-hover-primary hover-white rounded-circle border-0 shadow-none"
										        data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-content='<ul class="list-inline mb-0">
	                                            <li class="list-inline-item">
	                                                <a href="https://twitter.com/share?url=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-twitter"></i></a>
	                                            </li>
	                                            <li class="list-inline-item ">
	                                                <a href="https://www.facebook.com/sharer.php?u=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-facebook-f"></i></a>
	                                            </li>
	                                            <li class="list-inline-item">
	                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-linkedin"></i></a>
	                                            </li>
	                                            <li class="list-inline-item">
	                                                <a href="https://api.whatsapp.com/send/?phone=&text=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>&type=phone_number&app_absent=0" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-whatsapp"></i></a>
	                                            </li>
	                                        </ul>'>
											<i class="far fa-share-alt"></i>
										</button>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0);" data-toggle="tooltip" title="Print" class="print d-flex align-items-center justify-content-center w-40px h-40 bg-white text-heading bg-hover-primary hover-white rounded-circle">
											<i class="far fa-print"></i>
										</a>
									</li>
								</ul>
							</div>
					<?php if(isset($gallery) && !empty($gallery['normal'])){ $images = $gallery['normal']; ?>
							<div class="slick-slider slider-for-01 arrow-haft-inner mx-0" data-slick-options='{"slidesToShow": 1, "autoplay":false,"dots":false,"arrows":true,"asNavFor": ".slider-nav-01"}'>
							    <?php foreach($images as $image){ ?>
								   <div class="box px-0">
    									<div class="item item-size-3-2">
    										<div class="card p-0 hover-change-image">
    											<a href="<?=base_url('uploads/'.$image);?>" class="card-img" data-gtf-mfp="true" data-gallery-id="04" style="background-image:url('<?=base_url('uploads/'.$image);?>')"></a>
    										</div>
    									</div>
    								</div>
    							<?php } ?>
							</div>
                        	<div class="slick-slider slider-nav-01 mt-4 mx-n1 arrow-haft-inner"
							     data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false,"arrows":false,"asNavFor": ".slider-for-01","focusOnSelect": true,"responsive":[{"breakpoint": 768,"settings": {"slidesToShow": 4}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>
						        <?php foreach($images as $image){ ?>
									<div class="box pb-6 px-0">
										<div class="bg-hover-white p-1 shadow-hover-xs-3 h-100 rounded-lg">
											<img src="<?=base_url('uploads/'.$image);?>" alt="" class="h-100 w-100 rounded-lg">
										</div>
									</div>
        	                    <?php } ?>
							</div>
                    <?php } ?>
						</div>
					<div class="d-xl-flex justify-content-xl-between mb-1">
                          <ul class="list-inline d-sm-flex align-items-sm-center mb-0">
                            <?php if($properties[0]->premium == 1){ ?>
                                <li class="list-inline-item badge badge-orange mr-2">Premium</li>
                            <?php } ?>
                            <?php if($properties[0]->featured == 1){ ?>
                                <li class="list-inline-item badge badge-indigo mr-2">Featured</li>
                            <?php } ?>
                            <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i><?=time_elapsed_string($properties[0]->created_date);?>
                            </li>
                            <li class="list-inline-item mt-2 mt-sm-0"><i class="fal fa-eye mr-1"></i><?=($views != false)?count($views):0;?> views</li>
                          </ul>
						<ul class="list-inline mb-0 mr-n2 my-4 my-xl-0">
						    <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role'])){ } else{ ?>
							<li class="list-inline-item mr-2">
								<a href="javascript:void(0);" id="<?=$properties[0]->accesskey;?>" class="wishlist wishlist-text btn btn-outline-light px-3 text-body d-flex align-items-center h-32 border">
									<i class="fa<?=$wishlist?'s':'r';?> fa-heart mr-2 fs-15 text-primary"></i>Save<?=$wishlist?'d':'';?>
								</a>
							</li>
							<?php } ?>
							<li class="list-inline-item mr-2">
								<a href="#" class="print btn btn-outline-light px-3 text-body d-flex align-items-center h-32 border">
									Available From: <?=date('d-m-Y', strtotime($properties[0]->available_from));?>
								</a>
							</li>
						</ul>
					</div>
					<div class="d-sm-flex justify-content-sm-between mb-6">
						<div>
							<h2 class="fs-35 font-weight-600 lh-15 text-heading"><?=$properties[0]->title;?></h2>
							<p class="mb-0"><i class="fal fa-map-marker-alt mr-2"></i><?=$properties[0]->address;?></p>
						</div>
						<div class="mt-2 text-lg-right">
							<p class="fs-22 text-heading font-weight-bold mb-0"><?=currency();?><?=$properties[0]->price;?><span class="fs-14 font-weight-normal"><?=($properties[0]->duration != '')?'/'.$properties[0]->duration:'';?></span></p>
					<!--	<p class="mb-0"><?=currency();?><?=round(($properties[0]->price/$properties[0]->sqft),2);?>/SqFt</p>    -->
						</div>
					</div>
                      <h4 class="fs-22 text-heading mb-6">Facts and Features</h4>
                      <div class="row">
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-bedroom fs-32 text-primary">
                                <use xlink:href="#icon-bedroom"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Bedrooms</h5>
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
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">bathrooms</h5>
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
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">GARAGE</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->parkings;?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-car-garage fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Car Port</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->carport;?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-car fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Offstreet</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->offshoreparking;?></p>
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
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Year built</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->built_year;?></p>
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
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">SQFT</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->sqft;?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-users fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Tenants</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->tenants;?></p>
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
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Bond</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=currency().$properties[0]->bond;?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-family fs-32 text-primary">
                                <use xlink:href="#icon-family"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Type</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=ucfirst($properties[0]->p_type);?></p>
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
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Available</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=$properties[0]->property_status;?></p>
                            </div>
                          </div>
                        </div>
                        <?php if(isset($properties) && $properties != false){ $features = json_decode($properties[0]->features); } ?>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-paw fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Additional</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">Yes</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-paw fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Pets</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=(isset($features) && !empty($features->pet))?ucfirst($features->pet):'';?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-smoking fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Smokers</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=(isset($features) && !empty($features->smokers))?ucfirst($features->smokers):'';?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-couch fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Furnished</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=(isset($features) && !empty($features->furnished))?ucfirst($features->furnished):'';?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-users fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">HH Compliant</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=(isset($features) && !empty($features->compliant))?ucfirst($features->compliant):'';?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      
					<h4 class="fs-22 text-heading my-2">Description</h4>
					<p class="mb-0 lh-214"><?=strip_tags($properties[0]->description);?></p>
				</section>
				
            
            <section class="pt-6 border-bottom pb-4">
              <h4 class="fs-22 text-heading mb-4">Additional Details</h4>
              <div class="row">
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property ID</dt>
                  <dd>NZ-<?=$properties[0]->accesskey;?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Property type</dt>
                  <dd><?=ucwords($properties[0]->type);?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Available from</dt>
                  <dd><?=date('d M, Y', strtotime($properties[0]->available_from));?></dd>
                </dl>
                <dl class="col-sm-6 mb-0 d-flex">
                  <dt class="w-110px fs-14 font-weight-500 text-heading pr-2">Bond</dt>
                  <dd><?=currency().$properties[0]->bond;?></dd>
                </dl>
              </div>
            </section>
            
				
            <?php if($amenities != false){ ?>
            <section class="pt-6 border-bottom pb-4">
              <h4 class="fs-22 text-heading mb-4">Amenities</h4>
              <ul class="list-unstyled mb-0 row no-gutters">
                <?php foreach($amenities as $amenity){ ?>
                <li class="col-sm-3 col-6 mb-2"><i class="far <?=(in_array($amenity->sno, explode(',', $properties[0]->aminities)))?'fa-check':'fa-times';?> mr-2 <?=(in_array($amenity->sno, explode(',', $properties[0]->aminities)))?'text-primary':'';?>"></i><?=$amenity->name;?> </li>
                <?php } ?>
              </ul>
            </section>
            <?php } ?>
            
            
		<!--
				<section class="pt-6">
					<h4 class="fs-22 text-heading mb-5">What is Nearby?</h4>
					<div class="mt-4">
						{% for property in site.data.single-property-4.properties-01 %}
						<h6 class="mb-0 mt-5"><a href="{{ property.url | document_url }}" class="fs-16 lh-2 text-heading border-bottom border-primary pb-1">{{ property.title }}</a></h6>
						<div class="border-top pt-2">
							{% for sub_property in property.sub_properties %}
							<div class="py-3 border-bottom d-sm-flex justify-content-sm-between">
								<div class="media align-items-sm-center d-sm-flex d-block">
									<a href="#" class="hover-shine">
										<img src="{{ sub_property.image | document_url }}" class="mr-sm-4 rounded-lg w-sm-90" alt="Bacchanal Buffet-Temporarily Closed">
									</a>
									<div class="mt-sm-0 mt-2">
										<h4 class="my-0"><a href="#" class="lh-186 fs-15 text-heading hover-primary">{{ sub_property.title }}</a></h4>
										<p class="lh-186 fs-15 font-weight-500 mb-0">{{ sub_property.des }}</p>
									</div>
								</div>
							</div>
							{% endfor %}
						</div>
						{% endfor %}
					</div>
				</section>
				<section class="py-6 border-bottom">
					<h4 class="fs-22 text-heading mb-6">Location</h4>
					<div class="position-relative">
						<div id="map-01" class="mapbox-gl map-point-animate"  style="height: 430px;"
						     data-mapbox-access-token="{{ site.data.map-access-token.access-token}}"
						     data-mapbox-options='{"center":[-73.9927227, 40.6741035],"setLngLat":[-73.9927227, 40.6741035],"container":"map-01"}'
						     data-mapbox-marker='[{"position":[-73.9927227, 40.6741035],"className":"marker","backgroundImage":"{{ "/images/googlle-market-01.png" | document_url }}","backgroundRepeat":"no-repeat","width":"30px","height":"40px"}]'>
						</div>
						<p class="mb-0 p-3 bg-white shadow rounded-lg position-absolute pos-fixed-bottom mb-4 ml-4 lh-17 z-index-2">62 Gresham St, Victoria Park <br/> WA 6100, Australia</p>
					</div>
				</section>
		-->
				
			</article>
		
          <aside class="col-lg-4 pl-xl-4 primary-sidebar" id="sidebar">
            <div class="primary-sidebar-inner">
                <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role'])){ } else{ ?>
                  <div class="card border-0 widget-request-tour mb-5">
                    <ul class="nav nav-tabs d-flex" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active px-3" data-toggle="tab" href="#request-info" role="tab" aria-selected="true">Request Info</a>
                      </li>
                      <?php if($user != false){ ?>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link px-3" data-toggle="tab" href="#schedule" role="tab" aria-selected="false">Book a Viewing</a>
                      </li>
                      <?php } ?>
                    </ul>
                    <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                        <div class="tab-content pt-1 pb-0 px-0 shadow-none">
                          <div class="tab-pane fade" id="schedule" role="tabpanel">
                            <form class="form" method="post" action="#" data-action="<?=base_url('properties/schedule');?>" id="nzform" autocomplete="off">
                                <div class="slick-slider calendar arrow-hide-disable mx-n1" data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false}'>
                                  <?php $fromdate = date('Y-m-d', strtotime(date('Y-m-d').' +1 day')); $todate = date('Y-m-d', strtotime($fromdate.' +7 day')); $no = 1; for($d = strtotime($fromdate); $d <= strtotime($todate); $d = $d + 86400){ ?>
                                  <div class="box px-1 py-4">
                                    <div class="card pointer <?=($no == 1)?'active':'';?> border-0 shadow-xxs-1" data-date="<?=date('F d, Y', $d);?>">
                                      <div class="card-body p-1 text-center">
                                        <p class="day fs-12 text-muted lh-2 mb-0"><?=date('D', $d);?></p>
                                        <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold"><?=date('d', $d);?></p>
                                        <p class="month fs-13 letter-spacing-023 mb-0"><?=date('M', $d);?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <?php $no++; } ?>
                                  <small class="form-text text-danger sdate"></small>
                                </div>
                                <input type="hidden" class="date" name="sdate" value="<?=date('F d, Y', strtotime($fromdate));?>">
                                <div class="form-group mb-2">
                                  <input type="time" id="schedule-time" class="form-control border-0 text-body shadow-none" name="time" min="<?=(isset($schedule_from) && !empty($schedule_from[date('l', strtotime($fromdate))]))?$schedule_from[date('l', strtotime($fromdate))]:'';?>" max="<?=(isset($schedule_to) && !empty($schedule_to[date('l', strtotime($fromdate))]))?$schedule_to[date('l', strtotime($fromdate))]:'';?>" placeholder="Choose a time">
                                  <small class="form-text text-danger time"></small>
                                </div>
                                <div class="form-group mb-2">
                                  <input type="text" class="form-control form-control-lg border-0" name="name" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="Name">
                                  <small class="form-text text-danger name"></small>
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                <div class="form-group mb-2">
                                  <input type="email" class="form-control form-control-lg border-0" name="email" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Email">
                                  <small class="form-text text-danger email"></small>
                                </div>
                                <div class="form-group mb-4">
                                  <input type="tel" class="form-control form-control-lg border-0" name="phone" value="" placeholder="Phone">
                                  <small class="form-text text-danger phone"></small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block rounded" id="nz-submit">Schedule A Tour
                                </button>
                                <div class="form-group form-check mt-2 mb-0">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label fs-13" for="exampleCheck1">Egestas fringilla
                                    phasellus
                                    faucibus
                                    scelerisque
                                    eleifend donec.</label>
                                </div>
                            </form>
                          </div>
                          <?php if($user != false){ ?>
                          <div class="tab-pane fade pt-5 show active" id="request-info" role="tabpanel">
                            <form class="form" method="post" action="#" data-action="<?=base_url('properties/request');?>" id="nzform" autocomplete="off">
                                <div class="form-check d-flex align-items-center border-bottom pb-3 mb-3">
                                  <input class="form-check-input" type="radio" name="agent" checked value="<?=($user != false)?$user[0]->sno:'';?>">
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
                                  <input type="text" class="form-control form-control-lg border-0" name="name" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="Name">
                                  <small class="form-text text-danger name"></small>
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                <div class="form-group mb-2">
                                  <input type="email" class="form-control form-control-lg border-0" name="email" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Email">
                                  <small class="form-text text-danger email"></small>
                                </div>
                                <div class="form-group mb-4">
                                  <input type="tel" class="form-control form-control-lg border-0" name="phone" value="" placeholder="Phone">
                                  <small class="form-text text-danger phone"></small>
                                </div>
                                <div class="form-group mb-4">
                                  <textarea class="form-control border-0" name="message" rows="4">Hello, I'm interested in <?=$properties[0]->title;?></textarea>
                                  <small class="form-text text-danger message"></small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block rounded" id="nz-submit">Submit </button>
                                <div class="form-group form-check mt-2 mb-0">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                  <label class="form-check-label fs-13" for="exampleCheck2">Egestas fringilla phasellus faucibus scelerisque eleifend donec.</label>
                                </div>
                            </form>
                          </div>
                          <?php } ?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
                <?php if(isset($company) && $company != false){ ?>
                    <div class="card px-6 mb-5">
                        <a href="<?=base_url('agency/'.strtolower(str_replace(' ','-',$company[0]->name)));?>"><img class="card-img rounded-0" src="<?=companypic($company[0]->img);?>" alt="<?=$company[0]->name;?>"></a>
                        <div class="card-body px-0 pt-2 pb-6 border-top">
                            <a class="h-100" href="<?=base_url('agency/'.strtolower(str_replace(' ','-',$company[0]->name)));?>">
                                <h6 class="text-dark lh-213 mb-0 hover-primary"><?=$company[0]->name;?></h6>
                            </a>
                            <p class="card-text"><?=$company[0]->address;?></p>
                            <ul class="list-group list-group-no-border">
                                <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 p-0">
                                    <span class="col-sm-4 p-0 fs-13">Office</span>
                                    <span class="col-sm-8 p-0"><a href="tel:<?=$company[0]->phone;?>"><?=($company[0]->phone != '')?$company[0]->phone:'-';?></a></span>
                                </li>
                                <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-3 pb-0">
                                    <span class="col-sm-4 p-0 fs-13">Email</span>
                                    <span class="col-sm-8 p-0"><a href="mailto:<?=$company[0]->email;?>"><?=$company[0]->email;?></a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <?=slide_properties(array('premium' => 1));?>
                <?=slide_properties(array('featured' => 1));?>
            </div>
          </aside>
		</div>
	</div>
</div>


    <section class="pt-6 pb-8">
      <div class="container">
        <h4 class="fs-22 text-heading mb-6">Similar Properties You May Like</h4>
        <?=properties(array('accesskey !=' => $properties[0]->accesskey));?>
      </div>
    </section>
    <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role'])){ } else{ if($user != false){ ?>
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
                <form class="form" method="post" action="#" data-action="<?=base_url('properties/request');?>" id="nzform" autocomplete="off">
                  <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-lg border-0" name="name" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="First Name, Last Name">
                    <small class="form-text text-danger name"></small>
                  </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                  <div class="form-group mb-2">
                    <input type="email" class="form-control form-control-lg border-0" name="email" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Your Email">
                    <small class="form-text text-danger email"></small>
                  </div>
                  <div class="form-group mb-4">
                    <input type="tel" class="form-control form-control-lg border-0" name="phone" value="" placeholder="Your phone">
                    <small class="form-text text-danger phone"></small>
                  </div>
                  <div class="form-group mb-4">
                    <textarea class="form-control border-0" name="message" rows="4">Hello, I'm interested in <?=$properties[0]->title;?></textarea>
                    <small class="form-text text-danger message"></small>
                  </div>
                  <div class="form-group form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="exampleCheck3">
                    <label class="form-check-label fs-13" for="exampleCheck3">Egestas fringilla phasellus faucibus
                      scelerisque eleifend donec.</label>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block rounded" id="nz-submit">Request Info</button>
                </form>
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
    