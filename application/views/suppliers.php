    <main id="content">
        
    <!--
        <?php include('supplier-categories.php'); ?>
    -->
    
        <div class="bg-secondary py-6 py-lg-0">
        	<div class="container">
        		<form class="search-form d-none d-lg-block">
        			<div class="row align-items-center">
        				<div class="col-lg-5">
        					<div class="row">
        						<div class="col-md-6 pl-md-3 pt-md-0 pt-6">
        							<label class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093 mb-1">Suburb</label>
        							<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-input-opacity-02" name="location" title="Select" data-style="p-0 h-24 lh-17 text-white">
        								<?php if($suburbs != false){ foreach($suburbs as $suburb){ ?>
        								    <option value="<?=$suburb->sno;?>"><?=$suburb->suburb;?></option>
        								<?php } } ?>
        							</select>
        						</div>
        						<div class="col-md-6 pl-md-3 pt-md-0 pt-6">
        							<label class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093 mb-1">Category</label>
        							<select class="form-control selectpicker bg-transparent border-bottom rounded-0 border-input-opacity-02" name="type" title="Select" data-style="p-0 h-24 lh-17 text-white">
        								<?php if($categories != false){ foreach($categories as $category){ ?>
        								    <option value="<?=$category->sno;?>"><?=$category->category;?></option>
        								<?php } } ?>
        							</select>
        						</div>
        					</div>
        				</div>
        				<div class="col-12 col-lg-5 pt-lg-0 pt-6">
        					<label class="text-uppercase font-weight-500 opacity-7 text-white letter-spacing-093">Search</label>
        					<div class="position-relative">
        						<input type="text" name="search"
        						       class="form-control bg-transparent shadow-none border-top-0 border-right-0 border-left-0 border-bottom rounded-0 h-24 lh-17 p-0 pr-md-5 text-white placeholder-light font-weight-500 border-input-opacity-02"
        						       placeholder="Enter a service you are looking for...">
        						<i class="far fa-search position-absolute pos-fixed-right-center pr-0 fs-18 text-white pb-2 d-none d-md-block"></i>
        					</div>
        				</div>
        				<div class="col-12 col-lg-2 pt-lg-0 pt-7">
        					<button type="submit" class="btn bg-white-opacity-01 bg-white-hover-opacity-03 h-lg-100 w-100 shadow-none text-white rounded-0 fs-16 font-weight-600">
        						Search
        					</button>
        				</div>
        			</div>
        		</form>
        		<form class="property-search property-search-mobile d-lg-none">
        			<div class="row align-items-lg-center" id="accordion-mobile">
        				<div class="col-12">
        					<div class="form-group mb-0 position-relative">
        						<a href="#advanced-search-filters-mobile"
        						   class="icon-primary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
        						   data-toggle="collapse" data-target="#advanced-search-filters-mobile"
        						   aria-expanded="true"
        						   aria-controls="advanced-search-filters-mobile">
        						</a>
        						<input type="text"
        						       class="form-control form-control-lg border-0 shadow-none pr-9 pl-11 bg-white placeholder-muted"
        						       name="key-word"
        						       placeholder="Search...">
        						<button type="submit"
        						        class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left bg-white">
        							<i class="far fa-search"></i>
        						</button>
        					</div>
        				</div>
        				<div id="advanced-search-filters-mobile" class="col-12 pt-2 collapse"
        				     data-parent="#accordion-mobile">
        					<div class="row mx-n2">
        						<div class="col-sm-6 pt-4 px-2">
        							<select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
        							        title="Suburb" data-style="btn-lg py-2 h-52 bg-white" name="type">
        								<?php if($suburbs != false){ foreach($suburbs as $suburb){ ?>
        								    <option value="<?=$suburb->sno;?>"><?=$suburb->suburb;?></option>
        								<?php } } ?>
        							</select>
        						</div>
        						<div class="col-sm-6 pt-4 px-2">
        							<select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
        							        name="bedroom"
        							        title="Services" data-style="btn-lg py-2 h-52 bg-white">
        								<?php if($categories != false){ foreach($categories as $category){ ?>
        								    <option value="<?=$category->sno;?>"><?=$category->category;?></option>
        								<?php } } ?>
        							</select>
        						</div>
        					</div>
        				</div>
        			</div>
        		</form>
        	</div>
        </div>
        
      <section class="pb-13 py-6">
        <div class="container">
            <h2 class="text-heading fs-22 lh-15 mb-5">Suppliers</h2>
            <span class="heading-divider"></span>
              <div class="row align-items-sm-center mb-6">
                <div class="col-sm-6 mb-6 mb-sm-0">
                  <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary"><?=$total_rows;?></span> suppliers available for you</h2>
                </div>
              </div>
            <?php if($suppliers != false){ ?>
            <div class="row">
                <?php foreach($suppliers as $supplier){ ?>
                    <div class="col-lg-6 col-12 mb-6 mb-lg-0">
              <div class="card shadow-hover-lg-xs-4 border border-sm-0 mb-4">
                <div class="row no-gutters align-items-center py-sm-3" style="padding-left: 10px;">
                  <div class="col-sm-3 col-3 border-sm rounded-0 rounded-lg-top-left card-img text-center">
                    <a href="<?=base_url('supplier/'.encode($supplier->sno));?>">
                      <img src="<?=pic($supplier->logo);?>" alt="<?=$supplier->name;?>" >
                    </a>
                  </div>
                  <div class="col-sm-9 col-9">
                    <div class="card-body px-6 py-6 py-sm-0 border-top border-sm-0">
                      <a href="<?=base_url('supplier/'.encode($supplier->sno));?>">
                        <h6 class="card-title text-dark lh-213 mb-0 hover-primary"><?=$supplier->name;?></h6>
                      </a>
                      <p class="card-text mb-0"><?=$supplier->address;?></p>
                      <ul class="list-group list-group-no-border">
                        <li class="list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-2 pb-0">
                          <span class="col-sm-6 p-0 text-heading font-weight-500"><a href="tel:<?=$supplier->phone;?>"><i class="fas fa-phone"></i> <?=($supplier->phone != '')?$supplier->phone:'-';?></a></span>
                          <span class="col-sm-6 p-0 text-heading font-weight-500"><a href="mailto:<?=$supplier->email;?>"><i class="fas fa-envelope"></i> <?=($supplier->email != '')?$supplier->email:'-';?></a></span>
                        </li>
                        <li class="supser-list list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-2 pb-0">
                          <span class="col-sm-3 p-0 fs-13 mb-1 mb-sm-0">Services</span>
                          <span class="col-sm-9 p-0 font-weight-500">
                              <?php if($supplier->services != ''){ $srvc = explode(',',$supplier->services); $count = count($srvc); $no=1; $snames = ''; foreach($srvc as $value){ if(!empty($service[$value])){ ?>
                              <?php if(($no == 1) || ($no == 2)){ ?>
                              <span class="badge badge-secondary"><?=$service[$value];?></span>
                              <?php } else{ $snames = $snames.', '.$service[$value]; } ?>
                              <?php $no++; } } if($count > 2){ ?>
                              <a href="#"><span class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="<?=substr($snames,1);?>"><?=($no-3);?> <i class="fal fa-plus"></i></span></a>
                              <?php } } ?>
                          </span>
                        </li>
                        <li class="supser-list list-group-item d-flex align-items-sm-center lh-114 row m-0 px-0 pt-2 pb-0">
                          <span class="col-sm-3 p-0 fs-13 mb-1 mb-sm-0">Areas</span>
                          <span class="col-sm-9 p-0 font-weight-500">
                              <span class="badge badge-primary">Auckland Central</span>
                              <span class="badge badge-primary">Grey Lynn</span>
                              <a href="#"><span class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Freemans Bay">1 <i class="fal fa-plus"></i></span></a>
                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?php } ?>
                <nav class="pt-6">
                    <?=$links;?>
                </nav>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
    </main>