<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php echo $__env->make($activeTemplate . 'partials.seller_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <form class="user-profile-form"  action="<?php echo e(route('ticket.store')); ?>"  method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                        <?php echo csrf_field(); ?>
                        <div class="card custom--card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                                <h4 class="card-title mb-0">
                                    <?php echo e(__($pageTitle)); ?>

                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="card-form-wrapper">
                                    <div class="row justify-content-center">
                                        <div class="form-group col-md-6">
                                            <label for="name"><?php echo app('translator')->get('Name'); ?></label>
                                            <input type="text" name="name" value="<?php echo e(@$user->firstname . ' '.@$user->lastname); ?>" class="form-control form-control-lg" placeholder="<?php echo app('translator')->get('Enter your name'); ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email"><?php echo app('translator')->get('Email address'); ?></label>
                                            <input type="email"  name="email" value="<?php echo e(@$user->email); ?>" class="form-control form-control-lg" placeholder="<?php echo app('translator')->get('Enter your email'); ?>" readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="website"><?php echo app('translator')->get('Subject'); ?></label>
                                            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="form-control form-control-lg" placeholder="<?php echo app('translator')->get('Subject'); ?>" required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="priority"><?php echo app('translator')->get('Priority'); ?></label>
                                            <select name="priority" class="form-control form-control-lg" required="">
                                                <option value="3"><?php echo app('translator')->get('High'); ?></option>
                                                <option value="2"><?php echo app('translator')->get('Medium'); ?></option>
                                                <option value="1"><?php echo app('translator')->get('Low'); ?></option>
                                            </select>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <div class="input-group ticket-input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-white" id="inputGroupFileAddon01"><?php echo app('translator')->get('Upload'); ?></span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="attachments[]" id="inputAttachments"
                                                            aria-describedby="inputGroupFileAddon01" required="">
                                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo app('translator')->get('Choose file'); ?></label>
                                                    </div>
                                                </div>
                            
                                                <div id="fileUploadsContainer"></div>
                                                <p class="my-2 ticket-attachments-message"><?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>,
                                                    .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?></p>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <a href="javascript:void(0)" class="btn--base addFile">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="inputMessage"><?php echo app('translator')->get('Message'); ?></label>
                                            <textarea name="message" id="inputMessage" rows="6" placeholder="<?php echo app('translator')->get('Enter Message'); ?>" class="form-control form-control-lg" required=""><?php echo e(old('message')); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 form-group">
                                        <button type="submit" class="submit-btn mt-20 w-100"><?php echo app('translator')->get('Submit'); ?></button>
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


<?php $__env->startPush('script'); ?>
<script>
    "use strict";
    $(document).on("change",".custom-file-input",function(){
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

     $('.addFile').on('click',function(){
        $("#fileUploadsContainer").append(
            `<div class="input-group ticket-input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text text-white" id="inputGroupFileAddon01"><?php echo app('translator')->get('Upload'); ?></span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="attachments[]" id="inputAttachments"
                        aria-describedby="inputGroupFileAddon01" required>
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo app('translator')->get('Choose file'); ?></label>
                </div>
            <span class="btn btn--danger text-white remove-btn ms-2"><i class="las la-times"></i></span>
        </div>`
        )
    });
    $(document).on('click','.remove-btn',function(){
        $(this).closest('.input-group').remove();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/support/create.blade.php ENDPATH**/ ?>