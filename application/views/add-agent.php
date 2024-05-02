    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">Add New PM/Agent</h2>
            </div>
            <form class="form" method="post" action="#" data-action="<?=base_url('myaccount/add-agent/add');?>" enctype="multipart/form-data" id="nzform" autocomplete="off">
                <div class="row mb-6">
                    <div class="col-lg-4">
                        <div class="card mb-6">
                            <div class="card-body px-6 pt-6 pb-5">
                                <div class="row">
                                    <div class="col-sm-4 col-xl-12 col-xxl-7 mb-6">
                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Photo</h3>
                                        <p class="card-text">Upload agent profile photo.</p>
                                    </div>
                                    <div class="col-sm-8 col-xl-12 col-xxl-5">
                                        <img id="preview" src="<?=profilepic((isset($agents) && $agents != false)?$agents[0]->img:'300x300.png');?>" alt="<?=(isset($agents) && $agents != false)?$agents[0]->name:'My Profile';?>" class="w-100" style="border-radius: 50%;">
                                        <div class="custom-file mt-4 h-auto">
                                            <input type="file" class="custom-file-input" hidden id="customFile" accept="image/*" name="profile" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="btn btn-secondary btn-lg btn-block" for="customFile">
                                                <span class="d-inline-block mr-1"><i class="fal fa-cloud-upload"></i></span>Upload
                                                profile image</label>
                                        </div>
                                        <small class="text-default">Square images suits well, Ex: 300px X 300px</small>
                                        <small class="form-text text-danger property_type"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                    <div class="col-lg-8">
                        <div class="card mb-6">
                            <div class="card-body px-6 pt-6 pb-5">
                                <h3 class="card-title mb-0 text-heading fs-22 lh-15 pb-2">Contact information</h3>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="fullName" class="text-heading">Full Name</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->name:'';?>" id="fullName" name="name" placeholder="Full Name *">
                                        <small class="form-text text-danger name"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-6 px-4">
                                        <label for="email" class="text-heading">Email</label>
                                        <input type="email" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->email:'';?>" id="email" name="email" placeholder="Email *" <?=(isset($agents) && ($agents != false) && !empty($agents[0]->email))?'disabled':'';?> >
                                        <small class="form-text text-danger email"></small>
                                    </div>
                                    <div class="form-group col-md-6 px-4 mb-md-0">
                                        <label for="mobile" class="text-heading">Mobile</label>
                                        <input type="number" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->phone:'';?>" id="mobile" name="mobile" placeholder="Mobile">
                                        <small class="form-text text-danger mobile"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-6 col-lg-6 col-xxl-6 px-4">
                                        <label for="password" class="text-heading">New Password</label>
                                        <input type="password" class="form-control form-control-lg border" id="password" name="password">
                                        <small class="form-text text-danger password"></small>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xxl-6 px-4">
                                        <label for="confirmNewPassword" class="text-heading">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-lg border" id="confirmNewPassword" name="cpassword">
                                        <small class="form-text text-danger cpassword"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="about" class="text-heading">About</label>
                                        <textarea  class="form-control form-control-lg border" id="about" name="about" rows="3" ><?=(isset($agents) && $agents != false)?$agents[0]->about:'';?></textarea>
                                        <small class="form-text text-danger about"></small>
                                    </div>
                                </div>
                                    
                                    <div class="form-row mx-n4">
                                        <div class="form-group col-md-6 px-4">
                                            <label for="position" class="text-heading">Position</label>
                                            <input type="text" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->position:'';?>" id="position" name="position" placeholder="Position">
                                            <small class="form-text text-danger position"></small>
                                        </div>
                                        <div class="form-group col-md-6 px-4 mb-md-0">
                                            <label for="experience" class="text-heading">Experience</label>
                                            <div class="row">
                                                <?php if(isset($agents) && $agents != false) { $experience = !empty($agents[0]->experience)?explode('-',$agents[0]->experience):''; $exp_years = (is_array($experience) && !empty($experience))?$experience[0]:$agents[0]->experience; $exp_months =  (is_array($experience) && !empty($experience))?$experience[1]:''; } ?>
                                                <input type="number" class="form-control form-control-lg col-md-6 border" value="<?=(isset($agents) && ($agents != false) && isset($exp_years))?$exp_years:'';?>" id="exp_years" name="exp_years" placeholder="No. of Years">
                                                <small class="form-text text-danger exp_years"></small>
                                                <input type="number" class="form-control form-control-lg col-md-6 border" value="<?=(isset($agents) && ($agents != false) && isset($exp_months))?$exp_months:'';?>" id="exp_months" name="exp_months" placeholder="No. of Months">
                                                <small class="form-text text-danger exp_months"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mx-n4">
                                        <div class="form-group col-md-12 px-4">
                                            <label for="qualification" class="text-heading">Qualification</label>
                                            <textarea  class="form-control form-control-lg border" id="qualification" name="qualification" rows="2" placeholder="Enter qualifications seperated by commas(,)" ><?=(isset($agents) && $agents != false)?$agents[0]->qualification:'';?></textarea>
                                            <small class="form-text text-danger qualification"></small>
                                        </div>
                                    </div>
                                <?php if($logged['role'] != 'user'){ ?>
                                <?php if($languages = languages()){ ?>
                                    <div class="form-row mx-n4">
                                        <div class="form-group col-md-12 px-4 mb-md-0">
                                            <label for="languages" class="text-heading">Languages</label>
                                            <select class="form-control form-control-lg border selectpicker" id="language" data-live-search="true" multiple name="language[]">
                                                <?php foreach($languages as $key => $value){ ?>
                                                    <option value="<?=$key;?>" <?=((isset($agents) && ($agents != false) && ($agents[0]->languages != '')) && (in_array($key,explode(',',$agents[0]->languages))))?'selected':'';?>><?=$value;?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="form-text text-danger languages"></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <h3 class="card-title mb-0 mt-6 text-heading fs-22 lh-15">Social links</h3>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-6 px-4 mb-md-0">
                                        <label for="twitter" class="text-heading">Twitter</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->twitter:'';?>" id="twitter" name="twitter">
                                        <small class="form-text text-danger twitter"></small>
                                    </div>
                                    <div class="form-group col-md-6 px-4 mb-md-0">
                                        <label for="facebook" class="text-heading">Facebook</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->facebook:'';?>" id="facebook" name="facebook">
                                        <small class="form-text text-danger facebook"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-6 px-4">
                                        <label for="instagram" class="text-heading">Instagram</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->instagram:'';?>" id="instagram" name="instagram">
                                        <small class="form-text text-danger instagram"></small>
                                    </div>
                                    <div class="form-group col-md-6 px-4">
                                        <label for="linkedin" class="text-heading">Linkedin</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($agents) && $agents != false)?$agents[0]->linkedin:'';?>" id="linkedin" name="linkedin">
                                        <small class="form-text text-danger linkedin"></small>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end flex-wrap">
                    <a href="<?=base_url('myaccount/agents');?>" class="btn btn-lg bg-hover-white border rounded-lg mb-3">Back</a>
                    <button type="submit" class="btn btn-lg btn-primary ml-4 mb-3" id="nz-submit"><?=(isset($agents) && $agents != false)?'Update':'Submit';?></button>
                </div>
            </form>
        </div>
    </main>