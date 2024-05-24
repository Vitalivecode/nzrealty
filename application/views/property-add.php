    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6 my-profile">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15"><?=(isset($properties) && $properties != false)?$properties[0]->title:'Add new property';?></h2>
            </div>
            <form class="form" method="post" action="#" data-action="<?=base_url('myaccount/add-property/add');?>" enctype="multipart/form-data" id="nzform" autocomplete="off">
                <div class="collapse-tabs new-property-step">
                    <ul class="nav nav-pills border-0 py-2 px-0 mb-6 d-none d-md-flex mb-6" role="tablist">
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
                           aria-controls="locationprice" aria-selected="false"><span class="number">2.</span> Price & Details</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="mediaamenities-tab"
                           data-toggle="pill" data-number="3."
                           href="#mediaamenities"
                           role="tab"
                           aria-controls="mediaamenities" aria-selected="false"><span class="number">3.</span> Images & Location</a>
                    </li>
            <!--
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="scheduling-tab"
                           data-toggle="pill" data-number="4."
                           href="#scheduling"
                           role="tab"
                           aria-controls="scheduling" aria-selected="false"><span class="number">4.</span> Viewing Schedules</a>
                    </li>
            -->
                    <li class="nav-item col">
                        <a class="nav-link bg-transparent shadow-none py-2 font-weight-500 text-center lh-214 d-block"
                           id="checkout-tab"
                           data-toggle="pill" data-number="4."
                           href="#checkout"
                           role="tab"
                           aria-controls="checkout" aria-selected="false"><span class="number">4.</span> Add-ons & Submit</a>
                    </li>
                </ul>
                    <div class="tab-content shadow-none p-0">
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
                                                                <label for="type" class="text-heading">Property Type*</label>
                                                                <select class="form-control border shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="type" name="type">
                                                                    <option value="residential" <?=(isset($properties) && $properties != false && $properties[0]->type == 'residential')?'selected':(($this->uri->segment(2) == 'add-property')?'selected':'');?>>Residential</option>
                                                                    <option value="commercial" <?=(isset($properties) && $properties != false && $properties[0]->type == 'commercial')?'selected':'';?>>Commercial</option>
                                                                </select>
                                                                <small class="form-text text-danger type"></small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="property-type" class="text-heading">Property Category*</label>
                                                                <select class="form-control border shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" data-live-search="true" id="property-type" name="property_type">
                                                                    <?php if(!empty($property_type) && !empty($property_type['residential'])){ foreach($property_type['residential'] as $residential){ ?>
                                                					    <option class="residential" value="<?=strtolower(str_replace(array(' ','/',';'),'',$residential));?>" <?=(isset($properties) && $properties != false && $properties[0]->p_type === strtolower(str_replace(array(' ','/',';'),'',$residential)))?'selected':'';?>><?=ucwords($residential);?></option>
                                                					<?php } } if(!empty($property_type) && !empty($property_type['commercial'])){ foreach($property_type['commercial'] as $commercial){ ?>
                                                                        <option class="commercial" value="<?=strtolower(str_replace(array(' ','/',';'),'',$commercial));?>" <?=(isset($properties) && $properties != false && $properties[0]->p_type === strtolower(str_replace(array(' ','/',';'),'',$commercial)))?'selected':'';?>><?=ucwords($commercial);?></option>
                                                                    <?php } } ?>
                                                                </select>
                                                                <small class="form-text text-danger property_type"></small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="propertyStatus" class="text-heading">Property Status</label>
                                                                <select class="form-control form-control-lg border selectpicker" id="propertyStatus" <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Rented')?'':'name="property_status"';?> <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Rented')?'disabled':'';?>>
                                                                    <option value="Available" <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Available')?'selected':'';?>>Available</option>
                                                                    <option value="Withdrawn" <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Withdrawn')?'selected':'';?>>Withdrawn</option>
                                                                    <option value="Rented" <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Rented')?'selected':'';?>>Rented</option>
                                                                </select>
                                                                <small class="form-text text-danger property_status"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                                <div class="col-lg-8 residential <?=(isset($properties) && $properties != false && $properties[0]->type == 'commercial')?'d-none':'';?>">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="bedrooms" class="text-heading">Bedrooms*</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->bedrooms:'';?>" id="bedrooms" name="bedrooms">
                                                                        <small class="form-text text-danger bedrooms"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="bathrooms" class="text-heading">Bathrooms*</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->bathrooms:'';?>" id="bathrooms" name="bathrooms">
                                                                        <small class="form-text text-danger bathrooms"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="garage" class="text-heading">Carparks</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->parkings:'';?>" id="garage" name="garage">
                                                                        <small class="form-text text-danger garage"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="carport" class="text-heading">Carport</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->carport:'';?>" id="carport" name="carport">
                                                                        <small class="form-text text-danger carport"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="offshoreparking" class="text-heading">Off-street carpark</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->offshoreparking:'';?>" id="offshoreparking" name="offshoreparking">
                                                                        <small class="form-text text-danger offshoreparking"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="afrom" class="text-heading">Available From*</label>
                                                                        <input type="date" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->available_from:'';?>" id="afrom" name="afrom">
                                                                        <small class="form-text text-danger afrom"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group mb-0">
                                                                        <label for="build_year" class="text-heading">Year Built</label>
                                                                        <select class="form-control border shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" id="build_year" name="build_year">
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
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->sqft:'';?>" id="area" name="area">
                                                                        <small class="form-text text-danger area"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="tenants" class="text-heading">Max No. of Tenants</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->tenants:'';?>" id="tenants" name="tenants">
                                                                        <small class="form-text text-danger tenants"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 commercial <?=(isset($properties) && $properties != false && $properties[0]->type == 'commercial')?'':'d-none';?>">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="floor_area" class="text-heading">Floor Area (in m<sup>2</sup>)*</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->floor_area:'';?>" id="floor_area" name="floor_area">
                                                                        <small class="form-text text-danger floor_area"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="larea" class="text-heading">Land Area (in m<sup>2</sup>)</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->sqft:'';?>" id="larea" name="larea">
                                                                        <small class="form-text text-danger larea"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="parkings" class="text-heading">Carparks</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->parkings:'';?>" id="parkings" name="parkings">
                                                                        <small class="form-text text-danger parkings"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="toilets" class="text-heading">Toilets</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->toilets:'';?>" id="toilets" name="toilets">
                                                                        <small class="form-text text-danger toilets"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="cbathrooms" class="text-heading">Bathrooms</label>
                                                                        <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->bathrooms:'';?>" id="cbathrooms" name="cbathrooms">
                                                                        <small class="form-text text-danger cbathrooms"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="cafrom" class="text-heading">Available From*</label>
                                                                        <input type="date" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->available_from:'';?>" id="cafrom" name="cafrom">
                                                                        <small class="form-text text-danger cafrom"></small>
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
                                                            <div class="row">
                                                            <!--
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="applyLink" class="text-heading">Apply Button Link <span class="text-muted">(Optional)</span></label>
                                                                        <div class="input-group">
                                                                          <input type="text" class="form-control form-control-lg border" name="apply_link" placeholder="Enter apply link here.." id="applyLink" aria-label="Enter apply link here.." value="<?=(isset($properties) && $properties != false)?$properties[0]->apply_link:'';?>" aria-describedby="basic-addon2">
                                                                        </div>
                                                                        <small class="form-text text-danger apply_link"></small>
                                                                    </div>
                                                                </div>
                                                            -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title" class="text-heading">Title</label>
                                                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->title:'';?>" <?=(isset($properties) && $properties != false && $properties[0]->title != '')?'disabled':'';?> id="title" name="title">
                                                                        <small class="form-text text-danger title"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description" class="text-heading">Description*</label>
                                                                <textarea class="form-control border" rows="5" name="description" id="description" placeholder="Atleast 1 line or few words"><?=(isset($properties) && $properties != false)?$properties[0]->description:'';?></textarea>
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
                            <div class="tab-pane tab-pane-parent fade px-0" id="locationprice" role="tabpanel" aria-labelledby="locationprice-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                         id="heading-locationprice">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                    data-toggle="collapse" data-number="2."
                                                    data-target="#locationprice-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="locationprice-collapse">
                                                <span class="number">2.</span> Price & Details
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="locationprice-collapse" class="collapse collapsible"
                                         aria-labelledby="heading-locationprice"
                                         data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="row">
                                                        <div class="residential w-100 <?=(isset($properties) && $properties != false && $properties[0]->type == 'commercial')?'d-none':'';?>">
                                                            <div class="card mb-6">
                                                                <div class="card-body p-6">
                                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">Property Price</h3>
                                                                    <div class="form-row mx-n2 px-2">
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-6">
                                                                                <div class="form-group">
                                                                                    <label for="oprice" class="text-heading">Rent per week (<?=currency();?>)*</label>
                                                                                    <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->price:'';?>" step="any" id="oprice" name="oprice">
                                                                                    <small class="form-text text-danger oprice"></small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-6">
                                                                                <div class="form-group">
                                                                                    <label for="bond" class="text-heading">Bond (<?=currency();?>) </label>
                                                                                    <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->bond:'';?>" step="any" id="bond" name="bond">
                                                                                    <small class="form-text text-danger bond"></small>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <h3 class="card-title mt-5 mb-0 text-heading fs-22 lh-15">Additional Features <span class="text-muted">(Optional)</span></h3>
                                                                    <div class="row"><?php if(isset($properties) && $properties != false){ $features = json_decode($properties[0]->features); } ?>
                                                                        <div class="col-sm-12 col-lg-12 pt-4">
                                                                            <div class="custom-control custom-checkbox p-0">
                                                                                <fieldset class="form-group">
                                                                                <div class="row">
                                                                                  <div class="col-form-label col-sm-5 pt-0">Pets</div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[pet]" id="petoption1" <?=(isset($features) && !empty($features->pet) && $features->pet == 'yes')?'checked':'';?> value="yes">
                                                                                      <label class="form-check-label" for="petoption1">Yes</label>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[pet]" id="petoption2" <?=(isset($features) && !empty($features->pet) && $features->pet == 'no')?'checked':'';?> value="no">
                                                                                      <label class="form-check-label" for="petoption2">No</label>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-sm-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[pet]" id="petoption3" <?=(isset($features) && !empty($features->pet) && $features->pet == 'negotiable')?'checked':'';?> value="negotiable">
                                                                                      <label class="form-check-label" for="petoption3">Price by Negotiable</label>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12">
                                                                            <div class="custom-control custom-checkbox p-0">
                                                                                <fieldset class="form-group">
                                                                                <div class="row">
                                                                                  <div class="col-form-label col-sm-5 pt-0">Smokers</div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[smokers]" id="soption1" <?=(isset($features) && !empty($features->smokers) && $features->smokers == 'yes')?'checked':'';?> value="yes">
                                                                                      <label class="form-check-label" for="soption1">Yes</label>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[smokers]" <?=(isset($features) && !empty($features->smokers) && $features->smokers == 'no')?'checked':'';?> id="soption2" value="no">
                                                                                      <label class="form-check-label" for="soption2">No</label>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12">
                                                                            <div class="custom-control custom-checkbox p-0">
                                                                                <fieldset class="form-group">
                                                                                <div class="row">
                                                                                  <div class="col-form-label col-sm-5 pt-0">Furnished</div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[furnished]" <?=(isset($features) && !empty($features->furnished) && $features->furnished == 'yes')?'checked':'';?> id="foption1" value="yes">
                                                                                      <label class="form-check-label" for="foption1">Yes</label>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[furnished]" <?=(isset($features) && !empty($features->furnished) && $features->furnished == 'no')?'checked':'';?> id="foption2" value="no">
                                                                                      <label class="form-check-label" for="foption2">No</label>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12">
                                                                            <div class="custom-control custom-checkbox p-0">
                                                                                <fieldset class="form-group">
                                                                                <div class="row">
                                                                                  <div class="col-form-label col-sm-5 pt-0">Healthy Homes Compliant</div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[compliant]" <?=(isset($features) && !empty($features->compliant) && $features->compliant == 'yes')?'checked':'';?> id="hoption1" value="yes">
                                                                                      <label class="form-check-label" for="hoption1">Yes</label>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-sm-2">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[compliant]" <?=(isset($features) && !empty($features->compliant) && $features->compliant == 'no')?'checked':'';?> id="hoption2" value="no">
                                                                                      <label class="form-check-label" for="hoption2">No</label>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-sm-3">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="features[compliant]" <?=(isset($features) && !empty($features->compliant) && $features->compliant == 'in-progress')?'checked':'';?> id="hoption3" value="in-progress">
                                                                                      <label class="form-check-label" for="hoption3">In-progress</label>
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
                                                        <div class="commercial w-100 <?=(isset($properties) && $properties != false && $properties[0]->type == 'commercial')?'':'d-none';?>">
                                                            <div class="card mb-6">
                                                                <div class="card-body p-6">
                                                                    <h3 class="card-title mb-0 text-heading fs-22 lh-15">Property Price</h3>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-lg-12 pt-4">
                                                                            <div class="d-flex">
                                                                                <div class="form-check mr-3">
                                                                                    <input class="form-check-input negotiation-price" type="radio" value="0" name="negotiation" <?=(isset($properties) && $properties != false && $properties[0]->negotiation == '0')?'checked':(($this->uri->segment(2) == 'add-property')?'checked':'');?> id="mention">
                                                                                    <label class="form-check-label" for="mention">
                                                                                        Mention Price
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input negotiation-price" type="radio" value="1" name="negotiation" <?=(isset($properties) && $properties != false && $properties[0]->negotiation == '1')?'checked':'';?> id="negotiation">
                                                                                    <label class="form-check-label" for="negotiation">
                                                                                        Price By Negotiation
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <small class="form-text text-danger negotiation"></small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mention" <?=(isset($properties) && $properties != false && $properties[0]->negotiation == '1')?'style="display:none;"':'';?>>
                                                                        <div class="form-row mx-n2">
                                                                            <div class="col-md-3 col-lg-6 col-xxl-6 px-2">
                                                                                <div class="form-group">
                                                                                    <label for="mprice" class="text-heading">Mention Price* (<?=currency();?>)</label>
                                                                                    <input type="number" min="0" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->price:'';?>" step="any" id="mprice" name="mprice">
                                                                                    <small class="form-text text-danger mprice"></small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-lg-6 col-xxl-6 px-2">
                                                                                <div class="pt-5 mt-2 d-none d-md-block"></div>
                                                                                <div class="form-group">
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="duration" id="annum" value="Annum" <?=(isset($properties) && ($properties != false) && ($properties[0]->duration == 'Annum'))?'checked':(($this->uri->segment(2) == 'add-property')?'checked':'');?>>
                                                                                      <label class="form-check-label" for="annum">Per Annum</label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                      <input class="form-check-input" type="radio" name="duration" id="month" value="Month" <?=(isset($properties) && ($properties != false) && ($properties[0]->duration == 'Month'))?'checked':'';?>>
                                                                                      <label class="form-check-label" for="month">Per Month</label>
                                                                                    </div>
                                                                                    <small class="form-text text-danger duration"></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-lg-12 pt-4">
                                                                                <div class="custom-control custom-checkbox p-0">
                                                                                    <fieldset class="form-group">
                                                                                    <div class="row"><?php if(isset($properties) && $properties != false){ $other = json_decode($properties[0]->other); } ?>
                                                                                      <div class="col-sm-6">
                                                                                            <label for="property-type" class="text-heading"> GST </label>
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="radio" name="other[gst]" <?=(isset($other) && !empty($other->gst) && $other->gst == 'plusgst')?'checked':'';?> id="plusgst" value="plusgst">
                                                                                              <label class="form-check-label" for="plusgst">Plus GST</label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="radio" name="other[gst]" <?=(isset($other) && !empty($other->gst) && $other->gst == 'ingst')?'checked':'';?> id="ingst" value="ingst">
                                                                                              <label class="form-check-label" for="ingst">Inclusive GST</label>
                                                                                            </div>
                                                                                        </div>
                                                                                      <div class="col-sm-6">
                                                                                            <label for="property-type" class="text-heading"> Outgoings </label>
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="radio" name="other[outgoings]" <?=(isset($other) && !empty($other->outgoings) && $other->outgoings == 'plusout')?'checked':'';?> id="plusout" value="plusout">
                                                                                              <label class="form-check-label" for="plusout">Plus Outgoings</label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                              <input class="form-check-input" type="radio" name="other[outgoings]" <?=(isset($other) && !empty($other->outgoings) && $other->outgoings == 'inout')?'checked':'';?> id="inout" value="inout">
                                                                                              <label class="form-check-label" for="inout">Inclusive Outgoings</label>
                                                                                            </div>
                                                                                      </div>
                                                                                    </div>
                                                                                  </fieldset>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="row">-->
                                                                    <!--    <div class="col-sm-12 col-lg-12 pt-4">-->
                                                                    <!--        <div class="form-check">-->
                                                                    <!--            <input class="form-check-input" type="checkbox" value="1" name="negotiation" <?=(isset($properties) && $properties != false && $properties[0]->negotiation == '1')?'checked':'';?> id="negotiation">-->
                                                                    <!--            <label class="form-check-label" for="negotiation">-->
                                                                    <!--                Price By Negotiation-->
                                                                    <!--            </label>-->
                                                                    <!--        </div>-->
                                                                    <!--        <small class="form-text text-danger negotiation"></small>-->
                                                                    <!--    </div>-->
                                                                    <!--</div>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 card mb-6">
                                                            <div class="card-body p-6">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="applyLink">Apply Button Link <span class="text-muted">(Optional)</span></label>
                                                                            <div class="input-group">
                                                                              <input type="text" class="form-control form-control-lg border" name="apply_link" placeholder="Enter apply link here.." id="applyLink" aria-label="Enter apply link here.." value="<?=(isset($properties) && $properties != false)?$properties[0]->apply_link:'';?>" aria-describedby="basic-addon2">
                                                                            </div>
                                                                            <small class="form-text text-danger apply_link"></small>
                                                                        </div>
                                                                    </div>
                                                                    <?php if(isset($agents) && $agents != false){ ?>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="assignTo">Assign to <span class="text-muted">(Optional)</span></label>
                                                                            <select class="form-control form-control-lg border selectpicker" multiple id="assignTo" name="assignto[]">
                                                                                <?php foreach($agents as $agent){ ?>
                                                                                    <option value="<?=$agent->sno;?>" <?=(isset($properties) && $properties != false && in_array($agent->sno, explode(',',$properties[0]->assignto)))?'selected':'';?>><?=$agent->name;?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <small class="form-text text-danger assignto"></small>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if($amenities != false){ ?>
                                                <div class="col-lg-5">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Includes</h3>
                                                            <div class="row">
                                                                <div class="col-sm-6 col-lg-6">
                                                                    <ul class="list-group list-group-no-border">
                                                                        <?php $no=1; foreach($amenities as $amenity){ if($no%2 == 1){  $aminityDisplay = 'd-none'; if((isset($properties) && $properties != false && $properties[0]->type === 'commercial') && (strtolower($amenity->property_type) === 'commercial')){ $aminityDisplay = 'd-block'; }elseif((isset($properties) && $properties != false && $properties[0]->type === 'residential') && (strtolower($amenity->property_type) === 'residential')){ $aminityDisplay = 'd-block'; }elseif((!isset($properties) && (strtolower($amenity->property_type) === 'commercial'))){ $aminityDisplay = 'd-none'; }elseif((!isset($properties) && (strtolower($amenity->property_type) === 'residential'))){ $aminityDisplay = 'd-block'; } ?>
                                                                        <li class="list-group-item px-0 pt-0 pb-2 <?=strtolower($amenity->property_type);?> <?=$aminityDisplay;?>">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" <?=(isset($properties) && $properties != false && in_array($amenity->sno, explode(',',$properties[0]->aminities)))?'checked':'';?> name="aminities[]" value="<?=$amenity->sno;?>" id="<?=strtolower($amenity->property_type).'-'.$amenity->name;?>">
                                                                                <label class="custom-control-label" for="<?=strtolower($amenity->property_type).'-'.$amenity->name;?>"><?=ucwords($amenity->name);?></label>
                                                                            </div>
                                                                        </li>
                                                                        <?php } $no++; } ?>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6 col-lg-6">
                                                                    <ul class="list-group list-group-no-border">
                                                                        <?php $no=1; foreach($amenities as $amenity){ if($no%2 == 0){  $aminityDisplay = 'd-none'; if((isset($properties) && $properties != false && $properties[0]->type === 'commercial') && (strtolower($amenity->property_type) === 'commercial')){ $aminityDisplay = 'd-block'; }elseif((isset($properties) && $properties != false && $properties[0]->type === 'residential') && (strtolower($amenity->property_type) === 'residential')){ $aminityDisplay = 'd-block'; }elseif((!isset($properties) && (strtolower($amenity->property_type) === 'commercial'))){ $aminityDisplay = 'd-none'; }elseif((!isset($properties) && (strtolower($amenity->property_type) === 'residential'))){ $aminityDisplay = 'd-block'; } ?>
                                                                        <li class="list-group-item px-0 pt-0 pb-2 <?=strtolower($amenity->property_type);?> <?=$aminityDisplay;?>">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" <?=(isset($properties) && $properties != false && in_array($amenity->sno, explode(',',$properties[0]->aminities)))?'checked':'';?> name="aminities[]" value="<?=$amenity->sno;?>" id="<?=strtolower($amenity->property_type).'-'.$amenity->name;?>">
                                                                                <label class="custom-control-label" for="<?=strtolower($amenity->property_type).'-'.$amenity->name;?>"><?=ucwords($amenity->name);?></label>
                                                                            </div>
                                                                        </li>
                                                                        <?php } $no++; } ?>
                                                                    </ul>
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
                            <div class="tab-pane tab-pane-parent fade px-0" id="mediaamenities" role="tabpanel" aria-labelledby="mediaamenities-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0"
                                         id="heading-mediaamenities">
                                        <h5 class="mb-0">
                                            <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                                    data-toggle="collapse" data-number="3."
                                                    data-target="#mediaamenities-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="mediaamenities-collapse">
                                                <span class="number">3.</span> Images & Location
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="mediaamenities-collapse" class="collapse collapsible" aria-labelledby="heading-mediaamenities" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            
                                            <div class="row">
                                                <div class="col-md-8 col-lg-8 col-xxl-8">
                                                      <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="col-md-12 col-lg-12 col-xxl-12 px-2">
                                                                <div class="form-group">
                                                                    <label for="geocoder" class="text-heading">Search Location</label>
                                                                    <!--<div id="geocoder" class="geocoder"></div>-->
                                                                    <input id="pac-input" class="controls" type="text" placeholder="Search Box" />
                                                                </div>
                                                            </div>

                                                            <!--<div id="map" class="mapbox-gl map-point-animate mb-6" style="height: 296px" data-mapbox-access-token="<?=mapbox_token;?>" data-mapbox-options='{"center":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"setLngLat":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>]}' data-mapbox-marker='[{"position":[<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>, <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('googlle-market-01.png');?>","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]' data-marker-draggable='true' ></div>-->
                                                            <div id="map" data-position='{ "lat": <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>, "lng": <?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?> }' data-marker-draggable='true' <?=(isset($properties) && $properties != false && !empty($properties[0]->latitude)  && !empty($properties[0]->longitude))?'data-marker-zoom="true"':'';?>></div>
                                                            <div id="infowindow-content">
                                                              <span id="place-name" class="title"></span><br />
                                                              <span id="place-address"></span>
                                                            </div>
                                                          <div class="form-row mx-n2 d-none">
                                                            <div class="col-md-6 col-lg-6 col-xxl-12 px-2">
                                                              <div class="form-group mb-md-0">
                                                                <label for="latitude" class="text-heading">Latitude </label>
                                                                <input type="text" class="form-control form-control-lg border" id="latitude" name="latitude" value="<?=(isset($properties) && $properties != false && !empty($properties[0]->latitude))?$properties[0]->latitude:lnglat()[1];?>">
                                                                <small class="form-text text-danger latitude"></small>
                                                              </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-6 col-xxl-6 px-2">
                                                              <div class="form-group mb-md-0">
                                                                <label for="longitude" class="text-heading">Longitude</label>
                                                                <input type="text" class="form-control form-control-lg border" id="longitude" name="longitude" value="<?=(isset($properties) && $properties != false && !empty($properties[0]->longitude))?$properties[0]->longitude:lnglat()[0];?>">
                                                                <small class="form-text text-danger longitude"></small>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-4 col-lg-4 col-xxl-4">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="address" class="text-heading">Address*</label>
                                                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->address:'';?>" id="address" name="address" aria-label="Address" aria-describedby="button-addon2">
                                                                        <small class="form-text text-primary">You can hide the street number by removing the number here</small>
                                                                        <small class="form-text text-danger address"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="region" class="text-heading">Region*</label>
                                                                        <select class="form-control border shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" data-live-search="true" id="region" name="region">
                                                                            <?php if($regions != false){ foreach($regions as $region){ ?>
                                                                            <option value="<?=$region->sno;?>" <?=(isset($properties) && $properties != false && $properties[0]->region == $region->sno)?'selected':'';?>><?=$region->region_name;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <small class="form-text text-danger region"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="district" class="text-heading">Disrtict*</label>
                                                                        <select class="form-control border shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" data-live-search="true" id="district" name="district">
                                                                            <?php if(isset($districts) && $districts != false){ foreach($districts as $district){ ?>
                                                                            <option value="<?=$district->sno;?>" <?=(isset($properties) && $properties != false && $properties[0]->district == $district->sno)?'selected':'';?>><?=$district->district;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <small class="form-text text-danger district"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="suburb" class="text-heading">Suburb*</label>
                                                                        <select class="form-control border shadow-none form-control-lg selectpicker" title="Select" data-style="btn-lg py-2 h-52" data-live-search="true" id="suburb" name="suburb">
                                                                            <?php if(isset($suburbs) && $suburbs != false){ foreach($suburbs as $suburb){ ?>
                                                                            <option value="<?=$suburb->sno;?>" <?=(isset($properties) && $properties != false && $properties[0]->suburb == $suburb->sno)?'selected':'';?>><?=$suburb->suburb;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <small class="form-text text-danger suburb"></small>
                                                                    </div>
                                                                </div>
                                                            <!--
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <div class="form-group">
                                                                        <label for="zip" class="text-heading">Post code*</label>
                                                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($properties) && $properties != false)?$properties[0]->zip:'';?>" id="zip" name="zip">
                                                                        <small class="form-text text-danger zip"></small>
                                                                    </div>
                                                                </div>
                                                            -->
                                                            </div>
                                                            
                                                            <!--
                                                            <div class="pac-card" id="pac-card">
                                                              <div>
                                                                <div id="title">Countries</div>
                                                                <div id="country-selector" class="pac-controls">
                                                                  <input type="radio" name="type" id="changecountry-usa" />
                                                                  <label for="changecountry-usa">USA</label>
                                                                  <input type="radio" name="type" id="changecountry-usa-and-uot" checked="checked" />
                                                                  <label for="changecountry-usa-and-uot">USA and unincorporated organized territories</label>
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
                                                            -->
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <?php if(isset($gallery) && !empty($gallery['normal'])){ $thumbnail = $gallery['thumbnail']; } ?>
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group mb-5">
                                                                        <label for="property-thumbnail" class="text-heading">Property Thumbnail <small class="form-text text-primary">Always upload horizontal Image</small></label>
                                                                        <input type="file" class="form-control form-control-lg border" id="property-thumbnail" accept="image/*" name="property_thumbnail" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                                                                        <small class="form-text text-danger property_thumbnail"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="d-none d-md-inline-block mt-5"></div>
                                                                    <img src="<?=(isset($thumbnail) && !empty($thumbnail))?base_url('uploads/small/'.$thumbnail[0]):'';?>" id="preview" class="pt-0" width="100%" />
                                                                </div>
                                                            </div>
                                                            <h3 class="card-title mb-5 text-heading fs-22 lh-15">Upload photos of your property</h3>
                                                            <div class="dropzone upload-file text-center py-3" data-uploader="<?=(isset($properties) && $properties != false && (isset($gallery) && !empty($gallery['normal'])))?'update':'true';?>" id="myDropzone" data-uploader-url="<?=base_url('myaccount/upload');?>">
                                                                <div class="dz-default dz-message">
                                                                    <span class="upload-icon lh-1 d-inline-block mb-2"><i class="fal fa-cloud-upload-alt"></i></span>
                                                                    <p class="text-heading fs-22 lh-15 mb-2">Drag and drop image</p>
                                                                    <button class="btn btn-indigo px-7 mb-2" type="button">Browse file</button>
                                                                    <input type="file" hidden>
                                                                    <p>You can upload a maximum of 15 images</p>
                                                                    <small class="form-text text-danger property_pics"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                    <!--
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
                                                <span class="number">4.</span> Viewing Schedules
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="scheduling-collapse" class="collapse collapsible" aria-labelledby="heading-scheduling" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="propertyStatus">Property Status</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control form-control-lg border selectpicker" id="propertyStatus" name="property_status">
                                                                          <option value="Available" <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Available')?'selected':'';?>>Available</option>
                                                                          <option value="Occupied" <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Occupied')?'selected':'';?>>Occupied</option>
                                                                          <option value="Withdrawn" <?=(isset($properties) && $properties != false && $properties[0]->property_status == 'Withdrawn')?'selected':'';?>>Withdrawn</option>
                                                                        </select>
                                                                    </div>
                                                                    <small class="form-text text-danger property_status"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-<?=(isset($agents) && $agents != false)?4:8;?>">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="applyLink">APPLY BUTTON LINK</label>
                                                                    <div class="input-group">
                                                                      <input type="text" class="form-control form-control-lg border" name="apply_link" placeholder="Enter apply link here.." id="applyLink" aria-label="Enter apply link here.." value="<?=(isset($properties) && $properties != false)?$properties[0]->apply_link:'';?>" aria-describedby="basic-addon2">
                                                                    </div>
                                                                    <small class="form-text text-danger apply_link"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(isset($agents) && $agents != false){ ?>
                                                <div class="col-lg-4">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="assignTo">Assign to</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control form-control-lg border selectpicker" multiple id="assignTo" name="assignto[]">
                                                                            <?php foreach($agents as $agent){ ?>
                                                                              <option value="<?=$agent->sno;?>" <?=(isset($properties) && $properties != false && in_array($agent->sno, explode(',',$properties[0]->assignto)))?'selected':'';?>><?=$agent->name;?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <small class="form-text text-danger assignto"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-5 text-heading fs-22 lh-15">Scheduling Detail</h3>
                                                            <div class="row">
                                                                <div class="col-md-12 mb-4" id="schedule-form" data-action="<?=base_url('myaccount/propertyschedulesadd');?>" method="post">
                                                                    <label for="sdate" class="text-heading">Date</label>
                                                                    <input type="date" class="form-control form-control-lg border" min="<?=date('Y-m-d');?>" id="sdate" name="sdate">
                                                                    <small class="form-text text-danger sdate"></small>
                                                                    <label for="sfrom" class="text-heading">From</label>
                                                                    <input type="time" class="form-control form-control-lg border" id="sfrom" name="sfrom">
                                                                    <small class="form-text text-danger sfrom"></small>
                                                                    <label for="sto" class="text-heading">To</label>
                                                                    <input type="time" class="form-control form-control-lg border" id="sto" name="sto">
                                                                    <small class="form-text text-danger sto"></small>
                                                                    <?php if($this->uri->segment(2) == 'edit-property'){ ?>
                                                                    <button type="button" id="addschedule" class="btn btn-primary btn-lg col-12 mt-3">Add</button>
                                                                    <?php } ?>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-5 text-heading fs-22 lh-15">Your Scheduling Times</h3>
                                                            <div class="table-responsive">
                                                                <table id="addedSchedules-list" class="table table-hover bg-white border rounded-lg">
                                                                    <thead class="thead-sm thead-black">
                                                                        <tr>
                                                                            <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Date</th>
                                                                            <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Timings</th>
                                                                            <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Cancel Viewing</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if(isset($schedules) && $schedules != false){ foreach($schedules as $schedule){ ?>
                                                                        <tr class="shadow-hover-xs-2 bg-hover-white">
                                                                            <td class="align-middle text-center py-3"><?=date('d F, Y', strtotime($schedule->date));?></td>
                                                                            <td class="align-middle text-center"><?=date('h:ia', strtotime($schedule->from_time));?> - <?=date('h:ia', strtotime($schedule->to_time));?></td>
                                                                            <td class="align-middle text-center">
                                                                                <?php if($schedule->status == 0){ ?>
                                                                                    <p class="text-danger"><?=$schedule->reason;?></p>
                                                                                <?php } else{ ?>
                                                                                    <a href="javascript:void(0);" title="Cancel Viewing" class="d-inline-block fs-18 text-muted hover-primary delete-schedule" data-id="<?=$schedule->sno;?>"><i class="fal fa-trash-alt"></i></a>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } } ?>
                                                                    </tbody>
                                                                </table>
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
                    -->
                            <div class="tab-pane tab-pane-parent fade px-0" id="checkout" role="tabpanel" aria-labelledby="checkout-tab">
                                <div class="card bg-transparent border-0">
                                    <div class="card-header d-block d-md-none bg-transparent px-0 py-1 border-bottom-0">
                                        <h5 class="mb-0">
                                            <button class="btn btn-lg collapse-parent btn-block border shadow-none"
                                                    data-toggle="collapse" data-number="4."
                                                    data-target="#checkout-collapse"
                                                    aria-expanded="true"
                                                    aria-controls="checkout-collapse">
                                                <span class="number">4.</span> Add-ons & Submit
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="checkout-collapse" class="collapse collapsible" aria-labelledby="heading-checkout" data-parent="#collapse-tabs-accordion">
                                        <div class="card-body py-4 py-md-0 px-0">
                                            <div class="row">
                                                <?php if(!empty($addons)){ ?>
                                                <div class="col-lg-6">
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <ul class="list-group list-group-no-border">
                                                                        <?php foreach($addons as $key => $addon){ ?>
                                                                        <li class="list-group-item px-0 pt-0 pb-2">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input addons" <?=(isset($properties) && $properties != false && $properties[0]->$key == '1')?'checked':'';?> data-name="<?=$key;?>" data-value="<?=$addon->price;?>" value="1" <?=($crole == 'company')?'':'name="'.$key.'"';?> id="<?=$key;?>" <?=(isset($properties) && $properties != false && $properties[0]->$key == '1')?'disabled':(($role == 'company')?'disabled':'');?> >
                                                                                <label class="custom-control-label" for="<?=$key;?>"><?=$addon->name;?> - <del><?=currency().$addon->del_price;?></del> <span class="text-<?=$addon->color;?>"><?=currency().$addon->price;?></span></label>
                                                                        <!--    <p><small><?=$addon->description;?></small></p> -->
                                                                                <small class="form-text text-danger <?=$key;?>"></small>
                                                                            </div>
                                                                        </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <div class="form-row mx-n2">
                                                                <div class="col-md-6 col-lg-12 col-xxl-6 px-2">
                                                                    <h6>Send/feed to other websites</h6>
                                                                    <span> - *for more info contact: <a href="mailto:">support@rentallistings.co.nz</a></span>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input">
                                                                                <label class="custom-control-label" for="">1.Your own website</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input">
                                                                                <label class="custom-control-label" for="">2.External website one</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input">
                                                                                <label class="custom-control-label" for="">3.External website two</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="col-lg-6">
                                                <!--
                                                    <?php if(isset($agents) && $agents != false){ ?>
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <label for="assignTo">Assign to <span class="text-muted">(Optional)</span></label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control-lg border selectpicker" multiple id="assignTo" name="assignto[]">
                                                                    <?php foreach($agents as $agent){ ?>
                                                                        <option value="<?=$agent->sno;?>" <?=(isset($properties) && $properties != false && in_array($agent->sno, explode(',',$properties[0]->assignto)))?'selected':'';?>><?=$agent->name;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <small class="form-text text-danger assignto"></small>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                -->
                                                    <div class="card mb-6">
                                                        <div class="card-body p-6">
                                                            <h3 class="card-title mb-0 text-heading fs-22 lh-15">Checkout</h3>
                                                            <p class="card-text mb-5"><small>Featured & Premium Charges will be reflected in companies invoice, please check with your company</small></p>
                                                            <div class="text-sm-right">
                                                                <?php $propertyprice = 0; if(isset($me) && !empty($me['company']) && ($me['company'] != '')){ }else{ $propertyprice = prop(); $propertypricecutoff = prop_cutoff(); ?>
                                                                <div class="row">
                                                                    <div class="col-9">
                                                                        <p class="mb-1 text-right">Property Listing Charges: </p>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <p class="mb-1 text-left" id="property" data-value="<?=$propertyprice;?>"><?=(isset($propertypricecutoff) && !empty($propertypricecutoff))?'<del>'.currency().$propertypricecutoff.'</del> ':'';?><span class="text-indigo"><?=currency().$propertyprice;?></span></p>
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                                <div id="addons">
                                                                <?php $addonsprice = 0; if(!empty($addons)){ foreach($addons as $key => $addon){ if(isset($properties) && $properties != false && $properties[0]->$key == 1){ if($propertyprice != 0 || $key == 'boost'){ ?>
                                                                <div class="row">    
                                                                    <div class="col-9">
                                                                        <p class="mb-1 text-right"><?=$addon->name;?> Charges: </p>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <p class="mb-1 text-left"><?=currency().$addon->price;?></p>
                                                                    </div>
                                                                </div>
                                                                <?php $addonsprice = $addonsprice+$addon->price; } } } } $subtotal = $propertyprice+$addonsprice; ?>
                                                                </div>
                                                                <div class="row"> 
                                                                    <div class="col-12"><hr></div>
                                                                    <div class="col-9">
                                                                        <p class="mb-1 text-right"><strong>Total:</strong> </p>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <p class="mb-1 text-left" id="subtotal"><strong><?=currency().$subtotal;?></strong></p>
                                                                    </div>
                                                                </div>
                                                            <!--
                                                                <div class="row"> 
                                                                    <div class="col-9 grand-total-title mt-4">
                                                                        <h4 class="text-heading fs-20 lh-15 text-right">Grand Total : </h4>
                                                                    </div>
                                                                    <div class="col-3 grand-total-amount mt-4 pr-0">
                                                                        <h4 class="text-heading fs-20 lh-15 text-left" id="total"><?=currency().$subtotal;?></h4>
                                                                    </div>
                                                                </div>
                                                            -->
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
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php if(isset($gallery) && !empty($gallery['normal'])){ $file_list = $old = array(); $images = $gallery['normal']; foreach($images as $image){ $file_path = FCPATH.'uploads/'.$image; $size = filesize($file_path); $file_list[] = array('name' => $image, 'size' => $size, 'path' => base_url('uploads/'.$image)); $old[] = $image;  } $this->session->set_userdata('property_pics', $old); ?>
    <script>
        var galleryResponse = <?=json_encode($file_list);?>;
    </script>  
    <?php } ?>  