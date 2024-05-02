    <section class="d-flex flex-column">
        <div class="py-14 bg-cover bg-overlay" style="background-image: url(<?=base_url('uploads/bg-home.jpeg');?>)">
        	<div class="container">
        	    <div class="property-search py-lg-0 z-index-2 position-relative d-none d-lg-block">
                <h3 class="text-white display-4 text-center mb-sm-4 mb-4" style="position: absolute; padding-left: 50%;">End Your Search Here...!!!</h3>
        			<div class="row no-gutters">
        				<div class="col-md-5 col-lg-4 col-xl-4">
        					<ul class="nav nav-pills property-search-status-tab" role="tablist">
        						<li class="nav-item bg-secondary rounded-top" role="presentation">
        							<a href="#residential" id="residential-tab" role="tab" aria-controls="residential" aria-selected="<?=((isset($_GET['type']) && $_GET['type'] === 'commercial'))?false:true;?>"
        							   class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2 <?=((isset($_GET['type']) && $_GET['type'] === 'commercial'))?'':'active';?>"
        							   data-toggle="tab" data-value="residential">
        								<svg class="icon icon-villa fs-22 mr-2"> <use xlink:href="#icon-villa"></use> </svg>
        								Residential
        							</a>
        						</li>
        						<li class="nav-item bg-secondary rounded-top" role="presentation">
        							<a href="#commercial" id="commercial-tab" role="tab" aria-controls="commercial" aria-selected="<?=(isset($_GET['type']) && $_GET['type'] === 'commercial')?true:false;?>"
        							   class="nav-link btn shadow-none rounded-bottom-0 text-white text-btn-focus-secondary text-uppercase d-flex align-items-center fs-13 rounded-bottom-0 bg-active-white text-active-secondary letter-spacing-087 flex-md-1 px-4 py-2 <?=(isset($_GET['type']) && $_GET['type'] === 'commercial')?'active':'';?>"
        							   data-toggle="tab" data-value="commercial">
        								<svg class="icon icon-building fs-22 mr-2"> <use xlink:href="#icon-building"></use> </svg>
        								Commercial
        							</a>
        						</li>
        						
        					</ul>
        				</div>
        			</div>
        			<div class="bg-white px-3 rounded-bottom rounded-top-right pb-6 pb-lg-0">
        			    <div class="tab-content shadow-none p-0">
                            <div class="tab-pane fade <?=((isset($_GET['type']) && $_GET['type'] === 'commercial'))?'':'show active';?> px-0" id="residential" role="tabpanel" aria-labelledby="residential-tab">
        		                <form class="" method="get" action="<?=base_url('properties');?>">
        				            <div class="row align-items-center" id="accordion-residential">
                    				    <div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                    						<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Region</label>
                    						<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" data-live-search="true" id="region" name="region">
                    						    <?php if($regions != false){ foreach($regions as $region){ ?>
                    							    <option value="<?=$region->sno;?>" <?=((isset($_GET['region']) && $_GET['region'] !== '' && $regions != false && ($_GET['region'] === $region->sno)) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>><?=ucwords($region->region_name);?></option>
                    						    <?php } } ?>
                    						</select>
                    				    </div>
                    				    <div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                    						<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">District</label>
                    						<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" data-live-search="true" id="district" name="district">
                						        <option value="0" <?=((isset($_GET['district']) && $_GET['district'] !== '' && ($_GET['district'] === '0')) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>>All Districts</option>
                    						    <?php if((isset($_GET['region']) && $_GET['region'] !== '' && $districts != false) && (isset($_GET['type']) && $_GET['type'] === 'residential')){ foreach($districts as $district){ ?>
                    						        <option value="<?=$district->sno;?>" <?=((isset($_GET['district']) && $_GET['district'] !== '' && $districts != false && ($_GET['district'] === $district->sno)) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>><?=ucwords($district->district);?></option>
                    						    <?php } } ?>
                    						</select>
                    				    </div>
                    				    <div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                    						<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Suburb</label>
                    						<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" multiple data-live-search="true" id="suburb" name="suburb[]">
                						        <option value="0" <?=((isset($_GET['suburb']) && $_GET['suburb'] !== '' && in_array('0',$_GET['suburb'])) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>>All Suburbs</option>
                    						    <?php if((isset($_GET['district']) && $_GET['district'] !== '' && $suburbs != false) && (isset($_GET['type']) && $_GET['type'] === 'residential')){ foreach($suburbs as $suburb){ ?>
                    						        <option value="<?=$suburb->sno;?>" <?=((isset($_GET['suburb']) && $_GET['suburb'] !== '' && $suburbs != false &&  in_array($suburb->sno,$_GET['suburb'])) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>><?=ucwords($suburb->suburb);?></option>
                    						    <?php } } ?>
                    						</select>
                    				    </div>
        					            <input class="search-field" type="hidden" name="type" value="residential" data-default-value="residential">
                    				    <div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                    						<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Property Type</label>
                    						<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" data-live-search="true" name="p_type">
                						        <option value="0" <?=(isset($_GET['p_type']) && $_GET['p_type'] === '0' && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>>All Types</option>
                    							<?php if(!empty($property_type) && !empty($property_type['residential'])){ foreach($property_type['residential'] as $residential){ ?>
                    							    <option value="<?=strtolower(str_replace(array(' ','/',';'),'',$residential));?>" <?=((isset($_GET['p_type']) && $_GET['p_type'] === strtolower(str_replace(array(' ','/',';'),'',$residential))))?'selected':'';?>><?=$residential;?></option>
                    							<?php } } ?>
                    						</select>
                    				    </div>
                    				    <div class="col-sm pr-lg-0 pt-6 pt-lg-0 order-3">
                    						<a href="#advanced-search-filters-residential"
                    						   class="btn advanced-search btn-accent h-lg-80 w-100 shadow-none text-secondary rounded-0 fs-14 fs-sm-16 font-weight-600 text-left d-flex align-items-center <?=((isset($_GET['type']) && $_GET['type'] === 'residential') && (count($_GET) > 3))?'':'collapsed';?>"
                    						   data-toggle="collapse" data-target="#advanced-search-filters-residential" aria-expanded="<?=((isset($_GET['type']) && $_GET['type'] === 'residential') && (count($_GET) > 3))?'true':'false';?>"
                    						   aria-controls="advanced-search-filters-residential">
                    							Advanced Search
                    						</a>
                    					</div>
                    				    <div class="col-sm pt-6 pt-lg-0 order-sm-4 order-5">
                    						<button type="submit" class="btn btn-primary shadow-none fs-16 font-weight-600 w-100 py-lg-2 lh-213">Search</button>
                    					</div>
                    				    <div id="advanced-search-filters-residential" class="col-12 pt-4 pb-sm-4 order-sm-5 order-4 collapse <?=((isset($_GET['type']) && $_GET['type'] === 'residential') && (count($_GET) > 3))?'show':'';?>" data-parent="#accordion-residential">
                                            <div class="row">
                    							<div class="col-sm-2 col-lg-2 pt-2">
                    								<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bedrooms</label>
                    								<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="bedrooms" title="<?=((isset($_GET['bedrooms']) && $_GET['bedrooms'] !== ''))?$_GET['bedrooms']:'Any';?>" data-style="p-0 h-24 lh-17 text-dark">
                    									<option value="">Any</option>
                    									<?php for($i=1;$i<=10;$i++){ ?>
                    									    <option value="<?=$i;?>" <?=((isset($_GET['bedrooms']) && $_GET['bedrooms'] === "$i"))?'selected':'';?>><?=$i;?></option>
                    									<?php } ?>
                    								</select>
                    							</div>
                    							<div class="col-sm-2 col-lg-2 pt-2">
                    								<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Bathrooms</label>
                    								<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="<?=((isset($_GET['bathrooms']) && $_GET['bathrooms'] !== ''))?$_GET['bathrooms']:'Any';?>" data-style="p-0 h-24 lh-17 text-dark" name="bathrooms">
                    									<option value="">Any</option>
                    									<?php for($i=1;$i<=10;$i++){ ?>
                    									    <option value="<?=$i;?>" <?=((isset($_GET['bathrooms']) && $_GET['bathrooms'] === "$i"))?'selected':'';?>><?=$i;?></option>
                    									<?php } ?>
                    								</select>
                    							</div>     
                    							<div class="col-sm-2 col-lg-2 pt-2">
                                				    <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Carparks</label>
                                					<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="parkings" title="<?=((isset($_GET['parkings']) && $_GET['parkings'] !== '') && (isset($_GET['type']) && $_GET['type'] === 'residential'))?(($_GET['parkings'] === '1')?'Yes':'No'):'Any';?>" data-style="p-0 h-24 lh-17 text-dark">
                                            		    <option value="">Any</option>
                                            		    <?php for($i=1;$i<=10;$i++){ ?>
                                            		        <option value="<?=$i;?>" <?=((isset($_GET['parkings']) && $_GET['parkings'] !== '' && $_GET['parkings'] === "$i") && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>><?=$i;?></option>
                                            		    <?php } ?>
                                            		</select>
                            					</div>
                            					<!--<option value="1" <?=((isset($_GET['parkings']) && $_GET['parkings'] !== '' && $_GET['parkings'] === '1') && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>>Yes</option>-->
                                                <!--<option value="0" <?=((isset($_GET['parkings']) && $_GET['parkings'] !== '' && $_GET['parkings'] === '0') && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':'';?>>No</option>-->
                    							
                    							<div class="col-sm-2 col-lg-2 pt-2">
                                					<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Furnished</label>
                                					<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="furnished" title="<?=((isset($_GET['furnished']) && $_GET['furnished'] !== ''))?$_GET['furnished']:'Any';?>" data-style="p-0 h-24 lh-17 text-dark">
                                					    <option value="">Any</option>
                                						<option value="yes" <?=((isset($_GET['furnished']) && $_GET['furnished'] === 'yes'))?'selected':'';?>>Yes</option>
                                						<option value="no" <?=((isset($_GET['furnished']) && $_GET['furnished'] === 'no'))?'selected':'';?>>No</option>
                                					</select>
                            					</div>
                    							<div class="col-sm-4 col-lg-4 pt-2 slider-range slider-range-secondary">
                    								<label for="price" class="text-uppercase font-weight-500 letter-spacing-093 mb-4">Price Range <span class="fs-12">(Per week)</span></label>
                    								<div data-slider="true" data-slider-options='{"min":0,"max":5000,"values":[<?=(isset($_GET['price']) && ($price = explode('to',$_GET['price'])) && !empty($price[0]))?str_replace(array('$',','),'',$price[0]):0;?>,<?=(isset($_GET['price']) && ($price = explode('to',$_GET['price'])) && !empty($price[1]))?str_replace(array('$',','),'',$price[1]):5000;?>],"type":"currency", "step":"50"}'></div>
                    								<div class="text-center mt-2">
                    									<input id="price" type="text" readonly name="price" class="border-0 amount text-center text-body font-weight-500 bg-transparent">
                    								</div>
                    							</div>   
                    							<div class="col-sm-2 col-lg-2 pt-2">
                                					<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Pets</label>
                                					<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="pets" title="<?=((isset($_GET['pets']) && $_GET['pets'] !== ''))?$_GET['pets']:'Any';?>" data-style="p-0 h-24 lh-17 text-dark">
                                					    <option value="">Any</option>
                                						<option value="yes" <?=((isset($_GET['pets']) && $_GET['pets'] === 'yes'))?'selected':'';?>>Yes</option>
                                						<option value="no" <?=((isset($_GET['pets']) && $_GET['pets'] === 'no'))?'selected':'';?>>No</option>
                                						<option value="negotiable" <?=((isset($_GET['pets']) && $_GET['pets'] === 'negotiable'))?'selected':'';?>>Negotiable</option>
                                					</select>
                            					</div>
                    							<div class="col-sm-3 col-lg-3 pt-2">
                    								<div><label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Sort by</label></div>
                                        			<div class="custom-control custom-checkbox" style="margin: auto; float: left; padding-right: 20px;">
                                        			    <input type="checkbox" class="custom-control-input" id="premium" value="1" name="premium" <?=((isset($_GET['premium']) && $_GET['premium'] === '1') && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'checked':'';?>>
                                        				<label class="custom-control-label" for="premium">Premium</label>
                                    				</div>
                                    				<div class="custom-control custom-checkbox" style="margin: auto; float: left;">
                                    				    <input type="checkbox" class="custom-control-input" id="featured" value="1" name="featured" <?=((isset($_GET['featured']) && $_GET['featured'] === '1') && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'checked':'';?>>
                                    					<label class="custom-control-label" for="featured">Featured</label>
                                    				</div>
                                    			</div>
                            			<!--
                    							<div class="col-sm-2 col-lg-2 pt-2">
                                				    <label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">HH Compliant</label>
                                					<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="hh_compliant" title="<?=((isset($_GET['hh_compliant']) && $_GET['hh_compliant'] !== ''))?$_GET['hh_compliant']:'Any';?>" data-style="p-0 h-24 lh-17 text-dark">
                                					    <option value="">Any</option>
                                						<option value="yes" <?=((isset($_GET['hh_compliant']) && $_GET['hh_compliant'] === 'yes'))?'selected':'';?>>Yes</option>
                                						<option value="no" <?=((isset($_GET['hh_compliant']) && $_GET['hh_compliant'] === 'no'))?'selected':'';?>>No</option>
                                						<option value="in-progress" <?=((isset($_GET['hh_compliant']) && $_GET['hh_compliant'] === 'in-progress'))?'selected':'';?>>In-Progress</option>
                                					</select>
                            					</div>	
                            			-->
                            				    <div class="col-md-6 col-lg-7 col-xl-7 pt-2">
                            						<label class="text-uppercase font-weight-500 letter-spacing-093">Search by Keyword</label>
                            						<div class="position-relative">
                            							<input type="text" name="address"
                            							       class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted selectpicker"
                            							       placeholder="by keyword, address, title or property ID" value="<?=((isset($_GET['address']) && $_GET['address'] !== '') && (isset($_GET['type']) && $_GET['type'] === 'residential'))?$_GET['address']:'';?>">
                            						</div>
                            				    </div>	
                    						</div>
                        					<div class="row">
                    							<?php if($amenities != false){ ?>	
                    							<div class="col-12 pt-2">
                    								<a class="lh-17 d-inline-block other-feature <?=((isset($_GET['aminities']) && !empty($_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'':'collapsed';?>" data-toggle="collapse"
                    								   href="#other-feature-residential" role="button"
                    								   aria-expanded="<?=((isset($_GET['aminities']) && !empty($_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'true':'false';?>" aria-controls="other-feature-residential">
                    									<span class="fs-15 text-heading font-weight-500 hover-primary">Other Features</span>
                    								</a>
                    							</div>
                    							<div class="collapse row mx-0 w-100 <?=((isset($_GET['aminities']) && !empty($_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'show':'';?>" id="other-feature-residential">
                    							    <?php foreach($amenities as $amenity){ if($amenity->property_type == 'Residential'){ ?>
                        								<div class="col-sm-6 col-md-4 col-lg-2">
                        									<div class="custom-control custom-checkbox">
                        										<input type="checkbox" class="custom-control-input" name="aminities[]" value="<?=$amenity->sno;?>" id="<?=$amenity->sno.'_'.preg_replace('/[^a-zA-Z0-9_ -]/s','_',str_replace(' ','_',$amenity->name));?>" <?=((isset($_GET['aminities']) && !empty($_GET['aminities']) && in_array($amenity->sno,$_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'residential'))?'checked':'';?>>
                        										<label class="custom-control-label" for="<?=$amenity->sno.'_'.preg_replace('/[^a-zA-Z0-9_ -]/s','_',str_replace(' ','_',$amenity->name));?>"><?=ucwords($amenity->name);?></label>
                        									</div>
                        								</div>
                    							    <?php } } ?>
                    							</div>
                    							<?php } ?>
                    						</div>
                    					</div>
                    			    </div>
        		                </form>
        				    </div>
        				    <div class="tab-pane fade <?=((isset($_GET['type']) && $_GET['type'] === 'commercial'))?'show active':'';?> px-0" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
        		                <form method="get" action="<?=base_url('properties');?>">
        				            <div class="row align-items-center" id="accordion-commercial">
        				                <div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                    						<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Region</label>
                    						<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" data-live-search="true" id="commercial_region" name="region">
                    						    <?php if($regions != false){ foreach($regions as $region){ ?>
                    							    <option value="<?=$region->sno;?>" <?=((isset($_GET['region']) && $_GET['region'] !== '' && $regions != false && ($_GET['region'] === $region->sno)) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>><?=ucwords($region->region_name);?></option>
                    						    <?php } } ?>
                    						</select>
                    				    </div>
                    				    <div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                    						<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">District</label>
                    						<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" data-live-search="true" id="commercial_district" name="district">
                						        <option value="0" <?=((isset($_GET['district']) && $_GET['district'] !== '' && ($_GET['district'] === '0')) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>>All Districts</option>
                    						    <?php if((isset($_GET['region']) && $_GET['region'] !== '' && $districts != false) && (isset($_GET['type']) && $_GET['type'] === 'commercial')){ foreach($districts as $district){ ?>
                    						        <option value="<?=$district->sno;?>" <?=((isset($_GET['district']) && $_GET['district'] !== '' && $districts != false && ($_GET['district'] === $district->sno)) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>><?=ucwords($district->district);?></option>
                    						    <?php } } ?>
                    						</select>
                    				    </div>
                    				    <div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                    						<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Suburb</label>
                    						<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" multiple data-live-search="true" id="commercial_suburb" name="suburb[]">
                						        <option value="0" <?=((isset($_GET['suburb']) && $_GET['suburb'] !== '' && in_array('0',$_GET['suburb'])) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>>All Suburbs</option>
                    						    <?php if((isset($_GET['district']) && $_GET['district'] !== '' && $suburbs != false) && (isset($_GET['type']) && $_GET['type'] === 'commercial')){ foreach($suburbs as $suburb){ ?>
                    						        <option value="<?=$suburb->sno;?>" <?=((isset($_GET['suburb']) && $_GET['suburb'] !== '' && $suburbs != false && in_array($suburb->sno,$_GET['suburb'])) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>><?=ucwords($suburb->suburb);?></option>
                    						    <?php } } ?>
                    						</select>
                    				    </div>
            					        <input class="search-field" type="hidden" name="type" value="commercial" data-default-value="commercial">
                            			<div class="col-md-6 col-lg-2 col-xl-2 pt-6 pt-lg-0 order-2">
                            				<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Property Type</label>
                            				<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" title="Select" data-style="p-0 h-24 lh-17 text-dark" data-live-search="true" name="p_type">
                    						  <option value="0" <?=(isset($_GET['p_type']) && $_GET['p_type'] === '0' && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>>All Types</option>
                            				    <?php if(!empty($property_type) && !empty($property_type['commercial'])){ foreach($property_type['commercial'] as $commercial){ ?>
                            					    <option value="<?=strtolower(str_replace(array(' ','/',';'),'',$commercial));?>" <?=((isset($_GET['p_type']) && $_GET['p_type'] === strtolower(str_replace(array(' ','/',';'),'',$commercial))))?'selected':'';?>><?=$commercial;?></option>
                            					<?php } } ?>
                            				</select>
                            			</div>
                            			<div class="col-sm pr-lg-0 pt-6 pt-lg-0 order-3">
                            				<a href="#advanced-search-filters-commercial"
                            				    class="btn advanced-search btn-accent h-lg-80 w-100 shadow-none text-secondary rounded-0 fs-14 fs-sm-16 font-weight-600 text-left d-flex align-items-center <?=((isset($_GET['type']) && $_GET['type'] === 'commercial') && (count($_GET) > 3))?'':'collapsed';?>"
                            					data-toggle="collapse" data-target="#advanced-search-filters-commercial" aria-expanded="<?=((isset($_GET['type']) && $_GET['type'] === 'commercial') && (count($_GET) > 3))?'true':'false';?>"
                            					aria-controls="advanced-search-filters-commercial">
                            					Advanced Search
                            				</a>
                            			</div>
                            			<div class="col-sm pt-6 pt-lg-0 order-sm-4 order-5">
                            			    <button type="submit" class="btn btn-primary shadow-none fs-16 font-weight-600 w-100 py-lg-2 lh-213">Search</button>
                            			</div>
                        			    <div id="advanced-search-filters-commercial" class="col-12 pt-4 pb-sm-4 order-sm-5 order-4 collapse <?=((isset($_GET['type']) && $_GET['type'] === 'commercial') && (count($_GET) > 3))?'show':'';?>" data-parent="#accordion-commercial">
                                                <div class="row"> 
                        							<div class="col-md-3 col-lg-3 pt-2 slider-range slider-range-secondary">
                        								<label for="floor_area" class="text-uppercase font-weight-500 letter-spacing-093 mb-4">Floor Area</label>
                        								<div data-slider="true" data-slider-options='{"min":0,"max":5000,"values":[<?=(isset($_GET['floor_area']) && ($floor_area = explode('to',$_GET['floor_area'])) && !empty($floor_area[0]))?str_replace(array('$',',','sqmts'),'',$floor_area[0]):0;?>,<?=(isset($_GET['floor_area']) && ($floor_area = explode('to',$_GET['floor_area'])) && !empty($floor_area[1]))?str_replace(array('$',',','sqmts'),'',$floor_area[1]):5000;?>],"type":"sqmts"}'></div>
                        								<div class="text-center mt-2">
                        									<input id="floor_area" type="text" readonly name="floor_area" class="border-0 amount text-center text-body font-weight-500 bg-transparent">
                        								</div>
                        							</div>
                        							<div class="col-md-3 col-lg-3 pt-2 slider-range slider-range-secondary">
                        								<label for="area" class="text-uppercase font-weight-500 letter-spacing-093 mb-4">Land Area</label>
                        								<div data-slider="true" data-slider-options='{"min":0,"max":10000,"values":[<?=(isset($_GET['area']) && ($area = explode('to',$_GET['area'])) && !empty($area[0]))?str_replace(array('$',',','sqmts'),'',$area[0]):0;?>,<?=(isset($_GET['area']) && ($area = explode('to',$_GET['area'])) && !empty($area[1]))?str_replace(array('$',',','sqmts'),'',$area[1]):10000;?>],"type":"sqmts"}'></div>
                        								<div class="text-center mt-2">
                        									<input id="area" type="text" readonly name="area" class="border-0 amount text-center text-body font-weight-500 bg-transparent">
                        								</div>
                        							</div>
                                					<div class="col-md-2 col-lg-2 py-2">
                                            			<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Price Select</label>
                                            			<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="duration" id="price_duration" title="" data-style="p-0 h-24 lh-17 text-dark">
                                            				<option value="Annum" <?=((isset($_GET['duration']) && $_GET['duration'] === 'Annum'))?'selected':'';?>>Per Annum</option>
                                            				<option value="Month" <?=((isset($_GET['duration']) && $_GET['duration'] === 'Month'))?'selected':'';?>>Per Month</option>
                                            				<option value="Negotiation" <?=((isset($_GET['duration']) && $_GET['duration'] === 'Negotiation'))?'selected':'';?>>By Negotiation</option>
                                            			</select>
                                					</div>
                        							<div class="col-md-4 col-lg-4 pt-2 slider-range slider-range-secondary" id="commercial_price_slider">
                        								<label for="price" class="text-uppercase font-weight-500 letter-spacing-093 mb-4">Price Range</label>
                        								<div data-slider="true" data-slider-options='{"min":0,"max":1000000,"values":[<?=(isset($_GET['price']) && ($price = explode('to',$_GET['price'])) && !empty($price[0]))?str_replace(array('$',','),'',$price[0]):0;?>,<?=(isset($_GET['price']) && ($price = explode('to',$_GET['price'])) && !empty($price[1]))?str_replace(array('$',','),'',$price[1]):1000000;?>],"type":"currency", "step":"1000"}'></div>
                        								<div class="text-center mt-2">
                        									<input id="commercial_price" type="text" readonly name="price" class="border-0 amount text-center text-body font-weight-500 bg-transparent">
                        								</div>
                        							</div>
                        							<div class="col-md-2 col-lg-2 py-3">
                                    					<label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Carparks</label>
                                    					<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-color-input" name="parkings" title="<?=((isset($_GET['parkings']) && $_GET['parkings'] !== '') && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?(($_GET['parkings'] === '1')?'Yes':'No'):'Any';?>" data-style="p-0 h-24 lh-17 text-dark">
                                    						<option value="">Any</option>
                                    						<?php for($i=1;$i<=10;$i++){ ?>
                                                		        <option value="<?=$i;?>" <?=((isset($_GET['parkings']) && $_GET['parkings'] !== '' && $_GET['parkings'] === "$i") && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>><?=$i;?></option>
                                                		    <?php } ?>
                                    					</select>
                        							</div>
                        							<div class="col-md-3 col-lg-3 py-3">
                        								<div><label class="text-uppercase font-weight-500 letter-spacing-093 mb-1">Sort by</label></div>
                                            			<div class="custom-control custom-checkbox" style="margin: auto; float: left; padding-right: 20px;">
                                            			    <input type="checkbox" class="custom-control-input" id="commercial_premium" value="1" name="premium" <?=((isset($_GET['premium']) && $_GET['premium'] === '1') && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'checked':'';?>>
                                            				<label class="custom-control-label" for="commercial_premium">Premium</label>
                                        				</div>
                                        				<div class="custom-control custom-checkbox" style="margin: auto; float: left;">
                                        				    <input type="checkbox" class="custom-control-input" id="commercial_featured" value="1" name="featured" <?=((isset($_GET['featured']) && $_GET['featured'] === '1') && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'checked':'';?>>
                                        					<label class="custom-control-label" for="commercial_featured">Featured</label>
                                        				</div>
                        							</div>
                            			        <div class="col-md-7 col-lg-7 col-xl-7 py-3">
                            						<label class="text-uppercase font-weight-500 letter-spacing-093">Search by Keyword</label>
                            						<div class="position-relative">
                            							<input type="text" name="address"
                            							       class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 pl-0 pr-4 font-weight-600 border-color-input placeholder-muted selectpicker"
                            							       placeholder="by keyword, address, title or property ID" value="<?=((isset($_GET['address']) && $_GET['address'] !== '') && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?$_GET['address']:'';?>">
                            						</div>
                            		            </div>
                        					</div>
                        					<div class="row">
                    							<?php if($amenities != false){ ?>	
                    							<div class="col-12 pt-2">
                    								<a class="lh-17 d-inline-block other-feature <?=((isset($_GET['aminities']) && !empty($_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'':'collapsed';?>" data-toggle="collapse"
                    								   href="#other-feature-commercial" role="button"
                    								   aria-expanded="<?=((isset($_GET['aminities']) && !empty($_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'true':'false';?>" aria-controls="other-feature-commercial">
                    									<span class="fs-15 text-heading font-weight-500 hover-primary">Other Features</span>
                    								</a>
                    							</div>
                    							<div class="collapse row mx-0 w-100 <?=((isset($_GET['aminities']) && !empty($_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'show':'';?>" id="other-feature-commercial">
                    							    <?php foreach($amenities as $amenity){ if($amenity->property_type == 'Commercial'){ ?>
                        								<div class="col-sm-6 col-md-4 col-lg-2">
                        									<div class="custom-control custom-checkbox">
                        										<input type="checkbox" class="custom-control-input" name="aminities[]" value="<?=$amenity->sno;?>" id="<?=$amenity->sno.'_'.preg_replace('/[^a-zA-Z0-9_ -]/s','_',str_replace(' ','_',$amenity->name));?>" <?=((isset($_GET['aminities']) && !empty($_GET['aminities']) && in_array($amenity->sno,$_GET['aminities'])) && (isset($_GET['type']) && $_GET['type'] === 'commercial'))?'checked':'';?>>
                        										<label class="custom-control-label" for="<?=$amenity->sno.'_'.preg_replace('/[^a-zA-Z0-9_ -]/s','_',str_replace(' ','_',$amenity->name));?>"><?=ucwords($amenity->name);?></label>
                        									</div>
                        								</div>
                    							    <?php } } ?>
                    							</div>
                    							<?php } ?>
                    						</div>
                        				</div>
                    			    </div>
                    			</form>
        				    </div>
        				</div>
        			</div>
        		</div>
        		<form class="property-search property-search-mobile d-lg-none z-index-2 position-relative bg-white rounded mx-md-10" method="get" action="<?=base_url('properties');?>">
        			<div class="row align-items-lg-center" id="accordion-4-mobile">
        				<div class="col-12">
        					<div class="form-group mb-0 position-relative">
        						<a href="#advanced-search-filters-4-mobile"
        						   class="text-secondary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
        						   data-toggle="collapse" data-target="#advanced-search-filters-4-mobile"
        						   aria-expanded="true"
        						   aria-controls="advanced-search-filters-4-mobile">
        						</a>
        						<input type="text"
        						       class="form-control form-control-lg border shadow-none pr-9 pl-11 bg-white placeholder-muted"
        						       name="address"
        						       value="<?=((isset($_GET['address']) && $_GET['address'] !== ''))?$_GET['address']:'';?>"
        						       placeholder="Find Property Name or ID..">
        						<button type="submit"
        						        class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left">
        							<i class="far fa-search"></i>
        						</button>
        					</div>
        				</div>
        				<div id="advanced-search-filters-4-mobile" class="col-12 pt-2 px-7 collapse"
        				     data-parent="#accordion-4-mobile">
        					<div class="row mx-n2">
        						<div class="col-sm-6 pt-4 px-2">
        							<select class="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="<?=((isset($_GET['type']) && $_GET['type'] === 'commercial'))?'Commercial':'Residential';?>" data-style="btn-lg py-2 h-52 bg-transparent" id="type" name="type">
        								<option value="residential" <?=((isset($_GET['type']) && $_GET['type'] === 'residential'))?'selected':(((isset($_GET['type']) && $_GET['type'] === 'commercial'))?'':'selected');?>>Residential</option>
        								<option value="commercial" <?=((isset($_GET['type']) && $_GET['type'] === 'commercial'))?'selected':'';?>>Commercial</option>
        							</select>
        						</div>
        						<div class="col-sm-6 pt-4 px-2">
        						    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="Category" data-style="btn-lg py-2 h-52 bg-transparent" data-live-search="true" id="property-type" name="p_type">
                    					<?php if(!empty($property_type) && !empty($property_type['residential'])){ foreach($property_type['residential'] as $residential){ ?>
                    					    <option class="residential" value="<?=strtolower(str_replace(array(' ','/',';'),'',$residential));?>" <?=(isset($_GET['p_type']) && $_GET['p_type'] != '' && $_GET['p_type'] === strtolower(str_replace(array(' ','/',';'),'',$residential)))?'selected':'';?>><?=$residential;?></option>
                    					<?php } } if(!empty($property_type) && !empty($property_type['commercial'])){ foreach($property_type['commercial'] as $commercial){ ?>
                                            <option class="commercial" value="<?=strtolower(str_replace(array(' ','/',';'),'',$commercial));?>" <?=(isset($_GET['p_type']) && $_GET['p_type'] != '' && $_GET['p_type'] === strtolower(str_replace(array(' ','/',';'),'',$commercial)))?'selected':'';?>><?=$commercial;?></option>
                                        <?php } } ?>
                    				</select>
        						</div>
        						<div class="col-sm-6 pt-4 px-2 residential">
        							<select class="form-control border shadow-none form-control-lg selectpicker bg-transparent" name="bedrooms" title="Bedrooms" data-style="btn-lg py-2 h-52 bg-transparent">
        								<option value="">Any</option>
                    					<?php for($i=1;$i<=10;$i++){ ?>
                    					    <option value="<?=$i;?>" <?=((isset($_GET['bedrooms']) && $_GET['bedrooms'] === $i))?'selected':'';?>><?=$i;?></option>
                    					<?php } ?>
        							</select>
        						</div>
        						<div class="col-sm-6 pt-4 px-2 residential">
        							<select class="form-control border shadow-none form-control-lg selectpicker bg-transparent" name="bathrooms" title="Bathrooms" data-style="btn-lg py-2 h-52 bg-transparent">
        								<option value="">Any</option>
                    					<?php for($i=1;$i<=10;$i++){ ?>
                    					    <option value="<?=$i;?>" <?=((isset($_GET['bathrooms']) && $_GET['bathrooms'] === $i))?'selected':'';?>><?=$i;?></option>
                    					<?php } ?>
        							</select>
        						</div>
        						<div class="col-sm-6 pt-4 px-2">
        						    <select class="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="Region" data-style="btn-lg py-2 h-52 bg-transparent" data-live-search="true" id="mobile_region" name="region">
                    				    <?php if($regions != false){ foreach($regions as $region){ ?>
                    					    <option value="<?=$region->sno;?>" <?=((isset($_GET['region']) && $_GET['region'] !== '' && $regions != false && ($_GET['region'] === $region->sno)))?'selected':'';?>><?=ucwords($region->region_name);?></option>
                    					<?php } } ?>
                    				</select>
        						</div>
        						<div class="col-sm-6 pt-4 px-2">
                    				<select class="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="District" data-style="btn-lg py-2 h-52 bg-transparent" data-live-search="true" id="mobile_district" name="district">
                    				    <?php if((isset($_GET['region']) && $_GET['region'] !== '' && $districts != false)){ foreach($districts as $district){ ?>
                    					    <option value="<?=$district->sno;?>" <?=((isset($_GET['district']) && $_GET['district'] !== '' && $districts != false && ($_GET['district'] === $district->sno)))?'selected':'';?>><?=ucwords($district->district);?></option>
                    					<?php } } ?>
                    				</select>
        						</div>
        						<div class="col-sm-6 pt-4 px-2">
        							<select class="form-control border shadow-none form-control-lg selectpicker bg-transparent" title="Suburb" data-style="btn-lg py-2 h-52 bg-transparent" data-live-search="true" id="mobile_suburb" name="suburb">
                    				    <?php if((isset($_GET['district']) && $_GET['district'] !== '' && $suburbs != false)){ foreach($suburbs as $suburb){ ?>
                    					    <option value="<?=$suburb->sno;?>" <?=((isset($_GET['suburb']) && $_GET['suburb'] !== '' && $suburbs != false && ($_GET['suburb'] === $suburb->sno)))?'selected':'';?>><?=ucwords($suburb->suburb);?></option>
                    					<?php } } ?>
                    				</select>
        						</div>
        					</div>
        					<div class="row">
        						<div class="col-md-6 pt-6 slider-range slider-range-secondary">
        							<label for="price-4-mobile" class="mb-4">Price Range</label>
        							<div data-slider="true"
        							     data-slider-options='{"min":0,"max":1000000,"values":[<?=(isset($_GET['price']) && ($price = explode('to',$_GET['price'])) && !empty($price[0]))?str_replace(array('$',','),'',$price[0]):0;?>,<?=(isset($_GET['price']) && ($price = explode('to',$_GET['price'])) && !empty($price[1]))?str_replace(array('$',','),'',$price[1]):1000000;?>],"type":"currency"}'></div>
        							<div class="text-center mt-2">
        								<input id="price-4-mobile" type="text" readonly
        								       class="border-0 amount text-center bg-transparent font-weight-500"
        								       name="price">
        							</div>
        						</div>
        						<div class="col-md-6 pt-6 slider-range slider-range-secondary">
        							<label for="area-size-4-mobile" class="mb-4">Area Size</label>
        							<div data-slider="true"
        							     data-slider-options='{"min":0,"max":50000,"values":[<?=(isset($_GET['area']) && ($area = explode('to',$_GET['area'])) && !empty($area[0]))?str_replace(array('$',',','sqmts'),'',$area[0]):0;?>,<?=(isset($_GET['area']) && ($area = explode('to',$_GET['area'])) && !empty($area[1]))?str_replace(array('$',',','sqmts'),'',$area[1]):50000;?>],"type":"sqmts"}'></div>
        							<div class="text-center mt-2">
        								<input id="area-size-4-mobile" type="text" readonly
        								       class="border-0 amount text-center bg-transparent font-weight-500"
        								       name="area">
        							</div>
        						</div>
        						<div class="col-12 pt-4 pb-2">
        							<a class="lh-17 d-inline-block other-feature collapsed" data-toggle="collapse"
        							   href="#other-feature-4-mobile"
        							   role="button"
        							   aria-expanded="false" aria-controls="other-feature-4-mobile">
        								<span class="fs-15 font-weight-500 hover-primary">Other Features</span>
        							</a>
        						</div>
        						<?php if($amenities != false){ ?>
        						<div class="collapse row mx-0 w-100" id="other-feature-4-mobile">
        						    <?php foreach($amenities as $amenity){ ?>
        							<div class="col-sm-6 py-2 <?=strtolower($amenity->property_type);?>">
        								<div class="custom-control custom-checkbox">
        									<input type="checkbox" class="custom-control-input"<?=((isset($_GET['aminities']) && !empty($_GET['aminities']) && in_array($amenity->sno,$_GET['aminities'])))?'checked':'';?> name="aminities[]" value="<?=$amenity->sno;?>" id="<?=$amenity->sno.'_'.preg_replace('/[^a-zA-Z0-9_ -]/s','_',str_replace(' ','_',$amenity->name));?>-mobile">
        									<label class="custom-control-label" for="<?=$amenity->sno.'_'.preg_replace('/[^a-zA-Z0-9_ -]/s','_',str_replace(' ','_',$amenity->name));?>-mobile"><?=ucwords($amenity->name);?></label>
        								</div>
        							</div>
        							<?php } ?>
        						</div>
        						<?php } ?>
        					</div>
        				</div>
        			</div>
        		</form>
        	</div>
        </div>
    </section>