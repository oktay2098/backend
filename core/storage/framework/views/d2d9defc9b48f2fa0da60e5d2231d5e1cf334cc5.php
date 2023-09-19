<?php $__env->startSection('panel'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Start Date'); ?></th>
                                <th><?php echo app('translator')->get('End Date'); ?></th>
                                <th><?php echo app('translator')->get('Category'); ?></th>
                                <th><?php echo app('translator')->get('Number of Referrals'); ?></th>
                             
                                <th><?php echo app('translator')->get('Profit'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Last Update'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Name'); ?>"><span class="font-weight-bold"><?php echo e(__($reward->name)); ?></span></td>
                                <td data-label="<?php echo app('translator')->get('Start Date'); ?>">
                                    <?php echo e($reward->start_date); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Start Date'); ?>">
                                    <?php echo e($reward->end_date); ?>

                                </td>

                                <td data-label="<?php echo app('translator')->get('Type'); ?>">

                                    <?php if($reward->reward_category == 1): ?>
                                    <span class="badge badge--success"><?php echo app('translator')->get('Publishing'); ?></span>
                                    <?php elseif($reward->reward_category == 2): ?>
                                    <span class="badge badge--danger"><?php echo app('translator')->get('Executing'); ?></span>
                                    <?php elseif($reward->reward_category == 3): ?>
                                    <span class="badge badge--primary"><?php echo app('translator')->get('Selling'); ?></span>
                                    <?php elseif($reward->reward_category == 4): ?>
                                    <span class="badge badge--warning"><?php echo app('translator')->get('Marketing'); ?></span>
                                    <?php elseif($reward->reward_category == 5): ?>
                                    <span class="badge badge--warning"><?php echo app('translator')->get('Referral'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($reward->number_of_referrals); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Value'); ?>">
                                    <span class="font-weight-bold">
                                        <?php if($reward->either_percent_or_fixed == 1): ?>
                                        <?php if($reward->profit!=0): ?>
                                        <?php echo e($general->cur_sym); ?><?php echo e(getAmount($reward->profit)); ?>

                                        <?php endif; ?>
                                        <?php else: ?>
                                        <?php echo e(getAmount($reward->profit)); ?> %
                                        <?php endif; ?>

                                    </span>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php if($reward->status == 1): ?>
                                    <span class="badge badge--success"><?php echo app('translator')->get('Enable'); ?></span>
                                    <?php else: ?>
                                    <span class="badge badge--danger"><?php echo app('translator')->get('Disabled'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Last Update'); ?>">
                                    <?php echo e(showDateTime($reward->updated_at)); ?> <br> <?php echo e(diffForHumans($reward->updated_at)); ?>

                                </td>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="javascript:void(0)" class="icon-btn btn--primary ml-1 updateReward" data-id="<?php echo e($reward->id); ?>" data-start_date="<?php echo e($reward->start_date); ?>" data-end_date="<?php echo e($reward->end_date); ?>" data-name="<?php echo e($reward->name); ?>" data-number_of_days="<?php echo e($reward->number_of_days); ?>" data-duration="<?php echo e($reward->duration); ?>" data-value="<?php echo e(getAmount($reward->value)); ?>" data-reward_category="<?php echo e($reward->reward_category); ?>" data-number_of_referrals="<?php echo e($reward->number_of_referrals); ?>" data-either_percent_or_fixed="<?php echo e($reward->either_percent_or_fixed); ?>" data-profit="<?php echo e($reward->profit); ?>" data-status="<?php echo e($reward->status); ?>">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteReward" data-id="<?php echo e($reward->id); ?>">
                                        <i class="las la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                            </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <?php echo e(paginateLinks($rewards)); ?>

            </div>
        </div>
    </div>
</div>


<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo app('translator')->get('Add Reward'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('admin.reward.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                        <input type="text" class="form-control form-control-lg" name="name" placeholder="<?php echo app('translator')->get(" Enter Name"); ?>"  required="">
                    </div>
                    <div class="form-group">
                        <label for="type" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Start Date'); ?></label>
                        <input type="date" class="form-control form-control-lg" id="start_date" name="start_date" placeholder="<?php echo app('translator')->get(" Enter Start Date"); ?>">
                    </div>
                    <div class="form-group">
                        <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('End Date'); ?></label>
                        <input type="date" class="form-control form-control-lg" id="end_date" name="end_date" placeholder="<?php echo app('translator')->get(" Enter End Date"); ?>">
                    </div>
                    <div class="form-group">
                        <label for="type" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Reward Category'); ?></label>
                        <select onchange="number_of_referrals_show(this.value)" name="reward_category" id="reward_category" class="form-control form-control-lg" required="">
                            <option><?php echo app('translator')->get('Select Reward Category'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Publishing'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Executing'); ?></option>
                            <option value="3"><?php echo app('translator')->get('Selling'); ?></option>
                            <option value="4"><?php echo app('translator')->get('Marketing'); ?></option>
                            <option value="5"><?php echo app('translator')->get('Referral'); ?></option>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="either_percent_or_fixed" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Reward Type'); ?></label>
                        <select  name="either_percent_or_fixed" id="either_percent_or_fixed" class="form-control form-control-lg" required="">
                            <option><?php echo app('translator')->get('Select Reward Type'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Fixed'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Percent'); ?></option>
                        </select>
                    </div>
                    <div  class="form-group">
                        <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Number of Referrals'); ?></label>
                        <input type="number" class="form-control form-control-lg" id="number_of_referrals" name="number_of_referrals" placeholder="<?php echo app('translator')->get(" Enter Number of Referrals"); ?>">
                    </div>
                    <div class="form-group">
                        <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Profit'); ?></label>
                        <input type="text" class="form-control form-control-lg" name="profit" placeholder="<?php echo app('translator')->get(" Enter Profit"); ?>" maxlength="40" required="">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                        <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="status">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <button type="submit" class="btn btn--primary"><i class="fa fa-fw fa-paper-plane"></i><?php echo app('translator')->get('Submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="updateRewardModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo app('translator')->get('Reward Update'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('admin.reward.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                        <input type="text" class="form-control form-control-lg" name="name" placeholder="<?php echo app('translator')->get(" Enter Name"); ?>"  required="">
                    </div>

                    <div class="form-group">
                        <label for="type" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Start Date'); ?></label>
                        <input type="date" class="form-control form-control-lg" id="start_date" name="start_date" placeholder="<?php echo app('translator')->get(" Enter Start Date"); ?>">
                    </div>
                    <div class="form-group">
                        <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('End Date'); ?></label>
                        <input type="date" class="form-control form-control-lg" id="end_date" name="end_date" placeholder="<?php echo app('translator')->get(" Enter End Date"); ?>">
                    </div>
                  
                    <div class="form-group">
                        <label for="type" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Reward Category'); ?></label>
                        <select  name="reward_category" id="reward_category" class="form-control form-control-lg" required="">
                            <option><?php echo app('translator')->get('Select Type'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Publishing'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Executing'); ?></option>
                            <option value="3"><?php echo app('translator')->get('Selling'); ?></option>
                            <option value="4"><?php echo app('translator')->get('Marketing'); ?></option>
                            <option value="5"><?php echo app('translator')->get('Referral'); ?></option>
                        </select>
                    </div>
                  


                    <div class="form-group">
                        <label for="either_percent_or_fixed" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Reward Type'); ?></label>
                        <select onchange="value_display_update(this.value)" name="either_percent_or_fixed" id="either_percent_or_fixed" class="form-control form-control-lg" required="">
                            <option><?php echo app('translator')->get('Select Type'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Fixed'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Percent'); ?></option>
                        </select>
                    </div>

                    <div  class="form-group">
                        <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Number of Referrals'); ?></label>
                        <input type="number" class="form-control form-control-lg" id="number_of_referrals" name="number_of_referrals" placeholder="<?php echo app('translator')->get(" Enter Number of Referrals"); ?>">
                    </div>

                    <div class="form-group">
                        <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Profit'); ?></label>
                        <input type="text" class="form-control form-control-lg" name="profit" placeholder="<?php echo app('translator')->get(" Enter Profit"); ?>" maxlength="40" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                        <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="status">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <button type="submit" class="btn btn--primary"><i class="fa fa-fw fa-paper-plane"></i><?php echo app('translator')->get('Update'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteReward" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Delete Reward Confirmation'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo e(route('admin.reward.delete')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field("POST"); ?>
                <input type="hidden" name="id">
                <div class="modal-body">
                    <p><?php echo app('translator')->get('Are you sure to delete this reward ?'); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <button type="submit" class="btn btn--success"><?php echo app('translator')->get('Confirm'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
<a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addPlan"><i class="las la-plus"></i><?php echo app('translator')->get('Add Reward'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    "use strict";

    function value_display(either_percent_or_fixed) {
        if (either_percent_or_fixed == 2) {
            $("#value_display_container").css("display", "block");
        } else {
            $("#value_display_container").css("display", "none");
        }
    }

    function value_display_update(either_percent_or_fixed) {
        if (either_percent_or_fixed == 2) {
            $("#value_display_container_update").css("display", "block");
        } else {
            $("#value_display_container_update").css("display", "none");
        }
    }

    function number_of_referrals_show(type) {
        if (type == 5) {
            $("#number_of_referrals_container").css("display", "block");
        } else {
            $("#number_of_referrals_container").css("display", "none");
        }
    }

    function display_number_of_days(duration) {
        if (duration == 4) {
            $("#number_of_days_container").css("display", "block");
        } else {
            $("#number_of_days_container").css("display", "none");
        }
    }

    function display_number_of_days_update(duration) {
        if (duration == 4) {
            $("#number_of_days_container_update").css("display", "block");
        } else {
            $("#number_of_days_container_update").css("display", "none");
        }
    }


    $('.addPlan').on('click', function() {
        $('#addModal').modal('show');
    });

    $('.updateReward').on('click', function() {
        var modal = $('#updateRewardModal');
        modal.find('input[name=id]').val($(this).data('id'));
        modal.find('input[name=name]').val($(this).data('name'));
        modal.find('input[name=number_of_days]').val($(this).data('number_of_days'));
        modal.find('input[name=start_date]').val($(this).data('start_date'));
        modal.find('input[name=end_date]').val($(this).data('end_date'));
        modal.find('select[name=duration]').val($(this).data('duration'));
        modal.find('select[name=reward_category]').val($(this).data('reward_category'));

        if ($(this).data('duration') == 4) {
            $("#number_of_days_container_update").css("display", "block");
        }
        if ($(this).data('reward_category') == 5) {
            $("#number_of_referrals_container_update").css("display", "block");
        }

        console.log($(this).data('duration'));
        modal.find('select[name=either_percent_or_fixed]').val($(this).data('either_percent_or_fixed'));
        modal.find('input[name=number_of_referrals]').val($(this).data('number_of_referrals'));
        modal.find('input[name=value]').val($(this).data('value'));
        modal.find('input[name=profit]').val($(this).data('profit'));
        var data = $(this).data('status');
        if (data == 1) {
            modal.find('input[name=status]').bootstrapToggle('on');
        } else {
            modal.find('input[name=status]').bootstrapToggle('off');
        }
        modal.modal('show');
    });

    $('.deleteReward').on('click', function() {
        var modal = $('#deleteReward');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/vendor/datepicker.en.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
<script>
    (function($) {
        'use strict';
        $('#start_date').datepicker();
        $('#end_date').datepicker();

    })(jQuery)
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/reward/index.blade.php ENDPATH**/ ?>