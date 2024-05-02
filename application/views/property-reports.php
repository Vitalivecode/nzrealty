    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6">
            <div class="d-flex flex-wrap flex-md-nowrap mb-4">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15"><?=$properties[0]->address;?></h2>
                </div>
            </div>
            <div class="row">
                <?php if(isset($gallery) && ($gallery != false)){ ?>
                <div class="col-sm-6 col-xxl-6 mb-6">
                    <div class="card">
                        <img src="<?=base_url('uploads/'.$gallery[0]->images);?>" alt="<?=$properties[0]->address;?>" />
                    </div>
                </div>
                <?php } ?>
                <div class="col-sm-6 col-xxl-6 mb-6">
                    <div class="card px-6 pt-6">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-bedroom fs-32 text-primary">
                                <use xlink:href="#icon-bedroom"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Bedrooms</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">2</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-shower fs-32 text-primary">
                                <use xlink:href="#icon-shower"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">bathrooms</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">2</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-Garage fs-32 text-primary">
                                <use xlink:href="#icon-Garage"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">GARAGE</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">1</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-car-garage fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Car Port</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">0</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-car fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Offstreet</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">1</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-year fs-32 text-primary">
                                <use xlink:href="#icon-year"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Year built</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">2022</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <svg class="icon icon-status fs-32 text-primary">
                                <use xlink:href="#icon-status"></use>
                              </svg>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Bond</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">$5000</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-paw fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Pets</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">No</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-smoking fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Smokers</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">Yes</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-couch fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">Furnished</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">Yes</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 mb-6">
                          <div class="media">
                            <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                              <i class="fal fa-users fs-30 text-primary"></i>
                            </div>
                            <div class="media-body">
                              <h5 class="my-1 fs-13 text-uppercase letter-spacing-023 font-weight-normal">HH Compliant</h5>
                              <p class="mb-0 fs-13 font-weight-bold text-heading">Yes</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xxl-3 mb-6">
                    <div class="card">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col" class="talign-r">Count in Nos.</th>
                            </tr>
                          </thead>
                          <tbody>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-eye"></i>
                                    </span>
                                </th>
                              <td>Views</td>
                              <td class="talign-r">166</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                </th>
                              <td>Enquiries</td>
                              <td class="talign-r">3</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <svg class="icon icon-1"><use xlink:href="#icon-1"></use></svg>
                                    </span>
                                </th>
                              <td>Wishlist</td>
                              <td class="talign-r">15</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-calendar"></i>
                                    </span>
                                </th>
                              <td>Schedules</td>
                              <td class="talign-r">30</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-users"></i>
                                    </span>
                                </th>
                              <td>Visits</td>
                              <td class="talign-r">28</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-link"></i>
                                    </span>
                                </th>
                              <td>Apply link</td>
                              <td class="talign-r">10</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-8 col-xxl-9 mb-6">
                    

                	<div class="card px-7 py-6 mb-6 chart">
                		<div class="card-body p-0 collapse-tabs" >
                			<div class="d-flex align-items-center mb-5">
                				<h2 class="mb-0 text-heading fs-22 lh-15 mr-auto">Page statistics</h2>
                				<ul class="nav nav-pills nav-pills-01 justify-content-end d-none d-sm-flex"
                				    role="tablist">
                					<li class="nav-item px-5 py-1">
                						<a class="nav-link active bg-transparent shadow-none p-0 letter-spacing-1" id="weekly-tab"
                						   data-toggle="tab"
                						   href="#weekly"
                						   role="tab"
                						   aria-controls="weekly" aria-selected="true">Weekly</a>
                					</li>
                					<li class="nav-item px-5 py-1">
                						<a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1" id="monthly-tab"
                						   data-toggle="tab"
                						   href="#monthly"
                						   role="tab"
                						   aria-controls="monthly" aria-selected="false">Monthly</a>
                					</li>
                				</ul>
                			</div>
                			<div class="tab-content shadow-none p-0">
                				<div id="collapse-tabs-accordion">
                					<div class="tab-pane tab-pane-parent fade show active px-0" id="weekly"
                					     role="tabpanel"
                					     aria-labelledby="weekly-tab">
                						<div class="card bg-transparent mb-sm-0 border-0">
                							<div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                							     id="headingWeekly">
                								<h5 class="mb-0">
                									<button class="btn collapse-parent font-size-h5 btn-block collapsed border shadow-none"
                									        data-toggle="collapse"
                									        data-target="#weekly-collapse"
                									        aria-expanded="true"
                									        aria-controls="weekly-collapse">
                										Weekly
                									</button>
                								</h5>
                							</div>
                							<div id="weekly-collapse" class="collapse collapsible"
                							     aria-labelledby="headingWeekly"
                							     data-parent="#collapse-tabs-accordion">
                								<div class="card-body p-0 py-4">
                									<canvas class="chartjs" data-chart-options="[]"
                									        data-chart-labels='["Mar 12","Mar 13","Mar 14","Mar 15","Mar 16","Mar 17","Mar 18","Mar 19"]'
                									        data-chart-datasets='[{"label":"Clicked","data":[0,13,9,3,15,15,10,0],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,20,18,15,28,33,27,10],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                									</canvas>
                								</div>
                							</div>
                						</div>
                					</div>
                					<div class="tab-pane tab-pane-parent fade px-0" id="monthly" role="tabpanel"
                					     aria-labelledby="monthly-tab">
                						<div class="card bg-transparent mb-sm-0 border-0">
                							<div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                							     id="headingMonthly">
                								<h5 class="mb-0">
                									<button class="btn btn-block collapse-parent collapsed border shadow-none"
                									        data-toggle="collapse"
                									        data-target="#monthly-collapse"
                									        aria-expanded="true"
                									        aria-controls="monthly-collapse">
                										Monthly
                									</button>
                								</h5>
                							</div>
                							<div id="monthly-collapse" class="collapse collapsible"
                							     aria-labelledby="headingMonthly"
                							     data-parent="#collapse-tabs-accordion">
                								<div class="card-body p-0 py-4">
                									<canvas class="chartjs" data-chart-options="[]"
                									        data-chart-labels='["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]'
                									        data-chart-datasets='[{"label":"Clicked","data":[2,15,20,10,15,20,10,0,20,30,10,0],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,20,18,15,28,33,27,10,20,30,10,0],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                									</canvas>
                								</div>
                							</div>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                	</div>
                
                    
                </div>
            </div>
        
        </div>
    </main>