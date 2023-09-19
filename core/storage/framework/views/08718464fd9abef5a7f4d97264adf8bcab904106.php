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
                                    <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('user.job.vacancy') || request()->routeIs('user.seller.job.list.details') ? 'active' : ''); ?>" href="<?php echo e(route('user.job.vacancy')); ?>">Job List</a>
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
                                                <th><?php echo app('translator')->get('Buyer'); ?></th>
                                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                                <th><?php echo app('translator')->get('Working Status'); ?></th>
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $jobVacancys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Job'); ?>" class="text-start">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage('assets/images/job/'.$booking->biding->job->image,'590x300')); ?>" alt="<?php echo app('translator')->get('Job Image'); ?>">
                                                            </div>
                                                            <div class="content"><a href=""><?php echo e(__(str_limit($booking->biding->title, 20))); ?></a></div>
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
                                                    <td data-label="<?php echo app('translator')->get('Working Status'); ?>">
                                                    	<?php if($booking->working_status == 0): ?>
                                                    		<span class="badge badge--primary"><?php echo app('translator')->get('Pending'); ?></span>
                                                             <br>
                                                            <?php echo e(diffforhumans($booking->updated_at)); ?>

                                                    	<?php elseif($booking->working_status == 1): ?>
                                                    		<span class="badge badge--success"><?php echo app('translator')->get('Completed'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($booking->updated_at)); ?>

                                                    	<?php elseif($booking->working_status == 2): ?>
                                                    		<span class="badge badge--secondary"><?php echo app('translator')->get('Delivered'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($booking->updated_at)); ?>

                                                    	<?php elseif($booking->working_status == 3): ?>
                                                    		<span class="badge badge--danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                                             <br>
                                                            <?php echo e(diffforhumans($booking->updated_at)); ?>

                                                    	<?php elseif($booking->working_status == 4): ?>
                                                    		<span class="badge badge--info"><?php echo app('translator')->get('In Progress'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($booking->updated_at)); ?>

                                                    	<?php elseif($booking->working_status == 5): ?>
                                                    		<span class="badge badge--danger"><?php echo app('translator')->get('Delivery Expired'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($booking->updated_at)); ?>

                                                    	<?php elseif($booking->working_status == 6): ?>
                                                    		<span class="badge badge--warning"><?php echo app('translator')->get('Dispute'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($booking->updated_at)); ?>

                                                    	<?php endif; ?>
                                                    </td>
                                                     <td data-label="<?php echo app('translator')->get('Status'); ?>">
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
                                                            <span class="badge badge--info"><?php echo app('translator')->get('Refund'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($booking->status_updated_at)); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td data-label="Action">
                                                        <a href="<?php echo e(route('user.seller.job.list.details', encrypt($booking->id))); ?>" class="btn btn--primary text-white ms-1"><i class="las la-desktop"></i></a>
                                                        <?php if($booking->working_status == 4 || $booking->working_status == 2): ?>
                                                             <a href="javascript:void(0)" class="btn btn--info text-white workBtn ms-1" data-order_number="<?php echo e($booking->order_number); ?>" data-bs-toggle="modal" data-bs-target="#workModal"><i class="las la-truck-loading"></i></a>
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
                                    <?php echo e($jobVacancys->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="workModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Work Delivery'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('user.work.upload')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="order_number">
                    <input type="hidden" name="work_type" value="jobBiding">
                    <div class="form-group">
                        <div>
                          <label for="formFileLg" class="form-label font-weight-bold"><?php echo app('translator')->get('Upload Work File'); ?></label>
                          <input class="form-control form-control-lg" name="file" id="formFileLg" type="file" required="">
                           <small><?php echo app('translator')->get('Supported files:zip and max size:25 Mb'); ?></small>
                        </div>
                    </div>
                  

                    <div class="form-group">
                         <textarea rows="8" class="form-control" name="details" placeholder="Describe Your Delivery Details ...." required></textarea>
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
    $('.workBtn').on('click', function () {
        var modal = $('#workModal');
        modal.find('input[name=order_number]').val($(this).data('order_number'))
        modal.modal('show');
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/seller/job_vacancy.blade.php ENDPATH**/ ?>