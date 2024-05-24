    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6">
            <div class="mb-6">
                <h2 class="mb-0 text-heading fs-22 lh-15">My Profile </h2>
            </div>
            <form class="form" method="post" action="#" data-action="<?=base_url('myaccount/profile/update');?>" enctype="multipart/form-data" id="nzform" autocomplete="off">
                <div class="row mb-6">
                    <div class="col-lg-4">
                        <div class="card mb-6">
                            <div class="card-body px-6 pt-6 pb-5">
                                <div class="row">
                                    <div class="col-sm-12 col-xl-12 col-xxl-12 mb-3">
                                        <h3 class="card-title mb-0 text-heading fs-22 lh-15">Photo</h3>
                                        <p class="card-text">Upload your <?=($logged['role'] == 'company')?'company logo':'profile image';?>.
                                        <br><span style="font-size: 10px;">Recommended resolution: 400px X <?=($logged['role'] == 'company')?'1':'4';?>00px</span></p>
                                        
                                    </div>
                                    <div class="col-sm-12 col-xl-12 col-xxl-12">
                                        <div style="padding:10px 5px; <?=(isset($me) && ($me != false) && !empty($me[0]->bgcolor))?'background-color: '.$me[0]->bgcolor:'';?>;margin-bottom: 10px; border-radius: 6px;">
                                            <img id="preview" src="<?=profilepic((isset($me) && $me != false)?$me[0]->img:'300x300.png');?>" alt="<?=(isset($me) && $me != false)?$me[0]->name:'My Profile';?>" class="w-100 h-100">
                                        </div>
                                        <div class="custom-file mt-4 h-auto">
                                            <input type="file" class="custom-file-input" hidden id="customFile" accept="image/*" name="profile" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="btn btn-secondary btn-lg btn-block" for="customFile">
                                                <span class="d-inline-block mr-1"><i class="fal fa-cloud-upload"></i></span>Upload
                                                <?=($logged['role'] == 'company')?'company logo':'profile image';?> </label>
                                        </div>
                                        <small class="form-text text-danger property_type"></small>
                                    </div>
                                <?php if($logged['role'] == 'company'){ ?>
                                    <div class="col-sm-12 col-xl-12 col-xxl-12 mb-6">
                                        <label for="companyBgcolor" class="text-heading">Choose your logo background color:</label>
                                        <input type="color" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->bgcolor:'';?>" id="companyBgcolor" name="companyBgcolor">
                                        <small class="form-text text-danger companyBgcolor"></small>
                                    </div>
                                <?php } ?>
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
                                        <label for="fullName" class="text-heading"><?=($logged['role'] == 'company')?'Company Name':'Full Name';?>*</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->name:'';?>" id="fullName" name="name" placeholder="Fullname">
                                        <small class="form-text text-danger name"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="email" class="text-heading">Email*</label>
                                        <input type="email" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->email:'';?>" id="email" name="email" placeholder="Email" readonly>
                                        <small class="form-text text-danger email"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="mobile" class="text-heading">Phone*</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->phone:'';?>" id="mobile" name="mobile" placeholder="Mobile">
                                        <small class="form-text text-danger mobile"></small>
                                    </div>
                                </div>
                                <input type="hidden" name="subject" value="profile" >
                                <?php if($logged['role'] == 'company'){ ?>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="fax" class="text-heading">Fax</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->fax:'';?>" id="fax" name="fax">
                                        <small class="form-text text-danger fax"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="website" class="text-heading">Website</label>
                                        <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->website:'';?>" id="website" name="website">
                                        <small class="form-text text-danger website"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="about" class="text-heading">About</label>
                                        <textarea  class="form-control form-control-lg border" id="about" name="about" rows="3" ><?=(isset($me) && $me != false)?$me[0]->about:'';?></textarea>
                                        <small class="form-text text-danger about"></small>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="about" class="text-heading">Address on Map</label>
                                        <input id="pac-input" class="controls" type="text" placeholder="Search Box" />
                                        <div id="map" data-position='{ "lat": <?=(isset($me) && $me != false && !empty($me[0]->latitude))?$me[0]->latitude:lnglat()[1];?>, "lng": <?=(isset($me) && $me != false && !empty($me[0]->longitude))?$me[0]->longitude:lnglat()[0];?> }' data-marker-draggable='true'></div>
                                        <div id="infowindow-content">
                                            <span id="place-name" class="title"></span><br />
                                            <span id="place-address"></span>
                                        </div>
                                        <!--<div id="geocoder" class="geocoder"></div>-->
                                        <!--<div id="map" class="mapbox-gl map-point-animate mt-6" style="height: 340px" data-mapbox-access-token="<?=mapbox_token;?>" data-mapbox-options='{"center":[<?=(isset($me) && $me != false && !empty($me[0]->longitude))?$me[0]->longitude:lnglat()[0];?>, <?=(isset($me) && $me != false && !empty($me[0]->latitude))?$me[0]->latitude:lnglat()[1];?>],"setLngLat":[<?=(isset($me) && $me != false && !empty($me[0]->longitude))?$me[0]->longitude:lnglat()[0];?>, <?=(isset($me) && $me != false && !empty($me[0]->latitude))?$me[0]->latitude:lnglat()[1];?>],"zoom":12}' data-mapbox-marker='[{"position":[<?=(isset($me) && $me != false && !empty($me[0]->longitude))?$me[0]->longitude:lnglat()[0];?>, <?=(isset($me) && $me != false && !empty($me[0]->latitude))?$me[0]->latitude:lnglat()[1];?>],"className":"marker","backgroundImage":"<?=pic('google-marker-07.png');?>","backgroundRepeat":"no-repeat","width":"50px","height":"50px"}]' data-marker-draggable='true'></div>-->
                                        <div class="form-row mx-n2 d-none">
                                            <div class="col-md-6 col-lg-6 col-xxl-12 px-2">
                                                <div class="form-group mb-md-0">
                                                    <label for="latitude" class="text-heading">Latitude </label>
                                                    <input type="text" class="form-control form-control-lg border" id="latitude" name="latitude" value="<?=(isset($me) && $me != false && !empty($me[0]->latitude))?$me[0]->latitude:lnglat()[1];?>">
                                                    <small class="form-text text-danger latitude"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xxl-6 px-2">
                                                <div class="form-group mb-md-0">
                                                    <label for="longitude" class="text-heading">Longitude</label>
                                                    <input type="text" class="form-control form-control-lg border" id="longitude" name="longitude" value="<?=(isset($me) && $me != false && !empty($me[0]->longitude))?$me[0]->longitude:lnglat()[0];?>">
                                                    <small class="form-text text-danger longitude"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mx-n4">
                                    <div class="form-group col-md-12 px-4">
                                        <label for="address" class="text-heading">Address*</label>
                                        <input type="text" class="form-control form-control-lg border" id="address" name="address" value="<?=(isset($me) && $me != false)?$me[0]->address:'';?>" >
                                        <small class="form-text text-danger address"></small>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($logged['role'] == 'agents'){ ?>
                                    <div class="form-row mx-n4">
                                        <div class="form-group col-md-12 px-4">
                                            <label for="about" class="text-heading">About</label>
                                            <textarea  class="form-control form-control-lg border" id="about" name="about" rows="3" ><?=(isset($me) && $me != false)?$me[0]->about:'';?></textarea>
                                            <small class="form-text text-danger about"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row mx-n4">
                                        <div class="form-group col-md-6 px-4">
                                            <label for="position" class="text-heading">Position</label>
                                            <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->position:'';?>" id="position" name="position" placeholder="Position">
                                            <small class="form-text text-danger position"></small>
                                        </div>
                                        <div class="form-group col-md-6 px-4 mb-md-0">
                                            <label for="experience" class="text-heading">Experience</label>
                                            <div class="row">
                                                <?php if(isset($me) && $me != false) { $experience = !empty($me[0]->experience)?explode('-',$me[0]->experience):''; $exp_years = (is_array($experience) && !empty($experience))?$experience[0]:$me[0]->experience; $exp_months =  (is_array($experience) && !empty($experience))?$experience[1]:''; } ?>
                                                <input type="number" class="form-control form-control-lg col-md-6 border" value="<?=(isset($me) && ($me != false) && isset($exp_years))?$exp_years:'';?>" id="exp_years" name="exp_years" placeholder="No. of Years">
                                                <small class="form-text text-danger exp_years"></small>
                                                <input type="number" class="form-control form-control-lg col-md-6 border" value="<?=(isset($me) && ($me != false) && isset($exp_months))?$exp_months:'';?>" id="exp_months" name="exp_months" placeholder="No. of Months">
                                                <small class="form-text text-danger exp_months"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mx-n4">
                                        <div class="form-group col-md-12 px-4">
                                            <label for="qualification" class="text-heading">Qualification</label>
                                            <textarea  class="form-control form-control-lg border" id="qualification" name="qualification" rows="2" placeholder="Enter qualifications seperated by commas(,)" >
                                                <?=(isset($me) && ($me != false) && !empty($me[0]->qualification))?$me[0]->qualification:'';?>
                                            </textarea>
                                            <small class="form-text text-danger qualification"></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if($logged['role'] != 'user'){ ?>
                                    <?php if($languages = languages()){ ?>
                                    <div class="form-row mx-n4">
                                        <!--<div class="form-group col-md-12 px-4 mb-md-0">-->
                                        <!--    <label for="languages" class="text-heading">Languages</label><br>-->
                                        <!--    <?php foreach($languages as $key => $value){ ?>-->
                                        <!--    <div class="form-check form-check-inline">-->
                                        <!--      <input class="form-check-input" type="checkbox" name="language[]" id="language-<?=$key;?>" value="<?=$key;?>" <?=((isset($me) && ($me != false) && ($me[0]->languages != '')) && (in_array($key,explode(',',$me[0]->languages))))?'checked':'';?> >-->
                                        <!--      <label class="form-check-label" for="language-<?=$key;?>"><?=$value;?></label>-->
                                        <!--      <small class="form-text text-danger languages"></small>-->
                                        <!--    </div>-->
                                        <!--    <?php } ?>-->
                                        <!--</div>-->
                                        <div class="form-group col-md-12 px-4 mb-md-0">
                                            <label for="languages" class="text-heading">Language</label>
                                            <select class="form-control form-control-lg border selectpicker" id="language" data-live-search="true" multiple name="language[]">
                                                <?php foreach($languages as $key => $value){ ?>
                                                    <option value="<?=$key;?>" <?=((isset($me) && ($me != false) && ($me[0]->languages != '')) && (in_array($key,explode(',',$me[0]->languages))))?'selected':'';?>><?=$value;?></option>
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
                                            <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->twitter:'';?>" id="twitter" name="twitter">
                                            <small class="form-text text-danger twitter"></small>
                                        </div>
                                        <div class="form-group col-md-6 px-4 mb-md-0">
                                            <label for="facebook" class="text-heading">Facebook</label>
                                            <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->facebook:'';?>" id="facebook" name="facebook">
                                            <small class="form-text text-danger facebook"></small>
                                        </div>
                                    </div>
                                    <div class="form-row mx-n4">
                                        <div class="form-group col-md-6 px-4">
                                            <label for="instagram" class="text-heading">Instagram</label>
                                            <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->instagram:'';?>" id="instagram" name="instagram">
                                            <small class="form-text text-danger instagram"></small>
                                        </div>
                                        <div class="form-group col-md-6 px-4">
                                            <label for="linkedin" class="text-heading">Linkedin</label>
                                            <input type="text" class="form-control form-control-lg border" value="<?=(isset($me) && $me != false)?$me[0]->linkedin:'';?>" id="linkedin" name="linkedin">
                                            <small class="form-text text-danger linkedin"></small>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="d-flex justify-content-end flex-wrap">
                                    <button type="submit" name="subject" value="profile" class="btn btn-lg btn-primary ml-4 mb-3" id="nz-submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="form" method="post" action="#" data-action="<?=base_url('myaccount/profile/update');?>" enctype="multipart/form-data" id="nzform" autocomplete="off">
                <div class="row mb-6">
                    <div class="col-lg-12">
                        <div class="card mb-6">
                            <div class="card-body px-6 pt-6 pb-5">
                                <h3 class="card-title mb-0 text-heading fs-22 lh-15 pb-2">Change password</h3>
                                <div class="row mb-4">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                    <div class="form-group col-md-4 mb-md-0">
                                        <label for="oldPassword" class="text-heading">Old Password</label>
                                        <input type="password" class="form-control form-control-lg border" id="oldPassword" name="oldpassword">
                                        <small class="form-text text-danger oldpassword"></small>
                                    </div>
                                    <div class="form-group col-md-4 mb-md-0">
                                        <label for="newPassword" class="text-heading">New Password</label>
                                        <input type="password" class="form-control form-control-lg border" id="newPassword" name="password">
                                        <small class="form-text text-danger password"></small>
                                    </div>
                                    <div class="form-group col-md-4 mb-md-0">
                                        <label for="confirmNewPassword" class="text-heading">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-lg border" id="confirmNewPassword" name="cpassword">
                                        <small class="form-text text-danger cpassword"></small>
                                    </div>
                                    <input type="hidden" name="subject" value="changepassword" >
                                </div>
                                <div class="form-group mb-md-0 text-right">
                                    <button type="submit" class="btn btn-lg btn-primary" id="nz-submit">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>