<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <div class="d-flex justify-content-between w-100 py-2 align-items-center mobile-rtl">
                            <a class="site-logo site-title" href="<?php echo e(route('home')); ?>">Back to home</a>
                            
                            <a class="site-logo site-title mobile-ltr" href="<?php echo e(route('home')); ?>"><img src="<?php echo e(getImage(imagePath()['logoIcon']['path'] .'/logo.png')); ?>" alt="<?php echo e(__($general->sitename)); ?>">Studio</a>
                        </div>
                        
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            
                            <div class="language-select-area">
                                <select class="language-select langSel">
                                     <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->code); ?>" <?php if(session('lang') == $item->code): ?> selected  <?php endif; ?>><?php echo e(__($item->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="header-right dropdown">
                                <button type="button" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div class="header-user-area d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="header-user-thumb">
                                            <a href="JavaScript:Void(0);"><img src="<?php echo e(getImage('assets/images/user/profile/'.auth()->user()->image, '400x400')); ?>" alt="client"></a>
                                        </div>
                                        <div class="header-user-content">
                                            <span><?php echo app('translator')->get('Account'); ?></span>
                                        </div>
                                        <span class="header-user-icon"><i class="las la-chevron-circle-down"></i></span>
                                    </div>
                                </button>
                                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                    <a href="<?php echo e(route('user.profile.setting')); ?>" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-user-circle"></i>
                                        <span class="dropdown-menu__caption"><?php echo app('translator')->get('Profile Settings'); ?></span>
                                    </a>
                                    <a href="<?php echo e(route('user.change.password')); ?>" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-key"></i>
                                        <span class="dropdown-menu__caption"><?php echo app('translator')->get('Change Password'); ?></span>
                                    </a>
                                    <a href="<?php echo e(route('user.twofactor')); ?>" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-lock"></i>
                                        <span class="dropdown-menu__caption"><?php echo app('translator')->get('2FA Security'); ?></span>
                                    </a>

                                    
                                    <a href="<?php echo e(route('user.logout')); ?>" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                                        <span class="dropdown-menu__caption"><?php echo app('translator')->get('Logout'); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
        
    </div>
</header>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/partials/user_header.blade.php ENDPATH**/ ?>