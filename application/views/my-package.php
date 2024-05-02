    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10">
            <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15">My Package<span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2"><?=($packages != false)?count($packages):0;?></span>
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
                <table id="package-list" class="table table-hover border rounded-lg mb-6 bg-white">
                    <thead class="thead-sm thead-black">
                        <tr>
                            <th scope="col" class="align-middle text-center border-top-0 px-6 pt-5 pb-4">Current Package</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Properties</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Agents</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Premium</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Featured</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Invoice Id</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Valid Till</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Amount</th>
                            <th scope="col" class="align-middle text-center border-top-0 pt-5 pb-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($packages != false){ foreach($packages as $package){ $details = json_decode($package->details); $prpty = ($properties != false)?count($properties):0; $agnts = ($agents != false)?count($agents):0; ?>
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                            <td class="align-middle text-center p-6"><?=$details->name;?></td>
                            <td class="align-middle text-center"><span data-toggle="tooltip" data-placement="top" title="<?=($details->properties)-($prpty);?> Propertie(s) Remaining"><?=$prpty?>/<?=$details->properties;?></span></td>
                            <td class="align-middle text-center"><span data-toggle="tooltip" data-placement="top" title="<?=($details->agents)-($agnts);?> Agent(s) Remaining"><?=$agnts?>/<?=$details->agents;?></span></td>
                            <td class="align-middle text-center"><?=($properties != false && !empty($premium['1']))?count($premium['1']):0;?></td>
                            <td class="align-middle text-center"><?=($properties != false && !empty($featured['1']))?count($featured['1']):0;?></td>
                            <td class="align-middle text-center"><a href="#"><span class="inv-number" data-toggle="tooltip" data-placement="top" title="Click to view Invoice">#081451</span></a></td>
                            <td class="align-middle text-center"><?=date('d M, Y', strtotime($package->created_date));?></td>
                            <td class="align-middle text-center"><?=currency().$details->price;?></td>
                            <td class="align-middle text-center"><span class="badge badge-yellow text-capitalize">Pending</span></td>
                        </tr>
                        <?php } }else{ ?>
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                          <td class="align-middle text-center pt-6 pb-4 px-6 text-center" colspan="8">
                              No data found
                          </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>