    <main id="content">
        <?=property_search_tab();?>
      <section class="pt-4 pt-md-4 pb-8 bg-gray-01">
        <div class="container">
            <form method="get" action="<?=base_url('properties').(!empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:'');?>">
    			<div class="row align-items-sm-center mb-4">
        			<?php
        			 //   foreach($_GET as $key => $val){
            //                 if($key != 'sortby'){
            //                     echo '<input type="hidden" name="'.htmlspecialchars($key).'" value="'.htmlspecialchars($val).'" />';
            //                 }
            //             }
        			    $get_ = explode('&',http_build_query($_GET));
                        foreach($get_ as $key => $val){
                            if($key != 'sortby'){
                                    echo '<input type="hidden" name="'.htmlspecialchars(urldecode(explode('=',$val)[0])).'" value="'.htmlspecialchars(urldecode(explode('=',$val)[1])).'" />';
                            }
                        }
                    ?>
    				<div class="col-md-12 mt-2 mt-md-0">
    					<div class="d-flex justify-content-md-end align-items-center">
    						<div class="input-group border rounded input-group-lg w-auto bg-white mr-3">
    							<label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
    							<select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="sortby" onchange="this.form.submit()" name="sortby">
    								<option value="newest" <?=((isset($_GET['sortby']) && ($_GET['sortby'] === 'newest')))?'selected':'';?>>Latest</option>
    								<option value="oldest" <?=((isset($_GET['sortby']) && ($_GET['sortby'] === 'oldest')))?'selected':'';?>>Oldest</option>
    								<option value="high" <?=((isset($_GET['sortby']) && ($_GET['sortby'] === 'high')))?'selected':'';?>>Price: High to Low</option>
    								<option value="low" <?=((isset($_GET['sortby']) && ($_GET['sortby'] === 'low')))?'selected':'';?>>Price: Low to High</option>
    							</select>
    						</div>
    					</div>
    				</div>
    			</div>
			</form>
	    
	    <!--
		<div class="row">
		    <div class="col-lg-3 col-md-6 pb-6">
            	<div class="card shadow-hover-1" data-animate="fadeInUp">
            		<div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
            			<img src="https://ps4works.in/clients/nzrealty/uploads/small/property_thumbnail_16721662475619.jpeg" alt="Affordable Urban House">
            			<div class="card-img-overlay p-2 d-flex flex-column">
            				<div><span class="badge mr-2 badge-orange">Premium</span></div>
            				<ul class="list-inline mb-0 mt-auto hover-image">
            					<li class="list-inline-item mr-2" data-toggle="tooltip" title="Wishlist">
            						<a href="javascript:void(0);" class="wishlist text-white hover-primary"><i class="far fa-heart"></i></a>
            					</li>
            				</ul>
            			</div>
            		</div>
            		<div class="card-body pt-3" style="padding: 0.5rem !important;">
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <span class="text-heading">$1,250</span>
                    		        <p class="font-weight-500 text-gray-light mb-0"><a href="#" target="_blank" class="text-dark hover-primary">1421 San Pedro St, LA</a></p>
                            		<ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                            			<li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bedroom"><svg class="icon icon-bedroom fs-18 text-primary mr-1"><use xlink:href="#icon-bedroom"></use></svg>3</li>
                            			<li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="3 Bathrooms"><svg class="icon icon-shower fs-18 text-primary mr-1"><use xlink:href="#icon-shower"></use></svg>3</li>
                            			<li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="1 Garage"><svg class="icon icon-Garage fs-18 text-primary mr-1"><use xlink:href="#icon-Garage"></use></svg>1</li>
                            		</ul>
                                </td>
                                <td style="text-align: right;">
                    				<a href="#" class="w-60px h-60 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent" data-toggle="tooltip" title="" style="vertical-align: bottom;">
                    				    <img src="https://ps4works.in/clients/nzrealty/uploads/small/profile_51301662527912.png" alt="" style="vertical-align: text-top;" />
                    				</a>        
                                </td>
                            </tr>
                        </table>
            		</div>
            		<div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3" style="padding: 4px !important;background-color: #163c5d !important;">
            		    <a href="#"><img src="https://s.oneroof.co.nz/image/03/e2/03e214e6abda4a2cf9613b82a51a84d7.png?x-oss-process=image/quality,q_80/resize,h_37" alt="" style="width: 100px;" /></a>
            		</div>
            	</div>
            </div>
		</div>
		
		-->
		
		
		
        <?php if($properties != false){ ?>
          <div class="row">
            <?php foreach($properties as $property){ $wishlist = ($logged = $this->session->userdata('logged_in'))?get('wishlist', array('property' => $property->sno, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)):false; $user = user($property->role, $property->agent); $others = ($property->other != '')?json_decode($property->other):false; ?>
            <div class="col-lg-4 col-md-6 pb-6">
            	<div class="card shadow-hover-1" data-animate="fadeInUp">
            		<div class="hover-change-image bg-hover-overlay rounded-lg card-img-top" style="max-height:216px;min-height:216px;overflow: hidden;">
            			<img src="<?=base_url('uploads/small/'.$property->images);?>" alt="<?=$property->title;?>">
            			<div class="card-img-overlay p-2 d-flex flex-column">
                            <?php if(($property->featured == 1) || ($property->premium == 1)){ ?>
                            <div class="mb-auto">
                                <?php if($property->featured == 1)
                                {
                                    echo '<span class="badge mr-2 badge-indigo">Featured</span>';
                                }
                                if($property->premium == 1)
                                {
                                    echo '<span class="badge mr-2 badge-orange">Premium</span>';
                                } ?>
                            </div>
                            <?php } ?>
                          <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($property->agent == $logged['id']) && ($property->role == $logged['role'])){ } else{ ?>
                          
            				<ul class="list-inline mb-0 mt-auto hover-image">
            					<li class="list-inline-item mr-2" data-toggle="tooltip" data-placement="right" title="Wishlist">
            						<a href="javascript:void(0);" id="<?=$property->accesskey;?>" class="wishlist text-white hover-primary">
            							<i class="fa<?=$wishlist?'s':'r';?> fa-heart"></i>
            						</a>
            					</li>
            				</ul>
                          <?php } ?>
            			</div>
            		</div>
            		<div class="card-body pt-3" style="padding: 0.5rem !important;">
                            <table id="property-card">
                                <tr>
                                    <td>
                                        <span class="text-heading"><?=(($property->ptype == 'commercial') && ($property->negotiation == '1'))?'Price By Negotiable':currency().$property->price;?></span>
                                        <span class="fs-12 font-weight-500 text-gray-light"> <?=(($property->negotiation == '0') && ($property->duration != ''))?'/ '.$property->duration:'';?><?=(($property->ptype === 'commercial') && ($property->negotiation == '0') && ($others != false))?(($others->gst == 'plusgst')?' plus GST':' incl GST').(((!empty($others->outgoings)) && ($others->outgoings == 'plusout'))?' plus Outgoings':' incl Outgoings'):'';?></span>
                        		        <p class="font-weight-500 text-gray-light mb-0">
                        		            <a href="<?=base_url('properties/single/'.$property->accesskey);?>" target="_blank" class="text-dark hover-primary text-ellipsis" data-toggle="tooltip" title="<?=property_name_replace($property->address);?>"><?=property_name_replace($property->address);?></a>
                        		        </p>
                                		<ul class="list-inline d-flex mb-0 flex-wrap mr-n5">
                                		    <?php if((($property->ptype === 'commercial') && (!empty($property->floor_area))) || (($property->ptype === 'residential') && (!empty($property->bedrooms)))){ ?>
                                			    <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="<?=(($property->ptype === 'commercial')?' Floor Area':$property->bedrooms.' Bedrooms');?>"><svg class="icon icon-<?=(($property->ptype === 'commercial')?'square':'bedroom');?> fs-18 text-primary mr-1"><use xlink:href="#icon-<?=(($property->ptype === 'commercial')?'square':'bedroom');?>"></use></svg><?=(($property->ptype === 'commercial')?$property->floor_area.' m<sup>2</sup>':$property->bedrooms);?></li>
                                			<?php } if((($property->ptype === 'commercial') && (!empty($property->sqft))) || (($property->ptype === 'residential') && (!empty($property->bathrooms)))){ ?>
                                			    <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="<?=(($property->ptype === 'commercial')?' Land Area':$property->bathrooms.' Bathrooms');?>"><svg class="icon icon-<?=(($property->ptype === 'commercial')?'price':'shower');?> fs-18 text-primary mr-1"><use xlink:href="#icon-<?=(($property->ptype === 'commercial')?'price':'shower');?>"></use></svg><?=(($property->ptype === 'commercial')?$property->sqft.' m<sup>2</sup>':$property->bathrooms);?></li>
                                			<?php } if(!empty($property->parkings) || !empty($property->carport) || !empty($property->offshoreparking)) { ?>
                                			    <li class="list-inline-item text-gray font-weight-500 fs-13 d-flex align-items-center mr-5" data-toggle="tooltip" title="<?=(int)$property->parkings+(int)$property->carport+(int)$property->offshoreparking;?> Carpark"><i class="fal fa-car fs-18 text-primary mr-1"></i><?=(int)$property->parkings+(int)$property->carport+(int)$property->offshoreparking;?></li>
                                		    <?php } ?>
                                		</ul>
                                    </td>
                                    <td style="text-align: right;">
                        				<a href="<?=base_url('agents/');?>" class="w-60px h-60 border rounded-circle d-inline-flex align-items-center justify-content-center text-body hover-secondary bg-hover-accent border-hover-accent mt-2" data-toggle="tooltip" title="" style="vertical-align: bottom;">
                        				    <img src="<?=profilepic(($user != false)?$user[0]->img:'300x300.png');?>" data-toggle="tooltip" data-placement="left" title="<?=(($user != false)?$user[0]->name:'');?>" alt="<?=(($user != false)?$user[0]->name:'');?>" style="vertical-align: text-top; border-radius:50%;width:100%;height:100%;" class="w-60px h-60"  />
                        				</a>        
                                    </td>
                                </tr>
                            </table>
                        
            		</div>
            		<?php if(($property->role == 'agents') && $user != false && ($user[0]->company != 0)) { $company = user('company', $user[0]->company); ?>
            		<div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3" style="padding: 4px !important;background-color: <?=$company[0]->bgcolor;?> !important;">
            		    <a href="<?=base_url('agency/'.strtolower(str_replace(' ','-',urlencode($company[0]->name))));?>"><img src="<?=companypic($company[0]->img);?>" data-toggle="tooltip" title="<?=$company[0]->name;?>" alt="<?=$company[0]->name;?>" style="height:26px;" /></a>
            		</div>
            		<?php } else{ ?>
            		<div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3" style="padding: 4px !important;background-color: #ccc !important;">
            		    <a href="<?=base_url('agents/');?>"><h6 style="color: #666; margin-bottom: 0px; padding: 4px;"  data-toggle="tooltip" title="<?=(($user != false)?$user[0]->name:'');?>" alt="<?=(($user != false)?$user[0]->name:'');?>" >Private Listing</h6></a>
            		</div>
            		<?php } ?>
            		
            	</div>
            </div>
            <?php } ?>
          </div>
          <nav class="pt-6">
            <?=$links;?>
          </nav>
        <?php } else{ ?>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-heading mb-4 fs-22 fs-md-32 text-center lh-16 px-6">No Data Found!</h2>
                </div>
            </div>
        <?php } ?>
        </div>
      </section>
    </main>
    