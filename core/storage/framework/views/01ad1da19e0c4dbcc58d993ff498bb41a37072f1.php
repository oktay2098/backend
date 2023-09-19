<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                
                    <?php echo $__env->make($activeTemplate . 'partials.seller_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <div class="table-section">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="table-area">
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('Transaction ID'); ?></th>
                                                <th><?php echo app('translator')->get('Gateway'); ?></th>
                                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                                <th><?php echo app('translator')->get('Charge'); ?></th>
                                                <th><?php echo app('translator')->get('After Charge'); ?></th>
                                                <th><?php echo app('translator')->get('Rate'); ?></th>
                                                <th><?php echo app('translator')->get('Receivable'); ?></th>
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Time'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="#<?php echo app('translator')->get('Trx'); ?>"><?php echo e($data->trx); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Gateway'); ?>"><?php echo e(__($data->method->name)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                                        <strong><?php echo e(getAmount($data->amount)); ?> <?php echo e(__($general->cur_text)); ?></strong>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Charge'); ?>" class="text-danger">
                                                        <?php echo e(getAmount($data->charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('After Charge'); ?>">
                                                        <?php echo e(getAmount($data->after_charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Rate'); ?>">
                                                        <?php echo e(getAmount($data->rate)); ?> <?php echo e(__($data->currency)); ?>

                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Receivable'); ?>" class="text-success">
                                                        <strong><?php echo e(getAmount($data->final_amount)); ?> <?php echo e(__($data->currency)); ?></strong>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                        <?php if($data->status == 2): ?>
                                                            <span class="badge badge--primary"><?php echo app('translator')->get('Pending'); ?></span>
                                                        <?php elseif($data->status == 1): ?>
                                                            <span class="badge badge--success"><?php echo app('translator')->get('Completed'); ?></span>
                                                            <button class="btn-info btn-rounded text-white  badge approveBtn" data-admin_feedback="<?php echo e($data->admin_feedback); ?>"><i class="fa fa-info"></i></button>
                                                        <?php elseif($data->status == 3): ?>
                                                            <span class="badge badge--danger"><?php echo app('translator')->get('Rejected'); ?></span>
                                                            <button class="btn-info btn-rounded badge approveBtn" data-admin_feedback="<?php echo e($data->admin_feedback); ?>"><i class="fa fa-info"></i></button>
                                                        <?php endif; ?>

                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                                        <?php echo e(showDateTime($data->created_at)); ?>

                                                        <br>
                                                        <?php echo e(diffforhumans($data->updated_at)); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php echo e($withdraws->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

   
<div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><?php echo app('translator')->get('Details'); ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <div class="withdraw-detail"></div>

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
        (function($){
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#detailModal');
                var feedback = $(this).data('admin_feedback');
                modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
                modal.modal('show');
            });
        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/withdraw/log.blade.php ENDPATH**/ ?>