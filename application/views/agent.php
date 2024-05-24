    <main id="content">
      <div class="bg-gray-01">
<!--
        <section class="pb-6 pt-2">
          <div class="container">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('agents');?>">Agents</a></li>
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
                <div class="card border-0 px-6 pt-6 pb-4">
                  <div class="row h-100">
                    <div class="col-sm-5 mb-6 mb-sm-0" align="center">
                      <img class="rounded-lg border card-img" src="<?=profilepic($agent[0]->img);?>" alt="<?=$agent[0]->name;?>" style="border-radius: 50% !important; height: 200px;width: 200px;">
                    </div>
                    <div class="col-sm-7">
                      <div class="card-body p-0">
                        <h2 class="card-title fs-22 lh-15 mb-1 text-dark">
                          <?=first_ltr_upper($agent[0]->name);?>
                        </h2>
                        <p class="card-text mb-1">
                          <?=paragraph($agent[0]->position);?>
                        </p>
                        <p class="card-text mb-1">
                          <?=first_ltr_upper($agent[0]->address);?>
                        </p>
                        <hr>
                        <ul class="list-group list-group-no-border">
                          <?php $company = user('company', $agent[0]->company); if($agent[0]->company != '0'){ ?>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Company</span>
                            <span class="col-sm-9 px-1 text-heading"><a href="<?=($company != false)?base_url('agency/'.strtolower(str_replace(' ','-',urlencode($company[0]->name)))):'-';?>"><?=($company != false)?first_ltr_upper($company[0]->name):'-';?></a></span>
                          </li>
                          <?php } ?>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Mobile</span>
                            <span class="col-sm-9 px-1 text-heading font-weight-500"><?=$agent[0]->phone;?></span>
                          </li>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Office</span>
                            <span class="col-sm-9 px-1 text-heading font-weight-500"><?=(($company != false) && !empty($company[0]->phone))?$company[0]->phone:'-';?></span>
                          </li>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Experience</span>
                            <span class="col-sm-9 px-1 text-heading font-weight-500"><?=(!empty($agent[0]->experience) && ($agent[0]->experience != ''))?explode('-',$agent[0]->experience)[0].' Years '.explode('-',$agent[0]->experience)[1].' Months':'-';?></span>
                          </li>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Qualification</span>
                            <span class="col-sm-9 px-1 text-heading font-weight-500"><?=($agent[0]->qualification != '')?$agent[0]->qualification:'-';?></span>
                          </li>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Email</span>
                            <span class="col-sm-9 px-1"><?=$agent[0]->email;?></span>
                          </li>
                          <?php if($agent[0]->company != '0'){ ?>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Website</span>
                            <span class="col-sm-9 px-1"><a href="<?=(($company != false) && ($company[0]->website != ''))?'https://'.remove_http($company[0]->website):'#';?>" target="_blank"><?=($company != false)?remove_http($company[0]->website):'-';?></a></span>
                          </li>
                          <?php } ?>
                          <li class="list-group-item d-flex align-items-sm-center lh-214 row mx-n1 p-0 mb-2 mb-sm-0">
                            <span class="col-sm-3 px-1">Language(s)</span>
                            <span class="col-sm-9 px-1"><?php $ln = '-'; if($agent[0]->languages != ''){ $ln = ''; $lang = explode(',',$agent[0]->languages); foreach(languages() as $key => $value){ $ln = (in_array($key,$lang))?$ln.', '.$value:$ln; } $ln = substr($ln,1); } echo $ln; ?></span>
                          </li>
                          <?php if(($agent[0]->twitter != '') || ($agent[0]->facebook != '') || ($agent[0]->instagram != '') || ($agent[0]->linkedin != '')){ ?>
                            <li class="list-group-item d-flex align-items-sm-center lh-214 row mb-0 mt-3 mx-n1 p-0 ">
                                <span class="col-sm-3 px-1">Social</span>
                                <ul class="col-sm-9 list-inline text-gray-lighter m-0 px-1">
                                            <?php if($agent[0]->twitter != ''){ ?>
                                              <li class="list-inline-item mx-0 my-1">
                                                <a href="<?=($agent[0]->twitter != '')?$agent[0]->twitter:'javascript:void(0);';?>" <?=($agent[0]->twitter != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-twitter"></i></a>
                                              </li>
                                            <?php } ?>
                                            <?php if($agent[0]->facebook != ''){ ?>
                                              <li class="list-inline-item mr-0 ml-2 my-1">
                                                <a href="<?=($agent[0]->facebook != '')?$agent[0]->facebook:'javascript:void(0);';?>" <?=($agent[0]->facebook != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-facebook-f"></i></a>
                                              </li>
                                            <?php } ?>
                                            <?php if($agent[0]->instagram != ''){ ?>
                                              <li class="list-inline-item mr-0 ml-2 my-1">
                                                <a href="<?=($agent[0]->instagram != '')?$agent[0]->instagram:'javascript:void(0);';?>" <?=($agent[0]->instagram != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-instagram"></i></a>
                                              </li>
                                            <?php } ?>
                                            <?php if($agent[0]->linkedin != ''){ ?>
                                              <li class="list-inline-item mr-0 ml-2 my-1">
                                                <a href="<?=($agent[0]->linkedin != '')?$agent[0]->linkedin:'javascript:void(0);';?>" <?=($agent[0]->linkedin != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                                <i class="fab fa-linkedin-in"></i></a>
                                              </li>
                                            <?php } ?>
                                </ul>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <?php if($agent[0]->about != ''){ ?>
                    <div class="col-sm-12">
                        <h3 class="card-title text-heading fs-16 lh-213 mt-4">About <?=first_ltr_upper($agent[0]->name);?></h3>
                        <p class="lh-214 mb-2 text-justify"><?=paragraph(strip_tags($agent[0]->about));?></p>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card border-0">
                  <div class="card-body p-6">
                    <h3 class="card-title fs-16 text-dark mb-6"> Contact <?=$agent[0]->name;?></h3>
                    <form class="form" method="post" action="#" data-action="<?=base_url('agents/request');?>" id="nzform" autocomplete="off">
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
        <?php if($properties != false){ ?>
        <section class="pb-11">
          <div class="container">
            <div class="collapse-tabs mb-10">
              <ul class="nav nav-tabs text-uppercase d-none d-md-inline-flex agent-details-tabs" role="tablist">
                <li class="nav-item">
                  <a href="#residentials" class="nav-link active shadow-none fs-13" data-toggle="tab" role="tab">
                    Residentials
                  </a>
                </li>
                <li class="nav-item ml-0">
                  <a href="#commercials" class="nav-link shadow-none fs-13" data-toggle="tab" role="tab">
                    Commercials
                  </a>
                </li>
              </ul>
              <div class="tab-content shadow-none py-7 px-6 bg-white">
                <div id="collapse-tabs-accordion-01">
                  <div class="tab-pane tab-pane-parent fade show active" id="residentials" role="tabpanel">
                    <div class="card border-0 bg-transparent">
                      <div class="card-headerr border-0 d-block d-md-none bg-transparent px-0 py-1">
                        <h5 class="mb-0">
                          <button class="btn lh-2 fs-18 bg-white py-1 px-6 mb-4 shadow-none w-100 collapse-parent border"
                            data-toggle="collapse" data-target="#overview-collapse" aria-expanded="true" aria-controls="overview-collapse">
                            Residentials
                          </button>
                        </h5>
                      </div>
                      <div id="overview-collapse" class="collapse show collapsible" data-parent="#collapse-tabs-accordion-01">
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
                                      <h2 class="fs-16 mb-1"><a href="<?=base_url('properties/single/'.$property->accesskey);?>" target="_blank" class="text-dark hover-primary" data-toggle="tooltip" title="<?=property_name_replace($property->address);?>"><?=((strlen($property->address)>25)?property_name_replace(substr($property->address,0,25)).'..':property_name_replace($property->address));?></a></h2>
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
                            data-toggle="collapse" data-target="#listing-collapse" aria-expanded="true" aria-controls="listing-collapse">
                            Commercials
                          </button>
                        </h5>
                      </div>
                      <div id="listing-collapse" class="collapse collapsible pb-5 pb-md-0" data-parent="#collapse-tabs-accordion-01">
                        <div class="card-body p-0">
                            <?php if($properties != false){ ?>
                            <div class="row">
                                <?php foreach($properties as $property){ if($property->ptype == 'commercial'){ $wishlist = ($logged = $this->session->userdata('logged_in'))?get('wishlist', array('property' => $property->sno, 'role' => $logged['role'], 'user' => $logged['id'], 'status' => 1)):false; $others = ($property->other != '')?json_decode($property->other):false; $others = ($property->other != '')?json_decode($property->other):false; ?>
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
                                      <h2 class="fs-16 mb-1"><a href="<?=base_url('properties/single/'.$property->accesskey);?>" target="_blank" class="text-dark hover-primary" data-toggle="tooltip" title="<?=property_name_replace($property->address);?>"><?=((strlen($property->address)>25)?property_name_replace(substr($property->address,0,25)).'..':property_name_replace($property->address));?></a></h2>
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
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php } ?>
      </div>
      <section>
          <div class="d-flex bottom-bar-action bottom-bar-action-01 py-2 px-4 bg-gray-01 align-items-center position-fixed fixed-bottom d-sm-none">
            <div class="media align-items-center">
              <img src="<?=profilepic($agent[0]->img);?>" alt="<?=$agent[0]->name;?>" class="mr-4 rounded-circle">
              <div class="media-body">
                <a href="#" class="d-block text-dark fs-15 font-weight-500 lh-15"><?=$agent[0]->name;?></a>
                <span class="fs-13 lh-2">Sales Excutive</span>
              </div>
            </div>
            <div class="ml-auto">
                <button type="button" class="btn btn-primary fs-18 p-2 lh-1 mr-1 mb-1 shadow-none" data-toggle="modal" data-target="#modal-messenger"><i class="fal fa-comment"></i></button>
                <a href="tel:<?=$agent[0]->phone;?>" class="btn btn-primary fs-18 p-2 lh-1 mb-1 shadow-none" target="_blank"><i class="fal fa-phone"></i></a>
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
                    <form class="form" method="post" action="#" data-action="<?=base_url('agent/request');?>" id="nzform" autocomplete="off">
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
                        <textarea class="form-control border-0" name="message" rows="4"></textarea>
                        <small class="form-text text-danger message"></small>
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg btn-block rounded" id="nz-submit">Submit</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
      </section>
    </main>