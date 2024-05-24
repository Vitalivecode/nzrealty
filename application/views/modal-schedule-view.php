                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-3">
                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                                                        <div class="card-body p-3">
                                                        <!--    <h3 class="card-title mb-5 text-heading fs-22 lh-15">Scheduling Detail</h3>     -->
                                                                <div class="row mb-2" id="schedule-form" data-action="<?=base_url('myaccount/propertyschedulesadd/'.$id);?>" method="post">
                                                                    <div class="col-md-3">
                                                                        <label for="sdate" class="text-heading">Date</label>
                                                                        <input type="date" class="form-control form-control-lg border-0" min="<?=date('Y-m-d');?>" id="sdate" name="sdate">
                                                                        <small class="form-text text-danger sdate"></small>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="sfrom" class="text-heading">From</label>
                                                                        <input type="time" class="form-control form-control-lg border-0" id="sfrom" name="sfrom">
                                                                        <small class="form-text text-danger sfrom"></small>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="sto" class="text-heading">To</label>
                                                                        <input type="time" class="form-control form-control-lg border-0" id="sto" name="sto">
                                                                        <small class="form-text text-danger sto"></small>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="sto" class=""> &nbsp; </label>
                                                                        <button type="button" id="addschedule" class="btn btn-primary btn-lg col-12">Add</button>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card mb-3">
                                                        <div class="card-body p-3">
                                                            <h3 class="card-title mb-5 text-heading fs-16">Your Scheduling Times</h3>
                                                            <div class="table-responsive">
                                                                <table id="addedSchedules-list" class="table table-hover bg-white border rounded-lg">
                                                                    <thead class="thead-sm thead-black">
                                                                        <tr>
                                                                            <th scope="col" class="border-top-0 pt-3 pb-3 text-center">Date</th>
                                                                            <th scope="col" class="border-top-0 pt-3 pb-3 text-center">Timings</th>
                                                                            <th scope="col" class="border-top-0 pt-3 pb-3 text-center">Cancel Viewing</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if(isset($schedules) && $schedules != false){ foreach($schedules as $schedule){ ?>
                                                                        <tr class="shadow-hover-xs-2 bg-hover-white">
                                                                            <td class="align-middle text-center py-3"><?=date('d F, Y', strtotime($schedule->date));?></td>
                                                                            <td class="align-middle text-center"><?=date('h:ia', strtotime($schedule->from_time));?> - <?=date('h:ia', strtotime($schedule->to_time));?></td>
                                                                            <td class="align-middle text-center">
                                                                                <?php if($schedule->status == 0){ ?>
                                                                                    <p class="text-danger"><?=$schedule->reason;?></p>
                                                                                <?php } else{ ?>
                                                                                    <a href="javascript:void(0);" title="Cancel Viewing" class="d-inline-block fs-18 text-muted hover-primary delete-schedule" data-property="<?=$id;?>" data-id="<?=$schedule->sno;?>"><i class="fal fa-trash-alt"></i></a>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>