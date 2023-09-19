<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Buyer'); ?></th>
                                <th><?php echo app('translator')->get('Employees'); ?></th>
                                <th><?php echo app('translator')->get('Order Number'); ?></th>
                                <th><?php echo app('translator')->get('Delivery Date'); ?></th>
                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                <th><?php echo app('translator')->get('Working Status'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr <?php if($loop->odd): ?> class="table-light" <?php endif; ?>>
                                <td data-label="<?php echo app('translator')->get('Buyer'); ?>">
                                    <span class="font-weight-bold"><?php echo e($booking->user->fullname); ?></span>
                                    <br>
                                    <span class="small">
                                    <a href="<?php echo e(route('admin.users.detail', $booking->user_id)); ?>"><span>@</span><?php echo e($booking->user->username); ?></a>
                                    </span>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Employees'); ?>">
                                    <span class="font-weight-bold"><?php echo e($booking->biding->user->fullname); ?></span>
                                    <br>
                                    <span class="small">
                                    <a href="<?php echo e(route('admin.users.detail', $booking->biding->user_id)); ?>"><span>@</span><?php echo e($booking->biding->user->username); ?></a>
                                    </span>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Order Number'); ?>"><span class="font-weight-bold"><?php echo e($booking->order_number); ?></span></td>

                                <td data-label="<?php echo app('translator')->get('Delivery Date'); ?>">
                                    <span class="font-weight-bold"><?php echo e(showDateTime($booking->created_at->addDays($booking->biding->job->delivery_time), ('d M Y'))); ?></span>
                                    <br>
                                    <?php echo e(diffforhumans($booking->created_at->addDays($booking->biding->job->delivery_time))); ?>

                                </td>

                                <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                    <span class="font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(getAmount($booking->amount)); ?></span>
                                </td>

                                <td data-label="<?php echo app('translator')->get("Working Status"); ?>">
                                    <?php if($booking->working_status == 0): ?>
                                        <span class="badge badge--primary"><?php echo app('translator')->get('Pending'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->updated_at)); ?>

                                    <?php elseif($booking->working_status == 1): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('Completed'); ?></span>
                                         <br>
                                         <?php echo e(diffforhumans($booking->updated_at)); ?>

                                    <?php elseif($booking->working_status == 2): ?>
                                        <span class="badge badge--dark"><?php echo app('translator')->get('Delivered'); ?></span>
                                         <br>
                                         <?php echo e(diffforhumans($booking->updated_at)); ?>

                                    <?php elseif($booking->working_status == 3): ?>
                                        <span class="badge badge--danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->updated_at)); ?>

                                    <?php elseif($booking->working_status == 4): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('In Progress'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->updated_at)); ?>

                                    <?php elseif($booking->working_status == 5): ?>
                                        <span class="badge badge--danger"><?php echo app('translator')->get('Expired'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->updated_at)); ?>

                                    <?php elseif($booking->working_status == 6): ?>
                                        <span class="badge badge--warning"><?php echo app('translator')->get('Dispute'); ?></span>
                                         <button class="btn-info btn-rounded text-white  badge disputeShow" data-dispute="<?php echo e($booking->dispute_report); ?>"><i class="fa fa-info"></i></button>
                                        <br>
                                        <?php echo e(diffforhumans($booking->updated_at)); ?>

                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get("Status"); ?>">
                                    <?php if($booking->status == 1): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('Running'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->status_updated_at)); ?>

                                    <?php elseif($booking->status == 2): ?>
                                        <span class="badge badge--warning"><?php echo app('translator')->get('Payable Both'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->status_updated_at)); ?>

                                    <?php elseif($booking->status == 3): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('Paid'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->status_updated_at)); ?>

                                    <?php elseif($booking->status == 4): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('Refund'); ?></span>
                                        <br>
                                        <?php echo e(diffforhumans($booking->status_updated_at)); ?>

                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="<?php echo e(route('admin.hire.details', $booking->id)); ?>" class="icon-btn" data-toggle="tooltip" title="" data-original-title="<?php echo app('translator')->get('Details'); ?>">
                                        <i class="las la-desktop text--shadow"></i>
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
                    <?php echo e(paginateLinks($bookings)); ?>

                </div>
            </div>
        </div>
    </div>


<div class="modal fade" id="disputeModalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="" lass="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Dispute Report'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <div class="modal-body">
                    <div class="dispute-detail">

                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('breadcrumb-plugins'); ?>
    <form action="<?php echo e(route('admin.hire.search', $scope ?? str_replace('admin.hire.', '', request()->route()->getName()))); ?>" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('Employees / Buyer'); ?>" value="<?php echo e($search ?? ''); ?>">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('script'); ?>
<script>
    'use strict';
    $('.disputeShow').on('click', function () {
        var modal = $('#disputeModalShow');
        var feedback = $(this).data('dispute');
        modal.find('.dispute-detail').html(`<p> ${feedback} </p>`);
        modal.modal('show');
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/hire/index.blade.php ENDPATH**/ ?>