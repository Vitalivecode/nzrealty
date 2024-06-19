    <?php if(isset($small) && $small == 6){ ?><div class="row"><h4 class="ml-3 mb-4 fs-18 lh-15 text-heading">Choose a package that suits your business </h4></div><?php } ?>
    <div class="row">
        <?php $no=1; foreach($packages as $package){ ?>
            <div class="col-xl-4 col-sm-<?=isset($small)?12:6;?> mb-6">
    <!--    <div class="col-xl-<?=isset($small)?$small:3;?> col-sm-<?=isset($small)?12:6;?> mb-6">      -->
                <label class="d-block m-0">
                    <input type="radio" name="package" value="<?=$package->sno;?>" <?=($no == 1)?'selected checked':'';?> class="card-input-element" />
                    <div class="card bg-gray-01 border-0 p-3 overflow-hidden card-input">
                        <div class="card-header bg-transparent p-0">
                            <p class="fs-15 font-weight-600 text-heading mb-0"><?=$package->name;?></p>
                            <p class="fs-30 font-weight-600 text-heading lh-15 mb-1"><?=currency().$package->price;?><span class="fs-12"> / month</span></p>
                            <?php if($package->price == 0){ ?>
                            <span class="fs-13 font-weight-500 text-white text-uppercase custom-packages">Free</span>
                            <?php } ?>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-unstyled pt-2 mb-2">
                        	    <li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">Listings per month</p>
                        			<p class="font-weight-500 text-heading mb-0 fs-12">- <?=$package->properties;?></p>
                        		</li>
                        		<li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">Agents</p>
                        			<p class="font-weight-500 text-heading mb-0 fs-12">- <?=$package->agents;?></p>
                        		</li>
                        		<li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">Company Profile Page</p>
                        		</li>
                        		<li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">Company Dashboard</p>
                        		</li>
                        		<li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">Agents Dashboards</p>
                        		</li>
                        		<li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">View Schedules</p>
                        		</li>
                        		<li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">ApplyLink Option</p>
                        		</li>
                        		<li class="d-flex justify-content-between">
                        			<p class="text-gray-light mb-0 fs-12">Reports</p>
                        		</li>
                        	</ul>
                        </div>
                    </div>
                </label>
            </div>
        <?php $no++; } ?>
        <small class="form-text text-danger package mb-3 ml-3"></small>
    </div>