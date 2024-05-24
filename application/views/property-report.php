    <main id="content" class="bg-gray-01">
        
        
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 add-new-invoice">
            <div class="row">
                <div class="col-xl-9 mb-6 mb-xl-0" id="download-report">
                    <div class="card card-body main-invoice-info px-6 pt-6">
                        
                        <div class="d-xl-flex justify-content-xl-between mb-4">
                            <h3 class="mb-0 fs-16">Reports: <?=(isset($_GET['from']))?date('M-Y', strtotime($_GET['from'])):date('d-m-Y',strtotime($properties[0]->available_from));?> to <?=(isset($_GET['to']))?date('M-Y', strtotime($_GET['to'])):date('d-m-Y');?></h3>
            			</div>
                        <div class="d-xl-flex justify-content-xl-between mb-4 border-top pt-4">
                            <ul class="list-inline d-sm-flex align-items-sm-center mb-0">
                                <?php if($properties[0]->premium == '1'){ ?>
                                <li class="list-inline-item badge badge-orange mr-2">Premium</li>
                                <?php } if($properties[0]->featured == '1'){ ?>
                                <li class="list-inline-item badge badge-indigo mr-2">Featured</li>
                                <?php } ?>
                                <li class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i>Listed On: <?=date('d-m-Y',strtotime($properties[0]->created_date));?></li>
                            </ul>
                			<ul class="list-inline mb-0 mr-n2 my-4 my-xl-0">
                			    <li class="list-inline-item mr-2">
                				    <a href="#" class="btn btn-outline-light px-3 text-body d-flex align-items-center h-32 border">
                					    Available From: <?=date('d-m-Y',strtotime($properties[0]->available_from));?></a>
                				</li>
                			</ul>
            			</div>
            					
                        <div class="row">
                            <div class="col-sm-6 col-12 mr-auto mb-3">
                            <?php if(isset($gallery) && ($gallery != false)){ ?>
                                <div class="card">
                                    <img src="<?=base_url('uploads/'.$gallery[0]->images);?>" alt="<?=$properties[0]->address;?>" />
                                </div>
                            <?php } ?>
                                <div class="align-items-center">
                                    <h3 class="mb-0 ml-2 fs-16 mt-4"><?=$properties[0]->address;?></h3>
                                    <p class="mb-0 ml-2 fs-14">By <?=(isset($logged) && ($logged['role'] == 'company'))?user('agents', $properties[0]->agent)[0]->name:((isset($logged))?$logged['name']:'');?><?=(isset($company) && $company != false)?', '.$company[0]->name:'';?></p>
                                </div>
                            </div>
        
                            <div class="col-sm-6 mb-1">
                                <table class="table table-bordered">
                                  <tbody>
                                    <tr>
                                        <th scope="row">
                                            <span class="d-flex align-items-center justify-content-center fs-24">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </th>
                                      <td>Views</td>
                                      <td class="talign-r"><?=($views != false)?count($views):0;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="d-flex align-items-center justify-content-center fs-24">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                        </th>
                                      <td>Enquiries</td>
                                      <td class="talign-r"><?=($enquiries != false)?count($enquiries):0;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="d-flex align-items-center justify-content-center fs-24">
                                                <svg class="icon icon-1"><use xlink:href="#icon-1"></use></svg>
                                            </span>
                                        </th>
                                      <td>Wishlist</td>
                                      <td class="talign-r"><?=($wishlist != false)?count($wishlist):0;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="d-flex align-items-center justify-content-center fs-24">
                                                <i class="far fa-calendar"></i>
                                            </span>
                                        </th>
                                      <td>Schedules</td>
                                      <td class="talign-r"><?=($schedules != false)?count($schedules):0;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="d-flex align-items-center justify-content-center fs-24">
                                                <i class="far fa-users"></i>
                                            </span>
                                        </th>
                                      <td>Visits</td>
                                      <td class="talign-r"><?=($visits != false)?count($visits):0;?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <span class="d-flex align-items-center justify-content-center fs-24">
                                                <i class="far fa-link"></i>
                                            </span>
                                        </th>
                                      <td>Apply link</td>
                                      <td class="talign-r"><?php if($visits != false){ $vsno = 0; foreach($visits as $visit){ if($visit->send_link == '1'){ $vsno = $vsno+1; }  } echo $vsno; }else { echo 0; } ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
        
                        </div>
        
                        <div class="mb-1">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 align-self-center">
                                    <div class=" px-3 py-6 h-100 chart">
                                        <canvas class="chartjs" data-chart-options="[]" data-chart-labels='<?=json_encode($monthLabels);?>'
                                            data-chart-datasets='[{"label":"Views","data":<?=json_encode($monthviews);?>,"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"Enquiries","data":<?=json_encode($monthenquiries);?>,"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true},{"label":"Schedules","data":<?=json_encode($monthschedules);?>,"backgroundColor":"rgba(40, 167, 69, 0.1)","borderColor":"#28a745","borderWidth":3,"fill":true}]'>
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                        <div class="border-top pt-2">
                            <div class="row">
                                <div class="col-xl-8 col-md-6 col-sm-4 align-self-center">
                                    <p class="mb-0">End Your Search Here...!!! visit <a href="<?=base_url();?>" target="_blank">www.rentallistings.co.nz</a></p>
                                </div>
                                <div class="col-xl-4 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-right">
                                    <img src="<?=base_url('uploads/'.$site[0]->logo);?>" alt="<?=$site[0]->title;?>" width="120px" class="company-logo normal-logo">
                                </div>
                            </div>
        
                        </div>
                        
                    </div>
        
                </div>
        
                <div class="col-xl-3 print-preview">
                    <div class="card card-body p-6">
                        <div class="row">
                            <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                                <form action="<?=str_replace('index.php/','',current_url());?>" method="get">
                                    <div class="form-group">
                                        <label for="fromDate">From</label>
                                        <input type="month" class="form-control" id="fromMonth" name="from" min="<?=date('Y-m',strtotime($properties[0]->available_from));?>" max="<?=date('Y-m');?>" value="<?=(isset($_GET['from']))?date('Y-m', strtotime($_GET['from'])):date('Y-m');?>" value="<?=date('Y-m',strtotime($properties[0]->available_from));?>" required aria-describedby="fromMonth">
                                    </div>
                                    <div class="form-group">
                                        <label for="toDate">To</label>
                                        <input type="month" class="form-control" id="toMonth" name="to" min="<?=date('Y-m',strtotime($properties[0]->available_from));?>" max="<?=date('Y-m');?>" value="<?=(isset($_GET['to']))?date('Y-m', strtotime($_GET['to'])):date('Y-m');?>" required aria-describedby="toMonth">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-submit btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body p-6 mt-6">
                        <div class="row">
                            <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                                <a href="javascript:void(0);"
                                   class="btn btn-secondary btn-print report-print btn-block">Print</a>
                            </div>
                            <div class="col-xl-12 col-md-3 col-sm-6">
                                <a href="javascript:void(0);" class="btn btn-success btn-download report-download btn-block">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>