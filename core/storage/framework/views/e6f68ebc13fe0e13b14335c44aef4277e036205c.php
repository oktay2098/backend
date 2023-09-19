<?php $__env->startSection('content'); ?>
<?php
    $content = getContent('breadcrumbs.content', true);
?>

<?php $__env->startSection('headTitle'); ?>
    <?php if(isset($_GET['lang'])): ?>
        <?php if($_GET['lang'] == 'en'): ?>
            <title>I am free - Login</title>
        <?php else: ?>
            <title>انا حر - تسجيل دخول</title>
        <?php endif; ?>
        <?php else: ?>
            <title>انا حر - تسجيل دخول</title>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<section class="account-section ptb-80 bg-overlay-white bg_img" data-background="<?php echo e(getImage('assets/images/frontend/breadcrumbs/'.$content->data_values->background_image,'1920x1200')); ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="account-form-area">
                    <div class="account-logo-area text-center">
                        <div class="account-logo">
                            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(getImage(imagePath()['logoIcon']['path'] .'/logo.png')); ?>" alt="<?php echo e(__($general->sitename)); ?>"></a>
                        </div>
                    </div>
                    <div class="account-header text-center">
                        <h3 class="title"><?php echo app('translator')->get('Sign in to'); ?> <?php echo e(__($general->sitename)); ?></h3>
                    </div>
                    <form class="account-form" method="POST" action="<?php echo e(route('user.login')); ?>" onsubmit="return submitUserForm();">
                        <?php echo csrf_field(); ?>
                        <div class="row ml-b-20">
                            <div class="col-lg-12 form-group">
                                <label for="username"><?php echo app('translator')->get('Username or email'); ?>*</label>
                                <input type="text" class="form-control form--control" id="username" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo app('translator')->get('Enter username or email'); ?>" required="">
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="password"><?php echo app('translator')->get('Password'); ?>*</label>
                                <input type="password" class="form-control form--control" id="password" name="password" placeholder="<?php echo app('translator')->get("Enter password"); ?>" required="">
                            </div>

                            <div class="col-lg-12 form-group">
                                <?php echo loadReCaptcha() ?>
                            </div>

                            <?php echo $__env->make($activeTemplate.'partials.custom_captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="col-lg-12 form-group">
                                <div class="forgot-item">
                                    <label><a href="<?php echo e(route('user.password.request')); ?>" class="text--base"><?php echo app('translator')->get('Forgot Password'); ?>?</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group text-center">
                                <button type="submit" class="submit-btn w-100"><?php echo app('translator')->get('Login Now'); ?></button>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="account-item mt-10">
                                    <label><?php echo app('translator')->get('Already Have An Account'); ?>? <a href="<?php echo e(route('user.register')); ?>" class="text--base"><?php echo app('translator')->get('Register Now'); ?></a></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>                    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger"><?php echo app('translator')->get("Captcha field is required."); ?></span>';
                return false;
            }
            return true;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/auth/login.blade.php ENDPATH**/ ?>