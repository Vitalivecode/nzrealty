<?php $logged = $this->session->userdata('logged_in'); ?>
<main id="content">
    <div class="primary-content pt-4">
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
				<section class="pb-5 border-bottom">
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
	                                                <a href="https://api.whatsapp.com/send/?phone=&text=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>&type=phone_number&app_absent=0" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-whatsapp"></i></a>
	                                            </li>
	                                            <li class="list-inline-item ">
	                                                <a href="https://www.facebook.com/sharer.php?u=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-facebook-f"></i></a>
	                                            </li>
	                                            <li class="list-inline-item">
	                                                <a href="https://twitter.com/share?url=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-twitter"></i></a>
	                                            </li>
	                                            <li class="list-inline-item">
	                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=urlencode(base_url('properties/single/'.$properties[0]->accesskey));?>" target="_blank" class="text-muted fs-15 hover-dark lh-1 px-2"><i class="fab fa-linkedin"></i></a>
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
                            <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i>Listed On: <?=date('d-m-Y', strtotime($properties[0]->created_date));?>    <!--    <?=time_elapsed_string($properties[0]->created_date);?> -->
                            </li>
                            <li class="list-inline-item mt-2 mt-sm-0"><i class="fal fa-eye mr-1"></i><?=($views != false)?count($views):0;?> views</li>
                          </ul>
						<ul class="list-inline mb-0 mr-n2 my-4 my-xl-0">
						<!--
						    <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($properties[0]->agent == $logged['id']) && ($properties[0]->role == $logged['role'])){ } else{ ?>
							<li class="list-inline-item mr-2">
								<a href="javascript:void(0);" id="<?=$properties[0]->accesskey;?>" class="wishlist wishlist-text btn btn-outline-light px-3 text-body d-flex align-items-center h-32 border">
									<i class="fa<?=$wishlist?'s':'r';?> fa-heart mr-2 fs-15 text-primary"></i>Save<?=$wishlist?'d':'';?>
								</a>
							</li>
							<?php } ?>
						-->
							<li class="list-inline-item mr-2">
								<a href="#" class="btn btn-outline-light px-3 text-body d-flex align-items-center h-32 border">
									Available From: <?=date('d-m-Y', strtotime($properties[0]->available_from));?>
								</a>
							</li>
						</ul>
					</div>
					<div class="d-sm-flex justify-content-sm-between mb-3">
						<div>
							<h2 class="fs-22 font-weight-400 lh-15 text-heading"><?=str_replace(array('New Zealand','new zealand',', New Zealand',',New Zealand',', new zealand',',new zealand'),'',$properties[0]->address);?></h2>
						</div>
						<div class="text-lg-right">
							<p class="fs-22 text-heading font-weight-bold mb-0"><?=currency();?><?=$properties[0]->price;?><span class="fs-14 font-weight-normal"><?=($properties[0]->duration != '')?'/'.$properties[0]->duration:'';?></span></p>
					<!--	<p class="mb-0"><?=currency();?><?=round(($properties[0]->price/$properties[0]->sqft),2);?>/SqFt</p>    -->
						</div>
					</div>
                      <h4 class="fs-22 text-heading mb-6">Features</h4>
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
                              <svg class="icon icon-shower fs-32 text-primary">
                                <use xlink:href="#icon-shower"></use>
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
                    <!--
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
                    -->
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
                    <!--
                        <div class="col-lg-3 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-family fs-32 text-primary">
                                <use xlink:href="#icon-family"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Type</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading"><?=ucfirst($properties[0]->type);?></p>
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
                    -->
                        <?php if(isset($properties) && $properties != false){ $features = json_decode($properties[0]->features); } ?>
                    <!--
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
                    -->
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
                      
					<p class="mb-0 lh-214"><span style="font-weight: 500;"><?=ucfirst($properties[0]->type);?> | <?=ucfirst($properties[0]->p_type);?></span> - Property ID: RL<?=$properties[0]->accesskey;?> </p>
					<h4 class="fs-18 text-heading my-2"><?=$properties[0]->title;?></h4>
					<p class="mb-0 lh-214" align="justify"><?=strip_tags($properties[0]->description);?></p>
				</section>
				

            <?php if($amenities != false){ ?>
            <section class="pt-5 border-bottom pb-4">
              <h4 class="fs-22 text-heading mb-4">Includes</h4>
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
						<p class="mb-0 p-3 bg-white shadow rounded-lg position-absolute pos-fixed-bottom mb-4 ml-4 lh-17 z-index-2"><?=$properties[0]->address;?></p>
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
                        <a class="nav-link px-3 active" data-toggle="tab" href="#request-info" role="tab" aria-selected="true">Request Info</a>
                      </li>
                      <?php if($user != false && $schedules != false){ ?>
                          <li class="nav-item" role="presentation">
                            <a class="nav-link px-3" data-toggle="tab" href="#schedule" role="tab" aria-selected="false">Book a Viewing</a>
                          </li>
                      <?php } ?>
                    </ul>
                    <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                        <div class="tab-content pt-1 pb-0 px-0 shadow-none">
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
                                        <p class="mb-0 fs-13 mb-0 lh-17"><?=(($user != false) && (isset($user[0]->position)))?ucwords($user[0]->position):'';?></p>
                                        <p class="mb-0 fs-13 mb-0 lh-17"><span class="text-heading d-inline-block ml-0"><?=($user != false)?$user[0]->phone:'';?></span> </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group mb-2">
                                  <input type="text" class="form-control form-control-lg border-0" name="name" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="Full Name*">
                                  <small class="form-text text-danger name"></small>
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                <div class="form-group mb-2">
                                  <input type="email" class="form-control form-control-lg border-0" name="email" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Email*" <?=(isset($logged) && !empty($logged))?'readonly':'';?> >
                                  <small class="form-text text-danger email"></small>
                                </div>
                                <div class="form-group mb-4">
                                  <input type="tel" class="form-control form-control-lg border-0" name="phone" value="" placeholder="Phone">
                                  <small class="form-text text-danger phone"></small>
                                </div>
                        <!--    <p class="fs-12 px-1">Hello, <br>I'm interested in <?=$properties[0]->address;?></p>    -->
                                <div class="form-group mb-4">
                                  <textarea class="form-control border-0" name="message" rows="4">Type your message here..</textarea>
                                  <small class="form-text text-danger message"></small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block rounded" id="nz-submit">Submit </button>
                            </form>
                          </div>
                          <?php if($user != false && $schedules != false){ ?>
                              <div class="tab-pane fade pt-5" id="schedule" role="tabpanel">                
                              <?php if($this->session->userdata('logged_in') && ($user != false && $schedules != false)){ ?>
                                    <form class="form" method="post" action="#" data-action="<?=base_url('properties/schedule');?>" id="nzform" autocomplete="off">
                                    <div class="slick-slider calendar arrow-hide-disable mx-n1" data-slick-options='{"slidesToShow": <?=(count($schedules) > 4)?'4':count($schedules);?>, "autoplay":false,"dots":false}'>
                                      <?php $no = 1; foreach($schedules as $schedule){ ?>
                                      <div class="box px-1 py-4">
                                        <div class="card pointer <?=($no == 1)?'active':'';?> border-0 shadow-xxs-1" data-select="<?=date('Ymd', strtotime($schedule->date));?>" data-date="<?=date('F d, Y', strtotime($schedule->date));?>" data-id="<?=$schedule->sno;?>">
                                          <div class="card-body p-1 text-center">
                                            <p class="day fs-12 text-muted lh-2 mb-0"><?=date('D', strtotime($schedule->date));?></p>
                                            <p class="date fs-18 text-heading lh-173 mb-0 font-weight-bold"><?=date('d', strtotime($schedule->date));?></p>
                                            <p class="month fs-13 letter-spacing-087 mb-0"><?=date('M', strtotime($schedule->date));?></p>
                                          </div>
                                        </div>
                                      </div>
                                      <?php $no++; } ?>
                                      <small class="form-text text-danger sdate"></small>
                                    </div>
                                    <input type="hidden" class="date" name="sdate" value="<?=date('F d, Y', strtotime($schedules[0]->date));?>">
                                <!--
                                    <div class="form-group mb-2">
                                      <input type="time" id="schedule-time" class="form-control border-0 text-body shadow-none" name="time" min="<?=(isset($schedule_from) && !empty($schedule_from[$schedules[0]->date]))?$schedule_from[$schedules[0]->date]:'';?>" max="<?=(isset($schedule_to) && !empty($schedule_to[$schedules[0]->date]))?$schedule_to[$schedules[0]->date]:'';?>" placeholder="Choose a time">
                                      <small class="form-text text-danger time"></small>
                                    </div>
                                -->
                                    <div class="form-group mb-2">
                                        <?php $no = 1; foreach($schedules as $schedule){ if($no === 1){ ?>
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="radio" name="schedule" id="schedule-time" value="<?=$schedule->sno;?>">
                                              <label class="form-check-label" id="schedule-label" for="schedule-time"><?=date('h:i A',strtotime($schedule->from_time));?> to <?=date('h:i A',strtotime($schedule->to_time));?></label>
                                            </div>
                                        <?php } $no++; } ?>
                                      <small class="form-text text-danger time"></small>
                                    </div>
                                    <div class="form-group mb-2">
                                      <input type="text" class="form-control form-control-lg border-0" name="name" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="Full Name*">
                                      <small class="form-text text-danger name"></small>
                                    </div>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                    <div class="form-group mb-2">
                                      <input type="email" class="form-control form-control-lg border-0" name="email" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Email*" <?=(isset($logged) && !empty($logged))?'readonly':'';?>>
                                      <small class="form-text text-danger email"></small>
                                    </div>
                                    <div class="form-group mb-4">
                                      <input type="tel" class="form-control form-control-lg border-0" name="phone" value="" placeholder="Phone">
                                      <small class="form-text text-danger phone"></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded" id="nz-submit">Submit </button>
                                </form>
                                <?php } else{ ?>
                                    <p>Please login to view schedules or to book a viewing</p>
                                    <a class="btn btn-primary btn-lg text-white rounded-lg bg-hover-primary border-hover-primary hover-white d-none d-lg-block" data-toggle="modal" href="#user-register-modal">Login</a>
                                <?php } ?>
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
                    <div id="map-list" class="container">
                      <div class="col-xl-12">
                        <h4 class="fs-22 text-heading font-weight-normal mb-3">What's Nearby</h4>
                        <ul class="nav nav-pills mb-6 tabs-03" role="tablist">
                          <li class="nav-item pr-xl-9 pr-6" role="presentation">
                            <a class="nav-link active letter-spacing-1 px-0 py-1" id="pills-maps-tab" data-toggle="pill" href="#pills-maps" role="tab" aria-controls="pills-maps" aria-selected="true">Map</a>
                          </li>
                          <li class="nav-item pr-xl-9 pr-6" role="presentation">
                            <a class="nav-link letter-spacing-1 px-0 py-1" id="pills-restaurants-tab" data-toggle="pill" href="#pills-restaurants" role="tab" aria-controls="pills-restaurants" aria-selected="true">Restaurants</a>
                          </li>
                          <li class="nav-item pr-xl-9 pr-6" role="presentation">
                            <a class="nav-link letter-spacing-1 px-0 py-1" id="pills-schools-tab" data-toggle="pill" href="#pills-schools" role="tab" aria-controls="pills-schools" aria-selected="false">Schools</a>
                          </li>
                          <li class="nav-item pr-xl-9 pr-6" role="presentation">
                            <a class="nav-link letter-spacing-1 px-0 py-1" id="pills-health-tab" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-health" aria-selected="false">Health & Medicals</a>
                          </li>
                          <li class="nav-item pr-xl-9 pr-6" role="presentation">
                            <a class="nav-link letter-spacing-1 px-0 py-1" id="pills-transportation-tab" data-toggle="pill" href="#pills-transportation" role="tab" aria-controls="pills-transportation" aria-selected="false">Transportation</a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-content p-0 shadow-none">
                        <div class="tab-pane fade show active" id="pills-maps" role="tabpanel" aria-labelledby="pills-maps-tab">
                          <div class="row">
                            <div class="col-lg-12">
                                <div id="map-01" class="mapbox-gl map-point-animate"  style="height:488px;"
            						     data-mapbox-access-token="<?=mapbox_token;?>"
            						     data-marker-target="#maps-nearby"
            						     data-mapbox-options='{"center":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"zoom": 12,"container":"map-01"}'
            						     data-mapbox-marker='[{"position":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('google-market-06.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}]'
            						     data-marker-directions='true'
            						     >
                                </div>
                            </div>
                          </div>
                        </div>
                        <?php if((!empty($restaurants)) && ($restaurants != false)){ ?>
                        <div class="tab-pane fade" id="pills-restaurants" role="tabpanel" aria-labelledby="pills-restaurants-tab">
                          <div class="row">
                            <div class="col-lg-3 pr-xl-1">
                              <ul class="list-group list-group-flush shadow-xxs-5 pb-lg-9 mb-lg-0 mb-6">
                                <?php foreach($restaurants as $restaurant){ ?>
                                    <li class="list-group-item pt-xl-4 pb-xl-4 pl-xl-4">
                                      <h4 class="fs-14 text-heading lh-173"><?=$restaurant->text;?></h4>
                                      <p class="fs-12 mb-0"><?=$restaurant->place_name;?></p>
                                    </li>
                                <?php } ?>
                              </ul>
                            </div>
                            <div class="col-lg-9">
                                <div id="map-02" class="mapbox-gl map-point-animate"  style="height:488px;"
            						     data-mapbox-access-token="<?=mapbox_token;?>"
            						     data-marker-target="#restaurants-nearby"
            						     data-mapbox-options='{"center":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"zoom": 12,"container":"map-02"}'
            						     data-mapbox-marker='[{"position":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('google-market-06.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php foreach($restaurants as $restaurant){ ?>
            						        ,{"position":[<?=($restaurant->center)[0];?>, <?=($restaurant->center)[1];?>],"className":"marker","backgroundImage":"<?=pic('google-marker-07.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php } ?>]'>
                                </div>
                                <div class="d-none" id="restaurants-nearby">
                                    <?php foreach($restaurants as $restaurant){ ?>
                                        <div class="marker-item" data-icon-marker="<?=pic('google-marker-07.png');?>" data-position="[<?=($restaurant->center)[0];?>, <?=($restaurant->center)[1];?>]" data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property","maxWidth":"269px"}}'>
                                          <div class="card border-0 ">
                                              <div class="card-body px-2 py-1">
                                                <h2 class="fs-16 mb-1"><a href="javascript:void(0);" class="text-dark hover-primary"><?=$restaurant->text;?></a></h2>
                                                <p class="font-weight-500 text-gray-light mb-0"><?=$restaurant->place_name;?></p>
                                              </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        <?php if((!empty($schools)) && ($schools != false)){ ?>
                        <div class="tab-pane fade" id="pills-schools" role="tabpanel" aria-labelledby="pills-schools-tab">
                          <div class="row">
                            <div class="col-lg-3 pr-xl-1">
                              <ul class="list-group list-group-flush shadow-xxs-5 pb-lg-9 mb-lg-0 mb-6">
                                <?php foreach($schools as $school){ ?>
                                    <li class="list-group-item pt-xl-4 pb-xl-4 pl-xl-4">
                                      <h4 class="fs-14 text-heading lh-173"><?=$school->text;?></h4>
                                      <p class="fs-12 mb-0"><?=$school->place_name;?></p>
                                    </li>
                                <?php } ?>
                              </ul>
                            </div>
                            <div class="col-lg-9">
                              <div id="map-03" class="mapbox-gl map-point-animate"  style="height:488px;"
            						     data-mapbox-access-token="<?=mapbox_token;?>"
            						     data-marker-target="#schools-nearby"
            						     data-mapbox-options='{"center":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"zoom": 12,"container":"map-03"}'
            						     data-mapbox-marker='[{"position":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('google-market-06.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php foreach($schools as $school){ ?>
            						        ,{"position":[<?=($school->center)[0];?>, <?=($school->center)[1];?>],"className":"marker","backgroundImage":"<?=pic('google-marker-07.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php } ?>]'>
                                </div>
                                <div class="d-none" id="schools-nearby">
                                    <?php foreach($schools as $school){ ?>
                                        <div class="marker-item" data-icon-marker="<?=pic('google-marker-07.png');?>" data-position="[<?=($school->center)[0];?>, <?=($school->center)[1];?>]" data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property","maxWidth":"269px"}}'>
                                          <div class="card border-0 ">
                                              <div class="card-body px-2 py-1">
                                                <h2 class="fs-16 mb-1"><a href="javascript:void(0);" class="text-dark hover-primary"><?=$school->text;?></a></h2>
                                                <p class="font-weight-500 text-gray-light mb-0"><?=$school->place_name;?></p>
                                              </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        <?php if((!empty($hospitals)) && ($hospitals != false)){ ?>
                        <div class="tab-pane fade" id="pills-health" role="tabpanel" aria-labelledby="pills-health-tab">
                          <div class="row">
                            <div class="col-lg-3 pr-xl-1">
                              <ul class="list-group list-group-flush shadow-xxs-5 pb-lg-9 mb-lg-0 mb-6">
                                <?php foreach($hospitals as $hospital){ ?>
                                    <li class="list-group-item pt-xl-4 pb-xl-4 pl-xl-4">
                                      <h4 class="fs-14 text-heading lh-173"><?=$hospital->text;?></h4>
                                      <p class="fs-12 mb-0"><?=$hospital->place_name;?></p>
                                    </li>
                                <?php } ?>
                              </ul>
                            </div>
                            <div class="col-lg-9">
                              <div id="map-04" class="mapbox-gl map-point-animate"  style="height:488px;"
            						     data-mapbox-access-token="<?=mapbox_token;?>"
            						     data-marker-target="#hospitals-nearby"
            						     data-mapbox-options='{"center":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"zoom": 12,"container":"map-04"}'
            						     data-mapbox-marker='[{"position":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('google-market-06.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php foreach($hospitals as $hospital){ ?>
            						        ,{"position":[<?=($hospital->center)[0];?>, <?=($hospital->center)[1];?>],"className":"marker","backgroundImage":"<?=pic('google-marker-07.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php } ?>]'>
                                </div>
                                <div class="d-none" id="hospitals-nearby">
                                    <?php foreach($hospitals as $hospital){ ?>
                                        <div class="marker-item" data-icon-marker="<?=pic('google-marker-07.png');?>" data-position="[<?=($hospital->center)[0];?>, <?=($hospital->center)[1];?>]" data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property","maxWidth":"269px"}}'>
                                          <div class="card border-0 ">
                                              <div class="card-body px-2 py-1">
                                                <h2 class="fs-16 mb-1"><a href="javascript:void(0);" class="text-dark hover-primary"><?=$hospital->text;?></a></h2>
                                                <p class="font-weight-500 text-gray-light mb-0"><?=$hospital->place_name;?></p>
                                              </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        <?php if((!empty($transportations)) && ($transportations != false)){ ?>
                        <div class="tab-pane fade" id="pills-transportation" role="tabpanel" aria-labelledby="pills-transportation-tab">
                          <div class="row">
                            <div class="col-lg-3 pr-xl-1">
                              <ul class="list-group list-group-flush shadow-xxs-5 pb-lg-9 mb-lg-0 mb-6">
                                <?php foreach($transportations as $transportation){ ?>
                                    <li class="list-group-item pt-xl-4 pb-xl-4 pl-xl-4">
                                      <h4 class="fs-14 text-heading lh-173"><?=$transportation->text;?></h4>
                                      <p class="fs-12 mb-0"><?=$transportation->place_name;?></p>
                                    </li>
                                <?php } ?>
                              </ul>
                            </div>
                            <div class="col-lg-9">
                              <div id="map-05" class="mapbox-gl map-point-animate"  style="height:488px;"
            						     data-mapbox-access-token="<?=mapbox_token;?>"
            						     data-marker-target="#transportations-nearby"
            						     data-mapbox-options='{"center":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"zoom": 12,"container":"map-05"}'
            						     data-mapbox-marker='[{"position":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('google-market-06.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php foreach($transportations as $transportation){ ?>
            						        ,{"position":[<?=($transportation->center)[0];?>, <?=($transportation->center)[1];?>],"className":"marker","backgroundImage":"<?=pic('google-marker-07.png');?>","backgroundRepeat":"no-repeat","width":"48px","height":"51px"}
            						     <?php } ?>]'>
                                </div>
                                <div class="d-none" id="transportations-nearby">
                                    <?php foreach($transportations as $transportation){ ?>
                                        <div class="marker-item" data-icon-marker="<?=pic('google-marker-07.png');?>" data-position="[<?=($transportation->center)[0];?>, <?=($transportation->center)[1];?>]" data-marker-style='{"className":"marker","style":{"width":"45px","height":"48px"},"popup":{"className":"popup-map-property","maxWidth":"269px"}}'>
                                          <div class="card border-0 ">
                                              <div class="card-body px-2 py-1">
                                                <h2 class="fs-16 mb-1"><a href="javascript:void(0);" class="text-dark hover-primary"><?=$transportation->text;?></a></h2>
                                                <p class="font-weight-500 text-gray-light mb-0"><?=$transportation->place_name;?></p>
                                              </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </section>
    
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
    <?php //$schedule_list = array(); if($schedules != false){ foreach($schedules as $schedule) { $shortday = date('Ymd', strtotime($schedule->date)); $min = (isset($schedule_from) && !empty($schedule_from[$schedule->date]))?date('h:i A',strtotime($schedule_from[$schedule->date])):''; $max = (isset($schedule_to) && !empty($schedule_to[$schedule->date]))?date('h:i A',strtotime($schedule_to[$schedule->date])):''; $schedule_list[$shortday][] = array('min' => $min, 'max' => $max); } } ?>
    <?php $schedule_list = array(); if($schedules != false){ foreach($schedules as $schedule) { $shortday = $schedule->sno; $min = (isset($schedule_from) && !empty($schedule_from[$shortday]))?date('h:i A',strtotime($schedule_from[$shortday])):''; $max = (isset($schedule_to) && !empty($schedule_to[$shortday]))?date('h:i A',strtotime($schedule_to[$shortday])):''; $schedule_list[$shortday][] = array('min' => $min, 'max' => $max); } } ?>
    <script>
        var schedule = <?=json_encode($schedule_list);?>;
        var lat = -43.3744881;
        var lng = 172.4662705;
    </script>
    