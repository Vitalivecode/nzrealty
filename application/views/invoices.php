    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6 invoice-listing">
              <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                  <h2 class="mb-0 text-heading fs-22 lh-15">My Invoices<span
                    class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2"><?=(isset($packages) && ($packages != false))?count($packages):'';?></span>
                  </h2>
                  <p class="mb-1">For changing subcription package, please contact <a href="mailto:support@rentallistings.co.nz">support@rentallistings.co.nz</a></p>
                </div>
                <div class="form-inline justify-content-md-end mx-n2">
            <!--
                  <div class="p-2">
                    <div class="input-group input-group-lg bg-white border">
                      <div class="input-group-prepend">
                        <a class="btn btn-primary" data-toggle="modal" href="#show-packages-modal">Change Package</a>
                      </div>
                    </div>
                  </div>
            -->
                  <div class="p-2">
                    <div class="input-group input-group-lg bg-white border">
                      <div class="input-group-prepend">
                        <button class="btn pr-0 shadow-none" type="button"><i class="far fa-search"></i></button>
                      </div>
                      <input type="text" id="searchBox" class="form-control bg-transparent border-0 shadow-none text-body" placeholder="Search invoice by name, date & more" name="search">
                    </div>
                  </div>
                </div>
              </div>
            <div class="table-responsive">
                <table id="package-list" class="table table-hover bg-white border rounded-lg">
                    <thead class="thead-sm thead-black">
                        <tr role="row">
                            <th class="align-middle text-center border-top-0 py-5">Invoice Id</th>
                            <?php if($role == 'company'){ ?>
                            <th class="align-middle text-center border-top-0 py-5">Package</th>
                            <th class="align-middle text-center border-top-0 py-5">Properties</th>
                            <th class="align-middle text-center border-top-0 py-5">PMS & Agents</th>
                            <th class="align-middle text-center border-top-0 py-5">Invoice Date</th>
                            <th class="align-middle text-center border-top-0 py-5">Due Date</th>
                            <?php }elseif(($role == 'agents') || ($role == 'landlord')){ ?>
                                <th class="align-middle text-center border-top-0 py-5">Property Name</th>
                                <th class="align-middle text-center border-top-0 py-5">Premium</th>
                                <th class="align-middle text-center border-top-0 py-5">Featured</th>
                                <th class="align-middle text-center border-top-0 py-5">Boost</th>
                            <?php } ?>
                            <?php if($role == 'landlord'){ ?>
                                <th class="align-middle text-center border-top-0 py-5">Listing Price</th>
                            <?php } ?>
                            <th class="align-middle text-center border-top-0 py-5">Total</th>
                            <?php if($role == 'agents'){ ?>
                                <th class="align-middle text-center border-top-0 py-5">Paid</th>
                            <?php } ?>
                            <th class="align-middle text-center border-top-0 py-5">Status</th>
                            <th class="align-middle text-center border-top-0 py-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($role == 'company'){  ?>
                        <?php if(isset($packages) && ($packages != false)){ foreach($packages as $package){ $details = json_decode($package->details); $prpty = ($properties != false)?count($properties):0; $agnts = ($agents != false)?count($agents):0; $invoiceId = sprintf("%'.06d\n", $package->sno); $invoice = get('invoice', array('invoice_no' => $package->sno)); ?>
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                            <td class="align-middle text-center py-5"><a href="<?=base_url('myaccount/invoice/'.$package->sno);?>"><span class="inv-number">#RL<?=$invoiceId;?></span></a></td>
                            <td class="align-middle text-center py-5"><?=$details->name;?></td>
                            <td class="align-middle text-center py-5"><span data-toggle="tooltip" data-placement="top" title="<?=($details->properties)-($prpty);?> Properties Remaining"><?=$prpty?>/<?=$details->properties;?></span></td>
                            <td class="align-middle text-center py-5"><span data-toggle="tooltip" data-placement="top" title="<?=($details->agents)-($agnts);?> Agents Remaining"><?=$agnts?>/<?=$details->agents;?></span></td>
                            <td class="align-middle text-center py-5"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span><?=date('d M, Y', strtotime($package->created_date. ' + 30 days'));?></td>
                            <td class="align-middle text-center py-5"><span class="text-danger pr-1"><i class="fal fa-calendar"></i></span><?=date('d M, Y', strtotime($package->created_date. ' + 44 days'));?></td>
                            <?php $total = promotional_price($package->created_date,$details->price); $premium_addon = ($properties != false && !empty($premium['1']))?($total = $total+(count($premium['1']))*(addons()['premium']->price)):0; $featured_addon = ($properties != false && !empty($featured['1']))?($total = $total+(count($featured['1']))*(addons()['featured']->price)):0; ?>
                            <td class="align-middle text-center py-5"><?=currency().$total;?></td>
                            <td class="align-middle text-center py-5"><span class="badge badge-<?=(($invoice != false) && ($invoice[0]->txnstatus == 'Success'))?'green':'yellow';?> text-capitalize"><?=($invoice != false)?$invoice[0]->txnstatus:'Pending';?></span></td>
                            <td class="align-middle text-center py-5"><?php if(($invoice != false) && ($invoice[0]->txnstatus == 'Success')){ echo 'Paid'; } elseif($total == 0){ echo '-'; } else{ ?><a href="<?=base_url('payment/invoice/'.$package->sno);?>" class="btn btn-sm btn-secondary">Pay</a><?php } ?></td>
                        </tr>
                        <?php } }else{ ?>
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                          <td class="align-middle text-center pt-6 pb-4 px-6 text-center" colspan="10">
                              No data found
                          </td>
                        </tr>
                        <?php } ?>
                        <?php }elseif(($role == 'agents') || ($role == 'landlord')){ ?>
                        <?php if($properties != false){ foreach($properties as $property){ $propertyprice = 0; if(($property->featured == '1') || ($property->premium == '1') || ($property->boost == '1')){  $invoiceId = sprintf("%'.06d\n", $property->sno); ?>
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                            <td class="align-middle text-center py-5"><a href="<?=base_url('myaccount/invoice/'.$property->sno);?>"><span class="inv-number">#RLA<?=$invoiceId;?></span></a></td>
                            <td class="align-middle text-center py-5"><?=((strlen($property->address)>20)?substr($property->address,0,20).'...':$property->address);?></td>
                            <td class="align-middle text-center py-5"><span class="premium"><?=($property->premium == '1')?'Yes':'No';?></span></td>
                            <td class="align-middle text-center py-5"><span class="featured"><?=($property->featured == '1')?'Yes':'No';?></span></td>
                            <td class="align-middle text-center py-5"><span class="boost"><?=($property->boost == '1')?'Yes':'No';?></span></td>
                            <?php if($role == 'landlord'){ $propertyprice = prop(); ?>
                                <td class="align-middle text-center py-5"><?=currency().$propertyprice;?></td>
                            <?php } ?>
                            <?php $total = $propertyprice; ($property->premium == '1')?($total = (addons()['premium']->price)+$total):$total; ($property->featured == '1')?($total = (addons()['featured']->price)+$total):$total; ($property->boost == '1')?($total = (addons()['boost']->price)+$total):$total;?>
                            <td class="align-middle text-center py-5"><?=currency().$total;?></td>
                            <?php if($role == 'agents'){ ?>
                                <td class="align-middle text-center py-5"><?=currency().(addons()['boost']->price);?></td>
                            <?php } ?>
                            <td class="align-middle text-center py-5"><span class="badge badge-<?=($property->txnstatus == 'Success')?'green':'yellow';?> text-capitalize"><?=($property->txnstatus == 'Success')?$property->txnstatus:'Pending';?></span></td>
                            <td class="align-middle text-center py-5"><?=($property->txnstatus == 'Success')?'Paid':'Failed';?></td>
                        </tr>
                        <?php } } }else{ ?>
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                          <td class="align-middle text-center pt-6 pb-4 px-6 text-center" colspan="10">
                              No data found
                          </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>