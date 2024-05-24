    <main id="content" class="bg-gray-01">
            <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6">
              <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                  <h2 class="mb-0 text-heading fs-22 lh-15">My Wishlist<span id="favorite" class="favorite badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2"><?=(isset($favorite) && !empty($favorite))?count($favorite):'';?></span>
                  </h2>
                  <p>Note: Listing will be removed once rented | Showing by latest</p>
                </div>
              </div>
              <?=(isset($favorite) && !empty($favorite))?properties(null, array('p.sno',$favorite)):'';?>
            </div>
          </main>
        