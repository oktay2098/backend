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
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('Title'); ?></th>
                                                <th><?php echo app('translator')->get('Price'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $favoriteSoftwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favoriteSoftware): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Title'); ?>" class="text-start">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage('assets/images/software/'.$favoriteSoftware->software->image,'590x300')); ?>" alt="<?php echo app('translator')->get('product Image'); ?>">
                                                            </div>
                                                            <div class="content"><?php echo e(__(str_limit($favoriteSoftware->software->title, 40))); ?></div>
                                                        </div>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Price'); ?>"><?php echo e(showAmount($favoriteSoftware->software->amount)); ?> <?php echo e($general->cur_text); ?></td>
                                                    <td data-label="Action">
                                                        <a href="<?php echo e(route('software.details', [slug($favoriteSoftware->software->title), encrypt($favoriteSoftware->software_id)])); ?>" class="btn btn--primary text-white"><i class="las la-desktop"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <?php echo e($favoriteSoftwares->links()); ?>

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

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/buyer/favorite_software.blade.php ENDPATH**/ ?>