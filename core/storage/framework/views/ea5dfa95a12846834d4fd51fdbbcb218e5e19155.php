<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php echo $__env->make($activeTemplate . 'partials.buyer_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <div class="table-section">
                        <div class="row mb-10">
                            <div class="col-lg-6 col-sm-6">
                                <h2 class="page-title" style="font-size: 1.125rem;
                                        display: inline-block;">Purchases</h2> > Product Buyer
                            </div>
                            <div class="col-xl-6">
                                <ul class="nav nav-pills nav-fill"
                                    style="padding: 10px 10px 10px 10px; border: 1px solid; border-radius: 5px;">
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo e(request()->routeIs('user.buyer.hire.employ') || request()->routeIs('user.buyer.hire.employ.details') ? 'active' : ''); ?>" href="<?php echo e(route('user.buyer.hire.employ')); ?>">Staff List</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('user.buyer.service.booked') || request()->routeIs('booked.service.details') ? 'active' : ''); ?>" href="<?php echo e(route('user.buyer.service.booked')); ?>">Reserved Services</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('user.software.purchases') ? 'active' : ''); ?>" href="<?php echo e(route('user.software.purchases')); ?>">Product Buyer</a>
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
                                                <th><?php echo app('translator')->get('Seller'); ?></th>
                                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                                <th><?php echo app('translator')->get('Discount'); ?></th>
                                                <!-- <th><?php echo app('translator')->get('Product'); ?></th> -->
                                                <!-- <th><?php echo app('translator')->get('Document'); ?></th> -->
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $softwarePurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $softwarePurchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Service'); ?>" class="text-start">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage('assets/images/software/'.$softwarePurchase->software->image,'590x300')); ?>" alt="<?php echo app('translator')->get('Service Image'); ?>">
                                                            </div>
                                                            <div class="content"><a href="<?php echo e(route('software.details', [slug($softwarePurchase->software->title), encrypt($softwarePurchase->software->id)])); ?>"><?php echo e(__(str_limit($softwarePurchase->software->title, 10))); ?></a></div>
                                                        </div>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Order Number'); ?>"><?php echo e(__($softwarePurchase->order_number)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Seller'); ?>">
                                                    	 <span class="font-weight-bold"><?php echo e(__(@$softwarePurchase->software->user->fullname)); ?></span>
					                                    <br>
					                                    <span class="text--info">
					                                    <a href="<?php echo e(route('profile',@$softwarePurchase->software->user->username)); ?>"><span>@</span><?php echo e($softwarePurchase->software->user->username); ?></a>
					                                    </span>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                                        <?php if($softwarePurchase->software->product_type==1): ?>
                                                        <?php echo e(showAmount($softwarePurchase->product_verity_amount * $softwarePurchase->qty)); ?> <?php echo e(__($general->cur_text)); ?>

                                                        <?php else: ?>
                                                        <?php echo e(showAmount($softwarePurchase->amount)); ?> <?php echo e(__($general->cur_text)); ?>

                                                        <?php endif; ?>
                                                    </td>

                                                     <td data-label="<?php echo app('translator')->get('Discount'); ?>">
                                                        <?php if($softwarePurchase->discount == 0): ?>
                                                            <span><?php echo app('translator')->get('N/A'); ?></span>
                                                        <?php else: ?>
                                                            <?php echo e(showAmount($softwarePurchase->discount)); ?> <?php echo e(__($general->cur_text)); ?>

                                                        <?php endif; ?>
                                                        </td>

                                                     <!-- <td data-label="<?php echo app('translator')->get('Product'); ?>">
                                                         
                                                         <a href="<?php echo e(route('user.software.file.download', encrypt($softwarePurchase->software->id))); ?>" class="btn btn--primary text-white"><i class="las la-arrow-down"></i></a>
                                                         
                                                     </td> -->

                                                     <!-- <td data-label="<?php echo app('translator')->get('Document'); ?>">
                                                         
                                                         <a href="<?php echo e(route('user.software.document.download', encrypt($softwarePurchase->software->id))); ?>" class="btn btn--primary text-white"><i class="las la-arrow-down"></i></a>
                                                         
                                                     </td> -->
                                                    <?php if($softwarePurchase->software->product_type==1): ?>
                                                    <td data-label="<?php echo app('translator')->get('Working Status'); ?>">
                                                    	<?php if($softwarePurchase->working_status == 0): ?>
                                                    		<span class="badge badge--primary"><?php echo app('translator')->get('Pending'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($softwarePurchase->updated_at)); ?>

                                                    	<?php elseif($softwarePurchase->working_status == 1): ?>
                                                    		<span class="badge badge--success"><?php echo app('translator')->get('Delivery'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($softwarePurchase->updated_at)); ?>

                                                    	<?php elseif($softwarePurchase->working_status == 2): ?>
                                                    		<span class="badge badge--secondary"><?php echo app('translator')->get('Delivered'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($softwarePurchase->updated_at)); ?>

                                                    	<?php elseif($softwarePurchase->working_status == 3): ?>
                                                    		<span class="badge badge--danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($softwarePurchase->updated_at)); ?>

                                                    	<?php elseif($softwarePurchase->working_status == 4): ?>
                                                    		<span class="badge badge--info"><?php echo app('translator')->get('In Progress'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($softwarePurchase->updated_at)); ?>

                                                    	<?php elseif($softwarePurchase->working_status == 5): ?>
                                                    		<span class="badge badge--danger"><?php echo app('translator')->get('Delivery Expired'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($softwarePurchase->updated_at)); ?>

                                                    	<?php elseif($softwarePurchase->working_status == 6): ?>

                                                    		<span class="badge badge--warning"><?php echo app('translator')->get('Dispute'); ?></span>
                                                            <button class="btn-info btn-rounded text-white  badge disputeShow" data-dispute="<?php echo e($softwarePurchase->dispute_report); ?>"><i class="fa fa-info"></i></button>
                                                            <br>
                                                            <?php echo e(diffforhumans($softwarePurchase->updated_at)); ?>

                                                    	<?php endif; ?>
                                                    </td>
                                                    <?php else: ?>

                                                     <td data-label="<?php echo app('translator')->get('Status'); ?>">
			                                            <?php if($softwarePurchase->status == 3): ?>
			                                                <span class="badge badge--success"><?php echo app('translator')->get('Paid'); ?></span>
                                                            <br>
                                                            <span><?php echo e(diffforhumans($softwarePurchase->updated_at)); ?></span>
			                                            <?php else: ?>
			                                                <span class="badge badge--danger"><?php echo app('translator')->get('N/A'); ?></span>
			                                            <?php endif; ?>
                                                    </td>
                                                    <?php endif; ?>

                                                    <td data-label="Action">
                                                        <a href="<?php echo e(route('user.booked.product.details', encrypt($softwarePurchase->id))); ?>" class="btn btn--primary text-white ms-1"><i class="las la-desktop"></i></a>
                                                        <?php if($softwarePurchase->software->product_type==1): ?>
                                                            <?php if($softwarePurchase->working_status ==0): ?>
                                                                <a href="javascript:void(0)" class="btn btn--success text-white approvedBtnPending ms-1"  data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#approvedModalPending"><i class="las la-check"></i></a>
                                                                <a href="javascript:void(0)" class="btn btn--danger text-white cancelBtnPending ms-1"  data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#cancelModalPending"><i class="las la-times"></i></a>
                                                            <?php endif; ?>
                                                            <?php if($softwarePurchase->working_status ==1): ?>
                                                                <a href="javascript:void(0)" class="btn btn--success text-white approvedBtnDelivered ms-1" data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#approvedModalDelivered"><i class="las la-check"></i></a>
                                                                <a href="javascript:void(0)" class="btn btn--danger text-white cancelBtnComplete ms-1"  data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#cancelModalComplete"><i class="las la-times"></i></a>
                                                            <?php endif; ?>
                                                            <?php if($softwarePurchase->working_status ==2): ?>
                                                                <a href="javascript:void(0)" class="btn btn--success text-white approvedBtnDelivered ms-1"  data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#approvedModalDelivered"><i class="las la-check"></i></a>
                                                                <a href="javascript:void(0)" class="btn btn--danger text-white cancelBtnDelivered ms-1"  data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#cancelModalDelivered"><i class="las la-times"></i></a>
                                                            <?php endif; ?>

                                                            <?php if($softwarePurchase->working_status ==5): ?>
                                                                <a href="javascript:void(0)" class="btn btn--success text-white approvedBtnExpire ms-1"  data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#approvedModalExpire"><i class="las la-check"></i></a>
                                                                <a href="javascript:void(0)" class="btn btn--danger text-white cancelBtnExpire ms-1"  data-booking_id="<?php echo e($softwarePurchase->id); ?>" data-bs-toggle="modal" data-bs-target="#cancelModalExpire"><i class="las la-times"></i></a>
                                                            <?php endif; ?>
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
                                    <?php echo e($softwarePurchases->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="approvedModalPending" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <p><?php echo app('translator')->get('It is not possible to confirm that the product has arrived before the seller approve the order'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <!--  <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Submit'); ?></button> -->
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModalPending" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Cancel Order Confirmation'); ?></h4>
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
<div class="modal fade" id="approvedModalComplete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <p><?php echo app('translator')->get('It is not possible to confirm that the product has arrived before the seller approve the order'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <!--  <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Submit'); ?></button> -->
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModalComplete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <p><?php echo app('translator')->get('You can not cancel the order because product is being delivered'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                         <!-- <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Submit'); ?></button> -->
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="approvedModalDelivered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Approval Order Delivery Confirmation'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" action="<?php echo e(route('user.product_delivered.confirm')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id">
                    <input type="hidden" name="confirm" value="approved">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to approved this product has delivered'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                         <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModalDelivered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <p><?php echo app('translator')->get('You can not cancel the order because product is being delivered'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <!-- <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Submit'); ?></button> -->
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="modal fade" id="approvedModalExpire" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Approval Order Delivered Confirmation'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" action="<?php echo e(route('user.product_delivered.confirm')); ?>">
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

<div class="modal fade" id="cancelModalExpire" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
    $('.approvedBtnPending').on('click', function () {
        var modal = $('#approvedModalPending');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.cancelBtnPending').on('click', function () {
        var modal = $('#cancelModalPending');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.approvedBtnComplete').on('click', function () {
        var modal = $('#approvedModalComplete');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.cancelBtnComplete').on('click', function () {
        var modal = $('#cancelModalComplete');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.approvedBtnDelivered').on('click', function () {
        var modal = $('#approvedModalDelivered');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.cancelBtnDelivered').on('click', function () {
        var modal = $('#cancelModalDelivered');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.approvedBtnExpire').on('click', function () {
        var modal = $('#approvedModalExpire');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    $('.cancelBtnExpire').on('click', function () {
        var modal = $('#cancelModalExpire');
        modal.find('input[name=booking_id]').val($(this).data('booking_id'))
        modal.modal('show');
    });

    
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/buyer/software_purchases.blade.php ENDPATH**/ ?>