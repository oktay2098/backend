<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php if(request()->routeIs('user.buyer.transactions')): ?>
                    <?php echo $__env->make($activeTemplate . 'partials.buyer_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make($activeTemplate . 'partials.seller_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <div class="table-section">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="table-area">
                                    <table class="custom-table">
                                        <thead>
                                             <tr>
                                                <th><?php echo app('translator')->get('Date'); ?></th>
                                                <th><?php echo app('translator')->get('TRX'); ?></th>
                                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                                <th><?php echo app('translator')->get('Charge'); ?></th>
                                                <th><?php echo app('translator')->get('Post Balance'); ?></th>
                                                <th><?php echo app('translator')->get('Detail'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Date'); ?>">
                                                        <?php echo e(showDateTime($transaction->created_at)); ?>

                                                        <br>
                                                        <?php echo e(diffforhumans($transaction->created_at)); ?>


                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('TRX'); ?>"><?php echo e($transaction->trx); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                                        <strong
                                                            <?php if($transaction->trx_type == '+'): ?> class="text--success" <?php else: ?> class="text--danger" <?php endif; ?>> 
                                                            <?php echo e(($transaction->trx_type == '+') ? '+':'-'); ?> 
                                                            <?php echo e(getAmount($transaction->amount)); ?> <?php echo e($general->cur_text); ?>

                                                        </strong>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Charge'); ?>"><?php echo e(getAmount($transaction->charge)); ?> <?php echo e($general->cur_text); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Post Balance'); ?>"><?php echo e(getAmount($transaction->post_balance)); ?> <?php echo e($general->cur_text); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Detail'); ?>"><?php echo e(__($transaction->details)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php echo e($transactions->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/buyer/transactions.blade.php ENDPATH**/ ?>