    <main id="content">
        <?=property_search_tab();?>
      <?php if($premium_residential = properties(array('p.premium' => 1, 'p.type' => 'residential'))){ ?>
      <section class="pt-lg-8 pb-lg-4 py-8">
        <div class="container container-xxl">
          <div class="row">
            <div class="col-md-6">
              <h5 class="text-heading">Premium Listings | Residential</h5>
              <span class="heading-divider"></span>
            </div>
            <div class="col-md-6 text-md-right">
              <a href="<?=base_url('properties?premium=1&type=residential');?>" class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">View more
                <i class="far fa-long-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <?=$premium_residential;?>
        </div>
      </section>
      <?php } ?>
      <?php if($premium_commercial = properties(array('p.premium' => 1, 'p.type' => 'commercial'))){ ?>
      <section class="pt-lg-6 pb-lg-6 py-11">
        <div class="container container-xxl">
          <div class="row">
            <div class="col-md-6">
              <h5 class="text-heading">Premium Listings | Commercial</h5>
              <span class="heading-divider"></span>
            </div>
            <div class="col-md-6 text-md-right">
              <a href="<?=base_url('properties?premium=1&type=commercial');?>" class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">View more
                <i class="far fa-long-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <?=$premium_commercial;?>
        </div>
      </section>
      <?php } ?>
      <section>
        <div class="bg-gray-02 py-lg-8 pt-11 pb-6">
          <div class="container container-xxl">
            <div class="row">
              <div class="col-lg-4 pr-xl-13" data-animate="fadeInLeft">
                <h4 class="text-heading lh-1625">Explore <br> by Property Type</h4>
                <span class="heading-divider"></span>
                <p class="mb-6">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
                <a href="#" class="btn btn-lg text-secondary btn-accent">+<?=inicompute(get('properties', array('status'=>1)));?> Available Properties
                  <i class="far fa-long-arrow-right ml-1"></i>
                </a>
              </div>
              <div class="col-lg-8" data-animate="fadeInRight">
                <div class="slick-slider arrow-haft-inner custom-arrow-xxl-hide mx-0" data-slick-options='{"slidesToShow": 4, "autoplay":true,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 2,"arrows":false,"autoplay":true}}]}'>
                  <div class="box px-0 py-6">
                    <a href="#" class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="<?=base_url('layout/images/verified.png');?>" class="card-img-top" alt="Apartment">
                      <div class="card-body px-0 pt-5 pb-0">
                        <h4 class="card-title fs-16 lh-2 text-dark mb-0">Apartment</h4>
                      </div>
                    </a>
                  </div>
                  <div class="box px-0 py-6">
                    <a href="#" class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="<?=base_url('layout/images/sofa.png');?>" class="card-img-top" alt="House">
                      <div class="card-body px-0 pt-5 pb-0">
                        <h4 class="card-title fs-16 lh-2 text-dark mb-0">House</h4>
                      </div>
                    </a>
                  </div>
                  <div class="box px-0 py-6">
                    <a href="#" class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="<?=base_url('layout/images/architecture-and-city.png');?>" class="card-img-top" alt="Office">
                      <div class="card-body px-0 pt-5 pb-0">
                        <h4 class="card-title fs-16 lh-2 text-dark mb-0">Office</h4>
                      </div>
                    </a>
                  </div>
                  <div class="box px-0 py-6">
                    <a href="#" class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="<?=base_url('layout/images/eco-house.png');?>" class="card-img-top" alt="Villa">
                      <div class="card-body px-0 pt-5 pb-0">
                        <h4 class="card-title fs-16 lh-2 text-dark mb-0">Villa</h4>
                      </div>
                    </a>
                  </div>
                  <div class="box px-0 py-6">
                    <a href="#" class="card border-0 align-items-center justify-content-center pt-7 pb-5 px-3 shadow-hover-3 bg-transparent bg-hover-white text-decoration-none">
                      <img src="<?=base_url('layout/images/verified.png');?>" class="card-img-top" alt="Apartment">
                      <div class="card-body px-0 pt-5 pb-0">
                        <h4 class="card-title fs-16 lh-2 text-dark mb-0">Apartment</h4>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php if($featured_residential = properties(array('p.featured' => 1, 'p.type' => 'residential'))) { ?>
      <section class="pt-lg-8 pb-lg-4 py-11">
        <div class="container container-xxl">
          <div class="row">
            <div class="col-md-6">
              <h5 class="text-heading">Featured Listings | Residential</h5>
              <span class="heading-divider"></span>
            </div>
            <div class="col-md-6 text-md-right">
              <a href="<?=base_url('properties?featured=1&type=residential');?>" class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">View more
                <i class="far fa-long-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <?=$featured_residential;?>
        </div>
      </section>
      <?php } ?>
      <?php if($featured_commercial = properties(array('p.featured' => 1, 'p.type' => 'commercial'))){ ?>
      <section class="pt-lg-6 pb-lg-4 py-11">
        <div class="container container-xxl">
          <div class="row">
            <div class="col-md-6">
              <h5 class="text-heading">Featured Listings | Commercial</h5>
              <span class="heading-divider"></span>
            </div>
            <div class="col-md-6 text-md-right">
              <a href="<?=base_url('properties?featured=1&type=commercial');?>" class="btn fs-14 text-secondary btn-accent py-3 lh-15 px-7 mb-6 mb-lg-0">View more
                <i class="far fa-long-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <?=$featured_commercial;?>
        </div>
      </section>
      <?php } ?>
      
      <?php if(isset($cities) && !empty($cities) && ($cities != false)){ ?>
      <section class="pt-lg-8 pb-lg-8 py-11">
        <div class="container container-xxl">
          <h5 class="text-heading">Search By Popular Cities</h5>
          <span class="heading-divider"></span>
          <div class="pt-lg-2 slick-slider mx-n2" data-slick-options='{"slidesToShow": 5,"arrows":false, "autoplay":false,"dots":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
            <?php foreach($cities as $city){ ?>
            <div class="box px-2" data-animate="fadeInUp">
              <div class="card text-white bg-overlay-gradient-8 hover-zoom-in">
                <img src="<?=pic($city->cimage);?>" class="card-img" alt="<?=ucwords(strtolower($city->city_name));?>">
                <div class="card-img-overlay d-flex justify-content-end flex-column p-4">
                  <h2 class="card-title mb-0 fs-20 lh-182"><a href="<?=(!empty($city->url)?$city->url:'#');?>" <?=(!empty($city->url)?'target="_blank"':'');?> class="text-white"><?=ucwords(strtolower($city->city_name));?></a></h2>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <?php } ?>
      
      <?php if(isset($testimonials) && !empty($testimonials) && ($testimonials != false)){ ?>
        <section class="bg-gray-02 pt-10 pb-11">
        	<div class="container">
        		<p class="text-primary letter-spacing-263 text-uppercase lh-186 text-center mb-0">testimonials</p>
        		<h2 class="text-center lh-1625 text-dark mb-5">
        			What Our Clients Say About Us
        		</h2>
        		<div class="slick-slider testimonials" data-slick-options='{"slidesToShow": 3, "autoplay":true,"dots":true,"arrows":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
        			<?php foreach($testimonials as $testimonial){ ?>
        			<div class="box">
        				<div class="card p-6" data-animate="fadeInUp">
        					<div class="card-body p-0 text-center">
                                    <span class="text-primary fs-26 lh-1 mb-4 d-block">
                                        <i class="fas fa-quote-left"></i>
                                    </span>
        						<p class="card-text fs-15 lh-2 mb-4">
        							<?=$testimonial->testimonial;?>
        						</p>
        						<span class="mx-auto divider mb-5"></span>
        						<img src="<?=profilepic($testimonial->user_image);?>" class="rounded-circle d-inline-block mb-2" alt="<?=ucwords(strtolower($testimonial->name));?>" width="140px" style="width:140px;">
        						<p class="fs-16 lh-214 text-dark font-weight-500 mb-0"><?=ucwords(strtolower($testimonial->name));?></p>
        						<p class="mb-0"><?=ucwords(strtolower($testimonial->city));?></p>
        
        					</div>
        				</div>
        			</div>
        			<?php } ?>
        		</div>
        		<?php if(!$this->session->userdata('logged_in')){ ?>
        		<div class="p-6 mxw-670 pl-md-9 d-sm-flex align-items-sm-center position-relative mt-10 rounded-lg" style="background-color: #eaeff7" data-animate="fadeInUp">
        			<div class="mt-md-0 mt-6">
        				<h4 class="text-secondary fs-20 font-weight-normal">Become a<span class="font-weight-600"> Real Estate Agent</span></h4>
        				<p class="mb-0">Guiding home with integrity and passion</p>
        			</div>
        			<div class="ml-auto">
        				<a class="btn btn-lg btn-primary rounded-lg mt-sm-0 mt-6" data-toggle="modal" href="#login-register-modal">Register now</a>
        			</div>
        			<i class="far fa-users h-64 w-64px bg-indigo d-flex justify-content-center align-items-center text-white rounded-circle fs-24 position-absolute custom-pos-icon"></i>
        		</div>
        		<?php } ?>
        		
        	</div>
        </section>
      <?php } ?>
      
<!--     
<section class="pt-10 pb-9">
	<div class="container">
		<p class="text-primary letter-spacing-263 text-uppercase lh-186 text-center mb-0">new & articles</p>
		<h2 class="text-center lh-1625 text-dark pb-1">
			Check Out Recent News & Articles
		</h2>
		<div class="mx-n2">
			<div class="slick-slider mt-6 mx-n1 slick-dots-mt-0" data-slick-options='{"slidesToShow": 3, "autoplay":false,"arrows":false,"dots":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 768,"settings": {"slidesToShow": 2,"autoplay":true}},{"breakpoint": 576,"settings": {"slidesToShow": 1,"arrows":false,"dots":true,"autoplay":true}}]}'>
				<div class="item py-4" data-animate="fadeInUp">
					<div class="card border-0 shadow-xxs-3" data-animate="fadeInUp">
						<div class="position-relative d-flex align-items-end card-img-top">
							<a href="#" class="hover-shine">
								<img src="<?=base_url('layout/images/post-05.jpg');?>" alt="The Interior Design The Hall On str">
							</a>
						</div>
						<div class="card-body px-5 pt-3 pb-5">
							<p class="mb-1 fs-13">Feb 16, 2023</p>
							<h3 class="fs-18 text-heading lh-194 mb-1">
								<a href="#" class="text-heading hover-primary">The Interior Design The Hall On str. Filimonovo</a>
							</h3>
							<p class="mb-3">Lorem ipsum dolor sit amet, consectetur cing elit. Suspe ndisse suscipit sagittis leo sit met condimentum estibulum issim</p>
							<a class="text-heading font-weight-500" href="#">Learn more <i class="far fa-long-arrow-right text-primary ml-1"></i></a>
						</div>
					</div>
				</div>
				<div class="item py-4" data-animate="fadeInUp">
					<div class="card border-0 shadow-xxs-3" data-animate="fadeInUp">
						<div class="position-relative d-flex align-items-end card-img-top">
							<a href="#" class="hover-shine">
								<img src="<?=base_url('layout/images/post-06.jpg');?>" alt="">
							</a>
						</div>
						<div class="card-body px-5 pt-3 pb-5">
							<p class="mb-1 fs-13">Feb 16, 2023</p>
							<h3 class="fs-18 text-heading lh-194 mb-1">
								<a href="#" class="text-heading hover-primary">Future Office Buldings Intelligent by Design</a>
							</h3>
							<p class="mb-3">Lorem ipsum dolor sit amet, consectetur cing elit. Suspe ndisse suscipit sagittis leo sit met condimentum estibulum issim</p>
							<a class="text-heading font-weight-500" href="#">Learn more <i class="far fa-long-arrow-right text-primary ml-1"></i></a>
						</div>
					</div>
				</div>
				<div class="item py-4" data-animate="fadeInUp">
					<div class="card border-0 shadow-xxs-3" data-animate="fadeInUp">
						<div class="position-relative d-flex align-items-end card-img-top">
							<a href="#" class="hover-shine">
								<img src="<?=base_url('layout/images/post-07.jpg');?>" alt="">
							</a>
						</div>
						<div class="card-body px-5 pt-3 pb-5">
							<p class="mb-1 fs-13">Feb 16, 2023</p>
							<h3 class="fs-18 text-heading lh-194 mb-1">
								<a href="#" class="text-heading hover-primary">Ten Benefits Of Rentals That May Change Your Perspective</a>
							</h3>
							<p class="mb-3">Lorem ipsum dolor sit amet, consectetur cing elit. Suspe ndisse suscipit sagittis leo sit met condimentum estibulum issim</p>
							<a class="text-heading font-weight-500" href="#">Learn more <i class="far fa-long-arrow-right text-primary ml-1"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
-->

    <?php if(isset($clients) && !empty($clients) && ($clients != false)){ ?>
      <section>
        <div class="container container-xxl">
          <div class="py-lg-8 py-6 border-top">
          <h5 class="text-heading">Our Clients</h5>
          <span class="heading-divider"></span>
            <div class="slick-slider mx-0 partners" data-slick-options='{"slidesToShow": 6, "autoplay":true,"dots":false,"arrows":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":4}},{"breakpoint": 992,"settings": {"slidesToShow":3}},{"breakpoint": 768,"settings": {"slidesToShow": 3}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>
              <?php foreach($clients as $client){ ?>
              <div class="box d-flex align-items-center justify-content-center" data-animate="fadeInUp">
                <a href="<?=(!empty($client->url)?$client->url:'#');?>" <?=(!empty($client->url)?'target="_blank"':'');?> class="item position-relative hover-change-image">
                  <img src="<?=pic($client->cimage);?>" class="hover-image position-absolute pos-fixed-top" alt="<?=ucwords(strtolower($client->city_name));?>">
                  <img src="<?=pic($client->cimage);?>" alt="<?=ucwords(strtolower($client->city_name));?>" class="image">
                </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
    <?php } ?>
</main>
    