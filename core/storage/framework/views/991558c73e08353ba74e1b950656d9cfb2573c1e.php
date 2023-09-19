<?php
	$captcha = loadCustomCaptcha();
?>
<?php if($captcha): ?>
    <div class="col-lg-12 form-group">
        <?php echo $captcha ?>
    </div>
        <div class="col-lg-12 form-group">
            <input type="text" name="captcha" placeholder="<?php echo app('translator')->get('Enter Code'); ?>" class="form-control form--control">
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/partials/custom_captcha.blade.php ENDPATH**/ ?>