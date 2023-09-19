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
                                    
                                    <div class="col-md-2">
                                       <a href="<?php echo e(route('ticket.open')); ?>" class="btn btn-sm btn--success box--shadow1 text--small"><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
                                    </div>
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('Subject'); ?></th>
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Priority'); ?></th>
                                                <th><?php echo app('translator')->get('Last Reply'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Subject'); ?>"> <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>" class="font-weight-bold"> [<?php echo app('translator')->get('Ticket'); ?>#<?php echo e($support->ticket); ?>] <?php echo e(__($support->subject)); ?> </a></td>
                                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                        <?php if($support->status == 0): ?>
                                                            <span class="badge badge--success py-2 px-3"><?php echo app('translator')->get('Open'); ?></span>
                                                        <?php elseif($support->status == 1): ?>
                                                            <span class="badge badge--primary py-2 px-3"><?php echo app('translator')->get('Answered'); ?></span>
                                                        <?php elseif($support->status == 2): ?>
                                                            <span class="badge badge--warning py-2 px-3"><?php echo app('translator')->get('Customer Reply'); ?></span>
                                                        <?php elseif($support->status == 3): ?>
                                                            <span class="badge badge--dark py-2 px-3"><?php echo app('translator')->get('Closed'); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Priority'); ?>">
                                                        <?php if($support->priority == 1): ?>
                                                            <span class="badge badge--dark py-2 px-3"><?php echo app('translator')->get('Low'); ?></span>
                                                        <?php elseif($support->priority == 2): ?>
                                                            <span class="badge badge--secondary py-2 px-3"><?php echo app('translator')->get('Medium'); ?></span>
                                                        <?php elseif($support->priority == 3): ?>
                                                            <span class="badge badge--primary py-2 px-3"><?php echo app('translator')->get('High'); ?></span>
                                                        <?php else: ?>
                                                            <span><?php echo app('translator')->get('N/A'); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Last Reply'); ?>"><?php echo e(\Carbon\Carbon::parse($support->last_reply)->diffForHumans()); ?> </td>

                                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                                        <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>" class="btn btn--primary btn-sm text-white">
                                                            <i class="fa fa-desktop"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="100%"><?php echo app('translator')->get('No data found'); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php echo e($supports->links()); ?>

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


<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/support/index.blade.php ENDPATH**/ ?>