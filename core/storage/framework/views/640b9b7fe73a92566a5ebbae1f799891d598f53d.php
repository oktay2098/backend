<?php
    $content = getContent('footer.content', true);
    $footer_menu = getContent('footer.element', false);
    $socialIcons = getContent('social_icon.element', false);
?>
<section class="footer-section section--bg pt-60">
    <div class="container-fluid">
        <div class="footer-wrapper">
            <div class="footer-toggle"><span class="right-icon"></span><span class="title"><?php echo app('translator')->get('Quick Links'); ?> </span></div>
            <div class="footer-bottom-area">
                <div class="row mb-30-none">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-30">
                        <div class="footer-widget">
                            <h3 class="title"><?php echo app('translator')->get('انا حر'); ?></h3>
                            <p><?php echo e(__(@$content->data_values->heading)); ?></p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 mb-30">
                        <div class="footer-widget">
                            <h3 class="title"><?php echo app('translator')->get('Short Links'); ?></h3>
                            <ul class="footer-links">
                                <li><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get('Blog'); ?></a></li>
                                <?php $__currentLoopData = $footer_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('footer.menu', [slug($value->data_values->menu), $value->id])); ?>"><?php echo e(__($value->data_values->menu)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-30">
                        <div class="footer-widget">
                            <h3 class="title"><?php echo app('translator')->get('اشترك الأن'); ?></h3>
                            <p><?php echo e(__(@$content->data_values->subscribe_title)); ?></p>
                            <form class="subscribe-form">
                                <input type="email" name="email" id="emailSub" placeholder="<?php echo app('translator')->get('Email Address'); ?>..">
                                <button type="button" class="subscribe-btn"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area d-flex flex-wrap justify-content-between align-items-center">
                <div class="copyright">
                    <p><?php echo app('translator')->get('Copyright'); ?> © <?php echo e(Carbon\Carbon::now()->format('Y')); ?> <?php echo app('translator')->get('All Rights reserved'); ?></p>
                </div>
                <div class="social-area">
                    <ul class="footer-social">
                        <?php $__currentLoopData = $socialIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(@$element->data_values->url); ?>" target="__blank"><?php echo $element->data_values->social_icon ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('script'); ?>
<script>
    'use strict';
    $(document).on('click','.subscribe-btn' , function(){
        var email = $("#emailSub").val();
        if(email){
            $.ajax({
                headers: {"X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",},
                url:"<?php echo e(route('subscribe')); ?>",
                method:"POST",
                data:{email:email},
                success:function(response)
                {
                    if(response.success) {
                        notify('success', response.success);
                    }else{
                        $.each(response, function (i, val) {
                            notify('error', val);
                        });
                    }
                }
            });
        }
        else{
            notify('error', "Please Input Your Email");
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/partials/footer.blade.php ENDPATH**/ ?>