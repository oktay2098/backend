<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php echo $__env->make($activeTemplate . 'partials.buyer_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <div class="table-section">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="table-area">
                                        <div class="col-md-2">
                                        <a href="<?php echo e(route('user.job.create')); ?>" class="btn btn-sm btn--success box--shadow1 text--small"style="background-color: #198754; color: #ffffff; border-radius: 5px; ><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
                                    </div>
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('Title'); ?></th>
                                                <th><?php echo app('translator')->get('Category'); ?></th>
                                                <th><?php echo app('translator')->get('Budget'); ?></th>
                                                <th><?php echo app('translator')->get('Total Bid'); ?></th>
                                                <th><?php echo app('translator')->get('Delivery Time'); ?></th>
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Last Update'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Title'); ?>" class="text-start">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage('assets/images/job/'.$job->image,'590x300')); ?>" alt="<?php echo app('translator')->get('Job Image'); ?>">
                                                            </div>
                                                            <div class="content">
                                                                <?php if($job->status==1 || $job->status==2): ?>
                                                                <a href="<?php echo e(route('job.details', [slug($job->title), encrypt($job->id)])); ?>" title=""><?php echo e(__(str_limit($job->title, 20))); ?></a>
                                                                <?php else: ?>
                                                                <a href="#" title=""><?php echo e(__(str_limit($job->title, 20))); ?></a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Category'); ?>"><?php echo e(__($job->category->name)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Budget'); ?>"><?php echo e(showAmount($job->amount)); ?> <?php echo e($general->cur_text); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Total Bid'); ?>"><?php echo e($job->jobBiding->count()); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Delivery Time'); ?>"><?php echo e($job->delivery_time); ?> <?php echo app('translator')->get('Days'); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                        <?php if($job->status == 1): ?>
                                                            <span class="badge badge--success"><?php echo app('translator')->get('Approved'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($job->created_at)); ?>

                                                        <?php elseif($job->status == 2): ?>
                                                            <span class="badge badge--warning"><?php echo app('translator')->get('Closed'); ?></span>
                                                            <br>
                                                             <?php echo e(diffforhumans($job->created_at)); ?>

                                                        <?php elseif($job->status == 3): ?>
                                                            <span class="badge badge--danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                                            <br>
                                                             <?php echo e(diffforhumans($job->created_at)); ?>

                                                        <?php else: ?>
                                                            <span class="badge badge--primary"><?php echo app('translator')->get('Pending'); ?></span>
                                                            <br>
                                                             <?php echo e(diffforhumans($job->created_at)); ?>

                                                        <?php endif; ?>
                                                        </td>
                                                    <td data-label="<?php echo app('translator')->get('Last Update'); ?>">
                                                        <?php echo e(showDateTime($job->updated_at)); ?>

                                                        <br>
                                                        <?php echo e(diffforhumans($job->updated_at)); ?>

                                                    </td>
                                                    <td data-label="Action">
                                                        <?php if($job->status == 1 || $job->status == 0): ?>
                                                            <a href="<?php echo e(route('user.job.edit', [slug($job->title), $job->id])); ?>" class="btn btn--primary text-white ms-1"><i class="fa fa-pencil-alt"></i></a>
                                                        <?php else: ?>
                                                            <span><?php echo app('translator')->get('N\A'); ?></span>
                                                        <?php endif; ?>

                                                        <?php if($job->status == 1): ?>
                                                            <a href="javascript:void(0)" class="btn btn--warning text-white cancelBtn" data-id="<?php echo e($job->id); ?>" data-bs-toggle="modal" data-bs-target="#cancelModal"><i class="las la-times"></i></a>
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
                                    <?php echo e($jobs->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Job Closed Confirmation'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <form method="POST" action="<?php echo e(route('user.job.cancel')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to close this job'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                         <button type="submit" class="btn btn--success btn-rounded text-white"><?php echo app('translator')->get('Confirm'); ?></button>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
<script>
    'use strict';
    $('.cancelBtn').on('click', function () {
        var modal = $('#cancelModal');
        modal.find('input[name=id]').val($(this).data('id'))
        modal.modal('show');
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/buyer/job/index.blade.php ENDPATH**/ ?>