<?php $__env->startSection('content'); ?>

<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php echo $__env->make($activeTemplate . 'partials.seller_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <form class="user-profile-form" action="" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card custom--card">
                            <div class="profile-settings-wrapper">
                                <div class="preview-thumb profile-wallpaper">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview bg_img" data-background="<?php echo e(userDefaultImage(imagePath()['profile']['user_bg']['path'].'/'. $user->bg_image,'background_image')); ?>"></div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type='file' class="profilePicUpload" name="bg_image" id="profilePicUpload1" accept=".png, .jpg, .jpeg" />
                                        <label for="profilePicUpload1"><i class="las la-cloud-upload-alt me-1"></i> <?php echo app('translator')->get('Update'); ?></label>
                                    </div>
                                </div>
                                <div class="profile-thumb-content">
                                    <div class="preview-thumb profile-thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview bg_img" data-background="<?php echo e(userDefaultImage(imagePath()['profile']['user']['path'].'/'. $user->image,'profile_image')); ?>">
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type='file' class="profilePicUpload" name="image" id="profilePicUpload2"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="profilePicUpload2"><i class="las la-pen"></i></label>
                                        </div>
                                    </div>
                                    <div class="profile-content">
                                        <h6 class="username"><?php echo e(__($user->username)); ?></h6>
                                        <ul class="user-info-list mt-md-2">
                                            <li><i class="las la-envelope"></i><?php echo e(__($user->email)); ?></li>
                                            <li><i class="las la-phone"></i> <?php echo e(__($user->mobile)); ?></li>
                                            <li><i class="las la-map-marked-alt"></i> <?php echo e(__(@$user->address->country)); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-form-wrapper">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label><?php echo app('translator')->get('First Name'); ?>*</label>
                                            <input type="text" name="firstname" value="<?php echo e(__($user->firstname)); ?>" class="form-control" required="">
                                        </div>
										<div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                           <label><?php echo app('translator')->get('Last Name'); ?>*</label>
                                            <input type="text" name="lastname" value="<?php echo e(__($user->lastname)); ?>" class="form-control" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label><?php echo app('translator')->get('Designation'); ?>*</label>
                                            <input type="text" name="designation" value="<?php echo e(__($user->designation)); ?>" class="form-control" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label><?php echo app('translator')->get('Address'); ?>*</label>
                                            <input type="text" name="address" value="<?php echo e(__($user->address->address)); ?>" class="form-control" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label><?php echo app('translator')->get('State'); ?>*</label>
                                            <input type="text" name="state" class="form-control" value="<?php echo e(__($user->address->state)); ?>" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label><?php echo app('translator')->get('Zip Code'); ?>*</label>
                                            <input type="text" name="zip" class="form-control" value="<?php echo e(__($user->address->zip)); ?>" required="">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                            <label><?php echo app('translator')->get('City'); ?>*</label>
                                            <input type="text" name="city" class="form-control" value="<?php echo e(__($user->address->city)); ?>" required="">
                                        </div>
							<div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                <label id="country"><?php echo app('translator')->get('Country'); ?>*</label>
                                <select name="country" id="country" class="form-control form--control">
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-mobile_code="<?php echo e($country->dial_code); ?>" value="<?php echo e($country->country); ?>" data-code="<?php echo e($key); ?>"><?php echo e(__($country->country)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 form-group">
                                <label for="mobile"><?php echo app('translator')->get('Mobile'); ?></label>
                                <div class="input-group country-code">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text mobile-code">
                                            
                                        </span>
                                        <input type="hidden" name="mobile_code">
                                        <input type="hidden" name="country_code">
                                    </div>
                                    <input type="number" name="mobile" id="mobile" value="<?php echo e(__($user->mobile)); ?>" class="form-control form--control checkUser" placeholder="<?php echo app('translator')->get('Your Phone Number'); ?>">
                                </div>
                                <small class="text-danger mobileExist"></small>
                            </div>
                                        <div class="col-md-6 form-group">
                                            <label><?php echo app('translator')->get('About Me'); ?>*</label>
                                            <textarea class="form-control" name="about_me" rows="5" required=""><?php echo e(__($user->about_me)); ?></textarea>
                                        </div>
                                        <div class="col-xl-12 form-group">
                                            <button type="submit" class="submit-btn mt-20 w-100"><?php echo app('translator')->get('Update Profile'); ?></button>
                                        </div>
                                    </div>
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
<?php $__env->startPush('style'); ?>
<style>
    .country-code .input-group-prepend .input-group-text{
        background: #fff !important;
    }
    .country-code select{
        border: none;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }
    .hover-input-popup {
        position: relative;
    }
    .hover-input-popup:hover .input-popup {
        opacity: 1;
        visibility: visible;
    }
    .input-popup {
        position: absolute;
        bottom: 70%;
        left: 50%;
        width: 280px;
        background-color: #1e2746;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }
    .input-popup::after {
        position: absolute;
        content: '';
        bottom: -19px;
        left: 50%;
        margin-left: -5px;
        border-width: 10px 10px 10px 10px;
        border-style: solid;
        border-color: transparent transparent #1a1a1a transparent;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .input-popup p {
        padding-left: 20px;
        position: relative;
    }
    .input-popup p::before {
        position: absolute;
        content: '';
        font-family: 'Line Awesome Free';
        font-weight: 900;
        left: 0;
        top: 4px;
        line-height: 1;
        font-size: 18px;
    }
    .input-popup p.error {
        text-decoration: line-through;
    }
    .input-popup p.error::before {
        content: "\f057";
        color: #ea5455;
    }
    .input-popup p.success::before {
        content: "\f058";
        color: #28c76f;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
<script>
    "use strict";
    function proPicURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var preview = $(input).parents('.preview-thumb').find('.profilePicPreview');
                $(preview).css('background-image', 'url(' + e.target.result + ')');
                $(preview).addClass('has-image');
                $(preview).hide();
                $(preview).fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".profilePicUpload").on('change', function () {
        proPicURL(this);
    });

    $(".remove-image").on('click', function () {
        $(".profilePicPreview").css('background-image', 'none');
        $(".profilePicPreview").removeClass('has-image');
    })
	<?php if($mobile_code): ?>
            $(`option[data-code=<?php echo e($mobile_code); ?>]`).attr('selected','');
            <?php endif; ?>

            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/seller/profile_setting.blade.php ENDPATH**/ ?>