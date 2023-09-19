<?php $__env->startSection('content'); ?>
<section class="all-sections ptb-60">
    <div class="container-fluid">
        <div class="section-wrapper">
            <div class="row justify-content-center mb-30-none">
                <?php echo $__env->make($activeTemplate . 'partials.seller_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-xl-9 col-lg-12 mb-30">
                    <div class="dashboard-sidebar-open"><i class="las la-bars"></i> <?php echo app('translator')->get('Menu'); ?></div>
                    <div class="deposit-area">
                        <div class="row justify-content-center mb-30-none">
                            <?php $__currentLoopData = $withdrawMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-4 mb-4">
                                    <div class="deposit-item">
                                        <div class="deposit-item-header section--bg text-white text-center">
                                            <span class="title"> <?php echo e(__($data->name)); ?></span>
                                        </div>

                                        <div class="card-body card-body-withdraw">
                                            <img src="<?php echo e(getImage(imagePath()['withdraw']['method']['path'].'/'. $data->image,imagePath()['withdraw']['method']['size'])); ?>" class="card-img-top" alt="<?php echo e(__($data->name)); ?>" class="w-100">
                                            <ul class="list-group text-center">
                                                <li class="list-group-item"><?php echo app('translator')->get('Limit'); ?>
                                                    : <?php echo e(getAmount($data->min_limit)); ?>

                                                    - <?php echo e(getAmount($data->max_limit)); ?> <?php echo e(__($general->cur_text)); ?></li>

                                                <li class="list-group-item"> <?php echo app('translator')->get('Charge'); ?>
                                                    - <?php echo e(getAmount($data->fixed_charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                                    + <?php echo e(getAmount($data->percent_charge)); ?>%
                                                </li>
                                                <li class="list-group-item"><?php echo app('translator')->get('Processing Time'); ?>
                                                    - <?php echo e($data->delay); ?></li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <div class="deposit-item-footer bg--base">
                                                <div class="deposit-btn text-center">
                                                    <a href="javascript:void(0)"  data-id="<?php echo e($data->id); ?>"
                                                       data-resource="<?php echo e($data); ?>"
                                                       data-min_amount="<?php echo e(getAmount($data->min_limit)); ?>"
                                                       data-max_amount="<?php echo e(getAmount($data->max_limit)); ?>"
                                                       data-fix_charge="<?php echo e(getAmount($data->fixed_charge)); ?>"
                                                       data-percent_charge="<?php echo e(getAmount($data->percent_charge)); ?>"
                                                       data-base_symbol="<?php echo e(__($general->cur_text)); ?>"
                                                       class="btn btn--base text-white btn-block btn-icon icon-left withdraw" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                                                        <?php echo app('translator')->get('Withdraw Now'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title method-name" id="ModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('user.withdraw.money')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p class="text-danger withdrawLimit"></p>
                    <p class="text-danger withdrawCharge"></p>

                    <input type="hidden" name="currency"  class="edit-currency form-control">
                    <input type="hidden" name="method_code" class="edit-method-code  form-control">

                    <div class="form-group">
                        <h5><?php echo app('translator')->get('Enter Amount'); ?></h5>
                        <div class="input-group-append">
                            <input type="text" name="amount" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"  value="<?php echo e(old('amount')); ?>" class="form-control" placeholder="<?php echo app('translator')->get("Enter Amount"); ?>" required="">
                            <span class="input-group-text"><?php echo e(__($general->cur_text)); ?></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--danger btn-rounded text-white" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <button type="submit" class="btn btn--base btn-rounded text-white"><?php echo app('translator')->get('Confirm'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.withdraw').on('click', function () {
                var id = $(this).data('id');
                var result = $(this).data('resource');
                var minAmount = $(this).data('min_amount');
                var maxAmount = $(this).data('max_amount');
                var fixCharge = $(this).data('fix_charge');
                var percentCharge = $(this).data('percent_charge');

                var withdrawLimit = `<?php echo app('translator')->get('Withdraw Limit'); ?>: ${minAmount} - ${maxAmount}  <?php echo e(__($general->cur_text)); ?>`;
                $('.withdrawLimit').text(withdrawLimit);
                var withdrawCharge = `<?php echo app('translator')->get('Charge'); ?>: ${fixCharge} <?php echo e(__($general->cur_text)); ?> ${(0 < percentCharge) ? ' + ' + percentCharge + ' %' : ''}`
                $('.withdrawCharge').text(withdrawCharge);
                $('.method-name').text(`<?php echo app('translator')->get('Withdraw Via'); ?> ${result.name}`);
                $('.edit-currency').val(result.currency);
                $('.edit-method-code').val(result.id);
            });
        })(jQuery);
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/templates/basic/user/withdraw/methods.blade.php ENDPATH**/ ?>