<header class="header-section sticky-header">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href="<?php echo e(route('home')); ?>"><img src="<?php echo e(getImage(imagePath()['logoIcon']['path'] .'/logo.png')); ?>" alt="<?php echo e(__($general->sitename)); ?>"></a>
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                         <?php
        $isShowMobile =true;
        if(Route::currentRouteName()=='home')
        $isShowMobile = false;
        ?>
                        <button type="button" class="short-menu-open-btn <?php echo e($isShowMobile ? '' : 'd-none'); ?>"><i class="fas fa-align-center"></i></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <li><a href="<?php echo e(route('home')); ?>" <?php if(request()->routeIs('home')): ?>class="active" <?php endif; ?>><?php echo app('translator')->get('Home'); ?></a></li>
                                <li><a href="<?php echo e(route('service')); ?>" <?php if(request()->routeIs('service')): ?>class="active" <?php endif; ?>><?php echo app('translator')->get('Service'); ?></a></li>
                                <li><a href="<?php echo e(route('software')); ?>" <?php if(request()->routeIs('software')): ?>class="active" <?php endif; ?>><?php echo app('translator')->get('Product'); ?></a></li>
                                <li><a href="<?php echo e(route('job')); ?>" <?php if(request()->routeIs('job')): ?>class="active" <?php endif; ?>><?php echo app('translator')->get('Job'); ?></a></li>
                                <li><a href="<?php echo e(route('blog')); ?>" <?php if(request()->routeIs('blog') || request()->routeIs('blog.details')): ?>class="active" <?php endif; ?>><?php echo app('translator')->get('Blog'); ?></a></li>
                                <li><a href="<?php echo e(route('contact')); ?>" <?php if(request()->routeIs('contact')): ?>class="active" <?php endif; ?>><?php echo app('translator')->get('Contact'); ?></a></li>
                            </ul>
                            <div class="language-select-area">
                                <select class="language-select langSel">
                                    <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->code); ?>" <?php if(session('lang') == $item->code): ?> selected  <?php endif; ?>><?php echo e(__($item->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                          
                            <div class="header-action">
                                <?php if(auth()->guard()->guest()): ?>
                                    <a href="<?php echo e(route('user.login')); ?>" class="btn--base active"><?php echo app('translator')->get('Sign In'); ?></a>
                                    <a href="<?php echo e(route('user.register')); ?>" class="btn--base"><?php echo app('translator')->get('Sign Up'); ?></a>
                                <?php endif; ?>

                                <?php if(auth()->guard()->check()): ?>
                                    <a href="<?php echo e(route('user.home')); ?>" class="btn--base"><?php echo app('translator')->get('Dashboard'); ?></a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
       
    </div>
</header><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/partials/header.blade.php ENDPATH**/ ?>