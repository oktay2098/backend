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
                                        <a href="<?php echo e(route('user.software.create')); ?>" class="btn btn-sm btn--success box--shadow1 text--small"style="background-color: #198754; color: #ffffff; border-radius: 5px; ><i class="fa fa-fw fa-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
                                    </div>
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('Title'); ?></th>
                                                <th><?php echo app('translator')->get('Product Code'); ?></th>
                                                <th><?php echo app('translator')->get('Amount'); ?></th>
                                                <th><?php echo app('translator')->get('Product Type'); ?></th>
                                                <!-- <th><?php echo app('translator')->get('Product File'); ?></th>
                                                <th><?php echo app('translator')->get('Demo Url'); ?></th>
                                                <th><?php echo app('translator')->get('Documents'); ?></th> -->
                                                <th><?php echo app('translator')->get('Status'); ?></th>
                                                <th><?php echo app('translator')->get('Last Update'); ?></th>
                                                <th><?php echo app('translator')->get('Action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $softwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $software): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td data-label="<?php echo app('translator')->get('Title'); ?>" class="text-start">
                                                        <div class="author-info">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage('assets/images/software/'.$software->image,'590x300')); ?>" alt="<?php echo app('translator')->get('Service Image'); ?>">
                                                            </div>
                                                            
                                                            <div class="content">
                                                                <?php if($software->status==1): ?>
                                                                <a href="<?php echo e(route('software.details', [slug($software->title), encrypt($software->id)])); ?>" title=""><?php echo e(__(str_limit($software->title, 10))); ?></a>
                                                                <?php else: ?>
                                                                <a href="#" title=""><?php echo e(__(str_limit($software->title, 10))); ?></a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>"><?php echo e($software->product_code); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Amount'); ?>"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($software->amount)); ?></td>
                                                    <td data-label="<?php echo app('translator')->get('Product Type'); ?>"><?php echo e(($software->product_type !=0 ) ? $software->productType->name :''); ?></td>
                                                    <!-- <td data-label="<?php echo app('translator')->get('Software File'); ?>">
                                                        <a href="<?php echo e(route('user.software.file.download',encrypt($software->id))); ?>" class="btn btn--sm btn--info text-white"><i class="las la-arrow-down"></i></a>
                                                    </td>

                                                     <td data-label="<?php echo app('translator')->get('Demo Url'); ?>">
                                                        <a href="<?php echo e($software->demo_url); ?>" target="__blank"><?php echo e($software->demo_url); ?></a>
                                                    </td>

                                                    <td data-label="<?php echo app('translator')->get('Documents'); ?>">
                                                        <a href="<?php echo e(route('user.software.document.download',encrypt($software->id))); ?>" class="btn btn--sm btn--info text-white"><i class="las la-arrow-down"></i></a>
                                                    </td> -->

                                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                                        <?php if($software->status == 1): ?>
                                                            <span class="badge badge--success"><?php echo app('translator')->get('Approved'); ?></span>
                                                            <br>
                                                            <?php echo e(diffforhumans($software->created_at)); ?>

                                                        <?php elseif($software->status == 2): ?>
                                                            <span class="badge badge--danger"><?php echo app('translator')->get('Cancel'); ?></span>
                                                             <br>
                                                            <?php echo e(diffforhumans($software->created_at)); ?>

                                                        <?php else: ?>
                                                            <span class="badge badge--primary"><?php echo app('translator')->get('Pending'); ?></span>
                                                             <br>
                                                            <?php echo e(diffforhumans($software->created_at)); ?>

                                                        <?php endif; ?>
                                                        </td>
                                                    <td data-label="<?php echo app('translator')->get('Last Update'); ?>">
                                                        <?php echo e(showDateTime($software->updated_at)); ?>

                                                        <br>
                                                        <?php echo e(diffforhumans($software->updated_at)); ?>

                                                    </td>
                                                    <td data-label="Action">
                                                        <a href="<?php echo e(route('user.software.edit', [slug($software->title), $software->id])); ?>" class="btn btn--primary text-white"><i class="fa fa-pencil-alt"></i></a>
                                                        <?php if(($software->status == 1) && ($software->product_type==1)): ?>
                                                        <a href="<?php echo e(route('user.software.manage', [slug($software->title), $software->id])); ?>" class="btn btn--primary text-white"><?php echo app('translator')->get('Manage Product'); ?></a>
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
                                    <?php echo e($softwares->links()); ?>

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

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/seller/software/index.blade.php ENDPATH**/ ?>