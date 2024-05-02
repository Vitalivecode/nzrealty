    <main id="content">
      <section class="position-relative pb-16 pt-2 page-title bg-patten bg-secondary bg-overlay" style="background-image: url('<?=base_url('uploads/agnt_bg.jpeg');?>');background-size: cover;background-position: center">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-light mb-0 p-0">
              <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">PMs & Agents</li>
            </ol>
          </nav>
          <h1 class="fs-32 mb-0 text-white font-weight-600 text-center pt-12 mb-4 lh-17" data-animate="fadeInDown">Meet The PMs & Agents Transforming Real Estate </h1>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="mb-8 mt-n16 bg-white px-6 py-3 shadow-sm-2 rounded-lg form-search-02 position-relative z-index-3">
            <form class="d-none row d-md-flex flex-wrap align-items-center">
              <div class="col-md-5 mb-3 mb-md-0">
                <div class="row">
                  <div class="form-group mb-3 mb-md-0 col-md-6">
                    <label for="language" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Language</label>
                    <select class="form-control form-control-sm font-weight-600  shadow-0 bg-white selectpicker" name="language" id="language" data-style="bg-white pl-0 text-dark rounded-0">
                        <option value="">Select</option>
                        <?php foreach(languages() as $key => $value){ ?>
                            <option value="<?=$key;?>"><?=$value;?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <?php if($agents != false){ ?>
                  <div class="form-group mb-3 mb-md-0 col-md-6">
                    <label for="region" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Region</label>
                    <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm" name="region" id="region" data-style="bg-white pl-0 text-dark rounded-0">
                      <option>Austin</option>
                      <option>Boston</option>
                      <option>Chicago</option>
                      <option>Denver</option>
                      <option>Los Angeles</option>
                      <option>New York</option>
                      <option>San Francisco</option>
                    </select>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group mb-3 mb-lg-0 col-md-5">
                <label for="search" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Search</label>
                <div class="input-group input-group-sm">
                  <input type="text" id="search" class="form-control pl-0 rounded-0 bg-white" placeholder="Search by agent’s name…" name="search">
                  <div class="input-group-append ml-0">
                    <span class="fs-18 input-group-text bg-white rounded-0"><i class="fal fa-search"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-2 pl-0">
                <button type="submit" class="btn btn-primary btn-lg btn-block"> Search </button>
              </div>
            </form>
            <form class="d-block d-md-none">
              <div class="d-flex align-items-center">
                <a class="text-body hover-primary d-inline-block fs-24 lh-1 mr-5" data-toggle="collapse" href="#collapseMobileSearch"
                       role="button" aria-expanded="false" aria-controls="collapseMobileSearch">
                  <i class="fal fa-cog"></i>
                </a>
                <div class="input-group">
                  <input type="text" class="form-control pl-0 rounded-0 bg-white" placeholder="Search by agent’s name…" name="search">
                  <div class="input-group-append ml-0">
                    <span class="fs-18 input-group-text bg-white rounded-0"><i class="fal fa-search"></i></span>
                  </div>
                </div>
              </div>
              <div class="collapse" id="collapseMobileSearch">
                <div class="card card-body border-0 px-0">
                  <div class="form-group mb-3">
                    <label for="language-01" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Language</label>
                    <select class="form-control form-control-sm font-weight-600  shadow-0 bg-white selectpicker" name="language" id="language-01" data-style="bg-white pl-0 text-dark rounded-0">
                        <option value="">Select</option>
                        <?php foreach(languages() as $key => $value){ ?>
                        <option value="<?=$key;?>"><?=$value;?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="region-01" class="mb-0 lh-1 text-uppercase fs-14 letter-spacing-093">Region</label>
                    <select class="form-control font-weight-600 pl-0 bg-white selectpicker form-control-sm" name="region" id="region-01" data-style="bg-white pl-0 text-dark rounded-0">
                      <option>Austin</option>
                      <option>Boston</option>
                      <option>Chicago</option>
                      <option>Denver</option>
                      <option>Los Angeles</option>
                      <option>New York</option>
                      <option>San Francisco</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block"> Search </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
      <section class="pt-6 pb-13">
        <div class="container">
    <!--
          <div class="row align-items-sm-center mb-6">
            <div class="col-sm-6 mb-6 mb-sm-0">
              <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary"><?=$total_rows;?></span> PM/agents available for
                you
              </h2>
            </div>
            <div class="col-sm-6 mb-6 mb-sm-0">
                <form method="get" action="<?=base_url('agents').(!empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:'');?>">
        			<div class="row align-items-sm-center mb-4">
            			<?php 
                            foreach($_GET as $key => $val){
                                if($key != 'sortby'){
                                    echo '<input type="hidden" name="'.htmlspecialchars($key).'" value="'.htmlspecialchars($val).'" />';
                                }
                            }
                        ?>
        				<div class="col-md-12 mt-2 mt-md-0">
        					<div class="d-flex justify-content-md-end align-items-center">
        						<div class="input-group border rounded input-group-lg w-auto bg-white mr-3">
        							<label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
        							<select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="sortby" onchange="this.form.submit()" name="sortby">
        								<option value="asc" <?=((isset($_GET['sortby']) && ($_GET['sortby'] === 'asc')))?'selected':'';?>>ASC</option>
        								<option value="desc" <?=((isset($_GET['sortby']) && ($_GET['sortby'] === 'desc')))?'selected':'';?>>DESC</option>
        							</select>
        						</div>
        					</div>
        				</div>
        			</div>
    			</form>
    		</div>
          </div>
    -->
          <?php if($agents != false){ ?>
          <div class="row">
              <?php foreach($agents as $agent){ ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-6">
              <div class="card shadow-hover-xs-4 agent-3">
                <div class="card-header text-center pt-6 pb-3 bg-transparent text-center">
                  <a href="<?=base_url('agent/'.encode($agent->sno));?>" class="d-inline-block mb-2 w-120px h-120">
                    <img class="agent-dp" src="<?=profilepic($agent->img);?>" alt="<?=$agent->name;?>">
                  </a>
                  <a href="<?=base_url('agent/'.encode($agent->sno));?>" class="d-block fs-16 lh-2 text-dark mb-0 font-weight-500 hover-primary"><?=first_ltr_upper($agent->name);?></a>
                  <p style="margin-bottom: 0px;"><?=(isset($agent->position) && !empty($agent->position))?first_ltr_upper($agent->position):'-';?></p>
                </div>
                <div class="card-body text-center py-2 px-0">
                    <div class="row">
                        <div class="col-6" style="border-right: 1px #ccc solid;">
                            <a href="mailto:<?=$agent->email;?>" class="agent-ainfo" data-toggle="tooltip" title="" data-original-title="<?=$agent->email;?>"><i class="fa fa-envelope"></i> &nbsp; Email</a>
                        </div>
                        <div class="col-6">
                            <a href="tel:<?=$agent->phone;?>" class="agent-ainfo" data-toggle="tooltip" title="" data-original-title="<?=$agent->phone;?>"><i class="fa fa-phone"></i> &nbsp; Phone</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer px-0 text-center hover-image border-0">
                  <a href="<?=base_url('agent/'.encode($agent->sno));?>" class="d-flex align-items-center justify-content-center text-heading">
                    <?php if($agent->properties != 0){ ?>
                        <span class="badge badge-white badge-circle border fs-13 font-weight-bold mr-2 lh-12"><?=$agent->properties;?></span>
                    <?php } ?>
                    <span class="font-weight-500 mr-2">Listings</span>
                    <span class="text-primary fs-16 icon"><i class="far fa-long-arrow-right"></i></span>
                  </a>
                </div>
              </div>
            </div>
              <?php } ?>
          </div>
          <?php } ?>
          <nav class="mt-4">
            <?=$links;?>
          </nav>
        </div>
      </section>
    </main>