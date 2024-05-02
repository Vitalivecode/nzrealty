<main id="content">
    <section class="pt-9 pb-10">
        <div class="container">
            <div class="row m-0">
                <div class="d-flex col-lg-12 align-items-center px-2 p-lg-5">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 px-xl-2 mx-auto">
                        <h4 class="card-title mb-1">Reset Password</h4>
                        <p class="card-text mb-5">Your new password must be different from previously used passwords</p>
                        <form class="mt-2" id="nzform" action="#" data-action="<?=str_replace('index.php/','',current_url()).(!empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:'');?>" method="POST">
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between">
                                    <label for="npass">New Password</label>
                                </div>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"><i class="far fa-lock"></i></span>
                                    </div>
                                    <input class="form-control border-0 shadow-none fs-13" id="password" type="password" name="npass" placeholder="********" required aria-describedby="npass" autofocus="" tabindex="1" />
                                    <div class="input-group-append show-password">
                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye-slash"></i></span>
                                    </div>
                                </div>
                                <small class="form-text text-danger npass"></small>
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between">
                                    <label for="vpass">Confirm Password</label>
                                </div>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text bg-gray-01 border-0 text-muted fs-18"><i class="far fa-lock"></i></span>
                                    </div>
                                    <input class="form-control border-0 shadow-none fs-13" id="password" type="password" name="vpass" placeholder="********" required aria-describedby="vpass" tabindex="2" />
                                    <div class="input-group-append show-password">
                                        <span class="input-group-text bg-gray-01 border-0 text-body fs-18"><i class="far fa-eye-slash"></i></span>
                                    </div>
                                </div>
                                <small class="form-text text-danger vpass"></small>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="nzform-submit" tabindex="3">Set New Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>