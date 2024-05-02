    <main id="content">
    <div class="bg-gray-01" data-animated-id="1">

<!--
      <section class="pb-6 pt-6">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('agencies');?>">Companies</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?=$title;?></li>
            </ol>
          </nav>
        </div>
      </section>
-->

    <section class="pb-11 pt-6">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-8">
                    <div class="card border-0 px-6 pt-6 pb-10">
                        <div class="row h-100">
                            <div class="col-sm-12">
                                <div style="padding:10px 5px; background-color: <?=$company[0]->bgcolor;?>;margin-bottom: 10px; border-radius: 6px;">
                                    <img class="" src="<?=companypic($company[0]->img);?>" alt="<?=$company[0]->name;?>" style="height: 60px;padding: 5px;">
                                </div>
                                <div class="card-body p-0">
                                    <h2 class="card-title fs-22 lh-15 mb-1 text-dark"><?=first_ltr_upper($company[0]->name);?></h2>
                                    <p class="card-text mb-1"><?=first_ltr_upper($company[0]->address);?></p>
                                    <ul class="list-group list-group-no-border">
                                        <?=(!empty($company[0]->phone))?'<li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0"><span class="col-sm-3 px-1">Phone</span><span class="col-sm-9 px-1 text-heading font-weight-500">'.$company[0]->phone.'</span></li>':'';?>
                                        <?=(!empty($company[0]->office))?'<li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0"><span class="col-sm-3 px-1">Office</span><span class="col-sm-9 px-1 text-heading font-weight-500">'.$company[0]->phone.'</span></li>':'';?>
                                        <?=(!empty($company[0]->fax))?'<li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0"><span class="col-sm-3 px-1">Fax</span><span class="col-sm-9 px-1 text-heading font-weight-500">'.$company[0]->fax.'</span></li>':'';?>
                                        <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                                            <span class="col-sm-3 px-1">Email</span>
                                            <span class="col-sm-9 px-1"><?=(!empty($company[0]->email))?$company[0]->email:'-';?></span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                                            <span class="col-sm-3 px-1">Language</span>
                                            <span class="col-sm-9 px-1">English, French, Spanish</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                                            <span class="col-sm-3 px-1">Website</span>
                                            <span class="col-sm-9 px-1"><?=(!empty($company[0]->website))?$company[0]->website:'-';?></span>
                                        </li>
                                        <?php if(($company[0]->twitter != '') || ($company[0]->facebook != '') || ($company[0]->instagram != '') || ($company[0]->linkedin != '')){ ?>
                                        <li class="list-group-item d-flex align-items-sm-center lh-214 row mb-0 mt-3 mx-n1 p-0 ">
                                            <span class="col-sm-3 px-1">Social</span>
                                            <ul class="col-sm-9 list-inline text-gray-lighter m-0 px-1">
                                            <?php if($company[0]->twitter != ''){ ?>
                                              <li class="list-inline-item mx-0 my-1">
                                                <a href="<?=($company[0]->twitter != '')?$company[0]->twitter:'javascript:void(0);';?>" <?=($company[0]->twitter != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-twitter"></i></a>
                                              </li>
                                            <?php } ?>
                                            <?php if($company[0]->facebook != ''){ ?>
                                              <li class="list-inline-item mr-0 ml-2 my-1">
                                                <a href="<?=($company[0]->facebook != '')?$company[0]->facebook:'javascript:void(0);';?>" <?=($company[0]->facebook != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-facebook-f"></i></a>
                                              </li>
                                            <?php } ?>
                                            <?php if($company[0]->instagram != ''){ ?>
                                              <li class="list-inline-item mr-0 ml-2 my-1">
                                                <a href="<?=($company[0]->instagram != '')?$company[0]->instagram:'javascript:void(0);';?>" <?=($company[0]->instagram != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-instagram"></i></a>
                                              </li>
                                            <?php } ?>
                                            <?php if($company[0]->linkedin != ''){ ?>
                                              <li class="list-inline-item mr-0 ml-2 my-1">
                                                <a href="<?=($company[0]->linkedin != '')?$company[0]->linkedin:'javascript:void(0);';?>" <?=($company[0]->linkedin != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-linkedin-in"></i></a>
                                              </li>
                                            <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h3 class="card-title text-heading fs-16 lh-213 mt-4">About <?=first_ltr_upper($company[0]->name);?></h3>
                                <p class="lh-214 mb-2"><?=paragraph(strip_tags($company[0]->about));?></p>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="col-lg-4">
                <div class="card border-0">
                  <div class="card-body p-6">
                    <h3 class="card-title fs-16 text-dark mb-6"> Contact <?=$company[0]->name;?></h3>
                    <form class="form" method="post" action="#" data-action="<?=base_url('agencies/request');?>" id="nzform" autocomplete="off">
                      <div class="form-group mb-2">
                        <input type="text" class="form-control form-control-lg border-0" name="name" value="<?=(isset($logged))?$logged['name']:'';?>" placeholder="Full Name*">
                        <small class="form-text text-danger name"></small>
                      </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                      <div class="form-group mb-2">
                        <input type="email" class="form-control form-control-lg border-0" name="email" value="<?=(isset($logged))?$logged['email']:'';?>" placeholder="Email*">
                        <small class="form-text text-danger email"></small>
                      </div>
                      <div class="form-group mb-4">
                        <input type="tel" class="form-control form-control-lg border-0" name="phone" value="" placeholder="Phone">
                        <small class="form-text text-danger phone"></small>
                      </div>
                      <div class="form-group mb-4">
                        <textarea class="form-control border-0" name="message" rows="4" placeholder="Type your message here"></textarea>
                        <small class="form-text text-danger message"></small>
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg btn-block rounded" id="nz-submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
      
        <section class="pb-11 pt-5">
          <div class="container">
            <div class="collapse-tabs mb-4">
              <ul class="nav nav-tabs text-uppercase d-none d-md-inline-flex agent-details-tabs" role="tablist">
                <li class="nav-item">
                  <a href="#agents" class="nav-link active shadow-none fs-13" data-toggle="tab" role="tab">
                    PMs & Agents
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#residentials" class="nav-link shadow-none fs-13" data-toggle="tab" role="tab">
                    Residentials
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#commercials" class="nav-link shadow-none fs-13" data-toggle="tab" role="tab">
                    Commercials
                  </a>
                </li>
                <li class="nav-item ml-0">
                  <a href="#maps" class="nav-link shadow-none fs-13" data-toggle="tab" role="tab">
                    Office Location
                  </a>
                </li>
              </ul>
              <div class="tab-content shadow-none py-7 px-6 bg-white">
                <div id="collapse-tabs-accordion-01">
                  <div class="tab-pane tab-pane-parent fade show active" id="agents" role="tabpanel">
                    <div class="card border-0 bg-transparent">
                      <div class="card-headerr border-0 d-block d-md-none bg-transparent px-0 py-1">
                        <h5 class="mb-0">
                          <button class="btn lh-2 fs-18 bg-white py-1 px-6 mb-4 shadow-none w-100 collapse-parent border"
                            data-toggle="collapse" data-target="#agents-collapse" aria-expanded="true" aria-controls="agents-collapse">
                            Agents
                          </button>
                        </h5>
                      </div>
                      <div id="agents-collapse" class="collapse show collapsible" data-parent="#collapse-tabs-accordion-01">
                        <div class="card-body p-0">
                          <div class="d-flex flex-wrap listing-agents">
                            <?php if($agents != false){ foreach($agents as $agent){ ?>
                            <div class="card border-0 px-7 mb-2">
                              <div class="card-body p-0 text-center">
                                <a href="<?=base_url('agent/'.encode($agent->sno));?>" class="d-block text-center">
                                  <img src="<?=profilepic((isset($agent->img))?$agent->img:'300x300.png');?>" width="140px" height="140px" class="mb-2" alt="<?=$agent->name;?>" style="min-width:140px;max-width:140px;min-height:140px;max-height:140px;border-radius:70px;">
                                </a>
                                <a href="<?=base_url('agent/'.encode($agent->sno));?>" class="card-title d-block text-dark fs-16 font-weight-500 lh-2 hover-primary mb-0">
                                  <?=first_ltr_upper($agent->name);?>
                                </a>
                                <p class="card-text">
                                  <?=paragraph($agent->position);?>
                                </p>
                              </div>
                            </div>
                            <?php } } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane tab-pane-parent fade" id="residentials" role="tabpanel">
                    <div class="card border-0 bg-transparent">
                      <div class="card-headerr border-0 d-block d-md-none bg-transparent px-0 py-1">
                        <h5 class="mb-0">
                          <button class="btn lh-2 fs-18 bg-white py-1 px-6 mb-4 shadow-none w-100 collapse-parent border"
                            data-toggle="collapse" data-target="#residentials-collapse" aria-expanded="true" aria-controls="residentials-collapse">
                            Residentials
                          </button>
                        </h5>
                      </div>
                      <div id="residentials-collapse" class="collapse collapsible" data-parent="#collapse-tabs-accordion-01">
                        <div class="card-body p-0">
                            <?php if($properties != false){ ?>
                            <div class="row">
                                <?php foreach($properties as $property){ if($property->ptype == 'residential'){ $wishlist = ($logged = $this->session->userdata('logged_in'))?get('wishlist', array('property' => $property->sno, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)):false; $others = ($property->other != '')?json_decode($property->other):false; ?>
                                <div class="col-md-6 col-lg-3 mb-7">
                                  <div class="card border-0">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top" style="max-height: 158px;min-height: 158px;overflow: hidden;">
                                      <img src="<?=base_url('uploads/small/'.$property->images);?>" alt="<?=$property->title;?>">
                                      <div class="card-img-overlay d-flex flex-column">
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
                                        <div class="d-flex hover-image">
                                          <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($property->agent == $logged['id']) && ($property->role == $logged['role'])){ } else{ ?>
                                          <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                            <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist" data-placement="right">
                                              <a href="javascript:void(0);" id="<?=$property->accesskey;?>" class="wishlist text-white fs-20 hover-primary"><i class="fa<?=$wishlist?'s':'r';?> fa-heart"></i></a>
                                            </li>
                                          </ul>
                                          <?php } ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-body pt-3 px-0 pb-1">
                                      <h2 class="fs-16 mb-1"><a href="<?=base_url('properties/single/'.$property->accesskey);?>" class="text-dark hover-primary" data-toggle="tooltip" title="<?=property_name_replace($property->address);?>"><?=((strlen($property->address)>25)?property_name_replace(substr($property->address,0,25)).'..':property_name_replace($property->address));?></a></h2>
                                      <p class="fs-16 text-heading mb-0 lh-16"><?=(($property->ptype == 'commercial') && ($property->negotiation == '1'))?'Negotiable':currency().$property->price;?> <span class="fs-10 font-weight-500 text-gray-light"> <?=(($property->negotiation == '0') && ($property->duration != ''))?'/ '.$property->duration:'';?><?=(($property->ptype === 'commercial') && ($property->negotiation == '0') && ($others != false))?(($others->gst == 'plusgst')?' plus GST':' incl GST').(((!empty($others->outgoings)) && ($others->outgoings == 'plusout'))?' plus Outgoings':' incl Outgoings'):'';?></span></p>
                                    </div>
                                    <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                      <ul class="list-inline mb-0">
                                        <?php if(!empty($property->bedrooms)){ ?>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-6" data-toggle="tooltip" title="<?=$property->bedrooms;?> Bedrooms">
                                          <svg class="icon icon-bedroom fs-18 text-primary mr-1"><use xlink:href="#icon-bedroom"></use></svg><?=$property->bedrooms;?>
                                        </li>
                                        <?php } if(!empty($property->bathrooms)){ ?>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-6" data-toggle="tooltip" title="<?=$property->bathrooms;?> Bathrooms">
                                          <svg class="icon icon-shower fs-18 text-primary mr-1"><use xlink:href="#icon-shower"></use></svg><?=$property->bathrooms;?>
                                        </li>
                                        <?php } if(!empty($property->parkings) || !empty($property->carport) || !empty($property->offshoreparking)){ ?>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13" data-toggle="tooltip" title="<?=(int)$property->parkings+(int)$property->carport+(int)$property->offshoreparking;?> Parkings">
                                          <i class="fal fa-car fs-18 text-primary mr-1"></i><?=(int)$property->parkings+(int)$property->carport+(int)$property->offshoreparking;?>
                                        </li>
                                        <?php } ?>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <?php } } ?>
                            </div>
                            <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane tab-pane-parent fade" id="commercials" role="tabpanel">
                    <div class="card border-0 bg-transparent">
                      <div class="card-header border-0 d-block d-md-none bg-transparent p-0">
                        <h5 class="mb-0">
                          <button class="btn lh-2 fs-18 bg-white py-1 px-6 shadow-none w-100 collapse-parent border collapsed mb-4"
                            data-toggle="collapse" data-target="#commercials-collapse" aria-expanded="true" aria-controls="commercials-collapse">
                            Commercials
                          </button>
                        </h5>
                      </div>
                      <div id="commercials-collapse" class="collapse collapsible pb-5 pb-md-0" data-parent="#collapse-tabs-accordion-01">
                        <div class="card-body p-0">
                            <?php if($properties != false){ ?>
                            <div class="row">
                                <?php foreach($properties as $property){ if($property->ptype == 'commercial'){ $wishlist = ($logged = $this->session->userdata('logged_in'))?get('wishlist', array('property' => $property->sno, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)):false; $others = ($property->other != '')?json_decode($property->other):false; ?>
                                <div class="col-md-6 col-lg-3 mb-7">
                                  <div class="card border-0">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top" style="max-height: 158px;min-height: 158px;overflow: hidden;">
                                      <img src="<?=base_url('uploads/small/'.$property->images);?>" alt="<?=$property->title;?>">
                                      <div class="card-img-overlay d-flex flex-column">
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
                                        <div class="d-flex hover-image">
                                          <?php if(isset($logged) && (($logged['role'] == 'landlord') || ($logged['role'] == 'agents') || ($logged['role'] == 'company'))){ } elseif(isset($logged) && ($property->agent == $logged['id']) && ($property->role == $logged['role'])){ } else{ ?>
                                          <ul class="list-inline mb-0 d-flex align-items-end mr-n3">
                                            <li class="list-inline-item mr-3 h-32" data-toggle="tooltip" title="Wishlist" data-placement="right">
                                              <a href="javascript:void(0);" id="<?=$property->accesskey;?>" class="wishlist text-white fs-20 hover-primary"><i class="fa<?=$wishlist?'s':'r';?> fa-heart"></i></a>
                                            </li>
                                          </ul>
                                          <?php } ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-body pt-3 px-0 pb-1">
                                      <h2 class="fs-16 mb-1"><a href="<?=base_url('properties/single/'.$property->accesskey);?>" class="text-dark hover-primary" data-toggle="tooltip" title="<?=property_name_replace($property->address);?>"><?=((strlen($property->address)>25)?property_name_replace(substr($property->address,0,25)).'..':property_name_replace($property->address));?></a></h2>
                                      <p class="fs-16 text-heading mb-0 lh-16"><?=(($property->ptype == 'commercial') && ($property->negotiation == '1'))?'Negotiable':currency().$property->price;?> <span class="fs-10 font-weight-500 text-gray-light"> <?=(($property->negotiation == '0') && ($property->duration != ''))?'/'.$property->duration:'';?><?=(($property->ptype === 'commercial') && ($property->negotiation == '0') && ($others != false))?(($others->gst == 'plusgst')?' plus GST':' incl GST').(((!empty($others->outgoings)) && ($others->outgoings == 'plusout'))?' plus Outgoings':' incl Outgoings'):'';?></span></p>
                                    </div>
                                    <div class="card-footer bg-transparent px-0 pb-0 pt-2">
                                      <ul class="list-inline mb-0">
                                        <?php if(!empty($property->floor_area)){ ?>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-6" data-toggle="tooltip" title="Floor Area">
                                          <svg class="icon icon-square fs-18 text-primary mr-1"><use xlink:href="#icon-square"></use></svg><?=$property->floor_area.' m<sup>2</sup>';?>
                                        </li>
                                        <?php } if(!empty($property->sqft)){ ?>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-6" data-toggle="tooltip" title="Land Area">
                                          <svg class="icon icon-price fs-18 text-primary mr-1"><use xlink:href="#icon-price"></use></svg><?=$property->sqft.' m<sup>2</sup>';?>
                                        </li>
                                        <?php } if(!empty($property->parkings) || !empty($property->carport) || !empty($property->offshoreparking)){ ?>
                                        <li class="list-inline-item text-gray font-weight-500 fs-13" data-toggle="tooltip" title="<?=(int)$property->parkings+(int)$property->carport+(int)$property->offshoreparking;?> Parkings">
                                          <i class="fal fa-car fs-18 text-primary mr-1"></i><?=(int)$property->parkings+(int)$property->carport+(int)$property->offshoreparking;?>
                                        </li>
                                        <?php } ?>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <?php } } ?>
                            </div>
                            <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane tab-pane-parent fade" id="maps" role="tabpanel">
                    <div class="card border-0 bg-transparent">
                      <div class="card-headerr border-0 d-block d-md-none bg-transparent px-0 py-1">
                        <h5 class="mb-0">
                          <button class="btn lh-2 fs-18 bg-white py-1 px-6 mb-4 shadow-none w-100 collapse-parent border"
                            data-toggle="collapse" data-target="#maps-collapse" aria-expanded="true" aria-controls="maps-collapse">
                            Map
                          </button>
                        </h5>
                      </div>
                      <div id="maps-collapse" class="collapse collapsible" data-parent="#collapse-tabs-accordion-01">
                        <div class="card-body p-0">
                            <div class="col-lg-12">
                                <section class="pt-2 pb-6 border-bottom">
                                  <h4 class="fs-22 text-heading mb-6">Location</h4>
                                  <div class="position-relative">
                                    <div id="map" class="mapbox-gl map-point-animate" data-mapbox-access-token="<?=mapbox_token;?>" data-mapbox-options='{"center":[<?=(isset($company) && $company != false && !empty($company[0]->longitude))?$company[0]->longitude:lnglat()[0];?>, <?=(isset($company) && $company != false && !empty($company[0]->latitude))?$company[0]->latitude:lnglat()[1];?>],"setLngLat":[<?=(isset($company) && $company != false && !empty($company[0]->longitude))?$company[0]->longitude:lnglat()[0];?>, <?=(isset($company) && $company != false && !empty($company[0]->latitude))?$company[0]->latitude:lnglat()[1];?>]}' data-mapbox-marker='[{"position":[<?=(isset($company) && $company != false && !empty($company[0]->longitude))?$company[0]->longitude:lnglat()[0];?>, <?=(isset($company) && $company != false && !empty($company[0]->latitude))?$company[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('google-marker-07.png');?>","backgroundRepeat":"no-repeat","width":"50px","height":"50px"}]'></div>
                                    <p class="mb-0 p-3 bg-white shadow rounded-lg position-absolute pos-fixed-bottom mb-4 ml-4 lh-17 z-index-2"><?=$company[0]->address;?></p>
                                  </div>
                                </section>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    
    </div>
    </main>