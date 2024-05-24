<main id="content">
    <section class="pt-9 pb-10">
        <div class="container">
            <div class="row m-0">
                <div class="d-flex col-lg-12 align-items-center px-2 p-lg-5">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-xl-2 mx-auto">
                        <h4 class="card-title mb-1">Forgot Password?</h4>
                        <p class="card-text mb-5">Enter your email and we'll send you instructions to reset your password</p>
                        <form class="mt-2" id="nzform" action="#" data-action="<?=base_url('forgot/send');?>" method="POST">
                            <div class="form-group mb-4">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18" id="inputGroup-sizing-lg"><i class="far fa-address-card"></i></span>
                                    </div>
                                    <select class="form-control border-0 shadow-none form-control-lg selectpicker fs-13" name="type" required id="type">
                                        <option value="user">Are you a User</option>
                                        <option value="agents">Are you a Property Manager</option>
                                        <option value="landlord">Are you a Private Landlord</option>
                                        <option value="company">Are you a Company</option>
                                    </select>
                                </div>
                                <small class="form-text text-danger type"></small>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="email">Email</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18" id="inputGroup-sizing-lg"><i class="far fa-envelope"></i></span>
                                      </div>
                                    <input type="email" class="form-control border-0 shadow-none fs-13" id="email" name="email" required placeholder="Email" required aria-describedby="forgot-password-email" autofocus="" tabindex="1">
                                </div>
                                <small class="form-text text-danger email"></small>
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                            <button type="submit" id="nzform-submit" class="btn btn-primary btn-block" tabindex="2">Send reset link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>