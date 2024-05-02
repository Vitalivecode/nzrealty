    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15"><?=(isset($properties) && $properties != false)?$properties[0]->title:'Add new property';?>
                </h2>
                <p class="mb-1">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
            </div>
            <div class="collapse-tabs new-property-step">
                <ul class="nav nav-pills border py-2 px-3 mb-6 d-none d-md-flex mb-6"
                    role="tablist">
                    <li class="nav-item col">
                        <a class="nav-link active bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="propertyinfo-tab" data-toggle="pill" data-number="1."
                           href="#propertyinfo"
                           role="tab"
                           aria-controls="propertyinfo" aria-selected="true"><span class="number">1.</span> Property Info</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="locationprice-tab"
                           data-toggle="pill" data-number="2."
                           href="#locationprice"
                           role="tab"
                           aria-controls="locationprice" aria-selected="false"><span class="number">2.</span> Location & Price</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="mediaamenities-tab"
                           data-toggle="pill" data-number="3."
                           href="#mediaamenities"
                           role="tab"
                           aria-controls="mediaamenities" aria-selected="false"><span class="number">3.</span> Media & Amenities</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="scheduling-tab"
                           data-toggle="pill" data-number="4."
                           href="#scheduling"
                           role="tab"
                           aria-controls="scheduling" aria-selected="false"><span class="number">4.</span> Visiting Schedules</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="checkout-tab"
                           data-toggle="pill" data-number="5."
                           href="#checkout"
                           role="tab"
                           aria-controls="checkout" aria-selected="false"><span class="number">5.</span> Checkout</a>
                    </li>
                </ul>
                <div class="tab-content shadow-none p-0">
                    <form class="form" method="post" action="#" data-action="<?=base_url('myaccount/add-property/add');?>" enctype="multipart/form-data" id="nzform" autocomplete="off">
                        <div id="collapse-tabs-accordion">
                            <div class="tab-pane tab-pane-parent fade show active px-0" id="propertyinfo" role="tabpanel" aria-labelledby="propertyinfo-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                         id="heading-propertyinfo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                    data-toggle="collapse" data-number="1."
                                                    data-target="#propertyinfo-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="propertyinfo-collapse">
                                                <span class="number">1.</span> Property Info
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="propertyinfo-collapse" class="collapse show collapsible"
                                         aria-labelledby="heading-propertyinfo"
                                         data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="form-group">
                                                                <label for="property-type" class="text-heading">Type</label>
                                                                <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="property-type" name="property_type">
                                                                    <option value="residential" <?=(isset($properties) && $properties != false && $properties[0]->p_type == 'residential')?'selected':'';?>>Residential</option>
                                                                    <option value="commercial" <?=(isset($properties) && $properties != false && $properties[0]->p_type == 'commercial')?'selected':'';?>>Commercial</option>
                                                                </select>
                                                                <small class="form-text text-danger property_type"></small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="property-type" class="text-heading">Property Type</label>
                                                                <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="property-type" name="property_type">
                                                                    <option value="apartment">Apartment</option>
                                                                    <option value="house">House</option>
                                                                    <option value="villa">Villa</option>
                                                                    <option value="unit">Unit</option>
                                                                </select>
                                                                <small class="form-text text-danger property_type"></small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="title" class="text-heading">Title <span class="text-muted">(mention address as title)</span></label>
                                                                <input type="text" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->title:'';?>" <?=(isset($properties) && $properties != false && $properties[0]->title != '')?'disabled':'';?> id="title" name="title">
                                                                <small class="form-text text-danger title"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                                <div class="col-lg-8">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="bedrooms" class="text-heading">Bedrooms</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->bedrooms:'';?>" id="bedrooms" name="bedrooms">
                                                                        <small class="form-text text-danger bedrooms"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="bathrooms" class="text-heading">Bathrooms</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->bathrooms:'';?>" id="bathrooms" name="bathrooms">
                                                                        <small class="form-text text-danger bathrooms"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="parkings" class="text-heading">Garage</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->parkings:'';?>" id="parkings" name="parkings">
                                                                        <small class="form-text text-danger parkings"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="carport" class="text-heading">Car Port</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="" id="carport" name="carport">
                                                                        <small class="form-text text-danger carport"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="offshoreparking" class="text-heading">Off-street carpark</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->offshoreparking:'';?>" id="offshoreparking" name="offshoreparking">
                                                                        <small class="form-text text-danger offshoreparking"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="afrom" class="text-heading">Available From </label>
                                                                        <input type="date" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->available_from:'';?>" id="afrom" name="afrom">
                                                                        <small class="form-text text-danger afrom"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group mb-0">
                                                                        <label for="build_year" class="text-heading">Year Built</label>
                                                                        <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="build_year" name="build_year">
                                                                            <?php $year = date('Y'); for($y = $year; $y >= '1900'; $y--){ ?>
                                                                            <option value="<?=$y;?>" <?=(isset($properties) && $properties != false && $properties[0]->built_year == $y)?'selected':'';?>><?=$y;?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <small class="form-text text-danger build_year"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="area" class="text-heading">Area size (in SQMT)</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->sqft:'';?>" id="area" name="area">
                                                                        <small class="form-text text-danger area"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="tenants" class="text-heading">Max No. of Tenants</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="" id="tenants" name="tenants">
                                                                        <small class="form-text text-danger tenants"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="form-group">
                                                                <label for="description" class="text-heading">Description</label>
                                                                <textarea class="form-control border-0" rows="5" name="description" id="description" placeholder="Atleast 1 line or few words"><?=(isset($properties) && $properties != false)?$properties[0]->description:'';?></textarea>
                                                                <small class="form-text text-danger description"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="button" class="btn btn-lg btn-primary next-button">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="locationprice"
                                 role="tabpanel"
                                 aria-labelledby="locationprice-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                         id="heading-locationprice">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                    data-toggle="collapse" data-number="2."
                                                    data-target="#locationprice-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="locationprice-collapse">
                                                <span class="number">2.</span> Media
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="locationprice-collapse" class="collapse collapsible"
                                         aria-labelledby="heading-locationprice"
                                         data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-3 text-heading fs-22 lh-15">Listing Location</h3>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="address" class="text-heading">Address</label>
                                                                        <div class="input-group mb-3">
                                                                          <input type="text" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->address:'';?>" id="address" name="address" aria-label="Address" aria-describedby="button-addon2">
                                                                          <div class="input-group-append">
                                                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-location-arrow"></i></button>
                                                                          </div>
                                                                        </div>
                                                                        <small class="form-text text-danger address"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="region" class="text-heading">Region</label>
                                                                        <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" data-live-search="true" id="region" name="region">
                                                                            <?php if($regions != false){ foreach($regions as $region){ ?>
                                                                            <option value="<?=$region->sno;?>" <?=(isset($properties) && $properties != false && $properties[0]->region == $region->sno)?'selected':'';?>><?=$region->region_name;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <small class="form-text text-danger region"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="district" class="text-heading">Disrtict</label>
                                                                        <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="district" name="district">
                                                                            <?php if(isset($districts) && $districts != false){ foreach($districts as $district){ ?>
                                                                            <option value="<?=$district->sno;?>" <?=(isset($properties) && $properties != false && $properties[0]->district == $district->sno)?'selected':'';?>><?=$district->district;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <small class="form-text text-danger district"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="suburb" class="text-heading">Suburb</label>
                                                                        <select class="form-control border-0 shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="suburb" name="suburb">
                                                                            <?php if(isset($suburbs) && $suburbs != false){ foreach($suburbs as $suburb){ ?>
                                                                            <option value="<?=$suburb->sno;?>" <?=(isset($properties) && $properties != false && $properties[0]->suburb == $suburb->sno)?'selected':'';?>><?=$suburb->suburb;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <small class="form-text text-danger suburb"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="zip" class="text-heading">Post code</label>
                                                                        <input type="text" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->zip:'';?>" id="zip" name="zip">
                                                                        <small class="form-text text-danger zip"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            
                                                            
                                                            <div class="pac-card" id="pac-card">
                                                              <div>
                                                                <div id="title">Countries</div>
                                                                <div id="country-selector" class="pac-controls">
                                                                  <input type="radio" name="type" id="changecountry-usa" />
                                                                  <label for="changecountry-usa">USA</label>
                                                        
                                                                  <input
                                                                    type="radio"
                                                                    name="type"
                                                                    id="changecountry-usa-and-uot"
                                                                    checked="checked"
                                                                  />
                                                                  <label for="changecountry-usa-and-uot"
                                                                    >USA and unincorporated organized territories</label
                                                                  >
                                                                </div>
                                                              </div>
                                                              <div id="pac-container">
                                                                <input id="pac-input" type="text" placeholder="Enter a location" />
                                                              </div>
                                                            </div>
                                                            <div id="map"></div>
                                                            <div id="infowindow-content">
                                                              <img src="" width="16" height="16" id="place-icon" />
                                                              <span id="place-name" class="title"></span><br />
                                                              <span id="place-address"></span>
                                                            </div>
                                                            
                                                            
                                                            
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Property Price</h3>
                                                            <div class="form-row mx-n2">
                                                            <!--
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="aprice" class="text-heading">Actual Price in <?=currency();?> <span class="text-muted">(weekly)</span></label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->actual_price:'';?>" step="any" id="aprice" name="aprice">
                                                                        <small class="form-text text-danger aprice"></small>
                                                                    </div>
                                                                </div>
                                                            -->
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="oprice" class="text-heading">Price in <?=currency();?> <span class="text-muted">(weekly)</span></label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($properties) && $properties != false)?$properties[0]->price:'';?>" step="any" id="oprice" name="oprice">
                                                                        <small class="form-text text-danger oprice"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="bond" class="text-heading">Bond in <?=currency();?> </label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="" step="any" id="bond" name="bond">
                                                                        <small class="form-text text-danger aprice"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="javascript:void(0);"
                                                   class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button type="button" class="btn btn-lg btn-primary next-button mb-3">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="mediaamenities" role="tabpanel"
                                 aria-labelledby="mediaamenities-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                         id="heading-mediaamenities">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                                    data-toggle="collapse" data-number="3."
                                                    data-target="#mediaamenities-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="mediaamenities-collapse">
                                                <span class="number">3.</span> Location
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="mediaamenities-collapse" class="collapse collapsible"
                                         aria-labelledby="heading-mediaamenities"
                                         data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <?php if(isset($gallery) && !empty($gallery['normal'])){ $thumbnail = $gallery['thumbnail']; } ?>
                                                            <div class="row">
                                                                <div class="col-md-<?=(isset($thumbnail) && !empty($thumbnail))?10:12;?>">
                                                                    <div class="form-group mb-5">
                                                                        <label for="property-thumbnail" class="text-heading">Property Thumbnail</label>
                                                                        <input type="file" class="form-control form-control-lg border-0" id="property-thumbnail" accept="image/*" name="property_thumbnail">
                                                                        <small class="form-text text-danger property_thumbnail"></small>
                                                                    </div>
                                                                </div>
                                                                <?php if(isset($thumbnail) && !empty($thumbnail)){ ?>
                                                                <div class="col-md-2">
                                                                    <div class="d-none d-md-inline-block mt-5"></div>
                                                                    <img src="<?=base_url('uploads/small/'.$thumbnail[0]);?>" class="pt-2" width="100%" />
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            <h3 class="card-title mb-5 text-heading fs-22 lh-15">Upload photos of your property</h3>
                                                            <div class="dropzone upload-file text-center py-3" data-uploader="<?=(isset($properties) && $properties != false && (isset($gallery) && !empty($gallery['normal'])))?'update':'true';?>" id="myDropzone" data-uploader-url="<?=base_url('myaccount/upload');?>">
                                                                <div class="dz-default dz-message">
                                                                    <span class="upload-icon lh-1 d-inline-block mb-2"><i class="fal fa-cloud-upload-alt"></i></span>
                                                                    <p class="text-heading fs-22 lh-15 mb-2">Drag and drop image or</p>
                                                                    <button class="btn btn-indigo px-7 mb-2" type="button">Browse file</button>
                                                                    <input type="file" hidden>
                                                                    <p>Photos must be JPEG or PNG format and least 1200x800</p>
                                                                    <small class="form-text text-danger property_pics"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if($amenities != false){ ?>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Amenities</h3>
                                                            <p class="card-text mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                                            <div class="row">
                                                                <div class="col-sm-6 col-lg-6">
                                                                    <ul class="list-group list-group-no-border">
                                                                        <?php $no=1; foreach($amenities as $amenity){ if($no%2 == 1){  ?>
                                                                        <li class="list-group-item px-0 pt-0 pb-2">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" <?=(isset($properties) && $properties != false && in_array($amenity->sno, explode(',',$properties[0]->aminities)))?'checked':'';?> name="features[]" value="<?=$amenity->sno;?>" id="<?=$amenity->name;?>">
                                                                                <label class="custom-control-label" for="<?=$amenity->name;?>"><?=ucwords($amenity->name);?></label>
                                                                            </div>
                                                                        </li>
                                                                        <?php } $no++; } ?>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6 col-lg-6">
                                                                    <ul class="list-group list-group-no-border">
                                                                        <?php $no=1; foreach($amenities as $amenity){ if($no%2 == 0){  ?>
                                                                        <li class="list-group-item px-0 pt-0 pb-2">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" <?=(isset($properties) && $properties != false && in_array($amenity->sno, explode(',',$properties[0]->aminities)))?'checked':'';?> name="features[]" value="<?=$amenity->sno;?>" id="<?=$amenity->name;?>">
                                                                                <label class="custom-control-label" for="<?=$amenity->name;?>"><?=ucwords($amenity->name);?></label>
                                                                            </div>
                                                                        </li>
                                                                        <?php } $no++; } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h3 class="card-title mt-5 mb-0 text-heading fs-22 lh-15">Additional Features</h3>
                                                            <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-lg-12">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <fieldset class="form-group">
                                                                        <div class="row">
                                                                          <div class="col-form-label col-sm-4 pt-0">Furnished</div>
                                                                          <div class="col-sm-2">
                                                                            <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="foption" id="foption1" value="yes">
                                                                              <label class="form-check-label" for="foption1">Yes</label>
                                                                            </div>
                                                                          </div>
                                                                          <div class="col-sm-6">
                                                                            <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="foption" id="foption2" value="no">
                                                                              <label class="form-check-label" for="foption2">No</label>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </fieldset>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-sm-12 col-lg-12">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <fieldset class="form-group">
                                                                        <div class="row">
                                                                          <div class="col-form-label col-sm-4 pt-0">Smokers</div>
                                                                          <div class="col-sm-2">
                                                                            <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="soption" id="soption1" value="yes">
                                                                              <label class="form-check-label" for="soption1">Yes</label>
                                                                            </div>
                                                                          </div>
                                                                          <div class="col-sm-6">
                                                                            <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="soption" id="soption2" value="no">
                                                                              <label class="form-check-label" for="soption2">No</label>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-lg-12">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <fieldset class="form-group">
                                                                        <div class="row">
                                                                          <div class="col-form-label col-sm-4 pt-0">Pets</div>
                                                                          <div class="col-sm-2">
                                                                            <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="petoption" id="petoption1" value="yes">
                                                                              <label class="form-check-label" for="petoption1">Yes</label>
                                                                            </div>
                                                                          </div>
                                                                          <div class="col-sm-2">
                                                                            <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="petoption" id="petoption2" value="no">
                                                                              <label class="form-check-label" for="petoption2">No</label>
                                                                            </div>
                                                                          </div>
                                                                          <div class="col-sm-4">
                                                                            <div class="form-check">
                                                                              <input class="form-check-input" type="radio" name="petoption" id="petoption3" value="negotiable">
                                                                              <label class="form-check-label" for="petoption3">Negotiable</label>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="javascript:void(0);"
                                                   class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i
                                                            class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button type="button" class="btn btn-lg btn-primary next-button mb-3">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i
                                                            class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="scheduling" role="tabpanel" aria-labelledby="scheduling-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                         id="heading-scheduling">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                                    data-toggle="collapse" data-number="4."
                                                    data-target="#scheduling-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="scheduling-collapse">
                                                <span class="number">4.</span> Scheduling
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="scheduling-collapse" class="collapse collapsible"
                                         aria-labelledby="heading-scheduling"
                                         data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="card mb-6">
                                                <div class="card-body p-6">
                                                    <h3 class="card-title mb-5 text-heading fs-22 lh-15">Scheduling Detail</h3>
                                                    <div class="row">
                                                        <table class="table table-responsive table-shcedule">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-2">Day(s)</th>
                                                                    <th class="col-md-2">From</th>
                                                                    <th class="col-md-2">To</th>
                                                                    <th class="col-md-2">Slots</th>
                                                                    <th class="col-md-4">Options</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; $date = new DateTime('2022-08-14'); for($days = 7; $days--;) { $day = $date->modify('+1 days')->format('l'); ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="form-control form-control-lg border-0" value="<?=$day;?>" id="<?=strtolower($day);?>" name="schedule[<?=strtolower($day);?>]" placeholder="<?=$day;?>" data-toggle="tooltip" data-placement="top" title="Readonly" readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input type="time" class="form-control form-control-lg border-0" value="<?=(isset($schedule_from) && !empty($schedule_from[$day]))?$schedule_from[$day]:'';?>" id="sfrom" name="schedule[<?=strtolower($day);?>][from]">
                                                                        <small class="form-text text-danger schedule_<?=strtolower($day);?>_from"></small>
                                                                    </td>
                                                                    <td>
                                                                        <input type="time" class="form-control form-control-lg border-0" value="<?=(isset($schedule_to) && !empty($schedule_to[$day]))?$schedule_to[$day]:'';?>" id="sto" name="schedule[<?=strtolower($day);?>][to]">
                                                                        <small class="form-text text-danger schedule_<?=strtolower($day);?>_to"></small>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" min="0" class="form-control form-control-lg border-0" value="<?=(isset($schedule_slot) && !empty($schedule_slot[$day]))?$schedule_slot[$day]:'';?>" id="slots" name="schedule[<?=strtolower($day);?>][slots]">
                                                                        <small class="form-text text-danger schedule_<?=strtolower($day);?>_slots"></small>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);" class="btn btn-primary copy-schedule"><i class="fal fa-copy"></i></a>
                                                                        <a href="javascript:void(0);" class="btn btn-light paste-schedule<?=($no == 1)?'-all':'';?>"><i class="fal fa-paste"></i> Paste<?=($no == 1)?' for all Days':'';?></a>
                                                                        <a href="javascript:void(0);" class="btn btn-warning text-white remove-schedule<?=($no == 1)?'-all':'';?>"><i class="fal fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <?php $no++; } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="javascript:void(0);"
                                                   class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button type="button" class="btn btn-lg btn-primary next-button mb-3">Next step
                                                    <span class="d-inline-block ml-2 fs-16"><i class="fal fa-long-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tab-pane-parent fade px-0" id="checkout" role="tabpanel" aria-labelledby="checkout-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0" id="heading-checkout">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                    data-toggle="collapse" data-number="1."
                                                    data-target="#checkout-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="checkout-collapse">
                                                <span class="number">1.</span> Property Info
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="checkout-collapse" class="collapse show collapsible"
                                         aria-labelledby="heading-checkout"
                                         data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <ul class="list-group list-group-no-border">
                                                                        <li class="list-group-item px-0 pt-0 pb-2">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" <?=(isset($properties) && $properties != false && $properties[0]->featured == 1)?'checked':'';?> value="1" name="featured" id="featured">
                                                                                <label class="custom-control-label" for="featured">Featured - <span class="text-indigo"><?=currency();?>10</span></label>
                                                                                <p><small>Description about featured property listing advantages. This line of text is meant to be treated as fine print.</small></p>
                                                                                <small class="form-text text-danger featured"></small>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item px-0 pt-0 pb-2">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" <?=(isset($properties) && $properties != false && $properties[0]->premium == 1)?'checked':'';?> value="1" name="premium" id="premium">
                                                                                <label class="custom-control-label" for="premium">Premium - <span class="text-orange"><?=currency();?>15</span></label>
                                                                                <p><small>Description about premium property listing advantages. This line of text is meant to be treated as fine print.</small></p>
                                                                                <small class="form-text text-danger premium"></small>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-group-item px-0 pt-0 pb-2">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"  value="1" name="boostinsocial" id="boostinsocial">
                                                                                <label class="custom-control-label" for="boostinsocial">Boost in Social Media - <span class="text-success"><?=currency();?>20</span></label>
                                                                                <p><small>Description about premium property listing advantages. This line of text is meant to be treated as fine print.</small></p>
                                                                                <small class="form-text text-danger boostinsocial"></small>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Checkout</h3>
                                                            <p class="card-text mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                                            <div class="text-sm-right">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="mb-1">Property Listing Charges: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="mb-1">$30</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="mb-1">Featured/Premium Listing Charges: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="mb-1">$10</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="mb-1">Boost in Social Media Charges: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="mb-1">$20</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="mb-1">Sub Total: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="mb-1">$60</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7 grand-total-title mt-4">
                                                                        <h4 class="text-heading fs-22 lh-15">Grand Total : </h4>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5 grand-total-amount mt-4">
                                                                        <h4 class="text-heading fs-22 lh-15">$60</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="javascript:void(0);" class="btn btn-lg bg-hover-white border rounded-lg mb-3 mr-auto prev-button">
                                                    <span class="d-inline-block text-primary mr-2 fs-16"><i class="fal fa-long-arrow-left"></i></span>Prev step
                                                </a>
                                                <button class="btn btn-lg btn-primary mb-3" type="submit" id="nz-submit"><?=(isset($properties) && $properties != false)?'Update':'Submit';?> property</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php if(isset($gallery) && !empty($gallery['normal'])){ $file_list = $old = array(); $images = $gallery['normal']; foreach($images as $image){ $file_path = FCPATH.'uploads/'.$image; $size = filesize($file_path); $file_list[] = array('name' => $image, 'size' => $size, 'path' => base_url('uploads/'.$image)); $old[] = $image;  } $this->session->set_userdata('property_pics', $old); ?>
    <script>
        var galleryResponse = <?=json_encode($file_list);?>;
    </script>
    <?php } ?>
        