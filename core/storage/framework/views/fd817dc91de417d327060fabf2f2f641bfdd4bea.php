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
                                        display: inline-block;">Purchases</h2> > Staff List
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
                                                <th><?php echo app('translator')->get('Job'); ?></th>
                                                <th><?php echo app('translator')->get('Order Number'); ?></th>
                                                <th><?php echo app('translator')->get('Employ'); ?></th>
                                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                                <th><?php echo app('translator')->get('Working Status'); ?></th>
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $hireEmploys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hireEmploy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Job'); ?>" class="text-start">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage('assets/images/job/'.$hireEmploy->biding->job->image,'590x300')); ?>" alt="<?php echo app('translator')->get('Job Image'); ?>">
                                                            </div>
                                                            <div class="content"><a href=""><?php echo e(__(str_limit($hireEmploy->biding->title, 20))); ?></a></div>
                                                        </div>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Order Number'); ?>"><?php echo e(__($hireEmploy->order_number)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Employ'); ?>">
                                                    	 <span class="font-weight-bold"><?php echo e(__(@$hireEmploy->biding->user->fullname)); ?></span>
					                                    <br>
					                                    <span class="text--info">
					                                    <a href="<?php echo e(route('profile',@$hireEmploy->biding->user->username)); ?>"><span>@</span><?php echo e($hireEmploy->biding->user->username); ?></a>
					                                    </span>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>"><?php echo e(showAmount($hireEmploy->amount)); ?> <?php echo e(__($general->cur_text)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Working Status'); ?>">
                                                    	<?php if($hireEmploy->working_status == 0): ?>
                                                    		<span class="badge badge--primary"><?php echo app('translator')->get('Pending'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->updated_at)); ?>

                                                    	<?php elseif($hireEmploy->working_status == 1): ?>
                                                    		<span class="badge badge--success"><?php echo app('translator')->get('Completed'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->updated_at)); ?>

                                                    	<?php elseif($hireEmploy->working_status == 2): ?>
                                                    		<span class="badge badge--secondary"><?php echo app('translator')->get('Delivered'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->updated_at)); ?>

                                                    	<?php elseif($hireEmploy->working_status == 3): ?>
                                                    		<span class="badge badge--danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->updated_at)); ?>

                                                    	<?php elseif($hireEmploy->working_status == 4): ?>
                                                    		<span class="badge badge--info"><?php echo app('translator')->get('In Progress'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->updated_at)); ?>

                                                    	<?php elseif($hireEmploy->working_status == 5): ?>
                                                    		<span class="badge badge--danger"><?php echo app('translator')->get('Delivery Expired'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->updated_at)); ?>

                                                    	<?php elseif($hireEmploy->working_status == 6): ?>
                                                    		<span class="badge badge--warning"><?php echo app('translator')->get('Dispute'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->updated_at)); ?>

                                                    	<?php endif; ?>
                                                    </td>
                                                     <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                    	<?php if($hireEmploy->status == 1): ?>
                                                            <span class="badge badge--success"><?php echo app('translator')->get('Running'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->status_updated_at)); ?>

                                                        <?php elseif($hireEmploy->status == 2): ?>
                                                            <span class="badge badge--warning"><?php echo app('translator')->get('Payable Both'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->status_updated_at)); ?>

                                                        <?php elseif($hireEmploy->status == 3): ?>
                                                            <span class="badge badge--success"><?php echo app('translator')->get('Paid'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->status_updated_at)); ?>

                                                        <?php elseif($hireEmploy->status == 4): ?>
                                                            <span class="badge badge--info"><?php echo app('translator')->get('Refund'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($hireEmploy->status_updated_at)); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td data-label="Action">
                                                        <a href="<?php echo e(route('user.buyer.hire.employ.details', encrypt($hireEmploy->id))); ?>" class="btn btn--primary text-white ms-1"><i class="las la-desktop"></i></a>
                                                        <?php if($hireEmploy->working_status==2): ?>
                                                            <a href="javascript:void(0)" class="btn btn--success text-white approvedBtn ms-1" data-order_number="<?php echo e($hireEmploy->order_number); ?>" data-bs-toggle="modal" data-bs-target="#approvedModal"><i class="las la-check"></i></a>

                                                            <a href="javascript:void(0)" class="btn btn--danger text-white disputeBtn ms-1" data-order_number="<?php echo e($hireEmploy->order_number); ?>" data-bs-toggle="modal" data-bs-target="#disputeModal"><i class="las la-times"></i></a>
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
                                    <?php echo e($hireEmploys->links()); ?>

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
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Work Delivery Approval Confirmation'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" action="<?php echo e(route('user.work.delivery.approved')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="order_number">
                    <input type="hidden" name="work_type" value="jobBiding">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to approved this work delivery'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                         <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Approved'); ?></button>
                    </div>
                </form>
        </div>
    </div>
</div>



<div class="modal fade" id="disputeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Are you sure to dispute this booking'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('user.work.dispute')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="order_number">
                    <input type="hidden" name="work_type" value="jobBiding">
                    <div class="form-group">
                         <textarea rows="8" class="form-control" name="dispute" placeholder="Why dispute ...." required></textarea>
                         <small><?php echo app('translator')->get('Minimum 50 Characters Required'); ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn--base" style="width:100%;"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
<script>
    "use strict";
    $('.approvedBtn').on('click', function () {
        var modal = $('#approvedModal');
        modal.find('input[name=order_number]').val($(this).data('order_number'))
        modal.modal('show');
    });

    $('.disputeBtn').on('click', function () {
        var modal = $('#disputeModal');
        modal.find('input[name=order_number]').val($(this).data('order_number'))
        modal.modal('show');
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/buyer/hire_employ.blade.php ENDPATH**/ ?>