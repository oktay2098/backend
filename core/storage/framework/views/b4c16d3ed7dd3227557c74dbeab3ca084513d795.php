<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php echo $__env->make($activeTemplate . 'partials.seller_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                        <div class="card-area">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="card custom--card">
                                        <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                                            <h4 class="card-title mb-0">
                                                <?php echo e(__($pageTitle)); ?>

                                            </h4>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="chat-area">
                                            <?php $__empty_1 = true; $__currentLoopData = $conversions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php if($conversion->sender_id != auth()->user()->id): ?>
                                                    <li>
                                                        <div class="chat-author">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage(imagePath()['profile']['user']['path'].'/'.$conversion->sender->image,imagePath()['profile']['user']['size'])); ?>" alt="<?php echo e($conversion->sender->username); ?>">
                                                            </div>
                                                            <div class="content">
                                                                <h6 class="title">
                                                                    <a href="<?php echo e(route('user.conversation.chat',  $conversion->id)); ?>"><?php echo e($conversion->sender->username); ?></a>
                                                                </h6>
                                                                <span class="info"><?php echo e(Str::words($conversion->messages->last()->message, 8)); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="date-area">
                                                            <span><?php echo e(diffforhumans($conversion->messages->last()->updated_at)); ?></span>
                                                        </div>
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <div class="chat-author">
                                                            <div class="thumb">
                                                                <img src="<?php echo e(getImage(imagePath()['profile']['user']['path'].'/'.$conversion->receiver->image,imagePath()['profile']['user']['size'])); ?>" alt="<?php echo e($conversion->receiver->username); ?>">
                                                            </div>
                                                            <div class="content">
                                                                <h5 class="name">
                                                                    <a href="<?php echo e(route('user.conversation.chat',  $conversion->id)); ?>"><?php echo e($conversion->receiver->username); ?></a>
                                                                </h5>
                                                                <span class="info"><?php echo e(Str::words($conversion->messages->last()->message, 8)); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="date-area">
                                                            <span><?php echo e(diffforhumans($conversion->messages->last()->updated_at)); ?></span>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <div class="inbox-empty text-center my-2">
                                                <h4 class="title"><?php echo app('translator')->get('Empty Conversation'); ?></h4>
                                            </div>

                                            <?php endif; ?>
                                               
                                            </ul>
                                        </div>
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



<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/message/inbox.blade.php ENDPATH**/ ?>