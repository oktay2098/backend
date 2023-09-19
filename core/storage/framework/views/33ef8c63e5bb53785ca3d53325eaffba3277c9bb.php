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
                                <th><?php echo app('translator')->get('Seller'); ?></th>
                                <th><?php echo app('translator')->get('Order Number'); ?></th>
                                <th><?php echo app('translator')->get('Discount'); ?></th>
                                <th><?php echo app('translator')->get('Software'); ?></th>
                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                <th><?php echo app('translator')->get('Document'); ?></th>
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

                                <td data-label="<?php echo app('translator')->get('Seller'); ?>">
                                    <span class="font-weight-bold"><?php echo e($booking->software->user->fullname); ?></span>
                                    <br>
                                    <span class="small">
                                    <a href="<?php echo e(route('admin.users.detail', $booking->software->user_id)); ?>"><span>@</span><?php echo e($booking->software->user->username); ?></a>
                                    </span>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Order Number'); ?>">
                                    <span class="font-weight-bold"><?php echo e($booking->order_number); ?></span>
                                </td>


                                <td data-label="<?php echo app('translator')->get('Discount'); ?>">
                                    <?php if($booking->discount != 0): ?>
                                        <span class="font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(getAmount($booking->discount)); ?></span>
                                    <?php else: ?>
                                         <span class="font-weight-bold"><?php echo app('translator')->get('N/A'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Software'); ?>">
                                    <a href="<?php echo e(route('admin.software.file.download', encrypt($booking->software->id))); ?>" class="icon-btn"><i class="las la-arrow-down"></i></a>
                                </td>

                                 <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                    <?php if($booking->software->product_type==1): ?>
                                    <span class="font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(getAmount(($booking->product_verity_amount)*($booking->qty))); ?></span>
                                    <?php else: ?>
                                    <span class="font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(getAmount($booking->amount)); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Document'); ?>">
                                    <a href="<?php echo e(route('admin.software.document.download', encrypt($booking->software->id))); ?>" class="icon-btn"><i class="las la-arrow-down"></i></a>
                                </td>

                                <td data-label="<?php echo app('translator')->get("Status"); ?>">
                                    <?php if($booking->status == 3): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('Paid'); ?></span>
                                        <br>
                                        <span><?php echo e(diffforhumans($booking->updated_at)); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge--danger"><?php echo app('translator')->get('N/A'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="<?php echo e(route('admin.software.details', $booking->software->id)); ?>" class="icon-btn" data-toggle="tooltip" title="" data-original-title="<?php echo app('translator')->get('Details'); ?>">
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
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    <?php echo e(paginateLinks($bookings)); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('breadcrumb-plugins'); ?>
    <form action="<?php echo e(route('admin.sales.software.search')); ?>" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('Buyer / Seller'); ?>" value="<?php echo e($search ?? ''); ?>">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/sales/index.blade.php ENDPATH**/ ?>