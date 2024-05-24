        <main id="content" class="bg-gray-01">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6">
              <div class="d-flex flex-wrap flex-md-nowrap mb-4">
                <div class="mr-0 mr-md-auto">
                  <h2 class="mb-0 text-heading fs-22 lh-15">Schedules<span id="schedules-count" class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2"><?=($properties != false)?count($properties):0;?></span>
                  </h2>
                </div>
                <div class="form-inline justify-content-md-end mx-n2">
                  <div class="p-2">
                    <div class="input-group input-group-lg bg-white border">
                      <div class="input-group-prepend">
                        <button class="btn pr-0 shadow-none" type="button"><i class="far fa-search"></i></button>
                      </div>
                      <input type="text" id="searchBox" class="form-control bg-transparent border-0 shadow-none text-body" placeholder="Search listing" name="search">
                    </div>
                  </div>
                <!--
                  <div class="p-2">
                    <div class="input-group input-group-lg bg-white border">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0"><i
                            class="far fa-align-left mr-2"></i>Sort by:</span>
                      </div>
                      <select class="form-control bg-transparent pl-0 selectpicker d-flex align-items-center sortby" name="sort-by" data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body" id="sortBy">
                        <option value="" selected></option>
                        <option value="today">Today</option>
                        <option value="alphabet">Alphabet</option>
                        <option value="price-low">Price - Low to High</option>
                        <option value="price-high">Price - High to Low</option>
                        <option value="date-old">Date - Old to New</option>
                        <option value="date-new">Date - New to Old</option>
                      </select>
                    </div>
                  </div>
                -->
                </div>
              </div>
              <div class="table-responsive">
                <table id="schedules-list" class="table table-hover bg-white border rounded-lg">
                  <thead class="thead-sm thead-black">
                    <tr>
                      <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Listing Title</th>
                      <th scope="col" class="border-top-0 pt-5 pb-4">Agent Details</th>
                      <th scope="col" class="border-top-0 pt-5 pb-4">Date & Time</th>
            <!--      <th scope="col" class="border-top-0 pt-5 pb-4">Status</th>    -->
                      <?php if(isset($logged) && ($logged['role'] != 'user')){ ?> 
                      <th scope="col" class="border-top-0 pt-5 pb-4">Visited</th>
                      <th scope="col" class="border-top-0 pt-5 pb-4">Send Link</th>
                      <?php } ?>
                      <?php if(isset($logged) && ($logged['role'] == 'user')){ ?> 
                      <th scope="col" class="border-top-0 pt-5 pb-4">Options</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($properties != false){ foreach($properties as $property){ $visiter = !empty($visiters[$property->sno])?$visiters[$property->sno]:false; $others = ($property->other != '')?json_decode($property->other):false; if($visiter && is_array($visiter)){ foreach($visiter as $key => $visitersno){ ?>
                    <tr class="table-row shadow-hover-xs-2 bg-hover-white">
                      <td class="align-middle pt-6 pb-4 px-6">
                        <div class="media">
                          <div class="w-120px mr-4 position-relative">
                            <a href="<?=base_url('properties/single/'.$property->accesskey);?>" target="_blank">
                              <img src="<?=base_url('uploads/small/'.$property->images);?>" alt="<?=$property->title;?>">
                            </a>
                            <span class="badge badge-<?=($property->p_type != 'commercial')?'primary':'warning';?> position-absolute pos-fixed-top"><?=$property->ptype;?></span>
                          </div>
                          <div class="media-body">
                            <a href="<?=base_url('properties/single/'.$property->accesskey);?>" target="_blank" class="text-dark hover-primary">
                              <h5 class="fs-16 mb-0 lh-18" data-toggle="tooltip" title="<?=property_name_replace($property->address);?>"><?=((strlen($property->address)>30)?property_name_replace(substr($property->address,0,30)).'...':property_name_replace($property->address));?></h5>
                            </a>
                            <span class="text-heading lh-15 font-weight-bold fs-17"><?=currency().$property->price;?></span>
                            <span class="text-gray-light"><?=(($property->negotiation == '0') && ($property->duration != ''))?'/'.$property->duration:'';?><?=(($property->ptype === 'commercial') && ($property->negotiation == '0') && ($others != false))?(($others->gst == 'plusgst')?' plus GST':' incl GST').(((!empty($others->outgoings)) && ($others->outgoings == 'plusout'))?' plus Outgoings':' incl Outgoings'):'';?></span><br>
                            <span class="badge badge-pill badge-<?=($property->property_status == 'Available')?'success':'danger';?>"><small><?=$property->property_status;?></small></span>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle"><?=!empty($name[$visitersno])?$name[$visitersno]:'-';?><br><?=!empty($phone[$visitersno])?$phone[$visitersno]:'-';?><br><?=!empty($email[$visitersno])?$email[$visitersno]:'-';?></td>
                      <td class="align-middle"><?=(!empty($from_time[$schedule_id[$visitersno]]))?date('h:i A', strtotime($from_time[$schedule_id[$visitersno]])).' to ':'-';?> <?=(!empty($to_time[$schedule_id[$visitersno]]))?date('h:i A', strtotime($to_time[$schedule_id[$visitersno]])):'';?> <br><?=date('l', strtotime($day[$property->sno][$key]));?><br><?=date('d F, Y', strtotime($day[$property->sno][$key]));?></td>
                      <td class="d-none"><?=date('Y-m-d', strtotime($day[$property->sno][$key]));?></td>
                      <?php if(isset($logged) && ($logged['role'] == 'company')){ ?>
                        <td class="align-middle text-center"> <?=(!empty($visited[$visitersno]) && ($visited[$visitersno] === '1'))?'Yes':'No';?></td>
                        <td class="align-middle text-center"> <?=(!empty($link[$visitersno]) && ($link[$visitersno] === '1'))?'Yes':'No';?></td>
                      <?php } ?>
                      <?php if(isset($logged) && ($logged['role'] != 'company') && ($logged['role'] != 'user')){ ?> 
                        <td class="align-middle text-center">
                            <a href="javascript:void(0);" data-toggle="tooltip" title="<?=(!empty($visited[$visitersno]) && ($visited[$visitersno] === '1'))?'Visited':'Click to Visit';?>" class="schedule-visited d-inline-block fs-18 text-<?=(!empty($visited[$visitersno]) && ($visited[$visitersno] === '1'))?'success':'muted';?> hover-primary mr-5" data-link="" data-email="<?=!empty($email[$visitersno])?$email[$visitersno]:'';?>" data-name="<?=!empty($name[$visitersno])?$name[$visitersno]:'';?>" data-id="<?=$visitersno;?>"><i class="fas fa-check"></i></a>
                        </td>
                      <td class="align-middle text-center">
                        <?php if(!empty($property->apply_link)){ ?>
                            <a href="javascript:void(0);" data-toggle="tooltip" title="<?=(!empty($link[$visitersno]) && ($link[$visitersno] === '1'))?'Sent':'Send Link';?>" class="send-schedule-link d-inline-block fs-18 text-<?=(!empty($link[$visitersno]) && ($link[$visitersno] === '1'))?'success':'muted';?> hover-primary mr-5" data-link="<?=!empty($property->apply_link)?$property->apply_link:'';?>" data-email="<?=!empty($email[$visitersno])?$email[$visitersno]:'';?>" data-name="<?=!empty($name[$visitersno])?$name[$visitersno]:'';?>" data-id="<?=$visitersno;?>"><i class="fas fa-link"></i></a>
                        <?php } else{ ?>
                            <span class="mr-5">-</span>
                        <?php } ?>
                      </td>
                    <?php } ?>
                    <?php if(isset($logged) && ($logged['role'] == 'user')){ ?> 
                        <td class="align-middle text-center">
                            <?php if($property->property_status == 'Available'){ ?>
                                <a href="javascript:void(0);" data-toggle="tooltip" title="<?=(!empty($status[$visitersno]) && ($status[$visitersno] === '1'))?'Click to Cancel':'Cancelled';?>" class="<?=(!empty($status[$visitersno]) && ($status[$visitersno] === '1'))?'schedule-cancelled':'';?> d-inline-block fs-18 text-<?=(!empty($status[$visitersno]) && ($status[$visitersno] === '1'))?'success':'muted';?> hover-primary mr-5" data-id="<?=$visitersno;?>"><i class="fas fa-<?=(!empty($status[$visitersno]) && ($status[$visitersno] === '1'))?'check':'exclamation-circle';?>"></i></a>
                            <?php } else { echo '<span class="mr-5">-</span>'; } ?>
                        </td>
                    <?php } ?>
                    </tr>
                    <?php } } } } else{ ?>
                    <tr class="shadow-hover-xs-2 bg-hover-white">
                      <td class="align-middle pt-6 pb-4 px-6 text-center" colspan="<?=(($logged['role'] != 'user'))?5:3;?>">
                          No data found
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </main>


<!-- Modal -->
<div class="modal fade" id="visited" tabindex="-1" role="dialog" aria-labelledby="visitedLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="visitedLabel">Property Visited</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="applyLink">Apply Link</label>
            <input type="text" class="form-control" id="applyLink" aria-describedby="applyLink">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


          
          