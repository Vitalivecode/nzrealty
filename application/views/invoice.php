<?php if($role == 'company'){ $details = json_decode($package->details); } ?>
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 add-new-invoice">
        <div class="row">
            <div class="col-xl-9 mb-6 mb-xl-0">
                <div class="card card-body main-invoice-info p-6">
                    <div class="row mb-4">
                        <div class="col-sm-6 col-12 mr-auto mb-2">
                            <div class="d-flex align-items-center">
                                <img src="<?=base_url('uploads/'.$site[0]->logo);?>" alt="<?=$site[0]->title;?>" width="202px" class="company-logo normal-logo">
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right mb-2"></div>
                        <div class="col-sm-6 align-self-center mt-3">
                            <p class="mb-0">XYZ Delta Street</p>
                            <p class="mb-0">info@company.com</p>
                            <p class="mb-0">(120) 456 789</p>
                        </div>
                        <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                <p class="fs-18 mb-0"><span class="inv-title">Invoice : </span>
                                    <span class="text-primary" id="invoice-title">#RL<?=($role == 'company')?sprintf("%'.06d\n", $package->sno):'A'.sprintf("%'.06d\n", $property[0]->sno);?></span>
                                </p>

                                <p class="mb-0"><span class="text-heading font-weight-500">Invoice Date : </span>
                                    <span class="inv-date"><?=($role == 'company')?date('d M, Y', strtotime($package->created_date)):date('d M, Y', strtotime($property[0]->created_date));?></span>
                                </p>
                                <p class="mb-0">
                                    <span class="text-heading font-weight-500"><?=($role == 'company')?'Due':'Paid';?> Date : </span> 
                                    <span class="inv-date"><?=($role == 'company')?date('d M, Y', strtotime($package->created_date. ' + 44 days')):date('d M, Y', strtotime($property[0]->txndate));?></span>
                                </p>
                        </div>
                    </div>
                    <div class="border-top pt-4 mb-4">
                        <div class="row">
                            <div class="col-xl-8 col-md-6 col-sm-4 align-self-center">
                                <h6 class="card-title mb-2 text-heading fs-22 lh-15">Invoice To</h6>
                            </div>
                            <div class="col-xl-4 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-right">
                                <!--<h6 class="card-title mb-5 text-heading fs-22 lh-15">Payment Info:</h6>-->
                            </div>
                            <?php if(($role == 'company') && isset($company) && ($company != false)){ ?>
                            <div class="col-xl-8 col-md-6 col-sm-4 align-self-center mb-6 mb-md-0">
                                <p class="mb-0"><?=$company[0]->name;?></p>
                                <p class="mb-0"><?=$company[0]->address;?></p>
                                <p class="mb-0"><?=$company[0]->email;?></p>
                                <p class="mb-0"><?=$company[0]->phone;?></p>
                                <p class="mb-0"><b>Service Period: </b><?=($role == 'company')?date('d M, Y', strtotime($package->created_date)):date('d M, Y', strtotime($property[0]->created_date));?> to <?=($role == 'company')?date('d M, Y', strtotime($package->created_date. ' + 30 days')):date('d M, Y', strtotime($property[0]->txndate));?></p>
                            </div>
                            <?php } elseif($role == 'agents'){ ?>
                            <div class="col-xl-8 col-md-6 col-sm-4 align-self-center mb-6 mb-md-0">
                                <p class="mb-0"><?=$name;?></p>
                                <p class="mb-0"><?=$email;?></p>
                                <p class="mb-0"><b><?=$company[0]->name;?></b></p>
                                <p class="mb-0"><b><?=$company[0]->address;?></b></p>
                                <p class="mb-0"><b><?=$company[0]->email;?></b></p>
                                <p class="mb-0"><b><?=$company[0]->phone;?></b></p>
                            </div>
                            <?php } elseif($role == 'landlord'){ ?>
                            <div class="col-xl-8 col-md-6 col-sm-4 align-self-center mb-6 mb-md-0">
                                <p class="mb-0"><?=$landlord[0]->name;?></p>
                                <p class="mb-0"><?=$landlord[0]->email;?></p>
                                <p class="mb-0"><?=$landlord[0]->phone;?></p>
                            </div>
                            <?php } ?>
                            <div class="col-xl-4 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-right">

                        <!--
                                <p class="mb-0"><span class="text-heading font-weight-500">Bank Name:</span>
                                    <span>Bank of New Zealand</span></p>
                                <p class="mb-0"><span class="text-heading font-weight-500">Account Number: </span>
                                    <span>1234567890</span></p>
                                <p class="mb-0"><span class="text-heading font-weight-500">SWIFT code:</span>
                                    <span>VS70134</span>
                                </p>
                                <p class="mb-0"><span class="text-heading font-weight-500">Country: </span>
                                    <span>New Zealand</span></p>
                        -->
                            </div>
    
                        </div>
    
                    </div>
    
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <th scope="col" class="text-center">S.No</th>
                                    <th scope="col" class="text-center"><?=($role == 'company')?'Package':'Property';?></th>
                                    <?php if($role == 'company'){ ?>
                                        <th class="text-center" scope="col">Package Price</th>
                                    <?php } ?>
                                    <th class="text-center" scope="col">Premium</th>
                                    <th class="text-center" scope="col">Featured</th>
                                    <?php if(($role == 'agents') || ($role == 'landlord')){ ?>
                                        <th class="text-center" scope="col">S.M.Boost</th>
                                    <?php } ?>
                                    <?php if($role == 'landlord'){ ?>
                                        <th class="text-center" scope="col">Listing Price</th>
                                    <?php } ?>
                                    <th class="text-center" scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if($role == 'company'){ ?>
                                        <td class="text-center">1</td>
                                        <td class="text-center"><?=$details->name;?></td>
                                        <?php $total = $package->amount; ?>
                                        <td class="text-center"><?=currency().$total;?></td>
                                        <td class="text-center"><?=($properties != false && !empty($premium['1']))?count($premium['1']).' x '.(currency().(addons()['premium']->price)):0;?></td>
                                        <td class="text-center"><?=($properties != false && !empty($featured['1']))?count($featured['1']).' x '.(currency().(addons()['featured']->price)):0;?></td>
                                        <?php $premium_addon = ($properties != false && !empty($premium['1']))?($total = $total+(count($premium['1']))*(addons()['premium']->price)):0; $featured_addon = ($properties != false && !empty($featured['1']))?($total = $total+(count($featured['1']))*(addons()['featured']->price)):0; ?>
                                        <td class="text-center"><?=currency().$total;?></td>
                                    <?php }elseif(($role == 'agents') || ($role == 'landlord')){ $propertyprice = 0; ?>
                                        <td class="text-center">1</td>
                                        <td class="text-center"><?=property_name_replace($property[0]->address);?></td>
                                        <td class="text-center"><?=currency();?><?=($property[0]->premium == '1')?(1*(addons()['premium']->price)):'0';?></td>
                                        <td class="text-center"><?=currency();?><?=($property[0]->featured == '1')?(1*(addons()['featured']->price)):'0';?></td>
                                        <td class="text-center"><?=currency();?><?=($property[0]->boost == '1')?(1*(addons()['boost']->price)):'0';?></td>
                                        <?php if($role == 'landlord'){ $propertyprice = prop(); ?>
                                            <td class="text-center"><?=currency().$propertyprice;?></td>
                                        <?php } ?>
                                        <?php $total = $propertyprice; ($property[0]->premium == '1')?($total = (addons()['premium']->price)+$total):$total; ($property[0]->featured == '1')?($total = (addons()['featured']->price)+$total):$total; ($property[0]->boost == '1')?($total = (addons()['boost']->price)+$total):$total;?>
                                        <td class="text-center"><?=currency().$total;?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="row mt-4">
                        <div class="col-sm-5 col-12 order-sm-0 order-1"></div>
                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                            <div class="text-sm-right">
                                <div class="row">
                                    
                                    <div class="col-sm-8 col-7">
                                        <p class="mb-1">Total: </p>
                                    </div>
                                    <div class="col-sm-4 col-5">
                                        <p class="mb-1"><?=currency().$total;?></p>
                                    </div>
                                    
                                    <div class="col-sm-8 col-7">
                                        <p class="mb-1">Promotional: </p>
                                    </div>
                                    <div class="col-sm-4 col-5">
                                        <p class="mb-1">-<?=currency().($promotional = (promotional_price($package->created_date, $package->amount) == 0)?$package->amount:0);?></p>
                                    </div>
                                    
                                    <div class="col-sm-8 col-7">
                                        <p class="mb-1">Grand Total: </p>
                                    </div>
                                    <div class="col-sm-4 col-5">
                                        <p class="mb-1"><?=currency().($total-$promotional);?></p>
                                    </div>
                                    
                                    <?php if($role == 'agents'){ ?>
                                    <div class="col-sm-8 col-7">
                                        <p class="mb-1"><strong>Paid:</strong> </p>
                                    </div>
                                    <div class="col-sm-4 col-5">
                                        <p class="mb-1"><strong><?=currency().(addons()['boost']->price);?></strong></p>
                                    </div>
                                    <?php } ?>
                                <!--
                                    <div class="col-sm-8 col-7">
                                        <p class="mb-1">Tax Amount: </p>
                                    </div>
                                    <div class="col-sm-4 col-5">
                                        <p class="mb-1">$700</p>
                                    </div>
                                    <div class="col-sm-8 col-7">
                                        <p class="discount-rate">Discount : <span
                                                class="discount-percentage">5%</span></p>
                                    </div>
                                    <div class="col-sm-4 col-5">
                                        <p class="mb-1">$10</p>
                                    </div>
                                -->
                            <!--
                                    <div class="col-sm-8 col-7 grand-total-title mt-4">
                                        <h4 class="text-heading fs-22 lh-15">Grand Total : </h4>
                                    </div>
                                    <div class="col-sm-4 col-5 grand-total-amount mt-4">
                                        <h4 class="text-heading fs-22 lh-15"><?=currency().$total;?></h4>
                                    </div>
                                    <?php if($role == 'agents'){ ?>
                                    <div class="col-sm-8 col-7 grand-total-title mt-4">
                                        <h4 class="text-heading fs-22 lh-15">Paid Amount : </h4>
                                    </div>
                                    <div class="col-sm-4 col-5 grand-total-amount mt-4">
                                        <h4 class="text-heading fs-22 lh-15"><?=currency().(addons()['boost']->price);?></h4>
                                    </div>
                                    <?php } ?>
                            -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-top pt-4 mt-7">
                        <div class="row">
                            <div class="col-sm-12 col-12 order-sm-0 order-1 center" align="center">
                                <?php if(($role == 'company') && isset($company) && ($company != false)){ ?>
                                <p class="mb-0" style="font-size: 12px;">Note: Premium & Featured prices will be attached to your companys invoice for payment (if selected)</p>
                                <?php } ?>
                                <p class="mb-0 mt-1">Thank you for your business & support.😊</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 invoice-preview-button">
                <div class="card card-body p-6">
                    <div class="row">
                        <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                            <a href="<?=base_url('myaccount/invoices');?>" class="btn btn-primary btn-edit btn-block">Back</a>
                        </div>
                    <!--
                        <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                            <a href="javascript:void(0);" class="btn btn-primary btn-send btn-block">Send Invoice</a>
                        </div>
                    -->
                        <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                            <a href="javascript:void(0);" class="btn btn-dark btn-print invoice-action-print btn-block">Print</a>
                        </div>
                        <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                            <a href="javascript:void(0);" class="btn btn-success btn-download invoice-download btn-block">Download</a>
                        </div>
                        <?php if($role == 'company'){ $invoice = get('invoice', array('invoice_no' => $package->sno)); if(($invoice != false) && ($invoice[0]->txnstatus == 'Success')){ } elseif($total == 0){ } else{ ?>
                        <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                            <a href="<?=base_url('payment/invoice/'.$package->sno);?>" class="btn btn-secondary btn-edit btn-block">Pay Now</a>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>