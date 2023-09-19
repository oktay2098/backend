<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Code'); ?></th>
                                    <th><?php echo app('translator')->get('Type'); ?></th>
                                    <th><?php echo app('translator')->get('Value'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Last Update'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Name'); ?>"><span class="font-weight-bold"><?php echo e(__($coupon->name)); ?></span></td>
                                    <td data-label="<?php echo app('translator')->get('Code'); ?>">
                                        <span class="font-weight-bold"><?php echo e($coupon->code); ?></span>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Type'); ?>">
                                        <?php if($coupon->type == 1): ?>
                                            <span class="badge badge--primary"><?php echo app('translator')->get('Fixed'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge--success"><?php echo app('translator')->get('Percent'); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Value'); ?>">
                                        <span class="font-weight-bold">
                                            <?php if($coupon->type == 1): ?>
                                                <?php echo e($general->cur_sym); ?><?php echo e(getAmount($coupon->value)); ?>

                                            <?php else: ?>
                                                <?php echo e(getAmount($coupon->value)); ?> %
                                            <?php endif; ?>
                                        </span>
                                        </td>
                                 
                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($coupon->status == 1): ?>
                                            <span class="badge badge--success"><?php echo app('translator')->get('Enable'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge--danger"><?php echo app('translator')->get('Disabled'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                  
                                     <td data-label="<?php echo app('translator')->get('Last Update'); ?>">
                                        <?php echo e(showDateTime($coupon->updated_at)); ?> <br> <?php echo e(diffForHumans($coupon->updated_at)); ?>

                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <a href="javascript:void(0)" class="icon-btn btn--primary ml-1 updateCoupon"
                                            data-id="<?php echo e($coupon->id); ?>" 
                                            data-name="<?php echo e($coupon->name); ?>" 
                                            data-code="<?php echo e($coupon->code); ?>" 
                                            data-Type="<?php echo e($coupon->type); ?>" 
                                            data-value="<?php echo e(getAmount($coupon->value)); ?>" 
                                            data-status="<?php echo e($coupon->status); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                         <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteCoupon"
                                            data-id="<?php echo e($coupon->id); ?>" >
                                             <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <?php echo e(paginateLinks($coupons)); ?>

                </div>
            </div>
        </div>
    </div>


    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Add Coupon'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.coupon.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="<?php echo app('translator')->get("Enter Name"); ?>"  maxlength="40" required="">
                        </div>

                        <div class="form-group">
                            <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Code'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="code" placeholder="<?php echo app('translator')->get("Enter Code"); ?>"  maxlength="40" required="">
                        </div>


                        <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Coupon Type'); ?></label>
                            <select name="type" id="type" class="form-control form-control-lg" required="">
                                <option><?php echo app('translator')->get('Select Type'); ?></option>
                                <option value="1"><?php echo app('translator')->get('Fixed'); ?></option>
                                <option value="2"><?php echo app('translator')->get('Percent'); ?></option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="value" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Value'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="value" placeholder="<?php echo app('translator')->get("Enter Value"); ?>"  maxlength="40" required="">
                        </div>


                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary"><i class="fa fa-fw fa-paper-plane"></i><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="updateCouponModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Coupon Update'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.coupon.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="<?php echo app('translator')->get("Enter Name"); ?>"  maxlength="40" required="">
                        </div>

                        <div class="form-group">
                            <label for="code" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Code'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="code" placeholder="<?php echo app('translator')->get("Enter Code"); ?>"  maxlength="40" required="">
                        </div>


                        <div class="form-group">
                            <label for="type" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Coupon Type'); ?></label>
                            <select name="type" id="type" class="form-control form-control-lg" required="">
                                <option><?php echo app('translator')->get('Select Type'); ?></option>
                                <option value="1"><?php echo app('translator')->get('Fixed'); ?></option>
                                <option value="2"><?php echo app('translator')->get('Percent'); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="value" class="form-control-label font-weight-bold"><?php echo app('translator')->get('Value'); ?></label>
                            <input type="text" class="form-control form-control-lg" name="value" placeholder="<?php echo app('translator')->get("Enter Value"); ?>"  maxlength="40" required="">
                        </div>


                        <div class="form-group">
                            <label class="form-control-label font-weight-bold"><?php echo app('translator')->get('Status'); ?> </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--primary"><i class="fa fa-fw fa-paper-plane"></i><?php echo app('translator')->get('Update'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteCoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" lass="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Delete Coupon Confirmation'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                
                <form action="<?php echo e(route('admin.coupon.delete')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("POST"); ?>
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to delete this coupon ?'); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn--success"><?php echo app('translator')->get('Confirm'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="javascript:void(0)" class="btn btn-sm btn--primary box--shadow1 text--small addPlan" ><i class="las la-plus"></i><?php echo app('translator')->get('Add Coupon'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        $('.addPlan').on('click', function() {
            $('#addModal').modal('show');
        });

        $('.updateCoupon').on('click', function () {
            var modal = $('#updateCouponModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find('input[name=name]').val($(this).data('name'));
            modal.find('input[name=code]').val($(this).data('code'));
            modal.find('select[name=type]').val($(this).data('type'));
            modal.find('input[name=value]').val($(this).data('value'));
            var data = $(this).data('status');
            if(data == 1){
                modal.find('input[name=status]').bootstrapToggle('on');
            }else{
                modal.find('input[name=status]').bootstrapToggle('off');
            }
            modal.modal('show');
        });

        $('.deleteCoupon').on('click', function () {
            var modal = $('#deleteCoupon');
            modal.find('input[name=id]').val($(this).data('id'))
            modal.modal('show');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/backend/core/resources/views/admin/coupon/index.blade.php ENDPATH**/ ?>