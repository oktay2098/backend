<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php echo $__env->make($activeTemplate . 'partials.seller_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <div class="table-section">
                        <div class="row mb-10">
                            <div class="col-lg-6 col-sm-6">
                                <h2 class="page-title" style="font-size: 1.125rem;
                                        display: inline-block;">Sales</h2>
                            </div>
                            <div class="col-xl-6">
                                <ul class="nav nav-pills nav-fill"
                                    style="padding: 10px 10px 10px 10px; border: 1px solid; border-radius: 5px;">
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(request()->routeIs('user.booking.service') || request()->routeIs('user.booking.service.details') ? 'active' : ''); ?>" href="<?php echo e(route('user.booking.service')); ?>">Reserved Services</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('user.software.sales') ? 'active' : ''); ?>" href="<?php echo e(route('user.software.sales')); ?>">Product Sales</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('user.job.vacancy') || request()->routeIs('user.seller.job.list.details') ? 'open' : ''); ?>" href="<?php echo e(route('user.job.vacancy')); ?>">Job List</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="table-area">
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('Product'); ?></th>
                                                <th><?php echo app('translator')->get('Order Number'); ?></th>
                                                <th><?php echo app('translator')->get('Buyer'); ?></th>
                                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                                <th><?php echo app('translator')->get('Discount'); ?></th>
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $salesSoftwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Product'); ?>" class="text-start">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage('assets/images/software/'.$booking->software->image,'590x300')); ?>" alt="<?php echo app('translator')->get('Product Image'); ?>">
                                                            </div>
                                                            <div class="content"><a href="<?php echo e(route('software.details', [slug($booking->software->title), encrypt($booking->software->id)])); ?>"><?php echo e(__(str_limit($booking->software->title, 20))); ?></a></div>
                                                        </div>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Order Number'); ?>"><?php echo e(__($booking->order_number)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Buyer'); ?>">
                                                    	 <span class="font-weight-bold"><?php echo e(__($booking->user->fullname)); ?></span>
					                                    <br>
					                                    <span class="text--info">
					                                    <a href="<?php echo e(route('profile',@$booking->user->username)); ?>"><span>@</span><?php echo e($booking->user->username); ?></a>
					                                    </span>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>"><?php echo e(showAmount($booking->amount)); ?> <?php echo e(__($general->cur_text)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Discount'); ?>">
                                                        <?php if($booking->discount == 0): ?>
                                                            <span><?php echo app('translator')->get('N/A'); ?></span>
                                                        <?php else: ?>
                                                            <?php echo e(showAmount($booking->discount)); ?> <?php echo e(__($general->cur_text)); ?>

                                                        <?php endif; ?>
                                                    </td>

                                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                        <?php if($booking->status == 3): ?>
                                                            <?php if($booking->working_status==1): ?>
                                                            <span class="badge badge--warning"><?php echo app('translator')->get('Need Shipping'); ?></span>
                                                             <br>
                                                            <span><?php echo e(diffforhumans($booking->updated_at)); ?></span>
                                                            <?php else: ?>
                                                            <span class="badge badge--success"><?php echo app('translator')->get('Paid'); ?></span>
                                                             <br>
                                                            <span><?php echo e(diffforhumans($booking->updated_at)); ?></span>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <span class="badge badge--danger"><?php echo app('translator')->get('N/A'); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td data-label="Action">
                                                        <a href="<?php echo e(route('user.booking.product.details', encrypt($booking->id))); ?>" class="btn btn--primary text-white ms-1"><i class="las la-desktop"></i></a>
                                                        <?php if($booking->working_status==0): ?>
                                                            <a href="javascript:void(0)" class="btn btn--success text-white approvedBtn ms-1" data-booking_id="<?php echo e($booking->id); ?>" data-bs-toggle="modal" data-bs-target="#approvedModal"><i class="las la-check"></i></a>
                                                            <a href="javascript:void(0)" class="btn btn--danger text-white cancelBtn ms-1" data-booking_id="<?php echo e($booking->id); ?>" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="las la-times"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php echo e($salesSoftwares->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="approvedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Approval Booking Confirmation'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" action="<?php echo e(route('user.product_booking.confirm')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id">
                    <input type="hidden" name="confirm" value="approved">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to approved this product'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                         <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
        </div>
    </div>
</div>



<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Cancel Booking Confirmation'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" action="<?php echo e(route('user.product_booking.confirm')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id">
                     <input type="hidden" name="confirm" value="cancel">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to cancel this product'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                         <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    'use strict';
    $('.approvedBtn').on('click', function () {
        var modal = $('#approvedModal');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.cancelBtn').on('click', function () {
        var modal = $('#cancelModal');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    
</script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/seller/sales_software.blade.php ENDPATH**/ ?>