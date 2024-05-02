    <main id="content" class="bg-gray-01">
        <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-6 agents-listing">
            <div class="d-flex flex-wrap flex-md-nowrap mb-6">
                <div class="mr-0 mr-md-auto">
                    <h2 class="mb-0 text-heading fs-22 lh-15">PMs & Agents<span class="badge badge-white badge-pill text-primary fs-18 font-weight-bold ml-2"><?=($agents != false)?count($agents):0;?></span></h2>
                </div>
            </div>
            <div class="table-responsive">
                <table id="agents-list" class="table table-hover bg-white border rounded-lg">
                    <thead>
                        <tr role="row">
                            <th class="py-3">Fullname</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Mobile</th>
                            <th class="py-3">Registered On</th>
                            <th class="py-3">Status</th>
                            <th class="no-sort py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($agents != false){ foreach($agents as $agent){ ?>
                        <tr role="row">
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="<?=$agent->name;?>" class="img-fluid rounded-circle w-30px" src="<?=profilepic($agent->img);?>">
                                    </div>
                                    <p class="align-self-center mb-0 user-name"><?=$agent->name;?></p>
                                </div>
                            </td>
                            <td class="align-middle"><span class="text-primary pr-1"><a href="mailto:<?=$agent->email;?>"><i class="fal fa-envelope"></i></span></a> <?=$agent->email;?></td>
                            <td class="align-middle"><span class="text-primary pr-1"><a href="tel:<?=$agent->phone;?>"><i class="fal fa-mobile"></i></span></a> <?=$agent->phone;?></td>
                            <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span><?=date('d M, Y', strtotime($agent->created_date));?></td>
                            <td class="align-middle"><span class="badge badge-<?=($agent->status == 1)?'green':'yellow';?> text-capitalize"><?=($agent->status == 1)?'Active':'Inactive';?></span></td>
                            <td class="align-middle">
                                <a href="<?=base_url('myaccount/edit-agent/'.$agent->sno);?>" data-toggle="tooltip" title="Edit" class="d-inline-block fs-18 text-muted hover-primary mr-5"><i class="fal fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" <?=($agent->status == 1)?'data-url="'.base_url('myaccount/deleteagent/'.$agent->sno).'"':'';?> data-toggle="tooltip" title="<?=($agent->status == 1)?'Click to inactive':'To activate contact support@rentallistings.co.nz';?>" class="<?=($agent->status == 1)?'agent-inactive':'';?> d-inline-block fs-18 text-muted hover-primary"><?=($agent->status == 1)?'<i class="far fa-user-times"></i>':'<i class="fas fa-user-check"></i>';?></a>
                            </td>
                        </tr>
                        <?php } } else { ?>
                        <tr class="shadow-hover-xs-2 bg-hover-white">
                          <td class="align-middle pt-6 pb-4 px-6 text-center" colspan="6">
                              No data found
                          </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>