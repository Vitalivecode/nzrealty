        <main id="content" class="bg-gray-01">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6">
              <div class="d-flex flex-wrap flex-md-nowrap mb-4">
                <div class="mr-0 mr-md-auto">
                  <h2 class="mb-0 text-heading fs-22 lh-15">My Properties<span
                    class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2"><?=($properties != false)?count($properties):0;?></span>
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
                  <div class="p-2">
                    <div class="input-group input-group-lg bg-white border">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent letter-spacing-093 border-0 pr-0"><i
                            class="far fa-align-left mr-2"></i>Sort by:</span>
                      </div>
                      <select class="form-control bg-transparent pl-0 selectpicker d-flex align-items-center sortby" name="sort-by" data-style="bg-transparent px-1 py-0 lh-1 font-weight-600 text-body" id="sortBy">
                        <option value="" selected></option>
                        <option value="alphabet">Alphabet</option>
                        <option value="price-low">Price - Low to High</option>
                        <option value="price-high">Price - High to Low</option>
                        <option value="date-old">Date - Old to New</option>
                        <option value="date-new">Date - New to Old</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table id="properties-list" class="table table-hover bg-white border rounded-lg">
                  <thead class="thead-sm thead-black">
                    <tr>
                      <th scope="col" class="border-top-0 px-6 pt-5 pb-4">Listing title</th>
                      <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Type</th>
                      <?php if(isset($logged) && ($logged['role'] == 'company')){ ?>
                      <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Listed by</th>
                      <?php } ?>
                      <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Listed On</th>
                      <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Status</th>
                      <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Actions</th>
                      <?php if(isset($logged) && ($logged['role'] != 'company')){ ?> 
                      <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Schedules</th>
                      <?php } ?>
                      <th scope="col" class="border-top-0 pt-5 pb-4 text-center">Reports</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($properties != false){ foreach($properties as $property){ $views = get('property_views', array('property' => $property->sno)); $others = ($property->other != '')?json_decode($property->other):false; ?>
                    <tr class="shadow-hover-xs-2 bg-hover-white">
                      <td class="pt-4 pb-3 px-4">
                        <div class="media">
                          <div class="w-120px mr-4 position-relative">
                            <a href="<?=base_url('properties/single/'.$property->accesskey);?>" target="_blank">
                              <img src="<?=base_url('uploads/small/'.$property->images);?>" alt="<?=$property->title;?>">
                            </a>
                            <span class="badge badge-<?=($property->p_type != 'commercial')?'primary':'warning';?> position-absolute pos-fixed-top"><?=$property->p_type;?></span>
                          </div>
                          <div class="media-body">
                            <a href="<?=base_url('properties/single/'.$property->accesskey);?>" target="_blank" class="text-dark hover-primary">
                              <h5 class="fs-14 mb-0 lh-18" data-toggle="tooltip" title="<?=property_name_replace($property->address);?>"><?=((strlen($property->address)>30)?property_name_replace(substr($property->address,0,30)).'...':property_name_replace($property->address));?></h5>
                            </a>
                            <span class="text-heading lh-15 font-weight-bold fs-17"><?=currency().$property->price;?></span>
                            <span class="text-gray-light"><?=(($property->negotiation == '0') && ($property->duration != ''))?'/'.$property->duration:'';?><?=(($property->ptype === 'commercial') && ($property->negotiation == '0') && ($others != false))?(($others->gst == 'plusgst')?' plus GST':' incl GST').(((!empty($others->outgoings)) && ($others->outgoings == 'plusout'))?' plus Outgoings':' incl Outgoings'):'';?></span><br>
                            <span class="badge badge-pill badge-<?=($property->property_status == 'Available')?'success':'danger';?>"><small><?=$property->property_status;?></small></span>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center"><?=ucfirst($property->ptype);?></td>
                      <?php if(isset($logged) && ($logged['role'] == 'company')){ $user = user('agents', $property->agent); ?> 
                      <td class="align-middle text-center"><?=($user != false)?$user[0]->name:'';?></td>
                      <?php } ?>
                      <td class="align-middle text-center"><?=date('d-m-y', strtotime($property->created_date));?></td>
                      <td class="align-middle text-center">
                        <span class="badge text-capitalize font-weight-normal fs-12 <?=($property->property_status == 'Available')?(($property->status == 1)?'badge-green':'badge-pink'):'badge-pink';?>"><?=($property->property_status == 'Available')?(($property->status == 1)?'published':'closed'):$property->property_status;?></span>
                      </td>
                      <td class="align-middle text-center">
                        <a href="<?=base_url('myaccount/edit-property/'.$property->accesskey);?>" data-toggle="tooltip" title="Edit" class="d-inline-block fs-18 text-muted hover-primary"><i class="fal fa-pencil-alt"></i></a>
                <!--    <a href="#" data-toggle="tooltip" title="Rented" class="d-inline-block fs-18 text-muted hover-primary ml-5"><i class="fal fa-check"></i></a>
                        <a href="<?=base_url('myaccount/delete-property/'.$property->accesskey);?>" data-toggle="tooltip" title="Delete" class="d-inline-block fs-18 text-muted hover-primary ml-5"><i class="fal fa-trash-alt"></i></a> -->
                      </td>
                      <?php if(isset($logged) && ($logged['role'] != 'company')){ ?> 
                      <td class="align-middle text-center">
                        <a href="javascript:void(0);" title="Add/Cancel" class="d-inline-block schedules-modal fs-18 text-muted hover-primary" data-toggle="tooltip" data-id="<?=$property->sno;?>"><i class="fa fa-calendar"></i></a>
                      </td>
                      <?php } ?>
                      <td class="align-middle text-center"><a href="<?=base_url('myaccount/property-report/'.$property->accesskey);?>" data-toggle="tooltip"  title="<?=($views != false)?count($views):0;?> Views" class="d-inline-block fs-18 text-muted hover-primary"><i class="fa fa-file-pdf"></i></a> </td>
                    </tr>
                    <?php } } else{ ?>
                    <tr class="shadow-hover-xs-2 bg-hover-white">
                      <td class="text-center pt-6 pb-4 px-6 text-center" colspan="<?=($logged['role'] != 'company')?7:7;?>">
                          No data found
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </main>
            <div class="modal fade" id="schedules-modal" role="dialog" aria-labelledby="schedules-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Schedules</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                    </div>
                </div>
            </div>
    