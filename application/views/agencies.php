    <main id="content">
      <section class="pt-2 page-title bg-overlay" style="background-image: url('<?=base_url('uploads/cmp_bg.jpg');?>');background-size: cover;background-position: center">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-light mb-0 p-0">
              <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Companies</li>
            </ol>
          </nav>
          <h1 class="fs-32 mb-0 text-white font-weight-500 text-center pt-11 pb-14 lh-17" data-animate="fadeInDown">Most Trusted Real Estate Companies</h1>
        </div>
      </section>
      <section class="bg-secondary">
        <div class="container">
          <div class="py-2">
            <form class="d-none d-md-flex row no-gutters px-n1 flex-wrap align-items-end" method="get" action="<?=base_url('agencies');?>">
              <div class="form-group py-1 col-md-10 px-1 mb-0">
                <label for="search02" class="sr-only">Search</label>
                <div class="input-group input-group-lg">
                  <div class="input-group-prepend mr-n1">
                    <span class="fs-18 input-group-text bg-white border-0"><i class="fal fa-search"></i></span>
                  </div>
                  <input type="text" id="search02" name="search" class="form-control border-0 bg-white shadow-none" placeholder="Search by location or company name">
                </div>
              </div>
              <div class="col-md-2 py-1 px-1">
                <button type="submit" class="btn btn-warning btn-lg btn-block"> Search</button>
              </div>
            </form>
            <form class="d-block d-md-none">
              <div class="d-flex align-items-center">
                <a class="text-white hover-primary d-inline-block fs-24 lh-1 mr-5" data-toggle="collapse"
                       href="#collapseMobileSearch-02" role="button" aria-expanded="false" aria-controls="collapseMobileSearch-02">
                  <i class="fal fa-cog"></i>
                </a>
                <div class="form-group mb-0 w-100">
                  <label for="search04" class="sr-only">Search</label>
                  <div class="input-group input-group-lg">
                    <input type="text" id="search04" class="form-control border-0 bg-white shadow-none" placeholder="Search by company name" name="search">
                    <div class="input-group-append ml-n1">
                      <span class="fs-18 input-group-text bg-white border-0"><i class="fal fa-search"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="collapse" id="collapseMobileSearch-02">
                <div class="card card-body border-0 pr-0 pl-8 bg-transparent">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Search
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
      <section class="pt-7 pb-13">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-6 mb-lg-0">
        <!--
              <div class="row align-items-sm-center mb-6">
                <div class="col-sm-6 mb-6 mb-sm-0">
                  <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary"><?=$total_rows;?></span> companies available for you</h2>
                </div>
              </div>
        -->
              <?php if($agencies != false){ foreach($agencies as $agency){ 
                $agents = get('agents', array('company' => $agency->sno, 'status' => 1));
                $properties = false;
                if($agents != false)
    	        {
    	            $agnts = array();
    	            foreach($agents as $agent)
    	                $agnts[] = $agent->sno;
    	            $where = array('role' => 'agents', 'status' => 1);
    	            $properties = $this->get->whereIn('properties', $where,'agent',$agnts);
    	        } 
    	      ?>
              <div class="card shadow-hover-lg-xs-4 border border-sm-0 my-4 p-4">
                <div class="row no-gutters align-items-center">
                  <div class="col-sm-12 border-sm rounded-0 rounded-lg-top-left card-img text-left" style="background-color: <?=$agency->bgcolor;?>">
                    <a href="<?=base_url('agency/'.strtolower(str_replace(' ','-',urlencode($agency->name))));?>">
                      <img src="<?=companypic($agency->img);?>" alt="<?=$agency->name;?>" style="height: 60px;padding: 5px;">
                    </a>
                  </div>
                  <div class="col-sm-12">
                    <div class="card-body px-6 py-6 py-sm-0 border-top border-sm-0">
                      <a href="<?=base_url('agency/'.strtolower(str_replace(' ','-',urlencode($agency->name))));?>">
                        <h6 class="card-title text-dark lh-213 mb-0 hover-primary"><?=$agency->name;?></h6>
                      </a>
                      <p class="card-text"><?=(!empty($agency->address))?$agency->address:'-';?></p>
                      <ul class="list-group list-group-no-border">
                        <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-3 pb-0">
                          <span class="col-sm-2 p-0 fs-13 mb-1 mb-sm-0">Listings</span>
                          <span class="col-sm-4 p-0 text-heading font-weight-500"><?=(isset($properties) && $properties != false)?count($properties):'-';?></span>
                          <span class="d-none d-xs-block p-2"></span>
                          <span class="col-sm-2 p-0 fs-13 mb-1 mb-sm-0">PMs & Agents</span>
                          <span class="col-sm-4 p-0 text-heading font-weight-500"><?=($agents != false)?count($agents):'-';?></span>
                        </li>
                        <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-3 pb-0">
                          <span class="col-sm-2 p-0 fs-13 mb-1 mb-sm-0">Office</span>
                          <span class="col-sm-4 p-0 text-heading font-weight-500"><a href="tel:<?=$agency->fax;?>" data-toggle="tooltip" data-placement="top" title="<?=$agency->fax;?>"><?=(!empty($agency->fax))?$agency->fax:'-';?></a></span>
                          <span class="d-none d-xs-block p-2"></span>
                          <span class="col-sm-2 p-0 fs-13 mb-1 mb-sm-0">Mobile</span>
                          <span class="col-sm-4 p-0 text-heading font-weight-500"><a href="tel:<?=$agency->phone;?>" data-toggle="tooltip" data-placement="top" title="<?=$agency->phone;?>"><?=(!empty($agency->phone))?$agency->phone:'-';?></a></span>
                        </li>
                        <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-3 pb-0">
                          <span class="col-sm-2 p-0 fs-13 mb-1 mb-sm-0">Email</span>
                          <span class="col-sm-4 p-0 text-heading font-weight-500"><a href="mailto:<?=$agency->email;?>" class="text-ellipsis pr-2" data-toggle="tooltip" data-placement="top" title="<?=$agency->email;?>"><?=(!empty($agency->email))?$agency->email:'-';?></a></span>
                          <span class="d-none d-xs-block p-2"></span>
                          <span class="col-sm-2 p-0 fs-13 mb-1 mb-sm-0">Website</span>
                          <span class="col-sm-4 p-0 text-heading font-weight-500"><a href="<?=($agency->website != '')?'https://'.remove_http($agency->website):'#';?>" class="text-ellipsis pr-2" data-toggle="tooltip" data-placement="top" title="<?=$agency->website;?>" target="_blank"><?=(!empty($agency->website))?remove_http($agency->website):'-';?></a></span>
                        </li>
                        <?php if(($agency->twitter != '') || ($agency->facebook != '') || ($agency->instagram != '') || ($agency->linkedin != '')){ ?>
                        <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-4 pb-3">
                          <span class="col-sm-3 p-0 fs-13 mb-1 mb-sm-0">Social</span>
                          <ul class="col-sm-9 list-inline text-gray-lighter m-0 p-0 z-index-2">
                            <?php if($agency->twitter != ''){ ?>
                                <li class="list-inline-item m-0">
                                  <a href="<?=($agency->twitter != '')?$agency->twitter:'javascript:void(0);';?>" <?=($agency->twitter != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                      <i class="fab fa-twitter"></i></a>
                                </li>
                            <?php } ?>
                            <?php if($agency->facebook != ''){ ?>
                                <li class="list-inline-item mr-0 ml-2">
                                  <a href="<?=($agency->facebook != '')?$agency->facebook:'javascript:void(0);';?>" <?=($agency->facebook != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                      <i class="fab fa-facebook-f"></i></a>
                                </li>
                            <?php } ?>
                            <?php if($agency->instagram != ''){ ?>
                                <li class="list-inline-item mr-0 ml-2">
                                  <a href="<?=($agency->instagram != '')?$agency->instagram:'javascript:void(0);';?>" <?=($agency->instagram != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                      <i class="fab fa-instagram"></i></a>
                                </li>
                            <?php } ?>
                            <?php if($agency->linkedin != ''){ ?>
                                <li class="list-inline-item mr-0 ml-2">
                                  <a href="<?=($agency->linkedin != '')?$agency->linkedin:'javascript:void(0);';?>" <?=($agency->linkedin != '')?'target="_blank"':'';?> class="w-32px h-32 rounded bg-hover-primary bg-white hover-white text-body d-flex align-items-center justify-content-center border border-hover-primary">
                                      <i class="fab fa-linkedin-in"></i></a>
                                </li>
                            <?php } ?>
                          </ul>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <?php }  ?>
              <nav class="pt-6">
                <?=$links;?>
              </nav>
              <?php } ?>
            </div>
            <div class="col-lg-4 primary-sidebar sidebar-sticky" id="sidebar">
              <div class="primary-sidebar-inner">
                <div class="card mb-4">
                  <div class="card-body text-center pt-7 pb-6 px-0">
                    <img src="<?=base_url('layout/images/contact-widget.jpg');?>" alt="Want to become an Estate Agent ?">
                    <div class="text-dark mb-6 mt-n2 font-weight-500">Want to become an
                      <p class="mb-0 fs-18">Estate Agent?</p>
                    </div>
                    <a href="#login-register-modal" data-toggle="modal" class="btn btn-primary">Register</a>
                  </div>
                </div>
                <?=slide_properties(array('premium' => 1),'','8');?>
                <?=slide_properties(array('featured' => 1),'','8');?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>