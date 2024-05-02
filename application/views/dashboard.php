    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6">
            <div class="d-flex flex-wrap flex-md-nowrap mb-4">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15">Hi <?=ucwords($logged['name']);?>! <?=(($logged['role'] == 'agents') && !empty($logged['company']))?((!empty(user('company',$logged['company'])) && ($company = user('company',$logged['company'])))?'#'.ucwords(strtolower($company[0]->name)):''):'';?></h2>
                </div>
                <?php if($logged['role'] == 'landlord' || $logged['role'] == 'agents'){ ?>
                <div>
                    <a href="<?=base_url('myaccount/add-property');?>" class="btn btn-primary btn-lg">
                        <span>Add New Property</span>
                        <span class="d-inline-block ml-1 fs-20 lh-1">
                            <svg class="icon icon-save-search">
                                <use xlink:href="#icon-save-search"></use>
                            </svg>
                        </span>
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php if(($logged['role'] == 'company') && (isset($packages) && ($packages != false))){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Payment Alert!</strong> Your account is due for payment, Please make payment before <?=date('d M, Y', strtotime($packages[0]->created_date. ' + 44 days'));?>. <a href="<?=base_url('payment/invoice/'.$packages[0]->sno);?>">click here</a> to pay.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php } ?>
            
            <?php if($logged['role'] == 'landlord' || $logged['role'] == 'agents' || $logged['role'] == 'company'){ ?>
            <div class="row">
                <div class="col-sm-4 col-xxl-3 mb-6">
                    <div class="card">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col" class="talign-r">Available Listings</th>
                              <th scope="col" class="talign-r">Total Listings</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <svg class="icon icon-add-new"><use xlink:href="#icon-add-new"></use></svg>
                                    </span>
                                </th>
                              <td>Listings</td>
                              <td class="talign-r"><?=($count_properties != false)?count($count_properties):0;?></td>
                              <td class="talign-r"><?=($count_total_properties != false)?count($count_total_properties):0;?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-eye"></i>
                                    </span>
                                </th>
                              <td>Views</td>
                              <td class="talign-r"><?=($count_views != false)?$count_views[0]->count:0;?></td>
                              <td class="talign-r"><?=($count_total_views != false)?$count_total_views[0]->count:0;?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                </th>
                              <td>Enquiries</td>
                              <td class="talign-r"><?=($count_request != false)?$count_request[0]->count:0;?></td>
                              <td class="talign-r"><?=($count_total_request != false)?$count_total_request[0]->count:0;?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <svg class="icon icon-1"><use xlink:href="#icon-1"></use></svg>
                                    </span>
                                </th>
                              <td>Wishlist</td>
                              <td class="talign-r" class="talign-r"><?=($count_wishlist != false)?$count_wishlist[0]->count:0;?></td>
                              <td class="talign-r"><?=($count_total_wishlist != false)?$count_total_wishlist[0]->count:0;?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-calendar"></i>
                                    </span>
                                </th>
                              <td>Schedules</td>
                              <td class="talign-r"><?=($count_schedules != false)?$count_schedules[0]->count:0;?></td>
                              <td class="talign-r"><?=($count_total_schedules != false)?$count_total_schedules[0]->count:0;?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-users"></i>
                                    </span>
                                </th>
                              <td>Visits</td>
                              <td class="talign-r"><?=($count_visits != false)?$count_visits[0]->count:0;?></td>
                              <td class="talign-r"><?=($count_total_visits != false)?$count_total_visits[0]->count:0;?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <span class="d-flex align-items-center justify-content-center fs-24">
                                        <i class="far fa-link"></i>
                                    </span>
                                </th>
                              <td>Apply link</td>
                              <td class="talign-r"><?=($count_apply != false)?$count_apply[0]->count:0;?></td>
                              <td class="talign-r"><?=($count_total_apply != false)?$count_total_apply[0]->count:0;?></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="col-sm-8 col-xxl-9 mb-6">
                    <div class="card px-7 py-6 h-100 chart">
                        <div class="card-body p-0 collapse-tabs">
                            <div class="d-flex align-items-center mb-5">
                                <h2 class="mb-0 text-heading fs-18 lh-15 mr-auto">View statistics</h2>
                                <ul class="nav nav-pills justify-content-end d-none d-sm-flex nav-pills-01"
                                    role="tablist">
                                    <li class="nav-item px-5 py-1">
                                        <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1 show active" id="weekly-tab"
                                           data-toggle="tab"
                                           href="#weekly"
                                           role="tab"
                                           aria-controls="weekly" aria-selected="false">Weekly</a>
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
                                            <div id="weekly-collapse" class="collapse show collapsible"
                                                 aria-labelledby="headingWeekly"
                                                 data-parent="#collapse-tabs-accordion">
                                                <div class="card-body p-0 py-4">
                                                    <canvas class="chartjs" data-chart-options="[]"
                                                            data-chart-labels='<?=json_encode($dateLabels);?>'
                                                            data-chart-datasets='[{"label":"Views","data":<?=json_encode($views);?>,"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"Enquiries","data":<?=json_encode($enquiries);?>,"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true},{"label":"Schedules","data":<?=json_encode($schedules);?>,"backgroundColor":"rgba(40, 167, 69, 0.1)","borderColor":"#28a745","borderWidth":3,"fill":true}]'>
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
                                                            data-chart-labels='<?=json_encode($monthLabels);?>'
                                                            data-chart-datasets='[{"label":"Views","data":<?=json_encode($monthviews);?>,"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"Enquiries","data":<?=json_encode($monthenquiries);?>,"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true},{"label":"Schedules","data":<?=json_encode($monthschedules);?>,"backgroundColor":"rgba(40, 167, 69, 0.1)","borderColor":"#28a745","borderWidth":3,"fill":true}]'>
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
            <?php } ?>
            
            <?php if($logged['role'] == 'user'){ ?>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 mb-6">
                    <div class="card shadow-hover-xs-4 agent-3">
                        <div class="card-header text-center pt-6 pb-3 bg-transparent text-center">
                            <a href="<?=base_url('myaccount/schedules');?>">
                                <span class="d-inline-block mr-3 text-muted fs-60">
                                    <svg class="icon icon-my-properties"><use xlink:href="#icon-my-properties"></use></svg>
                                </span>
                            </a>
                          <a href="<?=base_url('myaccount/favorites');?>" class="d-block fs-16 lh-2 text-dark mb-0 font-weight-500 hover-primary">My Wishlist</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-6">
                    <div class="card shadow-hover-xs-4 agent-3">
                        <div class="card-header text-center pt-6 pb-3 bg-transparent text-center">
                            <a href="<?=base_url('myaccount/schedules');?>">
                                <span class="d-inline-block mr-3 text-muted fs-60">
                                    <i class="far fa-calendar"></i>
                                </span>
                            </a>
                          <a href="<?=base_url('myaccount/schedules');?>" class="d-block fs-16 lh-2 text-dark mb-0 font-weight-500 hover-primary">Schedules</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        
        </div>
    </main>